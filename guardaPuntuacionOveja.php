<?php

include ('misfunciones.php');
$mysqli = conectaBBDD();
$CLICK = $_POST['CLICK'];


//En funcion de en el numero de clicks que se haya pasado el juego de Oveja se 
//otorga una nota
//si El juego se ha terminado en 24 clicks o menos se considera un 10 
if ($CLICK <= 24){
    $NOTA = 10;
} else {
    // De lo contrario por cada click superior a los 24 se restara 0,3 puntos a la nota
    //maxima de 10 hasta un minimo de 0
  $CLICK = $CLICK - 24 ;
  //los valors que se le restan por cada click de mas se pueden modificar  gusto del administrador
  //para aumentar o disminuir la dificultad del ejercicio
  $NOTA = 10 - ($CLICK * 0.4);
  if($NOTA < 0){
      $NOTA = 0;
  }
   
}


$dt = new DateTime('Europe/Madrid');
$result = $dt->format('Y-m-d H:i:s');
$mysqli->query("INSERT INTO `puntuacion` (`Alumno`, `Juego`, `Fecha`, `Puntuacion`) VALUES ('1', 'Oveja', '" .$result. "', ". $NOTA . ");");
