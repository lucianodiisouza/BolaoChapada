<?php
session_start();
// incluir arquivo de conexão
include('conexao.php');

// se usuario e/ou senha vierem vazios do formulário, eu volto eles pra lá! Acho que um required no input do campo resolveria, mas 
// acordei inspirado hoje
// if(empty$_POST['usuario'] || empty($_POST['senha'])) {
//     header('Location: ../login.php');
//     exit();
// }

// descobri esse real_scape_string por acaso, ele meio que evita ataques brute force
$usuario = $POST['usuario'];
$senha = md5($POST['senha']);

// select do banco, chegamos a conclusão (meu eu interior e eu) de que só vamos usar o usuario e o id mesmo.
$qry = "SELECT * FROM usuarios WHERE usuario = '.$usuario.' AND senha = '.$senha.'";

// executando a query
$result = mysqli_query($conecta, $qry);

// cria uma row com a quantidade de linhas
$row = mysqli_num_rows($result);


if($row == 1){
    $_SESSION['usuario'] = $usuario;
    header('Location: ../index.php');
    exit();
}else{
    $_SESSION['não_autenticado'] = true;
    header('Location: ../login.php');
    exit();
}
?>