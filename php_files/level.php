<?php
#Consultando valores no banco de dados
include($_SERVER['DOCUMENT_ROOT'].'/dash-php/cnn/cnn.php');
  $sql = "SELECT DATE_FORMAT (`Datahora`,'%d/%m/%Y %H:%i') as data_formatada,h,PressaoAtm,aca,aca_adj FROM (SELECT 
  * FROM SensorLogs ORDER BY id DESC LIMIT 50) lastNrows_subquery ORDER BY id";
  $consulta = mysqli_query($conn,$sql);

$mes = '';
$aca = '';
$aca_adj = '';
$temp = '';
$tempint = '';
$h = '';
$dadospressao = '';

while ($dados = mysqli_fetch_array($consulta)) {
				
     $mes = $mes . '"' . $dados['data_formatada'] . '",';
	 $aca = $aca . '"' . $dados['aca'] . '",';
	 $aca_adj = $aca_adj . '"' . $dados['aca_adj'] . '",';
     $h = $h . '"' . $dados['h'] . '",';
	 $dadospressao = $dadospressao . '"' . $dados['PressaoAtm'] . '",';

	 $mes = trim($mes); #tira os espaços da variável
	 $aca = trim($aca);
	 $aca_adj = trim($aca_adj);
     $h = trim($h);
	 $dadospressao = trim($dadospressao);

	
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>

<body style="background-color: #f3f3f3">
<div class="container-fluid"  style="background-color: #f3f3f3;margin-top: 20px;">
        <div class="row">
            <div class="col-md-6" >
                    <div class="card text-white bg-light mb-12" style="max-width: 80rem;" id="sombra">
                        <canvas id="nivel"></canvas>
					</div>
			</div>
            <div class="col-md-6" >
                    <div class="card text-white bg-light mb-12" style="max-width: 80rem;" id="sombra">
                        <canvas id="nivel2"></canvas>
					</div>
			</div>
        </div>
        <div class="row">
        &nbsp   
        </div>
        <div class="row">
        <div class="col-md-6">
                    <div class="card text-white bg-light mb-12" style="max-width: 80rem;" id="sombra">
                        <canvas id="pressao"></canvas>
					</div>
			</div>
      
        <div class="col-md-6">
                    <div class="card text-white bg-light mb-12" style="max-width: 80rem;" id="sombra">
                        <canvas id="h"></canvas>
					</div>
			</div>
        </div>    
</body>
</html>



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


<script type="text/javascript">
	var ctx = document.getElementById('nivel2').getContext('2d');
	var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
    		labels:[<?php echo $mes; ?>],
    		datasets:
    		[{
    			label:'<?php echo $level_aca_adj; ?>',
    			data:[<?php echo $aca_adj; ?>],
    			backgroundColor: 'transparent',
    			borderColor: 'rgba(133,0,39)',
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
					labelString: 'Flood.  level (Adj.) (cm)',
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

<script type="text/javascript">
	var ctx = document.getElementById('pressao').getContext('2d');
	var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
    		labels:[<?php echo $mes; ?>],
    		datasets:
    		[{
    			label:'<?php echo $pressao; ?>',
    			data:[<?php echo $dadospressao; ?>],
    			backgroundColor: 'transparent',
    			borderColor: 'rgba(18,18,99)',
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
					labelString: 'Pressure (Pa)',
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


<script type="text/javascript">
	var ctx = document.getElementById('h').getContext('2d');
	var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
    		labels:[<?php echo $mes; ?>],
    		datasets:
    		[{
    			label:'Humidity',
    			data:[<?php echo $h; ?>],
    			backgroundColor: 'transparent',
    			borderColor: 'rgba(8,100,39)',
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
					labelString: 'Humidity (%)',
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