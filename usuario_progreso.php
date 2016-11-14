

<?php
session_start();
include ('./misfunciones.php');
    $mysqli = conectaBBDD();

    $result = $mysqli->query("SELECT * FROM puntuacion where Juego = 'Oveja'");
          

    while($row = mysqli_fetch_array($result)) {
        $value = $row['Puntuacion'];
        $timestamp = strtotime($row['Fecha']);
        $data[] = [$timestamp, (int)$value];
    }   

    
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
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <?php echo $_SESSION['Nombre'];?>          
                            <?php echo $_SESSION['Apellidos'];?></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="img/<?php echo $_SESSION['DNI']; ?>.jpg" class="img-circle img-responsive"> </div>

                                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                                  <dl>
                                    <dt>DEPARTMENT:</dt>
                                    <dd>Administrator</dd>
                                    <dt>HIRE DATE</dt>
                                    <dd>11/12/2013</dd>
                                    <dt>DATE OF BIRTH</dt>
                                       <dd>11/12/2013</dd>
                                    <dt>GENDER</dt>
                                    <dd>Male</dd>
                                  </dl>
                                </div>-->
                                <div class=" col-md-9 col-lg-9 "> 
                                    <table class="table table-user-information">
                                        <tbody>
                                            <tr>
                                                <td>Asignatura:</td>
                                                <td>Histología</td>
                                            </tr>                                          
                                            <tr>
                                                <td>Fecha de nacimiento</td>
                                                <td><?php echo $_SESSION['Nacimiento'];?>
                                                
                                                </td>
                                            </tr>                                                                          
<!--                                            <tr>
                                                <td>Dirección</td>
                                                <td>Kathmandu,Nepal</td>
                                            </tr>-->
                                            <tr>
                                                <td>Email</td>
                                                <td><a href= "<?php echo $_SESSION['Email'];?>" >
                                                    <?php echo $_SESSION['Email'];?></a></td>
                                            </tr>
                                        <td>Phone</td>
                                        <td>915330692(Telefono)<br><br>666-777-888 (Movil)
                                        </td>

                                        </tr>

                                        </tbody>
                                    </table>

                                    
                                    <a href="#" class="btn btn-primary">Mi progreso</a>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                            <span class="pull-right">
                                <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                                <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                            </span>
                        </div>

                    </div>
                </div>
            </div>
            
            <div id="grafica" style="height: 400px; min-width: 310px"></div>
            
            
        </div>
        
      <script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>

        <script type="text/javascript">
            
    
   $(function () { 
    var myChart = Highcharts.chart('grafica', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Fruit Consumption'
        },
        xAxis: {
            categories: ['Apples', 'Bananas', 'Oranges']
        },
        yAxis: {
            title: {
                text: 'Fruit eaten'
            }
        },
        series: [{
            name: 'Jane',
            data: [1, 0, 4]
        }, {
            name: 'John',
            data: [5, 7, 3]
        }]
    });
});

var chart1; // globally available
$(function() {
       chart1 = Highcharts.stockChart('grafica', {
         rangeSelector: {
            selected: 1
         },
         series: [{
            name: 'USD to EUR',
            data: usdtoeur // predefined JavaScript array
         }]
      });
   });


            //SCRIPT SACADO DE INTERNET PARA IMPRIMIR DE FORMA DINAMICA LA FECHA Y HORA EN HTML        

// Current Server Time script (SSI or PHP)- By JavaScriptKit.com (http://www.javascriptkit.com)
// For this and over 400+ free scripts, visit JavaScript Kit- http://www.javascriptkit.com/
// This notice must stay intact for use.

//var currenttime = '<!--#config timefmt="%B %d, %Y %H:%M:%S"--><!--#echo var="DATE_LOCAL" -->' //SSI method of getting server date
            var currenttime = '<? print date("F d, Y H:i:s", time())?>' //PHP method of getting server date

///////////Stop editting here/////////////////////////////////

                var montharray = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December")
                var serverdate = new Date(currenttime)

                function padlength(what) {
                    var output = (what.toString().length == 1) ? "0" + what : what
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



