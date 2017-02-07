<?php

require('config_bd.php');

//$id_usuario=$_SESSION["id_usuario"];

//Obtenemos los datos del formulario de registro

$id_empresa=base64_decode($_POST['emp']);
$nombre_empresaPOST = $_POST["emp_name"];
$telefonoPOST = $_POST["emp_tel"];
$callePOST = $_POST["emp_calle"];
$alturaPOST = $_POST["emp_nro"];
$localidadPOST = $_POST["emp_loc"];
$codigo_postalPOST = $_POST["emp_cp"];
$partidoPOST = $_POST["emp_part"];
$provinciaPOST = $_POST["emp_prov"];
$emailPOST = $_POST["emp_mail"];
$pagina_webPOST = $_POST["emp_www"];
$facebookPOST = $_POST["emp_face"];
$twitterPOST = $_POST["emp_twit"];
$instagramPOST = $_POST["emp_inst"];
$cuitPOST = $_POST["emp_cuit"];


//Filtro anti-XSS
$nombre_empresaPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $nombre_empresaPOST));
$telefonoPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $telefonoPOST));
$callePOST = htmlspecialchars(mysqli_real_escape_string($conexion, $callePOST));
$alturaPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $alturaPOST));
$localidadPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $localidadPOST));
$codigo_postalPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $codigo_postalPOST));
$partidoPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $partidoPOST));
$provinciaPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $provinciaPOST));
$emailPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $emailPOST));
$pagina_webPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $pagina_webPOST));
$facebookPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $facebookPOST));
$twitterPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $twitterPOST));
$instagramPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $instagramPOST));
//$fecha_altaPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $fecha_altaPOST));
$cuitPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $cuitPOST));



//Definimos la cantidad máxima de caracteres
//Esta comprobación se tiene en cuenta por si se llegase a modificar el "maxlength" del formulario
//Los valores deben coincidir con el tamaño máximo de la fila de la base de datos

// nombre_empresa - calle - localidad - partido - prov - email - cuit 
$maxCaracteresDatos = "45";
//telefono 
$maxCaracteresTelefono = "20";
//altura
$maxCaracteresAltura = "11";
//codigo_postal
$maxCaracteresCodigoPostal = "10";
//url
$maxCaracteresURL = "100";


//Si los input son de mayor tamaño, se "muere" el resto del código y muestra la respuesta correspondiente
//Si el input de usuario o contraseña está vacío, mostramos un mensaje de error
//Si el valor del input del usuario es igual a alguno que ya exista, mostramos un mensaje de error
if(filter_var($id_empresa, FILTER_VALIDATE_INT) === false){  
	echo 'Valor incorrecto';
	die();  
}else if(empty($nombre_empresaPOST)) {
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
}else if(empty($alturaPOST)) {
	echo "Altura es requerido."; // wrong details 
	die();
}else if(strlen($alturaPOST) > $maxCaracteresAltura) {
	echo "Altura no puede superar los 11 caracteres";// wrong details 
	die();
}else if(empty($localidadPOST)) {
	echo "Localidad es requerido"; // wrong details 
	die();
}else if(strlen($localidadPOST) > $maxCaracteresDatos) {
	echo "Localidad no puede superar los 45 caracteres";// wrong details 
	die();
}else if(empty($codigo_postalPOST)) {
	echo "CP es requerido"; // wrong details 
	die();
}else if(strlen($codigo_postalPOST) > $maxCaracteresCodigoPostal) {
	echo "CP no puede superar los 10 caracteres"; // wrong details 
	die();
}else if(empty($partidoPOST)) {
	echo "Partido es requerido"; // wrong details 
	die();
}else if(strlen($partidoPOST) > $maxCaracteresDatos) {
	echo "Partido no puede superar los 45 caracteres"; // wrong details 
	die();
}else if(empty($provinciaPOST)) {
	echo "Provincia es requerido"; // wrong details 
	die();
}else if(strlen($provinciaPOST) > $maxCaracteresDatos) {
	echo "Provincia no puede superar los 45 caracteres"; // wrong details 
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
}else if(!isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0){
	//Armamos la consulta para introducir los datos
				
				$nombrePOST = mb_strtoupper($nombre_empresaPOST);
				$telefonoPOST = mb_strtoupper($telefonoPOST);
				$callePOST = mb_strtoupper($callePOST);
				$localidadPOST = mb_strtoupper($localidadPOST);
				$partidoPOST = mb_strtoupper($partidoPOST);
				$provinciaPOST = mb_strtoupper($provinciaPOST);
				
				$consulta = "UPDATE empresa SET nombre_empresa='$nombrePOST', telefono='$telefonoPOST', calle='$callePOST',
				altura='$alturaPOST', localidad='$localidadPOST', codigo_postal='$codigo_postalPOST',
				partido='$partidoPOST', provincia='$provinciaPOST',email='$emailPOST',pagina_web='$pagina_webPOST',
				facebook='$facebookPOST', twitter='$twitterPOST', instagram='$instagramPOST', cuit='$cuitPOST'
				WHERE id_empresa='$id_empresa'";
				  
				
				//Si los datos se introducen correctamente, mostramos los datos
				//Sino, mostramos un mensaje de error
				if(mysqli_query($conexion, $consulta)) {
					echo "ok";
					die();
				} else {
					echo "errores 1" ;
					die();
				};
}else if($_FILES['imagen']['error'] === 0) {           
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
		}else {
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
			
			}else { 
				 
				 
				//Armamos la consulta para introducir los datos
				
				$nombrePOST = mb_strtoupper($nombre_empresaPOST);
				$telefonoPOST = mb_strtoupper($telefonoPOST);
				$callePOST = mb_strtoupper($callePOST);
				$localidadPOST = mb_strtoupper($localidadPOST);
				$partidoPOST = mb_strtoupper($partidoPOST);
				$provinciaPOST = mb_strtoupper($provinciaPOST);
				
				$consulta = "UPDATE empresa SET nombre_empresa='$nombrePOST', telefono='$telefonoPOST', calle='$callePOST',
				altura='$alturaPOST', localidad='$localidadPOST', codigo_postal='$codigo_postalPOST',
				partido='$partidoPOST', provincia='$provinciaPOST',email='$emailPOST',pagina_web='$pagina_webPOST',
				facebook='$facebookPOST', twitter='$twitterPOST', instagram='$instagramPOST', cuit='$cuitPOST', logo='$imagenBinaria'
				WHERE id_empresa='$id_empresa'";
				  
				
				//Si los datos se introducen correctamente, mostramos los datos
				//Sino, mostramos un mensaje de error
				if(mysqli_query($conexion, $consulta)) {
					echo "ok";
					die();
				} else {
					echo "errores 2" ;
					die();
				};
			};//Fin condicional tamaño archivo
		};//Fin condicional extensiones		
};//Fin comprobación if(empty($userPOST) || empty($passPOST))
?>