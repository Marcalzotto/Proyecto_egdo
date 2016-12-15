<?php
include('../../bloqueSeguridad.php');
require_once('../conexion.php');

if($_POST){
		$b = 0; 
		$i = 0; 
		$id_disenio = filter_var($_POST["id"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
		$tipo_dis = filter_var($_POST["tipo"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
		
		/*se debe traer el usuario y el curso desde la sesion*/
		$user_voto_id = $_SESSION['id_usuario']; 
		$curso_sesion = $_SESSION['curso'];
		$buscarRol = "select id_rol from usuario where id_usuario = '$user_voto_id'";
		$getRol = $conexion->query($buscarRol) or die("Problemas con el servidor");
		$traerRol = $getRol->fetch_array(MYSQLI_ASSOC);
		$rol = $traerRol["id_rol"];
		if($rol == 2){ 

					$query = "SELECT id_disenio FROM disenio AS di JOIN usuario u ON di.id_usuario_subio = u.id_usuario 
					WHERE u.id_curso = '$curso_sesion' AND di.codigo_tipo = '$tipo_dis' AND di.votos_segunda_instancia IN(
					SELECT MAX(d.votos_segunda_instancia) FROM disenio AS d WHERE d.codigo_tipo = '$tipo_dis');";
		
					$resultSet = $conexion->query($query) or die("Problemas con el servidor");
					$cant_rows = $resultSet->num_rows;
					if($cant_rows > 1){
						while($reg = $resultSet->fetch_array(MYSQLI_ASSOC)){
							$vec[] = $reg;
						}

					while($b == 0) {
				
						$id_base = $vec[$i]["id_disenio"];
						if($id_disenio == $id_base){
							$id = $id_base;
							$b = 1;
						}
						$i++;
			
					}

					if($b == 0){
						echo -1;
					}else{
						
					$obtenerCantidadVotosSegundaInstancia = "select votos_segunda_instancia, actividad_disenio_id from disenio
				 as d join usuario as u on d.id_usuario_subio = u.id_usuario join actividad_disenio as ad on 
				 u.id_curso = ad.curso_pertenece_votacion where d.id_disenio = '$id' and u.id_curso = '$curso_sesion';";
					
				 $ejecutarQuery = $conexion->query($obtenerCantidadVotosSegundaInstancia);
				 		if($ejecutarQuery){
				 			
				 			$regVotos = $ejecutarQuery->fetch_array(MYSQLI_ASSOC);
				 			$cantidadVotos = $regVotos["votos_segunda_instancia"];

				 			$cantidadVotos = $cantidadVotos + 1;

				 			$actividad_disenio_num = $regVotos["actividad_disenio_id"];

				 			$actualizarVotosSegundaInstancia = "update disenio set votos_segunda_instancia = '$cantidadVotos' 
							where id_disenio = '$id'";

							$ejecutarActualizacion = $conexion->query($actualizarVotosSegundaInstancia);

							if($ejecutarActualizacion){
								$registrarVotoDesempate = "insert into votos values('','$user_voto_id','$id','$tipo_dis',2,'$actividad_disenio_num')";
								$insertarVoto = $conexion->query($registrarVotoDesempate);
								if(!$insertarVoto){
									echo -2;
								}else{
									echo $cantidadVotos;
								}
							}else{
								echo -2;
							}
				 		}else{
				 			echo -2;
				 		}
					}
				}else{
				echo -1;
				}
	
	}else{
		echo -3;
	}
}
?>