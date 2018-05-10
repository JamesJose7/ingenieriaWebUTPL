<?php
extract($_POST);

$costo_base = 100;
$costo_curso = 80;
$costo_taller =10;

$descuento_docente = 0.1;
$descuento_estudiante = 0.25;

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

echo "Nombre: ".$nombres." ".$apellidos."<br>";
echo "Precio total: ".$costo_total;

?>