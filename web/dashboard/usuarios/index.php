<!-- Arquivo de índice da aplicação  -->
<?php require('../_header_sub.php'); ?>
<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
<?php require('../_navegar_sub.php'); ?>
 
<br><br><br>
<div class="container">
		<div class="text-right">
			<a href="cadastrar.php" class="btn btn-success text-right">Novo Usuário</a>
		</div>
		<br>
	<table id="minhaTabela" class="table table-striped table-bordered" style="width:100%">
		        <thead>
		            <tr>
		                <th>ID</th>
		                <th>Usuário</th>
		                <th>Email</th>
		                <th>Celular</th>
		                <th>Ações</th>
		            </tr>
		        </thead>
			<tbody>
				<?php 
					$sql = "SELECT * FROM usuarios;";
					$qry = mysqli_query($conecta, $sql);
					while ($linha = mysqli_fetch_array($qry)) {
				?>
				
				<tr>
					<td>
						<center><?php echo $linha["id"] ?></center>
					</td>
					<td>
						<?php echo $linha["usuario"] ?>
							
						</td>
					<td><?php echo $linha["email"] ?></td>
					<td><?php echo $linha["celular"] ?></td>
					<td><center><a href="visualiza.php?id=<?php echo $linha["id"] ?>"><i class="far fa-eye"></i></a></center></td>
				</tr>
			
			<?php
				}									 
			?>
		    </tbody>
		        <tfoot>
		            <tr>
		                <th>ID</th>
		                <th>Usuário</th>
		                <th>Email</th>
		                <th>Telefone</th>
		                <th>Ações</th>
		            </tr>
		        </tfoot>
		</table>

</div>
		
<?php require('../_footer.php'); ?>