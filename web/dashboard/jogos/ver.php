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
	<!-- botoes do topo (enviar e voltar para a página anterior) -->
	<div class="header_flexFinal">
		<a href="index.php" class="btn btn-danger">Cancelar</a> &nbsp;
		<button type="submit" class="btn btn-success">Salvar</button>
		<input type="hidden" name="envia" value="envia">
	<!-- botoes do topo (enviar e voltar para a página anterior) -->
	</div>
    <br>
    <?php 
        $id = $_GET['id'];
        $sql = "SELECT * FROM jogos WHERE id = $id ";
        $qry = mysqli_query($conecta, $sql);
        $jogo = mysqli_fetch_assoc($qry);
        
        $data = date( 'd/m/Y', strtotime($jogo["data"]));
        $hora = date( 'H:i', strtotime($jogo["hora"]));	

        
    ?>
    <div class="row">
			<div class="col">
				Time Mandante:
				<select name="siglaMandante" class="form-control" required>
					<option value="<?php echo $jogo['timeA'] ?>" hidden selected><?php echo $jogo['nomeTimeA'] ?></option>
					<?php
						$sql = "SELECT * FROM times order by nome asc";
						$exibe = mysqli_query($conecta, $sql);
						while ($time = mysqli_fetch_assoc($exibe)){
					?>
						<option value="<?php echo $time['sigla'] ?>"><?php echo $time['nome'] ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div class="col">
				Time Visitante:
				<select name="siglaVisitante" class="form-control" required>
					<option value="<?php echo $jogo['timeB'] ?>" hidden selected><?php echo $jogo['nomeTimeB'] ?></option>
					<?php
						$sql = "SELECT * FROM times order by nome asc";
						$exibe = mysqli_query($conecta, $sql);
						while ($time = mysqli_fetch_assoc($exibe)){
					?>
						<option value="<?php echo $time['sigla'] ?>"><?php echo $time['nome'] ?></option>
					<?php
						}
					?>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col">
				Data:
				<input type="date" name="data" class="form-control" value="<?php echo $data ?>" required>
			</div>
			<div class="col">
				Hora:
				<input type="time" name="hora" class="form-control" value="<?php echo $hora ?>" required>
			</div>
			<div class="col">
				Local:
				<input type="text" name="local" class="form-control" value="<?php echo $jogo['local'] ?>" required>
			</div>
		</div>
	</div>
	<!-- Enviar DB -->
	<?php 
		if (isset($_POST['envia'])) {

			// declarando as variaveis POST para mandar tudo para o DataBase em uma viagem só
			$siglaMandante = $_POST['siglaMandante'];
			$siglaVisitante = $_POST['siglaVisitante'];
			$data = $_POST['data'];
			$hora = $_POST['hora'];			
			$local = $_POST['local'];
			
			// artificio técnico de grande valia... kkkkk
			// Mandante
			$sql = "SELECT nome FROM times WHERE sigla = '{$siglaMandante}';";
			$qry = mysqli_query($conecta, $sql);
			$resultado = mysqli_fetch_assoc($qry);
			$mandante = $resultado['nome'];
			// Visitante
			$sqlB = "SELECT nome FROM times WHERE sigla = '{$siglaVisitante}';";
			$qryB = mysqli_query($conecta, $sqlB);
			$resultadoB = mysqli_fetch_assoc($qryB);
			$visitante = $resultadoB['nome'];
			
			// Agora começa a brincadeira! eu sequenciei os jogos com letras, pegando apenas o ID, quero ver como isso vai ficar depois hahaha
			$sql = "UPDATE jogos SET timeA='$siglaMandante', nomeTimeA='$mandante', timeB='$siglaVisitante', nomeTimeB='$visitante', local='$local', data='$data', hora='$hora' WHERE id = $id";

					if ($conecta->query($sql) === TRUE) {
					    $dadosGravados = true;
					} else {
					    echo "Erro: " . $sql . "<br>" . $conecta->error;
					}
					
				}
		 ?>
</form>
<?php require('../_footer.php'); ?>