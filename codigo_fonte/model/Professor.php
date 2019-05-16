<?php
	require_once "Usuario.php" 
	class Professor extends Usuario {
		private $departamento;

		public function responderNotificacao($orientacao){

		} // cardel

		public function efetuarCadastro($nome, $sobrenome, $senha, $email, $matricula, $cpf, $departamento){
			$sql = "INSERT INTO USUARIO VALUES ('" . $matricula . "', '" . $nome . "', '" . $sobrenome . "', '" . $senha . "')";
			DataGetter::getConn()->exec($sql);
			$sql = "INSERT INTO PROFESSOR VALUES ('" . $matricula . "', '" . $departamento . "')";
			DataGetter::getConn()->exec($sql);
		}

		public function recuperarNotificacoes(){

		} //larissa

	}
?>
