<?php

include ('misfunciones.php');
$mysqli = conectaBBDD();
$DNI = $_POST['DNI'];
$mysqli->query("DELETE FROM usuario where DNI = " . $DNI . "");
?>
