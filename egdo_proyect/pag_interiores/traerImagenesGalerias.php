<?php
require_once("conexion.php");

$buscarImagen = "select * from imagen where id_imagen=".$_GET["id"];
$traerImagen =	$conexion->query($buscarImagen);

$obtenerImagen = $traerImagen->fetch_array(MYSQLI_ASSOC);

header("Content-type:".$obtenerImagen["tipo"]);
echo $obtenerImagen["imagen"];
?>