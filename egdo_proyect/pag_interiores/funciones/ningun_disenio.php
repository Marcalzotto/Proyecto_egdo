<?php 
function ningun_disenio($conexion,$curso,$prenda){

	$ninguno = 1;
	$contar_disenio = "select count(id_disenio) as cantidad from disenio as d join usuario as u on d.id_usuario_subio = u.id_usuario 
	where u.id_curso = '$curso' and d.codigo_tipo = '$prenda'";
	
	if($result = $conexion->query($contar_disenio)){
		$reg = $result->fetch_array(MYSQLI_ASSOC);
		$cantidad = $reg["cantidad"];
		if($cantidad == 0){
			$ninguno = 1;
		}else{
			$ninguno = 0;
		}
	}else{
		$ninguno = -1;
	}

	return $ninguno;
}

?>