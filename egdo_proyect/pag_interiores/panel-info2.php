<?php
//Archivo de conexi�n a la base de datos


$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "egdo_db";
//$tbl_name = "usuario";

$conexion = new mysqli($host_db, $user_db, $pass_db,$db_name);

if ($conexion->connect_error) {
 die("La conexion fall�: " . $conexion->connect_error);
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

//Comprobamos que los inputs no est�n vac�os, y si lo est�n, mandamos el mensaje correspondiente
if(empty($titulo)) {
	die( 'Es necesario establecer un t�tulo' );
} else if(empty($descripcion)) {
	die( 'Es necesario establecer una descripci�n' );
	//"Error 4" en los array de $_FILES significa que ning�n archivo fue subido o incluido en el input
	//M�s info en http://php.net/manual/es/features.file-upload.errors.php
} else if($_FILES['info_imagen']['error'] === 4) {
	die( 'Es necesario establecer una imagen' );
	//Si los inputs est�n seteados y el archivo no tiene errores, se procede
} else if(isset($descripcion) AND isset($titulo) AND $_FILES['info_imagen']['error'] === 0 ) {
	//Convertimos la informaci�n de la imagen en binario para insertarla en la BBDD
	$imagenBinaria = addslashes(file_get_contents($_FILES['info_imagen']['tmp_name']));
//Nombre del archivo
	$nombreArchivo = $_FILES['info_imagen']['name'];
     


	//Extensiones permitidas
	$extensiones = array('jpg', 'jpeg', 'gif', 'png', 'bmp');

	//Obtenemos la extensi�n (en min�sculas) para poder comparar
	$extension = strtolower(end(explode('.', $nombreArchivo))); 

	//Verificamos que sea una extensi�n permitida, si no lo es mostramos un mensaje de error
  	if(!in_array($extension, $extensiones)) {
		die( 'S�lo se permiten archivos con las siguientes extensiones: '.implode(', ', $extensiones) );
		   }

		else {
		//Si la extensi�n es correcta, procedemos a comprobar el tama�o del archivo subido
		//Y definimos el m�ximo que se puede subir
		//Por defecto el m�ximo es de 2 MB, pero se puede aumentar desde el .htaccess o en la directiva 'upload_max_filesize' en el php.ini

		$tama�oArchivo = $_FILES['info_imagen']['size']; //Obtenemos el tama�o del archivo en Bytes
		$tama�oArchivoKB = round(intval(strval( $tama�oArchivo / 1024 ))); //Pasamos el tama�o del archivo a KB

		$tama�oMaximoKB = "2048"; //Tama�o m�ximo expresado en KB
		$tama�oMaximoBytes = $tama�oMaximoKB * 1024; // -> 2097152 Bytes -> 2 MB

		//Comprobamos el tama�o del archivo, y mostramos un mensaje si es mayor al tama�o expresado en Bytes
		if($tama�oArchivo > $tama�oMaximoBytes) {
			die( "El archivo ".$nombreArchivo." es demasiado grande. El tama�o m�ximo del archivo es de ".$tama�oMaximoKB."Kb." ); }
		
        else {
            $traerIdActividad="select id_actividad from actividad where nombre_actividad='infoViaje'";
            $verificarId = $conexion->query($traerIdActividad) or die($conexion->error);
               if($verificarId){
               	  $regIdActividad= $verificarId->fetch_array(MYSQLI_ASSOC);
               	  $numIdAct= $regIdActividad["id_actividad"];
                   

              
			//Si el tama�o es correcto, subimos los datos
			$consulta = "insert into info_viaje (nombre_lugar, imagen, descripcion, id_actividad) 
			VALUES ('$titulo','$imagenBinaria','$descripcion','$numIdAct')";
			//ejecuto consulta
             $guardarRdo= $conexion->query($consulta) or die($conexion->error);
			//Hacemos la inserci�n, y si es correcta, se procede
			if($guardarRdo) {
				//Reiniciamos los inputs
				echo '<script>
						$("#enviarimagenes input,textarea").each(function(infoviajeAdminEgdo) {
						$(this).val("");
						});
					</script>';
				//Cerramos la conexi�n con MySQL
				$conexion->close();
				//Mostramos un mensaje
				die( "El archivo con el nombre ".$nombreArchivo." fue subido. Su peso es de ".$tama�oArchivoKB." KB." );
			}

		}	 else {
				//Si hay alg�n error con la inserci�n, se muestra un mensaje
				die( "Parece que ha habido un error. Recargue la p�gina e int�ntelo nuevamente." );
			};


		};
	};



};
?>