<?php
session_start();

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




$sql = "SELECT * FROM usuario WHERE email = '$email'";

$result = $conexion->query($sql);


if ($result->num_rows === 1) {

	 $row = $result->fetch_array(MYSQLI_ASSOC); 
	 
	 if (password_verify($contrasenia, $row['contrasenia'])) { 
	 
		 $_SESSION['loggedin'] = true;
		 $_SESSION['nombre'] = $row['nombre'];
		 $_SESSION['id_usuario'] = $row['id_usuario'];
		 $_SESSION['id_rol'] = $row['id_rol'];
		 $_SESSION['email'] = $email;
		 $_SESSION['start'] = time();
		 $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);
		 $_SESSION['curso'] = $row['id_curso'];

		 if($row['id_rol']==1){
		 
			header('Location: ../pag_interiores/panel-index.php');
			
		 }
		 else {
		 
			if($row['id_rol']==2){
				
				header('Location: ../pag_interiores/indexUsuarioAdminCurso.php');
				
			}
			else {
			
				header('Location: ../pag_interiores/index_usuarioComun.php');
				
			}
		 
		 }
		 
	 }
	 else{
		echo'<script type="text/javascript">
			alert("Email o Password incorrecto");
			window.location="httP://localhost/egdo_proyect/index.php"
			</script>';
	 }
}	 
 else { 	 
	 
	 echo'<script type="text/javascript">
			alert("Email o Password incorrecto");
			window.location="httP://localhost/egdo_proyect/index.php"
			</script>';

}


mysqli_close($conexion); 
?>