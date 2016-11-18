<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
      

        <script src="js/Chart.js"></script>


    </head>


    <body>
      


<?php

include('misfunciones.php');
$mysqli = conectaBBDD();
$DNI = $_POST['DNI'];
$Nombre = $_POST['Nombre'];
$Apellidos  = $_POST['Apellidos'];

echo'<img onerror="this.src=\'img/camara.png\';" data-toggle="dropdown" src="img/'
                . $DNI . '.jpg" class="img-thumbnail img-responsive "style=" float:left; vertical-align:middle; width:120px"  >';

echo "<spam><h2 class='text-center'>$DNI</h2>";

echo "<h2 class='text-center'>$Nombre   $Apellidos</h2></spam> <br/>  <br/>  <br/>";

$progreso = array();

//hago la consulta a la BBDD
$consulta_progresos = $mysqli->query("select * from puntuacion where Alumno=".$DNI."");
//saco el numero de usuarios que hay en la bbdd
$num_progresos = $consulta_progresos->num_rows;




//monto un bucle for para cargar en el array los resultados de la query
for ($i = 0; $i < $num_progresos; $i++) {
    $r = $consulta_progresos->fetch_array();
    $progreso[$i][1] = $r['Juego'];
    $progreso[$i][2] = $r['Fecha'];
    $progreso[$i][3] = $r['Puntuacion'];
   
}
$contador = 0;

 echo'
              
                    

            <table class="table table-striped text-center" >
            <tr class="warning">
            
                <td><h4>Juego</h4></td>
                <td><h4>Fecha</h4></td>
                <td><h4>Puntuación</h4></td>
                
                
            </tr>

            
            ';
            for ($i = 0; $i < $num_progresos; $i++) {
                echo'<tr >
            
                     
                     <td style="vertical-align: middle;">' . $progreso[$i ][1] . '</td>
                     <td style="vertical-align: middle;">' . $progreso[$i ][2] . '</td>
                     <td style="vertical-align: middle;">' . $progreso[$i ][3] . '</td>
                     
                         </tr>
                
            ';
                $contador++;
            }

            echo'
        </table>';
            ?>
               

<div id="canvas-holder">
                <h2 class="text-center ">Gráfico</h2>
                <canvas id="chart-area4" width="600" height="150"></canvas>
            </div>
            <script>
                var lineChartData = {
                labels: [
<?php
for ($j = 0; $j < $num_progresos; $j++) {
    echo'"'. $progreso[$j][1]. ' '.$progreso[$j][2].'" ,';
}
?>
                ],
                        datasets: [
                        {
                        label: "Primera serie de datos",
                                fillColor: "rgba(220,220,220,0.2)",
                                strokeColor: "#6b9dfa",
                                pointColor: "#1e45d7",
                                pointStrokeColor: "#fff",
                                pointHighlightFill: "#fff",
                                pointHighlightStroke: "rgba(220,220,220,1)",
                                data:[
<?php
for ($k = 0; $k < $num_progresos; $k++) {
    echo'' . $progreso[$k][3] . ' ,';
}
?>
                                ]
                        }
                        ]

                }


                var ctx4 = document.getElementById("chart-area4").getContext("2d");
                window.myPie = new Chart(ctx4).Line(lineChartData, {responsive: true });
            </script>
    </body>
</html>