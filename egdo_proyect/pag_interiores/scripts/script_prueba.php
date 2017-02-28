<?php
include("../conexion.php");
date_default_timezone_set('America/Argentina/Buenos_Aires');

$fecha_1 = new DateTime('2017-02-01 21:00:00'); 
$fecha_2 = new DateTime('2017-02-16 21:37:00');

$interval = $fecha_1->diff($fecha_2);
$intervaloDias = $interval->d;
$intervaloHoras = $interval->h;
$intervaloMinutos = $interval->i;
$intervaloSegundos = $interval->s;
echo "La diferencia entre fechas es: ".$interval->format("%R%a dias")."</br>";
echo "Diferencia en Dias: ".$intervaloDias."</br>";

if($intervaloDias < 15){
	echo "todavia se puede proponer lugar"."</br>";
}else if($intervaloDias >= 15 && $intervaloDias < 22){
	echo "ya puedes votar los lugares"."</br>";
}else if($intervaloDias >= 22){
	echo "ya estan los lugares ganadores excepto que haya empate."."</br>";
}

$query = "select count(id_disenio) as cant from disenio where codigo_tipo = 1;";
$query .= "select count(id_disenio) as cant from disenio where codigo_tipo = 2;";
$query .= "select count(id_disenio) as cant from disenio where codigo_tipo = 3;";

if ($conexion->multi_query($query)) {
    do {
        /* almacenar primer juego de resultados */
        if ($result = $conexion->store_result()) {
            while ($row = $result->fetch_row()) {
                //printf("%s\n", $row[0]);
            	$vec[] = $row[0];
            }
            $result->free();
        }
        /* mostrar divisor */
        /*if ($conexion->more_results()) {
            printf("-----------------\n");
        }*/
    } while ($conexion->more_results() && $conexion->next_result());
}


echo "Cantidades de disenios: ".$vec[0]." ".$vec[1]." ".$vec[2];

/* cerrar conexión */
$conexion->close();
/*$fecha_hoy = new DateTime();

$fecha_hoy = $fecha_hoy->format("Y-m-d H:i:s");

$fecha_separar = explode("-", $fecha_hoy);
				$aaaa = $fecha_separar[0];
				$mm = $fecha_separar[1];
				$dd = $fecha_separar[2];

				

				$tiempo = explode(" ",$dd);
				$dia = $tiempo[0];
				$hora = $tiempo[1];

				$separar_hora = explode(":", $hora);
				$horas = $separar_hora[0];
				$minutos = $separar_hora[1];
				$segundos = $separar_hora[2];

			echo "Anio: ".$aaaa."</br>";
			echo "mes: ".$mm."</br>";	
			echo "dia: ".$dia."</br>";	
			echo "horas: ".$horas."</br>";	
			echo "minutos: ".$minutos."</br>";	
			echo "segundos: ".$segundos."</br>";	

			echo $dia." de ".$mm." a las ".$horas.":".$minutos."hs.";*/	
?>