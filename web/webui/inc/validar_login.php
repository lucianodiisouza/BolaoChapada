<?php
    // basicamente eu vou ver se a sessão do usuário é inexistente, (!) caso + encaminho para a pagina de login.
    if(!$_SESSION['usuario']) {
        header('Location: login.php');
        exit();
    }
?>