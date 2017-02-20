<?php
function calcular_ancho($calificacion){
	$ancho_total = 150;
	$escala = 5;

	$val1 = $ancho_total * $calificacion;
	$val2 = $val1 / $escala;
	$ancho_nuevo = round($val2, 2);
	return $ancho_nuevo;
}

?>