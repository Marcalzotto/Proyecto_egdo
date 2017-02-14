<?php
include("../bloqueSeguridad.php");
include('conexion.php');

if($_POST){
	$exp_reg = '/[^0-9]/';

	$id_notificacion = $_POST["id"];
	

	if(preg_match($exp_reg, $id_notificacion)){
		echo -1;
	}else{
		
		$buscarNotifBorradas = "select count(id_notificacion) as no_borradas from notificacion_vista_por where borrada = 0 and usuario = '$_SESSION[id_usuario]' and curso_notificacion = '$_SESSION[curso]'";
 		
 		
		if($resultSet = $conexion->query($buscarNotifBorradas)){
			$actualizarEstado = "update notificacion_vista_por set borrada = 1 where id_notificacion = '$id_notificacion' and usuario = '$_SESSION[id_usuario]' and curso_notificacion='$_SESSION[curso]'";		
			$reg = $resultSet->fetch_array(MYSQLI_ASSOC);
			$cantidad = $reg["no_borradas"];
			if(!$resultSet = $conexion->query($actualizarEstado)){
				echo -1;
			}else{
				echo $cantidad;
			}
			
		}else{
			echo -1;
		}
	} 
}

?>