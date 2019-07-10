<?php require('../_header.php'); ?>
<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
<?php require('../_navegar.php'); ?>
<div class="container-fluid">
	<br>
	<br>
	<br>
	<form method="post">
		<div class="text-right">
			<a href="index.php"  class="btn btn-success text-right">Voltar</a>
		</div>
		<div class="row">
			<div class="col-md-1">
				ID:
				<input type="text" name="id" class="form-control" value="1" readonly>
			</div>
			<div class="col">
				Usuário:
				<input type="text" name="usuario" class="form-control" required>
			</div>
			<div class="col-md-2">
				Senha:
				<input type="password" name="senha" class="form-control" required>
			</div>
			<div class="col">
				Nome:
				<input type="text" name="nome" class="form-control" required>
			</div>
			<div class="col">
				Email:
				<input type="mail" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
			</div>
		</div>
		<div class="row">
			<div class="col">
				Time:
				<input type="text" name="time" class="form-control" required>
			</div>
			<div class="col">
				Telefone:
				<input type="tel" name="telefone" class="form-control" >
			</div>
			<div class="col">
				Celular:
				<input type="tel" name="celular" class="form-control">
			</div>
			<div class="col">
				Sexo:
				<select name="sexo" class="form-control">
					<option value="" selected disabled hidden>Selecione...</option>
					<option value="f">Feminino</option>
					<option value="m">Masculino</option>
					<option value="o">Outros</option>					
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col">
				Rua:
				<input type="text" name="rua" class="form-control" required>
			</div>
			<div class="col-md-2">
				Nº:
				<input type="text" name="numero" class="form-control" required>
			</div>
			<div class="col">
				Bairro:
				<input type="text" name="bairro" class="form-control" required>
			</div>
			<div class="col">
				Cidade:
				<input type="text" name="cidade" class="form-control" required>
			</div>
			<div class="col-md-2">
				Estado:
				<input type="text" name="estado" class="form-control" required>
			</div>
		</div>
		<div class="row">
			<div class="col">
				Banco:
				<input type="text" name="banco" class="form-control" required>
			</div>
			<div class="col-md-2">
				Agência:
				<input type="text" name="agencia" class="form-control" required>
			</div>
			<div class="col-md-2">
				Conta:
				<input type="text" name="conta" class="form-control" required>
			</div>
			<div class="col-md-1">
				Operação:
				<input type="text" name="operacao" class="form-control">
			</div>
			<div class="col-md-3">
				CPF:
				<input type="text" name="cpf" class="form-control" required>
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
		<div class="text-right">
			<input type="submit" name="enviar" value="Enviar" class="btn btn-primary text-right">
			<input type="reset" name="limpar" value="Limpar" class="btn btn-danger text-right">
			<input type="hidden" name="envia" value="envia">
		</div>
		<?php 
			if (isset($_POST["envia"])) {
				$usuario 		= $_POST['usuario'];
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

				$sql = "INSERT INTO usuarios (avatar, usuario, senha, nome, email, meutime, telefone, celular, sexo, rua, numero, bairro, cidade, estado, banco, agencia, conta, operacao, cpf) VALUES ( 'img/avatar_default.png','$usuario', '$senha', '$nome', '$email', '$time', '$telefone', '$celular', '$sexo', '$rua', '$numero', '$bairro', '$cidade', '$estado', '$banco', '$agencia', '$conta', '$operacao', '$cpf' )";

					if ($conecta->query($sql) === TRUE) {
					    echo "Registro adicionado com sucesso!";
					} else {
					    echo "Erro: " . $sql . "<br>" . $conecta->error;
					}
					
				}
		 ?>
	</form>
</div>

<?php require('../_footer.php'); ?>