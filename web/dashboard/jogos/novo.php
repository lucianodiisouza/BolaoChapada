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
		<h4>Jogos</h4>
	</div>
	<div class="header_flexFinal">
		<a href="index.php" class="btn btn-danger">Voltar</a> &nbsp;
		<button type="submit" class="btn btn-success">Enviar <i class="far fa-paper-plane"></i></button>
		<input type="hidden" name="envia" value="envia">
	</div>
		<div class="row">
			<div class="col">
				Time Mandante:
				<select name="timeMandante" class="form-control" required>
					<option value="" selected disabled hidden>Selecione um time...</option>
					<?php
						$sql = "SELECT * FROM times order by nome asc";
						$exibe = mysqli_query($conecta, $sql);
						while ($rowA = mysqli_fetch_assoc($exibe)){
							?>
							<option value="<?php echo [($rowA['sigla']). ($rowA['nome'])]; ?>"><?php echo $rowA['nome']; ?></option>
						<?php
						}
					?>
				</select>
			</div>
			<div class="col">
				Time Visitante:
				<select name="timeVisitante" class="form-control" required>
					<option value="" selected disabled hidden>Selecione um time...</option>
					<?php
						$sql = "SELECT * FROM times order by nome asc";
						$exibe = mysqli_query($conecta, $sql);
						while ($rowB = mysqli_fetch_assoc($exibe)){
							$nomeB = $rowB['nome'];
							echo("<option value='".$rowB['sigla']."'>".$rowB['nome']."</option>");
						}
					?>
				</select>
			</div>	
		</div>
		<div class="row">
			<div class="col">
				Data:
				<input type="date" name="data" class="form-control" required>
			</div>
			<div class="col">
				Hora:
				<input type="time" name="hora" class="form-control" required>
			</div>
			<div class="col">
				Local:
				<input type="text" name="local" class="form-control">
			</div>
		</div>
	</div>
	<?php 
		if (isset($_POST['envia'])) {
			$nomeTimeA = $_POST['$nomeA'];
			$nomeTimeB = $_POST['$nomeB'];
			$timeMandante = $_POST['timeMandante'];
			$timeVisitante = $_POST['timeVisitante'];
			$data = $_POST['data'];
			$hora = $_POST['hora'];
			$local = $_POST['local'];

			$sql = "INSERT INTO jogos (timeA, nomeTimeA, nomeTimeB, timeB, data, hora, local) VALUES ( '$timeMandante', '$nomeTimeA', '$nomeTimeB', '$timeVisitante', '$data', '$hora', '$local' )";
			if ($conecta->query($sql) === TRUE) {
				    echo "Jogo cadastrado";
				} else {
				    echo "Erro: " . $sql . "<br>" . $conecta->error;
				}
				
			}
		 ?>
</form>
<?php require('../_footer.php'); ?>