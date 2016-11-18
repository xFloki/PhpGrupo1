<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>

        <title></title>
        <link rel="stylesheet" href="css/bootstrap.min.css"  />
        <link rel="stylesheet" href="css/styleAdmin.css"  />



    </head>


    <body background="img/background_1.png">

        <div id="mainInicioAdmin">
            <div id="mainJuegoAdmin">
                <div id="div2"  style="margin:5% 10% 0 10%">
                    <div id="profe">
                    <img style="width:100px;" src="img/profesor.png">
                    </div>
                    <?php
                    include ('./misfunciones.php');

                    $mysqli = conectaBBDD();


//// ejemplo de volcado de una query a un array en php
////creo el array
                    $usuario = array();

//hago la consulta a la BBDD
                    $consulta_juegos = $mysqli->query("select * from usuario");


//saco el numero de usuarios que hay en la bbdd
                    $num_juegos = $consulta_juegos->num_rows;


                    $num_usuarios_dividido = $num_juegos / 8;


//monto un bucle for para cargar en el array los resultados de la query
                    for ($i = 0; $i < $num_juegos; $i++) {
                        $r = $consulta_juegos->fetch_array();
                        $usuario[$i][0] = $r['DNI'];
                        $usuario[$i][2] = $r['Nombre'];
                        $usuario[$i][3] = $r['Apellidos'];
                        $usuario[$i][4] = $r['Email'];
                    }
                    $contador = 0;


                    echo'
                        <div class="row">
        <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 ">
            <button onclick="inicio1()" type="button" class="btn btn-info btn-sm"> <img src="img/recarga.png"style="width:15px;"> </button>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 "><button  style="width:150px; margin-right:20px" type="button" class="btn btn-primary btn-sm active">Inicio</button>
               <button style="width:150px" onclick="juego()" type="button" class="btn btn-primary btn-sm">Juego</button></div> 
        

