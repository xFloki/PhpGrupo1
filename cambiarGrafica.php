<?php

include ('misfunciones.php');
$mysqli = conectaBBDD();
$DNI = $_POST['DNI'];

$progreso = array();

//hago la consulta a la BBDD
        $consulta_progresos = $mysqli->query("select * from puntuacion where Alumno=" . $DNI . " limit 10");
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
        
        ?>

  <script>
            var lineChartData = {
                labels: [
<?php
for ($j = 0; $j < $num_progresos; $j++) {
    echo'"' . $progreso[$j][1] . ' ' . $progreso[$j][2] . '" ,';
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
                        data: [
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
            window.myPie = new Chart(ctx4).Line(lineChartData, {
            responsive: true,
            // Hacemos override para que el valor maximo de la grafica sea 10 
            // y el minimo 0
            scaleOverride : true,
        scaleSteps : 1,
        scaleStepWidth : 10,
        scaleStartValue : 0
            
            });
            
