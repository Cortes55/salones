<?php

class Horario{

	protected $bloque;
	protected $horaInicio;
	protected $horaFin;

	public function __construct ( $b, $hi, $hf) {
	$this->bloque = $b;
	$this->horaInicio = $hi;
	$this->horaFin = $hf;
	}

	public function getBloque(){
		return $this->bloque ;
	}

	public function getHoraInicio(){
		return $this->horaInicio ;
	}

	public function getHoraFin(){
		return $this->horaFin ;
	}
}

?>