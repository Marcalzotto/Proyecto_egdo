<?php
require_once("../bloqueSeguridad.php");
require_once("conexion.php");
	
	if($_POST){
		$var = addslashes(htmlspecialchars($_POST['medidaBand']));

		$verificarSiEligio = "select * from medidas_bandera where curso = $_SESSION[curso]";
		$resultSet = $conexion->query($verificarSiEligio);
		if($resultSet){
			if($resultSet->num_rows > 0){
				echo "Ya has elegido la medida de la bandera, no puedes cambiarla";
			}else{
				$buscarIdBandera = "select * from disenio as d join usuario u on d.id_usuario_subio = u.id_usuario 
    where d.codigo_tipo = 3 and u.id_curso = '$_SESSION[curso]' order by d.votos_segunda_instancia desc limit 1";
    		$id = $conexion->query($buscarIdBandera);
    		if($id){
    			
    			$getId = $id->fetch_array(MYSQLI_ASSOC);
    			$idBand = $getId["id_disenio"];
    			
    			$insert = "insert into medidas_bandera values('','$_SESSION[curso]','$var','$idBand')";
    			$inserted = $conexion->query($insert);	
    			if($inserted){
    				echo "Hemos registrado la medida de la bandera";
    			}else{
    				echo "Lo sentimos hubo problemas al conectar con el servidor";
    			}
    		}else{
    			echo "No pudimos conectar con el servidor, por favor intenta mas tarde";
    		}
				
			}
		}

	}
    $conexion->close();
?>