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
<br>
<!-- menu do mobile -->
<div class="container-fluid">
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
					<?php echo "#".$resultado['id']." - ".$resultado['nome'] ?>
					<?php echo $dataI." a ".$dataT ?>
				</div>
					<div class="iconGrid">
						<a href="verPalpites.php?id=<?php echo $resultado["id"]?>" title="Ver palpites" class="btn btn-success txtBtn">Meus Palpites</a> 
						<?php 
							date_default_timezone_set('America/Sao_Paulo');
							$hoje = date('d/m/Y H:i');
							// echo $hoje;
							if($hoje < $dataI){
						?>
								<a href="rodada.php?id=<?php echo $resultado["id"]?>" title="Dar meu palpite" class="btn btn-success txtBtn">Palpitar</a>
						<?php 
							}else{
						?>
							<a href="" title="Dar meu palpite" class="btn btn-success txtBtn">Encerrada</a>
						<?php 
						}
						?>
					</div>
			</div>
		</div>
		<?php		
			}
		?>
	<div class="row linhaCustomTabela">
		<div class="table-responsive">
			<table class="table table-hover table-sm">
				<thead>
					<th><center>#POS</center></th>
					<th>Usuário</th>
					<th>Pontos</th>
				</thead>
				<tbody>
					<?php 
						$sqlRanking = "SELECT * FROM usuarios ORDER BY pontos DESC";
						$qryRanking = mysqli_query($conecta, $sqlRanking);
						$posicao = 0;
						while($rowRanking = mysqli_fetch_array($qryRanking)){
							$incPosicao = $posicao + 1;
							$posicao = $incPosicao;
							?>
					<tr>
						<td><center><?php echo $posicao ?></center></td>
						<td><?php echo $rowRanking['usuario'] ?> </td>
						<td><?php echo $rowRanking['pontos'] ?>pts</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- rodape -->
<?php require('_footer.php'); ?>