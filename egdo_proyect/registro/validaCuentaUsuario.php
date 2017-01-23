<!DOCTYPE HTML>
<!--
	Wide Angle by Pixelarity
	pixelarity.com @pixelarity
	License: pixelarity.com/license
-->
<html>
	<head>
		<title>EGDO</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../css/mainRegistro.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		
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
								<h1 id="logo">
									<a href="../index.php"><img class="egdo-logo-register" src="../images/imagesAdmin/EGDO.png" alt=""></a>
								</h1>

							<!-- Nav -->
								<nav id="nav">
									<ul>
										<li class="circle">
											<a href="../index.php">COMENZA</a>
										</li>
										<li class="circle">
											<a href="../contactoEmpresas/empresa.php">EMPRESAS</a>
										</li>
										<li class="break circle">
											<a href="registroPaso1.php">REGISTRO</a>
										</li>
										<li class="circle">
											<a href="#contacto">CONTACTO</a>
										</li>
									</ul>
								</nav>

						</div>

				</div>

			<!-- Main Wrapper -->
				<div id="main-wrapper">

					
						<!-- Main -->
						<div id="intro" class="container">
							
							<div class="row"> <!-- Row Principal -->	
							
								<section class="12u 12u(mobile)"> <!-- Pasos -->
									<header>
										<h2>SEGUI LOS PASOS, REGISTRATE Y REGISTRA TU CURSO</h2>
									</header> 
									
									<div class="row uniform">
									
									<!-- Break -->
									<div class="3u">
										<span class="fa-stack fa-lg icon-active">
											<i class="fa fa-circle fa-stack-2x"></i>
											<i class="fa fa-lock fa-stack-1x fa-inverse"></i>
										</span> 
										<header>
											<h5>1.CREAR TU CUENTA</h5>
										</header>
											
									</div>
									
									<!-- Break -->
									<div class="3u">
										<span class="fa-stack fa-lg icon-step">
											<i class="fa fa-circle fa-stack-2x"></i>
											<i class="fa fa-university fa-stack-1x fa-inverse"></i>
										</span> 
										<header>
											<h5>2.DATOS DEL CURSO</h5>
										</header>
										
									</div>
									
									<!-- Break -->
									<div class="3u">
										<span class="fa-stack fa-lg icon-step">
											<i class="fa fa-circle fa-stack-2x"></i>
											<i class="fa fa-users fa-stack-1x fa-inverse"></i>
										</span> 
										<header>
											<h5>3.ENVIAR INVITACIONES</h5>
										</header>
										
									</div>
									
									<!-- Break -->
									<div class="3u$">
										<span class="fa-stack fa-lg icon-step">
											<i class="fa fa-circle fa-stack-2x"></i>
											<i class="fa fa-check-circle-o fa-stack-1x fa-inverse"></i>
										</span> 
										<header>
											<h5>4.CONFIRMAR INVITACIONES </h5>
										</header>
										
									</div>
									
								</div>
								
								
								</section> <!-- Pasos -->
							
							</div> <!-- Row Principal -->
						</div>	
							
						<!-- Wide Content -->
						<section id="content" class="container">
						<div class="row"> <!-- Row Principal -->
								<section class="12u 12u">
									
									<hr class="major"/>
									
									<div class="row uniform">
										
										<div class="-2u 3u">
											<h5 class="subheader-step"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; INGRESA TUS DATOS </h5>
										</div>
										<div class="-4u 3u$">
											<h5 class="subheader-step">PASO 1-4 </h5>
										</div>
										
									</div>
									
									<hr class="major"/>	
									
									<div class="12u 12u$(medium)"> <!-- Sec Datos Alumno -->
									
									    <div class="-4u 6u"><h4> <i class="fa fa-info-circle" aria-hidden="true"></i> Tu cuenta ya esta activa,<span> solo falta completar tus datos</span> </h4></div>
									
										<div class="row uniform 50%">	
											
										<?php
