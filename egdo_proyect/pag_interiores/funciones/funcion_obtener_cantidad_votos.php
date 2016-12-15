<?php
	function obtener_cantidad($conexion, $id_empresa, $valor){
		$obtener_cantidad = "select count(valor_calificacion) as cantidad from calificacion where id_empresa = '$id_empresa'
			 									 and valor_calificacion = '$valor'";

	$resultSet = $conexion->query($obtener_cantidad);
		if($resultSet){
			$reg = $resultSet->fetch_array(MYSQLI_ASSOC);
			$valor = $reg["cantidad"];
		}else{
			$valor = -1;
		}

		return $valor;
	}	
?>