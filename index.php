<!--<!DOCTYPE html>


Categoria Imagenes
JuegoOveja = 1
EstudioFlip = 2-->


<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
	
<head>
	<title>The Login-Animated Website Template | Home :: w3layouts</title>
		<meta charset="utf-8">
		<link href="css/stylex.css" rel='stylesheet' type='text/css' />
               <link rel="stylesheet" href="css/bootstrap.min.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
		<!--//webfonts-->
</head>
<body>
    <div class="main"  id="centro">
				 <!-----start-main---->
				<div class="login-form">
					<div class="head">
						<img src="images/mem2.png" alt=""/>
						
					</div>
				<form>
					<li>
						<input id="usuario_nombre" type="text" class="text" value="USERNAME" 
                                                       onfocus="this.value = '';"onblur="if (this.value == '') {this.value = 'USERNAME';}" ><a href="#" class=" icon user"></a>
					</li>
					<li>
						<input id="usuario_clave" type="password" value="Password" 
                                                       onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"><a href="#" class=" icon lock"></a>
					</li>
					<div class="p-container">
                                            <input id="remember" type="checkbox" style="width: 22px; height: 22px;">  Remember Me
                                                <br/><br/>
                                               
                                                             
							<div class="clear text-center">
                                                            <button type="button" class="btn btn-success btn-lg btn-block"
                                                                    onclick="chequeaPass()">Entrar</button>
                                                        </div>
                                                        
					</div>
				</form>
			</div>
			
                  </div>
				
                         
		 		
        
        
        <?php
        
if (!isset($_SESSION)) {session_start();}
//        $nombre = $_SESSION['Nombre'];
         if (isset($_COOKIE['DNI']) and isset($_COOKIE['password'])) {
            $nombre = $_COOKIE['DNI'];
            $password = $_COOKIE['password']; 
          
            
            echo  "<script>
                document.getElementById('usuario_nombre').value = '$nombre';
                 document.getElementById('usuario_clave').value = '$password';
                document.getElementById('recordar').checked = true;
                </script>";
                    
        }
        
        ?>
   

    
    <script src="js/jquery-3.1.0.min.js" /></script><!--
   <script src="js/jquery-ui-1.8.17.custom.min.js"></script>-->
    <script src="js/bootstrap.min.js"></script>
    
      <script>
          function chequeaPass(){
              var _usuario_nombre = $('#usuario_nombre').val();
              var _usuario_clave = $('#usuario_clave').val();            
//               if( document.getElementById('recordar').checked == true){
//                    var _recordar = 'on';
//                } else {
//                    var _recordar = 'off';
//                }
             
             
            $('#centro').load("login.php",{
               
//                recordar : _recordar,
                usuario_nombre : _usuario_nombre,
                usuario_clave: _usuario_clave
            });
              
          }
      </script>
</html>