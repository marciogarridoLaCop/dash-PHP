<!DOCTYPE html>
<html>
<head>
<title></title>

</head>
<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css"
      integrity="sha512-1k7mWiTNoyx2XtmI96o+hdjP8nn0f3Z2N4oF/9ZZRgijyV4omsKOXEnqL1gKQNPy2MTSP9rIEWGcH/CInulptA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<br><script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>

<body style="background-color: #f3f3f3" >
<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
			<table id="tabela" class="table table-striped" style="width:100%">
        <thead>
            <tr >
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
        <tfoot>
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
        </tfoot>
    </table>
    <script src="/dash-php/js/pagination.js"></script>
</div>

		</div>	
</body>
</html>