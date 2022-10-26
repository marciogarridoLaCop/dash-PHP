<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	<title>DataTables example - Responsive integration (Bootstrap)</title>
	<link rel="shortcut icon" type="image/png" href="/media/images/favicon.png">
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.2.4/css/fixedHeader.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
	
	<style type="text/css" class="init">
	
	</style>
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js "> defer </script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap.min.js"> </script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/fixedheader/3.2.4/js/dataTables.fixedHeader.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
</head>
<body class="wide comments example dt-example-bootstrap">
	<a name="top" id="top"></a>
	<div class="fw-background">
		<div></div>
	</div>
	<div class="fw-container">
		<div class="fw-nav">
		</div>
		<div class="fw-body">
			<div class="content">
				<h1 class="page_title">Dados coletados</h1>
				<div class="info">
					<p>Os dados coletados poderão ser filtrados e apresentados de acordo com as condições abaixo</p>
				</div>
				<div class="demo-html">
					<table id="tabela" class="table table-striped table-bordered nowrap" style="width:100%">
						<thead>
							<tr>
							<th>id</th>
                			<th>Id Equipamento</th>
                			<th>Data</th>
                			<th>Aca Adj</th>
                			<th>Aca</th>
                			<th>Temperatura</th>
                			<th>H</th>
                			<th>Pressão</th>
                			<th>Temppelt</th>
                			<th>Tampa</th>
                			<th>Bateria</th>
                			<th>Ac Antes</th>
                			<th>Ac Depois</th>
                			<th>IP</th>
							</tr>
						</thead>
						<tbody>
						<?php
            include($_SERVER['DOCUMENT_ROOT'].'/dash-php/cnn/cnn.php');
            $sql = "SELECT ID,IDEquip, DATE_FORMAT (`Datahora`,'%d/%m/%Y %H:%i') as data_formatada, aca_adj,aca,temp,h,PressaoAtm,Temppelt,Tampa,Bateria,ACantes,ACDepois,IPAddress FROM SensorLogs";
            $query = mysqli_query($conn,$sql);

            while ($dados = mysqli_fetch_array($query)) {
                
                $id = $dados['ID'];
                $id_equip = $dados['IDEquip'];
                $datahora = $dados['data_formatada'];
                $acaadj = $dados['aca_adj'];
                $aca = $dados['aca'];
                $temp = $dados['temp'];
                $h = $dados['h'];
                $pressao = $dados['PressaoAtm'];
                $Temppelt = $dados['Temppelt'];
                $Tampa = $dados['Tampa'];
                $Bateria = $dados['Bateria'];
                $ACantes = $dados['ACantes'];
                $ACDepois = $dados['ACDepois'];
                $ip = $dados['IPAddress'];

                ?>
           				<tr>
        	 	
							<td><?php echo $id ?></td>
							<td><?php echo $id_equip ?></td>
							<td><?php echo $datahora ?></td>
							<td><?php echo $acaadj ?></td>
							<td><?php echo $aca ?></td>
							<td><?php echo $temp ?></td>
							<td><?php echo $h ?></td>
							<td><?php echo $pressao ?></td>
							<td><?php echo $Temppelt ?></td>
							<td><?php echo $Tampa ?></td>
							<td><?php echo $Bateria ?></td>
							<td><?php echo $ACantes ?></td>
							<td><?php echo $ACDepois ?></td>
							<td><?php echo $ip ?></td>
 	
            			</tr>
           		<?php } ?>
						</tbody>
					</table>
					<script src="/dash-php/js/responsive.js"></script>
				</div>	
			</div>
		</div>
	</div>
	<div class="fw-footer">
		<div class="skew"></div>
		<div class="skew-bg"></div>
		<div class="copyright">
			<h4>Flooding on Route</h4>
			© 2022-2022 Lacop</a>.<br>
			Universidade Federal Fluminense - LaCop.</p>
		</div>
	</div>
</body>
</html>