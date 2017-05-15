<?php include ('header.php');?>
<section>
<?php
$datos = array_map('str_getcsv', file('data/portafolio-academico.csv'));
// pero debo hacer un pequeño ajuste, para eliminar del arreglo el encabezado del imdb-movies.csv
array_walk($datos, function(&$a) use ($datos) {$a = array_combine($datos[0], $a);});
array_shift($datos);
?>
<h3>Profesores</h3>

<p>Según el Reglamento general de carrera académica de la Universidad de Chile, son tres las Categorías Académicas:</p>
<ol>
<li>La <a href="http://www.uchile.cl/portal/presentacion/normativa-y-reglamentos/4860/titulo-ii-de-la-categoria-y-carrera-academica-ordinaria">Categoría Académica Ordinaria</a>, con cinco rangos consecutivos: Ayudante, Instructor, Profesor Asistente, Profesor Asociado y Profesor Titular.</li>
<li>La <a href="http://www.uchile.cl/portal/presentacion/normativa-y-reglamentos/4861/titulo-iii-de-la-categoria-y-carrera-academica-docente">Categoría Académica Docente</a>, con tres rangos consecutivos: Profesor Asistente de Docencia, Profesor Asociado de Docencia y Profesor Titular de Docencia.</li>
<li>La <a href="http://www.uchile.cl/portal/presentacion/normativa-y-reglamentos/4863/titulo-iv-de-la-categoria-academica-adjunta">Categoría Académica Adjunta</a>, con dos rangos: Instructor Adjunto y Profesor Adjunto.</li>
</ol>
<?php
$adjunta = 0;
$ordinaria = 0;
$docente = 0;
$horas = 0;
for ($a = 0; $a < $all = count($datos); $a++) {
  if(substr_count($datos[$a]['Rango'],'Adjunto') > 0){
    $adjunta++;
  }elseif(substr_count($datos[$a]['Rango'],'Docencia') > 0){
    $docente++;
  }else{
    $ordinaria++;
  }
 $horas=$horas+($datos[$a]['Horas']);
}
;?>


<p><strong>Diseño dispone de <?php echo $all;?> académicos</strong>. <?php echo $ordinaria;?> de ellos están en la Categoría Académica Ordinaria, <?php echo $docente;?> están en la Categoría Académica Docente, y <?php echo $adjunta;?> están en la Categoría Académica Adjunta. En proporciones:</p>
<?php
$full_time = 0;
for ($b = 0; $b < $all; $b++) {
if((substr_count($datos[$b]['Rango'],'Adjunto') == 0) && (substr_count($datos[$b]['Rango'],'Docencia') == 0) && ($datos[$b]['Horas'])==44){
$full_time++;
    }
};?>

<br><img src="img/cat-profes.png" class="img-responsive">
</br>

<h4>Jornada</h4>
A continuación, se muestran los profesores agrupados según la cantidad de horas de su jornada de trabajo:
<img src="img/horas-profes.png" class="img-responsive">

<p>De los <?php echo $ordinaria;?> académicos en Categoría Académica Ordinaria, <?php echo $full_time;?> tienen jornada completa. Ellos son:</p>

<ol>
<?php
for ($c = 0; $c < $all; $c++) {
  if((substr_count($datos[$c]['Rango'],'Adjunto') == 0) && (substr_count($datos[$c]['Rango'],'Docencia') == 0) && ($datos[$c]['Horas'])==44){
    echo '<li>'.$datos[$c]["Nombres"].' '.$datos[$c]["Apellidos"].' ('.$datos[$c]["Rango"].')</li>';
  }
};?>
</ol>
<p>Pero si reducimos el listado recién presentado a los que <i>"han demostrado una actividad académica sostenida, capacidad y aptitudes para realizarla en forma autónoma y creativa y dominio de su especialidad"</i>, sólo tenemos:</p>
<ol>
<?php
for ($d = 0; $d < $all; $d++) {
  if((($datos[$d]['Rango']) == "Profesor Asociado") && ($datos[$d]['Horas'])==44){
    echo '<li>'.strstr($datos[$d]["Nombres"], ' ', true).' '.$datos[$d]["Apellidos"].' ('.$datos[$d]["Rango"].')</li>';
  }
};?>
</ol>

<p>Por otra parte, los académicos que <i>"han demostrado una actividad docente sostenida, realizándola en forma autónoma y creativa, con pleno dominio de su especialidad, dando a conocer su experiencia en textos de uso docente"</i> son:</p>
<ol>
<?php
for ($d = 0; $d < $all; $d++) {
  if((($datos[$d]['Rango']) == "Profesor Asociado de Docencia")){
    echo '<li>'.strstr($datos[$d]["Nombres"], ' ', true).' '.$datos[$d]["Apellidos"].' ('.$datos[$d]["Rango"].') ('.$datos[$d]['Horas'].'hrs)</li>';
  }
};?>
</ol>

<p>En promedio, los académicos dedican a sus actividades en Diseño de la Universidad de Chile </p>
<ol>
<h4><?php print_r($horas/$all)
;?> horas.</h4>
</ol>

<ol><?php
$full = 0;
for ($e = 0; $e < $all; $e++) {
if(($datos[$e]['Horas'])==44){
$full++;
    }
};?></ol>

<ol><?php
$part = 0;
for ($e = 0; $e < $all; $e++) {
if(($datos[$e]['Horas'])==22){
$part++;
    }
};?></ol>

<ol><?php
$menor = 0;
for ($e = 0; $e < $all; $e++) {
if(($datos[$e]['Horas']) < 22){
$menor++;
    }
};?></ol>

</ul>
</section>
<?php include ('footer.php');?>
