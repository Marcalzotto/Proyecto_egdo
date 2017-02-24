<?php
include("../conexion.php");
include("../../bloqueSeguridad.php");
include("../funciones/calcular_calificacion_upd_fiesta.php");
$exp_reg = '/[^0-9]/';
if($_POST){
	$usuario = $_SESSION["id_usuario"];
	$valor = $_POST["valor"];
	$lugar = $_POST["lugar"];

		if(preg_match($exp_reg,$valor)){
			echo 1;//error los datos recibidos deben ser numericos
		}else if(preg_match($exp_reg,$lugar)){
			echo 1;
		}else if($valor <= 0 || $valor > 5){
			echo 2;//error los datos recibidos son erroneos 
		}else if($lugar <= 0){
			echo 2;
		}else{
				$verificarFecha = "select fecha_hora from evento where id_actividad = 3 and id_curso = $_SESSION[curso]"; 
				if($result = $conexion->query($verificarFecha)){
					if($result->num_rows > 0){
						$reg = $result->fetch_array(MYSQLI_ASSOC);
						$fecha = $reg["fecha_hora"];
						$fechahoy = new DateTime();
						$fechaEvento = new DateTime($fecha);

						$intervalo = $fechahoy->diff($fechaEvento);
						$intervalA = $intervalo->y;
						$intervalM = $intervalo->m;
						$intervalD = $intervalo->d;

						if($intervalA > 0 || $intervalM > 0 || $intervalD >=22){
								$buscar_maximos = "select * from fiesta where id_curso = '$_SESSION[curso]' and calificacion = (
								select max(calificacion) from fiesta)";
								if($result = $conexion->query($buscar_maximos)){
										$maximos = $result->num_rows;
										
										if($maximos > 1){
											if($_SESSION["id_rol"] < 3){
												$insertarCalificacion = "insert into calificacion_fiesta(id_usuario,valor,id_lugar) values('$usuario','$valor','$lugar');";
													if($result = $conexion->query($insertarCalificacion)){
													$calificacion = calcular($conexion,$lugar,"fiesta");
													$actualizar_calificacion = "update fiesta set calificacion = '$calificacion' where id_fiesta = '$lugar'";
														if($result = $conexion->query($actualizar_calificacion)){
															echo 6;//voto registrado
														}else{
															echo 3;//error de servidor
														}
													}else{
														echo 3;//error de servidor
													}
											}else{
												echo 9;//solo el administrador puede desempatar
											}

										}else{
											echo 8;//ya existe un ganador no es necesario votar
										}
								}else{//if maximos 
									echo 3;//error se servidor
								}	
							}else{

								$buscarSiVotoTresLugares = "select count(id_lugar) as cant from calificacion_fiesta where id_usuario = '$usuario'";
								if($result = $conexion->query($buscarSiVotoTresLugares)){
									$reg = $result->fetch_array(MYSQLI_ASSOC);
									$cantidad = $reg["cant"];
									if($cantidad < 3){
										$verSiVotoEseLugar = "select count(id_lugar) as cant from calificacion_fista where id_lugar = '$lugar' and id_usuario = '$usuario'";
										if($result = $conexion->query($verSiVotoEseLugar)){
											$reg = $result->fetch_array(MYSQLI_ASSOC);
											$cantidad = $reg["cant"];
												if($cantidad > 0){
													echo 5;// error ya voto este lugar
												}else{
													$insertarCalificacion = "insert into calificacion_fista(id_usuario,valor,id_lugar) values('$usuario','$valor','$lugar');";
													if($result = $conexion->query($insertarCalificacion)){
														$calificacion = calcular($conexion,$lugar,"fista");
														$actualizar_calificacion = "update fista set calificacion = '$calificacion' where id_fista = '$lugar'";
														if($result = $conexion->query($actualizar_calificacion)){
															echo 6;//voto registrado
														}else{
															echo 3;//
														}
													}else{
														echo 3;//error de servidor
													}
												}
										}else{
											echo 3;//error de servidor
										}
									}else{
										echo 4;//error ya voto 3 tres lugares
									}
								}else{
									echo 3;//error de servidor
								}
							}//fin else votacion normal de una semana	
							
					}else{
						echo 7;//el evento no fue disparado;
					}		
				}else{//fin if verifica fecha
					echo 3;
				}
		}
}
?>