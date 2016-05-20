<?php

class functest extends PHPUnit_Extensions_Selenium2TestCase{

    protected function setUp(){
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://localhost/Salones/index.php');
    }

    //prueba que exista el link de consulta
    public function testConsultaLink(){
        $this->url('http://localhost/Salones/index.php');
        $cons = $this->byId('consulta')->text();
        $this->assertEquals( "Consultar Horarios", $cons );
    }

    //prueba que exista el link de consulta
    public function testAddLink(){
        $this->url('http://localhost/Salones/index.php');
        $cons = $this->byId('add')->text();
        $this->assertEquals( "Agregar nuevo maestro/clase", $cons );
    }

    /*
    public function testReserved(){
		$this->url( 'http://localhost/Salones/index.php' );
		$form = $this->byName( 'forma' );
		$action = $this->byName( 'forma' )->attribute( 'action' );
		$this->assertEquals( 'http://localhost/Salones/reserved.php', $action );
        $this->byName('Day')->selectOptionByValue('Lunes');
        $this->byName('Class')->selectOptionByValue(1);
        $this->byName('Teacher')->selectOptionByValue(1);
        $this->byName('Block')->selectOptionByValue(1);
		$form->submit();
		$success = $this->byName('result')->text();
		$this->assertEquals( "Hi David Jones", $success );
	}*/

}

?>