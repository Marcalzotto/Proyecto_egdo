<?php

require('config_bd.php');

//$id_usuario=$_SESSION["id_usuario"];

//Obtenemos los datos del formulario de registro

$disenioUno=base64_decode($_POST['disenioUno']);


//Si los input son de mayor tamaño, se "muere" el resto del código y muestra la respuesta correspondiente
//Si el input de usuario o contraseña está vacío, mostramos un mensaje de error
//Si el valor del input del usuario es igual a alguno que ya exista, mostramos un mensaje de error

if(filter_var($disenioUno, FILTER_VALIDATE_INT) === false){  
	echo 'Valor incorrecto';
	die();  
}else if( !isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0) {
	die( "Seleccione una Imagen" );
	//Si los inputs están seteados y el archivo no tiene errores, se procede
} else if($_FILES['imagen']['error'] === 0) 
	{

	//Convertimos la información de la imagen en binario para insertarla en la BBDD
	$imagenBinaria = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

	//Nombre del archivo
	$nombreArchivo = $_FILES['imagen']['name'];

	//Extensiones permitidas
	$extensiones = array('jpg', 'jpeg', 'gif', 'png', 'bmp');

	//Obtenemos la extensión (en minúsculas) para poder comparar
	$extensionExp = explode('.', $nombreArchivo);
	$extensionEnd = end($extensionExp);
	$extension = strtolower($extensionEnd);	
		
		//Verificamos que sea una extensión permitida, si no lo es mostramos un mensaje de error
		if(!in_array($extension, $extensiones)) {
		die( 'Sólo se permiten archivos con las siguientes extensiones: '.implode(', ', $extensiones) );
		} else {
		
			//Si la extensión es correcta, procedemos a comprobar el tamaño del archivo subido
			//Y definimos el máximo que se puede subir
			//Por defecto el máximo es de 2 MB, pero se puede aumentar desde el .htaccess o en la directiva 	'upload_max_filesize' en el php.ini

			$tamañoArchivo = $_FILES['imagen']['size']; //Obtenemos el tamaño del archivo en Bytes
			$tamañoArchivoKB = round(intval(strval( $tamañoArchivo / 1024 ))); //Pasamos el tamaño del archivo a KB

			$tamañoMaximoKB = "2048"; //Tamaño máximo expresado en KB
			$tamañoMaximoBytes = $tamañoMaximoKB * 1024; // -> 2097152 Bytes -> 2 MB

			//Comprobamos el tamaño del archivo, y mostramos un mensaje si es mayor al tamaño expresado en Bytes
			if($tamañoArchivo > $tamañoMaximoBytes) {
			die( "El archivo ".$nombreArchivo." es demasiado grande. El tamaño máximo del archivo es de ".$tamañoMaximoKB."Kb." );
			} else {

				//Armamos la consulta para introducir los datos
	
				$consulta = "UPDATE disenio SET disenio_frontal='$imagenBinaria',estado_moderar=1 WHERE id_disenio='$disenioUno'";
	
				//Si los datos se introducen correctamente, mostramos los datos
				//Sino, mostramos un mensaje de error
				if(mysqli_query($conexion, $consulta)) {
					echo "Imagen Subida Correctamente";
					die();
				} else {
					echo "Ocurrieron errores intente mas tarde" ;
					die();
				};
			};//Fin condicional tamaño archivo

		};//Fin condicional extensiones
};//Fin comprobación if(empty($userPOST) || empty($passPOST))
?>