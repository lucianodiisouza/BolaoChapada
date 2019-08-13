<?php require('_navigation.php'); ?>
	<div class="container-fluid"  >
		<?php
			$sqlInfoRodada = "SELECT * FROM rodada WHERE id = {$rodadaID}";
			$qryInfoRodada = mysqli_query($conecta, $sqlInfoRodada);
			$rstInfoRodada = mysqli_fetch_array($qryInfoRodada);
			$jogoA = $rstInfoRodada['jogoA'];
			$jogoB = $rstInfoRodada['jogoB'];
			$jogoC = $rstInfoRodada['jogoC'];
			$jogoD = $rstInfoRodada['jogoD'];
			$jogoE = $rstInfoRodada['jogoE'];
			$jogoF = $rstInfoRodada['jogoF'];
			$jogoG = $rstInfoRodada['jogoG'];
			$jogoH = $rstInfoRodada['jogoH'];
			$jogoI = $rstInfoRodada['jogoI'];
			$jogoJ = $rstInfoRodada['jogoJ'];
			
			$sqlA = "SELECT * FROM jogos WHERE id = {$jogoA}";
			$qryA = mysqli_query($conecta, $sqlA);
			$rstA = mysqli_fetch_array($qryA);
			
			$sqlB = "SELECT * FROM jogos WHERE id = {$jogoB}";
			$qryB = mysqli_query($conecta, $sqlB);
			$rstB = mysqli_fetch_array($qryB);
			
			$sqlC = "SELECT * FROM jogos WHERE id = {$jogoC}";
			$qryC = mysqli_query($conecta, $sqlC);
			$rstC = mysqli_fetch_array($qryC);
			
			$sqlD = "SELECT * FROM jogos WHERE id = {$jogoD}";
			$qryD = mysqli_query($conecta, $sqlD);
			$rstD = mysqli_fetch_array($qryD);
			
			$sqlE = "SELECT * FROM jogos WHERE id = {$jogoE}";
			$qryE = mysqli_query($conecta, $sqlE);
			$rstE = mysqli_fetch_array($qryE);
			
			$sqlF = "SELECT * FROM jogos WHERE id = {$jogoF}";
			$qryF = mysqli_query($conecta, $sqlF);
			$rstF = mysqli_fetch_array($qryF);
			
			$sqlG = "SELECT * FROM jogos WHERE id = {$jogoG}";
			$qryG = mysqli_query($conecta, $sqlG);
			$rstG = mysqli_fetch_array($qryG);
			
			$sqlH = "SELECT * FROM jogos WHERE id = {$jogoH}";
			$qryH = mysqli_query($conecta, $sqlH);
			$rstH = mysqli_fetch_array($qryH);
			
			$sqlI = "SELECT * FROM jogos WHERE id = {$jogoI}";
			$qryI = mysqli_query($conecta, $sqlI);
			$rstI = mysqli_fetch_array($qryI);
			
			$sqlJ = "SELECT * FROM jogos WHERE id = {$jogoJ}";
			$qryJ = mysqli_query($conecta, $sqlJ);
			$rstJ = mysqli_fetch_array($qryJ);			

		?>
		<div class="table-responsive">
			<table class="table table-sm">
				<thead>
					<tr>
						<th class="thCustom">ID</th>
						<th class="thCustom">Data</th>
						<th class="thCustom"><?php echo $rstA['timeA']." x ".$rstA['timeB'] ?></th>
						<th class="thCustom"><?php echo $rstB['timeA']." x ".$rstB['timeB'] ?></th>
						<th class="thCustom"><?php echo $rstC['timeA']." x ".$rstC['timeB'] ?></th>
						<th class="thCustom"><?php echo $rstD['timeA']." x ".$rstD['timeB'] ?></th>
						<th class="thCustom"><?php echo $rstE['timeA']." x ".$rstE['timeB'] ?></th>
						<th class="thCustom"><?php echo $rstF['timeA']." x ".$rstF['timeB'] ?></th>
						<th class="thCustom"><?php echo $rstG['timeA']." x ".$rstG['timeB'] ?></th>
						<th class="thCustom"><?php echo $rstH['timeA']." x ".$rstH['timeB'] ?></th>
						<th class="thCustom"><?php echo $rstI['timeA']." x ".$rstI['timeB'] ?></th>
						<th class="thCustom"><?php echo $rstJ['timeA']." x ".$rstJ['timeB'] ?></th>
						<th class="thCustom">alterar palpite</th>
					</tr>
				</thead>
				<tbody class="txtTabela">
					<?php
						$sql = "SELECT * FROM palpites WHERE idUsuario = $userID AND idRodada = $rodadaID ORDER BY id DESC";
						$qry = mysqli_query($conecta, $sql);
						while ($linha = mysqli_fetch_array($qry)) {
						
						$data = date( 'd/m', strtotime($linha["dataPalpite"]));
					?>
					<tr>
						<td>#<?php echo $linha["id"] ?></td>
						<td><?php echo $data ?></td>
						<td><?php echo $linha["jogoAMandante"]." x ".$linha["jogoAVisitante"]  ?></td>
						<td><?php echo $linha["jogoBMandante"]." x ".$linha["jogoBVisitante"]  ?></td>
						<td><?php echo $linha["jogoCMandante"]." x ".$linha["jogoCVisitante"]  ?></td>
						<td><?php echo $linha["jogoDMandante"]." x ".$linha["jogoDVisitante"]  ?></td>
						<td><?php echo $linha["jogoEMandante"]." x ".$linha["jogoEVisitante"]  ?></td>
						<td><?php echo $linha["jogoFMandante"]." x ".$linha["jogoFVisitante"]  ?></td>
						<td><?php echo $linha["jogoGMandante"]." x ".$linha["jogoGVisitante"]  ?></td>
						<td><?php echo $linha["jogoHMandante"]." x ".$linha["jogoHVisitante"]  ?></td>
						<td><?php echo $linha["jogoIMandante"]." x ".$linha["jogoIVisitante"]  ?></td>
						<td><?php echo $linha["jogoJMandante"]." x ".$linha["jogoJVisitante"]  ?></td>
						<td>
							<?php
								$horaI = date( 'H:i:s', strtotime($rstInfoRodada["dataInicio"]));
								$horaNova = gmdate('H:i:s', strtotime( $horaI ) - strtotime("1:00:00")  );
								date_default_timezone_set('America/Sao_Paulo');
								$dataAgora = date('d/m/Y');
								$horaAgora = date('H:i');
								if($dataAgora >= $dataI && $horaAgora >= $horaNova ){
							?>
								<p>Indisponível</p>
							<?php } else { ?>
								<a href="alteraPalpite.php?id=<?php echo $linha['id'] ?>">Alterar</a>
							<?php } ?>
						</td>
					</tr>
					<?php 
						}
					?>
				</tbody>
			</table>
		</div>
		<!-- ver meus palpites (ID) -->
	</div>
<!-- rodape -->
<?php require('_footer.php'); ?>