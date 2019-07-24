<?php require('_navigation.php'); ?>
	<div class="container-fluid"  >
		 
		<!-- ver meus palpites (ID) -->
		<div class="table-responsive">
			<table class="table table-hover table-sm">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Data</th>
						<th scope="col">JogoA</th>
						<th scope="col">JogoB</th>
						<th scope="col">JogoC</th>
						<th scope="col">JogoD</th>
						<th scope="col">JogoE</th>
						<th scope="col">JogoF</th>
						<th scope="col">JogoG</th>
						<th scope="col">JogoH</th>
						<th scope="col">JogoI</th>
						<th scope="col">JogoJ</th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody class="txtTabela">
					<?php
						$sql = "SELECT * FROM palpites  WHERE idUsuario = $userID AND idRodada = $rodadaID ORDER BY id DESC";
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
						<td><center><a href="palpites/novo.php?id=<?php echo $linha["id"]?>" title="Ver Palpite detalhado"><i class="fas fa-eye"></i></a></center></td>
					</tr>
					<?php 
						}
					?>
				</tbody>
			</table>
		</div>
		<!-- ver meus palpites (ID) -->
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