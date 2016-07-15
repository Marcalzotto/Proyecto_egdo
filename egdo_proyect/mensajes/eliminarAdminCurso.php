<?php

include ("../bloqueSeguridad.php");




    $conexion = mysql_connect("localhost", "root", "")
      or die("Problemas en la conexion");
    
    mysql_select_db("egdo_db", $conexion) 
      or die("Problemas en la seleccion de la base de datos");
    
@$id_mensaje = $_GET['id_mensaje'];
		$query = "DELETE FROM mensajes_privado WHERE id_mensaje= $id_mensaje;";
		mysql_query($query,$conexion);
		header('Location: ../mensajes/listarAdminCurso.php');

?>