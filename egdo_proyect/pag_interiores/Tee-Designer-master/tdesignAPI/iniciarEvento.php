<?php

session_start();
include('../../conexion.php');
$user = $_SESSION['id_usuario'];
$curso = $_SESSION['curso'];

$query = "select actividad_disenio_id from actividad_disenio where usuario_apertura = '$user' and 
curso_pertenece_votacion = '$curso'";

$response = "";

$resultSet = $conexion->query($query) or die($conexion->error);

if($resultSet){
	if($resultSet->num_rows > 0){
		$response = "Ya has lanzado el evento disenio para este curso";
		echo $response;
	}else{

		//$fechaHoy = new datetime(null, new dateTimeZone('America/Argentina/Buenos_Aires'));

		//$fechaHoy->format('Y-m-d H:i:s');

		$fechaHoy = new DateTime();
		$fecha_ins = $fechaHoy->format("Y-m-d");

		$queryInsert = "insert into actividad_disenio values('','$fecha_ins','','$user','$curso')";

		$result = $conexion->query($queryInsert) or die($conexion->error);
		if($result){
			
			$response = "El evento se ha lanzado con exito, pulsa f5 para ver los cambios";
			echo $response;
		}else{
			$response = "Lo sentimos hubo un error inseperado del lado del servidor";
			echo $response;
		}

	}
}else{
	$response = "Lo sentimos hubo errores del lado del servidor";
	echo $response;
}
?>