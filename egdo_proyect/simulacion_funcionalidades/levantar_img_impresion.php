<?php
	
	require_once("conexion.php");

	/*$query = "select id_disenio, disenio_impresion, ancho_impresion, alto_impresion
	, nombre_impresion, tipo_impresion from disenio where id_disenio = ".$_GET["id_imp"];*/
	
	$query = "select * from disenio where id_disenio = ".$_GET["id_imp"]; 

	/*Busco la imagen de impresion por el id*/
	$obtenerResultSet = $conexion->query($query);
	$registro = $obtenerResultSet->fetch_array(MYSQLI_ASSOC);

	/*muestro la imagen*/
	header("Content-type:".$registro["tipo_impresion"]);

	header("Content-Description: File Transfer");

	header("Content-Deposition: attachment; filename=".$registro["nombre_impresion"]);

	header("Content-Transfer-Encoding: binary");

	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Pragma: public");

	ob_clean();
	flush();
	echo $registro["disenio_impresion"];
?>