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
	<a href="perfil.php" class="navbar-brand">
		<div class="userProfile" style="background-image: url('<?php echo $usuarioDados['avatar'] ?>');">
		</div>
		<span class="badge badge-success posicao"><?php echo $usuarioDados['id'] ?></span>
	</a>
	<div class="nomeUsuario">
		<p class="headerP"><?php echo $usuarioDados["nome"] ?><br>
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
	 
	<div class="row">
		<div class="col colunaCustom">
			<p>
				Pontuação
			</p>
		</div>
		<div class="col colunaCustom">
			<p>
				Posição
			</p>
		</div>
	</div>
	<!-- rodadas (ultima e penultima) -->
		<?php
			$qry = mysqli_query($conecta, "SELECT * FROM rodada ORDER BY id DESC limit 2");
			while($resultado = mysqli_fetch_array($qry)){

			$dataI = date( 'd/m', strtotime($resultado["dataInicio"]));
			$dataT = date( 'd/m', strtotime($resultado["dataTermino"]));

		?>
		<div class="row">
			<div class="col colunaCustomCopy">
				<div class="header_coluna">
					<p><?php echo "#".$resultado['id']." - ".$resultado['nome'] ?> </p>
					<p>
						<?php echo $dataI." a ".$dataT ?>
					</p>
				</div>
				<center>
					<div class="iconGrid">
						<a href="verRodada.php?id=<?php echo $resultado["id"]?>" title="Ver Rodada" class="btn btn-success txtBtn">Visualizar</a>
						<a href="verPalpites.php?id=<?php echo $resultado["id"]?>" title="Ver palpites" class="btn btn-success txtBtn">Meus Palpites</a>
						<a href="rodada.php?id=<?php echo $resultado["id"]?>" title="Dar meu palpite" class="btn btn-success txtBtn">Palpitar</a>
					</div>
				</center>
			</div>
		</div>
		<?php		
			}
		?>
	<div class="row">
		<div class="col colunaCustom">
			Ranking
		</div>
		<div class="col colunaCustom">
			Ajuda
		</div>
	</div>
	<div class="row linhaCustomTabela">
		<div class="table-responsive">
			<table class="table table-hover table-sm">
				<thead>
					<th>Posição</th>
					<th>Usuário</th>
					<th>Pontos</th>
				</thead>
				<tbody>
					<tr>
						<td>01</td>
						<td>ximbinha</td>
						<td>30pts</td>
					</tr>
					<tr>
						<td>02</td>
						<td>tonho</td>
						<td>28pts</td>
					</tr>
					<tr>
						<td>03</td>
						<td>beiçola</td>
						<td>27pts</td>
					</tr>
					<tr>
						<td>04</td>
						<td>prego001</td>
						<td>25pts</td>
					</tr>
					<tr>
						<td>05</td>
						<td>NoobMaster69</td>
						<td>21pts</td>
					</tr>
					<tr>
						<td>06</td>
						<td>IronManRJ</td>
						<td>20pts</td>
					</tr>
					<tr>
						<td>07</td>
						<td>UsuarioAleario</td>
						<td>19pts</td>
					</tr>
					<tr>
						<td>08</td>
						<td>JãoTimbira</td>
						<td>18pts</td>
					</tr>
					<tr>
						<td>09</td>
						<td>ximbinha</td>
						<td>30pts</td>
					</tr>
					<tr>
						<td>10</td>
						<td>ximbinha</td>
						<td>30pts</td>
					</tr>
					<tr>
						<td>11</td>
						<td>ximbinha</td>
						<td>30pts</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
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