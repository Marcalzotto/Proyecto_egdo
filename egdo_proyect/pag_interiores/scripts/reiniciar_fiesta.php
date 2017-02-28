<?php
include("../../bloqueSeguridad.php");
include("../conexion.php");
$fecha_hoy = new DateTime();
$fecha_hoy = $fecha_hoy->format("Y-m-d H:i:s");
if($_POST){
	$num = $_POST["num"];
	if($num != 1){
		echo -1;
	}else{
		$update = "update evento set fecha_hora = '$fecha_hoy' where id_actividad = 3 and id_curso = '$_SESSION[curso]'";
		if(!$result = $conexion->query($update)){
			echo -1;
		}else{
			echo 1;
		}
	}
}else{
	echo -1;
}
?>