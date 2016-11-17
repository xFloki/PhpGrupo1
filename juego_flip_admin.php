<html>
    <head>

        <title></title>


    </head>


    <body>

         <div id="mainInicio">
        <div id="mainJuego">
           
                <div id="div1"  style="margin:5% 10% 0 10%">
                    <?php
                    include ('./misfunciones.php');

                    $mysqli = conectaBBDD();


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

                        $usuario[$i][0] = $r['Nombre'];
                        $usuario[$i][1] = $r['Descripcion'];
                        $usuario[$i][3] = $r['Nombre_muestra'];
                    }
                    $contador = 0;



                    echo'
                        <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <button style="width:150px; margin-right:20px" onclick="vuelveInicio()" type="button" class="btn btn-primary btn-sm">Inicio</button>
                <button style="width:150px" type="button" class="btn btn-primary btn-sm active">Juego</button></div>
        <div class="col-md-4"><button style="float: right;"onclick="juego1()" type="button" class="btn btn-info btn-sm"> <img src="img/recarga.png"style="width:15px;"> </button>
                </div>
      </div>
                
                <br/><br/><br/>
            <table class="table table-striped text-center" >
            <tr class="warning">
           
<td></td>
                <td><h4>Nombre</h4></td>
                <td><h4>Descripcion</h4></td>
                <td></td>
                <td>  
                <button type="button" class=" borrar btn btn-success btn-sm" data-toggle="modal" data-target="#myModalActualizar" >
   
                <img src="img/plus.png"style="width:15px;"> 
                </td>
           
            </tr>

            
            ';
                    for ($i = 0; $i < $num_juegos; $i++) {
                        echo'<tr >
           
 <td>
            
            <img  onerror="this.src=\'img/camara.png\';" data-toggle="dropdown" src="'
                        . $usuario[$i][0] . '" class="usuario img-thumbnail img-responsive "style="margin:8px;width:120px"  >
                   
            </td>
                     <td style="vertical-align: middle;" >' . $usuario[$i][3] . '</td>
                     <td style="vertical-align: middle;">' . substr($usuario[$i][1], 0, 80) . '
                         <button onclick="myFunction(\'' . $contador . '\')" type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal">...</button>
                         

</td>
                 
                     <td style="vertical-align: middle;">
                      
    
                       <button  type="button" class="borrarJuego-' . $contador . ' btn btn-danger btn-sm"  onclick="alertaBorrar1(' . $i . ',\'' . $usuario[$i][0] . '\')">

          <img src="img/papelera.png"style="width:15px;"> 
        </button>

                     </td>
                     <td style="vertical-align: middle;">
                      <button type="button" class=" borrar btn btn-warning btn-sm" onclick="myFunctionModal1(\'' . $contador . '\')"data-toggle="modal" data-target="#myModal1" >
    
          <img src="img/lapiz.png"style="width:15px;"> 
        </button>

                     </td>
                         </tr>
                
            ';
                        $contador++;
                    }

                    echo'
        </table>';
                    ?>

                    <div class="modal fade" id="myModal1" role="dialog">
                        <div class="modal-dialog modal-lg" >
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 id="titulo_modal1" class="modal-title"></h4>
                                </div>
                                <div class="modal-body">
                                    <p id="descripcion_modal1"></p>
                                </div>
                                <div class="modal-footer">
                                    <button  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div> 
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

                    <div class="modal fade" id="myModalActualizar" role="dialog">
                        <div class="modal-dialog modal-lg" >
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 id="titulo_modal" class="modal-title">Añade el nuevo Usuario</h4>
                                </div>
                                <div class="modal-body">
                                    <p id="descripcion_modal">
                                    <h3>Imagen </h3> 
                                    <input id='agrega_NombreI' class='form-control input-sm' id='inputsm' type='text'   value='Imagen'><br/>
                                    <h3>Descripción: </h3> 
                                    <input id='agrega_Descripcion' class='form-control input-sm' id='inputsm' type='text'  value='Descripcion'><br/>
                                    <h3>Nombre: </h3> 
                                    <input id='agrega_Nombre_muestra' class='form-control input-sm' id='inputsm' type='text'  value='Nombre'><br/>
                                    
                                    <button  type='button'   data-dismiss='modal' class='btn btn-success' onclick='agregaDatosImagen()'>Agregar</button>
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div> 

                </div>
                <div id="borrador"></div>
                <div id="agregaImagen"></div>
                <div id="actualizaImagen"></div>
            </div>
        </div>
    </body>


    <script>


        function juego1() {
            $("#mainJuego").load("juego_flip_admin.php", {

            });
        }
        ;


    </script>
    <script>


        function vuelveInicio() {
            $("#mainInicio").load("admin.php", {

            });
        }
        ;


    </script>

    <script>


        function myFunction(_num) {
            var lista =<?php echo json_encode($usuario); ?>;
            $('#titulo_modal').html(
                    lista[_num][3]
                    );
            $('#descripcion_modal').html(
                    lista[_num][1]
                    );
        }
        ;

    </script>
    <script>
        function alertaBorrar1(numero, _Nombre) {

            $(document).on('click', ('.borrarJuego-' + numero), function (event) {
                event.preventDefault();
                $(this).closest('tr').hide('slow');
                $("#borrador").load("borraFilaJuego.php", {

                    Nombre: _Nombre

                });

            });


        }
    </script>
    
     <script>
        function agregaDatosImagen() {
            var _agrega_NombreI = $('#agrega_NombreI').val();
            var _agrega_Descripcion = $('#agrega_Descripcion').val();
            var _agrega_Nombre_muestra = $('#agrega_Nombre_muestra').val();
           


            $('#agregaImagen').load("agregaImagen.php", {

                //                
                agrega_NombreI: _agrega_NombreI,
                agrega_Descripcion: _agrega_Descripcion,
                agrega_Nombre_muestra: _agrega_Nombre_muestra,
                

            });

        }
    </script>
    <script>


        function myFunctionModal1(_num) {
            var lista =<?php echo json_encode($usuario); ?>;
            $('#titulo_modal1').html(
                    lista[_num][3]  
                    );
            $('#descripcion_modal1').html(
                    "<h3>Imagen: </h3> <input id='actualiza_NombreI' class='form-control input-sm' id='inputsm' type='text'   readonly='readonly' value='" + lista[_num][0] + "'><br/>\n\
<h3>Descripcion: </h3> <input id='actualiza_Descripcion' class='form-control input-sm' id='inputsm' type='text'  value='" + lista[_num][1] + "'><br/>\n\
<h3>Nombre: </h3> <input id='actualiza_Nombre_muestra' class='form-control input-sm' id='inputsm' type='text'  value='" + lista[_num][3] + "'><br/>\n\
<button  type='button'   data-dismiss='modal' class='btn btn-success'onclick='actualizaDatosImagen()'>Aceptar</button>"
                    );
        }
        ;

    </script>
    
    <script>
        function actualizaDatosImagen() {
            var _actualiza_NombreI = $('#actualiza_NombreI').val();
            var _actualiza_Descripcion = $('#actualiza_Descripcion').val();
            var _actualiza_Nombre_muestra = $('#actualiza_Nombre_muestra').val();
            

            $('#actualizaImagen').load("actualizaImagen.php", {

                //                
                actualiza_NombreI: _actualiza_NombreI,
                actualiza_Descripcion: _actualiza_Descripcion,
                actualiza_Nombre_muestra: _actualiza_Nombre_muestra,
               

            });

        }
    </script>
</html>


