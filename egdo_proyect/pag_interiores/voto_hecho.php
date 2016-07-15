<?php
include ("../bloqueSeguridad.php");
require_once("conexion.php");


if($_POST){

	$id_disenio = filter_var($_POST["id"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
	$tipo_dis = filter_var($_POST["tipo"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
	
	/*Se deberia obtener tanto el usuario como el curso desde la sesion*/
	$user_voto_id = $_SESSION['id_usuario'];
	$curso_sesion = $_SESSION['curso']; 

	$votoCincoVeces = "select count(voto) as cantidad from votos where id_usuario_voto = '$user_voto_id' 
	and tipo_disenio = '$tipo_dis'";
	
	$resultanteVotos =  $conexion->query($votoCincoVeces);

	if($resultanteVotos){

		$votos = $resultanteVotos->fetch_array(MYSQLI_ASSOC);
		$cantidadVotos = $votos["cantidad"];
		
		if($cantidadVotos < 5){

			$verificarSiYaVoto = "select count(voto) as votos_hechos from votos where id_usuario_voto = '$user_voto_id' 
			and disenio_votado = '$id_disenio'";

			/*La consulta verifica si existen votos de este usuario para el disenio $id_disenio*/

			$obtenerConjunto = $conexion->query($verificarSiYaVoto) or die($conexion->error);
			if($obtenerConjunto){

				$obtenerRegistros = $obtenerConjunto->fetch_array(MYSQLI_ASSOC);
				$cantidadParaEste = $obtenerRegistros["votos_hechos"];

				if($cantidadParaEste == 0){

					$buscarVotacionParaVoto = "select votacion_pertenece from disenio where id_disenio = '$id_disenio'";
					$obtenerNumeroVotacion = $conexion->query($buscarVotacionParaVoto) or die($conexion->error);
					
					if($obtenerNumeroVotacion){

						$regNumeroVotacion = $obtenerNumeroVotacion->fetch_array(MYSQLI_ASSOC);
						$numeroVotacionVoto = $regNumeroVotacion["votacion_pertenece"]; 
					
						$registrar_voto = "insert into votos values('','$user_voto_id','$id_disenio','$tipo_dis',1,
							'$numeroVotacionVoto')";
						
						$conexion->query($registrar_voto) or die($conexion->error);

						$traerCantidadVotos = "select cantidad_votos from disenio where id_disenio = '$id_disenio'";
						$registro = $conexion->query($traerCantidadVotos) or die($conexion->error);

						$arrayRegistros = $registro->fetch_array(MYSQLI_ASSOC);
						$cantidadActual = $arrayRegistros["cantidad_votos"];
						$cantidadActual = $cantidadActual + 1;

						$actualizarCantidadVotos = "update disenio set cantidad_votos = '$cantidadActual' where id_disenio = '$id_disenio'";
						$conexion->query($actualizarCantidadVotos) or die($conexion->error);

						echo $cantidadActual;

					}else{
						echo -2;
					}
					
				
				}else{
					$errorVotoRepetido = -1;
					echo $errorVotoRepetido;
				}	

			}else{
				$errorServidor = -2;
				echo $errorServidor;
			}

		}else{
			$errorMasDeCincoVotos = -3;
			echo $errorMasDeCincoVotos;
		}

	}else{
		/*devolver de error de consulta*/
		$errorServidor = -2;
		echo $errorServidor;

	}	
}
?>