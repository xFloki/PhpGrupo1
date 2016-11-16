<html>
    <head>

        <title></title>
        <link rel="stylesheet" href="css/bootstrap.min.css"  />
        <link rel="stylesheet" href="css/styleAdmin.css"  />



    </head>


    <body>

        <div id="main" style="margin:5% 10% 0 10%">
            <div id="div1">

                <?php
                include ('./misfunciones.php');

                $mysqli = conectaBBDD();
                $mysqli2 = conectaBBDD();

//// ejemplo de volcado de una query a un array en php
////creo el array
                $usuario = array();

//hago la consulta a la BBDD
                $consulta_juegos = $mysqli->query("select * from imagen");


//saco el numero de usuarios que hay en la bbdd
                $num_juegos = $consulta_juegos->num_rows;


                $num_usuarios_dividido = $num_juegos / 8;


//monto un bucle for para cargar en el array los resultados de la query
                for ($i = 0; $i < $num_juegos; $i++) {
                    $r = $consulta_juegos->fetch_array();

                    $usuario[$i][1] = $r['Descripcion'];
                    $usuario[$i][3] = $r['Nombre_muestra'];
                }
                $contador = 0;



                echo'
                <button onclick="juego1()" type="button" class="btn btn-warning">Juego</button><br/><br/>
            <table class="table table-striped text-center" >
            <tr class="warning">
           
                <td><h4>Nombre</h4></td>
                <td><h4>Descripcion</h4></td>
                <td></td>
           
            </tr>

            
            ';
                for ($i = 0; $i < $num_juegos; $i++) {
                    echo'<tr >
           
                     <td style="vertical-align: middle;" >' . $usuario[$i][3] . '</td>
                     <td style="vertical-align: middle;">' . substr($usuario[$i][1], 0, 80) . '
                         <button onclick="myFunction(\'' . $contador . '\')" type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal">...</button>

</td>
                 
                     <td style="vertical-align: middle;">
                      <button type="button" class=" borrar btn btn-danger btn-sm" onclick="alerta(' . $i . ')" >
    

          <img src="img/papelera.png"style="width:15px;"> 
        </button>

                     </td>
                         </tr>
                
            ';
                    $contador++;
                }

                echo'
        </table>';
                ?>
                <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog modal-lg" >
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 id="titulo_modal" class="modal-title"></h4>
                                </div>
                                <div class="modal-body">
                                    <p id="descripcion_modal"></p>
                                </div>
                                <div class="modal-footer">
                                    <button  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>    
            </div>
        </div>
    </body>
    
    <script src="js/bootstrap.js" ></script>
     <script>


        function myFunction(_num) {
        var lista=<?php echo json_encode($usuario);?>  
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


