<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://bootswatch.com/superhero/bootstrap.min.css">
    <title>Ingresar Nuevo</title>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Ingresar Nuevo Maestro/Clase</a>
    </div>
</nav>

<?php
include ('DBOp.php');
include ('Datos.php');
if($_POST){
    $j=0;
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
 	$op= new DbOp();
 	$teacher=$_POST['teacher'];
 	$class=$_POST['class'];
    $data = new Datos (count($Masta),'','');
    $data->setDatos($teacher,$class); 
 	$op->InsertT($data->getMaster(),$data->getClase());
}
?>
 
<div class='container'>
    <div class="page-header">
    <h1>Ingrese datos:</h1>      
  </div>
<form role='form' action='Add.php' name='forma' method='POST'>
<div class="form-group">
<div class="form-group">
    <a>Nombre Maestro: <input class="form-control" type='text' name='teacher' required/></a>
</div>
<div class="form-group">
    <a>Clase: <input class="form-control" type='text' name='class' required/></a>
</div>
<div class="form-group">
    <input type='submit' class="btn btn-default" value='Enviar' />
</div>
</form>
  <a href='index.php'>Regresar a la pagina principal</a>
</div>
 
</body>
</html>