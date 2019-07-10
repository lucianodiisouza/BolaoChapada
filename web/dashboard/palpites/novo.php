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
		<h4>Palpites</h4>
	</div>
	<div class="header_flexFinal">
		<a href="index.php" class="btn btn-danger">Voltar</a> &nbsp;
		<button type="submit" class="btn btn-success">Enviar <i class="far fa-paper-plane"></i></button>
		<input type="hidden" name="envia" value="envia">
	</div>
	<div class="row">
		<div class="col-md-4">
			<select name="rodada" class="form-control" required>
				<option value="" selected disabled hidden>Selecione uma rodada...</option>
				<?php
					$sql = "SELECT * FROM rodada ORDER BY dataTermino DESC;";
					$qry = mysqli_query($conecta, $sql);
					while ($resultado = mysqli_fetch_assoc($qry)){
						// echo "funcionando";
						echo "<option value='".$resultado['id']."'>".$resultado["nome"]."</option>";
					}
				?>
			</select>
		</div>
	</div>

	fr
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