<?php
	require_once("Usuario.php"); 
	require_once("Orientacao.php"); 
	require_once("Email.php");
	require_once("Professor.php"); 
	require_once("obrigatoria.php");

	class Aluno extends Usuario {
		private $curso;
		private $semestre;

		public function setCurso($curso){
			$this->curso = $curso;
		}
		public function setSemestre($semestre){
			$this->semestre = $semestre;
		}
		public function getCurso(){
			return $this->curso;
		}
		public function getSemestre(){
			return $this->semestre;
		}

		public function enviarNotificacao($orientacao){
			$sql = 'INSERT INTO ORIENTACAO VALUES(' . $orientacao->getData() . ',' . $orientacao->getHorario() . ',' . $orientacao->getObservacao() . ',' . $orientacao->getDestinatario() . ',' . $orientacao->getRemetente();
			DataGetter::getConn()->exec($sql);

			$stmt = DataGetter::getConn()->prepare("SELECT id FROM ORIENTACAO WHERE data=" . $orientacao->getData() . "AND horario=" . $orientacao->getHorario() . "AND observacao=" . $orientacao.getObservacao() . "AND destinatario=" . $orientacao->getDestinatario() . "AND remetente=" . $orientacao.getRemetente());
			$stmt->execute();
			$orientacao = $stmt->setFetchMode(PDO::FETCH_NUM);
			$orientacao = $stmt->fetch();

			$sql = '';
			$disciplinas = $orientacao->getDisciplinas();
			$aprovado = $orientacao->getAprovado();
			$cursando = $orientacao->getCursando();

			for($i=0; $i<count($disciplinas); $i++){
				$sql = 'INSERT INTO ORIENTACAO_DISCIPLINA VALUES("' . $disciplinas[$i]->getCodigo() . '",' . intval($orientacao[0]) . ', ' . $aprovado[$i] . ', ' . $cursando[$i] . ')'; 
				DataGetter::getConn()->exec($sql);
			}

			$stmt = DataGetter::getConn()->prepare("SELECT nome, email FROM USUARIO WHERE matricula=" . $orientacao->getDestinatario());
			$stmt->execute();
			$professor = $stmt->setFetchMode(PDO::FETCH_NUM);
			$professor = $stmt->fetch();

			$email = new Email();
			$email->notificarOrientacao($professor[0],$professor[1], $professor[2]);

		} // larissa

		public function efetuarCadastro($nome, $sobrenome, $senha, $email, $matricula, $cpf, $curso, $semestre){
			$sql = "INSERT INTO USUARIO VALUES ('" . $matricula . "', '" . $nome . "', '" . $sobrenome . "', '" . $email . "', '" . $senha . "')";
			DataGetter::getConn()->exec($sql);
			$sql = "INSERT INTO ALUNO VALUES ('" . $matricula . "', " . $curso . ", ". $semestre .")";
			DataGetter::getConn()->exec($sql);
		}

		public function recuperarProfessores(){
			$sql = "SELECT USUARIO.* , PROFESSOR.departamento FROM USUARIO, PROFESSOR, CURSO WHERE CURSO.codigo = " . $this->curso . " AND CURSO.departamento = PROFESSOR.departamento AND  USUARIO.matricula = PROFESSOR.matricula";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			$professores = array();
			while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
				array_push($professores, new Professor($result["nome"], $result["sobrenome"], "", $result["email"], $result["matricula"], "", $result["departamento"]));
			}
			
			return $professores;
		} // luis

		public function recuperarObrigatorias(){
			$sql = "SELECT curso,discilinas,sem_sugerido FROM OBRIGATORIA";
			$stmt = DataGetter::getConn()->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$retorno = array();
			foreach ($result as $values) {
				$obr = new obrigatoria();
				$obr->setCurso($values['curso']);
				$obr->setDisciplina($values['discilinas']);
				$obr->setSemRec($values['sem_sugerido']);
				array_push($retorno, $obr);
			}
			return $retorno;
		} // cardel


		public function recuperarOptativas(){
			$stmt = DataGetter::getConn()->prepare("SELECT * FROM DISCIPLINA WHERE DISCIPLINA.codigo NOT IN (SELECT disciplina FROM OBRIGATORIA)");
			$stmt->execute();

			$optativas = array();
			while($optativa = $stmt->setFetchMode(PDO::FETCH_ASSOC)){
				array_push($optativas, new Disciplina($optativa['codigo'], $optativa['nome'], $optativa['carga_horaria'], null, null));
			}

			return $optativas;
		} // larissa

		public function recuperarNotificacoes($aluno){
			$stmt = DataGetter::getConn()->prepare("SELECT * FROM ORIENTACAO WHERE remetente=" . $aluno);
			$stmt->execute();

			$orientacoes = array();
			while($orientacao = $stmt->setFetchMode(PDO::FETCH_ASSOC)){
				array_push($orientacoes, new Orientacao($orientacao['id'], $orientacao['data'], $orientacao['horario'], $orientacao['observacao'], $orientacao['destinatario'], $orientacao['remetente'], $orientacao['disciplinas'], $orientacao['cursando'], $orientacao['aprovado'], $orientacao['lida']));
			}

			return $orientacoes;
		} //larissa
	}
?>
