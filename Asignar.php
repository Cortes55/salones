<?php

class Asignar{

	protected $dia;
	protected $class;
	protected $teacher;
	protected $block;

	public function __construct ( $d, $c, $t, $b) {
	$this->dia = $d;
	$this->class = $c;
	$this->teacher = $t;
	$this->block = $b;
	}

	public function getDay(){
		return $this->dia ;
	}

	public function getClass(){
		return $this->class ;
	}

	public function getTeacher(){
		return $this->teacher ;
	}

	public function getBlock(){
		return $this->block; 
	}

}

?>