<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://bootswatch.com/superhero/bootstrap.min.css">
    <title>Ingresar Nuevo Salon</title>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Ingresar Nuevo Salon</a>
    </div>
</nav>

<?php
include ('DBOp.php');
include ('Salon.php');
if($_POST){
    $j=0;
    $op= new DbOp();
    $classroom=$_POST['classroom'];
    $building=$_POST['building'];
    $query = "SELECT * FROM Salon WHERE classNumber=" . $classroom ."";
    $stmt = $con->prepare($query);
    $stmt->execute();
    $num = $stmt->rowCount();
    if($num>0){
            echo "<div>Salon ya se encuentra registrado </div>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    $Class[$j] = new Salon($id,$classNumber,$building);
                    $j++;
            }
    }else{
        $op->insertS($classroom,$building);
    }
}
?>
 
<div class='container'>
    <div class="page-header">
    <h1>Ingrese datos:</h1>      
  </div>
<form role='form' action='AddSalon.php' name='forma' method='POST'>
<div class="form-group">
<div class="form-group">
    <a>Salon: <input class="form-control" type='text' name='classroom' required/></a>
</div>
<div class="form-group">
    <a>Edificio: <input class="form-control" type='text' name='building' required/></a>
</div>
<div class="form-group">
    <input type='submit' class="btn btn-default" value='Enviar' />
</div>
</form>
  <a href='index.php'>Regresar a la pagina principal</a>
</div>
 
</body>
</html>