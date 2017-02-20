<?php
include("../../bloqueSeguridad.php");
include("../conexion.php");
include("../funciones/obtener_mes.php");	
$curso = $_SESSION["curso"];
$usuario = $_SESSION["id_usuario"];
$patter_num = '[^0-9]';
$patter_coment = '[<>&]';
$fecha_hoy  = new DateTime();
$fecha_formateada = $fecha_hoy->format("Y-m-d H:i:s");
if($_POST){
	if(!preg_match($patter_num, $_POST["lugar"])){
		$id_lugar = $_POST["lugar"];
		$comentario = $_POST["comentario"];
		if(strlen($comentario) > 0){

			if(strlen($comentario) < 1000){
				$comentario = ereg_replace($patter_coment, '', $_POST["comentario"]);
				$fecha_separar = split("-", $fecha_formateada);
				$aaaa = $fecha_separar[0];
				$mm = $fecha_separar[1];
				$dd = $fecha_separar[2];

				$mes_nombre = get_mes($mm);

				$tiempo = split(" ", $dd);
				$dia = $tiempo[0];
				$hora = $tiempo[1];

				$separar_hora = split(":", $hora);
				$horas = $separar_hora[0];
				$minutos = $separar_hora[1];
				$segundos = $separar_hora[2];
				$insertarComentario = "insert into comentario(comentario,fecha_hora,id_usuario,id_actividad,id_lugar,id_curso) 
												values('$comentario','$fecha_formateada','$usuario',2,'$id_lugar','$curso')";

				if($result = $conexion->query($insertarComentario)){
					$buscar_usuario = "select nombre from usuario where id_usuario = '$usuario'";
					if($result = $conexion->query($buscar_usuario)){
						$reg = $result->fetch_array(MYSQLI_ASSOC);

						$return_comentario = "<div class='comentario'><p class='nombre'>".$reg["nombre"]."</p><p class='contenido'>".$comentario."</p><p class='fecha'>".$dia." de ".$mes_nombre." a las ".$hora.":".$minutos." hs.</p></div>";
						echo $return_comentario;		
					}else{
						echo -5;
					}
				}else{
					echo -4;
				}

			}else{
				echo -2;
			}

		}else{
			echo -1;
		}
	}else{
		echo -3;
	}
	



}

?>