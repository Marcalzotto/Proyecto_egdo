<?php
	session_start();

	require_once("conexion.php");

	if($_POST){
		
		$id_disenio = filter_var($_POST["id"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
		$tipo_dis = filter_var($_POST["tipo"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
		
		/*se debe traer el usuario y el curso desde la sesion*/
		$user_voto_id = 2; 
		$curso_sesion = 1;
		$buscarVotoSegundaInstancia = "select * from votos where tipo_disenio = '$tipo_dis' 
		and id_usuario_voto = '$user_voto_id' and instancia_voto = 2";

		$resultadoVotoSegundaInstancia = $conexion->query($buscarVotoSegundaInstancia) or die($conexion->error);
		
		if($resultadoVotoSegundaInstancia){
			
			$hayVotos = $resultadoVotoSegundaInstancia->num_rows;

			if($hayVotos > 0){
				echo -1;
			}else{
				$buscarCantidadVotosSegundaInstancia = "select votos_segunda_instancia, votacion_pertenece from disenio where 
				id_disenio = '$id_disenio'";
				
				$obtenerCantidadVotosDisenio = $conexion->query($buscarCantidadVotosSegundaInstancia) or die($conexion->error);
				if($obtenerCantidadVotosDisenio){
					
					$cantidadVotos = $obtenerCantidadVotosDisenio->fetch_array(MYSQLI_ASSOC);
					$cantidad = $cantidadVotos["votos_segunda_instancia"];

					$cantidad = $cantidad + 1;

					$numVotacion = $cantidadVotos["votacion_pertenece"];

					$actualizarVotosSegundaInstancia = "update disenio set votos_segunda_instancia = '$cantidad' 
					where id_disenio = '$id_disenio'";
					$ejecutarActualizacion = $conexion->query($actualizarVotosSegundaInstancia) or die($conexion->error);
					
					if($ejecutarActualizacion){
						
						$registrarVoto = "insert into votos values('','$user_voto_id','$id_disenio','$tipo_dis',2,'$numVotacion')";
						$insertarVoto = $conexion->query($registrarVoto) or die($conexion->error);
						
						if(!$insertarVoto){
							echo -2;
						}else{
							echo $cantidad;
						}

					}else{
						echo -2;
					}


				}else{
					echo -2;
				}

				
			}
		}
		
	}

?>