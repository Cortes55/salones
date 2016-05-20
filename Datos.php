<?php

class Datos{

	protected $id;
	protected $maestro;
	protected $clase;

	public function __construct ( $i, $m, $cl) {
		$this->id = $i;
		$this->maestro = $m;
		$this->clase = $cl;
	}

	public function setDatos( $m, $cl) {
		$this->maestro = $m;
		$this->clase = $cl;
		return "Se ha agregado al objeto";
	}

	public function getDatosId(){
		return $this->id ;
	}

	public function getMaster(){
		return $this->maestro ;
	}

	public function getClase(){
		return $this->clase ;
	}

}

?>