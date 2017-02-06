<?php

require('config_bd.php');

//$id_usuario=$_SESSION["id_usuario"];

//Obtenemos los datos del formulario de registro

$escuelaPOST = $_POST["esc_name"];
$localidadPOST = $_POST["esc_loc"];
$cursoPOST = $_POST["esc_curso"];
$divisionPOST = $_POST["esc_div"];
$cantidadPOST = $_POST["esc_cant"];
//$fecha_altaPOST = $_POST["esc_fecha"];
$fechaPOST=date("y-m-d");


//Filtro anti-XSS
$escuelaPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $escuelaPOST));
$localidadPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $localidadPOST));
$cursoPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $cursoPOST));
$divisionPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $divisionPOST));
$cantidadPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $cantidadPOST));


//Definimos la cantidad máxima de caracteres
//Esta comprobación se tiene en cuenta por si se llegase a modificar el "maxlength" del formulario
//Los valores deben coincidir con el tamaño máximo de la fila de la base de datos

// nombre_escuela 
$maxCaracteresEscuela = "45";
//localidad
$maxCaracteresLocalidad = "70";
//curso - anio - letra
$maxCaracteresCurso = "1";
//cant_alumnos
$maxCaracteresCantidad = "2";

//Si los input son de mayor tamaño, se "muere" el resto del código y muestra la respuesta correspondiente
//if(strlen($nombre_empresaPOST) > $maxCaracteresDatos) {
	//die('El nombre de usuario no puede superar los '.$maxCaracteresUsername.' caracteres');
//};

//Si el input de usuario o contraseña está vacío, mostramos un mensaje de error
//Si el valor del input del usuario es igual a alguno que ya exista, mostramos un mensaje de error
if(empty($escuelaPOST)) {
	echo "Nombre de escuela es requerido."; // wrong details 
	die();
}else if(strlen($escuelaPOST) > $maxCaracteresEscuela){
	echo "Nombre no debe tener mas de 45 caracteres."; // wrong details 
	die();
}else if(empty($localidadPOST)){
	echo "Localidad es requerido."; // wrong details 
	die();
} else if(strlen($localidadPOST) > $maxCaracteresLocalidad) {
	echo "Localidad no debe tener mas de 70 caracteres."; // wrong details 
	die();
} else if (empty($cursoPOST)) {
	echo "Curso es requerido."; // wrong details 
	die();
} else if (strlen($cursoPOST) > $maxCaracteresCurso ){
	echo "Curso no debe tener mas un caracter."; // wrong details 
	die();
} else if (empty($divisionPOST)) {
	echo "Division es requerido."; // wrong details 
	die();
} else if (strlen($divisionPOST) > $maxCaracteresCurso ){
	echo "Division no debe tener mas de un caracter."; // wrong details 
	die();
} else if (empty($cantidadPOST)){
	echo "Cantidad es requerido."; // wrong details 
	die();
} else if (strlen($cantidadPOST) > $maxCaracteresCantidad){
	echo "Cantidad no debe tener mas de 2 caracteres."; // wrong details 
	die();
} 
else{
	
	$escuelaMayusPOST = strtoupper($escuelaPOST);
	$localidadMayusPOST = strtoupper($localidadPOST);
	$divisionMayusPOST = strtoupper($divisionPOST);

	//Armamos la consulta para introducir los datos
	$consulta = ("INSERT INTO curso (nombre_escuela,localidad, curso_anio, curso_letra, cant_alumnos,
				 fecha_creacion) VALUES ('$escuelaMayusPOST','$localidadMayusPOST','$cursoPOST','$divisionMayusPOST','$cantidadPOST','$fechaPOST')");
	
	
	//Si los datos se introducen correctamente, mostramos los datos
	//Sino, mostramos un mensaje de error
	if(mysqli_query($conexion, $consulta)) {
		echo "ok";
		die();
	} else {
		echo "Errores en la insercion de datos";
		die();
	};
};//Fin comprobación if(empty($userPOST) || empty($passPOST))
?>