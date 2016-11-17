<?php

include ('misfunciones.php');
$mysqli = conectaBBDD();

$agrega_NombreI = $_POST['agrega_NombreI'];
$agrega_Descripcion = $_POST['agrega_Descripcion'];
$agrega_Nombre_muestra = $_POST['agrega_Nombre_muestra'];

$mysqli->query('INSERT INTO imagen (Nombre,Descripcion,Categoria,Nombre_muestra) VALUES ("'.$agrega_NombreI.'","'.$agrega_Descripcion.'",0,"'.$agrega_Nombre_muestra.'");');


?>
