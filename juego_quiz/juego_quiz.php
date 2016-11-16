<!DOCTYPE html>
<!--
Autor: Alejandro Dietta Martin 1ºDAM
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>QUIZZ EJEMPLO PHP</title>
        <link rel="stylesheet" href="juego_quiz/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="juego_quiz/css/bootstrap-theme.min.css" type="text/css">
        <link rel="stylesheet" href="juego_quiz/js/jquery.raty.css" />
    </head>
    <body>
  
        <?php
        include('./funciones_quiz.php');
        $mysqli = conectaBBDD();

        $consulta = $mysqli->query("SELECT * FROM juegoadivina ;");
        $num_filas = $consulta->num_rows;
        $listaPreguntas = array();

        for ($i = 0; $i < $num_filas; $i++) {
            $resultado = $consulta->fetch_array();


            $listaPreguntas[$i][1] = $resultado['nivel'];
            $listaPreguntas[$i][2] = $resultado['tema'];       
            $listaPreguntas[$i][3] = $resultado['r1'];
            $listaPreguntas[$i][4] = $resultado['r2'];
            $listaPreguntas[$i][5] = $resultado['r3'];
            $listaPreguntas[$i][6] = $resultado['r4'];
            $listaPreguntas[$i][7] = $resultado['correcta'];
            $listaPreguntas[$i][8] = $resultado['imagenio'];
        }

        $consulta = $mysqli->query("SELECT * FROM juegoadivina group by tema;");
        $num_filas = $consulta->num_rows;
        $listaTemas = array();
        for ($i = 0; $i < $num_filas; $i++) {
            $resultado = $consulta->fetch_array();
            $listaTemas[$i] = $resultado['tema'];
        }



        // en este punto tenemos en el array todas las preguntas y sus respuestas
//            $numeros = range(3, 6);
//            Author: Alejandro Dietta
//            shuffle($numeros);
//            foreach ($numeros as $numero) {
//                echo "$numero ";
//            }
        ?>

        <div class="container" >
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <br><br>
                    <h3 align="center" id="enunciado"  ></h3>
                    <br><br>
                    <button id="r1" class="btn btn-block  btn-primary-outline" ></button> 

                    <button id="r2" class="btn btn-block  btn-primary-outline" ></button> 

                   
                    <br><br>
                   
                    <h3 align="center">Nivel</h3>
<!--                    <button id="siguiente" class="btn btn-block btn-info">Siguiente</button> -->

                </div>
                <div class="col-md-3"></div>
            </div>



            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-1"><br>   
                    <button  class="btn btn-block btn-primary" onclick="compruebaNivel(1)">1</button>  </div>
                <div class="col-md-1"> <br>                  
                <button  class="btn btn-block btn-primary" onclick="compruebaNivel(2)">2</button> </div>
                <div class="col-md-1"> <br>                      
                 <button class="btn btn-block btn-primary" onclick="compruebaNivel(3)">3</button> </div>
                <div class="col-md-1"><br>                    
                 <button class="btn btn-block btn-primary" onclick="compruebaNivel(4)">4</button> </div>                
                <div class="col-md-4"></div>
            </div>
              </div>



            <script src="juego_quiz/js/jquery.raty.js"></script>
            <script src="juego_quiz/js/jquery-1.12.0.min.js"></script>
            <script src="juego_quiz/js/bootstrap.min.js"></script>
            <script>
                            var arrayPreguntas;
                            var listaRespuestas = [3, 4, 5, 6];
                            var pregunta;
                           var nivel;
                           var tema;
                            var arrayPreguntasDefinitivas = new Array();



                            //desordena un array
                            function desordena(o) { //v1.0
                                for (var ja, xa, ia = o.length; ia; ja = Math.floor(Math.random() * ia), xa = o[--ia], o[ia] = o[ja], o[ja] = xa)
                                    ;
                                return o;
                            }
                            ;

                

                            //Metodo para guardar el tema que se ha seleccionado
                            function comprobarTema(n) {
                                tema;
                                switch (n) {
                                    case 0:
                                        tema = <?php echo json_encode($listaTemas[0]); ?>;
                                        break;
                                    case 1:
                                        tema = <?php echo json_encode($listaTemas[1]); ?>;
                                        break;
                                    
                                }
                               
                               
                            }
                            
                            //Funcion que ira en los Botones de nivel y en funcion del boton pasar un numero de nivel u otro
                            //esto ocurre si previamente hemos seleccionado un tema y posteriormente nos carga la pagina test.php
                            //en el Div con el id container
                            function compruebaNivel(n){
                            if(tema){
                                nivel = n;                             
                                 $('#centro1').load('juego_quiz/test_quiz.php', {
                                  temaSeleccionado: tema, nivelSeleccionado: nivel                                   
                               });
                           } else {
                               alert("Selecciona un tema melon!");
                           }

                            }



                            function preguntaTema() {

                                $('#enunciado').html("Selecciona uno de los siguientes Temas y una Dificultad");

                                $('#r1').html(arrayTemas[0])
                                        .click(function () {
                                            comprobarTema(0);
                                        });
                                $('#r2').html(arrayTemas[1])
                                        .click(function () {
                                            comprobarTema(1);
                                        });
                                
                            }



                            $(document).ready(function () {
                                arrayTemas = <?php echo json_encode($listaTemas); ?>;
                                arrayPreguntas = <?php echo json_encode($listaPreguntas); ?>;

                                preguntaTema();
                                //            cambiaPregunta();


                            });

            </script>
    </body>
</html>
