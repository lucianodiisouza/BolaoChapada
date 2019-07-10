<!-- Arquivo de índice da aplicação  -->
<?php require('../_header.php'); ?>
<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
<?php require('../_navegar.php'); ?>
<div class="container-fluid" style="width: 90% !important;">
<br>
<br>
<br>
<form method="post">
	<div class="header_FlexInicio">
		<h4>Times</h4>
	</div>
	<div class="header_flexFinal">
		<a href="index.php" class="btn btn-danger">Voltar</a> &nbsp;
		<button type="submit" class="btn btn-success">Enviar <i class="far fa-paper-plane"></i></button>
		<input type="hidden" name="envia" value="envia">
	<?php 
		$id = $_GET['id'];

		$sql = "SELECT * FROM times WHERE id = $id;";
		$qry = mysqli_query($conecta, $sql);
		$linha = mysqli_fetch_assoc($qry);
	 ?>	
	</div>
	<div class="row">
		<div class="col">
			Nome:
			<input type="text" name="nome" class="form-control" value="<?php echo $linha['nome'] ?>" required>
		</div>
		<div class="col">
			Sigla:
			<input type="text" name="sigla" class="form-control" maxlength="3" minlength="3" value="<?php echo $linha['sigla'] ?>" required>
		</div>
		<div class="col">
			Série:
			<input type="text" name="serie" class="form-control" value="<?php echo $linha['serie'] ?>" required>
		</div>
	</div>
	<?php 
		if (isset($_POST['envia'])) {
			//testes
			$user_id = 'admin';
			// teste

			$nome = $_POST['nome'];
			$sigla = $_POST['sigla'];
			$serie = $_POST['serie'];
			$sql = "UPDATE times SET nome='$nome', sigla='$sigla', serie='$serie' WHERE id = $id;";

			if ($conecta->query($sql) === TRUE) {
				    echo "Time atualizado!";
				} else {
				    echo "Erro: " . $sql . "<br>" . $conecta->error;
				}
				
			}
		 ?>
</form>
<?php require('../_footer.php'); ?>