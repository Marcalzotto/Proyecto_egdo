<?php
function get_mes($mes){

$nombre_mes = "";

switch($mes){
	case 1:
	$nombre_mes = "Enero";
	break;
	case 2:
	$nombre_mes = "Febrero";
	break;
	case 3:
	$nombre_mes = "Marzo";
	break;
	case 4:
	$nombre_mes = "Abril";
	break;
	case 5:
	$nombre_mes = "Mayo";
	break;
	case 6:
	$nombre_mes = "Junio";
	break;
	case 7:
	$nombre_mes = "Julio";
	break;
	case 8:
	$nombre_mes = "Agosto";
	break;
	case 9:
	$nombre_mes = "Septiembre";
	break;
	case 10:
	$nombre_mes = "Octubre";
	break;
	case 11:
	$nombre_mes = "Noviembre";
	break;
	case 12:
	$nombre_mes = "Diciembre";
	break;
}

return $nombre_mes;

}

?>