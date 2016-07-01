<?php

$mysqli = new mysqli("localhost","root","","egdo_pruebas");
if($mysqli->connect_errno){
	die("Error al conectar: ".$mysqli->connect_error);
}



if($_POST){

	$id_disenio = filter_var($_POST["id"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
	$tipo_dis = filter_var($_POST["tipo"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
	$user_voto_id = 1; 


	$verificarSiYaVoto = "select count(voto) as votos_hechos from votos where id_usuario_voto = '$user_voto_id' 
	and disenio_votado = '$id_disenio'";

	/*La consulta verifica si existen votos de este usuario para el disenio $id_disenio*/

	$obtenerConjunto = $mysqli->query($verificarSiYaVoto) or die($mysqli->error);
	
	if($obtenerConjunto){

		$obtenerRegistros = $obtenerConjunto->fetch_array(MYSQLI_ASSOC);
		
		$cantidadParaEste = $obtenerRegistros["votos_hechos"];

		if($cantidadParaEste == 0){

			$registrar_voto = "insert into votos values('','$user_voto_id','$id_disenio','$tipo_dis')";

			$mysqli->query($registrar_voto) or die($mysqli->error);

			$traerCantidadVotos = "select cantidad_votos from disenio where id_disenio = '$id_disenio'";

			$registro = $mysqli->query($traerCantidadVotos) or die($mysqli->error);

			$arrayRegistros = $registro->fetch_array(MYSQLI_ASSOC);

			$cantidadActual = $arrayRegistros["cantidad_votos"];

			$cantidadActual = $cantidadActual + 1;

			$actualizarCantidadVotos = "update disenio set cantidad_votos = '$cantidadActual' where id_disenio = '$id_disenio'";
			
			$mysqli->query($actualizarCantidadVotos) or die($mysqli->error);

			echo $cantidadActual;
		}else{
			
			$noVota = -1;
			echo $noVota;
		}
	}else{
		$error = -2;
		echo $error;
	}

}
?>