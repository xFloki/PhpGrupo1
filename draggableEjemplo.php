<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>PRUEBA quien es quien</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
        <div class="container" id="centro">
            <div class="row">
                 <div class="col-md-4">
                     <div id="posicionY"></div><br>
                     <div id="posicionX"></div>
                     <div id="1" class="btn btn-primary arrastrar"
                             style="position: absolute; top:200px; left:100px; z-index: 1;">ETIQUETA 1</div>
                             
                             <div id="1" class="btn btn-primary arrastrar"
                             style="position: absolute; top:200px; left:100px; z-index: 1;">ETIQUETA 2</div>
                 </div>
                
                <div class="col-md-4">
                    
                 </div>
                
                <div class="col-md-4">
                    <div id="1" class="droppablee"
                             style="position: relative; top:200px; left:100px; background: #419641; height: 100px; width: 200px;">Contenedor</div>
                     
                 </div>
            </div>
                    </div>


    </body>
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
    <script>
        
    
    var identificador;
    
    $('.arrastrar').draggable({
            drag: function(){
                var posicion = $(this).position();
                  $('#posicionY').html(posicion.top);
                  $('#posicionX').html(posicion.left);
                   identificador = $(this).attr('id');
            },
            stop: function(){
                var posicion = $(this).position(); 
                
            }
            
        });
        
        $(".droppablee").droppable({
   drop: function( evento, ui ) {
       
       if(identificador === $(this).attr('id')){
           
           var posicion = $(this).position();
//            alert( "left: " + posicion.left + ", top: " + posicion.top );
//            $(this).html("Lo soltaste!!!");
//            $(this).
                    
            compruebaAcierto(identificador, posicion.top);        
           
           
       }
       
     
   }
});
        
        function compruebaAcierto(_id, _contenedorTop){
            var altura = window.innerHeight;
             console.log(altura);
             
                    
                    $('.arrastrar').animate({top: _contenedorTop});
                }
        
    </script>
    
</html>




<?php





