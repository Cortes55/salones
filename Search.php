<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://bootswatch.com/superhero/bootstrap.min.css">
	<title>Busqueda Salon</title>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Consultar Horarios</a>
    </div>
</nav>
<div class='container'>
	<div class="page-header">
    <h1>Ingrese datos:</h1>      
  </div>
<form role='form' action='Results.php' name='forma' method='POST'>
<div class="form-group">
    <h4>Día: </h4>
    <select name='Day' class='form-control'>
    <option disabled selected value> ---- </option>
   	<option value='Lunes'>Lunes</option>
   	<option value='Martes'>Martes</option>
   	<option value='Miercoles'>Miercoles</option>
   	<option value='Jueves'>Jueves</option>
   	<option value='Viernes'>Viernes</option>
 	</select>
</div>

<?php

include ('Asignar.php');
include ('database.php');
include ('Horario.php');
include ('Datos.php');
include ('Salon.php');

$i=0;
$j=0;
$k=0;

$query = "SELECT id, classNumber, building FROM Salon";
$stmt = $con->prepare($query);
$stmt->execute();
$num = $stmt->rowCount();
if($num>0){
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
         		extract($row);
                $Class[$i] = new Salon($id,$classNumber,$building);
                $i++;
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

echo "<h4> Seleccione salon: </h4>";
echo "<select name='Class' class='form-control'>";
echo "<option disabled selected value> ---- </option>";
for ($a=0;$a<count($Class);$a++){
    echo" <option value=" . $Class[$a]->getSalonId() . ">" . $Class[$a]->getSalon() . "</option>";
}
echo "</select>";

echo"<h4> Seleccione Bloque: </h4>";
echo "<select name='Block' class='form-control'>>";
echo "<option disabled selected value> ---- </option>";
for ($a=0;$a<count($Bloque);$a++){
    echo" <option value=" . $Bloque[$a]->getBloque() . "> Bloque " . $Bloque[$a]->getBloque() . ": " . 
    $Bloque[$a]->getHoraInicio() . " - " . $Bloque[$a]->getHoraFin() . "</option>";
}
echo "</select>";

?>
<br>
<div class="form-group">
            <input type='submit' class="btn btn-default" value='Enviar' />
            </div>
        </form>
<a href='index.php'>Regresar a la pagina principal</a>
</div>
</body>
</html>