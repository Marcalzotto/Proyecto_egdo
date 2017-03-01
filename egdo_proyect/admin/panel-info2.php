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

//Comprobamos que los inputs no est�n vac�os, y si lo est�n, mandamos el mensaje correspondiente
if(empty($nombreCiudad)) {
	die( 'Es necesario establecer un nombre' );
} else if($_FILES['info_imagen_1']['error'] === 4)  {
  	die( 'Es necesario establecer una imagen' ); }
  	else if(empty($descripcion)) {
	die( 'Establezca una descripci�n  para la foto 1'); }
   else if($_FILES['info_imagen_2']['error'] === 4) {
	die( 'Es necesario establecer una imagen' ); }
	else if(empty($descripcion2)) {
	die( 'Establezca una descripci�n para la foto 2'); }
	else if($_FILES['info_imagen_3']['error'] === 4) {
	die( 'Es necesario establecer una imagen' ); }
	else if(empty($descripcion3)) {
	die( 'Establezca una descripci�n  para la foto 3'); }
	else if($_FILES['info_imagen_4']['error'] === 4) {
	die( 'Es necesario establecer una imagen' );}
	else if(empty($descripcion4)) {
	die( 'Establezca una descripci�n  para la foto 4'); 
	//Si los inputs est�n seteados y el archivo no tiene errores, se procede
} else if(isset($descripcion) AND $_FILES['info_imagen_1']['error'] === 0  AND $_FILES['info_imagen_2']['error'] === 0 AND isset($descripcion2) AND $_FILES['info_imagen_3']['error'] === 0 AND isset($descripcion3) AND $_FILES['info_imagen_4']['error'] === 0 AND isset($descripcion4)) {

     
	//Extensiones permitidas
	$extensiones = array('jpg', 'jpeg', 'gif', 'png', 'bmp');

	//Obtenemos la extensi�n (en min�sculas) para poder comparar
	$extension = strtolower(end(explode('.', $_FILES['info_imagen_1']['name']))); 
	$extension2 = strtolower(end(explode('.', $_FILES['info_imagen_2']['name'])));
	$extension3 = strtolower(end(explode('.', $_FILES['info_imagen_3']['name']))); 
	$extension4 = strtolower(end(explode('.', $_FILES['info_imagen_4']['name'])));  

	//Verificamos que sea una extensi�n permitida, si no lo es mostramos un mensaje de error
  	if(!in_array($extension, $extensiones)) {
		die( 'S�lo se permiten archivos con las siguientes extensiones: '.implode(', ', $extensiones) );
		   }
		else if(!in_array($extension2, $extensiones)){
			die( 'S�lo se permiten archivos con las siguientes extensiones: '.implode(', ', $extensiones) );
		}
		else if(!in_array($extension3, $extensiones)){
			die( 'S�lo se permiten archivos con las siguientes extensiones: '.implode(', ', $extensiones) );
		}
		else if(!in_array($extension4, $extensiones)){
			die( 'S�lo se permiten archivos con las siguientes extensiones: '.implode(', ', $extensiones) );
		}

		else {
		//Si la extensi�n es correcta, procedemos a comprobar el tama�o del archivo subido
		//Y definimos el m�ximo que se puede subir
		//Por defecto el m�ximo es de 2 MB, pero se puede aumentar desde el .htaccess o en la directiva 'upload_max_filesize' en el php.ini

		$tama�oArchivo = $_FILES['info_imagen_1']['size']; //Obtenemos el tama�o del archivo en Bytes
		$tama�oArchivoKB = round(intval(strval( $tama�oArchivo / 1024 ))); //Pasamos el tama�o del archivo a KB

		$tama�oMaximoKB = "2048"; //Tama�o m�ximo expresado en KB
		$tama�oMaximoBytes = $tama�oMaximoKB * 1024; // -> 2097152 Bytes -> 2 MB

		$tama�oArchivo1 = $_FILES['info_imagen_2']['size']; //Obtenemos el tama�o del archivo en Bytes
		$tama�oArchivoKB1 = round(intval(strval( $tama�oArchivo1 / 1024 ))); //Pasamos el tama�o del archivo a KB

		$tama�oMaximoKB1 = "2048"; //Tama�o m�ximo expresado en KB
		$tama�oMaximoBytes1 = $tama�oMaximoKB1 * 1024; // -> 2097152 Bytes -> 2 MB

		$tama�oArchivo2 = $_FILES['info_imagen_3']['size']; //Obtenemos el tama�o del archivo en Bytes
		$tama�oArchivoKB2 = round(intval(strval( $tama�oArchivo2 / 1024 ))); //Pasamos el tama�o del archivo a KB

		$tama�oMaximoKB2 = "2048"; //Tama�o m�ximo expresado en KB
		$tama�oMaximoBytes2 = $tama�oMaximoKB2 * 1024; // -> 2097152 Bytes -> 2 MB

		$tama�oArchivo3 = $_FILES['info_imagen_4']['size']; //Obtenemos el tama�o del archivo en Bytes
		$tama�oArchivoKB3 = round(intval(strval( $tama�oArchivo3 / 1024 ))); //Pasamos el tama�o del archivo a KB

		$tama�oMaximoKB3 = "2048"; //Tama�o m�ximo expresado en KB
		$tama�oMaximoBytes3 = $tama�oMaximoKB3 * 1024; // -> 2097152 Bytes -> 2 MB

		//Comprobamos el tama�o del archivo, y mostramos un mensaje si es mayor al tama�o expresado en Bytes
		if($tama�oArchivo > $tama�oMaximoBytes) {
			die( "El archivo ".$nombreArchivo." es demasiado grande. El tama�o m�ximo del archivo es de ".$tama�oMaximoKB."Kb." ); }
		   else	if($tama�oArchivo1 > $tama�oMaximoBytes1) {
			die( "El archivo ".$nombreArchivo2." es demasiado grande. El tama�o m�ximo del archivo es de ".$tama�oMaximoKB1."Kb." ); }
			else if($tama�oArchivo2 > $tama�oMaximoBytes2) {
			die( "El archivo ".$nombreArchivo3." es demasiado grande. El tama�o m�ximo del archivo es de ".$tama�oMaximoKB2."Kb." ); }
			else if($tama�oArchivo3 > $tama�oMaximoBytes3) {
			die( "El archivo ".$nombreArchivo4." es demasiado grande. El tama�o m�ximo del archivo es de ".$tama�oMaximoKB3."Kb." ); }
		
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
                   

              
			//Si el tama�o es correcto, subimos los datos
			$consulta = "insert into info_viaje (nombre_lugar, descripcion, id_actividad, id_usuario, imagen, imagen1, imagen2, imagen3, descripcion1, descripcion2, descripcion3) 
			VALUES ('$nombreCiudad','$descripcion','$numIdAct', '$usu_id', '$path_foto_1', '$path_foto_2', '$path_foto_3', '$path_foto_4', '$descripcion2', '$descripcion3', '$descripcion4')";
			//ejecuto consulta
             $guardarRdo= $conexion->query($consulta) or die($conexion->error);
			//Hacemos la inserci�n, y si es correcta, se procede
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
				//Cerramos la conexi�n con MySQL
				$conexion->close();
			
			}

		}	 else {
				//Si hay alg�n error con la inserci�n, se muestra un mensaje
				die( "Parece que ha habido un error. Recargue la p�gina e int�ntelo nuevamente." );
			};


		};
	};



};
?>