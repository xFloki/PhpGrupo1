<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
                 <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/usuarioperfil.css">
<!--           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
  
  
        <script src="js/Chart.js"></script>



    </head>


    <body>



        <?php
        include('misfunciones.php');
        $mysqli = conectaBBDD();
        $DNI = 1;
        $Nombre = 2;
        $Apellidos = 2;
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
        <br>
          <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"
                      style="margin-top:5%; margin-left: 17%">Asignatura
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="margin-left: 17%">
      <li><a href="#" onclick="cargarGrafica('Oveja')">QUIZ</a></li>
      <li><a href="#" onclick="cargarGrafica('Quiz')">MEMORY</a></li>
<!--      <li><a href="#" onclick="cargarGrafica('Oveja')">DRAG</a></li>-->
    </ul>
  </div>


        <div id="canvas-holder" style="margin: 10%;">
            <h2 class="text-center ">Gráfico</h2>
            <canvas id="chart-area4" width="600" height="200"></canvas>
        </div>
        <div class="btn btn-primary btn-block" onclick= "$('div#centro1').load('usuario_progreso.php');"> VOLVER A PERFIL </div>
<!--        <div class="btn btn-primary btn-block" onclick="cargarGrafica('Oveja')"> VIDAS </div>-->
       
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
            window.myPie = new Chart(ctx4).Line(lineChartData, {responsive: true});
            
                               
              function cargarGrafica(_JUEGO){
                
               
        $('#chart-area4').load('cambiarGrafica.php', {
                   
                    JUEGO: _JUEGO
                });
          
               
            }
            
        </script>
        
        
<!--          
    <script src="js/jquery-3.1.0.min.js" /></script>
   <script src="js/jquery-ui-1.8.17.custom.min.js"></script>
    <script src="js/bootstrap.min.js"></script>-->
    
    </body>
</html>