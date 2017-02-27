<?php
include ("../../bloqueSeguridad.php");
include("../conexion.php");

if($_POST){
	$num = $_POST["num"];
	if($num != 1){
		echo 2;
	}else{
		$fechaHoy = new DateTime();
		$fechaHoy = $fechaHoy->format("Y-m-d"); 
		$update = "update actividad_disenio set fecha_apertura = '$fechaHoy' where curso_pertenece_votacion = '$_SESSION[curso]'";
		if(!$result = $conexion->query($update)){
			echo 3;
		}else{
			echo 1;
		}
	}
}else{
	echo 2;
}
?>