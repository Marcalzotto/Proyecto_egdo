<?php
session_start();
?>

<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "32636185";
$db_name = "egdo_db";
$tbl_name = "user";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$email = $_POST['form-username'];
$contrasenia = $_POST['form-password'];

//echo "Bienvenido! " . $email;

$sql = "SELECT * FROM $tbl_name WHERE email = '$email'";

$result = $conexion->query($sql);


if ($result->num_rows === 1) {
echo "alert('usuario bien')";
 $row = $result->fetch_array(MYSQLI_ASSOC); 
 
 if (password_verify($contrasenia, $row['contrasenia'])) { 
 
 $_SESSION['loggedin'] = true;
 $_SESSION['email'] = $email;
 $_SESSION['start'] = time();
 $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

 echo "Bienvenido! " . $_SESSION['email'];
 echo "<br><br><a href=prueba.php>Panel de Control</a>"; 

 } else { 
 
 echo "email o Password estan incorrectos.";

 echo "<br><a href='login.html'>Volver a Intentarlo</a>";
 }
}
mysqli_close($conexion); 
?>