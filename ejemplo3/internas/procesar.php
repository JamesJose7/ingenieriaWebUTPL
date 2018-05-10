<?php
//Extract variables from the post method via the form
extract($_POST);

$var1 = 2;
$var2 = "3";
//echo $res=$var1*$var2;

$fecha_actual = "2018-05-10";
//echo $fecha_nacimiento;
//echo $cal_edad = $fecha_nacimiento-$fecha_actual;


//AGe
$tiempo = strtotime($fecha_nacimiento);
$ahora = time();
$edad = ($ahora-$tiempo)/(60*60*24*365.25);
//echo $edad = floor($edad);
$edad = floor($edad);

//echo $nombres;
echo "Hola<br>Bienvenido: ".$nombres." ".$apellidos;

print "<br>Ud tiene: ".$edad." años de edad";

if ($edad>=18) {
	echo "<br>Ud es mayor de edad<br>";
} else {
	echo "<br>Ud es menor de edad<br>";
}

for ($i=0; $i < 12; $i++) { 
	# code...
	print "No te repitas ".$i."<br>";
}

$lista[0]="Docente";
$lista[1]="Estudiante";
$lista[2]="Abogado";
$lista[3]="Ingeniero";
$lista[4]="Doctor";
$lista[5]="Policia";
for ($i=0; $i < count($lista); $i++) { 
	print "Lista: ".$i." ".$lista[$i]."<br>";
}

/*Un curso o ninguno*/
/*Varios talleres o ninguno*/

?>