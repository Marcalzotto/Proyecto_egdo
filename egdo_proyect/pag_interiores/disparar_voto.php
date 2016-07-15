<?php
include ("../bloqueSeguridad.php");

	require_once("conexion.php");
	
	
	if($_POST){

		$num = $_POST["num"];

		$usuario_dispara = $_SESSION['id_usuario'];
		/*usuario que viene por la sesion cambiar luego*/
		$curso_pertenece = $_SESSION['curso']; 
		/*id de curso buscar en la base o tomar por sesion*/
		$buscarActividad = "select id_actividad from actividad where id_actividad = 1";
		$buscarNumeroActividad = $conexion->query($buscarActividad) or die($conexion->error);

		if($buscarNumeroActividad){
			$obtenerReg = $buscarNumeroActividad->fetch_array(MYSQLI_ASSOC);
			$tipo_actividad = $obtenerReg["id_actividad"]; 
		}else{
			
			header('location:votacionAdminCurso.php');
		}
		
		/* 1 en caso de ser la votacion*/

		$buscarSiAbrioVotacion = "select count(id_votacion) as cantidad from votacion where 
		curso_pertenece_votacion = '$curso_pertenece' and tipo_actividad = '$tipo_actividad'";

		$ejecutarConsulta = $conexion->query($buscarSiAbrioVotacion) or die($conexion->error);
		if($ejecutarConsulta){
			$traerRegistro = $ejecutarConsulta->fetch_array(MYSQLI_ASSOC);

			$hayVotacionAbierta = $traerRegistro["cantidad"];

			if($hayVotacionAbierta > 0){
				echo "No puedes abrir mas votaciones de indumentaria para este curso";
			}else{

				$fechaApertura = new datetime(null, new DateTimeZone("America/Argentina/Buenos_Aires"));
				$fecha = $fechaApertura->format('Y-m-d H:i:s');

				$vigente = 1;
				/*estado de votacion 1 es que esta vigente 0 no esta vigente;*/
				$consultaDispararVotacion = "insert into votacion values('','$fecha','$vigente','$tipo_actividad',
				'$usuario_dispara','$curso_pertenece','$usuario_dispara')";

				$resultadoConsulta = $conexion->query($consultaDispararVotacion) or die($conexion->error);

				if($resultadoConsulta){
					echo "La votacion ha sido abierta";
				}else{
					echo "Lo sentimos hubo problemas con el servidor";
				}

			}
		}else{
			echo "Lo sentimos hubo problemas con el servidor";
		}

	}
?>