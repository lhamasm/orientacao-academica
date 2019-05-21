<?php
	class Disciplina {
		private $codigo;
		private $nome;
		private $cargaHoraria;
		private $preRequisitos;
		private $desbloqueia;

		public __construct($codigo, $nome, $cargaHoraria, $preRequisitos, $desbloqueia){
			$this->codigo = $codigo;
			$this->nome = $nome;
			$this->cargaHoraria = $cargaHoraria;
			$this->preRequisitos = $preRequisitos;
			$this->desbloqueia = $desbloqueia;
		}

		public function getCodigo(){
			return $this->codigo;
		}

		public function getNome(){
			return $this->nome;
		}

		public function getCargaHoraria(){
			return $this->cargaHoraria;
		}

		public function getPreRequisitos(){
			return $this->preRequisitos;
		}

		public function setDesbloqueia(){
			return $this->desbloqueia;
		}

		public function setCodigo($codigo){
			$this->codigo = $codigo;
		}

		public function setNome($nome){
			$this->nome = $nome;
		}

		public function setCargaHoraria($cargaHoraria){
			$this->cargaHoraria = $cargaHoraria;
		}

		public function setPreRequisitos($preRequisitos){
			$this->preRequisitos = $preRequisitos;
		}

		public function setDesbloueia($desbloqueia){
			$this->desbloqueia = $desbloqueia;
		}
	}
?>