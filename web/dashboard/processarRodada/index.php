<!-- Arquivo de índice da aplicação  -->
<?php require('../_header_sub.php'); ?>
<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
<?php require('../_navegar_sub.php'); ?>
<div class="container-fluid" style="width: 98% !important;">
<br>
<br>
<br>
<div class="header_coluna">
    <h4>Processamento de Rodadas</h4>
    <a href="../" class="btn btn-danger">Voltar</a>
</div>
<br>
<div class="alert alert-success" role="alert">
  A rodada foi processada! Clique no botão voltar!
</div>
<hr>
            
<?php
// id da rodada veio por GET
$idRodada = $_GET['id'];
// dar select na rodada com o id
$sqlRodada = "SELECT * FROM rodada WHERE id = $idRodada";
$qryRodada = mysqli_query($conecta, $sqlRodada);
$getRodada = mysqli_fetch_assoc($qryRodada);

    // definindo as variávis com o id de cada partida a partir das partidas da rodada.
    $jogoA = $getRodada['jogoA'];
    $jogoB = $getRodada['jogoB'];
    $jogoC = $getRodada['jogoC'];
    $jogoD = $getRodada['jogoD'];
    $jogoE = $getRodada['jogoE'];
    $jogoF = $getRodada['jogoF'];
    $jogoG = $getRodada['jogoG'];
    $jogoH = $getRodada['jogoH'];
    $jogoI = $getRodada['jogoI'];
    $jogoJ = $getRodada['jogoJ'];
    $jogoVazio = 'vazio';
    
    // Processando as rodadas
    // pegar palpites dos usuários para esta rodada e este jogo.
    $selecionaPalpites = "SELECT * FROM palpites WHERE idRodada = $idRodada";
    $selectionaPalpitesQry = mysqli_query($conecta, $selecionaPalpites);
    while($selectionaPalpitesFetch = mysqli_fetch_array($selectionaPalpitesQry)){

        echo "<div class='colunaCustom'>";
            // =================== PALPITE A =========================
            if($jogoA <> $jogoVazio ){
                $sqlJogoA = "select * FROM jogos WHERE id = $jogoA;";
                $qryJogoA = mysqli_query($conecta, $sqlJogoA);
                $getJogoA = mysqli_fetch_assoc($qryJogoA);
                $placarAM = $getJogoA['placarA'];
                $placarAV = $getJogoA['placarB'];
                
                // enquanto existir um palpite, eu pego ele e comparo o resultado do jogoAMandante e jogoAVisitante com o placarA e placarB
                // $palpitePlacarAM = palpite placarA Mandante
                $palpitePlacarAM = $selectionaPalpitesFetch['jogoAMandante'];
                // $palpitePlacarAV = palpite placarA Visitante
                $palpitePlacarAV = $selectionaPalpitesFetch['jogoAVisitante'];
                // zerando a variavel $pontos (ela deverá ser zero, ja que a pontuação da rodada não acumula)
                $pontosA = 0;
                
                // se acertar o placar exato ganha 03 pontos (vale para empates)
                if (($palpitePlacarAM == $placarAM) AND ($palpitePlacarAV == $placarAV)) {
                    $pontosA += 3;
                    // else if placarA > placarB ao mesmo tempo que palpiteA > palpiteB OU placarA < placarB ao mesmo tempo que palpiteA < palpiteB
                    // significa que ele acertou o ganhador, mas errou o placar, ai só ganha um ponto!
                }elseif((($placarAM > $placarAV ) AND ($palpitePlacarAM > $palpitePlacarAV)) OR (($placarAM < $placarAV) AND ($palpitePlacarAM < $palpitePlacarAV))){
                    $pontosA += 1;
                    // 
                }elseif(($placarAM == $placarAV ) AND ($palpitePlacarAM == $palpitePlacarAV)) {
                    $pontosA += 1;
                }

            }else{
                echo "Jogo Vazio";
                $pontosA = 0;
            }
            // =================== PALPITE A =========================

            // =================== PALPITE B =========================
            if($jogoB <> $jogoVazio ){
                $sqlJogoB = "select * FROM jogos WHERE id = $jogoB;";
                $qryJogoB = mysqli_query($conecta, $sqlJogoB);
                $getJogoB = mysqli_fetch_assoc($qryJogoB);
                $placarBM = $getJogoB['placarA'];
                $placarBV = $getJogoB['placarB'];
                
                // enquanto existir um palpite, eu pego ele e comparo o resultado do jogoBMandante e jogoBVisitante com o placarA e placarB
                // $palpitePlacarBM = palpite placarA Mandante
                $palpitePlacarBM = $selectionaPalpitesFetch['jogoBMandante'];
                // $palpitePlacarBV = palpite placarA Visitante
                $palpitePlacarBV = $selectionaPalpitesFetch['jogoBVisitante'];
                // zerando a variavel $pontos (ela deverá ser zero, ja que a pontuação da rodada não acumula)
                $pontosB = 0;
                
                // se acertar o placar exato ganha 03 pontos (vale para empates)
                if (($palpitePlacarBM == $placarBM) AND ($palpitePlacarBV == $placarBV)) {
                    $pontosB += 3;
                    // else if placarA > placarB ao mesmo tempo que palpiteA > palpiteB OU placarA < placarB ao mesmo tempo que palpiteA < palpiteB
                    // significa que ele acertou o ganhador, mas errou o placar, ai só ganha um ponto!
                }elseif((($placarBM > $placarBV ) AND ($palpitePlacarBM > $palpitePlacarBV)) OR (($placarBM < $placarBV) AND ($palpitePlacarBM < $palpitePlacarBV))){
                    $pontosB += 1;
                    // 
                }elseif(($placarBM == $placarBV ) AND ($palpitePlacarBM == $palpitePlacarBV)) {
                    $pontosB += 1;
                }
                
            }else{
                echo "Jogo Vazio";
                $pontosB = 0;
            }
            // =================== PALPITE B =========================
            // =================== PALPITE C =========================
            if($jogoC <> $jogoVazio ){
                $sqljogoC = "select * FROM jogos WHERE id = $jogoC;";
                $qryjogoC = mysqli_query($conecta, $sqljogoC);
                $getjogoC = mysqli_fetch_assoc($qryjogoC);
                $placarCM = $getjogoC['placarA'];
                $placarCV = $getjogoC['placarB'];
                
                // enquanto existir um palpite, eu pego ele e comparo o resultado do jogoCMandante e jogoCVisitante com o placarA e placarB
                // $palpitePlacarCM = palpite placarA Mandante
                $palpitePlacarCM = $selectionaPalpitesFetch['jogoCMandante'];
                // $palpitePlacarCV = palpite placarA Visitante
                $palpitePlacarCV = $selectionaPalpitesFetch['jogoCVisitante'];
                // zerando a variavel $pontos (ela deverá ser zero, ja que a pontuação da rodada não acumula)
                $pontosC = 0;
                
                // se acertar o placar exato ganha 03 pontos (vale para empates)
                if (($palpitePlacarCM == $placarCM) AND ($palpitePlacarCV == $placarCV)) {
                    $pontosC += 3;
                    // else if placarA > placarB ao mesmo tempo que palpiteA > palpiteB OU placarA < placarB ao mesmo tempo que palpiteA < palpiteB
                    // significa que ele acertou o ganhador, mas errou o placar, ai só ganha um ponto!
                }elseif((($placarCM > $placarCV ) AND ($palpitePlacarCM > $palpitePlacarCV)) OR (($placarCM < $placarCV) AND ($palpitePlacarCM < $palpitePlacarCV))){
                    $pontosC += 1;
                    // 
                }elseif(($placarCM == $placarCV ) AND ($palpitePlacarCM == $palpitePlacarCV)) {
                    $pontosC += 1;
                }

            }else{
                echo "Jogo Vazio";
                $pontosC = 0;
            }
            // =================== PALPITE C =========================
            // =================== PALPITE D =========================
            if($jogoD <> $jogoVazio ){
                $sqljogoD = "select * FROM jogos WHERE id = $jogoD;";
                $qryjogoD = mysqli_query($conecta, $sqljogoD);
                $getjogoD = mysqli_fetch_assoc($qryjogoD);
                $placarDM = $getjogoD['placarA'];
                $placarDV = $getjogoD['placarB'];
                
                // enquanto existir um palpite, eu pego ele e comparo o resultado do jogoDMandante e jogoDVisitante com o placarA e placarB
                // $palpitePlacarDM = palpite placarA Mandante
                $palpitePlacarDM = $selectionaPalpitesFetch['jogoDMandante'];
                // $palpitePlacarDV = palpite placarA Visitante
                $palpitePlacarDV = $selectionaPalpitesFetch['jogoDVisitante'];
                // zerando a variavel $pontos (ela deverá ser zero, ja que a pontuação da rodada não acumula)
                $pontosD = 0;
                
                // se acertar o placar exato ganha 03 pontos (vale para empates)
                if (($palpitePlacarDM == $placarDM) AND ($palpitePlacarDV == $placarDV)) {
                    $pontosD += 3;
                    // else if placarA > placarB ao mesmo tempo que palpiteA > palpiteB OU placarA < placarB ao mesmo tempo que palpiteA < palpiteB
                    // significa que ele acertou o ganhador, mas errou o placar, ai só ganha um ponto!
                }elseif((($placarDM > $placarDV ) AND ($palpitePlacarDM > $palpitePlacarDV)) OR (($placarDM < $placarDV) AND ($palpitePlacarDM < $palpitePlacarDV))){
                    $pontosD += 1;
                    // 
                }elseif(($placarDM == $placarDV ) AND ($palpitePlacarDM == $palpitePlacarDV)) {
                    $pontosD += 1;
                }

            }else{
                echo "Jogo Vazio";
                $pontosD = 0;
            }
            // =================== PALPITE D =========================
            // =================== PALPITE E =========================
            if($jogoE <> $jogoVazio ){
                $sqljogoE = "select * FROM jogos WHERE id = $jogoE;";
                $qryjogoE = mysqli_query($conecta, $sqljogoE);
                $getjogoE = mysqli_fetch_assoc($qryjogoE);
                $placarEM = $getjogoE['placarA'];
                $placarEV = $getjogoE['placarB'];
                
                // enquanto existir um palpite, eu pego ele e comparo o resultado do jogoEMandante e jogoEVisitante com o placarA e placarB
                // $palpitePlacarEM = palpite placarA Mandante
                $palpitePlacarEM = $selectionaPalpitesFetch['jogoEMandante'];
                // $palpitePlacarEV = palpite placarA Visitante
                $palpitePlacarEV = $selectionaPalpitesFetch['jogoEVisitante'];
                // zerando a variavel $pontos (ela deverá ser zero, ja que a pontuação da rodada não acumula)
                $pontosE = 0;
                
                // se acertar o placar exato ganha 03 pontos (vale para empates)
                if (($palpitePlacarEM == $placarEM) AND ($palpitePlacarEV == $placarEV)) {
                    $pontosE += 3;
                    // else if placarA > placarB ao mesmo tempo que palpiteA > palpiteB OU placarA < placarB ao mesmo tempo que palpiteA < palpiteB
                    // significa que ele acertou o ganhador, mas errou o placar, ai só ganha um ponto!
                }elseif((($placarEM > $placarEV ) AND ($palpitePlacarEM > $palpitePlacarEV)) OR (($placarEM < $placarEV) AND ($palpitePlacarEM < $palpitePlacarEV))){
                    $pontosE += 1;
                    // 
                }elseif(($placarEM == $placarEV ) AND ($palpitePlacarEM == $palpitePlacarEV)) {
                    $pontosE += 1;
                }

            }else{
                echo "Jogo Vazio";
                $pontosE = 0;
            }
            // =================== PALPITE E =========================
            // =================== PALPITE F =========================
            if($jogoF <> $jogoVazio ){
                $sqljogoF = "select * FROM jogos WHERE id = $jogoF;";
                $qryjogoF = mysqli_query($conecta, $sqljogoF);
                $getjogoF = mysqli_fetch_assoc($qryjogoF);
                $placarFM = $getjogoF['placarA'];
                $placarFV = $getjogoF['placarB'];
                
                // enquanto existir um palpite, eu pego ele e comparo o resultado do jogoFMandante e jogoFVisitante com o placarA e placarB
                // $palpitePlacarFM = palpite placarA Mandante
                $palpitePlacarFM = $selectionaPalpitesFetch['jogoFMandante'];
                // $palpitePlacarFV = palpite placarA Visitante
                $palpitePlacarFV = $selectionaPalpitesFetch['jogoFVisitante'];
                // zerando a variavel $pontos (ela deverá ser zero, ja que a pontuação da rodada não acumula)
                $pontosF = 0;
                
                // se acertar o placar exato ganha 03 pontos (vale para empates)
                if (($palpitePlacarFM == $placarFM) AND ($palpitePlacarFV == $placarFV)) {
                    $pontosF += 3;
                    // else if placarA > placarB ao mesmo tempo que palpiteA > palpiteB OU placarA < placarB ao mesmo tempo que palpiteA < palpiteB
                    // significa que ele acertou o ganhador, mas errou o placar, ai só ganha um ponto!
                }elseif((($placarFM > $placarFV ) AND ($palpitePlacarFM > $palpitePlacarFV)) OR (($placarFM < $placarFV) AND ($palpitePlacarFM < $palpitePlacarFV))){
                    $pontosF += 1;
                    // 
                }elseif(($placarFM == $placarFV ) AND ($palpitePlacarFM == $palpitePlacarFV)) {
                    $pontosF += 1;
                }

            }else{
                echo "Jogo Vazio";
                $pontosF = 0;
            }
            // =================== PALPITE F =========================
            // =================== PALPITE G =========================
            if($jogoG <> $jogoVazio ){
                $sqljogoG = "select * FROM jogos WHERE id = $jogoG;";
                $qryjogoG = mysqli_query($conecta, $sqljogoG);
                $getjogoG = mysqli_fetch_assoc($qryjogoG);
                $placarGM = $getjogoG['placarA'];
                $placarGV = $getjogoG['placarB'];
                
                // enquanto existir um palpite, eu pego ele e comparo o resultado do jogoGMandante e jogoGVisitante com o placarA e placarB
                // $palpitePlacarGM = palpite placarA Mandante
                $palpitePlacarGM = $selectionaPalpitesFetch['jogoGMandante'];
                // $palpitePlacarGV = palpite placarA Visitante
                $palpitePlacarGV = $selectionaPalpitesFetch['jogoGVisitante'];
                // zerando a variavel $pontos (ela deverá ser zero, ja que a pontuação da rodada não acumula)
                $pontosG = 0;
                
                // se acertar o placar exato ganha 03 pontos (vale para empates)
                if (($palpitePlacarGM == $placarGM) AND ($palpitePlacarGV == $placarGV)) {
                    $pontosG += 3;
                    // else if placarA > placarB ao mesmo tempo que palpiteA > palpiteB OU placarA < placarB ao mesmo tempo que palpiteA < palpiteB
                    // significa que ele acertou o ganhador, mas errou o placar, ai só ganha um ponto!
                }elseif((($placarGM > $placarGV ) AND ($palpitePlacarGM > $palpitePlacarGV)) OR (($placarGM < $placarGV) AND ($palpitePlacarGM < $palpitePlacarGV))){
                    $pontosG += 1;
                    // 
                }elseif(($placarGM == $placarGV ) AND ($palpitePlacarGM == $palpitePlacarGV)) {
                    $pontosG += 1;
                }

            }else{
                echo "Jogo Vazio";
                $pontosG = 0;
            }
            // =================== PALPITE G =========================
            // =================== PALPITE H =========================
            if($jogoH <> $jogoVazio ){
                $sqljogoH = "select * FROM jogos WHERE id = $jogoH;";
                $qryjogoH = mysqli_query($conecta, $sqljogoH);
                $getjogoH = mysqli_fetch_assoc($qryjogoH);
                $placarHM = $getjogoH['placarA'];
                $placarHV = $getjogoH['placarB'];
                
                // enquanto existir um palpite, eu pego ele e comparo o resultado do jogoHMandante e jogoHVisitante com o placarA e placarB
                // $palpitePlacarHM = palpite placarA Mandante
                $palpitePlacarHM = $selectionaPalpitesFetch['jogoHMandante'];
                // $palpitePlacarHV = palpite placarA Visitante
                $palpitePlacarHV = $selectionaPalpitesFetch['jogoHVisitante'];
                // zerando a variavel $pontos (ela deverá ser zero, ja que a pontuação da rodada não acumula)
                $pontosH = 0;
                
                // se acertar o placar exato ganha 03 pontos (vale para empates)
                if (($palpitePlacarHM == $placarHM) AND ($palpitePlacarHV == $placarHV)) {
                    $pontosH += 3;
                    // else if placarA > placarB ao mesmo tempo que palpiteA > palpiteB OU placarA < placarB ao mesmo tempo que palpiteA < palpiteB
                    // significa que ele acertou o ganhador, mas errou o placar, ai só ganha um ponto!
                }elseif((($placarHM > $placarHV ) AND ($palpitePlacarHM > $palpitePlacarHV)) OR (($placarHM < $placarHV) AND ($palpitePlacarHM < $palpitePlacarHV))){
                    $pontosH += 1;
                    // 
                }elseif(($placarHM == $placarHV ) AND ($palpitePlacarHM == $palpitePlacarHV)) {
                    $pontosH += 1;
                }

            }else{
                echo "Jogo Vazio";
                $pontosH = 0;
            }
            // =================== PALPITE H =========================
            // =================== PALPITE I =========================
            if($jogoI <> $jogoVazio ){
                $sqljogoI = "select * FROM jogos WHERE id = $jogoI;";
                $qryjogoI = mysqli_query($conecta, $sqljogoI);
                $getjogoI = mysqli_fetch_assoc($qryjogoI);
                $placarIM = $getjogoI['placarA'];
                $placarIV = $getjogoI['placarB'];
                
                // enquanto existir um palpite, eu pego ele e comparo o resultado do jogoIMandante e jogoIVisitante com o placarA e placarB
                // $palpitePlacarIM = palpite placarA Mandante
                $palpitePlacarIM = $selectionaPalpitesFetch['jogoIMandante'];
                // $palpitePlacarIV = palpite placarA Visitante
                $palpitePlacarIV = $selectionaPalpitesFetch['jogoIVisitante'];
                // zerando a variavel $pontos (ela deverá ser zero, ja que a pontuação da rodada não acumula)
                $pontosI = 0;
                
                // se acertar o placar exato ganha 03 pontos (vale para empates)
                if (($palpitePlacarIM == $placarIM) AND ($palpitePlacarIV == $placarIV)) {
                    $pontosI += 3;
                    // else if placarA > placarB ao mesmo tempo que palpiteA > palpiteB OU placarA < placarB ao mesmo tempo que palpiteA < palpiteB
                    // significa que ele acertou o ganhador, mas errou o placar, ai só ganha um ponto!
                }elseif((($placarIM > $placarIV ) AND ($palpitePlacarIM > $palpitePlacarIV)) OR (($placarIM < $placarIV) AND ($palpitePlacarIM < $palpitePlacarIV))){
                    $pontosI += 1;
                    // 
                }elseif(($placarIM == $placarIV ) AND ($palpitePlacarIM == $palpitePlacarIV)) {
                    $pontosI += 1;
                }

            }else{
                echo "Jogo Vazio";
                $pontosI = 0;
            }
            // =================== PALPITE I =========================
            // =================== PALPITE J =========================
            if($jogoJ <> $jogoVazio ){
                $sqljogoJ = "select * FROM jogos WHERE id = $jogoJ;";
                $qryjogoJ = mysqli_query($conecta, $sqljogoJ);
                $getjogoJ = mysqli_fetch_assoc($qryjogoJ);
                $placarJM = $getjogoJ['placarA'];
                $placarJV = $getjogoJ['placarB'];
                
                // enquanto existir um palpite, eu pego ele e comparo o resultado do jogoJMandante e jogoJVisitante com o placarA e placarB
                // $palpitePlacarJM = palpite placarA Mandante
                $palpitePlacarJM = $selectionaPalpitesFetch['jogoJMandante'];
                // $palpitePlacarJV = palpite placarA Visitante
                $palpitePlacarJV = $selectionaPalpitesFetch['jogoJVisitante'];
                // zerando a variavel $pontos (ela deverá ser zero, ja que a pontuação da rodada não acumula)
                $pontosJ = 0;
                
                // se acertar o placar exato ganha 03 pontos (vale para empates)
                if (($palpitePlacarJM == $placarJM) AND ($palpitePlacarJV == $placarJV)) {
                    $pontosJ += 3;
                    // else if placarA > placarB ao mesmo tempo que palpiteA > palpiteB OU placarA < placarB ao mesmo tempo que palpiteA < palpiteB
                    // significa que ele acertou o ganhador, mas errou o placar, ai só ganha um ponto!
                }elseif((($placarJM > $placarJV ) AND ($palpitePlacarJM > $palpitePlacarJV)) OR (($placarJM < $placarJV) AND ($palpitePlacarJM < $palpitePlacarJV))){
                    $pontosJ += 1;
                    // 
                }elseif(($placarJM == $placarJV ) AND ($palpitePlacarJM == $palpitePlacarJV)) {
                    $pontosJ += 1;
                }

            }else{
                echo "Jogo Vazio";
                $pontosJ = 0;
            }
            // =================== PALPITE J =========================
            


            // resultando as partidas
            $pontosTotal = $pontosA + $pontosB + $pontosC + $pontosD + $pontosE + $pontosF + $pontosG + $pontosH + $pontosI + $pontosJ;
            $idPalpiteiro = $selectionaPalpitesFetch['idUsuario'];
            echo "A pontuação do usuário " .$idPalpiteiro." é ".$pontosTotal.".";

            //pegar id do usuário e atualizar pontuação no banco de dados       
            $sqlAtribuiPontosUsuario = "UPDATE usuarios set pontos='$pontosTotal' WHERE id = $idPalpiteiro";
            $qryAtribuiPontosUsuario = mysqli_query($conecta, $sqlAtribuiPontosUsuario);
            echo " Salva com sucesso!<br>";
            
        // termino da colunaCustom
        echo "</div>";
    }


?>

<?php require('../_footer.php') ?>