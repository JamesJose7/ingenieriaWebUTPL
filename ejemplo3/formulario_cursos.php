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
	
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/main.css">
</head>
<body>

	<header class="clearfix">
		<section>
			<a href="index.php"><h1>TEC-UTPL 2018</h1></a>
			
			<nav id="nav-bar">
				<ul class="clearfix">
					<li><a href="formulario.php">Registrarse</a></li>
					<li><a href="internas/list_registros.php">Participantes</a></li>
					<li><a href="admin.php">Administrar</a></li>
				</ul>
			</nav>
		</section>
	</header>
	
	<form method="post" action="internas/add_curso.php">
		<div><h2>Cursos</h2></div>
		<fieldset>

			<label for="codigo">Código</label>
			<input id="codigo" type="text" name="codigo" required><br>
			<label for="nombre">Nombre</label>
			<input id ="nombre" type="text" name="nombre" required><br>
			<label for="costo">Costo</label>
			<input id ="costo" type="number" name="costo" required><br>
			<label for="cupos">Cupos</label>
			<input id ="cupos" type="number" name="cupos" required><br>

			
		</fieldset>

			<button>Agregar</button>
		
	</form>

	<form method="post" action="internas/add_taller.php">
		<div><h2>Talleres</h2></div>		
		<fieldset class="right-fieldset">


			<label for="codigo">Código</label>
			<input id="codigo" type="text" name="codigo" required><br>
			<label for="nombre">Nombre</label>
			<input id ="nombre" type="text" name="nombre" required><br>
			<label for="costo">Costo</label>
			<input id ="costo" type="number" name="costo" required><br>
			<label for="cupos">Cupos</label>
			<input id ="cupos" type="number" name="cupos" required><br>

		</fieldset>

		<button>Agregar</button>
		
	</form>

	<footer>
		<p>@jeeguiguren</p>
	</footer>
</body>
</html>