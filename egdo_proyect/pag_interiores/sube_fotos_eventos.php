<?php
	require_once('conexion.php');
	
	$respuesta_ajax = "";
	
	$evento = $_POST["evento_opcion"];

	if($evento == 0){
		
		$respuesta_ajax = "<p>Lo sentimos hubo errores en la carga de datos, elije el evento de esta foto</p>";
		echo $respuesta_ajax;
	
	}else if($_FILES["foto_evento"]["error"] > 0){
		
		$respuesta_ajax = "<p>Lo sentimos hubo errores en la carga de datos, debes subir una foto</p>";
		echo $respuesta_ajax;
	
	}else{

		/*se debe obtener de la sesion*/
		$obtenerUsuario = 1;
		/*Cuando todo este listo*/
		//$obtener_curso = x;
		//cuando todo este listo
		$obtener_id_actividad = 1;

		$buscarSiSubioDosFotos = "select count(id_imagen) as cantidad from imagen where id_usuario = '$obtenerUsuario'";
		$resultadoBusqueda = $conexion->query($buscarSiSubioDosFotos) or die($conexion->error);

		if($resultadoBusqueda){
			
			$obtenerCantidadFotos = $resultadoBusqueda->fetch_array(MYSQLI_ASSOC);
			$cantidad = $obtenerCantidadFotos["cantidad"];
			
			if($cantidad > 1){
				$respuesta_ajax = "<p>Lo sentimos pero has alcanzado el limite permitido de fotos por usuario</p>";
				echo $respuesta_ajax;
			
			}else{
				
				$imgDimensiones = getimagesize($_FILES["foto_evento"]["tmp_name"]);
				$ancho = $imgDimensiones[0];
				$alto = $imgDimensiones[1];
				$nombre = $_FILES["foto_evento"]["tmp_name"];
				$obtenerImg = $conexion->real_escape_string(file_get_contents($_FILES["foto_evento"]["tmp_name"]));
				$obtenerTipo = $_FILES["foto_evento"]["type"];
				$obtenerTamanio = $_FILES["foto_evento"]["size"];

				$consultaInsercionImg = "insert into imagen values('','$nombre','$obtenerTamanio',
																'$obtenerTipo','$ancho','$alto','$obtenerImg','$obtenerUsuario','$obtener_id_actividad')";
				
					$ejecutarInsercion = $conexion->query($consultaInsercionImg) or die($conexion->error);
					if($ejecutarInsercion){
					
					$respuesta_ajax = "<p>Los datos fueron subidos con exito</p>";
					echo $respuesta_ajax;
					
					}else{
						
						$respuesta_ajax = "<p>Lo sentimos, hubo problemas con el servidor</p>";
						echo $respuesta_ajax;
					
					}
			}
		
		}else{
			$respuesta_ajax = "<p>Lo sentimos hubo problemas con el servidor</p>";
			echo $respuesta_ajax;		
		}
	
	}
?>