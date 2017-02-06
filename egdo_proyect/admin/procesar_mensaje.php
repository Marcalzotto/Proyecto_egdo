<?php
include ("../bloqueSeguridad.php");
require('config_bd.php');

//$emisorPOST=$_SESSION["id_usuario"];

//Obtenemos los datos del formulario 

$asuntoPOST = $_POST["asunto"];
$mensajePOST = $_POST["ccomment"];
//Establecemos zona horaria para obtener fecha
date_default_timezone_set('America/Argentina/Buenos_Aires');
$fecha_hora = date("Y-n-d-H-i-s");
//$emisorPOST = 1;
$emisorPOST=$_SESSION["id_usuario"];
$receptorPOST = $_POST["receptor"];

//Filtro anti-XSS
$asuntoPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $asuntoPOST));
$mensajePOST = htmlspecialchars(mysqli_real_escape_string($conexion, $mensajePOST));
$emisorPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $emisorPOST));
$receptorPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $receptorPOST));

//Definimos la cantidad máxima de caracteres
//Esta comprobación se tiene en cuenta por si se llegase a modificar el "maxlength" del formulario
//Los valores deben coincidir con el tamaño máximo de la fila de la base de datos

// asunto-mensaje
$maxCaracteres = "45";

//Si los input son de mayor tamaño, se "muere" el resto del código y muestra la respuesta correspondiente
//Si el input de usuario o contraseña está vacío, mostramos un mensaje de error
//Si el valor del input del usuario es igual a alguno que ya exista, mostramos un mensaje de error
if(filter_var($emisorPOST, FILTER_VALIDATE_INT) === false){  
	echo 'Valor incorrecto';
	die();  
}else if(filter_var($receptorPOST, FILTER_VALIDATE_INT) === false){  
	echo 'Valor incorrecto';
	die();
}else if(empty($asuntoPOST)) {
	echo "Asunto es requerido."; // wrong details 
	die(); 
}else if(strlen($asuntoPOST) > $maxCaracteres) {
	echo "Asunto no puede superar los 45 caracteres"; // wrong details 
	die();
}else if(empty($mensajePOST)) {
	echo "Mensaje es requerido."; // wrong details 
	die(); 
}else if(strlen($mensajePOST) > $maxCaracteres) {
	echo "Mensaje no puede superar los 45 caracteres"; // wrong details 
	die();
}else{
				//Armamos la consulta para introducir los datos
				$asuntoPOST = mb_strtoupper($asuntoPOST);
				$mensajePOST = mb_strtoupper($mensajePOST);
				
				$consulta = ("INSERT INTO mensajes_privado (asunto,mensaje,fecha_hora,id_emisor,id_receptor) VALUES ('$asuntoPOST','$mensajePOST','$fecha_hora','$emisorPOST','$receptorPOST')");
				  
				
				//Si los datos se introducen correctamente, mostramos los datos
				//Sino, mostramos un mensaje de error
				if(mysqli_query($conexion, $consulta)) {
					echo "ok";
					die();
				} else {
					echo "errores 1" ;
					die();
				};
};//Fin comprobación if(empty($userPOST) || empty($passPOST))
?>