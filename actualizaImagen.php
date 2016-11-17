<?php

include ('misfunciones.php');
$mysqli = conectaBBDD();

$actualiza_NombreI = $_POST['actualiza_NombreI'];
$actualiza_Descripcion = $_POST['actualiza_Descripcion'];
$actualiza_Nombre_muestra = $_POST['actualiza_Nombre_muestra'];

$mysqli->query('UPDATE imagen SET  Descripcion="'.$actualiza_Descripcion.'", Nombre_muestra="'.$actualiza_Nombre_muestra.'" WHERE Nombre="'.$actualiza_NombreI.'"');


?>
