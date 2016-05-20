<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://bootswatch.com/superhero/bootstrap.min.css">
	<title>Reservar Salon</title>
</head>
<body>

<nav class="navbar navbar-default">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Consultar Horarios</a>
    </div>
</nav>

<?php
	include ('database.php');
	include ('Asignar.php');
	include ('DBOp.php');

    //print_r( $_POST);
 	$op= new DbOp();
 	$day=$_POST['Day'];
 	$class=$_POST['Class'];
 	$teacher=$_POST['Teacher'];
 	$block=$_POST['Block'];

 	$query = "SELECT * FROM Asignadas WHERE  Day= '" . $day . "' AND 
 	TEACHER = " . $teacher . " AND BLOCK = " . $block ."";
    $stmt = $con->prepare($query);
    $stmt->execute();
    $num = $stmt->rowCount();
    if($num>0){
            echo "<p id='result' >El maestro ya esta asignado en este horario</p>";
    }else{
    	$query = "SELECT * FROM Asignadas WHERE  Day= '" . $day . "' AND Class = " . $class . " AND BLOCK = " . $block ."";
	    $stmt = $con->prepare($query);
	    $stmt->execute();
	    $num = $stmt->rowCount();
	    if($num>0){
            echo "<p id='result' >El salon ya esta asignado en este horario</p>";
    }else{
        echo "<p id='result'>";
    	$op->InsertD($day, $class, $teacher, $block);
        echo "</p>";
    	}
    }


?>
<br>
<a href='index.php'>Regresar a la pagina principal</a>
</body>
</html>