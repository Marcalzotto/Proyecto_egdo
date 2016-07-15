<?php
//Conectamos a la base de datos
//require('../../conexion.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "egdo_db";

//$id_usuario=$_SESSION["id_usuario"];
// Create connection
$conexion = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}

//Obtenemos los datos del formulario de registro
$namePOST = $_POST["name"]; 
$emailPOST = $_POST["email"];
$messagePOST = $_POST["message"];


//Filtro anti-XSS
$namePOST = htmlspecialchars(mysqli_real_escape_string($conexion, $namePOST));
$emailPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $emailPOST));
$messagePOST = htmlspecialchars(mysqli_real_escape_string($conexion, $messagePOST));

//Definimos la cantidad m�xima de caracteres
//Esta comprobaci�n se tiene en cuenta por si se llegase a modificar el "maxlength" del formulario
//Los valores deben coincidir con el tama�o m�ximo de la fila de la base de datos
$maxCaracteresName = "45";
$maxCaracteresEmail = "45";
$maxCaracteresMensaje = "250";

//Si los input son de mayor tama�o, se "muere" el resto del c�digo y muestra la respuesta correspondiente
if(strlen($namePOST) > $maxCaracteresName) {
	die('El nombre de usuario no puede superar los '.$maxCaracteresUsername.' caracteres');
};

if(strlen($emailPOST) > $maxCaracteresEmail) {
	die('El apellido de usuario no puede superar los '.$maxCaracteresUsername.' caracteres');
};


if(strlen($messagePOST) > $maxCaracteresMensaje) {
	die('La contrase�a no puede superar los '.$maxCaracteresPassword.' caracteres');
};

//Pasamos el input del usuario a min�sculas para compararlo despu�s con
//el campo "usernamelowercase" de la base de datos
//$userPOSTMinusculas = strtolower($userPOST);

//Escribimos la consulta necesaria
//$consultaUsuarios = "SELECT usernamelowercase FROM `mmv005`";

//Obtenemos los resultados
//$resultadoConsultaUsuarios = mysqli_query($conexion, $consultaUsuarios) or die(mysql_error());
//$datosConsultaUsuarios = mysqli_fetch_array($resultadoConsultaUsuarios);
//$userBD = $datosConsultaUsuarios['usernamelowercase'];

//Si el input de usuario o contrase�a est� vac�o, mostramos un mensaje de error
//Si el valor del input del usuario es igual a alguno que ya exista, mostramos un mensaje de error
if(empty($namePOST) || empty($emailPOST) || empty($messagePOST)) {
	die('Debes introducir datos v�lidos');
} else {
//Si no hay errores, procedemos a encriptar la contrase�a
//Lectura recomendada: https://mimentevuela.wordpress.com/2015/10/08/establecer-blowfish-como-salt-en-crypt-2/
	
	 //$hash = password_hash($repassPOST, PASSWORD_BCRYPT); 
	 
	 //Armamos la consulta para introducir los datos
	//$consulta = "INSERT INTO `mmv005` (username, usernamelowercase, password) 
	//VALUES ('$userPOST', '$userPOSTMinusculas' , '$passwordConSalt')";
	
	$consulta = "INSERT INTO contacto (nombre_empresa, email, mensaje) VALUES ('$namePOST','$emailPOST','$messagePOST')";
	
	//Si los datos se introducen correctamente, mostramos los datos
	//Sino, mostramos un mensaje de error
	if(mysqli_query($conexion, $consulta)) {
		die('<script>$(".acceso").val("");</script> Consulta enviada <br> ');
	} else {
		die('Error');
	};
};//Fin comprobaci�n if(empty($userPOST) || empty($passPOST))
?>