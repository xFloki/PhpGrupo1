<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        
        <meta charset="utf-8"></meta>
        <meta name="viewport" content="width=device-width, initial-scale=1"></meta>
        <title>Flip</title>
        
        
           <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
           
           
           
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
        <script rel="stylesheet"  src="js/jquery.flip.min.js"></script>

        <script type="text/javascript" src="js/script.js"></script>
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    </head>

    <body>


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

//monto un bucle for para cargar en el array los resultados de la query
        for ($i = 0; $i < $num_usuarios; $i++) {
            $r = $consulta_usuarios->fetch_array();
            $imagenes[$i][0] = $r['Nombre'];
            $imagenes[$i][1] = $r['Descripcion'];
            $imagenes[$i][3] = $r['Nombre_muestra'];
        }

//ahora voy a usar los datos en un ejemplo
//        
        ?>




        <?php
// Each sponsor is an element of the $sponsors array:
//$imagenes=$sponsors;
//        $sponsors = array(
//            array('facebook', 'The biggest social network in the world.', 'http://www.facebook.com/'),
//            array('adobe', 'The leading software developer targeted at web designers and developers.', 'http://www.adobe.com/'),
//            array('microsoft', 'One of the top software companies of the world.', 'http://www.microsoft.com/'),
//            array('sony', 'A global multibillion electronics and entertainment company ', 'http://www.sony.com/'),
//            array('dell', 'One of the biggest computer developers and assemblers.', 'http://www.dell.com/'),
//            array('ebay', 'The biggest online auction and shopping websites.', 'http://www.ebay.com/'),
//            array('digg', 'One of the most popular web 2.0 social networks.', 'http://www.digg.com/'),
//            array('google', 'The company that redefined web search.', 'http://www.google.com/'),
//            array('ea', 'The biggest computer game manufacturer.', 'http://www.ea.com/'),
//            array('mysql', 'The most popular open source database engine.', 'http://www.mysql.com/'),
//            array('hp', 'One of the biggest computer manufacturers.', 'http://www.hp.com/'),
//            array('yahoo', 'The most popular network of social media portals and services.', 'http://www.yahoo.com/'),
//            array('cisco', 'The biggest networking and communications technology manufacturer.', 'http://www.cisco.com/'),
//            array('vimeo', 'A popular video-centric social networking site.', 'http://www.vimeo.com/'),
//            array('canon', 'Imaging and optical technology manufacturer.', 'http://www.canon.com/')
//        );
// Randomizing the order of sponsors:
        ?>



        <div id="main">



            <div class="row-fluid">


                <?php
// Looping through the array:
                shuffle($imagenes);

                for ($i = 0; $i < 8; $i++) {


                    echo'
                                  
        
        <div class="col-lg-3 col-md-4 col-xs-12 col-sm-6 centered" >
            <div class="sponsor " title="Click to flip">


                <div class="sponsorFlip">
                    <img src="' . $imagenes[$i][0] . '" alt="More about ' . $imagenes[$i][0] . '"/>
                </div>

                <div class="sponsorData">
                <div class="sponsorDescription">
                        <h3 style="color:black;">' . $imagenes[$i][3] . '</h3>
                    </div>
                
                    <div class="sponsorDescription">
                    
                        ' . $descripcion = substr($imagenes[$i][1], 0, 148) . '...
                               
                    </div>
                    <div class="sponsorDescription">
    

                    </div>
          
                    
                      
                
                   
                </div>
            </div>
            
        </div>
        
         
       
         
                         
                                
				';
                }
                ?>



            </div>
        </div>


<!--  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Small Modal</button>

   Modal 
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>This is a small modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>-->





    </body>

</html>
