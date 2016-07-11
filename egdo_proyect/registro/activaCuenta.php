<?php

$datos = $_GET;

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "egdo_db";
$tbl_name = "usuario";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
die("La conexion falló: " . $conexion->connect_error);
}											

//consulta si el email y id_confirmacion se encuentran asociados
$buscarUsuario = 'SELECT * FROM usuario
WHERE email ="'. $datos["email"].'" and id_confirmacion="'. $datos["id_confirmacion"].'"';

$result = $conexion->query($buscarUsuario);

$count = mysqli_num_rows($result);

if ($count == 1) {

	//al dar ok se actualiza el estado de activacion a 1 y se redirecciona al paso 2
	$query = 'UPDATE usuario SET estadoActivacion = 1 
	WHERE email ="'. $datos["email"].'" and id_confirmacion="'. $datos["id_confirmacion"].'"';
	mysqli_query($conexion,$query);
	mysqli_close($conexion);
	header('Location:registroPaso2.php');

}
else {
	echo 'Error al activar la cuenta';
}

mysqli_close($conexion);
?>