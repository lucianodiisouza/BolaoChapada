<?php 
	require('_header.php');
	$usuarioAtual = $_SESSION['usuario'];
	$sql = "SELECT * FROM usuarios where usuario = '$usuarioAtual'";
	$qry = mysqli_query($conecta, $sql);
	$usuarioDados = mysqli_fetch_assoc($qry);
	$userID = $usuarioDados['id'];
	$rodadaID = $_GET['id'];
?>
<link rel="stylesheet" type="text/css" href="css/webui.css">
</head>
<body>
<!-- _header -->
<!-- meno do mobile -->
<nav class="navbar navbar-light bg-light fixed-top" style="background-color: #f5f5f5 !important; -webkit-box-shadow: 0px 10px 14px -10px rgba(0,0,0,0.75); -moz-box-shadow: 0px 10px 14px -10px rgba(0,0,0,0.75); box-shadow: 0px 10px 14px -10px rgba(0,0,0,0.75);">
	<a href="perfil.php" class="navbar-brand">
		<div class="userProfile" style="background-image: url('<?php echo $usuarioDados['avatar'] ?>');">
		</div>
		<span class="badge badge-success posicao"><?php echo $usuarioDados['id'] ?></span>
	</a>
	<div class="nomeUsuario">
		<p class="headerP"><?php echo $usuarioDados["nome"] ?><br>
		<small>Saldo: <sup>T$</sup></small>
		<?php if($usuarioDados['saldo'] == 0){ echo "0"; }else{ echo $usuarioDados['saldo']; } ?><br>
		<small><a href="index.php">Voltar</a></small>
	</p>
	</div>
</nav>
<br>
<br>
<br>
<br>
<!-- menu do mobile -->