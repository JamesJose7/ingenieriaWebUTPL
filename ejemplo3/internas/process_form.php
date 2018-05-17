<?php
	include("../dll/config.php");
	include("../dll/mysql.php");

	extract($_POST);

	$query="INSERT INTO `registros`(`nombres`, `apellidos`, `direccion`, `correo`, `cedula`, `telefono`, `fecha_nacimiento`, `tipo`, `curso`, `taller`) VALUES ('$nombres','$apellidos','$direccion','$correo','$cedula','$telefono','$fecha','$tipo','$curso','$talleres[0]')";

	$result = mysqli_query($link, $query) or die('error de sql');

	$query2 = "select max(id) from registros registros";
	$result2 = mysqli_query($link, $query2) or die('error de id max');

	//Obtener el id del ultimo registro
	while ($line = mysqli_fetch_array($result2)) {
		$id_registro = $line[0];
	}

	//insert a la tabla de muchos a muchos
	for ($i=0; $i < count($talleres); $i++) { 
		//	echo $talleres[$i];
		$query3 = "INSERT INTO `registrotaller`(`id_registro`, `id_taller`) VALUES ('$id_registro','$talleres[$i]')";
		//"insert into registrotaller values ('','$id_registro','')"
		$result3= mysqli_query($link, $query3) or die('error de insercion en talleres'.mysqli_error($link));
	}

	//echo $query;

	echo '<script>alert("Datos gardados")</script>';
	echo "<script>location.href='../internas/list_registros.php'</script>";

?>