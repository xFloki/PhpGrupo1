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
     
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css" rel="stylesheet" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>    
        <script src="js/scripts.js"></script>
        <link rel="stylesheet" href="css/styles2.css" />

    </head>
    <body>

        <nav class="navbar navbar-trans navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapsible">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand text-danger" href="#" onclick="$('div#centro').load('menu_inicio.php')">Histologia</a>
                </div>
                <div class="navbar-collapse collapse" id="navbar-collapsible">
                    <ul class="nav navbar-nav navbar-left">

                        <li><a href="#" onclick="$('div#centro1').load('juego_oveja.php')">MEMORY GAME</a></li>
                        <li><a href="#" onclick="$('div#centro1').load('juego_flip.php')">FLIP</a></li>
                        <li><a href="#" onclick="$('div#centro1').load('juego_quiz/juego_quiz.php')">QUIZ</a></li>
                        <li><a href="#" onclick="$('div#centro1').load('draggableEjemplo.php')">ARRASTRAME</a></li>

                        <li><a >DRAGG & DROP</a></li>
                        <li>&nbsp;</li>
                    </ul>

                  
     <ul class="nav navbar-nav navbar-right">
          <li class="dropdown"> 
            <img data-toggle="dropdown" src="img/<?php echo $_SESSION['DNI']; ?>.jpg" 
                                 class="img-circle dropdown-toggle" style="width:55px;padding:10px;">
                            <ul class="dropdown-menu">
                                 <li><a href="#">Conectado como <?php echo $nombre; echo ' '; ?><?php echo $apellido; ?></a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#" onclick="$('div#centro1').load('usuario_progreso.php')">Tú Perfil</a></li>
                                <li><a href="#" onclick="$('div#centro1').load('mensaje_error.php')">Ayuda</a></li>
                                <li role="separator" class="divider"></li>                                
                                <li><a href="#">Opciones</a></li>
                                <li><a href="./">Cerrar Sesión</a></li>
                            </ul>
            </li>        
            </ul>
        
   

                   
                </div>
            </div>
        </nav>

      
    <div class="container" id="centro1" >
        <br>
        <br>
  
    <br>
    <br>
        <div class="row">
            <h2 class="text-center" style="color:white;">PRACTIQUEMOS</h2>
        </div>


        <div class="container">

            <div class="gallery">
                <ul>
                    <li>

                        <div class='wrapper' id="menu" onclick="$('div#centro1').load('juego_oveja.php')">
                            <!-- image -->
                            <img  id="imagen_menu"class="agran" src="img/fotooveja.jpg" />
                            <!-- description div -->
                            <div class='description' >
                                <!-- description content -->
                                <p class='description_content'>MEMORY GAME</p>
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
                                <p class='description_content'>FLIP, ESTUDIO</p>
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
                                <p class='description_content'>QUIZ</p>
                                <!-- end description content -->
                            </div>
                            <!-- end description div -->

                        </div>

                    </li>
                    <li>
                        <div class='wrapper' id="menu" onclick="$('div#centro1').load('usuario_progreso.php')">
                            <!-- image -->
                            <img id="imagen_menu" class="agran" src="img/ovejaPareja.jpg" />
                            <!-- description div -->
                            <div class='description' >
                                <!-- description content -->
                                <p class='description_content'>DRAGG & DROP</p>
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
                                <p class='description_content'>¿WHO IS WHO?</p>
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
  <script src="js/bootstrap.js" ></script>
<script>


    $('.wrapper').hover(
            function () {
                $(this).find('div.description').addClass('hidden');
            }, function () {

        $(this).find('div.description').removeClass('hidden');
    });


</script>    

</html>
