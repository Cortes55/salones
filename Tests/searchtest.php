<?php

class searchtest extends PHPUnit_Extensions_Selenium2TestCase{

    protected function setUp(){
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://localhost/Salones/Search.php');
    }

    //prueba que el maestro este reservado en asignar
    public function testReservedTeacher(){
		$this->url( 'http://localhost/Salones/Search.php' );
		$form = $this->byName( 'forma' );
		$action = $this->byName( 'forma' )->attribute( 'action' );
		$this->assertEquals( 'http://localhost/Salones/Results.php', $action );
        $this->select($this->byName('Day'))->selectOptionByValue('Lunes');
        $form->submit();
        $success = $this->byId('result')->text();
        $this->assertEquals( 'Resultados', $success );
	}

    //prueba que exista que el salon este reservado en asignar
    public function testReservedClassroom(){
        $this->url( 'http://localhost/Salones/Search.php' );
        $form = $this->byName( 'forma' );
        $action = $this->byName( 'forma' )->attribute( 'action' );
        $this->assertEquals( 'http://localhost/Salones/Results.php', $action );
        $this->select($this->byName('Day'))->selectOptionByValue('Jueves');
        $this->select($this->byName('Class'))->selectOptionByValue(3);
        $this->select($this->byName('Block'))->selectOptionByValue(3);
        $form->submit();
        $success = $this->byId('result')->text();
        $this->assertEquals( 'No hay resultados', $success );
    }

}

?>