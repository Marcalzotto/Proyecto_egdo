<?php include ("../bloqueSeguridad.php");

?>

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
$obtUsuario = $_SESSION['id_usuario'];
$nombre= $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$facebook = $_POST['facebook'];
$twitter = $_POST['twitter'];
$instagram = $_POST['instagram'];
$web = $_POST['web'];
$detalles = $_POST['detalles'];
$foto1 = $_POST['fot1'];
$foto2 = $_POST['fot2'];

//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("&lt;", "&gt;", "&quot;", "&#x27;", "&#x2F;", "&#060;", "&#062;", "&#039;", "&#047;");

$nombre = str_replace($caracteres_malos, $caracteres_buenos, $nombre);
$direccion = str_replace($caracteres_malos, $caracteres_buenos, $direccion);
$telefono = str_replace($caracteres_malos, $caracteres_buenos, $telefono);
$facebook = str_replace($caracteres_malos, $caracteres_buenos, $facebook);
$twitter = str_replace($caracteres_malos, $caracteres_buenos, $twitter);
$instagram = str_replace($caracteres_malos, $caracteres_buenos, $instagram);
$web = str_replace($caracteres_malos, $caracteres_buenos, $web);
$detalles = str_replace($caracteres_malos, $caracteres_buenos, $detalles);

//Cambiamos los ENTER por <br>
$direccion = nl2br($direccion);
$telefono = nl2br($telefono);
$facebook = nl2br($facebook);
$twitter = nl2br($twitter);
$instagram = nl2br($instagram);
$web = nl2br($web);
$detalles = nl2br($detalles);

//Comprobamos que los inputs no estén vacíos, y si lo están, mandamos el mensaje correspondiente
if(empty($nombre)) {
	die( 'Es necesario establecer un nombre' );
} else if(empty($direccion)) {
	die( 'Es necesario establecer una direccion' );
	//"Error 4" en los array de $_FILES significa que ningún archivo fue subido o incluido en el input
	} else if(empty($telefono)) {
	die( 'Es necesario establecer un telefono' );
} else if(empty($facebook)) {
	die( 'Es necesario establecer un facebook' );
	} else if(empty($twitter)) {
	die( 'Es necesario establecer twitter' );
	} else if(empty($instagram)) {
	die( 'Es necesario establecer instagram' );
} else if(empty($web)) {
	die( 'Es necesario establecer una web' );
} else if(empty($detalles)) {
	die( 'Es necesario establecer una detalles' );
} else if($_FILES['fot1']['error'] === 4) {
	die( 'Es necesario establecer una imagen de perfil' );
} else if($_FILES['fot2']['error'] === 4) {
	die( 'Es necesario establecer una segunda imagen' );
	//Si los inputs están seteados y el archivo no tiene errores, se procede
} else if(isset($nombre) AND isset($direccion) AND isset($telefono) AND isset($facebook) AND isset($twitter) AND isset($instagram) AND isset($web) AND isset($detalles) AND $_FILES['fot1']['error'] === 0 ) AND $_FILES['fot2']['error'] === 0 ) {
	//Convertimos la información de la imagen en binario para insertarla en la BBDD
	$imagenBinaria1 = addslashes(file_get_contents($_FILES['fot1']['tmp_name']));
	$imagenBinaria2 = addslashes(file_get_contents($_FILES['fot2']['tmp_name']));
//Nombre del archivo
	$nombreArchivo = $_FILES['fot1']['name'];
     


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

		$tamañoArchivo1 = $_FILES['fot1']['size']; //Obtenemos el tamaño del archivo en Bytes
		$tamañoArchivoKB1 = round(intval(strval( $tamañoArchivo / 1024 ))); //Pasamos el tamaño del archivo a KB

		$tamañoArchivo2 = $_FILES['fot2']['size']; //Obtenemos el tamaño del archivo en Bytes
		$tamañoArchivoKB2 = round(intval(strval( $tamañoArchivo2 / 1024 ))); //Pasamos el tamaño del archivo a KB

		$tamañoMaximoKB1 = "2048"; //Tamaño máximo expresado en KB
		$tamañoMaximoBytes1 = $tamañoMaximoKB * 1024; // -> 2097152 Bytes -> 2 MB

		$tamañoMaximoKB2 = "2048"; //Tamaño máximo expresado en KB
		$tamañoMaximoBytes2 = $tamañoMaximoKB2 * 1024; // -> 2097152 Bytes -> 2 MB

		//Comprobamos el tamaño del archivo, y mostramos un mensaje si es mayor al tamaño expresado en Bytes
		if($tamañoArchivo1 > $tamañoMaximoBytes1) {
			die( "El archivo ".$nombreArchivo." es demasiado grande. El tamaño máximo del archivo es de ".$tamañoMaximoKB1."Kb." ); }
		
        else {
            $traerId="select id_actividad from actividad where nombre_actividad='upd'"; //traer id act
            $verificarId = $conexion->query($traerId) or die($conexion->error);
               if($verificarId){
               	  $regId= $verificarId->fetch_array(MYSQLI_ASSOC);
               	  $numIdAct= $regId["id_actividad"];
                   

              
			//Si el tamaño es correcto, subimos los datos
			$consulta = "insert into upd (nombre, direccion, telefono, facebook, twitter, instagram, pagina_web, datelles_adicionales, imagen1, imagen2, id_actividad, id_usuario_propuesta) 
			VALUES ('$nombre','$telefono', '$facebook','$twitter','$instagram','$web','$detalles',$imagenBinaria1','$imagenBinaria2','$numIdAct', '$obtUsuario')";
			//ejecuto consulta
             $guardarRdo= $conexion->query($consulta) or die($conexion->error);
			//Hacemos la inserción, y si es correcta, se procede
			if($guardarRdo) {
				//Reiniciamos los inputs
				echo '<script>
						$("#mandarimagenes input,textarea").each(function(upd) {
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