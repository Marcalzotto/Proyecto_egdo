<?php

require('../../config_bd.php');

$id_usuario=$_SESSION["id_usuario"];

//Obtenemos los datos del formulario de registro
$namePOST = $_POST["name"]; 
$surnamePOST = $_POST["surname"];
$repassPOST = $_POST["repass"];


//Filtro anti-XSS
$namePOST = htmlspecialchars(mysqli_real_escape_string($conexion, $namePOST));
$surnamePOST = htmlspecialchars(mysqli_real_escape_string($conexion, $surnamePOST));
$repassPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $repassPOST));

//Definimos la cantidad máxima de caracteres
//Esta comprobación se tiene en cuenta por si se llegase a modificar el "maxlength" del formulario
//Los valores deben coincidir con el tamaño máximo de la fila de la base de datos
$maxCaracteresName = "45";
$maxCaracteresSurname = "45";
$maxCaracteresRepass = "256";

//Si los input son de mayor tamaño, se "muere" el resto del código y muestra la respuesta correspondiente
if(strlen($namePOST) > $maxCaracteresName) {
	die('El nombre de usuario no puede superar los '.$maxCaracteresUsername.' caracteres');
};

if(strlen($surnamePOST) > $maxCaracteresSurname) {
	die('El apellido de usuario no puede superar los '.$maxCaracteresUsername.' caracteres');
};


if(strlen($repassPOST) > $maxCaracteresRepass) {
	die('La contraseña no puede superar los '.$maxCaracteresPassword.' caracteres');
};

//Pasamos el input del usuario a minúsculas para compararlo después con
//el campo "usernamelowercase" de la base de datos
//$userPOSTMinusculas = strtolower($userPOST);

//Escribimos la consulta necesaria
//$consultaUsuarios = "SELECT usernamelowercase FROM `mmv005`";

//Obtenemos los resultados
//$resultadoConsultaUsuarios = mysqli_query($conexion, $consultaUsuarios) or die(mysql_error());
//$datosConsultaUsuarios = mysqli_fetch_array($resultadoConsultaUsuarios);
//$userBD = $datosConsultaUsuarios['usernamelowercase'];

//Si el input de usuario o contraseña está vacío, mostramos un mensaje de error
//Si el valor del input del usuario es igual a alguno que ya exista, mostramos un mensaje de error
if(empty($namePOST) || empty($surnamePOST) || empty($repassPOST)) {
	die('Debes introducir datos válidos');
} else {
//Si no hay errores, procedemos a encriptar la contraseña
//Lectura recomendada: https://mimentevuela.wordpress.com/2015/10/08/establecer-blowfish-como-salt-en-crypt-2/
	
	 $hash = password_hash($repassPOST, PASSWORD_BCRYPT); 
	 
	 //Armamos la consulta para introducir los datos
	//$consulta = "INSERT INTO `mmv005` (username, usernamelowercase, password) 
	//VALUES ('$userPOST', '$userPOSTMinusculas' , '$passwordConSalt')";
	
	$consulta = ("UPDATE usuario SET nombre='$namePOST', apellido='$surnamePOST', contrasenia='$hash' 
				where id_usuario= '$id_usuario' ");
	
	//Si los datos se introducen correctamente, mostramos los datos
	//Sino, mostramos un mensaje de error
	if(mysqli_query($conexion, $consulta)) {
		die('<script>$(".acceso").val("");</script>
Datos actualizado correctamente <br> ');
	} else {
		die('Error');
	};
};//Fin comprobación if(empty($userPOST) || empty($passPOST))
?>
