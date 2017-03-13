<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

}else{
   header('Location: ../../../index.php');

exit;
}

$now = time();

if($now > $_SESSION['expire']) {
session_destroy();

header('Location: ../../../index.php');
exit;
}

require_once("../../conexion.php");
	
	

	$diferencia_dias = 7;
	$expRegNum = '/[^0-9]/';

	if($_POST){
		$days = $_POST["dias"];
		
		if(preg_match($expRegNum, $days)){
			echo -1;
		}else if($days < 0 || $days > 7){
			echo -1;
		}else if($_SESSION["id_usuario"] != 6){
			echo -1;
		}else{
			$buscarFecha = "select fecha_apertura from actividad_disenio where curso_pertenece_votacion = '$_SESSION[curso]'";
			if($result = $conexion->query($buscarFecha)){
				if($result->num_rows == 1){
					$reg = $result->fetch_array(MYSQLI_ASSOC);
					$fecha_apertura = new dateTime($reg["fecha_apertura"]);
					$diferencia_dias = $diferencia_dias - $days;
					$fecha_apertura->sub(new DateInterval("P".$diferencia_dias."D"));
					$fecha_formateada = $fecha_apertura->format('Y-m-d');
					$update = "update actividad_disenio set fecha_apertura = '$fecha_formateada' where curso_pertenece_votacion = '$_SESSION[curso]'";
					if(!$result = $conexion->query($update)){
						echo -1;
					}else{
						echo 1;
					}
				}else{
					echo -1;
				}
			}else{
				echo -1;
			}
		}
	}
?>