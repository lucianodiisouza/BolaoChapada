<!-- Arquivo de índice da aplicação  -->
<?php require('../_header_sub.php'); ?>
<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
<?php require('../_navegar_sub.php'); ?>
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
	</div>
	<div class="row">
		<div class="col">
			Nome:
			<input type="text" name="nome" class="form-control" required>
		</div>
		<div class="col">
			Sigla:
			<input type="text" name="sigla" class="form-control" maxlength="3" minlength="3" required>
		</div>
		<div class="col">
			Série:
			<input type="text" name="serie" class="form-control" required>
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
			$sql = "INSERT INTO times (nome, sigla, serie) VALUES ( '$nome', '$sigla', '$serie' )";

			if ($conecta->query($sql) === TRUE) {
				    echo "Mensagem enviada!";
				} else {
				    echo "Erro: " . $sql . "<br>" . $conecta->error;
				}
				
			}
		 ?>
</form>
<?php require('../_footer.php'); ?>