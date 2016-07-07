<?php
session_start();
?>

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

$email = $_POST['email'];
$contrasenia = $_POST['password'];

//echo "Bienvenido! " . $email;

$sql = "SELECT * FROM $tbl_name WHERE email = '$email'";

$result = $conexion->query($sql);


if ($result->num_rows === 1) {
//echo "alert('usuario bien')";
 $row = $result->fetch_array(MYSQLI_ASSOC); 
 
 if (password_verify($contrasenia, $row['contrasenia'])) { 
 
 $_SESSION['loggedin'] = true;
 $_SESSION['nombre'] = $row['nombre'];
 $_SESSION['email'] = $email;
 $_SESSION['start'] = time();
 $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

 //echo "Bienvenido! " . $_SESSION['email'] . $_SESSION['nombre'];
 header('Location: ../pag_interiores/indexUsuarioAdminCurso.php');
 //echo "<br><br><a href=../pag_interiores/index_general.html>ir a index usuario comun</a>"; 

 } else { 
 
 echo '<script>alert("Email o Password incorrectoooooooooooo");</script>';
 echo "<br><a href='../index.php'>Volver a Intentarlo</a>";
 
 //echo "<script>"+"window.location.assign('" + site_url("/controller/method") + "')""</script>";
 //echo '<script language="javascript">alert("Email o Password incorrecto");</script>';
//echo '<script>alert("Email o Password incorrectoooooooooooo");</script>';
//echo '<script>window.location.href="../index.php";</script>';
//header('Location: ../index.php');

 }
}
mysqli_close($conexion); 
?>