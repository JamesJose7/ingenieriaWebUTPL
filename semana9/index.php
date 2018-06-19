<?php
	include("dll/config.php");
	include("dll/mysql.php");
	$miConexion = new DB_mysql;
	$miConexion->conectar($db, $host, $user_db, $pass_db);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Clase 9</title>
</head>
<body>
	<h1>Implementación de la clase Mysql</h1>
	<?php
		//$miConexion->consulta("update registros set correo='carlosjaramillo@gmail.com' where id=2");

		$miConexion->consulta("select * from registros");

		$miConexion->verConsulta();

		$lista = $miConexion->consulta_lista();
		for ($i=0; $i < 10; $i++) { 
			echo $lista[$i]." <br>";
		}

		$miConexion->verConsulta();
	?>
</body>
</html>