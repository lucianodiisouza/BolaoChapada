<!-- Arquivo de índice da aplicação  -->
<?php require('../_header_sub.php'); ?>
<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
<?php require('../_navegar_sub.php'); ?>
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
	<form method="post">
		<div class="row">
			<div class="col-md-1">
				ID:
				<input type="text" name="id" class="form-control" value="<?php echo $resultado["id"]; ?>" readonly>
			</div>
			<div class="col">
				Usuário:
				<input type="text" name="usuario" class="form-control" value="<?php echo $resultado["usuario"]; ?>" maxlength="16" minlength="4" required>
			</div>
			<div class="col">
				Tipo:
				<select name="tipoUsuario" class="form-control" required>
					<option value="<?php echo $resultado['role'] ?>" hidden selected><?php echo $resultado['role'] ?></option>
					<option value="admin">Administrador</option>
					<option value="user">Usuário</option>					
				</select>
			</div>
			<div class="col-md-2">
				Senha:
				<input type="password" name="senha" class="form-control" value="<?php echo $resultado["password"]; ?>" readonly>
			</div>
			<div class="col">
				Nome:
				<input type="text" name="nome" class="form-control" value="<?php echo $resultado["nome"]; ?>" maxlength="100" required>
			</div>
			<div class="col">
				Email:
				<input type="mail" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="<?php echo $resultado["email"]; ?>" required>
			</div>
		</div>
		<div class="row">
			<div class="col">
				Time:
				<input type="text" name="time" class="form-control" value="<?php echo $resultado["meutime"]; ?>" required>
			</div>
			<div class="col">
				Telefone:
				<input type="tel" name="telefone" class="form-control" value="<?php echo $resultado["telefone"]; ?>">
			</div>
			<div class="col">
				Celular:
				<input type="tel" name="celular" class="form-control" value="<?php echo $resultado["celular"]; ?>">
			</div>
			<div class="col">
				Sexo:
				<input type="text" name="sexo" class="form-control" value="<?php echo $resultado["sexo"]; ?>" readonly>
			</div>
		</div>
		<div class="row">
			<div class="col">
				Rua:
				<input type="text" name="rua" class="form-control" value="<?php echo $resultado["rua"]; ?>" maxlength="255">
			</div>
			<div class="col-md-2">
				Nº:
				<input type="text" name="numero" class="form-control" value="<?php echo $resultado["numero"]; ?>" maxlength="10">
			</div>
			<div class="col">
				Bairro:
				<input type="text" name="bairro" class="form-control" value="<?php echo $resultado["bairro"]; ?>" maxlength="50">
			</div>
			<div class="col">
				Cidade:
				<input type="text" name="cidade" class="form-control" value="<?php echo $resultado["cidade"]; ?>" maxlength="50" required>
			</div>
			<div class="col-md-2">
				Estado:
				<input type="text" name="estado" class="form-control" value="<?php echo $resultado["estado"]; ?>" maxlength="30" required>
			</div>
		</div>
		<div class="row">
			<div class="col">
				Banco:
				<input type="text" name="banco" class="form-control" value="<?php echo $resultado["banco"]; ?>" maxlength="50">
			</div>
			<div class="col-md-2">
				Agência:
				<input type="text" name="agencia" class="form-control" value="<?php echo $resultado["agencia"]; ?>" maxlength="10">
			</div>
			<div class="col-md-2">
				Conta:
				<input type="text" name="conta" class="form-control" value="<?php echo $resultado["conta"]; ?>" required maxlength="10">
			</div>
			<div class="col-md-1">
				Operação:
				<input type="text" name="operacao" class="form-control" value="<?php echo $resultado["operacao"]; ?>" maxlength="">
			</div>
			<div class="col-md-3">
				CPF:
				<input type="text" name="cpf" class="form-control" value="<?php echo $resultado["cpf"]; ?>" maxlength="11">
			</div>				
		</div>
		<br>
		<div class="text-right">
			<input type="submit" name="enviar" value="Enviar" class="btn btn-primary text-right">
			<a href="visualiza.php?id=<?php echo $id ?>"  class="btn btn-success text-right">Voltar</a>
			<input type="hidden" name="envia" value="envia">
		</div>
		<?php 
			if (isset($_POST["envia"])) {
				$usuario 		= $_POST['usuario'];
				$tipoUsuario	= $_POST['tipoUsuario'];
				$senha 			= md5($_POST['senha']);
				$nome 			= $_POST['nome'];
				$email 			= $_POST['email'];
				$time 			= $_POST['time'];
				$telefone		= $_POST['telefone'];
				$celular 		= $_POST['celular'];
				$sexo 			= $_POST['sexo'];
				$rua 			= $_POST['rua'];
				$numero 		= $_POST['numero'];
				$bairro  		= $_POST['bairro'];
				$cidade  		= $_POST['cidade'];
				$estado 		= $_POST['estado'];
				$banco 			= $_POST['banco'];
				$agencia 		= $_POST['agencia'];
				$conta 			= $_POST['conta'];
				$operacao 		= $_POST['operacao'];
				$cpf 			= $_POST['cpf'];

				$sql = "UPDATE usuarios SET usuario='$usuario', role='$tipoUsuario', nome='$nome', email='$email', meutime='$meutime', telefone='$telefone', celular='$celular', rua='$rua', numero='$numero', bairro='$bairro', cidade='$cidade', banco='$banco', agencia='$agencia', conta='$conta', operacao='$operacao', cpf='$cpf'  WHERE ID = $id";

						if ($conecta->query($sql) === TRUE) {
							echo "Registro salvo com sucesso! <a href='visualiza.php?id=$id'><b>Clique para atualizar</b></a>";
						} else {
						    echo "Erro: " . $sql . "<br>" . $conecta->error;
						}									
					}
		 ?>
	</form>
</div>

<?php require('../_footer.php'); ?>