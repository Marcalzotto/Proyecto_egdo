<?php
	require_once("conexion.php");
	
	$respuesta_ajax = "";

	$opcion_disenio = $_POST["disenio_opcion"];

	if($opcion_disenio == 0){
		 
		 $respuesta_ajax = "<p>Lo sentimos hubo errores en la carga de los datos, por favor elije el disenio a subir.</p>";
		 echo $respuesta_ajax;
	
	}else if($_FILES["dis_frontal"]["error"] > 0){
		
		$respuesta_ajax = "<p>Lo sentimos hubo errores en la carga de los datos, por favor sube el disenio frontal.</p>";
		echo $respuesta_ajax;
	
	}else if($_FILES["vista_impresion"]["error"] > 0){
		
		$respuesta_ajax = "<p>Lo sentimos hubo errores en la carga de los datos, por favor sube el disenio de impresion.</p>";
		echo $respuesta_ajax;
	
	}else{
		
		$id_usuario_sube = 1;

		$usuarioYaSubioDisenio = "select d.codigo_tipo, c.descripcion from disenio as d join codigo_disenio as c 
		on d.codigo_tipo = c.codigo where d.id_usuario_subio = '$id_usuario_sube' and d.codigo_tipo = '$opcion_disenio'";

		$disenio = $conexion->query($usuarioYaSubioDisenio) or die($conexion->error);

		if($disenio){
			
			$hayRegistro = $disenio->num_rows;

				if($hayRegistro > 0){

					$obtenerRegistro = $disenio->fetch_array(MYSQLI_ASSOC);

					$obtenerDescripcion = $obtenerRegistro["descripcion"];

					$respuesta_ajax = "<p>Lo sentimos solo es valido subir 3 disenios por usuario: Buzo/campera, Remera, 
					Bandera, usted ya subio un disenio de ".$obtenerDescripcion." para esta votacion anteriormente.</p>"; 

					echo $respuesta_ajax;
				}else{

					/*Datos que corresponden a la imagen frontal del disenio*/

					$obtenerDimensionesFrontal = getimagesize($_FILES["dis_frontal"]["tmp_name"]);
					$anchoDeFrontal = $obtenerDimensionesFrontal[0];
					$altoDeFrontal = $obtenerDimensionesFrontal[1];

					$nombreArchFrontal = $_FILES["dis_frontal"]["tmp_name"];
					$obtenerContenidoFrontal = $conexion->real_escape_string(file_get_contents($_FILES["dis_frontal"]["tmp_name"]));
					$obtenerTipoArchFrontal = $_FILES["dis_frontal"]["type"];

					/*Datos que correponden a la imagen de impresion del disenio*/

					$obtenerDimensionesImpresion = getimagesize($_FILES["vista_impresion"]["tmp_name"]);
					$anchoDeImpresion = $obtenerDimensionesImpresion[0];
					$altoDeImpresion = $obtenerDimensionesImpresion[1];

					$nombreArchImpresion = $_FILES["vista_impresion"]["tmp_name"];
					$obtenerContenidoImpresion = $conexion->real_escape_string(file_get_contents($_FILES["vista_impresion"]["tmp_name"]));
					$obtenerTipoArchImpresion = $_FILES["vista_impresion"]["type"];

					$qry = "insert into disenio values('','$opcion_disenio','$obtenerContenidoFrontal','$anchoDeFrontal',
						'$altoDeFrontal','$nombreArchFrontal','$obtenerTipoArchFrontal','$obtenerContenidoImpresion',
						'$anchoDeImpresion','$altoDeImpresion','$nombreArchImpresion','$obtenerTipoArchImpresion','$id_usuario_sube',0)";
					
					if($conexion->query($qry)){
						
						$respuesta_ajax = "<p>Sus dise&ntilde;os fueron subidos con exito.";
						echo $respuesta_ajax;
					
					}else{

						$respuesta_ajax = "<p>Lo sentimos no se pudieron subir sus disenios, por favor intentelo nuevamente.</p>";
						echo $respuesta_ajax;

					}
				}

			}else{

					$respuesta_ajax = "<p>Lo sentimos hubo problemas con el servidor.</p>";
					echo $respuesta_ajax;			
	
			}
	}

	$conexion->close();
?>