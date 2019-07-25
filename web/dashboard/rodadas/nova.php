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
		<h4>Rodadas</h4>
	</div>
	<!-- botoes do topo (enviar e voltar para a página anterior) -->
	<div class="header_flexFinal">
		<a href="index.php" class="btn btn-danger">Voltar</a> &nbsp;
		<button type="submit" class="btn btn-success">Salvar</button>
		<input type="hidden" name="envia" value="envia">
	<!-- botoes do topo (enviar e voltar para a página anterior) -->
	</div>
	<br>
	<div class="row">
		<div class="col">
			<?php $dadosGravados = false;
			if ($dadosGravados == false) {
			?>
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				Preencha até o <strong>final e volte conferindo</strong> O botão de salvar não está aqui em cima por acaso!
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    	<span aria-hidden="true">&times;</span>
			 	</button>
			</div>
			<?php }elseif($dadosGravados == true){ ?>
				<div class="alert alert-success" role="alert">
				  Sua rodada foi gravada com sucesso <a href="index.php" class="success-link">clique aqui</a> para visualizar.
				</div>
			<?php } ?>
			<!-- Alert com dismiss  -->

			<!-- Alert com dismiss -->
		</div>		
	</div>
	<div class="row">
		<div class="col-md-3">
			Nome:
			<input type="text" name="nome" class="form-control" maxlength="250" minlength="5" required>
		</div>
		<div class="col-md-1">
			Valor:
			<select name="valor" class="form-control">
				<option value="5" selected>5 T$</option>
				<option value="10">10 T$</option>
			</select>
		</div>

		<div class="col-md-4">
			Início:
			<input type="datetime-local" name="dataInicio" class="form-control" min>
		</div>
		<div class="col-md-4">
			Término:
			<input type="datetime-local" name="dataTermino" class="form-control">
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			Jogo 1:
			<select name="jogoA" class="form-control" required>
				<option value="" selected disabled hidden>Selecione uma partida...</option>
				<?php
					$sql = "SELECT * FROM jogos ORDER BY data DESC";
					$exibe = mysqli_query($conecta, $sql);
					while ($row = mysqli_fetch_assoc($exibe)){
						// formatando a data e a hora
						$data = date( 'd/m', strtotime($row['data']));
						$hora = date( 'H:i', strtotime($row['hora']));

						echo("<option value='".$row['id']."'>".$row['timeA']." X ".$row['timeB']." - Data: ".$data." - Hora: ".$hora."</option>");
					}
				?>
			</select>
		</div>
		<div class="col-md-6">
			Jogo 2:
			<select name="jogoB" class="form-control" required>
				<option value="" selected disabled hidden>Selecione uma partida...</option>
				<?php
					$sql = "SELECT * FROM jogos ORDER BY data DESC";
					$exibe = mysqli_query($conecta, $sql);
					while ($row = mysqli_fetch_assoc($exibe)){
						// formatando a data e a hora
						$data = date( 'd/m', strtotime($row['data']));
						$hora = date( 'H:i', strtotime($row['hora']));

						echo("<option value='".$row['id']."'>".$row['timeA']." X ".$row['timeB']." - Data: ".$data." - Hora: ".$hora."</option>");
					}
				?>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			Jogo 3:
			<select name="jogoC" class="form-control" required>
				<option value="" selected disabled hidden>Selecione uma partida...</option>
				<?php
					$sql = "SELECT * FROM jogos ORDER BY data DESC";
					$exibe = mysqli_query($conecta, $sql);
					while ($row = mysqli_fetch_assoc($exibe)){
						// formatando a data e a hora
						$data = date( 'd/m', strtotime($row['data']));
						$hora = date( 'H:i', strtotime($row['hora']));

						echo("<option value='".$row['id']."'>".$row['timeA']." X ".$row['timeB']." - Data: ".$data." - Hora: ".$hora."</option>");
					}
				?>
			</select>
		</div>
		<div class="col-md-6">
			Jogo 4:
			<select name="jogoD" class="form-control" required>
				<option value="" selected disabled hidden>Selecione uma partida...</option>
				<?php
					$sql = "SELECT * FROM jogos ORDER BY data DESC";
					$exibe = mysqli_query($conecta, $sql);
					while ($row = mysqli_fetch_assoc($exibe)){
						// formatando a data e a hora
						$data = date( 'd/m', strtotime($row['data']));
						$hora = date( 'H:i', strtotime($row['hora']));

						echo("<option value='".$row['id']."'>".$row['timeA']." X ".$row['timeB']." - Data: ".$data." - Hora: ".$hora."</option>");
					}
				?>
			</select>
		</div>					
	</div>
	<div class="row">
		<div class="col-md-6">
			Jogo 5:
			<select name="jogoE" class="form-control" required>
				<option value="" selected disabled hidden>Selecione uma partida...</option>
				<?php
					$sql = "SELECT * FROM jogos ORDER BY data DESC";
					$exibe = mysqli_query($conecta, $sql);
					while ($row = mysqli_fetch_assoc($exibe)){
						// formatando a data e a hora
						$data = date( 'd/m', strtotime($row['data']));
						$hora = date( 'H:i', strtotime($row['hora']));

						echo("<option value='".$row['id']."'>".$row['timeA']." X ".$row['timeB']." - Data: ".$data." - Hora: ".$hora."</option>");
					}
				?>
			</select>
		</div>
		<div class="col-md-6">
			Jogo 6:
			<select name="jogoF" class="form-control" required>
				<option value="" selected disabled hidden>Selecione uma partida...</option>
				<?php
					$sql = "SELECT * FROM jogos ORDER BY data DESC";
					$exibe = mysqli_query($conecta, $sql);
					while ($row = mysqli_fetch_assoc($exibe)){
						// formatando a data e a hora
						$data = date( 'd/m', strtotime($row['data']));
						$hora = date( 'H:i', strtotime($row['hora']));

						echo("<option value='".$row['id']."'>".$row['timeA']." X ".$row['timeB']." - Data: ".$data." - Hora: ".$hora."</option>");
					}
				?>
			</select>
		</div>					
	</div>
	<div class="row">
		<div class="col-md-6">
			Jogo 7:
			<select name="jogoG" class="form-control" required>
				<option value="" selected disabled hidden>Selecione uma partida...</option>
				<?php
					$sql = "SELECT * FROM jogos ORDER BY data DESC";
					$exibe = mysqli_query($conecta, $sql);
					while ($row = mysqli_fetch_assoc($exibe)){
						// formatando a data e a hora
						$data = date( 'd/m', strtotime($row['data']));
						$hora = date( 'H:i', strtotime($row['hora']));

						echo("<option value='".$row['id']."'>".$row['timeA']." X ".$row['timeB']." - Data: ".$data." - Hora: ".$hora."</option>");
					}
				?>
			</select>
		</div>
		<div class="col-md-6">
			Jogo 8:
			<select name="jogoH" class="form-control" required>
				<option value="" selected disabled hidden>Selecione uma partida...</option>
				<?php
					$sql = "SELECT * FROM jogos ORDER BY data DESC";
					$exibe = mysqli_query($conecta, $sql);
					while ($row = mysqli_fetch_assoc($exibe)){
						// formatando a data e a hora
						$data = date( 'd/m', strtotime($row['data']));
						$hora = date( 'H:i', strtotime($row['hora']));

						echo("<option value='".$row['id']."'>".$row['timeA']." X ".$row['timeB']." - Data: ".$data." - Hora: ".$hora."</option>");
					}
				?>
			</select>
		</div>					
	</div>
	<div class="row">
		<div class="col-md-6">
			Jogo 9:
			<select name="jogoI" class="form-control" required>
				<option value="" selected disabled hidden>Selecione uma partida...</option>
				<?php
					$sql = "SELECT * FROM jogos ORDER BY data DESC";
					$exibe = mysqli_query($conecta, $sql);
					while ($row = mysqli_fetch_assoc($exibe)){
						// formatando a data e a hora
						$data = date( 'd/m', strtotime($row['data']));
						$hora = date( 'H:i', strtotime($row['hora']));

						echo("<option value='".$row['id']."'>".$row['timeA']." X ".$row['timeB']." - Data: ".$data." - Hora: ".$hora."</option>");
					}
				?>
			</select>
		</div>
		<div class="col-md-6">
			Jogo 10:
			<select name="jogoJ" class="form-control" required>
				<option value="" selected disabled hidden>Selecione uma partida...</option>
				<?php
					$sql = "SELECT * FROM jogos ORDER BY data DESC";
					$exibe = mysqli_query($conecta, $sql);
					while ($row = mysqli_fetch_assoc($exibe)){
						// formatando a data e a hora
						$data = date( 'd/m', strtotime($row['data']));
						$hora = date( 'H:i', strtotime($row['hora']));

						echo("<option value='".$row['id']."'>".$row['timeA']." X ".$row['timeB']." - Data: ".$data." - Hora: ".$hora."</option>");
					}
				?>
			</select>
		</div>					
	</div>
	<!-- enviando dados ao DB -->
	<?php 
		if (isset($_POST['envia'])) {
			// declarando as variaveis POST para mandar tudo para o DataBase em uma viagem só
			$nome = $_POST["nome"];
			$valor = $_POST["valor"];
			$dataInicio = $_POST["dataInicio"];
			$dataTermino = $_POST["dataTermino"];

			// Agora começa a brincadeira! eu sequenciei os jogos com letras, pegando apenas o ID, quero ver como isso vai ficar depois hahaha
			$jogoA = $_POST["jogoA"];
			$jogoB = $_POST["jogoB"];
			$jogoC = $_POST["jogoC"];
			$jogoD = $_POST["jogoD"];
			$jogoE = $_POST["jogoE"];
			$jogoF = $_POST["jogoF"];
			$jogoG = $_POST["jogoG"];
			$jogoH = $_POST["jogoH"];
			$jogoI = $_POST["jogoI"];
			$jogoJ = $_POST["jogoJ"];

			$sql = "INSERT INTO rodada (nome, dataInicio, dataTermino, valor, jogoA, jogoB, jogoC, jogoD, jogoE, jogoF, jogoG, jogoH, jogoI, jogoJ ) VALUES ( '$nome', '$dataInicio', '$dataTermino', '$valor', '$jogoA', '$jogoB', '$jogoC', '$jogoD', '$jogoE', '$jogoF', '$jogoG', '$jogoH', '$jogoI', '$jogoJ')";

					if ($conecta->query($sql) === TRUE) {
					    $dadosGravados = true;
					} else {
					    echo "Erro: " . $sql . "<br>" . $conecta->error;
					}
					
				}
		 ?>
</form>
<?php require('../_footer.php'); ?>