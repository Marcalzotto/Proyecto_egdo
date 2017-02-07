<?php
function cantidad_notificaciones($conexion,$usuario,$curso){


	$query = "select count(id_notificacion) as cant from notificaciones where curso_notificacion = '$curso' and id_notificacion not in(
						select id_notificacion from notificacion_vista_por where usuario = '$usuario' 
						and curso_notificacion = '$curso');";
											
		$result = $conexion->query($query) or die($conexion->error);

		if($result){
			$cantidad = $result->fetch_array(MYSQLI_ASSOC);
			$cant = $cantidad["cant"];
		}else{
			$cant = -1;
		}

		return $cant;
}

?>