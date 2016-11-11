<?php
require_once("../bloqueSeguridad.php");
require_once("conexion.php");

	if($_POST){
		
		//$talleBuzo = addslashes(htmlspecialchars($_POST["buzoTalle"]));
		//$talleRemera = addslashes(htmlspecialchars($_POST["remeraTalle"]));

		$talleBuzo = $_POST["buzoTalle"];
		$talleRemera = $_POST["remeraTalle"];


		if(!$talleBuzo || !$talleRemera){
			echo "Por favor llena todos los campos de este formulario";
		}else if(strcmp($talleBuzo, "xs") != 0 && strcmp($talleBuzo, "s") != 0 && strcmp($talleBuzo, "m") != 0 && strcmp($talleBuzo, "l") != 0 && strcmp($talleBuzo, "xl") != 0 && strcmp($talleBuzo, "xxl") != 0){
			echo "El talle elegido de buzo no concuerda con los proporcionados :".$talleBuzo;
		}else if(strcmp($talleRemera, "xs") != 0 && strcmp($talleRemera, "s") != 0 && strcmp($talleRemera, "m") != 0 && strcmp($talleRemera, "l") != 0 && strcmp($talleRemera, "xl") != 0 && strcmp($talleRemera, "xxl") != 0){
			echo "El talle elegido de remera no concuerda con los proporcionados :".$talleRemera;
		}else{
			
			$verificarEligioTalles = "select * from talles_curso where usuario = '$_SESSION[id_usuario]'";
			$resultSet = $conexion->query($verificarEligioTalles);
			
			if($resultSet){
				if($resultSet->num_rows > 0){
					$queryActualizar = "update talles_curso set talle_buzo = '$talleBuzo', talle_remera = '$talleRemera' where  
					usuario = $_SESSION[id_usuario]";

					$updated = $conexion->query($queryActualizar);
					if($updated){
						echo "Hemos actualizado tus talles de ropa";
					}else{
						echo "Hubo problemas al cambiar los talles, intenta de nuevo mas tarde";
					}
				}else{
			
			$multiInsercion = "insert into talles_curso values('','$talleBuzo','$talleRemera','$_SESSION[id_usuario]','$_SESSION[curso]')"; 
					$inserted = $conexion->query($multiInsercion);
					if($inserted){
						echo "Tus talles se han guardado con exito";
					}else{
						echo "Hubo problemas al guardar tus talles";
					}
				}
			}else{
				echo "Hubo problemas con el servidor, intenta nuevamente mas tarde";
			}
			
		}
	}

	$conexion->close();
?>