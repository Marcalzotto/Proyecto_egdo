<?php
require_once("../bloqueSeguridad.php");
require_once("conexion.php");
include("funciones/calcular_calificacion_empresa.php");
include("funciones/calcular_ancho_barritas.php");
include("funciones/funcion_obtener_cantidad_votos.php");
include("funciones/calcular_nuevo_ancho.php");

	if($_POST){
		$valorEstrella = $_POST['estrellasValor'];
		$id_empresa = $_POST['empresa'];
		filter_var($id_empresa, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
		
		$u = 0;
		$i = 0;
		if($valorEstrella != 1 && $valorEstrella != 2 && $valorEstrella != 3 && $valorEstrella != 4 && $valorEstrella != 5){
			echo -1;
		}else{
			$resultset = $conexion->query("select valor_calificacion from calificacion where id_empresa = '$id_empresa' and id_usuario = '$_SESSION[id_usuario]';");
			if($resultset){
				if($resultset->num_rows > 0){
					$valores = $resultset->fetch_array(MYSQLI_ASSOC);
					//$nuevoValor = $valores["valor_calificacion"];
					//$nuevoValor = $nuevoValor + $valorEstrella;
					//$update = "insert into calificacion values('',$_SESSION[id_usuario],'$id_empresa','$valorEstrella');";
					$update = "update calificacion set valor_calificacion = '$valorEstrella' where id_empresa = '$id_empresa' and id_usuario = '$_SESSION[id_usuario]';";
					$updated = $conexion->query($update);
					if($updated){
						//echo $todo;
						$u = 1;
					}else{
						echo -2;
					}
				}else{
					$insert = "insert into calificacion values('',$_SESSION[id_usuario],'$id_empresa','$valorEstrella');";
					$inserted = $conexion->query($insert) or die($conexion->error); 
					if($inserted){
						$i = 1;
					}else{
						echo -2;
					}
				}
			}else{
				echo -2;
			}
			
			$calcularTotal = "select count(id_calificacion) as total from calificacion where id_empresa = '$id_empresa'";
			$reg_cal = $conexion->query($calcularTotal);
			if($reg_cal){
			$reg_totales = $reg_cal->fetch_array(MYSQLI_ASSOC);
			$total_votos = $reg_totales["total"];
			$total_votos = $total_votos;
			$calificacion = calcular_calificacion($conexion,$id_empresa);
			$nuevo_ancho_estrellas = calcular_ancho($calificacion);
			$cal5 = obtener_cantidad($conexion,$id_empresa,5);
			$cal4 = obtener_cantidad($conexion,$id_empresa,4); 
			$cal3 = obtener_cantidad($conexion,$id_empresa,3); 
			$cal2 = obtener_cantidad($conexion,$id_empresa,2); 
			$cal1 = obtener_cantidad($conexion,$id_empresa,1);  
			$ancho5 = ancho_barra($total_votos, $cal5);
			$ancho4 = ancho_barra($total_votos, $cal4);
			$ancho3 = ancho_barra($total_votos, $cal3);
			$ancho2 = ancho_barra($total_votos, $cal2);
			$ancho1 = ancho_barra($total_votos, $cal1);
			
			$todo = $calificacion."-".$nuevo_ancho_estrellas."-".$total_votos."-".$ancho5."-".$cal5."-".$ancho4."-".$cal4."-".$ancho3."-".$cal3."-".$ancho2."-".$cal2."-".$ancho1."-".$cal1;

			if($i == 1 || $u == 1){
				echo $todo;
			}
		}else{
			echo -2;
		}



		}
	}
?>