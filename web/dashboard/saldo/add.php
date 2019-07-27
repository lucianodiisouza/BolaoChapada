<!-- Arquivo de índice da aplicação  -->
<?php require('../_header_sub.php'); ?>
<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
<?php require('../_navegar_sub.php'); ?>
<div class="container-fluid" style="width: 98% !important;">
<br>
<br>
<br>
    <form method="POST">
            <?php 
                $id = $_GET['id'];

                $sql = "SELECT * FROM usuarios WHERE id = {$id}";
                $qry = mysqli_query($conecta, $sql);
                $usuario = mysqli_fetch_assoc($qry);
                $saldoAtual = $usuario['saldo'];

            ?>
        <div class="header_coluna">
            <h4>Saldo: <?php echo $saldoAtual; ?> T$</h4>
            <div class="header_flexFinal">
                <a href="index.php" class="btn btn-danger">Voltar</a> &nbsp;
                <button type="submit" class="btn btn-success">Enviar <i class="far fa-paper-plane"></i></button>
                <input type="hidden" name="envia" value="envia">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                Usuário:
                <input type="text" value="<?php echo $usuario['usuario'] ?>" class="form-control" readonly>
            </div>
            <div class="col">
                Nome:
                <input type="text" value="<?php echo $usuario['nome'] ?>" class="form-control" readonly>
            </div>
            <div class="col">
                email:
                <input type="text" value="<?php echo $usuario['email'] ?>" class="form-control" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col">
                Valor:
                <input type="text" name="valor" class="form-control" required maxlength="8" placeholder="Para deduzir valores insira o símbolo de subtração antes do número ( - )"/>
            </div>
        </div>
        <?php
        if(isset($_POST['envia'])){
            $valor = $_POST['valor'];
            $novoSaldo = $saldoAtual + ($valor);
            
            $sql = "UPDATE usuarios SET saldo='$novoSaldo' WHERE id = $id";
            
            if ($conecta->query($sql) === TRUE) {
                echo "Atualizando...";
                ?><meta http-equiv="Refresh" content="0.1; url=index.php"><?php
            } else {
                echo "Erro: " . $sql . "<br>" . $conecta->error;
            }
        }
        ?>
    </form>
<!-- fim do container fluid -->
</div>
<?php require('../_footer.php') ?>


