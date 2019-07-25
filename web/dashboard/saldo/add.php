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
                <!-- Valor:
                <input type="text" class="form-control" required> -->
                <script>
                String.prototype.reverse = function(){
                    return this.split('').reverse().join(''); 
                    };

                    function mascaraMoeda(campo,evento){
                    var tecla = (!evento) ? window.event.keyCode : evento.which;
                    var valor  =  campo.value.replace(/[^\d]+/gi,'').reverse();
                    var resultado  = "";
                    var mascara = "##.###.###".reverse();
                    for (var x=0, y=0; x<mascara.length && y<valor.length;) {
                        if (mascara.charAt(x) != '#') {
                        resultado += mascara.charAt(x);
                        x++;
                        } else {
                        resultado += valor.charAt(y);
                        y++;
                        x++;
                        }
                    }
                    campo.value = resultado.reverse();
                    }</script>
                    Valor:
                    <input type="Text" onKeyUp="mascaraMoeda(this, event)"  value="" name="valor" claSS="form-control">
            </div>
        </div>
        <?php
        if(isset($_POST['envia'])){
            $valor = $_POST['valor'];
            $novoSaldo = $saldoAtual + $valor;
            
            $sql = "UPDATE usuarios SET saldo='$novoSaldo' WHERE id = $id";
            
            if ($conecta->query($sql) === TRUE) {
                echo "Saldo atualizado!";
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


