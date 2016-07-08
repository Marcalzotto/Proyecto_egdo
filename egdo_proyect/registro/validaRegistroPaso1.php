<!DOCTYPE html>
<!--
	
	Wide Angle by Pixelarity
	pixelarity.com @pixelarity
	License: pixelarity.com/license
-->
<html class="not-ie no-js" lang="en">
	<head>
		
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,300italic,400,500,700%7cCourgette%7cRaleway:400,700,500%7cCourgette%7cLato:700' rel='stylesheet' type='text/css'>
		
		<!-- Basic Page Needs
		================================================== -->
		<meta http-equiv="Content-Type" content="text/html; charset=ansi" />		
		
		<title>EGDO</title>
		<!-- Google Web Fonts
		================================================== -->
		
		
		<!--<meta charset="utf-8" /> -->
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../assets/css/main.css" />  
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		
		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<!-- CSS
		================================================== -->
		<link rel="stylesheet" href="../assets/css/tmm_form_wizard_style_demo.css" />
		<link rel="stylesheet" href="../assets/css/grid.css" />
		<link rel="stylesheet" href="../assets/css/tmm_form_wizard_layout.css" />
		<link rel="stylesheet" href="../assets/css/fontello.css" />
		
		<link rel="apple-touch-icon" sizes="57x57" href="../favicon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="../favicon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="../favicon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="../favicon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="../favicon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="../favicon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="../favicon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="../favicon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="../favicon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="../favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
		<link rel="manifest" href="../favicon/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
		
	</head>
	<body class="no-sidebar">
		<div id="page-wrapper">

			<!-- Header Wrapper -->
				<div id="header-wrapper">

					<!-- Header -->
						<div id="header" class="container">

							<!-- Logo -->
								<h1 id="logo"><a href="../index.php"><img class="egdo-logo-register" src="../assets/images/EGDO.png" alt=""></a></h1>

							<!-- Nav Elimado-->
								
						</div>

					</div>

			<!-- Main Wrapper -->
				
					<!-- Wide Content -->
						

			<!-- - - - - - - - - - - - - Content - - - - - - - - - - - - -  -->


		<div id="contents">

			<div class="form-container">

				<div id="tmm-form-wizard" class="containers substrate"> <!--container substrate-->

				<div class="rows">
						<div class="col-xs-12">
							<h2 class="form-login-heading">Segui los pasos,<span> registrate y registra tu curso</span></h2>
						</div>

					</div><!--/ .row-->

				

						

					</div><!--/ .row-->

					<div class="rows">

						<div class="col-xs-12">

							<div class="form-header">
								<div class="form-title form-icon title-icon-lock">
									<b><i class="fa fa-lock" aria-hidden="true"></i> Tus datos </b> 
								</div>
								<div class="steps">
									Paso 1 - 4
								</div>
							</div><!--/ .form-header-->

						</div>

					</div><!--/ .row-->
