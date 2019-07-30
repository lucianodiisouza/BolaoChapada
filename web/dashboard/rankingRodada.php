<?php 
	require('_header.php');
?>
<link rel="stylesheet" type="text/css" href="css/dashboard.css">
<?php require('_navegar.php'); ?>
<!-- _header -->
<!-- _navegar -->
	<!-- Barra de Menu - Será fixa no topo --><?php
    $id = $_GET['id']; // pushing weekPrize id from index via GET method 
    // get * users that have participated from the last week prize
    $sqlGetPalpitesFromRodada = "SELECT * FROM palpites where idRodada = $id";
    $qryGetPalpitesFromRodada = mysqli_query($conecta, $sqlGetPalpitesFromRodada);
    $resultGetPalpitesFromRodada = mysqli_fetch_array($qryGetPalpitesFromRodada); ?>
        <!-- container-fluid -->
        <div class="container-fluid" style="width: 98% !important;">
        <br><br><br>
        <table class="table" id="minhaTabela">
            <thead>
                <th>Usuário</th>
                <th>Pontos</th>
            </thead>
            <tbody>
                <?php
                        
                        $sqlGetUsuarioFromPalpiteFromRodada = "SELECT * FROM usuarios WHERE id = {$resultGetPalpitesFromRodada['idUsuario']} ORDER BY pontos DESC";
                        $qryGetUsuarioFromPalpiteFromRodada = mysqli_query($conecta, $sqlGetUsuarioFromPalpiteFromRodada);
                        while($resultGetUsuarioFromPalpiteFromRodada = mysqli_fetch_assoc($qryGetUsuarioFromPalpiteFromRodada)){
                ?>
                <tr>
                    <td><?php echo $resultGetUsuarioFromPalpiteFromRodada['usuario'] ?></td>
                    <td><?php echo $resultGetUsuarioFromPalpiteFromRodada['pontos'] ?></td>
                </tr> 
                <?php
                        }
                    
                ?>
            </tbody>
        </table>
    </div>
        <!-- fim do container fluid -->
<?php require('_footer.php'); ?>