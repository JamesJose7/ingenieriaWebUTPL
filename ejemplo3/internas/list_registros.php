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
		<h1>TEC-UTPL 2018</h1>
		
		<nav id="nav-bar">
			<ul class="clearfix">
				<li><a href="../formulario.php">Registrarse</a></li>
				<li><a href="list_registros.php">Participantes</a></li>
				<li><a href="#">Acerca de</a></li>
			</ul>
		</nav>
	</section>
</header>


<h1>Lista de registros</h1>

<main>

<?php
	include("../dll/config.php");
	include("../dll/mysql.php");
	$query = "select * from registros";
	$registros = mysqli_query($link, $query) or die('error de sql');
?>
	
	<table>
		<tr>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>Direccion</th>
			<th>Correo</th>
			<th>Cedula</th>
			<th>Telefono</th>
			<th>Fecha Nacimiento</th>
			<!-- <th>Talleres</th> -->
			<th>Factura</th>
		</tr>
		
	<?php	
		while ($registro = mysqli_fetch_array($registros,MYSQLI_ASSOC)) { 

		//Conseguir talleres
		$id_actual = $registro['id'];
		$query2 = "SELECT * FROM registrotaller rt, talleres t WHERE id_registro = $id_actual AND t.id = rt.id_taller";
		$talleres = mysqli_query($link, $query2) or die('error de sql');

		$talleres_string = "";

		while ($taller = mysqli_fetch_array($talleres,MYSQLI_ASSOC)) { 
			$talleres_string =  $talleres_string.$taller['nombre']." ";
		}
	?>

		<tr>
			<td><?php echo $registro['nombres'] ?></td>
			<td><?php echo $registro['apellidos'] ?></td>
			<td><?php echo $registro['direccion'] ?></td>
			<td><?php echo $registro['correo'] ?></td>
			<td><?php echo $registro['cedula'] ?></td>
			<td><?php echo $registro['telefono'] ?></td>
			<td><?php echo $registro['fecha_nacimiento'] ?></td>
			<!-- <td><?php echo $talleres_string ?></td> -->
			<td><a href="factura.php?registro_id=<?php echo $id_actual ?>">Detalle</a></td>
			
		</tr>		

	<?php } ?>
	</table>

</main>

<footer>
	<p>@jeeguiguren</p>
</footer>

</body>
</html>