<?php

require('config_bd.php');

//$id_usuario=$_SESSION["id_usuario"];

//Obtenemos los datos del formulario de registro

$nombre_empresaPOST = $_POST["emp_name"];
$telefonoPOST = $_POST["emp_tel"];
$callePOST = $_POST["emp_calle"];
$emailPOST = $_POST["emp_mail"];
$pagina_webPOST = $_POST["emp_www"];
$facebookPOST = $_POST["emp_face"];
$twitterPOST = $_POST["emp_twit"];
$instagramPOST = $_POST["emp_inst"];
//$fecha_altaPOST = $_POST["emp_fecha"];
$fechaPOST=date("y-m-d");
$cuitPOST = $_POST["emp_cuit"];


//Filtro anti-XSS
$nombre_empresaPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $nombre_empresaPOST));
$telefonoPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $telefonoPOST));
$callePOST = htmlspecialchars(mysqli_real_escape_string($conexion, $callePOST));
$emailPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $emailPOST));
$pagina_webPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $pagina_webPOST));
$facebookPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $facebookPOST));
$twitterPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $twitterPOST));
$instagramPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $instagramPOST));
//$fecha_altaPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $fecha_altaPOST));
$cuitPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $cuitPOST));



//Definimos la cantidad m�xima de caracteres
//Esta comprobaci�n se tiene en cuenta por si se llegase a modificar el "maxlength" del formulario
//Los valores deben coincidir con el tama�o m�ximo de la fila de la base de datos

// nombre_empresa - calle - localidad - partido - prov - email - cuit 
$maxCaracteresDatos = "45";
//telefono 
$maxCaracteresTelefono = "20";
//altura
//$maxCaracteresAltura = "11";
//codigo_postal
//$maxCaracteresCodigoPostal = "10";
//url
$maxCaracteresURL = "100";


//Si los input son de mayor tama�o, se "muere" el resto del c�digo y muestra la respuesta correspondiente
//Si el input de usuario o contrase�a est� vac�o, mostramos un mensaje de error
//Si el valor del input del usuario es igual a alguno que ya exista, mostramos un mensaje de error
if(empty($nombre_empresaPOST)) {
	echo "Nombre empresa es requerido."; // wrong details 
	die();
}else if(strlen($nombre_empresaPOST) > $maxCaracteresDatos) {
	echo "Nombre empresa no puede superar los 45 caracteres"; // wrong details 
	die(); 
}else if(empty($telefonoPOST)) {
	echo "Telefono es requerido."; // wrong details 
	die();
}else if(strlen($telefonoPOST) > $maxCaracteresTelefono) {
	echo "Telefono no puede superar los 20 caracteres"; // wrong details 
	die(); 
}else if (empty($callePOST)) {
	echo "Calle es requerido."; // wrong details 
	die();
}else if(strlen($callePOST) > $maxCaracteresDatos) {
	echo "Calle no puede superar los 45 caracteres"; // wrong details 
	die();
}else if(empty($emailPOST)) {
	echo "Email es requerido"; // wrong details 
	die();
}else if(strlen($emailPOST) > $maxCaracteresDatos) {
	echo "Email no puede superar los 45 caracteres"; // wrong details 
	die();
}else if(strlen($pagina_webPOST) > $maxCaracteresURL) {
	echo "Pagina Web no puede superar los 100 caracteres"; // wrong details 
	die();
}else if(strlen($facebookPOST) > $maxCaracteresURL) {
	echo "Direccion facebook no puede superar los 100 caracteres"; // wrong details 
	die();
}else if(strlen($twitterPOST) > $maxCaracteresURL) {
	echo "Direccion twitter no puede superar los 100 caracteres"; // wrong details 
	die();
}else if(strlen($instagramPOST) > $maxCaracteresURL) {
	echo "Direccion instagram no puede superar los 100 caracteres"; // wrong details 
	die();
}else if(empty($cuitPOST)) {
	echo "CUIT es requerido"; // wrong details 
	die();
}else if(strlen($cuitPOST) > $maxCaracteresDatos) {
	echo "CUIT no puede superar los 45 caracteres"; // wrong details 
	die();
}else if(!isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0) {
	die( "ha ocurrido un error" );
	//Si los inputs est�n seteados y el archivo no tiene errores, se procede
} else if($_FILES['imagen']['error'] === 0) 
	{

	//Convertimos la informaci�n de la imagen en binario para insertarla en la BBDD
	$imagenBinaria = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

	//Nombre del archivo
	$nombreArchivo = $_FILES['imagen']['name'];

	//Extensiones permitidas
	$extensiones = array('jpg', 'jpeg', 'gif', 'png', 'bmp');

	//Obtenemos la extensi�n (en min�sculas) para poder comparar
	$extensionExp = explode('.', $nombreArchivo);
	$extensionEnd = end($extensionExp);
	$extension = strtolower($extensionEnd);	
		
		//Verificamos que sea una extensi�n permitida, si no lo es mostramos un mensaje de error
		if(!in_array($extension, $extensiones)) {
		die( 'S�lo se permiten archivos con las siguientes extensiones: '.implode(', ', $extensiones) );
		} else {
		
			//Si la extensi�n es correcta, procedemos a comprobar el tama�o del archivo subido
			//Y definimos el m�ximo que se puede subir
			//Por defecto el m�ximo es de 2 MB, pero se puede aumentar desde el .htaccess o en la directiva 	'upload_max_filesize' en el php.ini

			$tama�oArchivo = $_FILES['imagen']['size']; //Obtenemos el tama�o del archivo en Bytes
			$tama�oArchivoKB = round(intval(strval( $tama�oArchivo / 1024 ))); //Pasamos el tama�o del archivo a KB

			$tama�oMaximoKB = "2048"; //Tama�o m�ximo expresado en KB
			$tama�oMaximoBytes = $tama�oMaximoKB * 1024; // -> 2097152 Bytes -> 2 MB

			//Comprobamos el tama�o del archivo, y mostramos un mensaje si es mayor al tama�o expresado en Bytes
			if($tama�oArchivo > $tama�oMaximoBytes) {
			die( "El archivo ".$nombreArchivo." es demasiado grande. El tama�o m�ximo del archivo es de ".$tama�oMaximoKB."Kb." );
			} else {

				//Armamos la consulta para introducir los datos
	
				$nombrePOST = mb_strtoupper($nombre_empresaPOST);
				$telefonoPOST = mb_strtoupper($telefonoPOST);
				$callePOST = mb_strtoupper($callePOST);
				//$localidadPOST = mb_strtoupper($localidadPOST);
				//$partidoPOST = mb_strtoupper($partidoPOST);
				//$provinciaPOST = mb_strtoupper($provinciaPOST);
	
				$consulta = ("INSERT INTO empresa (nombre_empresa,telefono,calle,email,pagina_web,facebook,twitter,
				instagram,fecha_alta,cuit,logo) VALUES ('$nombrePOST','$telefonoPOST','$callePOST','$emailPOST',
				'$pagina_webPOST','$facebookPOST','$twitterPOST','$instagramPOST','$fechaPOST','$cuitPOST','$imagenBinaria')");

	
	
				//Si los datos se introducen correctamente, mostramos los datos
				//Sino, mostramos un mensaje de error
				if(mysqli_query($conexion, $consulta)) {
					echo "ok";
					die();
				} else {
					echo "errores" ;
					die();
				};
			};//Fin condicional tama�o archivo

		};//Fin condicional extensiones
};//Fin comprobaci�n if(empty($userPOST) || empty($passPOST))
?>