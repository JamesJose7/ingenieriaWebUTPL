<?php
	include("../dll/config.php");
	include("../dll/mysql.php");

	extract($_POST);

	$query="INSERT INTO `cursos`(`codigo`, `nombre`, `costo`, `cupos`) VALUES ('$codigo','$nombre',$costo,$cupos)";

	$result = mysqli_query($link, $query) or die('error de sql');

	$query2 = "select max(id) from cursos cursos";
	$result2 = mysqli_query($link, $query2) or die('error de id max');

	//Obtener el id del ultimo registro
	while ($line = mysqli_fetch_array($result2)) {
		$id_registro = $line[0];
	}

	//echo $query;

	echo '<script>alert("Curso guardado")</script>';
	echo "<script>location.href='../formulario_cursos.php'</script>";

?>