<?php
	include("conexion.php");
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	if($_POST){
		$empresa = base64_decode($_POST["empresa"]);
		$user = base64_decode($_POST["user"]);
		$patter_num = '[^0-9]';
		$patter_coment = '[<>&]';
		//$id_empresa = filter_var($empresa, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
		//$id_usuario = filter_var($user, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
		//$comentario = filter_var($_POST["comentario"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
		$id_empresa = ereg_replace($patter_num, '', $empresa);
		$id_usuario = ereg_replace($patter_num, '', $user);
		$comentario = ereg_replace($patter_coment, '', $_POST["comentario"]);
		
		$fecha_comentario = new DateTime();
		$fecha_insertar = $fecha_comentario->format("Y-m-d H:i");
		$fecha = $fecha_comentario->format("Y-m-d");
		$tiempo = $fecha_comentario->format("H:i");
		$fecha_separar = explode("-", $fecha);
		$aaaa = $fecha_separar[0];
		$mm = $fecha_separar[1];
		$dd = $fecha_separar[2];

		$buscarEmpresa = "select count(id_empresa) as datos from empresa where id_empresa = '$id_empresa';
											select count(id_usuario) as datos from usuario where id_usuario = '$id_usuario';
											select nombre as datos from usuario where id_usuario = '$id_usuario';";

		if ($conexion->multi_query($buscarEmpresa)) {
    	
    	do{
        /* almacenar primer juego de resultados */
        if ($result = $conexion->store_result()) {
            while ($row = $result->fetch_array(MYSQLI_ASSOC)){
                $vec[] = $row;
                //printf("%s\n", $row[0]);
            }
            $result->free();
        }
        /* mostrar divisor */
        if ($conexion->more_results()) {
            //printf("-----------------\n");
        }
    	}while ($conexion->next_result());
			
		}

		if($vec[0]["datos"] == 1 && $vec[1]["datos"] == 1){
			
			$insertarComentario = "insert into comentario_empresas(comentario,id_empresa,id_usuario,fecha) values('$comentario','$id_empresa','$id_usuario','$fecha_insertar')";

			$resultSet = $conexion->query($insertarComentario);
			if($resultSet){

				$datos = $vec[2]["datos"]."-".$comentario."-".$aaaa."-".$mm."-".$dd."-".$tiempo;
				echo $datos;
			
			}else{
				echo $conexion->error;
			}
			//$resultSet->close();
		}else{
			echo -1;
		}

	$conexion->close();
	}
?>