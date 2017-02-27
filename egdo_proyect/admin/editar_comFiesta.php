<?php

require('config_bd.php');

//$id_usuario=$_SESSION["id_usuario"];

//Obtenemos los datos del formulario de registro

$id_comentario=base64_decode($_POST['comentario']);
$commentPOST = $_POST["comment"];
$estadoPOST = $_POST["agree"];

//Filtro anti-XSS
$commentPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $commentPOST));


//Definimos la cantidad máxima de caracteres
//Esta comprobación se tiene en cuenta por si se llegase a modificar el "maxlength" del formulario
//Los valores deben coincidir con el tamaño máximo de la fila de la base de datos

// nombre_escuela 
$maxCaracteresComm = "45";


//Si los input son de mayor tamaño, se "muere" el resto del código y muestra la respuesta correspondiente
//if(strlen($nombre_empresaPOST) > $maxCaracteresDatos) {
	//die('El nombre de usuario no puede superar los '.$maxCaracteresUsername.' caracteres');
//};

//Si el input de usuario o contraseña está vacío, mostramos un mensaje de error
//Si el valor del input del usuario es igual a alguno que ya exista, mostramos un mensaje de error
if(filter_var($id_comentario, FILTER_VALIDATE_INT) === false){  
	echo 'Valor incorrecto';
	die();  
}else if(empty($commentPOST)) {
	echo "Seleccione una categoria."; // wrong details 
	die();
}else if(strlen($commentPOST) > $maxCaracteresComm){
	echo "Categoria no debe tener mas de 45 caracteres."; // wrong details 
	die();
} else if(empty($estadoPOST)) {
	echo "Debe seleccionar estado"; // wrong details 
	die();
}
else{
	
	
	$estadoPOST = True;
	$commentMayusPOST = strtoupper($commentPOST);
	
	//Armamos la consulta para introducir los datos
	$consulta = ("UPDATE comentario_fiesta SET comentario ='$commentMayusPOST', estado_moderar ='$estadoPOST' WHERE id_comentario = '$id_comentario'");
	
	//Si los datos se introducen correctamente, mostramos los datos
	//Sino, mostramos un mensaje de error
	if(mysqli_query($conexion, $consulta)) {
		echo "ok";
		die();
	} else {
		echo "Errores en la edicion de datos";
		die();
	};
};//Fin comprobación if(empty($userPOST) || empty($passPOST))
?>