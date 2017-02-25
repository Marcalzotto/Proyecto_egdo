<?php
include('../../bloqueSeguridad.php');
include('../conexion.php');
$curso = $_SESSION["curso"];
$usuario = $_SESSION["id_usuario"];
$expReg	='/[^0-9]/';
	if($_POST){
		$com = $_POST["com"];
		if(preg_match($expReg, $com)){
			echo -1;
		}else{
			if($_SESSION["id_rol"] < 3){
				$buscar_comentario = "select id_comentario from comentario_fiesta where id_comentario = '$com' and id_curso = '$curso'";
				if($result = $conexion->query($buscar_comentario)){
					if($result->num_rows > 0){
						$moderar = "update comentario_fiesta set estado_moderar = 1 where id_comentario = '$com'";
						if($result = $conexion->query($moderar)){
							echo 1;
						}else{
							echo -2;
						}
					}else{
						echo -2;
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

?>