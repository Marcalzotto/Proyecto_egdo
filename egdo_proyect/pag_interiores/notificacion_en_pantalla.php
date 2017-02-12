<?php
include("../bloqueSeguridad.php");
include("conexion.php");

	if($_POST){
		if($_POST["check"] === true){
			$curso = $_SESSION["curso"];
			$usuario = $_SESSION["id_usuario"];

			$query = "select resumen, link, icono, fecha_hora from notificaciones where curso_notificacion = '$curso' and id_notificacion not in(
						select id_notificacion from notificacion_vista_por where usuario = '$usuario' 
						and curso_notificacion = '$curso');";
			
			if($result = $conexion->query($query)){
				if($result->num_rows > 0){
					while($regs = $result->fetch_row()){
						$vector[] = $regs 
					}
				}else{
					echo 0;
				}
			}else{
				echo -2;
			}
		}else{
			echo -1;
		}
	}else{
		echo -1;
	}


?>