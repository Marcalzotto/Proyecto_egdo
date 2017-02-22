<?php
	session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
   header('Location: ../../index.php');

exit;
}

$now = time();

if($now > $_SESSION['expire']) {
session_destroy();

header('Location: ../../index.php');
exit;
}

require('../../conexion.php');

$usuario_sube = $_SESSION['id_usuario']; 	
$respuesta = "";
	
	if($_POST["prenda"]){

		$tipoPrenda = $_POST["prenda"];

		if($tipoPrenda == 1 || $tipoPrenda == 2 || $tipoPrenda == 3){
		
			$queryVerificar = "select id_disenio, path_frontal, path_espalda, path_img_doble from disenio where codigo_tipo = '$tipoPrenda' and id_usuario_subio = '$usuario_sube'";
		
			$resultados = $conexion->query($queryVerificar);
		
			if($resultados){
				if($resultados->num_rows > 0){
				
					$var = $resultados->fetch_array(MYSQLI_ASSOC);
					$query = "delete from disenio where codigo_tipo = '$tipoPrenda' and id_usuario_subio = '$usuario_sube'"; 
				
					$result = $conexion->query($query);
				
					if($result){
					
					$del1 = unlink($var['path_frontal']);
					$del2 = unlink($var['path_espalda']);
					$del3 = unlink($var['path_img_doble']);
						if($del1 && $del2 && $del3){
							$respuesta = "Los disenios fueron borrados con exito";
							echo $respuesta;
						}else{
							$respuesta = "Los disenios no pudieron borrarse por completo";
							echo $respuesta;
						}
					}else{
						$respuesta = "La operacion no pudo concretarse porque hubo errores";
						echo $respuesta;
					}
				}else{
					$respuesta = "No tienes disenios disponibles";
					echo $respuesta;
				}
			}else{
				$respuesta = "Lo sentimos hubo un error inesperado";
			}	
		}else{
			$respuesta = "Los datos enviados no son correctos";
			echo $respuesta;
		}
	}else{
		$respuesta = "Lo sentimos hubo errores en el envio de datos";
		echo $respuesta;
	}

	$conexion->close();
?>