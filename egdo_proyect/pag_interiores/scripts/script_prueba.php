<?php
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
}else if($intervaloDias >= 16 && $intervaloDias <= 23){
	echo "ya puedes votar los lugares"."</br>";
}else if($intervaloDias > 23){
	echo "ya estan los lugares ganadores excepto que haya empate."."</br>";
}



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