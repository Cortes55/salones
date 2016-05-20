<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://bootswatch.com/superhero/bootstrap.min.css">
	<title>Resultados Busqueda</title>
</head>
<body>

<nav class="navbar navbar-default">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Consultar Horarios</a>
    </div>
</nav>

<?php

include ('Asignar.php');
include ('database.php');
include ('Horario.php');
include ('Datos.php');
include ('Salon.php');

$day=$_POST['Day'];
$class=$_POST['Class'];
$block=$_POST['Block'];
$i=0;
$j=0;
$k=0;
$l=0;

if(isset($_POST['Day'])){
	$query = "SELECT * FROM Asignadas WHERE  Day= '" . $day . "'";
}elseif(isset($_POST['Day']) || isset($_POST['Class'])){
	$query = "SELECT * FROM Asignadas WHERE  Day= '" . $day . "' AND Class = " . $class . "";
}elseif(isset($_POST['Day']) || isset($_POST['Block'])){
	$query = "SELECT * FROM Asignadas WHERE  Day= '" . $day . " AND BLOCK = " . $block ."";
}elseif(isset($_POST['Day']) || isset($_POST['Block']) || isset($_POST['Class'])){
	$query = "SELECT * FROM Asignadas WHERE  Day= '" . $day . "' AND Class = " . $class . " AND BLOCK = " . $block ."";
}elseif(isset($_POST['Class'])){
	$query = "SELECT * FROM Asignadas WHERE  Class= '" . $class . "";
}elseif(isset($_POST['Block'])){
	$query = "SELECT * FROM Asignadas WHERE  Block= '" . $block . "";
}
elseif(isset($_POST['Class'])||isset($_POST['Block'])){
	$query = "SELECT * FROM Asignadas WHERE  Class = " . $class . " AND BLOCK = " . $block ."";
}else{
	echo"<div class='container'>";
	echo"No se selecciono ninguna opcion.";
	echo"</div>";
}

$stmt = $con->prepare($query);
$stmt->execute();
$num = $stmt->rowCount();
if($num>0){
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
     		extract($row);
     		$Results[$l] = new Asignar($Day,$Class,$Teacher,$Block);
     		$l++;
    }

$query = "SELECT id, classNumber, building FROM Salon";
$stmt = $con->prepare($query);
$stmt->execute();
$num = $stmt->rowCount();
if($num>0){
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
         		extract($row);
                $Classroom[$i] = new Salon($id,$classNumber,$building);
                $i++;
        } 
}

$query = "SELECT teacherid, teacher, class FROM Datos";
$stmt = $con->prepare($query);
$stmt->execute();
$num = $stmt->rowCount();
if($num>0){
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
         		extract($row);
         		$Masta[$j] = new Datos($teacherid,$teacher,$class);
         		$j++;
        }
}

$query = "SELECT Block, Start, End FROM Horario";
$stmt = $con->prepare($query);
$stmt->execute();
$num = $stmt->rowCount();
if($num>0){
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
         		extract($row);
         		$Bloque[$k] = new Horario($Block,$Start,$End);
         		$k++;
        }
}	

	echo "<div class='container'>
	<div id='result'>Resultados</div>          
	<table class='table table-hover'>
	<thead>
	<tr>
	<th>Dia</th>
	<th>Salon</th>
	<th>Maestro</th>
	<th>Clase</th>
	<th>Hora Inicio</th>
	<th>Hora Fin</th>
	</tr>
	</thead>
	<tbody>";
		for ($a=0;$a<count($Results);$a++){
			echo"<tr>";

			$Clase = $Results[$a]->getClass();
			$Maestro = $Results[$a]->getTeacher();
			$Hora = $Results[$a]->getBlock();

			/*print_r($Results[$a]->getDay());
			print_r($Clase);
			print_r($Maestro);
			print_r($Hora);*/
			
			echo "<td>" . $Results[$a]->getDay() . "</td>";
			echo "<td>" . $Classroom[$Clase-1]->getSalon() . "</td>";
			echo "<td>" . $Masta[$Maestro-1]->getMaster() . "</td>";
		 	echo "<td>" . $Masta[$Maestro-1]->getClase() . "</td>";
		 	echo "<td>" . $Bloque[$Hora-1]->getHoraInicio() . "</td>";
		 	echo "<td>" . $Bloque[$Hora-1]->getHoraFin() . "</td>";
		 	echo "</tr>";
		}
	echo "</tbody>
	</table>
	</div>";
    }else{
    	echo"<div class='container'>";
    	echo "<div id='result'>No hay resultados</div>";
    	echo "</div>";
    }

?>
<div class='container'>
<br>
<a href='index.php'>Regresar a la pagina principal</a>
</div>
</body>
</html>