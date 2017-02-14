<?php
include("../bloqueSeguridad.php");
include("conexion.php");
include("funciones/add_extencion.php");
include("funciones/obtener_mes.php");

	if($_POST){
		if($_POST["check"] == true){
			$curso = $_SESSION["curso"];
			$usuario = $_SESSION["id_usuario"];
			$rol = $_SESSION["id_rol"];

			$query = "select id_notificacion,resumen, link, icono, fecha_hora, tipo_notificacion from notificaciones where curso_notificacion = '$curso' and id_notificacion not in(
						select id_notificacion from notificacion_vista_por where usuario = '$usuario' 
						and curso_notificacion = '$curso');";
			$string = "";
			
			if($result = $conexion->query($query)){
				if($result->num_rows > 0){
					while($regs = $result->fetch_row()){
						
						$fecha_separar = split("-", $regs[4]);
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

						$e = add_extension($regs[5],$rol);
					
						$string.= "<a href=".$regs[2].$e.">
													<img src=".$regs[3]." alt='flat icon'>
													<p>".$regs[1]."</p>
													<img src='../images/delete.png' class='del' rel=".$regs[0]." alt='borrar notificacion' height='20' width='20'>
													<p class='fecha'>".$dia." de ".$mes_nombre." a las ".$horas.":".$minutos." hs.</p>
												</a>|";
							
						$queries[] = "insert into notificacion_vista_por values('','$usuario','$regs[0]',0,'$curso')";	

						}

						
						foreach ($queries as $queri) {
							if(!$conexion->query($queri)){
								$errors[] = $conexion->error;
							}
						}
						if(isset($errors)){
								$error = count($errors);
						}else{
							$error = 0;
						}
					
					$string .= $error; 

					echo $string;
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