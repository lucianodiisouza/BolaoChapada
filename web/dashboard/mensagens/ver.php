<!-- Arquivo de índice da aplicação  -->
<?php require('../_header_sub.php'); ?>
<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
<?php require('../_navegar_sub.php'); ?>
<div class="container-fluid" style="width: 90% !important;">
<br>
<br>
<br>
	<?php
		$id = $_GET["id"];
		$sql = "SELECT * FROM mensagens WHERE id = $id;";
		$qry = mysqli_query($conecta, $sql);

		$resultado = mysqli_fetch_assoc($qry);
	?>
<form method="post">
	<div class="header_FlexInicio">
		<h4>Mensagens</h4>
	</div>
	<div class="header_flexFinal">
		<a href="index.php" class="btn btn-danger">Voltar</a> &nbsp;
		<button type="submit" class="btn btn-success">Responder <i class="far fa-paper-plane"></i></button>
		<input type="hidden" name="envia" value="envia">
	</div>
	<div class="row">
		<div class="col-md-4">
			Rementente:
			<input type="text" name="para" class="form-control" value="<?php echo $resultado["id_de"] ?>" required>
		</div>
		<div class="col">
			Assunto:
			<input type="text" name="assunto" class="form-control" value="<?php echo $resultado["assunto"] ?>" required>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col">
			Mensagem:
			<textarea name="mensagem" class="form-control" style="min-height: 300px;" required><?php echo $resultado ["mensagem"] ?></textarea>
		</div>
	</div>

	<?php
		if (isset($_POST['envia'])) {
			//testes
			$user_id = 'admin@mail.com';
			// teste

			$remetente = $user_id;
			$destinatario = $_POST['para'];
			$assunto = $_POST['assunto'];
			$mensagem = $_POST['mensagem'];
			$sql = "INSERT INTO mensagens (id_de, id_para, assunto, mensagem) VALUES ( '$remetente', '$destinatario', '$assunto', '$mensagem' )";

					if ($conecta->query($sql) === TRUE) {
					    echo "Mensagem enviada!";
					} else {
					    echo "Erro: " . $sql . "<br>" . $conecta->error;
					}
					
				}
		 ?>
</form>
<?php require('../_footer.php'); ?>