<?php

include ("../bloqueSeguridad.php");


@$id_mensaje = $_GET['id_mensaje'];
		$sql = "DELETE FROM mensajes_privado WHERE id_mensaje= $id_mensaje;";
		$conexion->query($sql) or die($conexion->error);
		header('Location: ../mensajes/listarMsjUsuario.php');

?>