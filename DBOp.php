  <?php
    include 'database.php';

class DBOp
{

  public function InsertT($t, $c){
        try{

            $query = "INSERT INTO Datos SET teacher=:teacher, class=:class";

            $host = "localhost";
            $db_name = "Assign";
            $username = "root";
            $password = "alam";
            try {
                $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
                }
                catch(PDOException $exception){
                echo "Connection error: " . $exception->getMessage();
                }

                $stmt = $con->prepare($query);
                $teacher=$t;
                $class=$c;
                $stmt->bindParam(':teacher', $teacher);
                $stmt->bindParam(':class', $class);
                 
                if($stmt->execute()){
                   echo "Se ha agregado a la base de datos.";
                }else{
                    echo 'No se ha podido agregar a la base de datos.';
                } 
            }
            catch(PDOException $exception){
            die('ERROR: ' . $exception->getMessage());
        }
    }

  public function InsertS($t, $c){
        try{

            $query = "INSERT INTO Salon SET classNumber=:classNumber, building=:building";

            $host = "localhost";
            $db_name = "Assign";
            $username = "root";
            $password = "alam";
            try {
                $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
                }
                catch(PDOException $exception){
                echo "Connection error: " . $exception->getMessage();
                }

                $stmt = $con->prepare($query);
                $classn=$t;
                $building=$c;
                $stmt->bindParam(':classNumber', $classn);
                $stmt->bindParam(':building', $building);
                 
                if($stmt->execute()){
                   echo "Se ha agregado a la base de datos.";
                }else{
                    echo 'No se ha podido agregar a la base de datos.';
                } 
            }
            catch(PDOException $exception){
            die('ERROR: ' . $exception->getMessage());
        }
    }

    public function InsertD($d, $c, $t, $b){
        try{

            $query = "INSERT INTO Asignadas SET Day=:Day, Class=:Class, Teacher=:Teacher, Block=:Block";

            $host = "localhost";
            $db_name = "Assign";
            $username = "root";
            $password = "alam";
            try {
                $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
                }
                catch(PDOException $exception){
                echo "Connection error: " . $exception->getMessage();
                }

                $stmt = $con->prepare($query);
                $Day=$d;
                $Class=$c;
                $Teacher=$t;
                $Block=$b;
                $stmt->bindParam(':Day', $Day);
                $stmt->bindParam(':Class', $Class);
                $stmt->bindParam(':Teacher', $Teacher);
                $stmt->bindParam(':Block', $Block);
                 
                if($stmt->execute()){
                   echo "Se ha agregado a la base de datos";
                }else{
                    echo 'No se ha podido agregar a la base de datos';
                } 
            }
            catch(PDOException $exception){
            die('ERROR: ' . $exception->getMessage());
        }
    }
} 

?>