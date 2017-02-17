<?php
 include ("../../bloqueSeguridad.php");
 include("../conexion.php");
 $expReg = '/[^0-9]/';
 if($_POST){

 	$curso = $_SESSION["curso"];
 	$usuario = $_SESSION["id_usuario"];
 	$actividad = $_POST["evento"];

 	if(preg_match($expReg, $actividad)){
 		echo "Hubo un error al procesar la peticion, intenta nuevamente mas tarde.";
 	}else if($actividad != 3){
 		echo "Hubo un error al procesar los peticion, intenta nuevamente mas tarde.";
 	}else{
 		$buscarSiActividad = "select count(id_evento) as cant_evento from evento where id_actividad = 3 and id_curso = '$curso'";
 		if($result = $conexion->query($buscarSiActividad)){
 			$reg = $result->fetch_array(MYSQLI_ASSOC);
 			$cantidad = $reg["cant_evento"];
 			if($cantidad == 1){
 				echo "Ya has lanzado el evento fiesta para este curso.";
 			}else{
 				$fechaHoy = new datetime();
 				$fecha_evento = $fechaHoy->format("Y-m-d H:i:s");
 				$insertarEvento = "insert into evento values('','$actividad','$usuario','$fecha_evento','$curso');";
 				if(!$result = $conexion->query($insertarEvento)){
 					echo "Lo sentimos hubo un error inesperado, intenta nuevamente mas tarde.";
 				}else{
 					echo "El evento ha sido lanzado, pulsa F5 para continuar.";
 				}
 			}
 		}else{
 			echo "Lo sentimos hubo un error inesperado, intenta nuevamente mas tarde.";
 		}
 	}
 		
 
 }
?>