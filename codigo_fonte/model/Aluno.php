<?php
	require_once("Usuario.php"); 
	class Aluno extends Usuario {
		private $curso;
		private $semestre;

		public function enviarNotificacao($destinatario,$listaMaterias, $listaCursando, $listaAprovado){

		} // larissa

		public function efetuarCadastro($nome, $sobrenome, $senha, $email, $matricula, $cpf, $curso, $semestre){
			$sql = "INSERT INTO USUARIO VALUES ('" . $matricula . "', '" . $nome . "', '" . $sobrenome . "', '" . $email . "', '" . $senha . "')";
			DataGetter::getConn()->exec($sql);
			$sql = "INSERT INTO ALUNO VALUES ('" . $matricula . "', " . $curso . ", ". $semestre .")";
			DataGetter::getConn()->exec($sql);
		}

		public function recuperarProfessores(){
		
		} // luis

		public function recuperarObrigatorias(){

		} // cardel

		public function recuperarOptativas(){

		} // larissa

		public function recuperarNotificacoes(){

		} //luis
	}
?>
