<?php

require_once("conexion.php");

$buscarImagen = "select nombre_lugar from info_viaje where id_imagen=".$_GET["id"]." and nombre_lugar = 'Bariloche1'";
$traerImagen =	$conexion->query($buscarImagen);

$obtenerImagen = $traerImagen->fetch_array(MYSQLI_ASSOC);

header("Content-type: image/jpeg");
echo $obtenerImagen["imagen"];

?>