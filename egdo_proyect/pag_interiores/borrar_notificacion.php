<?php
include("../bloqueSeguridad.php");
include('conexion.php');

if($_POST){
	$exp_reg = '/[^0-9]/';

	$id_notificacion = $_POST["id"];
	$user = $_POST["user"];

	if(preg_match($exp_reg, $id_notificacion) || preg_match($exp_reg, $user)){
		echo -1;
	}else{
		$resultSet = $conexion->query("update notificacion_vista_por set borrada = 1 where id_notificacion = '$id_notificacion' and usuario = '$user' and curso_notificacion='$_SESSION[curso]'");
		if($resultSet){
			echo 1;
		}else{
			echo -1;
		}
	} 
}

?>