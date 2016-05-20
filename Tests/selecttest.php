<?php

class selecttest extends PHPUnit_Extensions_Selenium2TestCase{

    protected function setUp(){
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://localhost/Salones/index.php');
    }

    //prueba que el maestro este reservado en asignar
    public function testReservedTeacher(){
		$this->url( 'http://localhost/Salones/index.php' );
		$form = $this->byName( 'forma' );
		$action = $this->byName( 'forma' )->attribute( 'action' );
		$this->assertEquals( 'http://localhost/Salones/reserved.php', $action );
        $this->select($this->byName('Day'))->selectOptionByValue('Lunes');
        $this->select($this->byName('Class'))->selectOptionByValue(2);
        $this->select($this->byName('Block'))->selectOptionByValue(1);
		$form->submit();
		$success = $this->byId('result')->text();
		$this->assertEquals( 'El maestro ya esta asignado en este horario', $success );
	}

    //prueba que exista que el salon este reservado en asignar
    public function testReservedClassroom(){
        $this->url( 'http://localhost/Salones/index.php' );
        $form = $this->byName( 'forma' );
        $action = $this->byName( 'forma' )->attribute( 'action' );
        $this->assertEquals( 'http://localhost/Salones/reserved.php', $action );
        $this->select($this->byName('Day'))->selectOptionByValue('Lunes');
        $this->select($this->byName('Teacher'))->selectOptionByValue(4);
        $this->select($this->byName('Class'))->selectOptionByValue(2);
        $this->select($this->byName('Block'))->selectOptionByValue(1);
        $form->submit();
        $success = $this->byId('result')->text();
        $this->assertEquals( 'El salon ya esta asignado en este horario', $success );
    }

    //prueba metiendo un nuevo registro en la db ESTA COMENTADO POR QUE SI CORRE HAY QUE CAMBIAR LOS DATOS!!!!!!!!!!!!
    /*
    public function testReservedSucess(){
        $this->url( 'http://localhost/Salones/index.php' );
        $form = $this->byName( 'forma' );
        $action = $this->byName( 'forma' )->attribute( 'action' );
        $this->assertEquals( 'http://localhost/Salones/reserved.php', $action );
        $this->select($this->byName('Day'))->selectOptionByValue('Viernes');
        $this->select($this->byName('Teacher'))->selectOptionByValue(1);
        $this->select($this->byName('Class'))->selectOptionByValue(1);
        $this->select($this->byName('Class'))->selectOptionByValue(1);
        $form->submit();
        $success = $this->byId('result')->text();
        $this->assertEquals( 'Se ha agregado a la base de datos', $success );
    }*/
}




?>