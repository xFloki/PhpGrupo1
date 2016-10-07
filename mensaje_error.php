<html>
    <head>
        <meta charset="UTF-8">
        <title>Prueba de PHP</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                background: black;
                background-image: url("img/tile2.png");
            }
        </style>
    </head>
    <body>
        <div class="container" id="centro">
            <div class="row">
                 <div class="col-md-12"><h2 class="text-center" style="color:white;">EJEMPLO DE INICIO DE SESIÓN EN PHP</h2></div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
<!--                    <form action="index2.php" method="post">-->
                  
                        <br>
                        <input id="usuario_nombre" class="form-control" type="text" placeholder="Usuario">
                        <br>
                        <input id="usuario_clave"  class="form-control" type="password" placeholder="Contraseña">
                         <br>
                            <p style="color:white;"> <input id="recordar" type="checkbox"  > Recuérdame </p>
                        
                        
                        
                         <button class="btn btn-success btn-block" onclick="chequeaPass();"> Entrar</button>
<!--                  </form>-->


                </div>
                <div class="col-md-4"></div>
            </div>
        </div>