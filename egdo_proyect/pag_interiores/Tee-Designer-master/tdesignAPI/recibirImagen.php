<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
   header('Location: ../../index.php');

exit;
}

$now = time();

if($now > $_SESSION['expire']) {
session_destroy();

header('Location: ../../index.php');
exit;
}

require('../../conexion.php');


$respuesta = "";
$usuario_sube = $_SESSION['id_usuario']; 
$curso_sesion = $_SESSION['curso']; 

	if($_POST["img"] == false || $_POST["img2"] == false){
		
		$respuesta = 1;
		echo $respuesta;
	
	}else{
		$capturaFrontal = $_POST["img"];
		$capturaEspalda = $_POST["img2"];
		$nombreFrontal = $_POST["frontal"];
		$nombreEspalda = $_POST["espalda"];


			if($_POST["idPrenda"] == 1 || $_POST["idPrenda"] == 2 || $_POST["idPrenda"] == 3){
		 //move_uploaded_file($arch, 'imagenNada.jpg');
					
					$img1 = str_replace('data:image/jpeg;base64,','', $capturaFrontal);
					$img2 = str_replace('data:image/jpeg;base64,','', $capturaEspalda);

					$decodificarImgFrontal = base64_decode($img1);
					$decodificarImgEspalda = base64_decode($img2);
		
					$num = rand(5,1000000);
		
					$arch1 = 'images/userDesigns/'.$nombreFrontal.$num.'.jpg';
					$arch2 = 'images/userDesigns/'.$nombreEspalda.$num.'.jpg';

					$tipo = $_POST["idPrenda"];
					$query = "select * from disenio where id_usuario_subio = '$usuario_sube' and codigo_tipo = '$tipo'";
					$result = $conexion->query($query);
					
					if($result){
						if($result->num_rows > 0){

							$val = $result->fetch_array(MYSQLI_ASSOC);
							
							

							$queryUpdate = "update disenio set path_frontal = '$arch1', path_espalda = '$arch2' where 
							id_usuario_subio = '$usuario_sube' and codigo_tipo = '$tipo'";

							if($conexion->query($queryUpdate)){
								unlink($val['path_frontal']);
								unlink($val['path_espalda']);

								$updates1 = file_put_contents($arch1, $decodificarImgFrontal, LOCK_EX);
								$updates2 = file_put_contents($arch2, $decodificarImgEspalda, LOCK_EX);

								if($updates1 == false || $updates2 == false){
									$respuesta = 2;
									echo $respuesta;
								}else{
									$respuesta = $num;
									echo $respuesta;
								}
							}else{
								$respuesta = -1;
								echo $respuesta;
							}

						}else{

								$bytes1 = file_put_contents($arch1, $decodificarImgFrontal, LOCK_EX);
								$bytes2 = file_put_contents($arch2, $decodificarImgEspalda, LOCK_EX);

								if($bytes1 == false || $bytes2 == false){
									$respuesta = 2;
									echo $respuesta;
								}else{
										$query = "insert into disenio values('','$tipo','$usuario_sube',0,0,'$arch1','$arch2')";
										if($conexion->query($query)){
							
											$respuesta = $num;
											echo $respuesta;
										}else{
											$respuesta = 3;
											echo $respuesta; 
										}
								}
						}
					}else{
						die("hubo un error inesperado");
					}

					/*$bytes1 = file_put_contents($arch1, $decodificarImgFrontal, LOCK_EX);
					$bytes2 = file_put_contents($arch2, $decodificarImgEspalda, LOCK_EX);
		
					if($bytes1 == false || $bytes2 == false){
			
						$respuesta = 2;
						echo $respuesta;
		
					}else{

						$query = "insert into disenio values('','$tipo','$usuario_sube',0,0,'$arch1','$arch2')";
						if($conexion->query($query)){
							
							$respuesta = $num;
							echo $respuesta;
						}else{

							//$respuesta = "Lo sentimos hubo errores al guardar los disenios: ".$conexion->error;
							$respuesta = 3;
							echo $respuesta; 
						}
					}*/
			}else{
				//$respuesta = "Lo sentimos hubo errores en el envio de datos, por favor intentalo de nuevo";
					$respuesta = 4;
				echo $respuesta;
			}
			
	}
?>