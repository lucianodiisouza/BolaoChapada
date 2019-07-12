<?php
	define('SERVIDOR','sql262.main-hosting.eu');
	define('USUARIO','u482896347_root');
	define('SENHA','aggjlr@123');
	define('DB','u482896347_bolao');
	define('CHARSET','utf8');

	$conecta = mysqli_connect(SERVIDOR, USUARIO, SENHA, DB) or die(mysqli_connect_error());

	mysqli_set_charset($conecta, CHARSET) or die(mysqli_error($conecta));
?>
