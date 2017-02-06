<?php

require('config_bd.php');

$id_usuario=base64_decode($_POST['user']);
//$id_usuario=1;

//Obtenemos los datos del formulario de registro
$user_emailPOST = $_POST["email"]; 

//Filtro anti-XSS
$user_emailPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $user_emailPOST));


//Definimos la cantidad máxima de caracteres
//Esta comprobación se tiene en cuenta por si se llegase a modificar el "maxlength" del formulario
//Los valores deben coincidir con el tamaño máximo de la fila de la base de datos
$maxCaracteresDatos = "45";

//Si los input son de mayor tamaño, se "muere" el resto del código y muestra la respuesta correspondiente

//Escribimos la consulta necesaria
$consultaEmail = "SELECT email FROM usuario";

//Obtenemos los resultados
$resultadoEmail = mysqli_query($conexion, $consultaEmail) or die(mysql_error());
$emailUsuarios = mysqli_fetch_array($resultadoEmail);

$userBD = $emailUsuarios['email'];


if(filter_var($id_usuario, FILTER_VALIDATE_INT) === false){  
	echo 'Valor incorrecto';
	die();  
}else if(empty($user_emailPOST)) {
	echo "Email es requerido."; // wrong details 
	die();
}else if (filter_var($user_emailPOST, FILTER_VALIDATE_EMAIL) === false) { 
	echo "Email formato incorrecto."; // wrong details 
	die();
} else if(strlen($user_emailPOST) > $maxCaracteresDatos) {
	echo "Email no puede superar los 45 caracteres.";// wrong details 
	die();   
}else if ($user_emailPOST == $userBD) {
	echo "Email no se encuentra disponible.";// wrong details 
	die();
}else {

	$consulta = ("UPDATE usuario SET email='$user_emailPOST' WHERE id_usuario= '$id_usuario'");
	
	if(mysqli_query($conexion, $consulta)) {
		echo "ok";
		die();
	} else {
		echo "Errores en la modificacion de datos";
		die();
	};

	
};//Fin comprobación if(empty($userPOST) || empty($passPOST))
?>