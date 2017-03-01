<?php include ("../bloqueSeguridad.php");
?>
<?php include('../pag_interiores/conexion.php');?>

<?php

//Creamos las variables necesarias
$usu_rol = $_SESSION['id_rol'];
$usu_id = $_SESSION['id_usuario'];
$descripcion = $_POST['descripcion'];
$descripcion2 = $_POST['descripcion2'];
$descripcion3 = $_POST['descripcion3'];
$descripcion4 = $_POST['descripcion4'];
$nombreCiudad = $_POST['nombre'];

//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("&lt;", "&gt;", "&quot;", "&#x27;", "&#x2F;", "&#060;", "&#062;", "&#039;", "&#047;");

$descripcion = str_replace($caracteres_malos, $caracteres_buenos, $descripcion);
$descripcion2 = str_replace($caracteres_malos, $caracteres_buenos, $descripcion2);
$descripcion3 = str_replace($caracteres_malos, $caracteres_buenos, $descripcion3);
$descripcion4 = str_replace($caracteres_malos, $caracteres_buenos, $descripcion4);

//Cambiamos los ENTER por <br>
$descripcion = nl2br($descripcion);

//Comprobamos que los inputs no estén vacíos, y si lo están, mandamos el mensaje correspondiente
if(empty($nombreCiudad)) {
	die( 'Es necesario establecer un nombre' );
} else if($_FILES['info_imagen_1']['error'] === 4)  {
  	die( 'Es necesario establecer una imagen' ); }
  	else if(empty($descripcion)) {
	die( 'Establezca una descripción  para la foto 1'); }
   else if($_FILES['info_imagen_2']['error'] === 4) {
	die( 'Es necesario establecer una imagen' ); }
	else if(empty($descripcion2)) {
	die( 'Establezca una descripción para la foto 2'); }
	else if($_FILES['info_imagen_3']['error'] === 4) {
	die( 'Es necesario establecer una imagen' ); }
	else if(empty($descripcion3)) {
	die( 'Establezca una descripción  para la foto 3'); }
	else if($_FILES['info_imagen_4']['error'] === 4) {
	die( 'Es necesario establecer una imagen' );}
	else if(empty($descripcion4)) {
	die( 'Establezca una descripción  para la foto 4'); 
	//Si los inputs están seteados y el archivo no tiene errores, se procede
} else if(isset($descripcion) AND $_FILES['info_imagen_1']['error'] === 0  AND $_FILES['info_imagen_2']['error'] === 0 AND isset($descripcion2) AND $_FILES['info_imagen_3']['error'] === 0 AND isset($descripcion3) AND $_FILES['info_imagen_4']['error'] === 0 AND isset($descripcion4)) {

     
	//Extensiones permitidas
	$extensiones = array('jpg', 'jpeg', 'gif', 'png', 'bmp');

	//Obtenemos la extensión (en minúsculas) para poder comparar
	$extension = strtolower(end(explode('.', $_FILES['info_imagen_1']['name']))); 
	$extension2 = strtolower(end(explode('.', $_FILES['info_imagen_2']['name'])));
	$extension3 = strtolower(end(explode('.', $_FILES['info_imagen_3']['name']))); 
	$extension4 = strtolower(end(explode('.', $_FILES['info_imagen_4']['name'])));  

	//Verificamos que sea una extensión permitida, si no lo es mostramos un mensaje de error
  	if(!in_array($extension, $extensiones)) {
		die( 'Sólo se permiten archivos con las siguientes extensiones: '.implode(', ', $extensiones) );
		   }
		else if(!in_array($extension2, $extensiones)){
			die( 'Sólo se permiten archivos con las siguientes extensiones: '.implode(', ', $extensiones) );
		}
		else if(!in_array($extension3, $extensiones)){
			die( 'Sólo se permiten archivos con las siguientes extensiones: '.implode(', ', $extensiones) );
		}
		else if(!in_array($extension4, $extensiones)){
			die( 'Sólo se permiten archivos con las siguientes extensiones: '.implode(', ', $extensiones) );
		}

		else {
		//Si la extensión es correcta, procedemos a comprobar el tamaño del archivo subido
		//Y definimos el máximo que se puede subir
		//Por defecto el máximo es de 2 MB, pero se puede aumentar desde el .htaccess o en la directiva 'upload_max_filesize' en el php.ini

		$tamañoArchivo = $_FILES['info_imagen_1']['size']; //Obtenemos el tamaño del archivo en Bytes
		$tamañoArchivoKB = round(intval(strval( $tamañoArchivo / 1024 ))); //Pasamos el tamaño del archivo a KB

		$tamañoMaximoKB = "2048"; //Tamaño máximo expresado en KB
		$tamañoMaximoBytes = $tamañoMaximoKB * 1024; // -> 2097152 Bytes -> 2 MB

		$tamañoArchivo1 = $_FILES['info_imagen_2']['size']; //Obtenemos el tamaño del archivo en Bytes
		$tamañoArchivoKB1 = round(intval(strval( $tamañoArchivo1 / 1024 ))); //Pasamos el tamaño del archivo a KB

		$tamañoMaximoKB1 = "2048"; //Tamaño máximo expresado en KB
		$tamañoMaximoBytes1 = $tamañoMaximoKB1 * 1024; // -> 2097152 Bytes -> 2 MB

		$tamañoArchivo2 = $_FILES['info_imagen_3']['size']; //Obtenemos el tamaño del archivo en Bytes
		$tamañoArchivoKB2 = round(intval(strval( $tamañoArchivo2 / 1024 ))); //Pasamos el tamaño del archivo a KB

		$tamañoMaximoKB2 = "2048"; //Tamaño máximo expresado en KB
		$tamañoMaximoBytes2 = $tamañoMaximoKB2 * 1024; // -> 2097152 Bytes -> 2 MB

		$tamañoArchivo3 = $_FILES['info_imagen_4']['size']; //Obtenemos el tamaño del archivo en Bytes
		$tamañoArchivoKB3 = round(intval(strval( $tamañoArchivo3 / 1024 ))); //Pasamos el tamaño del archivo a KB

		$tamañoMaximoKB3 = "2048"; //Tamaño máximo expresado en KB
		$tamañoMaximoBytes3 = $tamañoMaximoKB3 * 1024; // -> 2097152 Bytes -> 2 MB

		//Comprobamos el tamaño del archivo, y mostramos un mensaje si es mayor al tamaño expresado en Bytes
		if($tamañoArchivo > $tamañoMaximoBytes) {
			die( "El archivo ".$nombreArchivo." es demasiado grande. El tamaño máximo del archivo es de ".$tamañoMaximoKB."Kb." ); }
		   else	if($tamañoArchivo1 > $tamañoMaximoBytes1) {
			die( "El archivo ".$nombreArchivo2." es demasiado grande. El tamaño máximo del archivo es de ".$tamañoMaximoKB1."Kb." ); }
			else if($tamañoArchivo2 > $tamañoMaximoBytes2) {
			die( "El archivo ".$nombreArchivo3." es demasiado grande. El tamaño máximo del archivo es de ".$tamañoMaximoKB2."Kb." ); }
			else if($tamañoArchivo3 > $tamañoMaximoBytes3) {
			die( "El archivo ".$nombreArchivo4." es demasiado grande. El tamaño máximo del archivo es de ".$tamañoMaximoKB3."Kb." ); }
		
        else {

        	$cod_img = mt_rand(0, 20);
			$cod_img1 = mt_rand(0, 20);
            $cod_img2 = mt_rand(0, 20);
			$cod_img3 = mt_rand(0, 20);
				
				$path_foto_1 = "img_destinos/".$cod_img.$_FILES["info_imagen_1"]["name"];
				$path_foto_2 = "img_destinos/".$cod_img1.$_FILES["info_imagen_2"]["name"];
				$path_foto_3 = "img_destinos/".$cod_img2.$_FILES["info_imagen_3"]["name"];
				$path_foto_4 = "img_destinos/".$cod_img3.$_FILES["info_imagen_4"]["name"];

        	move_uploaded_file($_FILES['info_imagen_1']['tmp_name'], "../images/".$path_foto_1);
        	move_uploaded_file($_FILES['info_imagen_2']['tmp_name'], "../images/".$path_foto_2);
        	move_uploaded_file($_FILES['info_imagen_3']['tmp_name'], "../images/".$path_foto_3);
        	move_uploaded_file($_FILES['info_imagen_4']['tmp_name'], "../images/".$path_foto_4);
            $traerIdActividad="select id_actividad from actividad where nombre_actividad='infoViaje'";
            $verificarId = $conexion->query($traerIdActividad) or die($conexion->error);
               if($verificarId){
               	  $regIdActividad= $verificarId->fetch_array(MYSQLI_ASSOC);
               	  $numIdAct= $regIdActividad["id_actividad"];
                   

              
			//Si el tamaño es correcto, subimos los datos
			$consulta = "insert into info_viaje (nombre_lugar, descripcion, id_actividad, id_usuario, imagen, imagen1, imagen2, imagen3, descripcion1, descripcion2, descripcion3) 
			VALUES ('$nombreCiudad','$descripcion','$numIdAct', '$usu_id', '$path_foto_1', '$path_foto_2', '$path_foto_3', '$path_foto_4', '$descripcion2', '$descripcion3', '$descripcion4')";
			//ejecuto consulta
             $guardarRdo= $conexion->query($consulta) or die($conexion->error);
			//Hacemos la inserción, y si es correcta, se procede
			if($guardarRdo) {
				//Reiniciamos los inputs

             $con = "select * from info_viaje where nombre_lugar = '$nombreCiudad'";
			 $resultado = $conexion->query($con);
			 while ($datos = $resultado->fetch_assoc()) {
			 $nombre = $datos['nombre_lugar'];
			 $traerIdlugar = $datos['id_info_viaje'];
			 $ruta_img = $datos['imagen'];
			 $descripcion = $datos['descripcion'];

             if ($usu_rol='1'){

              echo "<div id='intro' class='container'> 
						<div class='mensaje'> </div>
						<div class='row'>
							
					<section class='4u 12u(mobile)'>
									<header>
									<h2><a href='turismoAdmin.php?id=".$traerIdlugar."'>" .$nombre."</a></h2>
									</header>
									<img class='number' src='../images/".$ruta_img."'/>
								
									<p>".$descripcion."</p>";
								      }

								      else {

             							 echo "<div id='intro' class='container'> 
												<div class='mensaje'> </div>
													<div class='row'>
							
											<section class='4u 12u(mobile)'>
														<header>

													<h2><a href='../pag_interiores/turismo.php?id=".$traerIdlugar."'>" .$nombre."</a></h2>
															</header>
													<img class='number' src='../images/".$ruta_img."'/>
								
													<p>".$descripcion."</p>";
								      }


								}
 echo    "
							</section>

						  	
            
				
								</div>

							
						</div>";


				echo "<script>
						$('#enviarimagenes input,textarea').each(function(echo) {
						$(this).val('');
						});
					</script>";
				//Cerramos la conexión con MySQL
				$conexion->close();
			
			}

		}	 else {
				//Si hay algún error con la inserción, se muestra un mensaje
				die( "Parece que ha habido un error. Recargue la página e inténtelo nuevamente." );
			};


		};
	};



};
?>