<?php

$datos = $_GET;

//Conectamos a la base de datos
include('../pag_interiores/conexion.php');										

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
	header('Location:registroPaso2.php?email='.$datos["email"].'');

}
else {
	echo 'Error al activar la cuenta';
}

mysqli_close($conexion);
?>