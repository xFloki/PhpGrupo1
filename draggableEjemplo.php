<!doctype html>
<html lang="en">
    <head>

        <title>A jQuery Drag-and-Drop Number Cards Game</title>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <link rel="stylesheet" type="text/css" href="css/styleDragg.css">

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
 
         
        
       

    </head>
    <body>
        
         <?php
        include('./misfunciones.php');
        $mysqli = conectaBBDD();

        $consulta = $mysqli->query("SELECT * FROM arrastrar;");
        $num_filas = $consulta->num_rows;
        $listaPreguntas = array();

        for ($i = 0; $i < $num_filas; $i++) {
            $resultado = $consulta->fetch_array();


            $listaPreguntas[$i][0] = $resultado['id'];
            $listaPreguntas[$i][1] = $resultado['imagen'];       
            $listaPreguntas[$i][2] = $resultado['tipo'];
          
     
        }
        
        $resultado_consulta = $mysqli->query("SELECT id, tipo FROM arrastrar where tipo = '1';");
        $numero_imagenes = $resultado_consulta->num_rows;

        for($i = 0; $i < $numero_imagenes; $i++ ){
        $r = $resultado_consulta->fetch_array();
        $imagenes1[$i][0] = $r['id'];
      
   } 
    shuffle($imagenes1);
        
       $resultado_consulta = $mysqli->query("SELECT id, tipo FROM arrastrar where tipo = '2';");
        $numero_imagenes = $resultado_consulta->num_rows;

        for($i = 0; $i < $numero_imagenes; $i++ ){
        $r = $resultado_consulta->fetch_array();
        $imagenes2[$i][0] = $r['id'];
        
   } 
   
   shuffle($imagenes2);
   
         $resultado_consulta = $mysqli->query("SELECT id, tipo FROM arrastrar where tipo = '3';");
        $numero_imagenes = $resultado_consulta->num_rows;

        for($i = 0; $i < $numero_imagenes; $i++ ){
        $r = $resultado_consulta->fetch_array();
        $imagenes3[$i][0] = $r['id'];
       
        
   } 
        shuffle($imagenes3);
        
        
        ?>
        

        <script type="text/javascript">

            var correctCards = 0;
          
            
  
            
            $(init);

            function init() {
                
                


   
        
        
                // Hide the success message
                $('#successMessage').hide();
                $('#successMessage').css({
                    left: '580px',
                    top: '250px',
                    width: 0,
                    height: 0
                });

                // Reset the game
                correctCards = 0;
                $('#cardPile').html('');
                $('#cardSlots').html('');

                // Create the pile of shuffled cards
                var numbers = [1, 2, 3];
                numbers.sort(function () {
                    return Math.random() - .5
                });

                for (var i = 0; i < 3; i++) {
                    
                    if(i===0){
                    $('<div style="width: 30%; ;height: 90%;" > <img style="width: 100%; height: 90%;" src="imgDragg/'+ <?php echo $imagenes1[0][0] ?> +'.jpg"/> </div>').data('number', numbers[i]).attr('id', 'card' + numbers[i]).appendTo('#cardPile').draggable({
                        containment: '#content',
                        stack: '#cardPile div',
                        cursor: 'move',
                        revert: true
                  
                    });
                    
                    } else if(i===1){
                        
                        $('<div style="width: 30%; ;height: 90%;" > <img style="width: 100%; height: 90%;" src="imgDragg/'+ <?php echo $imagenes2[0][0] ?> +'.jpg"/> </div>').data('number', numbers[i]).attr('id', 'card' + numbers[i]).appendTo('#cardPile').draggable({
                        containment: '#content',
                        stack: '#cardPile div',
                        cursor: 'move',
                        revert: true
                  
                    });
                       
                    } else if(i===2){
                        $('<div style="width: 30%; ;height: 90%;" > <img style="width: 100%; height: 90%;" src="imgDragg/'+ <?php echo $imagenes3[0][0] ?> +'.jpg"/> </div>').data('number', numbers[i]).attr('id', 'card' + numbers[i]).appendTo('#cardPile').draggable({
                        containment: '#content',
                        stack: '#cardPile div',
                        cursor: 'move',
                        revert: true
                        
                        });
                    }
                }

                // Create the card slots
                var words = ['Mesodermo', 'Endodermo', 'Ectodermo'];
               
                
                for (var i = 1; i <= 3; i++) {
                    $('<div style="width: 30%; height: 90%;" >' + words[i - 1] + '</div>').data('number', i).appendTo('#cardSlots').droppable({
                        accept: '#cardPile div',
                        hoverClass: 'hovered',
                        drop: handleCardDrop
                    });
                }

            }
            function handleCardDrop( event, ui ) {
  var slotNumber = $(this).data( 'number' );
  var cardNumber = ui.draggable.data( 'number' );
 
  // If the card was dropped to the correct slot,
  // change the card colour, position it directly
  // on top of the slot, and prevent it being dragged
  // again
 
  if ( slotNumber == cardNumber ) {
    ui.draggable.addClass( 'correct' );
    ui.draggable.draggable( 'disable' );
    $(this).droppable( 'disable' );
    ui.draggable.position( { of: $(this), my: 'left top', at: 'left top' } );
    ui.draggable.draggable( 'option', 'revert', false );
    correctCards++;
  
  } 
   
  // If all the cards have been placed correctly then display a message
  // and reset the cards for another go
 
  if ( correctCards == 3 ) {
    $('#successMessage').show();
    $('#successMessage').animate( {
      left: '480px',
      top: '200px',
      width: '400px',
      height: '100px',
      opacity: 1
    } );
  }
 
}

        </script>
        
        
     

        <div id="content">

            
            <div id="cardPile"> </div>
            <div id="cardSlots"> </div>

            <div id="successMessage">
                <h2>Monstri eres muy bueno!</h2>
                <a href="draggableEjemplo.php">   <button >Quiero más!</button> </a>
            </div>

        </div>

    </body>
</html>