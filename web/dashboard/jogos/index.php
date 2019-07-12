<!-- Arquivo de índice da aplicação  -->
<?php require('../_header_sub.php'); ?>
<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
<?php require('../_navegar_sub.php'); ?>
<div class="container-fluid" style="width: 90% !important;">
<br>
<br>
<br>
	<div class="row">
		<div class="col colunaCustom">
			<div class="header_coluna">
				<h4>Jogos</h4>
				<a href="novo.php" class="btn btn-success"><i class="fas fa-plus"></i></a>						
			</div>
			<hr>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col"><center>Time Mandante</center></th>
							<th scope="col" colspan="2"><center>Placar</center></th>
							<!-- <th>Coluna mesclada com colspan</th> -->
							<th scope="col"><center>Time Visitante</center></th>
							<th><center>Data/Hora</center></th>
							<th>Local</th>
							<th scope="col"><center>Ações</center></th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$sql = "SELECT * FROM jogos ORDER BY data DESC;";
						$qry = mysqli_query($conecta, $sql);
						while ($linha = mysqli_fetch_array($qry)) {
						
						$data = date( 'd/m', strtotime($linha["data"]));
						$hora = date( 'H:i', strtotime($linha["hora"]));
					?>
						<tr>
							<td><?php echo $linha["id"] ?></td>
							<td><center><?php echo $linha["timeA"] ?></center></td>
							<td><center><?php echo $linha["placarA"] ?></center></td>
							<td><center><?php echo $linha["placarB"] ?></center></td>
							<td><center><?php echo $linha["timeB"] ?></center></td>
							<td><center><?php echo $data. " - " .$hora ?></center></td>
							<td><?php echo $linha["local"] ?></td>
							<td><center><a href="ver.php?id=<?php echo $linha["id"]?>"><i class="far fa-eye"></i></a></center></td>
						</tr>			
					<?php
						}									 
					?>
					</tbody>
				</table>
			</div>
		</div>	
	</div>
</div>
<?php require('../_footer.php') ?>


