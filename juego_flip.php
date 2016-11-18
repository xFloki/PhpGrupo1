<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
<!--        <meta charset="utf-8"></meta>
        <meta name="viewport" content="width=device-width, initial-scale=1"></meta>
        <title>Flip</title>-->
        <link rel="stylesheet" href="css/styleFlip.css"/> 
<!--        <link rel="stylesheet" href="css/bootstrap.min.css"  />-->


    </head>
    <body background="img/background.png">
        <br></br>
     
         <br></br>
          <br></br>
        <?php
        include ('./misfunciones.php');

        $mysqli = conectaBBDD();
//// ejemplo de volcado de una query a un array en php
////creo el array
        $imagenes = array();

//hago la consulta a la BBDD
        $consulta_usuarios = $mysqli->query("select * from imagen");
//saco el numero de usuarios que hay en la bbdd
        $num_usuarios = $consulta_usuarios->num_rows;


        $num_usuarios_dividido = $num_usuarios / 8;


//monto un bucle for para cargar en el array los resultados de la query
        for ($i = 0; $i < $num_usuarios; $i++) {
            $r = $consulta_usuarios->fetch_array();
            $imagenes[$i][0] = $r['Nombre'];
            $imagenes[$i][1] = $r['Descripcion'];
            $imagenes[$i][3] = $r['Nombre_muestra'];
        }
        $contador = 0;

//ahora voy a usar los datos en un ejemplo     
        ?>
        <div id="main"  style="margin:0px 10% 0 10%" >
            <div class="row  ">
                <?php
// Looping through the array:
                ?>


                <div id="myCarousel" class="carousel slide"  data-interval="false" >


                    <!-- Carousel items -->
                    <div class="carousel-inner ">

                        <?php
// Looping through the array:
//                        shuffle($imagenes);


                        for ($j = 0; $j < floor($num_usuarios_dividido); $j++) {
                            if ($j == 0) {
                                $active = "active";
                            } else {
                                $active = "";
                            }
                            echo'
        <div class="' . $active . ' item">';


                            for ($i = 0; $i < 8; $i++) {
                                echo'
             <div class="col-lg-3 col-md-6 col-xs-12 col-sm-6 text" style="height:290px;   "  >
                <div id="card-' . $i . '">
                    <br/>
                    <div class="front"> 
                        <img class="img2" src="' . $imagenes[$contador][0] . '" ></img>
                    </div> 

                    <div class="back"> 
                        <h5 style="margin:15px; color: #46b8da;">' . $imagenes[$contador][3] . '</h5>
                      <p style="margin:18px;"> ' . $descripcion = substr($imagenes[$contador][1], 0, 140) . '
                        <button style="color:white;"onclick="myFunction(\'' . $contador . '\')" type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal">...</button></p>

                    </div> 
                </div>
            </div>
            

            ';
                                $contador = $contador + 1;
                            }

                            echo'
                                
        </div>
        



                        ';


                            echo'
        <div class=" item">';


                            if (($num_usuarios % 8) != 0) {
                                for ($k = 0; $k < ($num_usuarios % 8); $k++) {

                                    echo'
             <div class="col-lg-3 col-md-6 col-xs-12 col-sm-6" style="height:290px;   "  >
                <div id="card-' . $k . '">
                    <br/>
                    <div class="front"> 
                        <img class="img2" src="' . $imagenes[$contador][0] . '" ></img>
                    </div> 

                    <div class="back"> 
                        <h5 style="margin:15px; color: #46b8da; ">' . $imagenes[$contador][3] . '</h5>
                      <p> ' . $descripcion = substr($imagenes[$contador][1], 0, 200) . '
                        <button style="color:white;" onclick="myFunction(\'' . $contador . '\')" type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal">...</button></p>
                    </div> 
                </div>
            </div>
            
            ';
                                    $contador = $contador + 1;
                                }
                                for ($k = 0; $k < (8-($num_usuarios % 8)); $k++) {

                                    echo'
             <div class="col-lg-3 col-md-6 col-xs-12 col-sm-6" style="height:290px;   "   >
                <div id="card-' . $k . '">
                    <br/>
                   
                </div>
            </div>
            
            ';
                                   
                                }
                            }

                            echo'
                                
        </div>
                        ';
                        }
                        ?>
                        
                        <ol  class="carousel-indicators">
                            <?php
                            for ($l = 0; $l < ceil($num_usuarios_dividido); $l++) {

                                echo '<li data-target="#myCarousel" data-slide-to="' . $l . '"></li>';
                            }
                            ?>
                        </ol>
                    </div>




                




                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog modal-lg" >
                            <div class="modal-content">
                                <div class="modal-header" style="background-color:rgba(0,0,0, 0.4);">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 id="titulo_modal" class="modal-title"></h4>
                                </div>
                                <div class="modal-body">
                                    <p id="descripcion_modal"></p>
                                </div>
                                <div class="modal-footer"  style="background-color:rgba(0,0,0, 0.4);">
                                    <button  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>    

                </div>
            </div>
        </div>
    <div id="inferior-izquierda" href="#myCarousel" data-slide="prev">
                       
                        <a id="flecha" style="margin-left:20px;"  ><b>&lsaquo;</b></a>
                        
                 
                    </div>
                    <div class id="inferior-derecha" href="#myCarousel" data-slide="next">
                        <a id="flecha" style="margin-right:20px; " ><b>&rsaquo;</b></a>
                    </div>
    </body>

    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/jquery.flip.minSilvia.js" ></script>
    <script src="js/bootstrap.js" ></script>

    <script>
         $("[id^=card-]").flip({
            axis: 'x',
           
            autoSize: false});


    </script>
    <script>
        $(document).ready(function () {
            $('.myCarousel').carousel({
                wrap: false
            });
        });



    </script>
    <script>


        function myFunction(_num) {
        var lista=<?php echo json_encode($imagenes);?>  
        $('#titulo_modal').html(
                lista[_num][3]
            );
    $('#descripcion_modal').html(
                lista[_num][1]
            );
        }
        ;

    </script>
</html>
