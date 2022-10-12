<html>
  <head>
  <title>Aca</title>
    <script type="text/javascript">
    google.charts.load('current', {packages: ['corechart', 'line']});
    google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data','Flood.  level (Meas.) (cm)'],
        <?php
          
        include '../dash-Php/conexao/cnn.php';
        $sql = "SELECT DATE_FORMAT (`Datahora`,'%d/%m/%Y %H:%i') as data_formatada,aca FROM SensorLogs 
        WHERE datahora BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 4 DAY) AND DATE_SUB(DATE(NOW()), INTERVAL 0 DAY) order by data_formatada ";
        
        $consulta = mysqli_query($conn,$sql);
   
        while ($dados=mysqli_fetch_array($consulta)){

            $data = $dados['data_formatada'];
            $aca = $dados['aca'];
             
        ?> 
        ['<?php echo $data ?>', <?php echo $aca?>],
        <?php } ?>    
            
        ]);
        
        var options = {
        hAxis: {
            title: 'Data'
        },
        vAxis: {
            title: 'Flood.  level (Meas.) (cm)',
        },
          
        colors: ['#a52714', '#097138'],
        height: 400,
        legend: { position: 'top' }
        };
       
        var chart = new google.visualization.LineChart(document.getElementById('grafico_aca'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="grafico_aca" style=" height: 500px"></div>
  </body>
</html>
