<?php

require('config_bd.php');

$id_usuario=base64_decode($_POST['user']);

//Obtenemos los datos del formulario de registro
$namePOST = $_POST["user_name"]; 
$surnamePOST = $_POST["user_apellido"];

//Filtro anti-XSS
$namePOST = htmlspecialchars(mysqli_real_escape_string($conexion, $namePOST));
$surnamePOST = htmlspecialchars(mysqli_real_escape_string($conexion, $surnamePOST));
//$repassPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $repassPOST));

//Definimos la cantidad máxima de caracteres
//Esta comprobación se tiene en cuenta por si se llegase a modificar el "maxlength" del formulario
//Los valores deben coincidir con el tamaño máximo de la fila de la base de datos
$maxCaracteresDatos = "45";

//Si los input son de mayor tamaño, se "muere" el resto del código y muestra la respuesta correspondiente

if(filter_var($id_usuario, FILTER_VALIDATE_INT) === false){  
	echo 'Valor incorrecto';
	die();  
}else if(empty($namePOST)) {
	echo "Nombre es requerido."; // wrong details 
	die();
}else if(strlen($namePOST) > $maxCaracteresDatos){
	echo "Nombre no debe tener mas de 45 caracteres."; // wrong details 
	die();
}else if(empty($surnamePOST)){
	echo "Apellido es requerido."; // wrong details 
	die();
} else if(strlen($surnamePOST) > $maxCaracteresDatos) {
	echo "Apellido no debe tener mas de 45 caracteres."; // wrong details 
	die();
}   
else {

	$namePOST = strtoupper($namePOST);
	$surnamePOST = strtoupper($surnamePOST);
	
	$consulta = ("UPDATE usuario SET nombre='$namePOST', apellido='$surnamePOST' WHERE id_usuario= '$id_usuario' ");
	
	if(mysqli_query($conexion, $consulta)) {
		echo "ok";
		die();
	} else {
		echo "Errores en la modificacion de datos";
		die();
	};

	
};//Fin comprobación if(empty($userPOST) || empty($passPOST))
?>
