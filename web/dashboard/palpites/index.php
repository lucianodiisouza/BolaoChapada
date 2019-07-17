<!-- Arquivo de índice da aplicação  -->
<?php require('../_header_sub.php'); ?>
<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
<?php require('../_navegar_sub.php'); ?>
<div class="container-fluid" style="width: 98% !important;">
<br>
<br>
<br>
	<div class="header_coluna">
		<h4>Palpites</h4>
	</div>
        <hr>
        <!-- collapse do palpite -->
        <?php
            $sql = "SELECT * FROM palpites ORDER BY dataPalpite DESC;";
            $qry = mysqli_query($conecta, $sql);
            while($palpites = mysqli_fetch_array($qry)) {

                $numRodada = $palpites['idRodada'];
                $data = date( 'd/m', strtotime($palpites["dataPalpite"]));
                $hora = date( 'H:i', strtotime($palpites["dataPalpite"]));
                
                ?>
        <div class="accordion" id="accordionPalpite">
            <div class="card">
                <!-- parte de fora -->
                <div class="card-header" id="headingPalpite" style="justify-content: space-between">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapsePalpite<?php echo $palpites['id']?>" aria-expanded="true" aria-controls="collapsePalpite<?php echo $palpites['id']?>">
                            <?php
                                $usuarioID = $palpites['idUsuario'];
                                $sqlUsuario = "SELECT usuario FROM USUARIOS WHERE id = $usuarioID";
                                $qryUsuario = mysqli_query($conecta, $sqlUsuario);
                                $dadosUsuario = mysqli_fetch_assoc($qryUsuario);
                            ?>
                            Palpite #<?php echo $palpites['id'] ?> / Usuário: <b><?php echo $dadosUsuario['usuario'] ?></b> / Rodada #<?php echo $palpites['idRodada']." / ".$data." / ".$hora ?>
                        </button>
                    </h2>
                </div>
                <!-- parte de fora -->
                <!-- parte de dentro -->
                <div id="collapsePalpite<?php echo $palpites['id']?>" class="collapse" aria-labelledby="headingPalpite" data-parent="#accordionPalpite">
                    <div class="card-body">
                        <!-- linha   -->
                        <div class="row">
                            <!-- palpite -->
                            <div class="col block_palpite">
                                <?php
                                    // dados da rodada
                                    $sqlInfo = "SELECT * FROM rodada where id = $numRodada";
                                    $qryInfo = mysqli_query($conecta, $sqlInfo);
                                    $rodadaInfo = mysqli_fetch_assoc($qryInfo);
                                    
                                    // dados da partida
                                    $sqlPartidaInfo = "SELECT * FROM jogos WHERE id = ".$rodadaInfo['jogoA']."";
                                    $qryPartidaInfo = mysqli_query($conecta, $sqlPartidaInfo);
                                    $partidaInfo = mysqli_fetch_assoc($qryPartidaInfo);   
                                ?>
                                <center>
                                    <h3><?php echo $partidaInfo["timeA"].' x '.$partidaInfo["timeB"]; ?></h3>
                                    <input type="text" value="<?php echo $palpites['jogoAMandante'] ?>" name="jogoAMandante" class="placar_input" readonly> vs <input value="<?php echo $palpites['jogoAVisitante'] ?>" type="text" name="jogoAVisitante" class="placar_input" readonly>
                                    <br><br>
                                    <p class="small">
                                        <?php 
                                            echo '<b>'.$partidaInfo["nomeTimeA"].' x '.$partidaInfo["nomeTimeB"].'</b><br>'.$partidaInfo["local"].'<br>'.$data.' - '.$hora 
                                        ?>											
                                    </p>
                                </center>
                            </div>
                            <!-- palpite  -->
                            <!-- palpite -->
                            <div class="col block_palpite">
                                <?php
                                    // dados da rodada
                                    $sqlInfo = "SELECT * FROM rodada where id = $numRodada";
                                    $qryInfo = mysqli_query($conecta, $sqlInfo);
                                    $rodadaInfo = mysqli_fetch_assoc($qryInfo);
                                    
                                    // dados da partida
                                    $sqlPartidaInfo = "SELECT * FROM jogos WHERE id = ".$rodadaInfo['jogoB']."";
                                    $qryPartidaInfo = mysqli_query($conecta, $sqlPartidaInfo);
                                    $partidaInfo = mysqli_fetch_assoc($qryPartidaInfo);   
                                ?>
                                <center>
                                    <h3><?php echo $partidaInfo["timeA"].' x '.$partidaInfo["timeB"]; ?></h3>
                                    <input type="text" value="<?php echo $palpites['jogoBMandante'] ?>" name="jogoBMandante" class="placar_input" readonly> vs <input value="<?php echo $palpites['jogoBVisitante'] ?>" type="text" name="jogoBVisitante" class="placar_input" readonly>
                                    <br><br>
                                    <p class="small">
                                        <?php 
                                            echo '<b>'.$partidaInfo["nomeTimeA"].' x '.$partidaInfo["nomeTimeB"].'</b><br>'.$partidaInfo["local"].'<br>'.$data.' - '.$hora 
                                        ?>											
                                    </p>
                                </center>
                            </div>
                            <!-- palpite  -->
                            <!-- palpite -->
                            <div class="col block_palpite">
                                <?php
                                    // dados da rodada
                                    $sqlInfo = "SELECT * FROM rodada where id = $numRodada";
                                    $qryInfo = mysqli_query($conecta, $sqlInfo);
                                    $rodadaInfo = mysqli_fetch_assoc($qryInfo);
                                    
                                    // dados da partida
                                    $sqlPartidaInfo = "SELECT * FROM jogos WHERE id = ".$rodadaInfo['jogoC']."";
                                    $qryPartidaInfo = mysqli_query($conecta, $sqlPartidaInfo);
                                    $partidaInfo = mysqli_fetch_assoc($qryPartidaInfo);   
                                ?>
                                <center>
                                    <h3><?php echo $partidaInfo["timeA"].' x '.$partidaInfo["timeB"]; ?></h3>
                                    <input type="text" value="<?php echo $palpites['jogoCMandante'] ?>" name="jogoCMandante" class="placar_input" readonly> vs <input value="<?php echo $palpites['jogoCMandante'] ?>" type="text" name="jogoCVisitante" class="placar_input" readonly>
                                    <br><br>
                                    <p class="small">
                                        <?php 
                                            echo '<b>'.$partidaInfo["nomeTimeA"].' x '.$partidaInfo["nomeTimeB"].'</b><br>'.$partidaInfo["local"].'<br>'.$data.' - '.$hora 
                                        ?>											
                                    </p>
                                </center>
                            </div>
                            <!-- palpite  -->
                            <!-- palpite -->
                            <div class="col block_palpite">
                                <?php
                                    // dados da rodada
                                    $sqlInfo = "SELECT * FROM rodada where id = $numRodada";
                                    $qryInfo = mysqli_query($conecta, $sqlInfo);
                                    $rodadaInfo = mysqli_fetch_assoc($qryInfo);
                                    
                                    // dados da partida
                                    $sqlPartidaInfo = "SELECT * FROM jogos WHERE id = ".$rodadaInfo['jogoD']."";
                                    $qryPartidaInfo = mysqli_query($conecta, $sqlPartidaInfo);
                                    $partidaInfo = mysqli_fetch_assoc($qryPartidaInfo);   
                                ?>
                                <center>
                                    <h3><?php echo $partidaInfo["timeA"].' x '.$partidaInfo["timeB"]; ?></h3>
                                    <input type="text" value="<?php echo $palpites['jogoDMandante'] ?>" name="jogoDMandante" class="placar_input" readonly> vs <input value="<?php echo $palpites['jogoDVisitante'] ?>" type="text" name="jogoDVisitante" class="placar_input" readonly>
                                    <br><br>
                                    <p class="small">
                                        <?php 
                                            echo '<b>'.$partidaInfo["nomeTimeA"].' x '.$partidaInfo["nomeTimeB"].'</b><br>'.$partidaInfo["local"].'<br>'.$data.' - '.$hora 
                                        ?>											
                                    </p>
                                </center>
                            </div>
                            <!-- palpite  -->
                            <!-- palpite -->
                            <div class="col block_palpite">
                                <?php
                                    // dados da rodada
                                    $sqlInfo = "SELECT * FROM rodada where id = $numRodada";
                                    $qryInfo = mysqli_query($conecta, $sqlInfo);
                                    $rodadaInfo = mysqli_fetch_assoc($qryInfo);
                                    
                                    // dados da partida
                                    $sqlPartidaInfo = "SELECT * FROM jogos WHERE id = ".$rodadaInfo['jogoE']."";
                                    $qryPartidaInfo = mysqli_query($conecta, $sqlPartidaInfo);
                                    $partidaInfo = mysqli_fetch_assoc($qryPartidaInfo);   
                                ?>
                                <center>
                                    <h3><?php echo $partidaInfo["timeA"].' x '.$partidaInfo["timeB"]; ?></h3>
                                    <input type="text" value="<?php echo $palpites['jogoEMandante'] ?>" name="jogoEMandante" class="placar_input" readonly> vs <input value="<?php echo $palpites['jogoEVisitante'] ?>" type="text" name="jogoEVisitante" class="placar_input" readonly>
                                    <br><br>
                                    <p class="small">
                                        <?php 
                                            echo '<b>'.$partidaInfo["nomeTimeA"].' x '.$partidaInfo["nomeTimeB"].'</b><br>'.$partidaInfo["local"].'<br>'.$data.' - '.$hora 
                                        ?>
                                    </p>
                                </center>
                            </div>
                            <!-- palpite  -->
                        </div>
                        <!-- linha   -->
                        <div class="row">
                            <!-- palpite -->
                            <div class="col block_palpite">
                                <?php
                                    // dados da rodada
                                    $sqlInfo = "SELECT * FROM rodada where id = $numRodada";
                                    $qryInfo = mysqli_query($conecta, $sqlInfo);
                                    $rodadaInfo = mysqli_fetch_assoc($qryInfo);
                                    
                                    // dados da partida
                                    $sqlPartidaInfo = "SELECT * FROM jogos WHERE id = ".$rodadaInfo['jogoF']."";
                                    $qryPartidaInfo = mysqli_query($conecta, $sqlPartidaInfo);
                                    $partidaInfo = mysqli_fetch_assoc($qryPartidaInfo);   
                                ?>
                                <center>
                                    <h3><?php echo $partidaInfo["timeA"].' x '.$partidaInfo["timeB"]; ?></h3>
                                    <input type="text" value="<?php echo $palpites['jogoFMandante'] ?>" name="jogoFMandante" class="placar_input" readonly> vs <input value="<?php echo $palpites['jogoFVisitante'] ?>" type="text" name="jogoFVisitante" class="placar_input" readonly>
                                    <br><br>
                                    <p class="small">
                                        <?php 
                                            echo '<b>'.$partidaInfo["nomeTimeA"].' x '.$partidaInfo["nomeTimeB"].'</b><br>'.$partidaInfo["local"].'<br>'.$data.' - '.$hora 
                                        ?>											
                                    </p>
                                </center>
                            </div>
                            <!-- palpite  -->
                            <!-- palpite -->
                            <div class="col block_palpite">
                                <?php
                                    // dados da rodada
                                    $sqlInfo = "SELECT * FROM rodada where id = $numRodada";
                                    $qryInfo = mysqli_query($conecta, $sqlInfo);
                                    $rodadaInfo = mysqli_fetch_assoc($qryInfo);
                                    
                                    // dados da partida
                                    $sqlPartidaInfo = "SELECT * FROM jogos WHERE id = ".$rodadaInfo['jogoG']."";
                                    $qryPartidaInfo = mysqli_query($conecta, $sqlPartidaInfo);
                                    $partidaInfo = mysqli_fetch_assoc($qryPartidaInfo);   
                                ?>
                                <center>
                                    <h3><?php echo $partidaInfo["timeA"].' x '.$partidaInfo["timeB"]; ?></h3>
                                    <input type="text" value="<?php echo $palpites['jogoGMandante'] ?>" name="jogoGMandante" class="placar_input" readonly> vs <input value="<?php echo $palpites['jogoGVisitante'] ?>" type="text" name="jogoGVisitante" class="placar_input" readonly>
                                    <br><br>
                                    <p class="small">
                                        <?php 
                                            echo '<b>'.$partidaInfo["nomeTimeA"].' x '.$partidaInfo["nomeTimeB"].'</b><br>'.$partidaInfo["local"].'<br>'.$data.' - '.$hora 
                                        ?>											
                                    </p>
                                </center>
                            </div>
                            <!-- palpite  -->
                            <!-- palpite -->
                            <div class="col block_palpite">
                                <?php
                                    // dados da rodada
                                    $sqlInfo = "SELECT * FROM rodada where id = $numRodada";
                                    $qryInfo = mysqli_query($conecta, $sqlInfo);
                                    $rodadaInfo = mysqli_fetch_assoc($qryInfo);
                                    
                                    // dados da partida
                                    $sqlPartidaInfo = "SELECT * FROM jogos WHERE id = ".$rodadaInfo['jogoH']."";
                                    $qryPartidaInfo = mysqli_query($conecta, $sqlPartidaInfo);
                                    $partidaInfo = mysqli_fetch_assoc($qryPartidaInfo);   
                                ?>
                                <center>
                                    <h3><?php echo $partidaInfo["timeA"].' x '.$partidaInfo["timeB"]; ?></h3>
                                    <input type="text" value="<?php echo $palpites['jogoHMandante'] ?>" name="jogoHMandante" class="placar_input" readonly> vs <input value="<?php echo $palpites['jogoHVisitante'] ?>" type="text" name="jogoHVisitante" class="placar_input" readonly>
                                    <br><br>
                                    <p class="small">
                                        <?php 
                                            echo '<b>'.$partidaInfo["nomeTimeA"].' x '.$partidaInfo["nomeTimeB"].'</b><br>'.$partidaInfo["local"].'<br>'.$data.' - '.$hora 
                                        ?>											
                                    </p>
                                </center>
                            </div>
                            <!-- palpite  -->
                            <!-- palpite -->
                            <div class="col block_palpite">
                                <?php
                                    // dados da rodada
                                    $sqlInfo = "SELECT * FROM rodada where id = $numRodada";
                                    $qryInfo = mysqli_query($conecta, $sqlInfo);
                                    $rodadaInfo = mysqli_fetch_assoc($qryInfo);
                                    
                                    // dados da partida
                                    $sqlPartidaInfo = "SELECT * FROM jogos WHERE id = ".$rodadaInfo['jogoI']."";
                                    $qryPartidaInfo = mysqli_query($conecta, $sqlPartidaInfo);
                                    $partidaInfo = mysqli_fetch_assoc($qryPartidaInfo);   
                                ?>
                                <center>
                                    <h3><?php echo $partidaInfo["timeA"].' x '.$partidaInfo["timeB"]; ?></h3>
                                    <input type="text" value="<?php echo $palpites['jogoIMandante'] ?>" name="jogoIMandante" class="placar_input" readonly> vs <input value="<?php echo $palpites['jogoIVisitante'] ?>" type="text" name="jogoIVisitante" class="placar_input" readonly>
                                    <br><br>
                                    <p class="small">
                                        <?php 
                                            echo '<b>'.$partidaInfo["nomeTimeA"].' x '.$partidaInfo["nomeTimeB"].'</b><br>'.$partidaInfo["local"].'<br>'.$data.' - '.$hora 
                                        ?>											
                                    </p>
                                </center>
                            </div>
                            <!-- palpite  -->
                            <!-- palpite -->
                            <div class="col block_palpite">
                                <?php
                                    // dados da rodada
                                    $sqlInfo = "SELECT * FROM rodada where id = $numRodada";
                                    $qryInfo = mysqli_query($conecta, $sqlInfo);
                                    $rodadaInfo = mysqli_fetch_assoc($qryInfo);
                                    
                                    // dados da partida
                                    $sqlPartidaInfo = "SELECT * FROM jogos WHERE id = ".$rodadaInfo['jogoJ']."";
                                    $qryPartidaInfo = mysqli_query($conecta, $sqlPartidaInfo);
                                    $partidaInfo = mysqli_fetch_assoc($qryPartidaInfo);   
                                ?>
                                <center>
                                    <h3><?php echo $partidaInfo["timeA"].' x '.$partidaInfo["timeB"]; ?></h3>
                                    <input type="text" value="<?php echo $palpites['jogoJMandante'] ?>" name="jogoJMandante" class="placar_input" readonly> vs <input value="<?php echo $palpites['jogoJVisitante'] ?>" type="text" name="jogoJVisitante" class="placar_input" readonly>
                                    <br><br>
                                    <p class="small">
                                        <?php 
                                            echo '<b>'.$partidaInfo["nomeTimeA"].' x '.$partidaInfo["nomeTimeB"].'</b><br>'.$partidaInfo["local"].'<br>'.$data.' - '.$hora 
                                        ?>											
                                    </p>
                                </center>
                            </div>
                            <!-- palpite  -->
                        </div>
                    </div>
            </div>
            <!-- parte de dentro -->
        </div>
        <!--  -->
        <?php
            }
        ?>
</div>
<?php require('../_footer.php') ?>


