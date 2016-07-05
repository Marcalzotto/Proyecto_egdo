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

 
 $form_pass = $_POST['contrasenia'];
 
 $hash = password_hash($form_pass, PASSWORD_BCRYPT); 


 $buscarUsuario = "SELECT * FROM $tbl_name
 WHERE email = '$_POST[email]' ";

 $result = $conexion->query($buscarUsuario);

 $count = mysqli_num_rows($result);

 if ($count == 1) {
 echo "<br />". "El Nombre de Usuario ya a sido tomado." . "<br />";

 echo "<a href='index.html'>Por favor escoga otro Nombre</a>";
 }
 else{

 $query = "INSERT INTO usuario (email, contrasenia)
 VALUES ('$_POST[email]', '$hash')";

 if (!mysqli_query($conexion, $query))
 {
 die('Error: ' . mysqli_error());
 echo "Error al crear el usuario." . "<br />";
 }

 else {
 echo "<br />" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";
 echo "<h4>" . "Bienvenido: " . $_POST['email'] . "</h4>" . "\n\n";
 echo "<h5>" . "Login: " . "<a href='login.html'>Login</a>" . "</h5>"; 
   }
 }
 mysqli_close($conexion);
?>