<?php
function get_rol($curso,$usuario){
	include('conexion.php');

	$buscarRol = "select id_rol from usuario where id_usuario = '$usuario' and id_curso = '$curso'";
	$result = $conexion->query($buscarRol) or die("Error en la operacion: ".$conexion->error);
	
	$getRol = $result->fetch_array(MYSQLI_ASSOC);
	$rol_user = $getRol["id_rol"];

	return $rol_user;	

	$conexion->close();
}

?>