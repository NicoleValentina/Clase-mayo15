<?php include ('header.php');?>
<section>
<?php
$datos = array_map('str_getcsv', file('data/portafolio-academico.csv'));
// pero debo hacer un pequeño ajuste, para eliminar del arreglo el encabezado del imdb-movies.csv
array_walk($datos, function(&$a) use ($datos) {$a = array_combine($datos[0], $a);});
array_shift($datos);
?>
<h3>Estudiantes</h3>

<h4>Ingreso: ponderación</h4>
<p>El gráfico que se despliega a continuación, muestra las <b style="color:#69b0bf;">máximas</b> y <b style="color:#bf6978;">mínimas</b> ponderaciones de ingreso a la carrera de Diseño, entre los años 2012 y 2016.</p>
<img src="img/ponderaciones.png" class="img-responsive">
<br></br>
<h4>Ingreso: región de procedencia</h4>
A continuación, se muestra la cantidad de estudiantes de la <b style="color:#adadad;">Región Metrpolitana</b> vs. estudiantes de <b style="color:#69bf69;">otras regiones</b> (<b style="color:#9469bf;">Sin información</b>):
<img src="img/procedencia.png" class="img-responsive">
<br></br>
<h4>Ingreso: colegio de procedencia</h4>
Cantidad de ingresos desde <b style="color:#bf6969;">Colegios Municipales</b>, <b style="color:#94bf69;">Colegios Particulares Subvencionados</b>,
<b style="color:#69bfbf;">Colegios Particulares</b> e <b style="color:#9469bf;">Ingreso Especial</b>:
<img src="img/colegio.png" class="img-responsive">
<br></br>
<h4>Matricula y deserción</h4>
<p>Total de <b style="color:#fcde3e;">matrículas</b> entre los años 2013 y 2015</p>
<img src="img/matricula.png" class="img-responsive">
<br></br>
<b style="color:#69bfbf;">Eliminaciones</b> y <b style="color:#bf6969;">renuncias</b>, durante el mísmo período de tiempo:
<img src="img/desercion.png" class="img-responsive">
<br></br>


</section>
<?php include ('footer.php');?>
