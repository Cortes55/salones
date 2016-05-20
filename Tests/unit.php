<?php

include ("/var/www/html/Salones/database.php");
include("/var/www/html/Salones/Asignar.php");
include("/var/www/html/Salones/Datos.php");
include("/var/www/html/Salones/Salon.php");
include("//var/www/html/Salones/Horario.php");

class Test extends PHPUnit_Framework_TestCase
{

    //prueba el metodo set datos de  la clase datos
    public function testSetDatos() {
        $operator = new Datos(1,'Luciano','Calculo');
        $this->assertEquals('Se ha agregado al objeto',$operator->setDatos('Luciano','Calculo'));
    }

    //prueba lo que regresa la funcion getmaster()
    public function testGetTeacher() {
        $operator = new Datos(1,'Luciano','Calculo');
        $this->assertEquals('Luciano',$operator->getMaster());
    }

    //prueba el metodo getSalon de  la clase Salon
    public function testGetSalon() {
        $operator = new Salon(1,'6121','6');
        $this->assertEquals(6121,$operator->getSalon());
    }

    //prueba el metodo getHoraInicio datos de  la clase Horario
    public function testGetBloque() {
        $operator = new Horario(1,'10:45:00','12:15:00');
        $this->assertEquals('10:45:00',$operator->getHoraInicio());
    }

    //prueba el metodo getDay de  la clase Asignar
    public function testGetDay() {
        $operator = new Asignar('Martes',1,1,1);
        $this->assertEquals('Martes',$operator->getDay());
    }
}
?>