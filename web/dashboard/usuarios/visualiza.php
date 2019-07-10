<?php require('../_header.php'); ?>
<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
<?php require('../_navegar.php'); ?>
	<?php
		$id = $_GET["id"];
		$sql = "SELECT * FROM usuarios WHERE id = $id;";
		$qry = mysqli_query($conecta, $sql);

		$resultado = mysqli_fetch_assoc($qry);
	?>
<div class="container-fluid">
	<br>
	<br>
	<br>
	<div class="row">
		<div class="col-md-2">
				<center>
					<img src="../<?php echo $resultado["avatar"]; ?>" class="img_perfil">
				</center>
		</div>	
		<div class="col-md-10">
			<form method="post">
				<div class="text-right">
					<a href="editar.php?id=<?php echo $id ?>" class="btn btn-danger">Editar</a>
					<a href="index.php"  class="btn btn-success text-right">Voltar</a>
				</div>
				<div class="row">
					<div class="col-md-1">
						ID:
						<input type="text" name="id" class="form-control" value="<?php echo $resultado["id"]; ?>" readonly>
					</div>
					<div class="col">
						Usuário:
						<input type="text" name="usuario" class="form-control" value="<?php echo $resultado["usuario"]; ?>" readonly>
					</div>
					<div class="col-md-2">
						Senha:
						<input type="password" name="senha" class="form-control" value="<?php echo $resultado["password"]; ?>" readonly>
					</div>
					<div class="col">
						Nome:
						<input type="text" name="nome" class="form-control" value="<?php echo $resultado["nome"]; ?>" readonly>
					</div>
					<div class="col">
						Email:
						<input type="mail" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="<?php echo $resultado["email"]; ?>" readonly>
					</div>
				</div>
				<div class="row">
					<div class="col">
						Time:
						<input type="text" name="time" class="form-control" value="<?php echo $resultado["meutime"]; ?>" readonly>
					</div>
					<div class="col">
						Telefone:
						<input type="tel" name="telefone" class="form-control" value="<?php echo $resultado["telefone"]; ?>" readonly>
					</div>
					<div class="col">
						Celular:
						<input type="tel" name="celular" class="form-control" value="<?php echo $resultado["celular"]; ?>" readonly>
					</div>
					<div class="col">
						Sexo:
						<input type="text" name="sexo" class="form-control" value="<?php echo $resultado["sexo"]; ?>" readonly>
					</div>
				</div>
				<div class="row">
					<div class="col">
						Rua:
						<input type="text" name="rua" class="form-control" value="<?php echo $resultado["rua"]; ?>" readonly>
					</div>
					<div class="col-md-2">
						Nº:
						<input type="text" name="numero" class="form-control" value="<?php echo $resultado["numero"]; ?>" readonly>
					</div>
					<div class="col">
						Bairro:
						<input type="text" name="bairro" class="form-control" value="<?php echo $resultado["bairro"]; ?>" readonly>
					</div>
					<div class="col">
						Cidade:
						<input type="text" name="cidade" class="form-control" value="<?php echo $resultado["cidade"]; ?>" readonly>
					</div>
					<div class="col-md-2">
						Estado:
						<input type="text" name="estado" class="form-control" value="<?php echo $resultado["estado"]; ?>" readonly>
					</div>
				</div>
				<div class="row">
					<div class="col">
						Banco:
						<input type="text" name="banco" class="form-control" value="<?php echo $resultado["banco"]; ?>" readonly>
					</div>
					<div class="col-md-2">
						Agência:
						<input type="text" name="agencia" class="form-control" value="<?php echo $resultado["agencia"]; ?>" readonly>
					</div>
					<div class="col-md-2">
						Conta:
						<input type="text" name="conta" class="form-control" value="<?php echo $resultado["conta"]; ?>" readonly>
					</div>
					<div class="col-md-1">
						Operação:
						<input type="text" name="operacao" class="form-control" value="<?php echo $resultado["operacao"]; ?>" readonly>
					</div>
					<div class="col-md-3">
						CPF:
						<input type="text" name="cpf" class="form-control" value="<?php echo $resultado["cpf"]; ?>" readonly>
					</div>				
				</div>
				<!--<div class="row">
					<div class="col-md-3">
						Saldo:
						<input type="text" name="saldo" class="form-control">
					</div>
					<div class="col-md-3">
						Pontuação:
						<input type="text" name="saldo" class="form-control">
					</div>
				</div> -->
				<br>
			</form>
			
		</div>
	</div>
</div>

<?php require('../_footer.php'); ?>