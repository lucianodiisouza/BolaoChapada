<?php
error_reporting(0);
session_start();
require('inc/conexao.php');
require('_validar_login.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Luciano dii Souza - Web Developer FullStack And MobileDev">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="O Bolão Chapada é uma iniciativa entre amigos para os amantes do Futebol! Entre, cadastre-se e se divirta! Usuários de Android poderão baixar nosso App na PlayStore!">
	<link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
	<link rel="manifest" href="img/site.webmanifest">
	<link rel="mask-icon" href="img/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
	<title>BolãoChapada</title>

	<!-- Arquivos de StyleSheet e ThirdParty Libraries -->
	<!-- css meu -->
	<!-- <link rel="stylesheet" type="text/css" href="css/dashboard.css"> -->
	<!-- css base do bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- css do datatables -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<!-- css terminam aqui -->
