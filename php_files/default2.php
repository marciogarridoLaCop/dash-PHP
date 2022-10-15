<?php
#Consultando valores no banco de dados
include($_SERVER['DOCUMENT_ROOT'].'/dash-php/cnn/cnn.php');
  $sql = "SELECT DATE_FORMAT (`Datahora`,'%d/%m/%Y %H:%i') as data_formatada,temp,tempint,aca,aca_adj FROM SensorLogs 
  WHERE datahora BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 2 DAY) AND DATE_SUB(DATE(NOW()), INTERVAL 0 DAY)";
  $consulta = mysqli_query($conn,$sql);

$mes = '';
$aca = '';
$aca_adj = '';
$temp = '';
$tempint = '';

while ($dados = mysqli_fetch_array($consulta)) {
				
  $mes = $mes . '"' . $dados['data_formatada'] . '",';
	 $temp = $temp . '"' . $dados['temp'] . '",';
	 $tempint = $tempint . '"' . $dados['tempint'] . '",';
	 $aca = $aca . '"' . $dados['aca_adj'] . '",';
	 $aca_adj = $aca_adj . '"' . $dados['aca'] . '",';

	 $mes = trim($mes); #tira os espaços da variável
	 $aca = trim($aca);
	 $aca_adj = trim($aca_adj);
	 $temp = trim($temp);
	 $tempint = trim($tempint);
	
}
#Label das legendas
$temperatura="Temperature";
$pressao="Pressure";
$external_temp="External Temperature";
$internal_temp="Internal Temperature";
$level_aca="Aca Level";
$level_aca_adj="Aca Level Adj";
$data="Date";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Gráficos iniciais </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- CDN do Chart.js -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
</head>
<body>
<body>
<div class="container-fluid" style="background-color: #fff;margin-top: 20px;">
    <div class="row">
      <div class="col-md-6">
        <h4>Level</h4>
        <div id="curve_chart" class="sombra"></div>
		<canvas id="nivel"></canvas>
      </div>
      <div class="col-md-6">
        <h4>Temperature</h4>
        <div id="curve_chart2"  class="sombra"></div>
		<canvas id="temperatura"></canvas>
      </div>
    </div>
  </div>
</body>

<!-- Scripts de gráficos -->

<!-- Elemento de exibição do Nível  -->
<script type="text/javascript">
	var ctx = document.getElementById('nivel').getContext('2d');
	var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
    		labels:[<?php echo $mes; ?>],
    		datasets:
    		[{
    			label:'<?php echo $level_aca; ?>',
    			data:[<?php echo $aca; ?>],
    			backgroundColor: 'transparent',
    			borderColor: 'rgba(255,99,132)',
    			borderWidth: 3
    		},
			{
    			label:'<?php echo $level_aca_adj; ?>',
    			data:[<?php echo $aca_adj; ?>],
    			backgroundColor: 'transparent',
    			borderColor: 'blue',
    			borderWidth: 3

    		}]

    },
    options: { 
      responsive: true,
		scales: {
			
			xAxes: [{ 
				display: true,
				scaleLabel: 
					{
					display: true,
					labelString: '<?php echo $data; ?>',
					fontColor:'grey',
					fontSize:11
					},
							
				ticks: 
				{
					fontColor: "grey",
					fontSize: 12
				}
			}],
						
			
			yAxes: [{
				beginAtZero: false,
				display: true,
				scaleLabel: 
					{
					display: true,
					labelString: 'Flood.  level (Meas.) (cm)',
					fontColor: 'grey',
					fontSize:12
					},
			ticks: {
				fontColor: "grey",
				fontSize: 12
					}
			}],
			tooltips: {mode: 'index'},
		},


	}

});
</script>

<!-- Elemento de exibição da Temperatura  -->
<script type="text/javascript">
	var ctxy = document.getElementById('temperatura').getContext('2d');
	var myLineChart = new Chart(ctxy, {
    type: 'line',
    data: {
    		labels:[<?php echo $mes; ?>],
    		datasets:
    		[{
    			label:'<?php echo $external_temp; ?>',
    			data:[<?php echo $temp; ?>],
    			backgroundColor: 'transparent',
    			borderColor: 'rgba(255,99,132)',
    			borderWidth: 3
    		},
    		{
    			label:'<?php echo $internal_temp; ?>',
    			data:[<?php echo $tempint; ?>],
    			backgroundColor: 'transparent',
    			borderColor: 'blue',
    			borderWidth: 3

    		}]
    },
    options: { 
		
		scales: {
			
			xAxes: [{ 
				display: true,
				scaleLabel: 
					{
					display: true,
					labelString: '<?php echo $data; ?>',
					fontColor:'grey',
					fontSize:11
					},
							
				ticks: 
				{
					fontColor: "grey",
					fontSize: 12
				}
			}],
					
		
			yAxes: [{
				beginAtZero: false,
				display: true,
				scaleLabel: 
					{
					display: true,
					labelString: 'Temperature - C°.',
					fontColor: 'grey',
					fontSize:12
					},
			ticks: {
				fontColor: "grey",
				fontSize: 12
					}
			}],
			tooltips: {mode: 'index'},
		},
	}

});
</script>
</html>