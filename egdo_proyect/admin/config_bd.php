<?php
//Conexion general a la base de datos
//require('../../conexion.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "egdo_db";

//$id_usuario=$_SESSION["id_usuario"];
// Create connection
$conexion = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}






?>