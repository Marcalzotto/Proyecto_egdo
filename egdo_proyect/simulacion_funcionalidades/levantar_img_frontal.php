<?php
	
	require_once("conexion.php");

	$query = "select id_disenio, disenio_frontal, ancho_frontal, alto_frontal, 
	nombre_imagen, tipo_frontal from disenio where id_disenio = ".$_GET["id"];

	/*busco la imagen que quiero mostrar segun el id pasado por url*/
	$obtenerResultSet = $conexion->query($query);
	$registro = $obtenerResultSet->fetch_array(MYSQLI_ASSOC);

	/*Luego con la directiva y el tipo de archivo imagen lo muestro*/
	header("Content-type:".$registro["tipo_frontal"]);
	echo $registro["disenio_frontal"];
?>