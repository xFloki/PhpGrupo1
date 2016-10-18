<html>
    <head>


        <link rel="stylesheet" href="js/jquery-3.1.0.min.js">
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <style>
            #theIdOfTheBox {
                position: absolute;
                left:100px;
                top:100px;
                width:300px;
                height:300px;
                background:blue;
            }
        </style>
        

    </head>

    <body>
        <div id="draggable">box</div>
        
        
        
        <script>

            $("#draggable").draggable();

            $('#draggable').draggable({
                stop: function (event, ui) {
                    ... }
            })

        </script>
    </body>




</html>