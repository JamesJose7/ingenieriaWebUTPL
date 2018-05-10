<?php
extract($_POST);

$costo_base = 100;
$costo_curso = 80;
$costo_taller =10;

$descuento_docente = 0.1;
$descuento_estudiante = 0.20;

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

print "<h2>FACTURA</h2><br>==============================================<br>";
echo "<strong>CI: </strong>".$cedula."<br>";
echo "<strong>Nombre: </strong>".$nombres." ".$apellidos."<br>";
echo "<strong>Fecha: </strong>".$fecha."<br>";

//Cursos inscritos
if (isset($curso) && !empty($curso)) {
	print "<h3>Cursos</h3>=============<br>";
    echo $curso." <strong>&nbsp;&nbsp;&nbsp;&nbsp;+$80</strong><br>";
}

// Talleres inscritos
if (isset($talleres) && !empty($talleres)) {
	print "<h3>Talleres</h3>=============<br>";
    $talleres = $_POST['talleres'];

	for ($i=0; $i<count($talleres); $i++) {
	    echo $talleres[$i]." <strong>&nbsp;&nbsp;&nbsp;&nbsp;+$10</strong><br>";
	}
}

echo "<br><br><br><strong>Precio total: </strong>$".$costo_total;

?>