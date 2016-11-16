<?php

include ('misfunciones.php');
$mysqli = conectaBBDD();
$Nombre = $_POST['Nombre'];
$mysqli->query("DELETE FROM imagen where Nombre = '" . $Nombre . "'");

?>
