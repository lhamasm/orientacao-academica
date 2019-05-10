<?php
	require_once "DataGetter.php"
	
	class Usuario {
		private $nome;
		private $sobrenome;
		private $senha;
		private $email;
		private $matricula;
		private $cpf;

		public recuperarSenha($cpf){

		}

		public efetuarLogin($matricula, $senha){

		}

		public efetuarLogout(){

		}

		public efetuarCadastro($nome, $sobrenome, $senha, $email, $matricula, $cpf, $departamento){
			$sql = "INSERT INTO USUARIO VALUES ('" . $matricula . "', '" . $nome . "', '" . $sobrenome . "', '" . $senha . "')";
			DataGetter::getConn()->exec($sql);
			$sql = "INSERT INTO PROFESSOR VALUES ('" . $matricula . "', '" . $departamento . "')";
			DataGetter::getConn()->exec($sql);
		}

		public efetuarCadastro($nome, $sobrenome, $senha, $email, $matricula, $cpf, $curso, $semestre){
			$sql = "INSERT INTO USUARIO VALUES ('" . $matricula . "', '" . $nome . "', '" . $sobrenome . "', '" . $senha . "')";
			DataGetter::getConn()->exec($sql);
			$sql = "INSERT INTO ALUNO VALUES ('" . $matricula . "', " . $curso . ", ". $semestre .")";
			DataGetter::getConn()->exec($sql);
		}

		public alterarSenha($senhaAntiga, $senhaNova){

		}

		public alterarCadastro($nome, $sobrenome, $email, $matricula, $cpf){

		}
	}
?>