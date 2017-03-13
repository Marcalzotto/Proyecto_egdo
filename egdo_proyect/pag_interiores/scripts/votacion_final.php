<?php
include('../../bloqueSeguridad.php');
include('../conexion.php');
if($_POST){
	$num = $_POST["num"];
	$usuario = $_SESSION["id_usuario"];
	$curso = $_SESSION["curso"];


	$expReg = '/[^0-9]/';
	if(preg_match($expReg, $num)){
		echo -1;
	}else if($usuario != 6){
		echo -1;
	}else{
		$buscarFecha = "select fecha_apertura from actividad_disenio where curso_pertenece_votacion = 2";
		if($result = $conexion->query($buscarFecha)){
			if($result->num_rows == 1){
				$reg = $result->fetch_array(MYSQLI_ASSOC);
				$fecha_apertura = new DateTime($reg["fecha_apertura"]);

				$fecha_hoy = new DateTime();
				$interval = $fecha_apertura->diff($fecha_hoy);
				$intervalDias = $interval->d;
				if($intervalDias >= 13 || $intervalDias < 10){
					echo -1;
				}else{
					$days_sub = 13;
					$days_sub = $days_sub - $intervalDias;
					$fecha_apertura->sub(new DateInterval("P".$days_sub."D"));
					$fecha_formatear = $fecha_apertura->format("Y-m-d");
					$pasar_instancia = "update actividad_disenio set fecha_apertura = '$fecha_formatear' where curso_pertenece_votacion = 2";
					if(!$result = $conexion->query($pasar_instancia)){
						echo -1;
					}else{
						echo 1;
					}
				}	 
			}else{
				echo -1;
			}
			
		}
	}

}else{
	echo -1;
}

?>