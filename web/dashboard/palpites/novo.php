<!-- Arquivo de índice da aplicação  -->
<?php require('../_header_sub.php'); ?>
<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
<?php require('../_navegar_sub.php'); ?>
<div class="container-fluid" style="width: 90% !important;">
<br>
<br>
<br>
<form method="post">
	<?php 
		$id_rodada = $_GET['id'];

		// dados da rodada
		$sql = "SELECT * FROM rodada WHERE id = $id_rodada;";
		$qry = mysqli_query($conecta, $sql);
		$dadosRodada = mysqli_fetch_assoc($qry);
		$data = date( 'd-m-Y', strtotime($dadosRodada["dataTermino"]));
	?>
	<div class="header_FlexInicio">
		<h4>Palpites</h4>
	</div>
	<div class="header_flexFinal">
		<a href="index.php" class="btn btn-danger">Voltar</a> &nbsp;
		<button type="submit" class="btn btn-success">Enviar <i class="far fa-paper-plane"></i></button>
		<input type="hidden" name="envia" value="envia">
	</div>
	<div class="row">
		<div class="col">
			Nº
			<input type="text" name="id_rodada" value="<?php echo $id_rodada ?>" class="form-control" readonly >
		</div>
		<div class="col">
			Rodada:
			<input type="text" name="nomeRodada" value="<?php echo $dadosRodada['nome'] ?>" class="form-control" readonly>
		</div>
		<div class="col">
			Limite:
			<input type="text" name="dataRodada" value="<?php echo $data ?>" class="form-control" readonly>
		</div>
	</div>

	<!-- colado -->
	<div class="row">
		<div class="col-md-3 block_palpite">
			<?php 
				$sqlPartida = "SELECT * FROM jogos WHERE id = ".$dadosRodada["jogoA"]."";
				$qryPartida = mysqli_query($conecta, $sqlPartida);
				$partida = mysqli_fetch_assoc($qryPartida);
				
				$data = date( 'd/m', strtotime($partida["data"]));
				$hora = date( 'H:i', strtotime($partida["hora"]));
				// Fim do PHP								
			?>
			<center>
				<h3><?php echo $partida["timeA"].' x '.$partida["timeB"]; ?></h3>
				<input type="number" name="placarA" class="placar_input"> vs <input type="number" name="placarB" class="placar_input">
				<br><br>
				<p class="small">
					<?php 
						echo '<b>'.$partida["nomeTimeA"].' x '.$partida["nomeTimeB"].'</b><br>'.$partida["local"].'<br>'.$data.' - '.$hora 
					?>											
				</p>
			</center>
		</div>
		<div class="col-md-3 block_palpite">
			<?php 
				$sqlPartida = "SELECT * FROM jogos WHERE id = ".$dadosRodada["jogoB"]."";
				$qryPartida = mysqli_query($conecta, $sqlPartida);
				$partida = mysqli_fetch_assoc($qryPartida);
				
				$data = date( 'd/m', strtotime($partida["data"]));
				$hora = date( 'H:i', strtotime($partida["hora"]));
				// Fim do PHP								
			?>
			<center>
				<h3><?php echo $partida["timeA"].' x '.$partida["timeB"]; ?></h3>
				<input type="number" name="placarA" class="placar_input"> vs <input type="number" name="placarB" class="placar_input">
				<br><br>
				<p class="small">
					<?php 
						echo '<b>'.$partida["nomeTimeA"].' x '.$partida["nomeTimeB"].'</b><br>'.$partida["local"].'<br>'.$data.' - '.$hora 
					?>											
				</p>
			</center>
		</div>
		<div class="col-md-3 block_palpite">
			<?php 
				$sqlPartida = "SELECT * FROM jogos WHERE id = ".$dadosRodada["jogoC"]."";
				$qryPartida = mysqli_query($conecta, $sqlPartida);
				$partida = mysqli_fetch_assoc($qryPartida);
				
				$data = date( 'd/m', strtotime($partida["data"]));
				$hora = date( 'H:i', strtotime($partida["hora"]));
				// Fim do PHP								
			?>
			<center>
				<h3><?php echo $partida["timeA"].' x '.$partida["timeB"]; ?></h3>
				<input type="number" name="placarA" class="placar_input"> vs <input type="number" name="placarB" class="placar_input">
				<br><br>
				<p class="small">
					<?php 
						echo '<b>'.$partida["nomeTimeA"].' x '.$partida["nomeTimeB"].'</b><br>'.$partida["local"].'<br>'.$data.' - '.$hora 
					?>											
				</p>
			</center>
		</div>
	<div class="row">
		<div class="col-md-3 block_palpite">
			<?php 
				$sqlPartida = "SELECT * FROM jogos WHERE id = ".$dadosRodada["jogoD"]."";
				$qryPartida = mysqli_query($conecta, $sqlPartida);
				$partida = mysqli_fetch_assoc($qryPartida);
				
				$data = date( 'd/m', strtotime($partida["data"]));
				$hora = date( 'H:i', strtotime($partida["hora"]));
				// Fim do PHP								
			?>
			<center>
				<h3><?php echo $partida["timeA"].' x '.$partida["timeB"]; ?></h3>
				<input type="number" name="placarA" class="placar_input"> vs <input type="number" name="placarB" class="placar_input">
				<br><br>
				<p class="small">
					<?php 
						echo '<b>'.$partida["nomeTimeA"].' x '.$partida["nomeTimeB"].'</b><br>'.$partida["local"].'<br>'.$data.' - '.$hora 
					?>											
				</p>
			</center>
		</div>
			<div class="col-md-2 block_partida">
				<?php 
					$sqlPartida = "SELECT * FROM jogos WHERE id = ".$rodada["jogoF"]."";
					$qryPartida = mysqli_query($conecta, $sqlPartida);
					$partida = mysqli_fetch_assoc($qryPartida);
					
					$data = date( 'd/m', strtotime($partida["data"]));
					$hora = date( 'H:i', strtotime($partida["hora"]));
					// Fim do PHP								
				?>
				<center>
					<h3><?php echo $partida["timeA"].' x '.$partida["timeB"]; ?></h3>
					<p class="small">
						<?php 
							echo '<b>'.$partida["nomeTimeA"].' x '.$partida["nomeTimeB"].'</b><br>'.$partida["local"].'<br>'.$data.' - '.$hora 
						?>											
					</p>
				</center>
			</div>
			<div class="col-md-2 block_partida">
				<?php 
					$sqlPartida = "SELECT * FROM jogos WHERE id = ".$rodada["jogoG"]."";
					$qryPartida = mysqli_query($conecta, $sqlPartida);
					$partida = mysqli_fetch_assoc($qryPartida);
					
					$data = date( 'd/m', strtotime($partida["data"]));
					$hora = date( 'H:i', strtotime($partida["hora"]));
					// Fim do PHP								
				?>
				<center>
					<h3><?php echo $partida["timeA"].' x '.$partida["timeB"]; ?></h3>
					<p class="small">
						<?php 
							echo '<b>'.$partida["nomeTimeA"].' x '.$partida["nomeTimeB"].'</b><br>'.$partida["local"].'<br>'.$data.' - '.$hora 
						?>											
					</p>
				</center>
			</div>
			<div class="col-md-2 block_partida">
				<?php 
					$sqlPartida = "SELECT * FROM jogos WHERE id = ".$rodada["jogoH"]."";
					$qryPartida = mysqli_query($conecta, $sqlPartida);
					$partida = mysqli_fetch_assoc($qryPartida);
					
					$data = date( 'd/m', strtotime($partida["data"]));
					$hora = date( 'H:i', strtotime($partida["hora"]));
					// Fim do PHP								
				?>
				<center>
					<h3><?php echo $partida["timeA"].' x '.$partida["timeB"]; ?></h3>
					<p class="small">
						<?php 
							echo '<b>'.$partida["nomeTimeA"].' x '.$partida["nomeTimeB"].'</b><br>'.$partida["local"].'<br>'.$data.' - '.$hora 
						?>											
					</p>
				</center>
			</div>
			<div class="col-md-2 block_partida">
				<?php 
					$sqlPartida = "SELECT * FROM jogos WHERE id = ".$rodada["jogoI"]."";
					$qryPartida = mysqli_query($conecta, $sqlPartida);
					$partida = mysqli_fetch_assoc($qryPartida);
					
					$data = date( 'd/m', strtotime($partida["data"]));
					$hora = date( 'H:i', strtotime($partida["hora"]));
					// Fim do PHP								
				?>
				<center>
					<h3><?php echo $partida["timeA"].' x '.$partida["timeB"]; ?></h3>
					<p class="small">
						<?php 
							echo '<b>'.$partida["nomeTimeA"].' x '.$partida["nomeTimeB"].'</b><br>'.$partida["local"].'<br>'.$data.' - '.$hora 
						?>											
					</p>
				</center>
			</div>
		<div class="col-md-2 block_partida">
			<?php 
				$sqlPartida = "SELECT * FROM jogos WHERE id = ".$rodada["jogoJ"]."";
				$qryPartida = mysqli_query($conecta, $sqlPartida);
				$partida = mysqli_fetch_assoc($qryPartida);
				
				$data = date( 'd/m', strtotime($partida["data"]));
				$hora = date( 'H:i', strtotime($partida["hora"]));
				// Fim do PHP								
			?>
			<center>
				<h3><?php echo $partida["timeA"].' x '.$partida["timeB"]; ?></h3>
				<p class="small">
					<?php 
						echo '<b>'.$partida["nomeTimeA"].' x '.$partida["nomeTimeB"].'</b><br>'.$partida["local"].'<br>'.$data.' - '.$hora 
					?>											
				</p>
			</center>
		</div>											
	</div>
	<!-- colado  -->
	<!-- uma linha -->
		<?php 
		if (isset($_POST['envia'])) {
			//testes
			$user_id = 'admin';
			// teste

			$nome = $_POST['nome'];
			$sigla = $_POST['sigla'];
			$serie = $_POST['serie'];
			$sql = "INSERT INTO times (nome, sigla, serie) VALUES ( '$nome', '$sigla', '$serie' )";

			if ($conecta->query($sql) === TRUE) {
				    echo "Mensagem enviada!";
				} else {
				    echo "Erro: " . $sql . "<br>" . $conecta->error;
				}
				
			}
		 ?>
</form>
<?php require('../_footer.php'); ?>