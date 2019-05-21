<?php
	require_once("Usuario.php"); 
	require_once("Orientacao.php"); 
	require_once("Email.php");
	require_once ("Aluno.php"); 
	
	class Professor extends Usuario {
		private $departamento;

		public function Professor($nome, $sobrenome, $senha, $email, $matricula, $cpf, $departamento){
			parent::setNome($nome);
			parent::setSobrenome($sobrenome);
			parent::setSenha($senha);
			parent::setEmail($email);
			parent::setMatricula($matricula);
			parent::setCpf($cpf);
			$this->departamento = $departamento;
		}

		public function getDepartamento(){
			return $this->departamento;
		}

		public function responderNotificacao($orientacao){

		} // cardel

		public function efetuarCadastro($nome, $sobrenome, $senha, $email, $matricula, $cpf, $departamento){
			$sql = "INSERT INTO USUARIO VALUES ('" . $matricula . "', '" . $nome . "', '" . $sobrenome . "', '" . $senha . "')";
			DataGetter::getConn()->exec($sql);
			$sql = "INSERT INTO PROFESSOR VALUES ('" . $matricula . "', '" . $departamento . "')";
			DataGetter::getConn()->exec($sql);
		}

		public function recuperarNotificacoes($professor){
			$stmt = DataGetter::getConn()->prepare("SELECT * FROM ORIENTACAO WHERE destinatario=" . $professor);
			$stmt->execute();

			$orientacoes = array();
			while($orientacao = $stmt->setFetchMode(PDO::FETCH_ASSOC)){
				array_push($orientacoes, new Orientacao($orientacao['id'], $orientacao['data'], $orientacao['horario'], $orientacao['observacao'], $orientacao['destinatario'], $orientacao['remetente'], $orientacao['disciplinas'], $orientacao['cursando'], $orientacao['aprovado'], $orientacao['lida']));
			}

			return $orientacoes;
		} //larissa

	}
?>
