<!-- Arquivo de índice da aplicação  -->
<?php require('../_header_sub.php'); ?>
<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
<?php require('../_navegar_sub.php'); ?>
<div class="container-fluid" style="width: 98% !important;">
<br>
<br>
<br>
	<div class="header_coluna">
		<h4>Rodadas</h4>
		<a href="nova.php" class="btn btn-success"><i class="fas fa-plus"></i></a>						
			</div>
			<hr>
			<div class="container-fluid">
				<?php
				// while criando loops para exibir as rodadas
					$sql = "SELECT * FROM rodada ORDER BY id DESC;";
					$qry = mysqli_query($conecta, $sql);
					while ($rodada = mysqli_fetch_array($qry)) {
					
					$dataInicio = date( 'd/m', strtotime($rodada["dataInicio"]));
					$horaInicio = date( 'H:i', strtotime($rodada["dataInicio"]));
					$dataTermino = date( 'd/m', strtotime($rodada["dataTermino"]));
					$horaTermino = date( 'H:i', strtotime($rodada["dataTermino"]));
				?>
				<div class="header_coluna">
					<h3>#<?php echo $rodada["id"]." - ".$rodada["nome"] ?></h3> 
					<p><strong>Valor T$ <?php echo $rodada['valor'] ?></strong> / Vigência: de <b><?php echo $dataInicio." - ".$horaInicio." a ".$dataTermino." - ".$horaTermino ?></b>&nbsp;&nbsp;&nbsp;<a href="ver.php?id=<?php echo $rodada['id'] ?>"><i class="far fa-eye"></i></a></p>
				</div>
					<div class="row">
						<div class="col-md-2 block_partida">
							<?php 
								$sqlPartida = "SELECT * FROM jogos WHERE id = ".$rodada["jogoA"]."";
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
								$sqlPartida = "SELECT * FROM jogos WHERE id = ".$rodada["jogoB"]."";
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
								$sqlPartida = "SELECT * FROM jogos WHERE id = ".$rodada["jogoC"]."";
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
								$sqlPartida = "SELECT * FROM jogos WHERE id = ".$rodada["jogoD"]."";
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
								$sqlPartida = "SELECT * FROM jogos WHERE id = ".$rodada["jogoE"]."";
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
					<div class="row">
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
					<hr>
						<?php
							// fim do while da RODADA
						}									 
					?>
			</div>				
		</div>
	</div>
<?php require('../_footer.php') ?>


