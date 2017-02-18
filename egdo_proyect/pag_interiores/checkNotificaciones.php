<?php
include("../bloqueSeguridad.php");
include("conexion.php");
include("funciones/cantidad_notificaciones.php");
include('funciones/cantidad_notificaciones_mensajes.php');	
include("funciones/generar_notificacion.php");
$fechaHoy = new DateTime();
$curso = $_SESSION["curso"];
$usuario = $_SESSION["id_usuario"];
generar_notificacion($conexion,$curso);
//$num = rand(0,3);
	if($_POST){
		$check = $_POST["check"];
		
		if($check == true){//empieza if
			
			//consulta para traer la cantidad de notificaciones que no fueron vistas por el usuario logueado
			$cantidad = cantidad_notificaciones($conexion,$usuario,$curso);
			echo $cantidad;
	
			//echo $num;
/*termina if*/	
		}else{
			echo -1;
		}
	}

?>