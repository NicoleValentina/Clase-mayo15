<!DOCTYPE html>
<html lang="es">
<?php
// A continuación encontrarán algunas variables al modo en que son escritas en PHP.
// Sus contenidos son: una palabra; una frase; un valor numérico; y un arreglo simple.
$title = "Diseño Universidad de Chile";
$description_index = "Cuerpo académico de la Universidad de Chile listados por facultad, instituto o áreas de investigación.";
$description_alumnos = "Datos de los estudiantes de Diseño";

$tiempo = 10;
$partes = array("PHP","PHP+CSV","PHP+JSON","PHP+GeoJSON");
?>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo($title);?></title>
<meta name="robots" content="noindex">
<link href="https://fonts.googleapis.com/css?family=Archivo+Black" rel="stylesheet">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrap/style.css" rel="stylesheet">
<?php if((basename($_SERVER['PHP_SELF']))=='php_csv.php'){?>
<style>.col-sm-6:nth-child(2n+1) {clear: both;}</style>
<?php };?>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div class="container">
<div class="row">
<div class="col-sm-10 col-sm-offset-1">
<header>
<div class="masthead clearfix">
<div class="inner">
<h1 class="masthead-brand"><?php echo($title);?></h1>
<nav>
  <ul class="nav masthead-nav">
    <li<?php if((basename($_SERVER['PHP_SELF']))=='index.php'){?> class="active" <?php };?>><a href="index.php">Profesores</a></li>
    <li<?php if((basename($_SERVER['PHP_SELF']))=='alumnos.php'){?> class="active" <?php };?>><a href="alumnos.php">Estudiantes</a></li>
  </ul>
</nav>
</div>
</div>

<?php if((basename($_SERVER['PHP_SELF']))=='index.php'){;?>
<h2><?php echo($description_index);?></h2>
<?php }else{ ?>
  <h2><?php echo($description_alumnos);?></h2>
  <?php };?>

<h2><?php echo($description);?></h2>

</header>
