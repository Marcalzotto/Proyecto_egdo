<?php
include('../../bloqueSeguridad.php');
include('../conexion.php');
$expReg = '/[^0-9]/';
$usuario = $_SESSION["id_usuario"];
if($_POST){

	$num = $_POST["num"];
	if(preg_match($expReg, $num)){
		echo -1;
	}else if($num != 1){
		echo -1;
	}else if($usuario != 6){
		echo -1;
	}else{
		$fechaHoy = new DateTime();

		$traerFecha = "select fecha_hora from evento where id_actividad = 3 and id_curso = 2";
		if($result = $conexion->query($traerFecha)){
			if($result->num_rows == 1){
				$reg = $result->fetch_array(MYSQLI_ASSOC);
				$fecha_apertura = new DateTime($reg["fecha_hora"]);
				$interval = $fecha_apertura->diff($fechaHoy);
				if($interval->d < 0 || $interval->d >= 15){
					echo -1;
				}else{
					$dias_total = 15;
					$dias_total = $dias_total - $interval->d;
					
					$fecha_apertura->sub(new DateInterval("P".$dias_total."D"));
					$fecha_ins = $fecha_apertura->format("Y-m-d H:i:s");
					$update = "update evento set fecha_hora = '$fecha_ins' where id_actividad = 3 and id_curso = 2";
					if(!$result = $conexion->query($update)){
						echo -1;
					}else{
						echo 1;
					}
				}
			}else{
				echo -1;
			}	
		}else{
			echo -1;
		}
	}
}else{
	echo -1;
}
?>