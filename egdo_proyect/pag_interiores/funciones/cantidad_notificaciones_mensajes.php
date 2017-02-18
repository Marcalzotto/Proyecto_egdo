<?php
function cantidad_notificaciones_mensajes($conexion,$usuario){

		$query = "SELECT count(leido) as cant_mensajes FROM mensajes_privado WHERE leido=0 and id_receptor='$usuario'";
											
		$result = $conexion->query($query) or die($conexion->error);

		if($result){
			$cantidad_mensajes = $result->fetch_array(MYSQLI_ASSOC);
			$cant_mensajes = $cantidad_mensajes["cant_mensajes"];
		}else{
			$cant_mensajes = -1;
		}

		return $cant_mensajes;
}

?>