<?php
	require_once ('DataGetter.php');
	
	class Usuario {
		private $nome;
		private $sobrenome;
		private $senha;
		private $email;
		private $matricula;
		private $cpf;

		public function setNome($nome){
			$this->nome = $nome;
		}
		public function setSobrenome($sobrenome){
			$this->sobrenome = $sobrenome;
		}
		public function setSenha($senha){
			$this->senha = $senha;
		}
		public function setEmail($email){
			$this->email = $email;
		}
		public function setMatricula($matricula){
			$this->matricula = $matricula;
		}
		public function setCpf($cpf){
			$this->cpf = $cpf;
		}
		public function getNome(){
			return $this->nome;
		}
		public function getSobrenome(){
			return $this->sobrenome;
		}
		public function getEmail(){
			return $this->email;
		}
		public function getMatricula(){
			return $this->matricula;
		}

		private function gerarNovaSenha() {
			$novaSenha = '';

			for($i=0; $i<9; $i++){
				$numero = rand(48, 122);
				if( ($numero >= 48 && $numero <= 57) || ($numero >= 65 && $numero <= 90) || ($numero >= 97 && $numero <= 122) ) {
					$novaSenha .= chr($numero);
				} else {
					$i--;
				}
			}

			return $novaSenha;
		}

		public function recuperarSenha($cpf){
			$sql = "SELECT email FROM USUARIO WHERE cpf = '" . $cpf . "'";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);

			$novaSenha = $this->gerarNovaSenha();
			$sql = "UPDATE USUARIO SET senha = '" . $novaSenha . "' WHERE cpf = '" . $cpf . "'";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();

			$e = new Email();
			$e->recuperarSenhaEmail($result["email"], $novaSenha);
		} // luis

		public function efetuarLogin($matricula, $senha){
			$sql = "SELECT matricula,senha FROM USUARIO WHERE matricula = " . $matricula;
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			if(!$result){
				return false;
			}
			else if($result['senha']!=$senha){
				return false;
			}
			else{
				return true;
			}
		} // cardel

		public function efetuarLogout(){
			$this->setNome(NULL);
			$this->setSobrenome(NULL){
			$this->setSenha(NULL);
			$this->setEmail(NULL);
			$this->setMatricula(NULL);
			$this->setCpf(NULL);
		} // larissa

		public function alterarSenha($senhaAntiga, $senhaNova){
			$sql = "SELECT senha FROM USUARIO WHERE matricula = '" . $this->matricula . "'";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);

			if ($result["senha"]==$senhaAntiga){
				$sql = "UPDATE USUARIO SET senha = '" . $senhaNova . "' WHERE matricula = '" . $this->matricula . "'";
				$stmt = DataGetter::getConn()->prepare($sql);
				$stmt->execute();
				return true;
			}
			return false;
		} // luis

		public function alterarCadastro($nome, $sobrenome, $senha, $email){

			// Se alguma coluna nao foi alterada retorna false, caso contrario retorna true

			$sql_senha = "UPDATE USUARIO SET senha = '" . $senha . "' WHERE matricula = '" . $this->matricula . "'";
			$sql_nome = "UPDATE USUARIO SET nome = '" . $nome . "' WHERE matricula = '" . $this->matricula . "'";
			$sql_sobrenome = "UPDATE USUARIO SET sobrenome = '" . $sobrenome . "' WHERE matricula = '" . $this->matricula . "'";
			$sql_email = "UPDATE USUARIO SET email = '" . $email . "' WHERE matricula = '" . $this->matricula . "'";
			$stmt_nome = DataGetter::getConn()->prepare($sql_nome);
			$stmt_sobrenome = DataGetter::getConn()->prepare($sql_sobrenome);
			$stmt_email = DataGetter::getConn()->prepare($sql_email);
			$stmt_senha = DataGetter::getConn()->prepare($sql_senha);
			$stmt_nome->execute();
			$stmt_sobrenome->execute();
			$stmt_email->execute();
			$stmt_senha->execute();

			if($stmt_nome->rowCount() == 0 or $stmt_sobrenome->rowCount() == 0 or $stmt_email->rowCount() == 0 or $stmt_senha->rowCount() == 0){
				return false;
			}
			else{
				return true;
			}
		} // cardel
	}
?>
