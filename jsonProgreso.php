<?php

include ('./misfunciones.php');

    $mysqli = conectaBBDD();

    $result = $mysqli->query("SELECT * FROM puntuacion where Juego = 'Oveja'");
          

    while($row = mysqli_fetch_array($result)) {
        $value = $row['Puntuacion'];
        $timestamp = strtotime($row['tiempo']);
        $data[] = [$timestamp, (int)$value];
    }   

   
    
    print json_encode($data)
    
    ?>
