<?php require('_navigation.php'); ?>
    <div class="container-fluid">
    	<form method="POST">
    <?php 

        $id = $_GET['id'];
        $sqlPalpite = "SELECT * FROM palpites WHERE id = $id";
        $qryPalpite = mysqli_query($conecta, $sqlPalpite);
        $rstPalpite = mysqli_fetch_array($qryPalpite);
		$rstPalpite['idRodada'];

		$id_rodada = $rstPalpite['idRodada'];
		$sql = "SELECT * FROM rodada WHERE id = $id_rodada;";
		$qry = mysqli_query($conecta, $sql);
		$dadosRodada = mysqli_fetch_assoc($qry);

		$data = date( 'd-m-Y', strtotime($dadosRodada["dataTermino"]));

    ?>

    <div class="row">
        <div class="col">
            Rodada:
            <input type="text" name="nomeRodada" value="<?php echo $dadosRodada['nome'] ?>" class="form-control" readonly>
        </div>
        <div class="col">
            Finaliza:
            <input type="text" name="dataRodada" value="<?php echo $data ?>" class="form-control" readonly>
        </div>
	</div>
	<div class="row">
		<div class="col block_palpite">
			 
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
				<input type="number" name="jogoAMandante" class="placar_input"  min="0" max="10" value="<?php echo $rstPalpite['jogoAMandante'] ?>"> vs <input type="number" name="jogoAVisitante" class="placar_input"  min="0" max="10" value="<?php echo $rstPalpite['jogoAVisitante'] ?>">
				<br><br>
				<p class="small">
					<?php 
						echo '<b>'.$partida["nomeTimeA"].' x '.$partida["nomeTimeB"].'</b><br>'.$partida["local"].'<br>'.$data.' - '.$hora 
					?>											
				</p>
			</center>
        </div>
    </div>
    <div class="row">
		<div class="col block_palpite">
			 
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
				<input type="number" name="jogoBMandante" class="placar_input"  min="0" max="10" value="<?php echo $rstPalpite['jogoBMandante'] ?>" > vs <input type="number" name="jogoBVisitante" class="placar_input"  min="0" max="10" value="<?php echo $rstPalpite['jogoBVisitante'] ?>">
				<br><br>
				<p class="small">
					<?php 
						echo '<b>'.$partida["nomeTimeA"].' x '.$partida["nomeTimeB"].'</b><br>'.$partida["local"].'<br>'.$data.' - '.$hora 
					?>											
				</p>
			</center>
        </div>
    </div>
    <div class="row">
		<div class="col block_palpite">
			 
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
				<input type="number" name="jogoCMandante" class="placar_input"  min="0" max="10" value="<?php echo $rstPalpite['jogoCMandante'] ?>"> vs <input type="number" name="jogoCVisitante" class="placar_input"  min="0" max="10" value="<?php echo $rstPalpite['jogoCVisitante'] ?>">
				<br><br>
				<p class="small">
					<?php 
						echo '<b>'.$partida["nomeTimeA"].' x '.$partida["nomeTimeB"].'</b><br>'.$partida["local"].'<br>'.$data.' - '.$hora 
					?>											
				</p>
			</center>
        </div>
    </div>
    <div class="row">
		<div class="col block_palpite">
			 
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
				<input type="number" name="jogoDMandante" class="placar_input"  min="0" max="10" value="<?php echo $rstPalpite['jogoDMandante'] ?>"> vs <input type="number" name="jogoDVisitante" class="placar_input"  min="0" max="10" value="<?php echo $rstPalpite['jogoDVisitante'] ?>">
				<br><br>
				<p class="small">
					<?php 
						echo '<b>'.$partida["nomeTimeA"].' x '.$partida["nomeTimeB"].'</b><br>'.$partida["local"].'<br>'.$data.' - '.$hora 
					?>											
				</p>
			</center>
        </div>
    </div>
    <div class="row">
		<div class="col block_palpite">
			 
			<?php 
				$sqlPartida = "SELECT * FROM jogos WHERE id = ".$dadosRodada["jogoE"]."";
				$qryPartida = mysqli_query($conecta, $sqlPartida);
				$partida = mysqli_fetch_assoc($qryPartida);
				
				$data = date( 'd/m', strtotime($partida["data"]));
				$hora = date( 'H:i', strtotime($partida["hora"]));
				// Fim do PHP								
			?>
			<center>
				<h3><?php echo $partida["timeA"].' x '.$partida["timeB"]; ?></h3>
				<input type="number" name="jogoEMandante" class="placar_input"  min="0" max="10" value="<?php echo $rstPalpite['jogoEMandante'] ?>"> vs <input type="number" name="jogoEVisitante" class="placar_input"  min="0" max="10" value="<?php echo $rstPalpite['jogoEVisitante'] ?>">
				<br><br>
				<p class="small">
					<?php 
						echo '<b>'.$partida["nomeTimeA"].' x '.$partida["nomeTimeB"].'</b><br>'.$partida["local"].'<br>'.$data.' - '.$hora 
					?>											
				</p>
			</center>
		</div>
	</div>
	<div class="row">
		<div class="col block_palpite">
			 
			<?php 
				$sqlPartida = "SELECT * FROM jogos WHERE id = ".$dadosRodada["jogoF"]."";
				$qryPartida = mysqli_query($conecta, $sqlPartida);
				$partida = mysqli_fetch_assoc($qryPartida);
				
				$data = date( 'd/m', strtotime($partida["data"]));
				$hora = date( 'H:i', strtotime($partida["hora"]));
				// Fim do PHP
			?>
			<center>
				<h3><?php echo $partida["timeA"].' x '.$partida["timeB"]; ?></h3>
				<input type="number" name="jogoFMandante" class="placar_input"  min="0" max="10" value="<?php echo $rstPalpite['jogoFMandante'] ?>"> vs <input type="number" name="jogoFVisitante" class="placar_input"  min="0" max="10" value="<?php echo $rstPalpite['jogoFVisitante'] ?>">
				<br><br>
				<p class="small">
                    <?php 
						echo '<b>'.$partida["nomeTimeA"].' x '.$partida["nomeTimeB"].'</b><br>'.$partida["local"].'<br>'.$data.' - '.$hora 
					?>
			</center>
        </div>
    </div>
    <div class="row">
		<div class="col block_palpite">
			 
			<?php 
				$sqlPartida = "SELECT * FROM jogos WHERE id = ".$dadosRodada["jogoG"]."";
				$qryPartida = mysqli_query($conecta, $sqlPartida);
				$partida = mysqli_fetch_assoc($qryPartida);
				
				$data = date( 'd/m', strtotime($partida["data"]));
				$hora = date( 'H:i', strtotime($partida["hora"]));
				// Fim do PHP
			?>
			<center>
				<h3><?php echo $partida["timeA"].' x '.$partida["timeB"]; ?></h3>
				<input type="number" name="jogoGMandante" class="placar_input"  min="0" max="10" value="<?php echo $rstPalpite['jogoGMandante'] ?>"> vs <input type="number" name="jogoGVisitante" class="placar_input"  min="0" max="10" value="<?php echo $rstPalpite['jogoGVisitante'] ?>">
				<br><br>
				<p class="small">
					<?php 
						echo '<b>'.$partida["nomeTimeA"].' x '.$partida["nomeTimeB"].'</b><br>'.$partida["local"].'<br>'.$data.' - '.$hora 
					?>											
				</p>
			</center>
        </div>
    </div>
    <div class="row">
		<div class="col block_palpite">
			 
			<?php 
				$sqlPartida = "SELECT * FROM jogos WHERE id = ".$dadosRodada["jogoH"]."";
				$qryPartida = mysqli_query($conecta, $sqlPartida);
				$partida = mysqli_fetch_assoc($qryPartida);
				
				$data = date( 'd/m', strtotime($partida["data"]));
				$hora = date( 'H:i', strtotime($partida["hora"]));
				// Fim do PHP
			?>
			<center>
				<h3><?php echo $partida["timeA"].' x '.$partida["timeB"]; ?></h3>
				<input type="number" name="jogoHMandante" class="placar_input"  min="0" max="10" value="<?php echo $rstPalpite['jogoHMandante'] ?>"> vs <input type="number" name="jogoHVisitante" class="placar_input"  min="0" max="10" value="<?php echo $rstPalpite['jogoHVisitante'] ?>">
				<br><br>
				<p class="small">
					<?php 
						echo '<b>'.$partida["nomeTimeA"].' x '.$partida["nomeTimeB"].'</b><br>'.$partida["local"].'<br>'.$data.' - '.$hora 
					?>											
				</p>
			</center>
        </div>
    </div>
    <div class="row">
		<div class="col block_palpite">
			 
			<?php 
				$sqlPartida = "SELECT * FROM jogos WHERE id = ".$dadosRodada["jogoI"]."";
				$qryPartida = mysqli_query($conecta, $sqlPartida);
				$partida = mysqli_fetch_assoc($qryPartida);
				
				$data = date( 'd/m', strtotime($partida["data"]));
				$hora = date( 'H:i', strtotime($partida["hora"]));
				// Fim do PHP
			?>
			<center>
				<h3><?php echo $partida["timeA"].' x '.$partida["timeB"]; ?></h3>
				<input type="number" name="jogoIMandante" class="placar_input"  min="0" max="10" value="<?php echo $rstPalpite['jogoIMandante'] ?>"> vs <input type="number" name="jogoIVisitante" class="placar_input"  min="0" max="10" value="<?php echo $rstPalpite['jogoIVisitante'] ?>">
				<br><br>
				<p class="small">
					<?php 
						echo '<b>'.$partida["nomeTimeA"].' x '.$partida["nomeTimeB"].'</b><br>'.$partida["local"].'<br>'.$data.' - '.$hora 
					?>											
				</p>
			</center>
        </div>
    </div>
    <div class="row">
		<div class="col block_palpite">
			 
			<?php 
				$sqlPartida = "SELECT * FROM jogos WHERE id = ".$dadosRodada["jogoJ"]."";
				$qryPartida = mysqli_query($conecta, $sqlPartida);
				$partida = mysqli_fetch_assoc($qryPartida);
				
				$data = date( 'd/m', strtotime($partida["data"]));
				$hora = date( 'H:i', strtotime($partida["hora"]));
				// Fim do PHP
			?>
			<center>
				<h3><?php echo $partida["timeA"].' x '.$partida["timeB"]; ?></h3>
				<input type="number" name="jogoJMandante" class="placar_input"  min="0" max="10" value="<?php echo $rstPalpite['jogoJMandante'] ?>"> vs <input type="number" name="jogoJVisitante" class="placar_input"  min="0" max="10" value="<?php echo $rstPalpite['jogoJVisitante'] ?>">
				<br><br>
				<p class="small">
					<?php 
						echo '<b>'.$partida["nomeTimeA"].' x '.$partida["nomeTimeB"].'</b><br>'.$partida["local"].'<br>'.$data.' - '.$hora 
					?>
				</p>
			</center>
        </div>
	</div>
    <div class="header_flexFinal">
        <a href="index.php" class="btn btn-danger">Voltar</a> &nbsp;
        <button type="submit" class="btn btn-success">Enviar <i class="far fa-paper-plane"></i></button>
        <input type="hidden" name="envia" value="envia">
    </div>
  </div>
