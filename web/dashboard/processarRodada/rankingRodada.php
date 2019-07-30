<!-- Arquivo de índice da aplicação  -->
<?php require('../_header_sub.php'); ?>
<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
<?php require('../_navegar_sub.php'); ?>
<div class="container-fluid" style="width: 98% !important;">
<br>
<br>
<br>
<div class="container">
        <?php
            $rodada = $_GET['id'];
            $sqlGetRodada = "SELECT * FROM rodada WHERE id = {$rodada}";
            $qryGetRodada = mysqli_query($conecta, $sqlGetRodada);
            $rstGetRodada = mysqli_fetch_assoc($qryGetRodada);
            // custo da rodada 
            $valorRodada = $rstGetRodada['valor'];
            
            // Estatísticas básicas
            $sqlStats = "SELECT * FROM palpites WHERE idRodada = {$rodada}";
            $resul = mysqli_query($conecta, $sqlStats);
            $regs = mysqli_num_rows($resul);

            $sqlGetAcumulado = "SELECT * FROM acumulado";
            $qryGetAcumulado = mysqli_query($conecta, $sqlGetAcumulado);
            $rstGetAcumulado = mysqli_fetch_assoc($qryGetAcumulado);
            $valorAcumulado = $rstGetAcumulado['valor'];
            
            // se a rodada tiver a flag 's' no field acumulado, somar o valor acumulado ao premio final
            if($rstGetRodada['acumulado'] == 's'){
                // Calculo do Prêmio
                $premioTotal = ((($regs * $valorRodada)/10)*7) + $valorAcumulado;
                $premioPrimeiro = $premioTotal * 0.75;
                $premioSegundo = $premioTotal * 0.15;
                $premioTerceiro = $premioTotal * 0.10;

                $sqlAtualizarAcumulado = "UPDATE acumulado SET valor= 0 ";
                $qryAtualizaAcumulado = mysqli_query($conecta, $sqlAtualizarAcumulado);
                
            }else{
                // Calculo do Prêmio
                $premioTotal = ((($regs * $valorRodada)/10)*7);
                $premioPrimeiro = $premioTotal * 0.75;
                $premioSegundo = $premioTotal * 0.15;
                $premioTerceiro = $premioTotal * 0.10;
            }


        ?>
        <div class="header_coluna">
            <h4>Ranking Semanal</h4>
            <button class="btn btn-default" onclick="window.print()"><i class="fas fa-print"></i></button>
        </div>
        <div class="header_coluna">
            <table class="table">
                <thead>
                    <tr>
                        <td><center>Total de Palpites</center></td>
                        <td>Premio Total</td>
                        <td>Acumulado</td>
                        <td>1º Lugar</td>
                        <td>2º Lugar</td>
                        <td>3º Lugar</td>
                        <td>4º Lugar</td>
                        <td>5º Lugar</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><center><?php echo $regs ?></center></td>
                        <td>R$ <?php echo $premioTotal ?></td>
                        <td>R$ <?php echo $valorAcumulado ?></td>
                        <td>R$ <?php echo $premioPrimeiro ?></td>
                        <td>R$ <?php echo $premioSegundo ?></td>
                        <td>R$  <?php echo $premioTerceiro ?></td>
                        <td>2 tickets</td>
                        <td>1 ticket</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <hr>
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

<?php require('../_footer.php'); ?>