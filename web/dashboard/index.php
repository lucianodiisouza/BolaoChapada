<?php require('_header.php'); ?>
<link rel="stylesheet" type="text/css" href="css/dashboard.css">
<?php require('_navegar.php'); ?>
<!-- _header -->
<!-- _navegar -->
	<!-- Barra de Menu - Será fixa no topo -->
		<div class="container-fluid" style="width: 98% !important;">
			<br>
			<br>
			<br>
			<!-- usuarios -->
			<div class="row">
				<div class="col-md-6 colunaCustom">
					<div class="header_coluna">
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
						<tbody>
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
									$sql = "SELECT * FROM jogos ORDER BY data DESC;";
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
									<td><center><a href="ver.php?id=<?php echo $linha["id"]?>"><i class="far fa-eye"></i></a></center></td>
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
						<table class="table table-hover table-sm">
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
									$sql = "SELECT * FROM rodada ORDER BY id DESC;";
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
									<td><center><a href="rodadas/ver.php?id=<?php echo $linha["id"]?>"><i class="far fa-eye"></i></a></center></td>
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
						<a href="palpites/novo.php" class="btn btn-success"><i class="fas fa-plus"></i></a>
					</div>
					<hr>
					<p align="center">
						<a href="#" title="Visualizar usuários cadastrados" class="bloco_link">
							<i class="far fa-eye fa-4x"></i>
						</a>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="#" title="Adicionar Usuário" class="bloco_link">
							<i class="fas fa-plus fa-4x"></i>
						</a>
					</p>
				</div>
			</div>
			<!-- bloco -->
			<br>
		</div>

<?php require('_footer.php'); ?>