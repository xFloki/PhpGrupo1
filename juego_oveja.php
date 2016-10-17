<?php

include ('./misfunciones.php');
$mysqli = conectaBBDD();


//hago la consulta a la BDD
$resultado_consulta = $mysqli->query("SELECT Nombre_muestra, URL FROM imagen where Categoria = '1'");
 $r = $resultado_consulta->fetch_array();
$JJ = $r['Nombre_muestra'];
echo $JJ;

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
    <br>
  <h1>Juego Cada Oveja Con su Pareja</h1>
   <br>
   
   
  
  <div id="main" role="main">
    
    <div id="tutorial-memorygame" class="quizy-memorygame">
      <ul>
          <li class="match1">
              <img src="imgOveja/mitocondria.png">
          </li>
          <li class="match2">
              <img src="imgOveja/reticulo_endoplasmatico.jpg">
          </li>
          <li class="match3">
              <img src="imgOveja/aparato_de_goigi.jpg">
          </li>
          <li class="match4">
            <img src="img/flag-NewZealand.png">
          </li>
          <li class="match5">
            <img src="img/flag-Uruguay.png">
          </li>
          <li class="match6">
            <img src="img/flag-Tunisia.png">
          </li>
         
          <li class="match1">
            <br><br><br><p class="text-style1">Mitocondria</p>
          </li>
          <li class="match2">
            <br><br><br><p class="text-style1">Reticulo endoplasmatico</p>
          </li>
          <li class="match3">
            <br><br><br><p class="text-style1">Aparato de Goigi</p>
          </li>
          <li class="match4">
            <br><br><br><p class="text-style1">New<br>Zealand</p>
          </li>
          <li class="match5">
            <br><br><br><p class="text-style1">Uruguay</p>
          </li>
          <li class="match6">
            <br><br><br><p class="text-style1">Tunisia</p>
          </li>
     
      </ul>
    </div>
    
    
    <div class="reset-button">
      <a id="restart" href="">Reset game</a>
    </div>
    
  


  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="../js/jquery-1.7.1.min.js"><\/script>')</script>
  <script src="js/jquery-ui-1.8.17.custom.min.js"></script>
  
  <script src="js/jquery.flip.min.js"></script>
  <script src="js/jquery.quizymemorygame.js"></script>
  
  <script>
    var quizyParams = {itemWidth: 156, itemHeight: 156, itemsMargin:40, colCount:4, animType:'flip' , flipAnim:'tb', animSpeed:250, resultIcons:true, randomised:true }; 
    $('#tutorial-memorygame').quizyMemoryGame(quizyParams);
    $('#restart').click(function(){
      $('#tutorial-memorygame').quizyMemoryGame('restart');
      return false;
    });
  </script>

</body>
</html>