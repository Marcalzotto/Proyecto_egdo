<?php
require_once("../bloqueSeguridad.php");
require_once("conexion.php");
	
	if($_POST){
		$valorEstrella = $_POST['estrellasValor'];

		if($valorEstrella != 1 && $valorEstrella != 2 && $valorEstrella != 3 && $valorEstrella != 4 && $valorEstrella != 5){
			echo -1;
		}else{
			$resultset = $conexion->query("select valor_calificacion from calificacion where id_empresa = 1 and id_usuario = '$_SESSION[id_usuario]'");
			if($resultset){
				if($resultset->num_rows > 0){
					$valores = $resultset->fetch_array(MYSQLI_ASSOC);
					//$nuevoValor = $valores["valor_calificacion"];
					//$nuevoValor = $nuevoValor + $valorEstrella;
					
					$update = "update calificacion set valor_calificacion = '$valorEstrella' where id_empresa = 1";
					$updated = $conexion->query($update);
					if($updated){
						echo 1;
					}else{
						echo -2;
					}
				}else{
					$insert = "insert into calificacion values('',$_SESSION[id_usuario],'1','$valorEstrella')";
					$inserted = $conexion->query($insert) or die($conexion->error); 
					if($inserted){
						echo 1;
					}else{
						echo -2;
					}
				}
			}else{
				echo -2;
			}
		}
	}
?>