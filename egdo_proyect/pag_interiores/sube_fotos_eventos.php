<?php include ("../bloqueSeguridad.php");


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

		
		$obtenerUsuario = $_SESSION['id_usuario'];
		
		$obtener_curso = $_SESSION['curso']; 
		
		$evento = $evento + 1;
		/*se le suma 1 por el modo en que se insertaron en la base las actividades*/
		$obtener_id_actividad = $evento;

		switch ($evento) {
			case '2':
				$nombreEvento = "UPD";
				break;
			
			case '3':
				$nombreEvento = "Fiesta de Egresados";
				break;

				case '4':
				$nombreEvento = "Viaje de Egresados";
				break;

			default:
				$nombreEvento = "";
				break;
		}

		
		$buscarSiSubioDosFotos = "select count(id_imagen) as cantidad from imagen where id_usuario = '$obtenerUsuario' 
		and id_actividad = '$evento'";
		$resultadoBusqueda = $conexion->query($buscarSiSubioDosFotos) or die($conexion->error);

		if($resultadoBusqueda){
			
			$obtenerCantidadFotos = $resultadoBusqueda->fetch_array(MYSQLI_ASSOC);
			$cantidad = $obtenerCantidadFotos["cantidad"];
			
			if($cantidad > 1){
				$respuesta_ajax = "<p>Lo sentimos solo se permiten 2 fotos maximo por usuario para el $nombreEvento</p>";
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
																'$obtenerTipo','$ancho','$alto','$obtenerImg',1,$obtener_curso,'$obtenerUsuario','$obtener_id_actividad')";
				
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
	$conexion->close();
?>