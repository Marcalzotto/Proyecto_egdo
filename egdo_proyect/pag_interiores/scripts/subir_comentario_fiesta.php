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
				$fecha_separar = explode("-", $fecha_formateada);
				$aaaa = $fecha_separar[0];
				$mm = $fecha_separar[1];
				$dd = $fecha_separar[2];

				$mes_nombre = get_mes($mm);

				$tiempo = explode(" ", $dd);
				$dia = $tiempo[0];
				$hora = $tiempo[1];

				$separar_hora = explode(":", $hora);
				$horas = $separar_hora[0];
				$minutos = $separar_hora[1];
				$segundos = $separar_hora[2];
				$insertarComentario = "insert into comentario_fiesta(comentario,fecha_hora,id_usuario,id_lugar,id_curso) 
												values('$comentario','$fecha_formateada','$usuario','$id_lugar','$curso')";

				if($result = $conexion->query($insertarComentario)){
					$id_comentario = $conexion->insert_id;
					$buscar_usuario = "select nombre from usuario where id_usuario = '$usuario'";
					if($result = $conexion->query($buscar_usuario)){
						$reg = $result->fetch_array(MYSQLI_ASSOC);

						$return_comentario = "";
						
						if($_SESSION["id_rol"] < 3){
             $return_comentario = "<div class='row 0%'>
             					<div class='11u parrafo'><p class='nombre'>".$reg["nombre"]."</p><p class='contenido'>".$comentario."</p><p class='fecha'>".$dia." de ".$mes_nombre." a las ".$horas.":".$minutos." hs.</p></div>
                      <div class='1u img'><img src='../images/delete.png' class='del' rel=".$id_comentario." alt='borrar notificacion' height='20' width='20'></div>
                   </div>";
             echo $return_comentario;
           }else{
              $return_comentario =  "<div class='row 0%'>
                                     <div class='12u parrafo'>
                                      <p class='nombre'>".$reg["nombre"]."</p>
                                      <p class='contenido'>".$comentario."</p>
                                      <p class='fecha'>".$dia." de ".$mes_nombre." a las ".$horas.":".$minutos." hs.</p>
                                     </div>
                                     </div>";   
             echo $return_comentario;
            }	

						
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