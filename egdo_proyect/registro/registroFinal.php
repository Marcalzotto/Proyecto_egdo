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
										<span class="fa-stack fa-lg icon-sucess">
											<i class="fa fa-circle fa-stack-2x"></i>
											<i class="fa fa-lock fa-stack-1x fa-inverse"></i>
										</span> 
										<header>
											<h5>1.CREAR TU CUENTA <i class="fa fa-check-circle" aria-hidden="true"></i></h5>
										</header>
											
									</div>
									
									<!-- Break -->
									<div class="3u">
										<span class="fa-stack fa-lg icon-sucess">
											<i class="fa fa-circle fa-stack-2x"></i>
											<i class="fa fa-university fa-stack-1x fa-inverse"></i>
										</span> 
										<header>
											<h5>2.DATOS DEL CURSO <i class="fa fa-check-circle" aria-hidden="true"></i></h5>
										</header>
										
									</div>
									
									<!-- Break -->
									<div class="3u">
										<span class="fa-stack fa-lg icon-sucess">
											<i class="fa fa-circle fa-stack-2x"></i>
											<i class="fa fa-users fa-stack-1x fa-inverse"></i>
										</span> 
										<header>
											<h5>3.ENVIAR INVITACIONES <i class="fa fa-check-circle" aria-hidden="true"></i></h5>
										</header>
										
									</div>
									
									<!-- Break -->
									<div class="3u$">
										<span class="fa-stack fa-lg icon-sucess">
											<i class="fa fa-circle fa-stack-2x"></i>
											<i class="fa fa-check-circle-o fa-stack-1x fa-inverse"></i>
										</span> 
										<header>
											<h5>4.CONFIRMAR INVITACIONES <i class="fa fa-check-circle" aria-hidden="true"></i></h5>
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
										
										<div class="-2u 4u">
											<h5 class="subheader-step"><i class="fa fa-check" aria-hidden="true"></i>&nbsp; CONFIRMAR INVITACIONES</h5>
										</div>
										<div class="-4u 2u$">
											<h5 class="subheader-step">PASO 4-4 </h5>
										</div>
										
									</div>
									
									<hr class="major"/>	
									
									<div class="12u 12u$(medium)"> <!-- Sec Datos Alumno -->
									
										
										<div class="-3u 7u"> 
										<header> 
											<h4><i class="fa fa-smile-o fa-lg" aria-hidden="true"></i>&nbsp; Genial! Terminaste la registraci&oacute;n! Se han enviado todas las invitaciones!.</br> 
											Para continuar por favor <a href="../index.php">inicia sesi&oacute;n</a></h4> 
										</header> 
										</div>
										
										
										<div class="row uniform 50%">	
											
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
											
												
												$url_activacion = 'http://localhost/egdo_proyect/registro/activaCuentaUsuario.php';
												
												//manera de recibir array por POST o GET
												$emailsOk = $_POST['emailsOk'];
												$emailsOk = stripslashes($emailsOk);
												$emailsOk = urldecode($emailsOk);
												$emailsOk = unserialize($emailsOk);	

												//recibo id del curso creado
												$id_curso=$_POST['id_curso'];
												//echo 'el id curso es:'.$id_curso;


												//saco el numero de elementos
												$longitud = count($emailsOk);
												
												//Recorro todos los elementos
												for($i=0; $i<$longitud; $i++)
													{
													//saco el valor de cada elemento
													$emailsOk[$i];
													
													$id_confirmacion = uniqid();
													
													//creo nuevo usuario (se asigna el id de curso)
													$query = "INSERT INTO usuario (email,id_rol,id_confirmacion,fechaAltaUsuario,estadoActivacion,id_curso)
													VALUES ('$emailsOk[$i]',3,'$id_confirmacion','$fechaAltaUsuario',0,'$id_curso')";
				
													if (!mysqli_query($conexion, $query)){
														echo "<script language='JavaScript'>
																alert('el email $emailsOk[$i] ya se encuentra registrado, no se envia invitacion!');
																</script>"; 
														die('Error: ' . mysqli_error());
														mysqli_close($conexion);
														echo "<p>No se han cargado los datos, error en conexion.</p>";
														echo "<p><a href='registroPaso4.php'>volver al paso 4</a></p>";
													}
													else{										
													
													//al estar ok se envia email al usuario link para validar cuenta e iniciar sesion
																				
													$mensaje = '<h2>Hola!!! para poder activar tu cuenta en EGDO por favor realiza inicio de sesion en '.$url_activacion. 
																' con tu email y el siguiente password:<br> '.$id_confirmacion.'. <br>Si no podes hacer click, 
																copia y pega el enlace en la barra de direcciones de tu navegador.</h2>';
													
													$mensaje = '<h2>Hola!!! para poder activar tu cuenta y registrarte por favor segui el siguiente link.
													Si no podes hacer click, copia y pega en la barra de direcciones de tu navegador.</h2><br><br>'
													.$url_activacion.'?id_confirmacion='.$id_confirmacion.'&email='.$emailsOk[$i];
													
													
													
													//Agregamos a todos los destinatarios
													$mail->addAddress($emailsOk[$i],'Nuevo Usuario');
													
													//Añadimos el asunto del mail
													$mail->Subject = 'Confirma tu Cuenta de EGDO';
		
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