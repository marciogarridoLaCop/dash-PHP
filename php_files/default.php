<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#sombra {
			-webkit-box-shadow: 6px 9px 7px 0px rgba(176,176,176,0.75);
			-moz-box-shadow: 6px 9px 7px 0px rgba(176,176,176,0.75);
			box-shadow: 6px 9px 7px 0px rgba(176,176,176,0.75);
		}

	</style>
</head>
   <!-- Captura do último valore gravado no banco -->
<?php
include($_SERVER['DOCUMENT_ROOT'].'/dash-php/cnn/cnn.php');
			$sql = "SELECT Bateria AS tensao,temp AS temperatura,tempint AS temperatura_interna,pressaoAtm AS pressao
			from SensorLogs order by id desc limit 1";
			$consulta = mysqli_query($conn,$sql);
            $dados = mysqli_fetch_array($consulta);

?>
<body style="background-color: #f3f3f3" >
<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
				<div class="card text-white bg-primary mb-3" style="max-width: 18rem;" id="sombra">
					<div class="card-header">Battery level</div>
					<div class="card-body" >
						<h5 class="card-title" style="text-align: center;font-size: 40px">
							<?php
                            echo $dados['tensao'];
							?>
							<span style="font-size: 10px"> / volts</span></h5>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card text-white bg-success mb-3" style="max-width: 18rem;" id="sombra">
						<div class="card-header">External Temperature</div>
						<div class="card-body">
							<h5 class="card-title" style="text-align: center;font-size: 40px">
								<?php
                                echo $dados['temperatura'];
                                ?>
								<span style="font-size: 10px"> / ºC</span></h5>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card text-white bg-danger mb-3" style="max-width: 18rem;" id="sombra">
							<div class="card-header">Internal Temperature</div>
							<div class="card-body">
								<h5 class="card-title" style="text-align: center;font-size: 40px">
									<?php
                                    echo $dados['temperatura_interna'];
                                    ?>
									<span style="font-size: 10px"> / ºC</span></h5>
								</div>
							</div>
						</div>

				
                    <div class="col-md-3">
						<div class="card text-white bg-info mb mb-3" style="max-width: 18rem;" id="sombra">
							<div class="card-header">Atmospheric Pressure</div>
							<div class="card-body">
								<h5 class="card-title" style="text-align: center;font-size: 40px">
									<?php
                                    echo round($dados['pressao'], 1);;
                                    ?>
									<span style="font-size: 10px"> / (Pa)</span></h5>
								</div>
							</div>
						</div>

					</div>
				</div>
</body>
</html>