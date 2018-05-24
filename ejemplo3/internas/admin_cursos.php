<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Factura | TEC-UTPL 2018-</title>
	
	<link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/registros.css">
</head>
<body>

<header class="clearfix">
	<section>
		<a href="../index.php"><h1>TEC-UTPL 2018</h1></a>
		
		<nav id="nav-bar">
			<ul class="clearfix">
				<li><a href="../formulario.php">Registrarse</a></li>
				<li><a href="list_registros.php">Participantes</a></li>
				<li><a href="../admin.php">Administrar</a></li>
			</ul>
		</nav>
	</section>
</header>




<main>

<h1>Lista de Cursos</h1>
<?php
	include("../dll/config.php");
	include("../dll/mysql.php");
	$query = "select * from cursos";
	$cursos = mysqli_query($link, $query) or die('error de sql');
?>
	
	<table>
		<tr>
			<th>Nombre</th>
			<th>Costo</th>
			<th>Cupos</th>
			<th>Eliminar</th>
		</tr>
		
	<?php	
		while ($curso = mysqli_fetch_array($cursos,MYSQLI_ASSOC)) { 

		//Conseguir talleres
		$id_actual = $curso['id'];
	?>

		<tr>
			<td><?php echo $curso['nombre'] ?></td>
			<td><?php echo $curso['costo'] ?></td>
			<td><?php echo $curso['cupos'] ?></td>
			<td><a href="borrar_cursos.php?id=<?php echo $id_actual ?>&type=curso">X</a></td>
			
		</tr>		

	<?php } ?>
	</table>

<h1>Lista de Talleres</h1>

<?php
	$query = "select * from talleres";
	$talleres = mysqli_query($link, $query) or die('error de sql');
?>
	<table>
		<tr>
			<th>Nombre</th>
			<th>Costo</th>
			<th>Cupos</th>
			<th>Eliminar</th>
		</tr>
		
	<?php	
		while ($taller = mysqli_fetch_array($talleres,MYSQLI_ASSOC)) { 

		//Conseguir talleres
		$id_actual = $taller['id'];
	?>

		<tr>
			<td><?php echo $taller['nombre'] ?></td>
			<td><?php echo $taller['costo'] ?></td>
			<td><?php echo $taller['cupos'] ?></td>
			<td><a href="borrar_cursos.php?id=<?php echo $id_actual ?>&type=taller">X</a></td>
			
		</tr>		

	<?php } ?>
	</table>

</main>

<footer>
	<p>@jeeguiguren</p>
</footer>

</body>
</html>