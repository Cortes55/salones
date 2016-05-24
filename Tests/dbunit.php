<?php
class UserMapperTest extends PHPUnit_Extensions_Database_TestCase{



protected function getConnection(){
$db;
$host = "localhost";
$db_name = "Assign";
$username = "root";
$password = "alam";
 
try {
    $this-> db = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}
 
// show error
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}

	}

	protected function getDataSet{
		return $this->createFlatXMLDataSet(/var/www/html/Salones/Tests/dbprueba.xml);
	}

	//Carga de Salon prueba  db

	public function testInsertSalon(){
		$userMapper = new UserMapper ($this->db);
		$salon = new Salon();
		$salon->setSalon('5555');
		$userMapper->insert($salon);
		$this->assertEquals(2,$this->getConnection()->getRowCount('Salon'));

		$expected = $this->createFlatXMLDataSet(/var/www/html/Salones/Tests/dbprueba_insert_salon.xml);

		$actual = new PHPUnit_Extensions_Database_QueryDataSet($this->getConnection());
		$actual->addTable('Salon');

		$this->assertDataSetsEqual($expected , $actual);

	}

	//Update Salon test in db 

	public function testUpdateSalon(){
		$userMapper = new UserMapper ($this->db);
		$salon = new salonMapper->findByID(8);
		$salon->setSalon('7890');
		$userMapper->update($salon);
	

		$expectedTable = $this->createFlatXMLDataSet(/var/www/html/Salones/Tests/dbprueba_update_salon.xml)->getTable('Salon');

		$actualTable = $this->getConnection()->createQueryTable('Salon', Select*FROM classNumber);

		$this->assertTablesEqual($expectedTable , $actualTable);

	}

	//delete  Salon test 


public function testRemoveSalon(){
		$userMapper = new UserMapper ($this->db);
		$salon = $userMapper->findByID(8);
		$userMapper->delete($salon);
		
		$this->assertEquals(0, $this->getConnection()->getRowCount('Salon'));
}
	//Carga de Maestro prueba  db

	public function testInsertTeacher(){
		$userMapper = new UserMapper ($this->db);
		$teacher = new Teacher();
		$teacher->setTeachername('Alambrito');
		$userMapper->insert($teacher);
		$this->assertEquals(2,$this->getConnection()->getRowCount('Datos'));

		$expected = $this->createFlatXMLDataSet(/var/www/html/Salones/Tests/dbprueba_insert.xml);

		$actual = new PHPUnit_Extensions_Database_QueryDataSet($this->getConnection());
		$actual->addTable('Datos');

		$this->assertDataSetsEqual($expected , $actual);

	}

	//Update Teacher test in db 

	public function testUpdateTeacher(){
		$userMapper = new UserMapper ($this->db);
		$teacher = new teacherMapper->findByID(17);
		$teacher->setTeachername('Alam');
		$userMapper->update($teacher);
	

		$expectedTable = $this->createFlatXMLDataSet(/var/www/html/Salones/Tests/dbprueba_update.xml)->getTable('Datos');

		$actualTable = $this->getConnection()->createQueryTable('teacher', Select*FROM teacher);

		$this->assertTablesEqual($expectedTable , $actualTable);

	}

	//delete  Teacher test 


public function testRemoveTeacher(){
		$userMapper = new UserMapper ($this->db);
		$teacher = $userMapper->findByID(17);
		$userMapper->delete($teacher);
		
		$this->assertEquals(0, $this->getConnection()->getRowCount('Datos'));
}

}
?>