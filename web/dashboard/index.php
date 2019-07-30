<?php 
	require('_header.php');
?>
<link rel="stylesheet" type="text/css" href="css/dashboard.css">
<?php require('_navegar.php'); ?>
<!-- _header -->
<!-- _navegar -->
<!-- modal zerar pontuação da rodada -->
<!-- Botão para acionar modal -->
<!-- Modal -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Zerar Pontuação da Rodada</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Tem certeza? Esta ação irá zerar a pontuação da rodada!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <a class="btn btn-danger" href="zerarRodada.php">Tenho certeza</a>
      </div>
    </div>
  </div>
</div>
<!-- modal zerar pontuação da rodada -->
	<!-- Barra de Menu - Será fixa no topo -->
		<div class="container-fluid" style="width: 98% !important;">
			<br>
			<br>
			<br>
			<!-- usuarios -->
			<div class="row">
				<div class="col-md-6 colunaCustom">
					<div class="header_coluna">
						<?php echo $_SESSION['usuario']; ?>
						<h4>Usuários</h4>
						<a href="usuarios/cadastrar.php" class="btn btn-success"><i class="fas fa-plus"></i></a>						
					</div>
					<hr>
					<div class="table-responsive">
						<table class="table table-hover table-sm">
						  <thead>
				           <tr>
				                <th scope="col">#</th>
				                <th scope="col">Usuário</th>
				                <th scope="col">Email</th>
				                <th scope="col">Celular</th>
				                <th scope="col"><center></center></th>
				            </tr>
				        </thead>
						<tbody style="font-size: 14px;">
							<?php 
								$sql = "SELECT * FROM usuarios ORDER BY id DESC limit 10;";
								$qry = mysqli_query($conecta, $sql);
								while ($linha = mysqli_fetch_array($qry)) {
							?>							
							<tr>
								<td>
									<center><?php echo $linha["id"] ?></center>
								</td>
								<td>
									<?php echo $linha["usuario"] ?>
										
									</td>
								<td><?php echo $linha["email"] ?></td>
								<td><?php echo $linha["celular"] ?></td>
								<td><center><a href="usuarios/visualiza.php?id=<?php echo $linha["id"] ?>"><i class="far fa-eye"></i></a></center></td>
							</tr>
						
						<?php
							}									 
						?>
					    </tbody>
					</table>
				</div>
					<!-- datatable -->
				</div>
				<!-- Mensagens -->
				<div class="col colunaCustom">
					<div class="header_coluna">
						<h4>Mensagens</h4>
						<a href="mensagens/nova.php" class="btn btn-success"><i class="fas fa-plus"></i></a>						
					</div>
					<hr>
					<div class="table-responsive">
						<table class="table table-hover table-sm">
							<thead>
								<tr>
									<th scope="col">De</th>
									<th scope="col">Assunto</th>
									<th scope="col"></th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$sql = "SELECT * FROM mensagens where id_para = 1 ORDER BY id DESC limit 10;";
									$qry = mysqli_query($conecta, $sql);
									while ($linha = mysqli_fetch_array($qry)) {
								?>
									<tr>
										<td><?php echo $linha["id_de"] ?></td>
										<td><?php echo $linha["assunto"] ?></td>
										<td><center><a href="mensagens/ver.php?id=<?php echo $linha["id"]?>"><i class="far fa-eye"></i></a></center></td>
									</tr>					
								<?php
									}									 
								?>
							</tbody>
						</table>
					</div>
				</div>				
			</div>
			<!-- usuários -->
			<!-- jogos -->
			<div class="row">
				<div class="col-md-4 colunaCustom">
					<div class="header_coluna">
						<h4>Jogos</h4>
						<a href="jogos/novo.php" class="btn btn-success"><i class="fas fa-plus"></i></a>
					</div>
					<hr>
					<div class="table-responsive">
						<table class="table table-hover table-sm">
							<thead>
								<tr>
									<!-- <th scope="col">ID</th> -->
									<th scope="col"><center>Time Mandante</center></th>
									<th scope="col" colspan="2"><center>Placar</center></th>
									<!-- <th>Coluna mesclada com colspan</th> -->
									<th scope="col"><center>Time Visitante</center></th>
									<th><center>Data/Hora</center></th>
									<!-- <th>Local</th> -->
									<th scope="col"><center></center></th>
								</tr>
							</thead>
							<tbody>
								<?php
									$sql = "SELECT * FROM jogos ORDER BY data DESC LIMIT 10;";
									$qry = mysqli_query($conecta, $sql);
									while ($linha = mysqli_fetch_array($qry)) {
									
									$data = date( 'd/m', strtotime($linha["data"]));
									$hora = date( 'H:i', strtotime($linha["hora"]));
								?>
								<tr>
									<!-- <td><?php echo $linha["id"] ?></td> -->
									<td><center><?php echo $linha["timeA"] ?></center></td>
									<td><center><?php echo $linha["placarA"] ?></center></td>
									<td><center><?php echo $linha["placarB"] ?></center></td>
									<td><center><?php echo $linha["timeB"] ?></center></td>
									<td><center><?php echo $data. " - " .$hora ?></center></td>
									<!-- <td><?php echo $linha["local"] ?></td> -->
									<td><center><a href="jogos/ver.php?id=<?php echo $linha["id"]?>"><i class="far fa-eye"></i></a></center></td>
								</tr>			
								<?php
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- rodadas -->
				<div class="col colunaCustom">
					<div class="header_coluna">
						<h4>Rodadas</h4>
						<a href="rodadas/nova.php" class="btn btn-success"><i class="fas fa-plus"></i></a>
					</div>
					<hr>
					<div class="table-responsive">
						<table id="minhaTabela2" class="table table-hover table-sm">
							<thead>
								<tr>
									<th scope="col">ID</th>
									<th scope="col">Título</th>
									<th scope="col">Data Inicial</th>
									<th scope="col">Data final</th>
									<th scope="col"></th>
								</tr>
							</thead>
							<tbody>
								<?php
									$sql = "SELECT * FROM rodada ORDER BY id DESC LIMIT 10;";
									$qry = mysqli_query($conecta, $sql);
									while ($linha = mysqli_fetch_array($qry)) {
									
									$horaInicio = date( 'H:i', strtotime($linha["dataInicio"]));
									$dataInicio = date( 'd/m', strtotime($linha["dataInicio"]));
									$horaTermino = date( 'H:i', strtotime($linha["dataTermino"]));
									$dataTermino = date( 'd/m', strtotime($linha["dataTermino"]));
								?>
								<tr>
									<td><?php echo $linha["id"] ?></td>
									<td><?php echo $linha["nome"] ?></td>
									<td><?php echo $dataInicio.' - '.$horaInicio ?></td>
									<td><?php echo $dataTermino.' - '.$horaTermino ?></td>
									<td>
										<center>
											<a href="rodadas/ver.php?id=<?php echo $linha["id"]?>" title="Ver Rodada"><i class="far fa-eye"></i></a>
											<a href="processarRodada/index.php?id=<?php echo $linha["id"]?>" title="Processar rodada"><i class="fas fa-hourglass-half"></i></a>
											<a href="rankingRodada.php?id=<?php echo $linha["id"]?>" title="ranking"><i class="fas fa-trophy"></i></a>
										</center>
									</td>
								</tr>
								<?php 
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- rodadas -->
			<!-- rodada -->
			<div class="row">
			</div>
			<!-- rodadas -->
			<!-- bloco -->
			<div class="row">
				<div class="col colunaCustom">
					<div class="header_coluna">
						<h4>Palpites</h4>
					</div>
					<hr>
					<div class="table-responsive">
						<table id="minhaTabela" class="table table-hover table-sm">
							<thead>
								<tr>
									<th scope="col">ID</th>
									<th scope="col">Usuario</th>
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
							<tbody>
								<?php
									$sql = "SELECT * FROM palpites ORDER BY id DESC;";
									$qry = mysqli_query($conecta, $sql);
									while ($linha = mysqli_fetch_array($qry)) {
									
									$hora = date( 'H:i', strtotime($linha["dataPalpite"]));
									$data = date( 'd/m', strtotime($linha["dataPalpite"]));

								?>
								<tr>
									<td>#<?php echo $linha["id"] ?></td>
									<td><?php echo $linha["idUsuario"] ?></td>
									<td><?php echo $data.' - '.$hora ?></td>
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
									<td><center><a href="palpites/novo.php?id=<?php echo $linha["idRodada"]?>" title="Adicionar novo palpite"><i class="fas fa-coins"></i></a></center></td>
								</tr>
								<?php 
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- bloco -->
			<br>
		</div>

<?php require('_footer.php'); ?>