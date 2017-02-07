<?php

require('config_bd.php');

$id_usuario=base64_decode($_POST['user']);
//Obtenemos los datos del formulario de registro
$passwordPOST = $_POST["password"]; 

//Filtro anti-XSS
$passwordPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $passwordPOST));


//Definimos la cantidad máxima de caracteres
//Esta comprobación se tiene en cuenta por si se llegase a modificar el "maxlength" del formulario
//Los valores deben coincidir con el tamaño máximo de la fila de la base de datos
$maxCaracteresDatos = "45";

//Si los input son de mayor tamaño, se "muere" el resto del código y muestra la respuesta correspondiente

if(filter_var($id_usuario, FILTER_VALIDATE_INT) === false){  
	echo 'Valor incorrecto';
	die();  
}else if(empty($passwordPOST)) {
	echo "Contraseña es requerido."; // wrong details 
	die();
}else if(strlen($passwordPOST) > $maxCaracteresDatos){
	echo "Contraseña no debe tener mas de 45 caracteres."; // wrong details 
	die();
}   
else {

	$hash = password_hash($passwordPOST, PASSWORD_BCRYPT);
	
	$consulta = ("UPDATE usuario SET contrasenia='$hash' WHERE id_usuario= '$id_usuario' ");
	
	if(mysqli_query($conexion, $consulta)) {
		echo "ok";
		die();
	} else {
		echo "Errores en la modificacion de datos";
		die();
	};

	
};//Fin comprobación if(empty($userPOST) || empty($passPOST))
?>
