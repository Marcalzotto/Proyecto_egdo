<?php

require('config_bd.php');

//$id_usuario=$_SESSION["id_usuario"];

//Obtenemos los datos del formulario de registro

$id_upd=base64_decode($_POST['upd']);


//Si los input son de mayor tamaño, se "muere" el resto del código y muestra la respuesta correspondiente
//Si el input de usuario o contraseña está vacío, mostramos un mensaje de error
//Si el valor del input del usuario es igual a alguno que ya exista, mostramos un mensaje de error

if(filter_var($id_upd, FILTER_VALIDATE_INT) === false){  
	echo 'Valor incorrecto';
	die();  
} else {

				//Armamos la consulta para introducir los datos
	
				$consulta = "UPDATE upd SET foto_lugar='moderada.png',estado_moderar1=1 WHERE id_upd='$id_upd'";
	
				//Si los datos se introducen correctamente, mostramos los datos
				//Sino, mostramos un mensaje de error
				if(mysqli_query($conexion, $consulta)) {
					echo "ok";
					die();
				} else {
					echo "Ocurrieron errores intente mas tarde" ;
					die();
				};
};//Fin condicional tamaño archivo
?>