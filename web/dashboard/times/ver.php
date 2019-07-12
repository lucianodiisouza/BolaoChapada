<!-- Arquivo de índice da aplicação  -->
<?php require('../_header_sub.php'); 
		$id = $_GET["id"];
?>
<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
<?php require('../_navegar_sub.php'); ?>
<div class="container-fluid" style="width: 90% !important;">
<br>
<br>
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../">Home</a></li>
    <li class="breadcrumb-item"><a href="index.php">Times</a></li>
    <li class="breadcrumb-item active" aria-current="page">Time</li>
  </ol>
</nav>
<form method="post">
	<div class="header_FlexInicio">
		<h4>Times</h4>
	</div>
	<div class="header_flexFinal">
		<a href="index.php" class="btn btn-danger">Voltar</a> &nbsp;
		<a href="editar.php?id=<?php echo $id ?>" class="btn btn-success">Editar <i class="fas fa-pencil-alt"></i></a>
		<input type="hidden" name="envia" value="envia">
	<?php
		$sql = "SELECT * FROM times WHERE id = $id;";
		$qry = mysqli_query($conecta, $sql);

		$resultado = mysqli_fetch_assoc($qry);
	?>
	</div>
	<div class="row">
		<div class="col">
			Nome:
			<input type="text" name="nome" class="form-control" value="<?php echo $resultado['nome'] ?>" readonly>
		</div>
		<div class="col">
			Sigla:
			<input type="text" name="sigla" class="form-control" maxlength="3" minlength="3" value="<?php echo $resultado['sigla'] ?>" readonly>
		</div>
		<div class="col">
			Série:
			<input type="text" name="serie" class="form-control" value="<?php echo $resultado['serie'] ?>" readonly>
		</div>
	</div>
</form>
<?php require('../_footer.php'); ?>