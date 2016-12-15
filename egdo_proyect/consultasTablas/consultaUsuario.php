<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "egdo_db";
$tbl_name = "usuario";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
die("La conexion falló: " . $conexion->connect_error);
}											


$buscarUsuario = 'SELECT * FROM usuario WHERE email ="'.$_SESSION['email'].'"';

$result = $conexion->query($buscarUsuario);

$row = mysqli_fetch_array($result);//devuelve info utilizando nombre de campo (mysql_fetch_array da error, agregar i)


//mysqli_close($conexion);
?>