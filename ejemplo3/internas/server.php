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
extract($_POST);

$costo_base = 100;
$costo_curso = 80;
$costo_taller =10;

$descuento_docente = 0.1;
$descuento_estudiante = 0.20;

date_default_timezone_set('America/Los_Angeles');
$fecha_actual = date('m/d/Y', time());

// factura

//Costo acumulado
$costo_total = $costo_base;

// Comprobar curso inscrito
if (isset($curso) && !empty($curso)) {
    //echo $curso;
    $costo_total += $costo_curso;
}

// Comprobar talleres inscritos
if (isset($talleres) && !empty($talleres)) {
    //echo $talleres;
    $talleres = $_POST['talleres'];

	for ($i=0; $i<count($talleres); $i++) {
	    // echo $talleres[$i]."<br />";
	    $costo_total += $costo_taller;
	}
}

// Descuento
if ($tipo == "docente") {
	$costo_total = $costo_total - ($costo_total * $descuento_docente);
} else if ($tipo == "estudiante") {
	$costo_total = $costo_total - ($costo_total * $descuento_estudiante);
}
?>


<!--******** Factura ********-->
<section id="factura">
<header>
	<h1>FACTURA</h1>
	<p><span>CI: </span><?php echo $cedula ?></p>
	<p><span>Nombre: </span><?php echo $nombres." ".$apellidos ?></p>
	<p><span>Fecha: </span><?php echo $fecha_actual ?></p>
</header>

<main>
<!-- Cursos inscritos -->
<?php if (isset($curso) && !empty($curso)) {?>
	<table>
		<tr>
			<th colspan="2">Cursos</th>
		</tr>
		<tr>
			<th>Item</th>
			<th>Precio</th>
		</tr>
		<tr>
			<td><?php echo $curso ?></td>
			<td>+$80</td>
		</tr>
	</table>
<?php }?>

<!-- Talleres inscritos -->
<?php if (isset($talleres) && !empty($talleres)) {?>
	<table>
		<tr>
			<th colspan="2">Talleres</th>
		</tr>
		<tr>
			<th>Item</th>
			<th>Precio</th>
		</tr>

    <?php $talleres = $_POST['talleres'];

	for ($i=0; $i<count($talleres); $i++) {?>
		<tr>
			<td><?php echo $talleres[$i] ?></td>
			<td>+$10</td>
		</tr>
	<?php }?>
	</table>
<?php }?>

</main>

<footer>
	<p><span>Precio total: </span>$<?php echo $costo_total ?></p>
</footer>
</section>

</body>
</html>