<?php
// Arrays para guardar errores:
    $aErrores = array();

    // Patr�n para usar en expresiones regulares (admite letras acentuadas y espacios):
    $patron_texto = "/^[a-zA-Z������������������������������\s]+$/";

    // Comprobar si se ha enviado el formulario:
    if( !empty($_POST) )
    {
			//funci�n trim que se encarga de eliminar los espacios en blanco 
			//funci�n mysql_real_escape_string para evitar las inyecciones sql 
			//htmlentities para xss 
			$nombre = trim(htmlentities(mysql_real_escape_string($_POST["nombre"])));
			$apellido = trim(htmlentities(mysql_real_escape_string($_POST["apellido"])));
			$email = trim(htmlentities(mysql_real_escape_string($_POST["email"])));
			$pass = trim(htmlentities(mysql_real_escape_string($_POST["pass"])));
			$repass = trim(htmlentities(mysql_real_escape_string($_POST["repass"])));

		
					echo "FORMULARIO RECIBIDO:<br/>";
					echo "====================<p/>";

					// Mostrar la informaci�n recibida del formulario:
					echo "Nombre: ".$nombre."<br/>";
					echo "Apellido: ".$apellido."<br/>";
					echo "Email: ".$email."<br/>";
					echo "Password: ".$pass."<br/>";
					echo "Confirma password: ".$repass."<br/>";
					echo "====================<p/>";
	
					// Comprobar si llenaron los campos requeridos:
					if( isset($nombre) && isset($apellido)&& isset($email)&& isset($pass)&& isset($repass) )
					{
						// Nombre:
						if( empty($nombre) )
							$aErrores[] = "- Debe completar el campo Nombre.";
						else
						{
							// Comprobar mediante una expresi�n regular, que s�lo contiene letras y espacios:
							if( !preg_match($patron_texto, $nombre) )
								$aErrores[] = "- El nombre solo puede contener letras y espacios";
							else 
							{
								// Comprobar que no supere cantidad maximo de caracteres:
								if(strlen($nombre) > 45)
								$aErrores[] = "- El nombre no puede contener mas de 45 caracteres";
							}
						}

						// Apellidos:
						if( empty($apellido) )
							$aErrores[] = "- Debe completar el campo apellido";
						else
						{
							// Comprobar mediante una expresi�n regular, que s�lo contienen letras y espacios:
							if( !preg_match($patron_texto, $apellido) )
								$aErrores[] = "- El apellido solo puede contener letras y espacios";
							else 
							{
								// Comprobar que no supere cantidad maximo de caracteres:
								if(strlen($apellido) > 45)
								$aErrores[] = "- El apellido no puede contener mas de 45 caracteres";
							}
						}
						
						//email
						if( empty($email) )
							$aErrores[] = "- Debe completar el campo email";
						else
						{
							// Comprobar mediante  filter_var si es valido el email:
							if(!filter_var($email,FILTER_VALIDATE_EMAIL )){
								$aErrores[] = "- El email no es valido";
								}
							else 
							{
								// Comprobar que no supere cantidad maximo de caracteres:
								if(strlen($email) > 45)
								$aErrores[] = "- El email no puede contener mas de 45 caracteres";
							}
						}
						
						//contrase�ia
						
						if( empty($pass) )
							$aErrores[] = "- Debe completar el campo Password";
						else
						{
							if( empty($repass) )
							$aErrores[] = "- Debe completar el campo Confirmar Password";
							else
							{
								// Comprobar si los campos ingrese y confirme password son iguales
								if($pass != $repass){
									$aErrores[] = "- Los password deben coincidir";
									}
								else 
								{
									// Comprobar que no supere cantidad maximo de caracteres:
									if(strlen($pass) < 3 ||strlen($pass) > 45)
									$aErrores[] = "- El password no puede contener menos de 3 caracteres y mas de 45 caracteres";
								}
							}
						}

					}
					else
					{
						echo "<p>No se han completado todos los campos.</p>";
					}

					// Si han habido errores se muestran, sino continua al siguiente paso
					if( count($aErrores) > 0 )
					{
						echo "<p>ERRORES ENCONTRADOS:</p>";

						// Mostrar los errores:
						for( $contador=0; $contador < count($aErrores); $contador++ )
							echo $aErrores[$contador]."<br/>";
							echo "<p><a href='registroPaso1.php'>Volver y completar nuevamente</a></p>";
					}
					else
					{		
							//Validado los campos se inserta los datos a la base y se redirecciona al paso 2
					
							
							 $host_db = "localhost";
							 $user_db = "root";
							 $pass_db = "";
							 $db_name = "egdo_db";
							 $tbl_name = "usuario";

							 $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

							 if ($conexion->connect_error) {
							 die("La conexion fall�: " . $conexion->connect_error);
							}
						
							 $passhash = password_hash($pass, PASSWORD_BCRYPT); 


							 $buscarUsuario = "SELECT * FROM $tbl_name
							 WHERE email = '$email' ";

							 $result = $conexion->query($buscarUsuario);

							 $count = mysqli_num_rows($result);

							 if ($count == 1) {
							 
							 echo "<br />". "El email ya se encuentra registrado. Comuniquese con EGDO" . "<br />";
							 echo "<p><a href='registroPaso1.php'>volver</a></p>";

							 }
							 else{

								 //$query = "INSERT INTO usuario (nombre,apellido,email,contrasenia,id_rol,id_curso)
								 //VALUES ('$nombre','$apellido','$email','$passhash','1','')";
								 
								 $query = "INSERT INTO usuario (nombre,apellido,email,contrasenia,id_rol)
									VALUES ('$nombre','$apellido','$email','$passhash',1)";

								 if (!mysqli_query($conexion, $query)){
									 echo "<script language='JavaScript'>
											alert('Error al crear usuario, cargue nuevamente los datos!');
											</script>"; 
									 die('Error: ' . mysqli_error());
									 mysqli_close($conexion);
									 header('Location:registroPaso1.php');
								 }
								 else {
								 
									 mysqli_close($conexion);
									 //header('Location:registroPaso2.php');
									 echo ("<script>location.href='registroPaso2.php'</script>");// atado con alambreeeeee!!!!!!!
									 // da error, preguntar RUSTY!!!! O buscar en 
									 //http://librosweb.es/foro/pregunta/128/como-solucionar-el-problema-headers-already-sent-de-php/
								 }
							 }			
					}
    }
    else
    {
        echo "<p>No se ha enviado el formulario.</p>";
		echo "<p><a href='registroPaso1.php'>volver</a></p>";
    }
?>
				</div><!--/ .container-->
				
			</div><!--/ .form-container-->

		</div><!--/ #content-->
	

		<!-- - - - - - - - - - - - end Content - - - - - - - - - - - - - -->


		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>-->

		<!--[if lt IE 9]>
				<script src="js/respond.min.js"></script>
		<![endif]-->
		
		<!--<script src="js/tmm_form_wizard_custom.js"></script>-->
						
						
			

			<!-- Footer Wrapper -->
					<div id="footer-wrapper" class="footer-main-color">

					<!-- Footer -->
						<div id="footer" class="container">
							<header>
								<h2>SEGUINOS EN NUESTRAS REDES SOCIALES</h2>
							</header>
							<p>Email: egdoweb@gmail.com</p>
							<ul class="contact">
								<li><a href="#" class="icon fa-facebook"><span>Facebook</span></a></li>
								<li><a href="#" class="icon fa-twitter"><span>Twitter</span></a></li>
								<li><a href="#" class="icon fa-instagram"><span>Instagram</span></a></li>
							</ul>
						</div>

					<!-- Copyright -->
						<div id="copyright" class="container">
							&copy; EGDO 2016.
						</div>

				</div>

		</div>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/skel-viewport.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>
	</body>
</html>