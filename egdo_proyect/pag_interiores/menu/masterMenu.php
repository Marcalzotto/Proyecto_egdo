<?php

if(isset($cant_notificaciones)){
	$cant = $cant_notificaciones;
}else{
	$cant = cantidad_notificaciones($conexion,$_SESSION["id_usuario"],$_SESSION["curso"]);
}



if(isset($cant_notificaciones_mensajes)){
	$cant_mensajes = $cant_notificaciones_mensajes;
}else{
	$cant_mensajes = cantidad_notificaciones_mensajes($conexion,$_SESSION["id_usuario"]);
}


$id_rol=$_SESSION['id_rol'];


	if($id_rol==2){
	
		include '../pag_interiores/menu/menuAdminCurso.php';
		
	}
	else{
		
		include '../pag_interiores/menu/menuUsuarioComun.php';
		
	}
?>		
