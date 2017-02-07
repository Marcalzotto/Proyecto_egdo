<?php

require('config_bd.php');

//$id_usuario=$_SESSION["id_usuario"];

//Obtenemos los datos del formulario de registro

$id_usuario=base64_decode($_POST['usu']);
$user_namePOST = $_POST["user_name"];
$user_apellidoPOST = $_POST["user_apellido"];
$user_emailPOST = $_POST["user_email"];
$user_rolPOST = $_POST["user_rol"];
$user_cursoPOST = $_POST["user_curso"];
$user_estadoPOST = $_POST["user_estado"];
//$fecha_altaPOST = $_POST["esc_fecha"];



//Filtro anti-XSS
$user_namePOST = htmlspecialchars(mysqli_real_escape_string($conexion, $user_namePOST));
$user_apellidoPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $user_apellidoPOST));
$user_emailPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $user_emailPOST));
$user_rolPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $user_rolPOST));
$user_cursoPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $user_cursoPOST));
$user_estadoPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $user_estadoPOST));

//Definimos la cantidad máxima de caracteres
//Esta comprobación se tiene en cuenta por si se llegase a modificar el "maxlength" del formulario
//Los valores deben coincidir con el tamaño máximo de la fila de la base de datos

// nombre - apellido
$maxCaracteresDatos = "45";
//rol
$maxCaracteresRol = "11";
//curso
$maxCaracteresCurso = "11";
//estado
$maxCaracteresEstado = "1";

//Si los input son de mayor tamaño, se "muere" el resto del código y muestra la respuesta correspondiente
//if(strlen($nombre_empresaPOST) > $maxCaracteresDatos) {
	//die('El nombre de usuario no puede superar los '.$maxCaracteresUsername.' caracteres');
//};

//Si el input de usuario o contraseña está vacío, mostramos un mensaje de error
//Si el valor del input del usuario es igual a alguno que ya exista, mostramos un mensaje de error
if(filter_var($id_usuario, FILTER_VALIDATE_INT) === false){  
	echo 'Valor incorrecto';
	die();  
}else if(empty($user_namePOST)) {
	echo "Nombre es requerido."; // wrong details 
	die();
}else if(strlen($user_namePOST) > $maxCaracteresDatos){
	echo "Nombre no debe tener mas de 45 caracteres."; // wrong details 
	die();
}else if(empty($user_apellidoPOST)){
	echo "Apellido es requerido."; // wrong details 
	die();
} else if(strlen($user_apellidoPOST) > $maxCaracteresDatos) {
	echo "Apellido no debe tener mas de 45 caracteres."; // wrong details 
	die();
} else if(empty($user_emailPOST)) {
	echo "Email es requerido."; // wrong details 
	die();
}else if (filter_var($user_emailPOST, FILTER_VALIDATE_EMAIL) === false) { 
	echo "Email formato incorrecto."; // wrong details 
	die();
} else if(strlen($user_emailPOST) > $maxCaracteresDatos) {
	echo "Email no puede superar los 45 caracteres.";// wrong details 
	die();
}else if (filter_var($user_rolPOST, FILTER_VALIDATE_INT) === false) { 
	echo "Rol valor incorrecto."; // wrong details 
	die();
} else if (strlen($user_rolPOST) > $maxCaracteresRol ){
	echo "Rol no debe tener mas 11 caracteres."; // wrong details 
	die();
} else if (filter_var($user_cursoPOST, FILTER_VALIDATE_INT) === false) { 
	echo "Curso valor incorrecto."; // wrong details 
	die();
}else if (strlen($user_cursoPOST) > $maxCaracteresCurso ){
	echo "Curso no debe tener mas de 11 caracteres."; // wrong details 
	die();
}else if (filter_var($user_estadoPOST, FILTER_VALIDATE_INT) === false) { 
	echo "Estado valor incorrecto."; // wrong details 
	die();
}else if (strlen($user_cursoPOST) > $maxCaracteresEstado ){
	echo "Estado no debe tener mas de 1 caracteres."; // wrong details 
	die();
} else	{
	
	$user_namePOST = strtoupper($user_namePOST);
	$user_apellidoPOST = strtoupper($user_apellidoPOST);
	
	//Armamos la consulta para introducir los datos
	$consulta = ("UPDATE usuario SET nombre='$user_namePOST', apellido='$user_apellidoPOST', email='$user_emailPOST', id_rol='$user_rolPOST',id_curso='$user_cursoPOST', estadoActivacion='$user_estadoPOST' 
	WHERE id_usuario='$id_usuario'");
	
	
	//Si los datos se introducen correctamente, mostramos los datos
	//Sino, mostramos un mensaje de error
	if(mysqli_query($conexion, $consulta)) {
		echo "ok";
		die();
	} else {
		echo "Errores en la modificacion de datos";
		die();
	};
};//Fin comprobación if(empty($userPOST) || empty($passPOST))
?>