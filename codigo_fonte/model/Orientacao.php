<?php
	class Orientacao {
		private $id;
		private $data;
		private $horario;
		private $observacao;
		private $destinatario;
		private $remetente;
		private $disciplinas;
		private $cursando;
		private $aprovado;
		private $lida; 
	}

	function __construct($id, $data, $horario, $observacao, $destinatario, $remetente, $disciplinas, $cursando, $aprovado, $lida) {
		$this->id = $id;
		$this->data = $data;
		$this->horario = $horario;
		$this->observacao = $observacao;
		$this->destinatario = $destinatario;
		$this->remetente = $remetente;
		$this->disciplinas = $disciplinas;
		$this->cursando = $cursando;
		$this->aprovado = $aprovado;
		$this->lida = $lida;
	}

	public function getId(){
		return $this->id;
	}

	public function getData(){
		return $this->data;
	}

	public function getHorario(){
		return $this->horario;
	}

	public function getObservacao(){
		return $this->observacao;
	}

	public function getDestinatario(){
		return $this->destinatario;
	}

	public function getRemetente(){
		return $this->remetente;
	}

	public function getDisciplinas(){
		return $this->disciplinas;
	}

	public function getCursando(){
		return $this->cursando;
	}

	public function getAprovado(){
		return $this->aprovado;
	}

	public function getLida(){
		return $this->lida;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function setData($data){
		$this->data = $data;
	}

	public function setHorario($horario){
		$this->horario = $horario;
	}

	public function setObservacao($observacao){
		$this->observacao = $observacao;
	}

	public function setDestinatario($destinatario){
		$this->destinatario = $destinatario;
	}

	public function setRemetente($remetente){
		$this->remetente = $remetente;
	}

	public function setDisciplinas($disciplinas){
		$this->disciplinas = $disciplinas;
	}

	public function setCursando($cursando){
		$this->cursando = $cursando;
	}

	public function setAprovado($aprovado){
		$this->aprovado = $aprovado;
	}

	public function setLida($lida){
		$this->lida = $lida;
	}
?>
