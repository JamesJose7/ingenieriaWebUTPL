<?php
	include("../dll/config.php");
	include("../dll/mysql.php");

	extract($_POST);

	$hay_cupos = 1;
	$no_cupos = "";

	//Comprobar cupo en los cursos 
	$cupos_cursos_query = "SELECT * from cursos WHERE id = $curso";
	$result_cursos_cupo = mysqli_query($link, $cupos_cursos_query) or die('error de cupos cursos');

	while ($curso = mysqli_fetch_array($result_cursos_cupo,MYSQLI_ASSOC)) {
		if ($curso['cupos'] <= 0) {
			$hay_cupos = 0;
			$no_cupos = $no_cupos.$curso['nombre']." ";
		}
	}

	//Comprobar cupo en los cursos 
	if (!empty($talleres)) {
		for ($i=0; $i < count($talleres); $i++) { 
			$cupos_talleres_query = "SELECT * from talleres WHERE id = $talleres[$i]";
			$result_talleres_cupo = mysqli_query($link, $cupos_talleres_query) or die('error de cupos talleres');

			while ($taller = mysqli_fetch_array($result_talleres_cupo,MYSQLI_ASSOC)) {
				if ($taller['cupos'] <= 0) {
					$hay_cupos = 0;
					$no_cupos = $no_cupos.$taller['nombre']." ";
				}
			}
		}
	}

	if ($hay_cupos == 1) {
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

		//Quitar cupo en curso
		$curso_query = "UPDATE `cursos` SET `cupos`=`cupos` - 1 WHERE id = $curso";
		$result_curso = mysqli_query($link, $curso_query) or die('error de sql cursos'.mysqli_error($link));
		//Quitar cupo en talleres
		for ($i=0; $i < count($talleres); $i++) { 
			$taller_query = "UPDATE `talleres` SET `cupos`=`cupos` - 1 WHERE id = $talleres[$i]";
			$result_talleres = mysqli_query($link, $taller_query) or die('error de sql talleres'.mysqli_error($link));
		}

		//echo $query;

		echo '<script>alert("Datos gardados")</script>';
		echo "<script>location.href='../internas/list_registros.php'</script>";

	} else {
		echo '<script>alert("Cupos agotados en: '.$no_cupos.'")</script>';	
		echo "<script>location.href='../formulario.php'</script>";
	}

?>