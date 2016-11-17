<?php

include ('misfunciones.php');
$mysqli = conectaBBDD();
$actualiza_DNI = $_POST['actualiza_DNI'];
$actualiza_Nombre = $_POST['actualiza_Nombre'];
$actualiza_Apellidos = $_POST['actualiza_Apellidos'];
$actualiza_Email = $_POST['actualiza_Email'];

$mysqli->query('UPDATE usuario SET DNI="'.$actualiza_DNI.'", Nombre="'.$actualiza_Nombre.'", Apellidos="'.$actualiza_Apellidos.'", Email="'.$actualiza_Email.'" WHERE DNI="'.$actualiza_DNI.'"');
?>
