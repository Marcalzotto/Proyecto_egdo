<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
$fecha_hoy = new DateTime();

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

			echo $dia." de ".$mm." a las ".$horas.":".$minutos."hs.";	
?>