<?php

include ('misfunciones.php');
$mysqli = conectaBBDD();
$agrega_DNI = $_POST['agrega_DNI'];
$agrega_Nombre = $_POST['agrega_Nombre'];
$agrega_Apellidos = $_POST['agrega_Apellidos'];
$agrega_Email = $_POST['agrega_Email'];

$mysqli->query('INSERT INTO usuario(DNI, Tipo, Nombre, Apellidos, Email, Password) VALUES ("'.$agrega_DNI.'",0,"'.$agrega_Nombre.'","'.$agrega_Apellidos.'","'.$agrega_Email.'","'.$agrega_DNI.'")');



?>