</div>
		<?php 
			if (isset($_POST['envia'])) {
				$saldoAtual = $usuarioDados['saldo'];
	            $idUsuario = $usuarioDados['id'];
				$jogoAMandante = $_POST['jogoAMandante'];
				$jogoAVisitante = $_POST['jogoAVisitante'];
				$jogoBMandante = $_POST['jogoBMandante'];
				$jogoBVisitante = $_POST['jogoBVisitante'];
				$jogoCMandante = $_POST['jogoCMandante'];
				$jogoCVisitante = $_POST['jogoCVisitante'];
				$jogoDMandante = $_POST['jogoDMandante'];
				$jogoDVisitante = $_POST['jogoDVisitante'];
				$jogoEMandante = $_POST['jogoEMandante'];
				$jogoEVisitante = $_POST['jogoEVisitante'];
				$jogoFMandante = $_POST['jogoFMandante'];
				$jogoFVisitante = $_POST['jogoFVisitante'];
				$jogoGMandante = $_POST['jogoGMandante'];
				$jogoGVisitante = $_POST['jogoGVisitante'];
				$jogoHMandante = $_POST['jogoHMandante'];
				$jogoHVisitante = $_POST['jogoHVisitante'];
				$jogoIMandante = $_POST['jogoIMandante'];
				$jogoIVisitante = $_POST['jogoIVisitante'];
				$jogoJMandante = $_POST['jogoJMandante'];
				$jogoJVisitante = $_POST['jogoJVisitante'];
				
				$sql = "UPDATE palpites SET jogoAMandante='$jogoAMandante', jogoAVisitante='$jogoAVisitante', jogoBMandante='$jogoBMandante', jogoBVisitante='$jogoBVisitante', jogoCMandante='$jogoCMandante', jogoCVisitante='$jogoCVisitante', jogoDMandante='$jogoDMandante', jogoDVisitante='$jogoDMandante', jogoEMandante='$jogoEMandante', jogoEVisitante='$jogoEVisitante', jogoFMandante='$jogoFMandante', jogoFVisitante='$jogoFVisitante', jogoGMandante='$jogoGMandante', jogoGVisitante='$jogoGVisitante', jogoHMandante='$jogoHMandante', jogoHVisitante='$jogoHVisitante', jogoIMandante='$jogoIMandante', jogoIVisitante='$jogoIVisitante', jogoJMandante='$jogoJMandante', jogoJVisitante='$jogoJVisitante' WHERE id = $id";

				if ($conecta->query($sql) === TRUE) {
			?>  
						<meta http-equiv="Refresh" content="0.1; url=index.php">		
                        <?php
                    } else {
                        echo "Erro: " . $sql . "<br>" . $conecta->error;
                    }				
                }
            ?>
    </form>
<?php require('_footer.php'); ?>