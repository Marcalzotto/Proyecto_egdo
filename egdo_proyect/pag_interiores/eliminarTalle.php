<?php
require_once("../bloqueSeguridad.php");
require_once("conexion.php");
	
	
	if($_POST){

		$numeroError = "cero";
		$queryQueborro = "";
		$delete = "";
		$b = 0;
		$talleEliminarBuzo = $_POST["buzo"];
		$talleEliminarRemera = $_POST["remera"];

		if($talleEliminarBuzo == "" && $talleEliminarRemera == ""){
			$numeroError = "uno";
			echo $numeroError; //Por favor tilda la casilla del talle a eliminar
		}else{
			if($talleEliminarBuzo != "" && $talleEliminarRemera != ""){
				$b = 0;
			}else if($talleEliminarBuzo != ""){
				$b = 1;
			}else{
				$b = 2;
			}

			$query = "select count(usuario) from talles_curso where usuario = '$_SESSION[id_usuario]' and curso = '$_SESSION[curso]'";
			$resultSet = $conexion->query($query);
			if($resultSet){
				if($resultSet->num_rows > 0){
					switch ($b){
						case 1:
							$queryQueborro = "select talle_buzo from talles_curso where usuario = '$_SESSION[id_usuario]'";
							$res = $conexion->query($queryQueborro);
							if($res){
								$talleBuzoResult = $res->fetch_array(MYSQLI_ASSOC);
								$talleBuzoActual = $talleBuzoResult["talle_buzo"];
								
								if($talleBuzoActual != 'N/D'){
									$delete = "update talles_curso set talle_buzo = 'N/D' where usuario = '$_SESSION[id_usuario]'";
									
								}
							}else{
								$numeroError = "cuatro";
								echo $numeroError;
							}
						break;
						case 2:
							$queryQueborro = "select talle_remera from talles_curso where usuario = '$_SESSION[id_usuario]'";
							$res = $conexion->query($queryQueborro);
							if($res){
								$talleRemeraResult = $res->fetch_array(MYSQLI_ASSOC);
								$talleRemeraActual = $talleRemeraResult["talle_remera"];
								if($talleRemeraActual != 'N/D'){
									$delete = "update talles_curso set talle_remera = 'N/D' where usuario = '$_SESSION[id_usuario]'";
								}
							}else{
								$numeroError = "cuatro";
								echo $numeroError;
							}
						break;
						default:
							$queryQueborro = "select talle_buzo, talle_remera from talles_curso where usuario = '$_SESSION[id_usuario]'";
							$res = $conexion->query($queryQueborro);
							if($res){
								$tallesResult = $res->fetch_array(MYSQLI_ASSOC);
								$talleBuzoActual = $tallesResult["talle_buzo"];
								$talleRemeraActual = $tallesResult["talle_remera"];
								if($talleBuzoActual != 'N/D' && $talleRemeraActual != 'N/D'){
									$delete = "update talles_curso set talle_buzo = 'N/D', talle_remera = 'N/D' where usuario = '$_SESSION[id_usuario]'";
								}else if($talleBuzoActual != 'N/D'){
									$delete = "update talles_curso set talle_buzo = 'N/D' where usuario = '$_SESSION[id_usuario]'";
								}else if($talleRemeraActual != 'N/D'){
									$delete = "update talles_curso set talle_remera = 'N/D' where usuario = '$_SESSION[id_usuario]'";
								}
							}else{
								$numeroError = "cuatro";
								echo $numeroError;
							}
							break;
					}

						if($delete != ""){
							$deleted = $conexion->query($delete);
							if($deleted){
								$buscar = "select talle_buzo, talle_remera from talles_curso where usuario = '$_SESSION[id_usuario]' and curso = '$_SESSION[curso]'";
								$resultante = $conexion->query($buscar);
								if($resultante){
									$talles = $resultante->fetch_array(MYSQLI_ASSOC);
									$buzo = $talles["talle_buzo"];
									$remera = $talles["talle_remera"];
									echo $buzo."-".$remera;
								}else{
									$numeroError = "cuatro";
									echo $numeroError;
								}
							
							}else{
								$numeroError;
								echo $numeroError; //Hubo problemas para realizar la operacion, intenta nuevamente mas tarde
							}
						}else{
							$numeroError = "dos";
							echo $numeroError;
						}	


				}else{
					$numeroError = "dos";
					echo $numeroError; //No tienes ningun talle para eliminar
				}
			}else{
				$numeroError = "tres";
				echo $numeroError; //Lo sentimos hubo problemas internos, por favor intenta mas tarde;
			}
		}
	}
?>