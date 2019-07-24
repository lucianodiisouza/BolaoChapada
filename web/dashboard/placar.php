<?php 
	require('_header.php');
?>
<link rel="stylesheet" type="text/css" href="css/dashboard.css">
<?php require('_navegar.php'); ?>
<!-- _header -->
<!-- _navegar -->
<br><br><br> <!-- divisoria -->
<div class="container-fluid">
    <div class="alert alert-danger" role="alert">
        Atenção! Definir o placar encerra a rodada!
    </div>
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
            <h4>Definir Placar</h4>
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
                    <input type="number" name="jogoAMandante" class="placar_input"> vs <input type="number" name="jogoAVisitante" class="placar_input">
                    <br><br>
                    <p class="small">
                        <?php 
                            echo '<b>'.$partida["nomeTimeA"].' x '.$partida["nomeTimeB"].'</b><br>'.$partida["local"].'<br>'.$data.' - '.$hora 
                        ?>											
                    </p>
                </center>
            </div>
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
                    <input type="number" name="jogoBMandante" class="placar_input"> vs <input type="number" name="jogoBVisitante" class="placar_input">
                    <br><br>
                    <p class="small">
                        <?php 
                            echo '<b>'.$partida["nomeTimeA"].' x '.$partida["nomeTimeB"].'</b><br>'.$partida["local"].'<br>'.$data.' - '.$hora 
                        ?>											
                    </p>
                </center>
            </div>
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
                    <input type="number" name="jogoCMandante" class="placar_input"> vs <input type="number" name="jogoCVisitante" class="placar_input">
                    <br><br>
                    <p class="small">
                        <?php 
                            echo '<b>'.$partida["nomeTimeA"].' x '.$partida["nomeTimeB"].'</b><br>'.$partida["local"].'<br>'.$data.' - '.$hora 
                        ?>											
                    </p>
                </center>
            </div>
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
                    <input type="number" name="jogoDMandante" class="placar_input"> vs <input type="number" name="jogoDVisitante" class="placar_input">
                    <br><br>
                    <p class="small">
                        <?php 
                            echo '<b>'.$partida["nomeTimeA"].' x '.$partida["nomeTimeB"].'</b><br>'.$partida["local"].'<br>'.$data.' - '.$hora 
                        ?>											
                    </p>
                </center>
            </div>
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
                    <input type="number" name="jogoEMandante" class="placar_input"> vs <input type="number" name="jogoEVisitante" class="placar_input">
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
                    <input type="number" name="jogoFMandante" class="placar_input"> vs <input type="number" name="jogoFVisitante" class="placar_input">
                    <br><br>
                    <p class="small">
                        <?php 
                            echo '<b>'.$partida["nomeTimeA"].' x '.$partida["nomeTimeB"].'</b><br>'.$partida["local"].'<br>'.$data.' - '.$hora 
                        ?>											
                    </p>
                </center>
            </div>
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
                    <input type="number" name="jogoGMandante" class="placar_input"> vs <input type="number" name="jogoGVisitante" class="placar_input">
                    <br><br>
                    <p class="small">
                        <?php 
                            echo '<b>'.$partida["nomeTimeA"].' x '.$partida["nomeTimeB"].'</b><br>'.$partida["local"].'<br>'.$data.' - '.$hora 
                        ?>											
                    </p>
                </center>
            </div>
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
                    <input type="number" name="jogoHMandante" class="placar_input"> vs <input type="number" name="jogoHVisitante" class="placar_input">
                    <br><br>
                    <p class="small">
                        <?php 
                            echo '<b>'.$partida["nomeTimeA"].' x '.$partida["nomeTimeB"].'</b><br>'.$partida["local"].'<br>'.$data.' - '.$hora 
                        ?>											
                    </p>
                </center>
            </div>
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
                    <input type="number" name="jogoIMandante" class="placar_input"> vs <input type="number" name="jogoIVisitante" class="placar_input">
                    <br><br>
                    <p class="small">
                        <?php 
                            echo '<b>'.$partida["nomeTimeA"].' x '.$partida["nomeTimeB"].'</b><br>'.$partida["local"].'<br>'.$data.' - '.$hora 
                        ?>											
                    </p>
                </center>
            </div>
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
                    <input type="number" name="jogoJMandante" class="placar_input"> vs <input type="number" name="jogoJVisitante" class="placar_input">
                    <br><br>
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
                $idJogoA    = $dadosRodada['jogoA'];
                $jogoAMandante = $_POST['jogoAMandante'];
                $jogoAVisitante = $_POST['jogoAVisitante'];

                $idJogoB    = $dadosRodada['jogoB'];
                $jogoBMandante = $_POST['jogoBMandante'];
                $jogoBVisitante = $_POST['jogoBVisitante'];
                
                $idJogoC    = $dadosRodada['jogoC'];
                $jogoCMandante = $_POST['jogoCMandante'];
                $jogoCVisitante = $_POST['jogoCVisitante'];

                $idJogoD    = $dadosRodada['jogoD'];
                $jogoDMandante = $_POST['jogoDMandante'];
                $jogoDVisitante = $_POST['jogoDVisitante'];

                $idJogoE    = $dadosRodada['jogoE'];
                $jogoEMandante = $_POST['jogoEMandante'];
                $jogoEVisitante = $_POST['jogoEVisitante'];

                $idJogoF    = $dadosRodada['jogoF'];
                $jogoFMandante = $_POST['jogoFMandante'];
                $jogoFVisitante = $_POST['jogoFVisitante'];

                $idJogoG    = $dadosRodada['jogoG'];
                $jogoGMandante = $_POST['jogoGMandante'];
                $jogoGVisitante = $_POST['jogoGVisitante'];
                
                $idJogoH    = $dadosRodada['jogoH'];
                $jogoHMandante = $_POST['jogoHMandante'];
                $jogoHVisitante = $_POST['jogoHVisitante'];

                $idJogoI    = $dadosRodada['jogoI'];
                $jogoIMandante = $_POST['jogoIMandante'];
                $jogoIVisitante = $_POST['jogoIVisitante'];

                $idJogoJ    = $dadosRodada['jogoJ'];
                $jogoJMandante = $_POST['jogoJMandante'];
                $jogoJVisitante = $_POST['jogoJVisitante'];
                
                $sqlA = "UPDATE jogos SET placarA='$jogoAMandante', placarB='$jogoAVisitante', alterado=true WHERE id = $idJogoA;";
                $sqlB = "UPDATE jogos SET placarA='$jogoBMandante', placarB='$jogoBVisitante', alterado=true WHERE id = $idJogoB;";
                $sqlC = "UPDATE jogos SET placarA='$jogoCMandante', placarB='$jogoCVisitante', alterado=true WHERE id = $idJogoC;";
                $sqlD = "UPDATE jogos SET placarA='$jogoDMandante', placarB='$jogoDVisitante', alterado=true WHERE id = $idJogoD;";
                $sqlE = "UPDATE jogos SET placarA='$jogoEMandante', placarB='$jogoEVisitante', alterado=true WHERE id = $idJogoE;";
                $sqlF = "UPDATE jogos SET placarA='$jogoFMandante', placarB='$jogoFVisitante', alterado=true WHERE id = $idJogoF;";
                $sqlG = "UPDATE jogos SET placarA='$jogoGMandante', placarB='$jogoGVisitante', alterado=true WHERE id = $idJogoG;";
                $sqlH = "UPDATE jogos SET placarA='$jogoHMandante', placarB='$jogoHVisitante', alterado=true WHERE id = $idJogoH;";
                $sqlI = "UPDATE jogos SET placarA='$jogoIMandante', placarB='$jogoIVisitante', alterado=true WHERE id = $idJogoI;";
                $sqlJ = "UPDATE jogos SET placarA='$jogoJMandante', placarB='$jogoJVisitante', alterado=true WHERE id = $idJogoJ;";
                
                if ($conecta->query($sqlA) && $conecta->query($sqlB) == TRUE) {
                        echo "Rodada atualizada com sucesso";
                    } else {
                        echo "Erro: " . $sql . "<br>" . $conecta->error;
                    }
                    
                }
            ?>
    </form>
</div>
<?php require('_footer.php'); ?>