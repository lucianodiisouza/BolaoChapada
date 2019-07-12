<?php
	define('SERVIDOR','');
	define('USUARIO','');
	define('SENHA','');
	define('DB','');
	define('CHARSET','utf8');

	$conecta = mysqli_connect(SERVIDOR, USUARIO, SENHA, DB) or die(mysqli_connect_error());

	mysqli_set_charset($conecta, CHARSET) or die(mysqli_error($conecta));
?>
