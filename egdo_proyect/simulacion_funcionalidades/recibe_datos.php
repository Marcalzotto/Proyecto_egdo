<?php
	
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
		
		$mysqli = new mysqli("localhost","root","","egdo_pruebas");
		if($mysqli->connect_errno){
			die("Error de conexion: ".$mysqli->connect_error);
		}

		/*Datos que corresponden a la imagen frontal del diseño*/
		
		$obtenerDimensionesFrontal = getimagesize($_FILES["dis_frontal"]["tmp_name"]);
		$anchoDeFrontal = $obtenerDimensionesFrontal[0];
		$altoDeFrontal = $obtenerDimensionesFrontal[1];

		$nombreArchFrontal = $_FILES["dis_frontal"]["tmp_name"];
		$obtenerContenidoFrontal = $mysqli->real_escape_string(file_get_contents($_FILES["dis_frontal"]["tmp_name"]));
		$obtenerTipoArchFrontal = $_FILES["dis_frontal"]["type"];

		/*Datos que correspondena la imagen de impresion del diseño*/

		$obtenerDimensionesImpresion = getimagesize($_FILES["vista_impresion"]["tmp_name"]);
		$anchoDeImpresion = $obtenerDimensionesImpresion[0];
		$altoDeImpresion = $obtenerDimensionesImpresion[1];

		$nombreArchImpresion = $_FILES["vista_impresion"]["tmp_name"];
		$obtenerContenidoImpresion = $mysqli->real_escape_string(file_get_contents($_FILES["vista_impresion"]["tmp_name"]));
		$obtenerTipoArchImpresion = $_FILES["vista_impresion"]["type"];

		$id_usuario_sube = 1;

		$qry = "insert into disenio values('','$opcion_disenio','$obtenerContenidoFrontal','$anchoDeFrontal',
			'$altoDeFrontal','$nombreArchFrontal','$obtenerTipoArchFrontal','$obtenerContenidoImpresion',
			'$anchoDeImpresion','$altoDeImpresion','$nombreArchImpresion','$obtenerTipoArchImpresion','$id_usuario_sube',0)";

		if($mysqli->query($qry)){
			$respuesta_ajax = "<p>Los datos fueron subidos con exito.</p>";
			echo $respuesta_ajax;
		}else{

			$respuesta_ajax = "<p>Hubo problemas con el servidor: ".die($mysqli->error)."</p>";
			echo $respuesta_ajax;

		}


	

	}

	


?>