<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 ">
        <button style="float: right;" href="./" type="button" class="btn btn-info btn-danger"> 
        <img src="img/apagar.png"style="width:15px;"> </button>
               </div>
      </div>
                
                  <br/><br/><br/>
            <table class="table table-striped text-center" >
            <tr class="warning">
            <th></th>
                <td><h4>DNI</h4></td>
                <td><h4>Nombre</h4></td>
                <td><h4>Apellidos</h4></td>
                <td><h4>E-mail</h4></td>
                <td></td>
                
                <td>
          
                 <button type="button" class=" borrar btn btn-success btn-sm" data-toggle="modal" data-target="#myModalAnnadir" >
   
                <img src="img/plus.png"style="width:15px;"> 
                </td>
            </tr>

            
            ';
                    for ($i = 0; $i < $num_juegos; $i++) {
                        echo'<tr   >
            <td>
            
            <img onclick="chequeaDNI(' . $i . ')" onerror="this.src=\'img/camara.png\';" data-toggle="dropdown" src="img/'
                        . $usuario[$i][0] . '.jpg" class="usuario img-thumbnail img-responsive "style="margin:8px;width:120px"  >
                   
            </td>
                     <td id="Dni" style="vertical-align: middle;" >' . $usuario[$i][0] . '</td>
                     <td style="vertical-align: middle;">' . $usuario[$i][2] . '</td>
                     <td style="vertical-align: middle;">' . $usuario[$i][3] . '</td>
                     <td style="vertical-align: middle;">' . $usuario[$i][4] . '</td>
                     <td style="vertical-align: middle;">
                      <button   type="button" class=" borrar' . $i . ' btn btn-danger btn-sm" onclick="alertaBorrar(' . $i . ',\'' . $usuario[$i][0] . '\')">
    
          <img src="img/papelera.png"style="width:15px;"> 
        </button>

                     </td>
                     <td style="vertical-align: middle;">
                      <button type="button" class=" borrar btn btn-warning btn-sm" onclick="myFunctionModal(\'' . $contador . '\')"data-toggle="modal" data-target="#myModal" >
    
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



                    <div id="carga"></div>   
                    <div id="actualiza"></div>
                    <div id="agrega"></div>
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

                <div class="modal fade" id="myModalAnnadir" role="dialog">
                    <div class="modal-dialog modal-lg" >
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 id="titulo_modal" class="modal-title">Añade el nuevo Usuario</h4>
                            </div>
                            <div class="modal-body">
                                <p id="descripcion_modal">
                                <h3>DNI: </h3> 
                                <input id='agrega_DNI' class='form-control input-sm' id='inputsm' type='text'   value='DNI'><br/>
                                <h3>Nombre: </h3> 
                                <input id='agrega_Nombre' class='form-control input-sm' id='inputsm' type='text'  value='Nombre'><br/>
                                <h3>Apellidos: </h3> 
                                <input id='agrega_Apellidos' class='form-control input-sm' id='inputsm' type='text'  value='Apellidos'><br/>
                                <h3>Email: </h3> 
                                <input id='agrega_Email' class='form-control input-sm' id='inputsm' type='text'  value='Email'><br/>

                                <button  type='button'   data-dismiss='modal' class='btn btn-success' onclick='agregaDatos()'>Agregar</button>
                                </p>
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
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/bootstrap.js" ></script>


    <script>
        function juego() {
            $("#mainJuegoAdmin").load("juego_flip_admin.php", {

                 });
                                    }
                                    ;


    </script>
    <script>


        function inicio1() {
            $("#mainInicioAdmin").load("admin.php", {

            });
        }
        ;


    </script>
    <script>


        function chequeaDNI(_num) {
            var lista =<?php echo json_encode($usuario); ?>;
            var _DNI = lista[_num][0];
            var _Nombre = lista[_num][2];
            var _Apellidos = lista[_num][3];

            console.log(_DNI);
            $("#div2").load("progresoAlumnos.php", {
                DNI: _DNI,
                Nombre: _Nombre,
                Apellidos: _Apellidos

            });
        }
        ;


    </script>
    <script>
        function alertaBorrar(numero, _DNI) {

            $(document).on('click', '.borrar' + numero, function (event) {
                event.preventDefault();
                $(this).closest('tr').hide('slow');
                $('#carga').load("borraFila.php", {

                    DNI: _DNI

                });

            });


        }
    </script>

    <script>


        function myFunctionModal(_num) {
            var lista =<?php echo json_encode($usuario); ?>;
            $('#titulo_modal').html(
                    lista[_num][0] + "     " + lista[_num][2] + " " + lista[_num][3]
                    );
            $('#descripcion_modal').html(
                    "<h3>DNI: </h3> <input id='actualiza_DNI' class='form-control input-sm' id='inputsm' type='text'   readonly='readonly' value='" + lista[_num][0] + "'><br/>\n\
<h3>Nombre: </h3> <input id='actualiza_Nombre' class='form-control input-sm' id='inputsm' type='text'  value='" + lista[_num][2] + "'><br/>\n\
<h3>Apellidos: </h3> <input id='actualiza_Apellidos' class='form-control input-sm' id='inputsm' type='text'  value='" + lista[_num][3] + "'><br/>\n\
<h3>Email: </h3> <input id='actualiza_Email' class='form-control input-sm' id='inputsm' type='text'  value='" + lista[_num][4] + "'><br/>\n\
<button  type='button'   data-dismiss='modal' class='btn btn-success' onclick='actualizaDatos()'>Aceptar</button>"
                    );
        }
        ;

    </script>
    <script>
        function actualizaDatos() {
            var _actualiza_DNI = $('#actualiza_DNI').val();
            var _actualiza_Nombre = $('#actualiza_Nombre').val();
            var _actualiza_Apellidos = $('#actualiza_Apellidos').val();
            var _actualiza_Email = $('#actualiza_Email').val();
            //               if( document.getElementById('recordar').checked == true){
            //                    var _recordar = 'on';
            //                } else {
            //                    var _recordar = 'off';
            //                }


            $('#actualiza').load("actualizaUsuario.php", {

                //                
                actualiza_DNI: _actualiza_DNI,
                actualiza_Nombre: _actualiza_Nombre,
                actualiza_Apellidos: _actualiza_Apellidos,
                actualiza_Email: _actualiza_Email,

            });

        }
    </script>
    <script>
        function agregaDatos() {
            var _agrega_DNI = $('#agrega_DNI').val();
            var _agrega_Nombre = $('#agrega_Nombre').val();
            var _agrega_Apellidos = $('#agrega_Apellidos').val();
            var _agrega_Email = $('#agrega_Email').val();


            $('#agrega').load("agregaUsuario.php", {

                //                
                agrega_DNI: _agrega_DNI,
                agrega_Nombre: _agrega_Nombre,
                agrega_Apellidos: _agrega_Apellidos,
                agrega_Email: _agrega_Email,

            });

        }
    </script>



</html>
<?php
//    $consulta_borrar= $mysqli2->query("Delet from usuario where DNI='+$usuario[_num][0]+'");?>