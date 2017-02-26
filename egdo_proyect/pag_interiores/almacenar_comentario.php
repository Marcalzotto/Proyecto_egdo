<?php include ("../bloqueSeguridad.php");




							$host_db = "localhost";
							$user_db = "root";
							$pass_db = "";
							$db_name = "egdo_db";
							

							$conexion = new mysqli($host_db, $user_db, $pass_db,$db_name);

							if ($conexion->connect_error) {
							die("La conexion falló: " . $conexion->connect_error);
							}
						
							
if($_POST){				
  $id_lugar_info = $_POST['destino_info'];
  $usuario = $_POST['usu'];
  $coment = $_POST['comentario'];


   $registrar_coment_infoViaje = "insert into comentario_infoviaje (comentario, id_info_viaje, id_usuario, fecha, estado_moderar)
                                   values ('$coment', '$id_lugar_info', '$usuario', now(), '')";
  $guardarRdo= $conexion->query($registrar_coment_infoViaje)or die($conexion->error);
			//Hacemos la inserción, y si es correcta, se procede

   $obtNombreUsu = "select nombre from usuario where id_usuario = '$usuario'";
    $guardoUsu = $conexion->query($obtNombreUsu) or die($conexion->error);
        while ($infoUsu = $guardoUsu->fetch_assoc()) {
									$nombre = $infoUsu['nombre'];
									 $datos = $coment."-".$nombre;  
									
						}
                  
                            

       if($guardarRdo) {
				//Reiniciamos los inputs
		

		   echo   $datos; 

			
		
                    }

                   else {
			
				die( "Parece que ha habido un error. Recargue la página e inténtelo nuevamente." );
			}
                    
                    }      ?>

                     	

           