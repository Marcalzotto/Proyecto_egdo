<?php
	
	function obtener_cantidad_ganadores($conexion,$codigo_tipo,$curso){
		

	$buscarGanadores = "select count(id_disenio) as ganadores from disenio as di join usuario u on di.id_usuario_subio = u.id_usuario 
											where u.id_curso = '$curso' and codigo_tipo = '$codigo_tipo' and votos_segunda_instancia in(
											select max(d.votos_segunda_instancia) from disenio as d where d.codigo_tipo = '$codigo_tipo' and d.estado_moderar = 0);";
	$resultSet = $conexion->query($buscarGanadores);
		if($resultSet){
			$reg = $resultSet->fetch_array(MYSQLI_ASSOC);
			$cantidad = $reg["ganadores"];
			return $cantidad;
		}else{
			return -1;
		}
	}	
?>