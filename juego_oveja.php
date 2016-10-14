<html>
    
    <head>
        <script language="JavaScript" type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
        
        <title>Cada oveja con su pareja</title>
        <style>
            .container {
               border: 1px solid black;
               width: 440px;
               height: 330px;
               position: absolute;
               left: calc(50% - 220px);
               top: calc(50% - 165px);
               perspective: 1000;
               
            }
            .box {
               
                width: 100px;
                height: 100px;
                margin: 5px;
                float: left;
                transform-style: preserve-3d;
                transform: rotateY(0deg);
                transition: 400ms;
                background-image: url(img/ovejaPareja.jpg);
            }
            
            .box.flip {
                transform: rotateY(180º);
            }
            
            .card {
                background-position: center;
                background-repeat: no-repeat;
                backface-visibility: hidden;
                width: 100%;
                heigth: 100%;
                position: absolute;
                left: 0;
                top: 0;
                
            }
            
            .front{
                background-color: red;
                background-image: url(imgOveja/card_back.jpg);
              
                
            }
            
            .back {
                transform: rotateY(180º);
                background-image: url(img/quienesquien.jpg);
                
                
            }
            
            .tejido-1 {
                background-image: url(img/quienesquien.jpg);
            }
            .tejido-2 {
                background-image: url(img/quienesquien.jpg);
            }
            .tejido-3 {
                background-image: url(img/quienesquien.jpg);
            }
            .tejido-4 {
                background-image: url(img/quienesquien.jpg);
            }
            .tejido-5 {
                background-image: url(img/quienesquien.jpg);
            }
            .tejido-6 {
                background-image: url(img/quienesquien.jpg);
            }
            .tejido-7 {
                background-image: url(img/quienesquien.jpg);
            }
            .tejido-8 {
                background-image: url(img/quienesquien.jpg);
            }.tejido-9 {
                background-image: url(img/quienesquien.jpg);
            }
            .tejido-10 {
                background-image: url(img/quienesquien.jpg);
            }
            .tejido-11 {
                background-image: url(img/quienesquien.jpg);
            }.tejido-12 {
                background-image: url(img/quienesquien.jpg);
            }
            .tejido-13 {
                background-image: url(img/quienesquien.jpg);
            }
            .tejido-14 {
                background-image: url(img/quienesquien.jpg);
            }
            .tejido-15 {
                background-image: url(img/quienesquien.jpg);
            }
            .tejido-16 {
                background-image: url(img/quienesquien.jpg);
            }
            .tejido-17 {
                background-image: url(img/quienesquien.jpg);
            }
            .tejido-18 {
                background-image: url(img/quienesquien.jpg);
            }
            
            
            
            
        </style>
        
    </head>
    
    <body>
        <div class="container">
            <div class="box">
                <div class="front card"></div>
                <div class="back card"></div>
            </div>
            <div class="box">
                <div class="front card"></div>
                <div class="back card"></div>
            </div>
            <div class="box">
                <div class="front card"></div>
                <div class="back card"></div>
            </div>
            <div class="box">
                <div class="front card"></div>
                <div class="back card"></div>
            </div>
            <div class="box">
                <div class="front card"></div>
                <div class="back card"></div>
            </div>
            <div class="box">
                <div class="front card"></div>
                <div class="back card"></div>
            </div>
            <div class="box">
                <div class="front card"></div>
                <div class="back card"></div>
            </div>
            <div class="box">
                <div class="front card"></div>
                <div class="back card"></div>
            </div>
            <div class="box">
                <div class="front card"></div>
                <div class="back card"></div>
            </div>
            <div class="box">
                <div class="front card"></div>
                <div class="back card"></div>
            </div>
            <div class="box">
                <div class="front card"></div>
                <div class="back card"></div>
            </div>
            <div class="box">
                <div class="front card"></div>
                <div class="back card"></div>
            </div>                
            
        </div>
        
        <script>
            //Devuelve un numero aleatorio entre el 0 y la variable range-1
            function random(range){
                return Math.floor(Math.random() * range);
            }
            
            //Devuelve aletoriamente 0 o 1, verdadero o falso.
            function randomize(){
                return random(3)-1;
            }
           
            
            //array de las de los nombres de las clases 
            //se podria haber generado con un for loop si el array es muy grande y no queremos ir escribiendo
            //uno por uno 
            var tejidos_array = [   "tejido-1",
                                    "tejido-2",
                                    "tejido-3",
                                    "tejido-4",
                                    "tejido-5",
                                    "tejido-6",
                                    "tejido-7",
                                    "tejido-8",
                                    "tejido-9",
                                    "tejido-10",
                                    "tejido-11",
                                    "tejido-12"
                
            ] ;
            
            //copiamos el array tejidos ya que necesitamos una copia con la que poder trabajar y modificar sin 
            //perder el array original
            //el metodo slice devuelve una copia del array dentro de un nuevo array desde la posicion que le indicemos
            //si le pasamos un parametro negativo nos elimina ese numero de componentes del final del array
            var temp_array = tejidos_array.slice(0);
            //array de parejas
            var tile_array = [];
            //variable en la que indicamosn el numero de parejas de nuestro juego
            var parejas = 6;
            //rellenamos el array
            for (var i = 0; i < parejas; i++){
                var r = random(temp_array.length);
                //el metodo splice es una funcion que tienen los array y nos sirve para eliminar x elimentos desde x indice
                //ademas nos permite sustituir estos elementos e insertar nuevos datos a la vez que hacemos esto 
                var aTile = temp_array.splice(r, 1);
                //con el concat podemos ir añadiendo nuevos valores a nuestro array ya existente
                tile_array = tile_array.concat(aTile);
                tile_array = tile_array.concat(aTile);
            }
            
            //el metodo sort ordena un array en funcion de sus valores, si es nuemerico, numericamente, si son string, alfabeticamente,
            //pansandole un parametro como true o false podemos hacer que cada uno de los elementos del array se vaya colocando el principio o final
            //de manera "aleatoria" de este modo nuestro array estara ordenado cada vez de manera diferente y las imagenes no saldran
            //siempre en la misma posicion 
            tile_array.sort(randomize);
            
             console.log(randomize());
            //asignamos una clase a cada carta
            $(".back").each(function(i){
                $(this).addClass(tile_array[i]);
                $(this).parent().attr("data-name", tile_array[i]);
            });
            
            $(".box").click(function(){
                $(this).toggle("flip");
            });
            
        </script>
        
    </body>
    
</html>