<html>
  <head>
  <title>Google Chart</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data','Temperatura'],
        <?php
          
        include 'cnn.php';
        $sql = "SELECT * FROM SensorLogs order by Datahora desc limit 10";
        $consulta = mysqli_query($conn,$sql);
   
        while ($dados=mysqli_fetch_array($consulta)){

            $data = $dados['DataHora'];
            $temperatura = $dados['temp'];
            $h = $dados['h'];
     
        ?> 
        ['<?php echo $data ?>', <?php echo $temperatura?>],
        <?php } ?>    
            
        ]);
        
        var options = {
          title: 'Dados Temp',
          curveType: 'function',
          legend: { position: 'right' }
        };
       
        var chart = new google.visualization.LineChart(document.getElementById('grafico_linha'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="grafico_linha" style="width: 900px; height: 500px"></div>
  </body>
</html>
