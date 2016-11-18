<?php
session_start();
include ('misfunciones.php');
$mysqli = conectaBBDD();
$VIDAS = $_POST['VIDAS'];
$ACIERTOS = $_POST['ACIERTOS'];
$USUARIO = $_SESSION['DNI'];

$FALLOS = 5 - $VIDAS;

if($VIDAS>0){
    $NOTA  = 10 - $FALLOS ;
} else {
    $NOTA = $ACIERTOS * 0.5;
}


$dt = new DateTime('Europe/Madrid');
$result = $dt->format('Y-m-d H:i:s');
$mysqli->query("INSERT INTO `puntuacion` (`Alumno`, `Juego`, `Fecha`, `Puntuacion`) VALUES ('". $USUARIO ."', 'Quiz', '" .$result. "', ". $NOTA . ");");

?>

<script>
 $("#centro1").load("finExamenQuiz.php",{                            
        });
</script>
