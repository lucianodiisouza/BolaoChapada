<?php 
	require('_header.php');
	$usuarioAtual = $_SESSION['usuario'];
	$sql = "SELECT * FROM usuarios where usuario = '$usuarioAtual'";
	$qry = mysqli_query($conecta, $sql);
	$usuarioDados = mysqli_fetch_assoc($qry);
?>
<link rel="stylesheet" type="text/css" href="css/webui.css">
</head>
<body>
<!-- _header -->
<!-- meno do mobile -->
<nav class="navbar navbar-light bg-light fixed-top" style="background-color: #f5f5f5 !important; -webkit-box-shadow: 0px 10px 14px -10px rgba(0,0,0,0.75); -moz-box-shadow: 0px 10px 14px -10px rgba(0,0,0,0.75); box-shadow: 0px 10px 14px -10px rgba(0,0,0,0.75);">
	<span class="navbar-brand">
		<div class="userProfile">
		</div>
		<span class="badge badge-success posicao">1°</span>
	</span>
	<!-- <a href="#" class="navbar-brand"><img src="img/avatar.png" alt="Imagem do usuario" width="64px" height="64px" style="border-radius: 32px;" ></a> -->
	<div class="nomeUsuario">
		<p class="headerP"><?php echo $usuarioDados['nome'] ?><br>
			<small>Saldo: <sup>T$</sup></small>
			<?php if($usuarioDados['saldo'] == 0){ echo "0"; }else{ echo $usuarioDados['saldo']; } ?>
		</p>
	</div>
</nav>
<br>
<br>
<br>
<br>
<!-- menu do mobile -->
<div class="container-fluid">
<form method="post">
		<div class="row">
		 	
			<div class="alert alert-info" role="alert">
				Para redefinir sua senha é necessário preencher usuário, email e cpf. Certifique-se de preencher pelo menos estas informações.
			</div>
			<div class="col-md-4">
				Usuário:
				<input type="text" name="usuario" class="form-control" value="<?php echo $usuarioDados["usuario"]; ?>" maxlength="16" minlength="4" readonly>
			</div>
			<div class="col-md-4">
				Email:
				<input type="mail" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="<?php echo $usuarioDados["email"]; ?>" required>
			</div>
			<div class="col-md-4">
				Nome:
				<input type="text" name="nome" class="form-control" value="<?php echo $usuarioDados["nome"]; ?>" maxlength="100" required>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				Time:
				<input type="text" name="time" class="form-control" value="<?php echo $usuarioDados["meutime"]; ?>" required>
			</div>
			<div class="col-md-4">
				Telefone:
				<input type="tel" name="telefone" class="form-control" value="<?php echo $usuarioDados["telefone"]; ?>">
			</div>
			<div class="col-md-4">
				Celular:
				<input type="tel" name="celular" class="form-control" value="<?php echo $usuarioDados["celular"]; ?>">
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				Rua:
				<input type="text" name="rua" class="form-control" value="<?php echo $usuarioDados["rua"]; ?>" maxlength="255">
			</div>
			<div class="col">
				Nº:
				<input type="text" name="numero" class="form-control" value="<?php echo $usuarioDados["numero"]; ?>" maxlength="10">
			</div>
			<div class="col">
				Bairro:
				<input type="text" name="bairro" class="form-control" value="<?php echo $usuarioDados["bairro"]; ?>" maxlength="50">
			</div>
			<div class="col-md-3">
				Cidade:
				<input type="text" name="cidade" class="form-control" value="<?php echo $usuarioDados["cidade"]; ?>" maxlength="50" required>
			</div>
			<div class="col-md-3">
				Estado:
				<input type="text" name="estado" class="form-control" value="<?php echo $usuarioDados["estado"]; ?>" maxlength="30" required>
			</div>
		</div>
		<div class="row">
			<div class="col">
				Banco:
				<input type="text" name="banco" class="form-control" value="<?php echo $usuarioDados["banco"]; ?>" maxlength="50">
			</div>
			<div class="col-md-2">
				Agência:
				<input type="text" name="agencia" class="form-control" value="<?php echo $usuarioDados["agencia"]; ?>" maxlength="10">
			</div>
			<div class="col-md-2">
				Conta:
				<input type="text" name="conta" class="form-control" value="<?php echo $usuarioDados["conta"]; ?>" required maxlength="10">
			</div>
			<div class="col-md-1">
				Operação:
				<input type="text" name="operacao" class="form-control" value="<?php echo $usuarioDados["operacao"]; ?>" maxlength="">
			</div>
			<div class="col-md-3">
				CPF:
				<input type="text" name="cpf" class="form-control" value="<?php echo $usuarioDados["cpf"]; ?>" maxlength="9">
			</div>				
		</div>
		<br>
		<div class="text-right">
			<input type="submit" name="enviar" value="Salvar" class="btn btn-primary text-right">
			<a href="index.php" class="btn btn-success text-right">Voltar</a>
			<input type="hidden" name="envia" value="envia">
		</div>
		<?php 
			if (isset($_POST["envia"])) {
				$id 		= $usuarioDados['id'];
				$nome 			= $_POST['nome'];
				$email 			= $_POST['email'];
				$time 			= $_POST['time'];
				$telefone		= $_POST['telefone'];
				$celular 		= $_POST['celular'];
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

				$sql = "UPDATE usuarios SET nome='$nome', email='$email', meutime='$time', telefone='$telefone', celular='$celular', rua='$rua', numero='$numero', bairro='$bairro', cidade='$cidade', estado='$estado', banco='$banco', agencia='$agencia', conta='$conta', operacao='$operacao', cpf='$cpf' WHERE id =  $id;";

						if ($conecta->query($sql) === TRUE) {
							echo "Seu perfil foi atualizado.";
							header('Location: perfil.php');
						} else {
						    echo "Erro: " . $sql . "<br>" . $conecta->error;
						}									
					}
		 ?>
	</form>
</div>
<div class="rodape">
	<p>
		BolãoChapada - <a href="https://thecodelovers.com.br/">#</a> &nbsp;
	</p>
	<div class="footer-btn">
		<a href="inc/logout.php" class="btn btn-primary"><i class="fas fa-sign-out-alt"></i></a>
		<a href="ajudaOnline.php" class="btn btn-danger"><i class="fas fa-question"></i></a>
	</div>
</div>
<div class="img_bg">

</div>
<!-- mobile_Navigation -->
<?php require('_footer.php'); ?>