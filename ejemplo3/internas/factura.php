<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Factura | TEC-UTPL 2018-</title>
	
	<link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/form.css">
</head>
<body>

<?php
include("../dll/config.php");
include("../dll/mysql.php");

$id = $_GET['registro_id'];

//Obetener Registro
$query = "select * from registros WHERE id = $id";
$registros = mysqli_query($link, $query) or die('error de sql');
while ($registro = mysqli_fetch_array($registros,MYSQLI_ASSOC)) { 

	// factura

	extract($_POST);

	$costo_base = 100;
	$costo_curso = 80;
	$costo_taller =10;

	$descuento_docente = 0.1;
	$descuento_estudiante = 0.20;
	$descuento_aplicado = 0;

	//Fecha actual
	date_default_timezone_set('America/Los_Angeles');
	$fecha_actual = date('m/d/Y', time());

	//Costo acumulado
	$costo_total = $costo_base;

	// Comprobar curso inscrito
	if (isset($registro['curso']) && !empty($registro['curso'])) {
	    $costo_total += $costo_curso;
	    //echo $costo_total;
	}

	//Obtener talleres
	$query2 = "SELECT * FROM registrotaller rt, talleres t WHERE id_registro = $id AND t.id = rt.id_taller";
	$talleres = mysqli_query($link, $query2) or die('error de sql');

	$talleres_string = "";
	$talleres_array = array();

	while ($taller = mysqli_fetch_array($talleres,MYSQLI_ASSOC)) { 
		$talleres_string =  $talleres_string.$taller['nombre']." ";
		array_push($talleres_array, $taller['nombre']);
		$costo_total += $costo_taller;
	}

	//echo "<br><br>".$registro['nombres'];

	// Descuento
	if ($registro['tipo'] == "d") {
		$costo_total = $costo_total - ($costo_total * $descuento_docente);
		$descuento_aplicado = 100 * $descuento_docente;
	} else if ($registro['tipo'] == "e") {
		$costo_total = $costo_total - ($costo_total * $descuento_estudiante);
		$descuento_aplicado = 100 * $descuento_estudiante;
	}
?>

<!--******** Factura ********-->
<section id="factura">
<header>
	<h1>FACTURA <span class="id_factura">#<?php echo rand(100, 999); ?></span></h1>
	<p><span>CI: </span><?php echo $registro['cedula'] ?></p>
	<p><span>Nombre: </span><?php echo $registro['nombres']." ".$registro['apellidos'] ?></p>
	<p><span>Fecha: </span><?php echo $fecha_actual ?></p>
</header>

<main>
<!-- Cursos inscritos -->
<?php if (isset($registro['curso']) && !empty($registro['curso'])) {
	//Nombre de curso
	$curso_nombre = "";
	switch ($registro['curso']) {
		case 'j':
			$curso_nombre = "Java";
			break;
		case 'a':
			$curso_nombre = "Android";
			break;
		case 'r':
			$curso_nombre = "React";
			break;

		default:
			$curso_nombre = "404 Curso not found";
			break;
	}
	?>
	<table>
		<tr>
			<th colspan="2">Cursos</th>
		</tr>
		<tr>
			<th>Item</th>
			<th>Precio</th>
		</tr>
		<tr>
			<td><?php echo $curso_nombre ?></td>
			<td>+$80</td>
		</tr>
	</table>
<?php }?>

<!-- Talleres inscritos -->
<?php if (!empty($talleres_array)) {?>
	<table>
		<tr>
			<th colspan="2">Talleres</th>
		</tr>
		<tr>
			<th>Item</th>
			<th>Precio</th>
		</tr>

    <?php

	for ($i=0; $i < count($talleres_array); $i++) { ?>
		<tr>
			<td><?php echo $talleres_array[$i] ?></td>
			<td>+$10</td>
		</tr>
	<?php }?>
	</table>
<?php }
}?>

</main>

<footer>
	<p><span>Descuento: </span>%<?php echo $descuento_aplicado ?></p>
	<p><span>Precio total: </span>$<?php echo $costo_total ?></p>
</footer>
</section>

</body>
</html>