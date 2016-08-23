<?php
//Archivo de conexión a la base de datos


$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "egdo_db";
//$tbl_name = "usuario";

$conexion = new mysqli($host_db, $user_db, $pass_db,$db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

//Creamos las variables necesarias
$titulo = $_POST['nombre'];
$descripcion = $_POST['descripcion'];

//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("&lt;", "&gt;", "&quot;", "&#x27;", "&#x2F;", "&#060;", "&#062;", "&#039;", "&#047;");

$titulo = str_replace($caracteres_malos, $caracteres_buenos, $titulo);
$descripcion = str_replace($caracteres_malos, $caracteres_buenos, $descripcion);

//Cambiamos los ENTER por <br>
$descripcion = nl2br($descripcion);

//Comprobamos que los inputs no estén vacíos, y si lo están, mandamos el mensaje correspondiente
if(empty($titulo)) {
	die( 'Es necesario establecer un título' );
} else if(empty($descripcion)) {
	die( 'Es necesario establecer una descripción' );
	//"Error 4" en los array de $_FILES significa que ningún archivo fue subido o incluido en el input
	//Más info en http://php.net/manual/es/features.file-upload.errors.php
} else if($_FILES['info_imagen']['error'] === 4) {
	die( 'Es necesario establecer una imagen' );
	//Si los inputs están seteados y el archivo no tiene errores, se procede
} else if(isset($descripcion) AND isset($titulo) AND $_FILES['info_imagen']['error'] === 0 ) {
	//Convertimos la información de la imagen en binario para insertarla en la BBDD
	$imagenBinaria = addslashes(file_get_contents($_FILES['info_imagen']['tmp_name']));
//Nombre del archivo
	$nombreArchivo = $_FILES['info_imagen']['name'];
     


	//Extensiones permitidas
	$extensiones = array('jpg', 'jpeg', 'gif', 'png', 'bmp');

	//Obtenemos la extensión (en minúsculas) para poder comparar
	$extension = strtolower(end(explode('.', $nombreArchivo))); 

	//Verificamos que sea una extensión permitida, si no lo es mostramos un mensaje de error
  	if(!in_array($extension, $extensiones)) {
		die( 'Sólo se permiten archivos con las siguientes extensiones: '.implode(', ', $extensiones) );
		   }

		else {
		//Si la extensión es correcta, procedemos a comprobar el tamaño del archivo subido
		//Y definimos el máximo que se puede subir
		//Por defecto el máximo es de 2 MB, pero se puede aumentar desde el .htaccess o en la directiva 'upload_max_filesize' en el php.ini

		$tamañoArchivo = $_FILES['info_imagen']['size']; //Obtenemos el tamaño del archivo en Bytes
		$tamañoArchivoKB = round(intval(strval( $tamañoArchivo / 1024 ))); //Pasamos el tamaño del archivo a KB

		$tamañoMaximoKB = "2048"; //Tamaño máximo expresado en KB
		$tamañoMaximoBytes = $tamañoMaximoKB * 1024; // -> 2097152 Bytes -> 2 MB

		//Comprobamos el tamaño del archivo, y mostramos un mensaje si es mayor al tamaño expresado en Bytes
		if($tamañoArchivo > $tamañoMaximoBytes) {
			die( "El archivo ".$nombreArchivo." es demasiado grande. El tamaño máximo del archivo es de ".$tamañoMaximoKB."Kb." ); }
		
        else {
            $traerIdActividad="select id_actividad from actividad where nombre_actividad='infoViaje'";
            $verificarId = $conexion->query($traerIdActividad) or die($conexion->error);
               if($verificarId){
               	  $regIdActividad= $verificarId->fetch_array(MYSQLI_ASSOC);
               	  $numIdAct= $regIdActividad["id_actividad"];
                   

              
			//Si el tamaño es correcto, subimos los datos
			$consulta = "insert into info_viaje (nombre_lugar, imagen, descripcion, id_actividad) 
			VALUES ('$titulo','$imagenBinaria','$descripcion','$numIdAct')";
			//ejecuto consulta
             $guardarRdo= $conexion->query($consulta) or die($conexion->error);
			//Hacemos la inserción, y si es correcta, se procede
			if($guardarRdo) {
				//Reiniciamos los inputs
				echo '<script>
						$("#enviarimagenes input,textarea").each(function(infoviajeAdminEgdo) {
						$(this).val("");
						});
					</script>';
				//Cerramos la conexión con MySQL
				$conexion->close();
				//Mostramos un mensaje
				die( "El archivo con el nombre ".$nombreArchivo." fue subido. Su peso es de ".$tamañoArchivoKB." KB." );
			}

		}	 else {
				//Si hay algún error con la inserción, se muestra un mensaje
				die( "Parece que ha habido un error. Recargue la página e inténtelo nuevamente." );
			};


		};
	};



};
?>