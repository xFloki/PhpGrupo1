<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta charset="utf-8"></meta>
        <meta name="viewport" content="width=device-width, initial-scale=1"></meta>
        <title>Flip</title>
      
        <link rel="stylesheet" href="css/bootstrap.min.css"  />
             <link rel="stylesheet" href="css/styleAdmin.css"  />


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
            
            $imagenes[$i][3] = $r['Nombre_muestra'];
        }
        $contador = 0;

//ahora voy a usar los datos en un ejemplo     
        ?>
        <div id="main"  >
            <div class="row  ">
               
                        <?php
//
                       


                            for ($i = 0; $i < $num_usuarios; $i++) {
                                echo'
                                    

 <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4 col-centered">
    <div style="height:250px; max-width: 170px;margin-left:30px "class="thumbnail usuario" onclick="myFunction(\'' . $contador . '\')"  data-toggle="modal" data-target="#myModal">
<div id="">      
<img class="zoom" style="height:160px;" src="' . $imagenes[$contador][0] . '"></img>
    </div>
      <div class="caption text-center">
        <h3 style="positio:absolute;bottom:10px">' . $imagenes[$contador][3] . '</h3>
        
      </div>
    </div>
  </div>

             

            ';
                                $contador = $contador + 1;
                            }

                          

        
                        ?>
                        
                       
                       <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog modal-xs" >
                            <div class="modal-content">
                                <div class="modal-header" >
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 id="titulo_modal" class="modal-title"></h4>
                                </div>
                                <div class="modal-body">
                                    <p id="descripcion_modal"></p>
                                </div>
                                <div class="modal-footer"  >
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
<script src="js/wheelzoom.js"></script>
    
   
    <script>


        function myFunction(_num) {
        var lista=<?php echo json_encode($imagenes);?>  
        $('#titulo_modal').html(
                lista[_num][3]
            );
    $('#descripcion_modal').html(
            
"<img style='width:100%; heigth=100%'onclick='myFunctionZoom(\"" + _num + "\")' class='zoom-" + _num + "' style='margin-left:10%;' src='"+  lista[_num][0] + "'></img>"
               
            );
        }
        ;

    </script>
    <script>
          function myFunctionZoom(numero) {
		wheelzoom(document.querySelector("img.zoom-"+numero+""));
            };
	</script>
</html>
