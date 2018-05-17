<?php
	/*phpinfo();*/
	include("config.php");

	$link = mysqli_connect($db_host, $db_usr, $db_pass)
		or die('No se pudo conectar a la base de datos'.mysql_error());

	mysqli_select_db($link, $db_name) or die('No se puede seleccionar la base de datos');
?>