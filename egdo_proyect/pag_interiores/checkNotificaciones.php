<?php
include("../bloqueSeguridad.php");
include("conexion.php");
include("funciones/cantidad_notificaciones.php");	
$fechaHoy = new DateTime();
$curso = $_SESSION["curso"];
$usuario = $_SESSION["id_usuario"];
$num = rand(0,3);
	if($_POST){
		$check = $_POST["check"];
		
		if($check == true){//empieza if
			
			//Notificacion cuando el admin dispara el evento de disenio y cuando se pasa a votacion
		/*	$fecha_ins = $fechaHoy->format("Y-m-d H:i:s");
			$buscar_etapa2 = "select * from actividad_disenio where curso_pertenece_votacion = '$curso'";
	
			if($result = $conexion->query($buscar_etapa2)){
				if($result->num_rows > 0){
				//Si existe un evento de diseño para el curso x, se toma la fecha de apertura de ese evento.
				//Se verfica si existe la notificacion de que el evento fue lanzado para el curso x.
				$insertarNotificacion = "insert into notificaciones values('','La etapa de disenio ha iniciado.','Tee-Designer-master/index','../images/shirt.png','$curso','$fecha_ins',3)";
				$buscar_sinotificacion = "select count(id_notificacion) as cant from notificaciones where tipo_notificacion = 3 and curso_notificacion = '$curso'";

				$reg = $result->fetch_array(MYSQLI_ASSOC);
				$fecha_apertura  = new DateTime($reg["fecha_apertura"]);
				$fecha_segunda_instancia = new DateTime($reg["fecha_apertura"]);
			
					if($result = $conexion->query($buscar_sinotificacion)){
						$reg = $result->fetch_array(MYSQLI_ASSOC);
						$reg_cant = $reg["cant"];
							if($reg_cant == 0){
								if(!$result = $conexion->query($insertarNotificacion)){
								die("Error al insertar notificacion de disenio: ".$conexion->error);
								}
							}
					}else{
						die("Error al buscar notificacion disenio: ".$conexion->error);
					}	
				
				//se verifica se ha pasado una semana desde la etapa de diseño, de ser asi se lanza la notificacion
				//de que el sistema paso a votacion.
				$intervalo = $fechaHoy->diff($fecha_apertura);
				$intervaloAnio = $intervalo->y;
				$intervaloMes = $intervalo->m;
				$intervaloDias = $intervalo->d;
				$fecha_ins = $fechaHoy->format("Y-m-d H:i:s");
			
					if($intervaloAnio == 0 && $intervaloMes == 0 && $intervaloDias >= 7){
						$insertarNotificacion = "insert into notificaciones values('','La etapa de votacion ha iniciado.','votacion','../images/shirt.png','$curso','$fecha_ins',4)"; 
						$buscar_sinotificacion = "select count(id_notificacion) as cant from notificaciones where tipo_notificacion = 4 and curso_notificacion = '$curso'";
				
						if($result = $conexion->query($buscar_sinotificacion)){
							$reg_cant = $result->fetch_array(MYSQLI_ASSOC);
							$cant_notif = $reg_cant["cant"];
					
							if($cant_notif == 0){
						
								if(!$insertNotif = $conexion->query($insertarNotificacion)){
									die("Fallo al insertar la notificacion: ".$conexion->error);
								}
							}
						}else{
							die("Falla al buscar si ya existe una notificacion: ".$conexion->error);
						}
					}
				}
			}else{
				die("Fallo la busqueda de la fecha de apertura: ".$conexion->error);
			}
			
			//notificacion cuando hay diseños ganadores, se deben insertar 3 notificaciones
			//notificacion de diseños ganadores, y apertura de etapas 3 y 4

			if(isset($fecha_segunda_instancia)){

				$fecha_segunda_instancia->add(new dateInterval('P12D'));

				if($fechaHoy > $fecha_segunda_instancia){
			
					$buscarMaxBuzo = "select count(id_disenio) as ganadores from disenio as di join usuario u on di.id_usuario_subio = u.id_usuario 
					where u.id_curso = '$curso' and codigo_tipo = 1 and votos_segunda_instancia in(select max(d.votos_segunda_instancia) from disenio as d);";
		
					$buscarMaxRemera = "select count(id_disenio) as ganadores from disenio as di join usuario u on di.id_usuario_subio = u.id_usuario 
					where u.id_curso = '$curso' and codigo_tipo = 2 and votos_segunda_instancia in(select max(d.votos_segunda_instancia) from disenio as d);";
		
					$buscarMaxBandera = "select count(id_disenio) as ganadores from disenio as di join usuario u on di.id_usuario_subio = u.id_usuario 
					where u.id_curso = '$curso' and codigo_tipo = 3 and votos_segunda_instancia in(select max(d.votos_segunda_instancia) from disenio as d);";
			
					$fecha_ins2 = $fechaHoy->format("Y-m-d H:i:s");	
			
						if($result = $conexion->query($buscarMaxBuzo)){
				
						$reg_buzo = $result->fetch_array(MYSQLI_ASSOC);
						$maxBuzo = $reg_buzo["ganadores"];
						}else{
							die("Fallo la busqueda de Buzo de ganador: ".$conexion->error);
						}

						if($result = $conexion->query($buscarMaxRemera)){
							
							$reg_remera = $result->fetch_array(MYSQLI_ASSOC);
							$maxRemera = $reg_remera["ganadores"];
						}else{
							die("Fallo la busqueda del Remera de ganadora: ".$conexion->error);
						}

						if($result = $conexion->query($buscarMaxBandera)){
				
							$reg_bandera = $result->fetch_array(MYSQLI_ASSOC);
							$maxBandera = $reg_bandera["ganadores"];
						}else{
							die("Fallo la busqueda de la bandera: ".$conexion->error);
						}
				
						if($maxBuzo == 1 && $maxRemera == 1 && $maxBandera == 1){
							$buscar_sinotificacion = "";
							$buscar_sinotificacion = "select count(id_notificacion) as cantidad from notificaciones where tipo_notificacion = 5 or tipo_notificacion = 6 or tipo_notificacion = 7 and curso_notificacion = '$curso'"; 
					
							if($result = $conexion->query($buscar_sinotificacion)){
								$cant_notif = 0;
								$reg_cant = 0;
								$reg_cant = $result->fetch_array(MYSQLI_ASSOC); 
								$cant_notif = $reg_cant["cantidad"];

								if($cant_notif == 0){
							
								$insert_notificacion5 = "insert into notificaciones values('','La votacion termino, mira los disenios ganadores.','votacion','../images/shirt.png','$curso','$fecha_ins2',5);";
								$insert_notificacion6 = "insert into notificaciones values('','Ya puedes elegir tus talles de ropa.','votacion','../images/shirt.png','$curso','$fecha_ins2',6);";
								$insert_notificacion7 = "insert into notificaciones values('','Ya puedes elegir la empresa que confeccione tus disenios.','empresas','../images/empresas.png','$curso','$fecha_ins2',7);";
							
									if(!$result = $conexion->query($insert_notificacion5)){
										die("Fallo la insercion de la notificacion primera: ".$conexion->error);
									}

									if(!$result = $conexion->query($insert_notificacion6)){
										die("Fallo la insercion de la notificacion segunda: ".$conexion->error);
									}
							
									if(!$result = $conexion->query($insert_notificacion7)){
										die("Fallo la insercion de la notificacion tercera: ".$conexion->error);
									}
								}
							}
						}
				}
			}
			
			//consulta para traer la cantidad de notificaciones que no fueron vistas por el usuario logueado
			$cantidad = cantidad_notificaciones($conexion,$usuario,$curso);
			echo $cantidad;
	*/
			echo $num;
/*termina if*/	
		}else{
			echo -1;
		}
	}

?>