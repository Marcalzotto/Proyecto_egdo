<?php
function ancho_barra($total_calificacion, $calificaciones_valor){

$porcentaje = $calificaciones_valor * 100;

if($total_calificacion == 0){
	
	$porcentaje = 0; 

}else{
	$porcentaje = $porcentaje / $total_calificacion;
	$porcentaje = round($porcentaje,2);
}

$ancho_total_barra = 300;

$ancho_barra = $porcentaje * $ancho_total_barra;


$ancho_barra = $ancho_barra / 100;

$ancho_barra = round($ancho_barra, 2);
if($ancho_barra < 1){
	$ancho_barra = 1;
}
	return $ancho_barra;
}

?>