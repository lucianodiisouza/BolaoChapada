<!-- Arquivo de índice da aplicação  -->
<?php require('../_header.php'); ?>
<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
<?php require('../_navegar.php'); ?>
<div class="container-fluid" style="width: 90% !important;">
<br>
<br>
<br>
	<div class="row">
		<div class="col-md-6 colunaCustom">
			<div class="header_coluna">
				<h4>Times</h4>
				<a href="novo.php" class="btn btn-success">Novo Time</a>						
			</div>
			<hr>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Nome do Time</th>
							<th scope="col">Sigla</th>
							<th scope="col">Série Atual</th>
							<th scope="col"><center>Ações</center></th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$sql = "SELECT * FROM times ORDER BY nome ASC;";
						$qry = mysqli_query($conecta, $sql);
						while ($linha = mysqli_fetch_array($qry)) {
					?>
						<tr>
							<td><?php echo $linha["id"] ?></td>
							<td><?php echo $linha["nome"] ?></td>
							<td><?php echo $linha["sigla"] ?></td>
							<td><?php echo $linha["serie"] ?></td>
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


