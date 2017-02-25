<?php

//Conectamos a la base de datos
include('../pag_interiores/conexion.php');

$buscarUsuario = 'SELECT * FROM usuario WHERE email ="'.$_SESSION['email'].'"';

$result = $conexion->query($buscarUsuario);

$row = mysqli_fetch_array($result);//devuelve info utilizando nombre de campo (mysql_fetch_array da error, agregar i)


//mysqli_close($conexion);
?>