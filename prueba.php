<head>
  ...
  <link rel="stylesheet" type="text/css" href="css/quizymemorygame.css" />
  ...
</head>

<div id="my-memorygame" class="quizy-memorygame">
<ul>
  <li class="match1">
    Uruguay
  </li>
  <li class="match2">
    Cuba
  </li>
  <li class="match1">
    Uruguay
  </li>
  <li class="match2">
    Cuba
  </li>
</ul>
</div>

<body>
    <script src="js/jquery-1.7.1.min.js" /></script>
<!--    <script src="js/jquery-3.1.0.min.js" /></script>-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" /></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js" /></script>
<script src="js/jquery.flip.min.js" /></script>
<script src="js/jquery.quizymemorygame.js" /></script>
<script>
$('#my-memorygame').quizyMemoryGame({itemWidth: 156, itemHeight: 156, itemsMargin:40, colCount:5, animType:'flip' , flipAnim:'tb', animSpeed:250, resultIcons:true});
</script>
</body>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

