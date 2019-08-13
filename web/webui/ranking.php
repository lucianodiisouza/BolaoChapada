<?php require('_navigation.php'); ?> 
<div class="container-fluid">
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
        <br>
        <div class="header_coluna">
            <h4>Ranking Semanal</h4>
        </div>
        <div class="redux">
            <table style="width: 100%;" class="table table-hover table-sm ">
                        <tr>
                            <td>Palpites</td>
                            <td><?php echo $regs ?></td>
                        </tr>
                        <tr>
                            <td>Premio Total</td>
                            <td>R$ <?php echo number_format($premioTotal, 2) ?></td>
                        </tr>
                        <tr>
                            <td>Acumulado</td>
                            <td>R$ <?php echo number_format($valorAcumulado, 2) ?></td>
                        </tr>
                        <tr>
                            <td>1ºLugar</td>
                            <td>R$ <?php echo number_format($premioPrimeiro, 2) ?></td>
                        </tr>
                        <tr>
                            <td>2ºLugar</td>
                            <td>R$ <?php echo number_format($premioSegundo, 2) ?></td>
                        </tr>
                        <tr>
                            <td>3ºLugar</td>
                            <td>R$ <?php echo number_format($premioTerceiro, 2) ?></td>
                        </tr>
                        <tr>
                            <td>4ºLugar</td>
                            <td>2 tickets</td>                            
                        </tr>
                        <tr>
                            <td>5ºLugar</td>
                            <td>1 ticket</td>
                        </tr>
                    </tr>
            </table>
        </div>
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

<?php require('_footer.php'); ?>