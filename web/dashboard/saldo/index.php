<!-- Arquivo de índice da aplicação  -->
<?php require('../_header_sub.php'); ?>
<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
<?php require('../_navegar_sub.php'); ?>
<div class="container-fluid" style="width: 98% !important;">
<br>
<br>
<br>
	<div class="header_coluna">
		<h4>Saldo T$</h4>
	</div>
    <hr>
    <div class="table-responsive">
        <table class="table table-hover table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Usuário</th>
                <th scope="col">email</th>
                <th scope="col">Saldo</th>
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
                <td><center><?php echo $linha["id"] ?></center></td>
                <td><?php echo $linha["usuario"] ?></td>
                <td><?php echo $linha["email"] ?></td>
                <td><?php echo $linha["saldo"] ?></td>
                <td><center><a href="add.php?id=<?php echo $linha["id"] ?>"><i class="fas fa-dollar-sign"></i></a></center></td>
            </tr>        
        <?php
            }
        ?>
        </tbody>
    </table>
</div>
    </div>
<?php require('../_footer.php') ?>


