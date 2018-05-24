<?php
	include("../dll/config.php");
	include("../dll/mysql.php");

	$id = $_GET['id'];
	$type = $_GET['type'];

	if ($type == 'curso') {
		$query="DELETE FROM `cursos` WHERE id = $id";
		$result = mysqli_query($link, $query) or die('error de sql'.mysqli_error($link));

		echo '<script>alert("Curso Eliminado")</script>';
		
	} else if ($type == 'taller') {
		$result0 = mysqli_query($link, "SET FOREIGN_KEY_CHECKS=0") or die('error de sql'.mysqli_error($link));
		$query="DELETE FROM `talleres` WHERE id = $id";
		$result = mysqli_query($link, $query) or die('error de sql'.mysqli_error($link));
		$result1 = mysqli_query($link, "SET FOREIGN_KEY_CHECKS=0") or die('error de sql'.mysqli_error($link));

		echo '<script>alert("Taller Eliminado")</script>';
	}

	echo "<script>location.href='admin_cursos.php'</script>";

?>