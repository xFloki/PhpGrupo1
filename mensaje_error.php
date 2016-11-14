

<?php
session_start();
include ('./misfunciones.php');

 


    
    ?>
    
    


?>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/usuarioperfil.css">
        <style>

        </style>

    </head>
    <body>


        <div class="container">
            <div class="row">
                <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
                    <br>
                    <p class=" text-info"<span id="servertime"></span></p>
              

                                                        
            
                                            

            
            
        </div> </div> </div>
        
     
 

     

        <script type="text/javascript">

// Current Server Time script (SSI or PHP)- By JavaScriptKit.com (http://www.javascriptkit.com)
// For this and over 400+ free scripts, visit JavaScript Kit- http://www.javascriptkit.com/
// This notice must stay intact for use.

//Depending on whether your page supports SSI (.shtml) or PHP (.php), UNCOMMENT the line below your page supports and COMMENT the one it does not:
//Default is that SSI method is uncommented, and PHP is commented:

//var currenttime = '<!--#config timefmt="%B %d, %Y %H:%M:%S"--><!--#echo var="DATE_LOCAL" -->' //SSI method of getting server date
    var currenttime = '<? print date("F d, Y H:i:s", time())?>' //PHP method of getting server date

///////////Stop editting here/////////////////////////////////

var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December")
var serverdate=new Date(currenttime)

function padlength(what){
var output=(what.toString().length==1)? "0"+what : what
return output
}

function displaytime(){
serverdate.setSeconds(serverdate.getSeconds()+1)
var datestring=montharray[serverdate.getMonth()]+" "+padlength(serverdate.getDate())+", "+serverdate.getFullYear()
var timestring=padlength(serverdate.getHours())+":"+padlength(serverdate.getMinutes())+":"+padlength(serverdate.getSeconds())
document.getElementById("servertime").innerHTML=datestring+" "+timestring
}

window.onload=function(){
setInterval("displaytime()", 1000)
}

</script>




    </body>
</html>



