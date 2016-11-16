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
                <button onclick="juego1()" type="button" class="btn btn-warning">Juego</button>
                <br/><br/><br/>
            <table class="table table-striped text-center" >
            <tr class="warning">
            <th></th>
                <td><h4>DNI</h4></td>
                <td><h4>Nombre</h4></td>
                <td><h4>Apellidos</h4></td>
                <td><h4>E-mail</h4></td>
                <td></td>
                
                <td></td>
            </tr>

            
            ';
            for ($i = 0; $i < $num_juegos; $i++) {
                echo'<tr  id="botonBorrar'.$i.';" >
            <td>
            
            <img onclick="chequeaDNI('.$i.')" onerror="this.src=\'img/camara.png\';" data-toggle="dropdown" src="img/'
                . $usuario[$i][0] . '.jpg" class="usuario img-thumbnail img-responsive "style="margin:8px;width:120px"  >
                   
            </td>
                     <td id="Dni" style="vertical-align: middle;" >' . $usuario[$i ][0] . '</td>
                     <td style="vertical-align: middle;">' . $usuario[$i ][2] . '</td>
                     <td style="vertical-align: middle;">' . $usuario[$i ][3] . '</td>
                     <td style="vertical-align: middle;">' . $usuario[$i ][4] . '</td>
                     <td style="vertical-align: middle;">
                      <button  onclick="alertaBorrar('.$i.','.$usuario[$i][0].')" type="button" class=" borrar'.$i.' btn btn-danger btn-sm" >
    
          <img src="img/papelera.png"style="width:15px;"> 
        </button>

                     </td>
                     <td style="vertical-align: middle;">
                      <button type="button" class=" borrar btn btn-warning btn-sm" onclick="alerta('.$i.')" >
    
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
               
           
        
                  
            </div>
            <div id="carga"></div>
        </div>
    </body>
       <script src="js/jquery-3.1.0.min.js"></script>
   

        <script>


        function juego1() {
       
            
     $("#div1").load("juego_flip_admin.php",{
           
            
        });
        }
        ;


    </script>
    <script>


        function chequeaDNI(_num) {
        var lista=<?php echo json_encode($usuario);?>  
        var _DNI =lista[_num][0];
        var _Nombre =lista[_num][2];
        var _Apellidos =lista[_num][3];
            
     console.log(_DNI);
     $("#div1").load("progresoAlumnos.php",{
            DNI : _DNI,
            Nombre: _Nombre,
            Apellidos :_Apellidos
            
        });
        }
        ;


    </script>
      <script>
            function alertaBorrar(numero,_DNI){
                
                $(document).on('click', ('.borrar'+numero), function (event) {
        event.preventDefault();
        $(this).closest('tr').hide('slow');
        $('#carga').load('borraFila.php', {
                    
                    DNI: _DNI,
                    
                });
        
    });

               
            }
        </script>
        

    
 
</html>
<?php //    $consulta_borrar= $mysqli2->query("Delet from usuario where DNI='+$usuario[_num][0]+'");?>