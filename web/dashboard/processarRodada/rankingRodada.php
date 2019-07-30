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
            $valorRodada = $_GET['custo'];
            
            $sqlStats = "SELECT * FROM palpites WHERE idRodada = {$rodada}";
            $resul = mysqli_query($conecta, $sqlStats);
            $regs = mysqli_num_rows($resul);

            $premioTotal = ((($regs * $valorRodada)/10)*9);
            $premioPrimeiro = $premioTotal * 0.75;
            $premioSegundo = $premioTotal * 0.15;
            $premioTerceiro = $premioTotal * 0.10;

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
                        <td>R$ <?php echo $premioPrimeiro ?></td>
                        <td>R$ <?php echo $premioSegundo ?></td>
                        <td>R$  <?php echo $premioTerceiro ?></td>
                        <td>10 T$</td>
                        <td>5 T$</td>
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