<?php
	include("dll/config.php");
	include("dll/mysql.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php $site_name ?></title>
	
	<link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<h1>TEC-UTPL 2018</h1>
	
	<form method="post" action="internas/process_form.php" class="clearfix">
		<div><h2>Inscripción</h2></div>
		<fieldset id="left-fieldset">
			<legend>Información personal</legend>

			<label for="nombres">Nombres</label>
			<input id="nombres" type="text" name="nombres" required><br>
			<label for="apellidos">Apellidos</label>
			<input id ="apellidos" type="text" name="apellidos" required><br>
			<label for="telefono">Teléfono</label>
			<input id ="telefono" type="text" name="telefono"><br>

			<label for="direccion">Dirección</label>
			<input id ="direccion" type="text" name="direccion"><br>

			<label for="correo">Correo</label>
			<input id="correo" type="email" name="correo"><br>
			<label for="fecha">Fecha de nacimiento</label>
			<input id="fecha" type="date" name="fecha" required><br>
			<label for="cedula">Cédula</label>
			<input id="ceula" type="text" name="cedula" required><br>
			<label>¿Estudiante o Docente?</label>
			<select name="tipo" id="">
				<option value="docente">Docente</option>
				<option value="estudiante">Estudiante</option>
				<option value="otro">Otro</option>
			</select>
		</fieldset>
		
		<fieldset class="right-fieldset">
			<legend>Ofrecemos</legend>

			<label for="">Cursos</label>
			<input type="radio" name="curso" value="java" id="java"><label for="java" class="list-item">Java</label><br>
			<input type="radio" name="curso" value="android" id="android"><label for="android" class="list-item">Android</label><br>
			<input type="radio" name="curso" value="react" id="react"><label for="react" class="list-item">React</label><br>
			
			<br><label for="">Talleres:</label>
			<?php 
				$query = "select * from talleres";
				$talleres = mysqli_query($link, $query) or die('error de sql');
			
				while ($taller = mysqli_fetch_array($talleres,MYSQLI_ASSOC)) { ?>
	
				<input type="checkbox" name="talleres[]" value="<?php echo $taller['id']; ?>" id="<?php echo $taller['nombre']; ?>"><label for="<?php echo $taller['nombre']; ?>" class="list-item"><?php echo $taller['nombre']; ?></label><br>

			<?php } ?>


			<!-- <input type="checkbox" name="talleres[]" value="html" id="html"><label for="html" class="list-item">HTML</label><br>
			<input type="checkbox" name="talleres[]" value="css" id="css"><label for="css" class="list-item">CSS</label><br>
			<input type="checkbox" name="talleres[]" value="visualizacion" id="visualizacion"><label for="visualizacion" class="list-item">HTML</label><br>
			<input type="checkbox" name="talleres[]" value="cocina" id="cocina"><label for="cocina" class="list-item">Cocina</label><br> -->
		</fieldset>

		<button>Registrarse</button>
		
	</form>
</body>
</html>