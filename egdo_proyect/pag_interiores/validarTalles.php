<?php
require_once("../bloqueSeguridad.php");
require_once("conexion.php");

	if($_POST){
		
		$talleBuzo = addslashes(htmlspecialchars($_POST["buzoTalle"]));
		$talleRemera = addslashes(htmlspecialchars($_POST["remeraTalle"]));
		$queryActualizar = "";
		$case = 0;
		//$talleBuzo = $_POST["buzoTalle"];
		//$talleRemera = $_POST["remeraTalle"];


		if($talleBuzo == "null" && $talleRemera == "null"){
			echo -1; //"Por favor llena todos los campos de este formulario"; //mensaje error -1
		}else if(strcmp($talleBuzo, "xs") != 0 && strcmp($talleBuzo, "s") != 0 && strcmp($talleBuzo, "m") != 0 && strcmp($talleBuzo, "l") != 0 && strcmp($talleBuzo, "xl") != 0 && strcmp($talleBuzo, "xxl") != 0 && strcmp($talleBuzo, "null") != 0){
			echo -2; //"El talle elegido de buzo no concuerda con los proporcionados :".$talleBuzo; //mensaje error -2
		}else if(strcmp($talleRemera, "xs") != 0 && strcmp($talleRemera, "s") != 0 && strcmp($talleRemera, "m") != 0 && strcmp($talleRemera, "l") != 0 && strcmp($talleRemera, "xl") != 0 && strcmp($talleRemera, "xxl") != 0 && strcmp($talleRemera, "null") != 0){
			echo -3; //"El talle elegido de remera no concuerda con los proporcionados :".$talleRemera; //mensaje error -3
		}else{
			//echo "Ir a guardar a la base de datos";
			
			if($talleBuzo == "null"){
				//$talleBuzo = "N/D";
				$case = 1;
			}
			
			if($talleRemera == "null"){
				//$talleRemera = "N/D";
				$case = 2;
			}

			
			$verificarEligioTalles = "select * from talles_curso where usuario = '$_SESSION[id_usuario]'";
			$resultSet = $conexion->query($verificarEligioTalles);

			if($resultSet){
				if($resultSet->num_rows > 0){
					$talles = $resultSet->fetch_array(MYSQLI_ASSOC);

					switch ($case){
							case 1:
								$queryActualizar = "update talles_curso set talle_remera = '$talleRemera' where  
								usuario = $_SESSION[id_usuario]";
								$talleBuzo = $talles["talle_buzo"];
							break;

							case 2:
								$queryActualizar = "update talles_curso set talle_buzo = '$talleBuzo' where  
								usuario = $_SESSION[id_usuario]";
								$talleRemera = $talles["talle_remera"];
							break;
						
							default:
								$queryActualizar = "update talles_curso set talle_buzo = '$talleBuzo', talle_remera = '$talleRemera' where  
								usuario = $_SESSION[id_usuario]";
							break;
					}

					$updated = $conexion->query($queryActualizar);
					if($updated){
						echo $talleBuzo."-".$talleRemera; //vienen los talles
					}else{
						echo -4; //"Hubo problemas al cambiar los talles, intenta de nuevo mas tarde";//mensaje error -4
					}
				}else{
						
						if($talleBuzo == "null"){
						$talleBuzo = "N/D";
						
						}
						if($talleRemera == "null"){
						$talleRemera = "N/D";
						
						}

			$insercion = "insert into talles_curso values('','$talleBuzo','$talleRemera','$_SESSION[id_usuario]','$_SESSION[curso]')"; 
					$inserted = $conexion->query($insercion);
					if($inserted){

					
						echo $talleBuzo."-".$talleRemera; //"La operacion se ha realizado con exito";//vienen los talles
					}else{
						echo -5; //"Hubo problemas al guardar tus talles";//mensaje error -5
					}
				}
			}else{
				echo "Hubo problemas con el servidor, intenta nuevamente mas tarde"; //mensaje error -6;
			}
			
		}
	}

	$conexion->close();
?>