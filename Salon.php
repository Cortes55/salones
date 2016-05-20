<?php

class Salon{

	protected $id;
	protected $edificio;
	protected $salon;

	public function __construct ( $i, $sa, $ed) {
	$this->id = $i;
	$this->salon = $sa;
	$this->edificio = $ed;
	}

	public function getSalonId(){
		return $this->id;
	}

	public function getEdificio(){
		return $this->edificio;
	}

	public function getSalon(){
		return $this->salon;
	}

}

?>