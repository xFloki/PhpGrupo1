<?php

include ('./misfunciones.php');
$mysqli = conectaBBDD();
$imagenes = array();



//hago la consulta a la BDD
$resultado_consulta = $mysqli->query("SELECT Nombre_muestra,Nombre FROM imagen where Categoria = '1'");
$numero_imagenes = $resultado_consulta->num_rows;

   for($i = 0; $i < $numero_imagenes; $i++ ){
        $r = $resultado_consulta->fetch_array();
       $imagenes[$i][0] = $r['Nombre_muestra'];
        $imagenes[$i][1] = $r['Nombre'];
   } 
   
//   function randomize(){
//       $value = rand(0,1);
//       return $value;
//   }
   
//  echo $value;
  
// sort($imagenes, randomize());
   
//desordenamos el array ya que en la base de datos tenemos mas de 6 imagenes queremo que su orden en el array
//sea aleatorio de esta manera cada ve que se incia el juego saldran unas u otras.   
shuffle($imagenes);
  
//    echo randomize();
//    echo '<pre>';
//    print_r ($imagenes);
//    echo '</pre>';

   

?>

<!doctype html>


<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>jQuery memory card / concentration / pairs game</title>
  <meta name="description" content="Quizy jquery plugin for creating memory game (concentration gaim, pairs game)">
  <meta name="keywords" content="jquery plugin, memory game, concentration, pairs game, javascript, jquery" />

  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="css/quizymemorygame.css">
  
  <style>
    body{
      font-family:Helvetica, Arial, Verdana;
      text-align: center;
    }
    
    #tutorial-memorygame{
      margin:auto;
      width:780px;
    }
    
    .text-style1{
      font-size:14pt;
      color:#56605f;
      font-weight:normal;
      text-shadow: 1px 1px 1px #fff;
      margin:0;
      line-height:24pt;
    }
    
    .reset-button{
      margin: 0 0 1.5em 0;
    }
    
  </style>

</head>
<body>
    <br><br>
  <h1 style="color:white;">Juego Cada Oveja Con su Pareja</h1>
   <br>  <br>
 
  <div id="main" role="main">
    
    <div id="tutorial-memorygame" class="quizy-memorygame">
      <ul>
          <li class="match1">
              <img src= <?php echo $imagenes[0][1] ?> >
          </li>
          <li class="match2">
              <img src=<?php echo $imagenes[1][1] ?>>
          </li>
          <li class="match3">
              <img src=<?php echo $imagenes[2][1] ?>>
          </li>
          <li class="match4">
              <img src=<?php echo $imagenes[3][1] ?>>
          </li>
          <li class="match5">
              <img src=<?php echo $imagenes[4][1] ?>>
          </li>
          <li class="match6">
              <img src=<?php echo $imagenes[5][1] ?>>
          </li>
         
          <li class="match1">
            <br><br><br><p class="text-style1"><?php echo $imagenes[0][0] ?></p>
          </li>
          <li class="match2">
            <br><br><br><p class="text-style1"><?php echo $imagenes[1][0] ?></p>
          </li>
          <li class="match3">
            <br><br><br><p class="text-style1"><?php echo $imagenes[2][0] ?></p>
          </li>
          <li class="match4">
            <br><br><br><p class="text-style1"><?php echo $imagenes[3][0] ?></p>
          </li>
          <li class="match5">
            <br><br><br><p class="text-style1"><?php echo $imagenes[4][0] ?></p>
          </li>
          <li class="match6">
            <br><br><br><p class="text-style1"><?php echo $imagenes[5][0] ?></p>
          </li>
     
      </ul>
    </div>
    
    
      <div  id="mamaiema">
    </div>

    
  


<!--  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="../js/jquery-1.7.1.min.js"><\/script>')</script>-->
        <script src="js/jquery-1.7.1.min.js" /></script>
  <script src="js/jquery-ui-1.8.17.custom.min.js"></script>
  <script src="js/jquery.flip.min.js"></script>
  <script src="js/jquery.quizymemorygame.js"></script>

  
  
  <script>
    var quizyParams = {  onFinishCall: function(param){; var silvia = param.clicks; 
        $("#mamaiema").load("guardaPuntuacionOveja.php",{
            CLICK : silvia                    
        });},
        itemWidth: 156, itemHeight: 156, itemsMargin:40, colCount:4,
        animType:'flip' , flipAnim:'tb', animSpeed:250, resultIcons:true, randomised:true }; 
    $('#tutorial-memorygame').quizyMemoryGame(quizyParams);
    $('#restart').click(function(){
      $('#tutorial-memorygame').quizyMemoryGame('restart');
      return false;
    });
    
   
  </script>

</body>
</html>