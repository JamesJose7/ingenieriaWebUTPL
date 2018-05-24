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
	<link rel="stylesheet" href="css/registros.css">
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

	<aside>
		<!-- Search bar -->
		<form method="post" action="internas/search.php">
			<input name="query" type="text" placeholder="Buscar">
		</form>

	</aside>
	<main>

		<?php
			if (isset($_GET['q'])) {
				$query = $_GET['q']; 

				include("dll/config.php");
				include("dll/mysql.php");
				$sql = "select * from registros WHERE nombres LIKE '%$query%' OR apellidos LIKE '%$query%' OR cedula LIKE '%$query%' OR correo LIKE '%$query%';";
				$registros = mysqli_query($link, $sql) or die('error de sql');
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

				$id_actual = $registro['id'];
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
					<td><a href="internas/factura.php?registro_id=<?php echo $id_actual ?>">Detalle</a></td>
					
				</tr>		

			<?php } ?>
			</table>
		 <?php }

	?>
		
	</main>

	<footer>
		<p>@jeeguiguren</p>
	</footer>
</body>
</html>