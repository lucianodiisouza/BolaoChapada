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
				<h4>Mensagens</h4>
				<a href="nova.php" class="btn btn-success">Nova conversa</a>						
			</div>
			<hr>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">De</th>
							<th scope="col">Assunto</th>
							<th scope="col">Data</th>
							<th scope="col">Mensagem</th>
							<th scope="col"><center>Ações</center></th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$sql = "SELECT * FROM mensagens where id_para = '$usuarioAtual';";
						$qry = mysqli_query($conecta, $sql);
						while ($linha = mysqli_fetch_array($qry)) {
					?>
						<tr>
					<td><?php echo $linha["id_de"] ?></td>
					<td><?php echo $linha["assunto"] ?></td>
					<td><?php echo $linha["data"] ?></td>
					<td><?php echo $linha["mensagem"] ?></td>
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


