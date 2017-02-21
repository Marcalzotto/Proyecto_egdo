<?php
session_start();
?>

<!DOCTYPE html>
<!--
	Wide Angle by Pixelarity
	pixelarity.com @pixelarity
	License: pixelarity.com/license
-->
<html class="not-ie no-js" lang="en">
	<head>
		
		<!-- Basic Page Needs
		================================================== -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>EGDO</title>
		
		<!--<meta charset="utf-8" /> -->
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../css/mainRegistro.css" />   
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		
		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		
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
								<h1 id="logo"><a href="../index.php"><img class="egdo-logo-register" src="../images/imagesAdmin/EGDO.png" alt=""></a></h1>

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
											<a href="../registro/registroPaso1.php">REGISTRO</a>
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
										<h2>REESTABLECE TU CONTRASE&Ntilde;A</h2>
									</header> 
									
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
											<h5 class="subheader-step">
												<i class="fa fa-check" aria-hidden="true"></i>
												&nbsp;VERIFICAR</h5>
										</div>
										
									</div>
									
									<hr class="major"/>	
									
								<div class="12u 12u$(medium)"> <!--Mensajes-->
									
								<!-- form start -->
								<form role="form">
									
									
								<div class="row uniform 50%"> <!--Row Uniform-->
										
									<div class="-4u 8u$">	
										
										<?php
											
										if (isset($_POST['Enviar'])) {
										if( $_SESSION['CAPTCHA'] != $_POST['introducido'])
											{
												echo "Te has confundido introduciendo el c&oacute;digo";
												echo "<p><a href='../recupPass/recupContrasena.php'>Volver e ingresar nuevamente aqu&iacute;</a></p>";
											
											}
										else {
											
											
												//email
											$bandera=0;
											if( empty($_POST['email']) ){
												
												$bandera=1;
												echo "Debe completar el campo email.";
												
											}
											else
											{	
													
													$invitacion=$_POST['email'];
													
													
																						
														// Comprobar mediante  filter_var si es valido el email:
														if(!filter_var($invitacion,FILTER_VALIDATE_EMAIL )){
															
															$bandera=1;
															echo "- El email '".$invitacion."' no es valido.</br>";
															
															}
														else 
														{												
															// Comprobar que no supere cantidad maximo de caracteres:
															if(strlen($invitacion) > 45){
															
																echo "- El email ". $invitacion ." no puede contener mas de 45 caracteres.</br>";
																$bandera=1;
															}
															else{
																//todo ok, manda email
																
																
																//$emailsOk[]=$invitacion;
																
															}
														}
												
													
												
											}
											
											if($bandera==0){
											
												echo "<h3>Por favor revisa tu bandeja de entrada </br> y luego <a href='../index.php'>inicia sesi&oacute;n aqu&iacute;</a> ;)</h3>";
											
												$host_db = "localhost";
												$user_db = "root";
												$pass_db = "";
												$db_name = "egdo_db";
												$tbl_name = "usuario";
					
												$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
					
												if ($conexion->connect_error) {
												die("La conexion falló: " . $conexion->connect_error);
												}
											
												date_default_timezone_set('America/Argentina/Buenos_Aires');
												$fechaAltaUsuario = date("Y-n-d-H-i-s");
																							
												require '../registro/Mailer/PHPMailerAutoload.php';
												
												$mail = new PHPMailer;
												$mail->isSMTP();                                      // Activamos SMTP para mailer
												$mail->Host = 'p3plcpnl0173.prod.phx3.secureserver.net';                       // Especificamos el host del servidor SMTP
												$mail->SMTPAuth = true;                               // Activamos la autenticacion
												$mail->Username = 'public@ocrend.com';       // Correo SMTP
												$mail->Password = 'Prinick2016';                // Contraseña SMTP
												$mail->SMTPSecure = 'ssl';                            // Activamos la encriptacion ssl
												$mail->Port = 465;                                    // Seleccionamos el puerto del SMTP
												$mail->From = 'tucorreo@gmail.com';
												$mail->FromName = 'EGDO';                       // Nombre del que envia el correo
												$mail->isHTML(true); //Decimos que lo que enviamos es HTML
												$mail->CharSet = 'UTF-8';  // Configuramos el charset 
											
												
																				
													$nuevaContrasena = uniqid();
													$passhash = password_hash($nuevaContrasena, PASSWORD_BCRYPT);
													
													//agrega nueva contrasena
													$query = "UPDATE usuario SET contrasenia= '$passhash' WHERE email= '$invitacion'";
				
													if (!mysqli_query($conexion, $query)){
														echo "<script language='JavaScript'>
																alert('el email $invitacion ya se encuentra registrado, no se envia invitacion!');
																</script>"; 
														die('Error: ' . mysqli_error());
														mysqli_close($conexion);
														echo "<p>No se han cargado los datos, error en conexion.</p>";
														echo "<p><a href='recupContrasena.php'>volver al paso anterior</a></p>";
													}
													else{										
													
													//al estar ok se envia email al usuario link para validar cuenta e iniciar sesion
																				
													$mensaje = '<h2>Hola!!! tu nueva contrase&ntilde;a es: '.$nuevaContrasena.'</h2>';
													
													
													
													//Agregamos a todos los destinatarios
													$mail->addAddress($invitacion,'Usuario');
													
													//Añadimos el asunto del mail
													$mail->Subject = 'Reestablecer contraseña de EGDO';
		
													//Mensaje del email
													$mail->Body = '<div align="center"><img src="http://i66.tinypic.com/10nua77.png"></div><br><br>'.$mensaje;
													
													if(!$mail->send()) {
													
														echo 'error al enviar email';
														
													} else {											
														
														//echo '<p>Datos correctos!! email a:'.$emailsOk[$i].' </br>Por favor revisa tu bandeja de entrada y valida tu cuenta para continuar con el paso 2 </p>';
																		//mysqli_close($conexion);
														//header('Location:registroPaso2.php');
														//echo ("<script>location.href='registroPaso2.php'</script>");// atado con alambreeeeee!!!!!!!
														// da error, preguntar RUSTY!!!! O buscar en 
														//http://librosweb.es/foro/pregunta/128/como-solucionar-el-problema-headers-already-sent-de-php/
														$mail->ClearAddresses();
														$mail->ClearAttachments();								
													}
											
												}
											// }
 
										
											}
											else{
											
												echo "<p><a href='../recupPass/recupContrasena.php'>Volver y corregir email aqu&iacute;</a></p>";
											
											}
											
											}
											
											}
											else {

												echo "ERROR";
											}
											
								?>
			
							</div>			
						
						</div> <!--/Row Uniform-->
									
						</form>
										
					</div> <!-- /Mensajes-->
								
					</section>
								
					</div> <!-- /Row Principal -->
							


			</div> <!-- /Main Wrapper -->
	
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
								<li><a href="https://www.instagram.com/egdoweb/" class="icon fa-instagram" target="_blank"><span>Instagram</span></a></li>
								<li><a href="https://www.facebook.com/egdo.web" class="icon fa-facebook" target="_blank"><span>Facebook</span></a></li>
								<li><a href="https://twitter.com/WebEgdo" class="icon fa-twitter" target="_blank"><span>Twitter</span></a></li>
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
				<script src="../js/jquery.min.js"></script>
			<script src="../js/jquery.dropotron.min.js"></script>
			<script src="../js/skel.min.js"></script>
			<script src="../js/skel-viewport.min.js"></script>
			<script src="../js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../js/main.js"></script>

	</body>
</html>