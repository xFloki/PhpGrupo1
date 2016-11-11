<?php
//ahora session_start() continua con la sesion que creamos antes holi
//
//HOLAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA


if (!isset($_SESSION)) {
    session_start();
}
$nombre = $_SESSION['Nombre'];
$apellido = $_SESSION['Apellidos']
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <link rel="stylesheet" href="js/jquery-3.1.0.min.js">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/prueba.css">
        <style>

        </style>

    </head>
    <body>

        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Histología</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#" onclick="loadOveja()">oveja</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                               
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Nav header</li>
                                <li><a href="#">Separated link</a></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                       
                        <li class="dropdown"> 
                            <img data-toggle="dropdown" src="img/<?php echo $_SESSION['DNI']; ?>.jpg" 
                                 class="img-circle dropdown-toggle" style="width:60px;padding:10px;">
                            <ul class="dropdown-menu">
                                 <li><a href="#">Conectado como <?php echo $nombre; echo ' '; ?><?php echo $apellido; ?></a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#" onclick="loadOveja()">Tú Perfil</a></li>
                                <li><a href="#">Ayuda</a></li>
                                <li role="separator" class="divider"></li>                                
                                <li><a href="#">Opciones</a></li>
                                <li><a href="./">Cerrar Sesión</a></li>
                            </ul>
                        </li>                      
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container">

            <?php
// ejemplo de volcado de una query a un array en php
//creo el array
            $usuarios = array();
//hago la consulta a la BBDD
            $consulta_usuarios = $mysqli->query("select * from usuario");
//saco el numero de usuarios que hay en la bbdd
            $num_usuarios = $consulta_usuarios->num_rows;
//monto un bucle for para cargar en el array los resultados de la query
            for ($i = 0; $i < $num_usuarios; $i++) {
                $r = $consulta_usuarios->fetch_array();
                $usuarios[$i][0] = $r['DNI'];
                $usuarios[$i][2] = $r['Nombre'];
                $usuarios[$i][3] = $r['Apellidos'];
                $usuarios[$i][4] = $r['Email'];
            }
//ahora voy a usar los datos en un ejemplo
            ?>

        </table>
        <br>
        <br>
    </div>
    <br>
    <br>
    <div class="container" id="centro1" >
    <div class="row">
        <h2 class="text-center" style="color:white;">PRACTIQUEMOS</h2>
    </div>
  
    
        <div class="container">

            <div class="gallery">
                <ul>
                    <li>
                        
                        <div class='wrapper' id="menu" onclick="$('div#centro1').load('juego_oveja.php')">
                            <!-- image -->
                            <img  id="imagen_menu"class="agran" src="img/ovejaPareja.jpg" />
                            <!-- description div -->
                            <div class='description' >
                                <!-- description content -->
                                <p class='description_content'>Cada oveja con su pareja</p>
                                <!-- end description content -->
                            </div>
                            <!-- end description div -->

                        </div>

                    </li>
                    <li>
                        
                        <div class='wrapper' id="menu" onclick="$('div#centro1').load('juego_flip.php')">
                            <!-- image -->
                            <img id="imagen_menu" class="agran" src="img/ovejaPareja.jpg" />
                            <!-- description div -->
                            <div class='description' >
                                <!-- description content -->
                                <p class='description_content'>Flip, Estudio</p>
                                <!-- end description content -->
                            </div>
                            <!-- end description div -->

                        </div>

                    </li>
                    <li>
                        
                        <div class='wrapper' id="menu" onclick="$('div#centro1').load('juego_quiz/juego_quiz.php')">
                            <!-- image -->
                            <img id="imagen_menu"class="agran" src="img/ovejaPareja.jpg" />
                            <!-- description div -->
                            <div class='description' >
                                <!-- description content -->
                                <p class='description_content'>NACIONAL SOCIALISMO</p>
                                <!-- end description content -->
                            </div>
                            <!-- end description div -->

                        </div>

                    </li>
                    <li>
                         <a href="juego_oveja.php">
                        <div class='wrapper' id="menu">
                            <!-- image -->
                            <img id="imagen_menu" class="agran" src="img/ovejaPareja.jpg" />
                            <!-- description div -->
                            <div class='description' >
                                <!-- description content -->
                                <p class='description_content'>Cada oveja con su pareja</p>
                                <!-- end description content -->
                            </div>
                            <!-- end description div -->

                        </div>

                    </li>
                    <li>
                         <a href="juego_adivina.php">
                        <div class='wrapper' id="menu">
                            <!-- image -->
                            <img id="imagen_menu" class="agran" src="img/ovejaPareja.jpg" />
                            <!-- description div -->
                            <div class='description' >
                                <!-- description content -->
                                <p class='description_content'>Cada oveja con su pareja</p>
                                <!-- end description content -->
                            </div>
                            <!-- end description div -->

                        </div>

                    </li>
                    <li>

                        <div class='wrapper' id="menu">
                            <!-- image -->
                            <img id="imagen_menu" class="agran" src="img/ovejaPareja.jpg" />
                            <!-- description div -->
                            <div class='description' >
                                <!-- description content -->
                                <p class='description_content'>Cada oveja con su pareja</p>
                                <!-- end description content -->
                            </div>
                            <!-- end description div -->

                        </div>

                    </li>
                </ul>
            </div>
        </div>  

    </div>
</body>
<script>
  

    $('.wrapper').hover(
            function () {
                $(this).find('div.description').addClass('hidden');
            }, function () {

        $(this).find('div.description').removeClass('hidden');
    });


</script>    

</html>
