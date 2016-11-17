<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta charset="utf-8"></meta>
        <meta name="viewport" content="width=device-width, initial-scale=1"></meta>
        <title>Flip</title>
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




                    <!-- Carousel items -->
                    

                        <?php
// Looping through the array:
//                        shuffle($imagenes);


                       


                            for ($i = 0; $i < $num_usuarios; $i++) {
                                echo'
             <div class="col-lg-3 col-md-6 col-xs-12 col-sm-6 text" style="height:290px;   "  >
              
                        <img class="img2" src="' . $imagenes[$contador][0] . '" ></img>
                    

                   
                
            </div>
            

            ';
                                $contador = $contador + 1;
                            }

                            echo'
                                
        </div>
        



                        ';


                         
                                
                            

        
                        ?>
                        
                       
                    <div class="modal fade" id="myModalZoom" role="dialog">
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
       
    
    </body>

    <script src="js/jquery-3.1.0.min.js"></script>
    
    <script src="js/bootstrap.js" ></script>

    
   
    <script>


        function myModalZoom(_num) {
        var lista=<?php echo json_encode($imagenes);?>  
        $('#titulo_modal').html(
                lista[_num][0]
            );
    $('#descripcion_modal').html(
                lista[_num][3]
            );
        }
        ;

    </script>
</html>
