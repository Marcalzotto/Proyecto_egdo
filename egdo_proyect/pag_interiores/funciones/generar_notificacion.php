<?php

function generar_notificacion($conexion,$resumen_notificacion,$enlace,$icono,$curso,$fecha,$tipo){

	$resulset = $conexion->query("insert into notificaciones values('','$resumen_notificacion','$enlace','$icono','$curso','$fecha','$tipo')") or die("No se pudo realizar la operacion".$conexion->error);

}	

?>