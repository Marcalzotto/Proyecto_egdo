<?php

function generar_notificacion($conexion,$curso){

date_default_timezone_set('America/Argentina/Buenos_Aires');
	$fechaHoy = new DateTime();
	
	//agregar notificacion de bienvenida 
	$fecha_ins = "";
	$fecha_ins = $fechaHoy->format("Y-m-d H:i:s");
	$cant;
	$reg_cant;
	$verficarBienvenida = "select count(id_notificacion) as cant from notificaciones where tipo_notificacion = 1 and curso_notificacion = '$curso'";
	
	if($result = $conexion->query($verficarBienvenida)){
		
		$reg_cant = $result->fetch_array(MYSQLI_ASSOC);
		$cant = $reg_cant["cant"];
		
		if($cant == 0){
			$insertarNotificacion = "insert into notificaciones values('','Bienvenido a Egdo.','#','../images/avatar_64.png','$curso','$fecha_ins',1);";
			
			if(!$result = $conexion->query($insertarNotificacion)){
				die("hubo problemas al insertar una notificacion: ".$conexion->error);
			}
		
		}
	}else{
		die("Error al buscar una notificacion: ".$conexion->error);
	}
	//usar unset() para destruir variables
	//notificacion de que hay lugares turisticos
	$verificarLugaresTuristicos = "select count(id_notificacion) as cant from notificaciones where tipo_notificacion = 2 and curso_notificacion = '$curso'";
	unset($reg_cant,$cant,$insertarNotificacion);
	
	if($result = $conexion->query($verificarLugaresTuristicos)){
		$reg_cant = $result->fetch_array(MYSQLI_ASSOC);
		$cant = $reg_cant["cant"];
	
		if($cant == 0){
			$insertarNotificacion = "insert into notificaciones values('','Hay lugares que podrían interesarte para tu viaje.','infoviaje','../images/bus.png','$curso','$fecha_ins',2);";
		
			if(!$result = $conexion->query($insertarNotificacion)){
				die("Error al insertar notificacion lugares turisicos: ".$conexion->error);
			}
		}
	}else{
		die("Error la buscar notificacion lugares turisticos: ".$conexion->error);
	}

	//Notificacion cuando el admin dispara el evento de disenio y cuando se pasa a votacion
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
				//se verifica se ha pasado una semana desde la etapa de diseño, de ser asi se lanza la notifcacion
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
											where u.id_curso = '$curso' and codigo_tipo = 1 and votos_segunda_instancia in(
																													select max(d.votos_segunda_instancia) from disenio as d);";
		
		$buscarMaxRemera = "select count(id_disenio) as ganadores from disenio as di join usuario u on di.id_usuario_subio = u.id_usuario 
											where u.id_curso = '$curso' and codigo_tipo = 2 and votos_segunda_instancia in(
																													select max(d.votos_segunda_instancia) from disenio as d);";
		
		$buscarMaxBandera = "select count(id_disenio) as ganadores from disenio as di join usuario u on di.id_usuario_subio = u.id_usuario 
											where u.id_curso = '$curso' and codigo_tipo = 3 and votos_segunda_instancia in(
																													select max(d.votos_segunda_instancia) from disenio as d);";
			
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
	
	//notificacion de cuando se lanza la propuesta de lugares para fiesta
	//junto con verficacion de finalizacion de plazo para subir lugares, si quedan 5 para finalizar
	$buscar_fiesta_lanzado = "select * from evento where id_actividad = 3 and id_curso = '$curso'";
	if($result = $conexion->query($buscar_fiesta_lanzado)){
		if($result->num_rows > 0){
			$reg = $result->fetch_array(MYSQLI_ASSOC);
			$fecha_fiesta = new datetime($reg["fecha_hora"]);
			$buscar_sinotificacion = "select count(id_notificacion) as cantidad from notificaciones where tipo_notificacion = 12 and curso_notificacion = '$curso'";
			
			if($result = $conexion->query($buscar_sinotificacion)){
				$reg = $result->fetch_array(MYSQLI_ASSOC);
				$cantidad = $reg["cantidad"];
				
				if($cantidad == 0){
					
					$insertarNotificacion = "insert into notificaciones values('','Ya puedes empezar a proponer tu lugar para la fiesta de egresados.','fiesta','../images/fiesta_egdo.png','$curso','$fecha_ins',12)";
					if(!$result = $conexion->query($insertarNotificacion)){
						die("Falla al crear notificacion: ".$conexion->error);	
					}
				}else{
					$intervalo = $fechaHoy->diff($fecha_fiesta);
					$intervaloAnio = $intervalo->y;
					$intervaloMes = $intervalo->m;
					$intervaloDias = $intervalo->d;
					if($intervaloAnio == 0 && $intervaloMes == 0 && ($intervaloDias >= 10 && $intervaloDias < 15)){
						$buscar_sinotificacion = "select count(id_notificacion) as cantidad from notificaciones where tipo_notificacion = 13 and curso_notificacion = '$curso'";
						if($result = $conexion->query($buscar_sinotificacion)){
								$reg = $result->fetch_array(MYSQLI_ASSOC);
								$cantidad = $reg["cantidad"];
								if($cantidad == 0){
									$insertarNotificacion = "insert into notificaciones values('','Ya propusiste lugar para la fiesta? Sino lo hiciste hacelo quedan 5 dias o menos.','fiesta','../images/fiesta_egdo.png','$curso','$fecha_ins',13)";
									if(!$result = $conexion->query($insertarNotificacion)){
										die("Error al insertar notifcacion advertencia fiesta: ".$conexion->error);
									}
								}
						}else{
							die("Error al buscar finalizacion de dias fiesta: ".$conexion->error);
						}
					}
				}
			}else{
				die("Falla al buscar notificacion fiesta: ".$conexion->error);
			}
			
		}
	}else{
		die("Error al buscar el evento fiesta: ".$conexion->error);
	}

	//notificacion de cuando se lanza la propuesta de lugares para upd
	//junto con verficacion de finalizacion de plazo para subir lugares, si quedan 5 para finalizar
	$buscar_upd_lanzado = "select * from evento where id_actividad = 2 and id_curso = '$curso'";
	if($result = $conexion->query($buscar_upd_lanzado)){
		if($result->num_rows > 0){
			$reg = $result->fetch_array(MYSQLI_ASSOC);
			$fecha_upd = new datetime($reg["fecha_hora"]);
			$buscar_sinotificacion = "select count(id_notificacion) as cantidad from notificaciones where tipo_notificacion = 8 and curso_notificacion = '$curso'";
			
			if($result = $conexion->query($buscar_sinotificacion)){
				$reg = $result->fetch_array(MYSQLI_ASSOC);
				$cantidad = $reg["cantidad"];
				
				if($cantidad == 0){
					
					$insertarNotificacion = "insert into notificaciones values('','Ya puedes empezar a proponer tu lugar para el UPD.','upd','../images/upd.png','$curso','$fecha_ins',8)";
					if(!$result = $conexion->query($insertarNotificacion)){
						die("Falla al crear notificacion: ".$conexion->error);	
					}
				}else{
					$intervalo = $fechaHoy->diff($fecha_upd);
					$intervaloAnio = $intervalo->y;
					$intervaloMes = $intervalo->m;
					$intervaloDias = $intervalo->d;
					if($intervaloAnio == 0 && $intervaloMes == 0 && ($intervaloDias >= 10 && $intervaloDias < 15)){
						$buscar_sinotificacion = "select count(id_notificacion) as cantidad from notificaciones where tipo_notificacion = 9 and curso_notificacion = '$curso'";
						if($result = $conexion->query($buscar_sinotificacion)){
								$reg = $result->fetch_array(MYSQLI_ASSOC);
								$cantidad = $reg["cantidad"];
								if($cantidad == 0){
									$insertarNotificacion = "insert into notificaciones values('','Ya propusiste lugar para el UPD? Sino lo hiciste hacelo quedan 5 dias o menos.','upd','../images/upd.png','$curso','$fecha_ins',9)";
									if(!$result = $conexion->query($insertarNotificacion)){
										die("Error al insertar notifcacion advertencia upd: ".$conexion->error);
									}
								}
						}else{
							die("Error al buscar finalizacion de dias upd: ".$conexion->error);
						}
					}
				}
			}else{
				die("Falla al buscar notificacion upd: ".$conexion->error);
			}
			
		}
	}else{
		die("Error al buscar el evento upd: ".$conexion->error);
	}

	//notificacion de comienzo de calificacion para lugares de upd
	//notificacion de lugar ganador upd
	if($result = $conexion->query($buscar_upd_lanzado)){
		$reg = $result->fetch_array(MYSQLI_ASSOC);
		$fecha_upd = new DateTime($reg["fecha_hora"]);

		$intervalo = $fechaHoy->diff($fecha_upd);
		if($intervalo->d >= 15 && $intervalo->d < 22){
			$buscar_sinotificacion = "select count(id_notificacion) as cant from notificaciones where tipo_notificacion = 10 and curso_notificacion = '$curso'";
			if($result = $conexion->query($buscar_sinotificacion)){
				$reg = $result->fetch_array(MYSQLI_ASSOC);
				$cant = $reg["cant"];
				if($cant == 0){
					$insertarNotificacion = "insert into notificaciones(resumen,link,icono,curso_notificacion,fecha_hora,tipo_notificacion) 
																	 values('Ya puedes comenzar a calificar los lugares para el UPD','upd.php','../images/calificacion.png','$curso','$fecha_ins',10)";
					if(!$result = $conexion->query($insertarNotificacion)){
						die("Error al crear notificacion");
					}

				}
			}else{
				die("error al buscar la notificacion de calificacion upd");
			}
		}else if($intervalo->y > 0 || $intervalo->m > 0 || $intervalo->d >= 22){
				$buscarMaximosUpd = "select * from upd where id_curso = '$_SESSION[curso]' and calificacion = (
												 		 select max(calificacion) from upd)";
				
				if($result = $conexion->query($buscarMaximosUpd)){
					if($result->num_rows == 1){
						$buscar_sinotificacion = "select count(id_notificacion) as cant from notificaciones where tipo_notificacion = 11 and curso_notificacion = '$curso'";
						if($result = $conexion->query($buscar_sinotificacion)){
							$reg = $result->fetch_array(MYSQLI_ASSOC);
							$cant = $reg["cant"];
							if($cant == 0){
								$insertarNotificacion = "insert into notificaciones(resumen,link,icono,curso_notificacion,fecha_hora,tipo_notificacion) 
																	 values('Termino la calificacion de lugares UPD, mira el lugar ganador.','upd.php','../images/winner.png','$curso','$fecha_ins',11)";
								if(!$result = $conexion->query($insertarNotificacion)){
									die("Error al crear la noticacion lugar ganador upd");
								}
							}
						}else{
							die("Fallo al buscar la notificacion");
						}
					}
				}else{
					die("error al buscar los maximos upd");
				}
		}

	}else{
		die("Error al buscar la fecha");
	}

	//notificacion de comienzo de calificacion para lugares de fiesta egdo
	//notificacion de lugar ganador fiesta egdo
	if($result = $conexion->query($buscar_fiesta_lanzado)){
		$reg = $result->fetch_array(MYSQLI_ASSOC);
		$fecha_fiesta = new DateTime($reg["fecha_hora"]);

		$intervalo = $fechaHoy->diff($fecha_fiesta);
		if($intervalo->d >= 15 && $intervalo->d < 22){
			$buscar_sinotificacion = "select count(id_notificacion) as cant from notificaciones where tipo_notificacion = 14 and curso_notificacion = '$curso'";
			if($result = $conexion->query($buscar_sinotificacion)){
				$reg = $result->fetch_array(MYSQLI_ASSOC);
				$cant = $reg["cant"];
				if($cant == 0){
					$insertarNotificacion = "insert into notificaciones(resumen,link,icono,curso_notificacion,fecha_hora,tipo_notificacion) 
																	 values('Ya puedes comenzar a calificar los lugares para la fiesta de egresados','fiesta.php','../images/calificacion.png','$curso','$fecha_ins',14)";
					if(!$result = $conexion->query($insertarNotificacion)){
						die("Error al crear notificacion");
					}

				}
			}else{
				die("error al buscar la notificacion de calificacion fiesta");
			}
		}else if($intervalo->y > 0 || $intervalo->m > 0 || $intervalo->d >= 22){
				$buscarMaximosFiesta = "select * from fiesta where id_curso = '$_SESSION[curso]' and calificacion = (
												 		 select max(calificacion) from fiesta)";
				
				if($result = $conexion->query($buscarMaximosFiesta)){
					if($result->num_rows == 1){
						$buscar_sinotificacion = "select count(id_notificacion) as cant from notificaciones where tipo_notificacion = 15 and curso_notificacion = '$curso'";
						if($result = $conexion->query($buscar_sinotificacion)){
							$reg = $result->fetch_array(MYSQLI_ASSOC);
							$cant = $reg["cant"];
							if($cant == 0){
								$insertarNotificacion = "insert into notificaciones(resumen,link,icono,curso_notificacion,fecha_hora,tipo_notificacion) 
																	 values('Termino la calificacion de lugares para la fiesta EGDO, mira el lugar ganador.','fiesta.php','../images/winner.png','$curso','$fecha_ins',15)";
								if(!$result = $conexion->query($insertarNotificacion)){
									die("Error al crear la noticacion lugar ganador fiesta");
								}
							}
						}else{
							die("Fallo al buscar la notificacion");
						}
					}
				}else{
					die("error al buscar los maximos fiesta");
				}
		}

	}else{
		die("Error al buscar la fecha");
	}



}//aca termina la funcion		

?>