// Arrays para guardar errores:
    $aErrores = array();

    // Patrón para usar en expresiones regulares (admite letras acentuadas y espacios):
    $patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";

    // Comprobar si se ha enviado el formulario:
    if( !empty($_POST) )
    {
			//función trim que se encarga de eliminar los espacios en blanco 
			//función mysql_real_escape_string para evitar las inyecciones sql 
			//htmlentities para xss 
			$nombre = trim(htmlentities(mysql_real_escape_string($_POST["nombre"])));
			$apellido = trim(htmlentities(mysql_real_escape_string($_POST["apellido"])));
			$email = trim(htmlentities(mysql_real_escape_string($_POST["email"])));
			$pass = trim(htmlentities(mysql_real_escape_string($_POST["pass"])));
			$repass = trim(htmlentities(mysql_real_escape_string($_POST["repass"])));

		            //
					//echo "FORMULARIO RECIBIDO:<br/>";
					//echo "====================<p/>";
                    //
					//// Mostrar la información recibida del formulario:
					//echo "Nombre: ".$nombre."<br/>";
					//echo "Apellido: ".$apellido."<br/>";
					//echo "Email: ".$email."<br/>";
					//echo "Password: ".$pass."<br/>";
					//echo "Confirma password: ".$repass."<br/>";
					//echo "====================<p/>";
	
					// Comprobar si llenaron los campos requeridos:
					if( isset($nombre) && isset($apellido)&& isset($email)&& isset($pass)&& isset($repass) )
					{
						// Nombre:
						if( empty($nombre) )
							$aErrores[] = "- Debe completar el campo Nombre.";
						else
						{
							// Comprobar mediante una expresión regular, que sólo contiene letras y espacios:
							if( !preg_match($patron_texto, $nombre) ){
							
								$aErrores[] = "- El nombre solo puede contener letras y espacios";
								
							}
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
							// Comprobar mediante una expresión regular, que sólo contienen letras y espacios:
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
						
						//contrasenia
						
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
							echo "<p><a href='activaCuentaUsuario.php'>Volver y completar nuevamente</a></p>";
					}
					else
					{		
							//Validado los campos se inserta los datos a la base y envia email
					
							
							 $host_db = "localhost";
							 $user_db = "root";
							 $pass_db = "";
							 $db_name = "egdo_db";
							 $tbl_name = "usuario";

							 $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

							 if ($conexion->connect_error) {
							 die("La conexion falló: " . $conexion->connect_error);
							}
						
							 $passhash = password_hash($pass, PASSWORD_BCRYPT);
					
							 
							 $query = "UPDATE usuario SET nombre='$nombre',apellido='$apellido',contrasenia='$passhash'
									 WHERE email='$email'";

								 if (!mysqli_query($conexion, $query)){
									 echo "<script language='JavaScript'>
											alert('Error al crear usuario, cargue nuevamente los datos!');
											</script>"; 
									 die('Error: ' . mysqli_error());
									 mysqli_close($conexion);
									 header('Location:registroPaso1.php');
								 }
								 else {
										
										echo '<h3>tus datos se guardaron correctamente!!! <br> ya puedes ingresar a la aplicacion ;)</h3>';
										echo "<p><a href='../index.php'>Ir a inicio</a></p>";
									
								}
						}
									
					
    }
    else
    {
        echo "<p>No se ha enviado el formulario.</p>";
		echo "<p><a href='registroPaso1.php'>volver</a></p>";
    }
?>
										</div>
									
									
										
									</div> <!-- /Sec Datos Alumno -->
								
								</section>
								
								
								
								
							</div> <!-- /Row Principal -->
							
							
						</section>

				</div>

			<!-- Footer Wrapper -->
				<div id="footer-wrapper">

					<div id="contacto"> <!-- Ancla -->
					<!-- Footer -->
						<div id="footer" class="container">
							<header>
								<h2>Seguinos en nuestras redes sociales</h2>
							</header>
							<p><i class="fa fa-envelope fa-lg" aria-hidden="true"></i>&nbsp; egdoweb@gmail.com</p>
							<ul class="contact">
								<li><a href="https://www.instagram.com/egdoweb/" class="icon fa-instagram"><span>Instagram</span></a></li>
								<li><a href="https://www.facebook.com/egdo.web" class="icon fa-facebook"><span>Facebook</span></a></li>
								<li><a href="https://twitter.com/WebEgdo" class="icon fa-twitter"><span>Twitter</span></a></li>
							</ul>
						</div> <!-- /Footer -->
					</div>
					<!-- Copyright -->
						<div id="copyright" class="container">
							&copy; Egdo 2016.
						</div>
				
				</div> <!-- /Footer Wrapper -->

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