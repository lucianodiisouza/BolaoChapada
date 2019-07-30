<?php 
	require('_header.php');
?>
<link rel="stylesheet" type="text/css" href="css/dashboard.css">
<?php require('_navegar.php'); ?>
<!-- _header -->
<!-- _navegar -->
<?php
    $sql = "UPDATE usuarios SET pontos = 0";
            
    if ($conecta->query($sql) === TRUE) {
        ?><meta http-equiv="Refresh" content="0.1; url=index.php"><?php
    } else {
        echo "Erro: " . $sql . "<br>" . $conecta->error;
    }
?>
<!-- fim do container fluid -->
<?php require('_footer.php'); ?>