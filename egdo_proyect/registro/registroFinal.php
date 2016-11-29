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
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		
		<title>EGDO</title>
		<!-- Google Web Fonts
		================================================== -->
		
		
		<!--<meta charset="utf-8" /> -->
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../css/main.css" /> 
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		
		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<!-- CSS
		================================================== -->
		<link rel="stylesheet" href="../css/tmm_form_wizard_style_demo.css" />
		<link rel="stylesheet" href="../css/grid.css" />
		<link rel="stylesheet" href="../css/tmm_form_wizard_layout.css" />
		<link rel="stylesheet" href="../css/fontello.css" />
		
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

							<!-- Nav Elimado-->
								
						</div>

					</div>

			<!-- Main Wrapper -->
				
					<!-- Wide Content -->
						

			<!-- - - - - - - - - - - - - Content - - - - - - - - - - - - -  -->
		<div id="contents">

			<div class="form-container">

				<div id="tmm-form-wizard" class="containers substrate">

					<div class="rows">

						<div class="col-xs-12">
							<h2 class="form-login-heading">Segui los pasos,<span> registrate y registra tu curso</span></h2>
						</div>

					</div><!--/ .row-->

					<div class="rows stage-container">

						<div class="stage tmm-success col-md-3 col-sm-3">
							<div class="stage-header head-icon head-icon-lock"></div>
							<div class="stage-content">
								<h3 class="stage-title">Crear cuenta</h3>
								<div class="stage-info">
									Ingresar datos personales 
									nombre email password
								</div> 
							</div>
						</div><!--/ .stage-->
						
						<div class="stage tmm-success col-md-3 col-sm-3">
							<div class="stage-header head-icon head-icon-user"></div>
							<div class="stage-content">
								<h3 class="stage-title">Datos del Curso</h3>
								<div class="stage-info">
									Ingresar nombre escuela
									curso cantidad alumnos
								</div>  
							</div>
						</div><!--/ .stage-->
						
						<div class="stage tmm-success col-md-3 col-sm-3">
							<div class="stage-header head-icon head-icon-payment"></div>
							<div class="stage-content">
								<h3 class="stage-title">Enviar Invitaciones</h3>
								<div class="stage-info">
									Invita a tus compa&ntilde;eros
									ingresando sus email
								</div>
							</div>
						</div><!--/ .stage-->
						
						<div class="stage tmm-success col-md-3 col-sm-3">
							<div class="stage-header head-icon head-icon-details"></div>
							<div class="stage-content">
								<h3 class="stage-title">Confirma Invitaciones</h3>
								<div class="stage-info">
									Vas a enviar invitaciones
									los siguientes email
								</div>  
							</div>
						</div><!--/ .stage-->

					</div><!--/ .row-->

					<div class="rows">

						<div class="col-xs-12">

							<div class="form-header">
								<div class="form-title form-icon title-icon-payment">
									<b><i class="fa fa-check" aria-hidden="true"></i> Genial! Terminaste la registraci&oacute;n!</b>
								</div>
							</div><!--/ .form-header-->

						</div>

					</div><!--/ .row-->

					<form role="form">

						<div class="form-wizard">
							
							<div class="rows">

								<div class="col-md-8 col-sm-7">

									<div class="data-container">
											<h3>Se han enviado todas las invitaciones! </br> para continuar por favor <a href="../index.php">inicia sesi&oacute;n</a> ;)</h3>
											
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
									
									
									</div><!--/ .data-container-->

								</div>

							</div><!--/ .row-->
							
						</div><!--/ .form-wizard-->

						<div class="prev">
						</div>
						
						<div class="next">
						</div>

					</form><!--/ form-->

				</div><!--/ .container-->

			</div><!--/ .form-container-->

		</div><!--/ #content-->



		
	

		<!-- - - - - - - - - - - - end Content - - - - - - - - - - - - - -->


		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>-->

		<!--[if lt IE 9]>
				<script src="js/respond.min.js"></script>
		<![endif]-->
		
		<!--<script src="js/tmm_form_wizard_custom.js"></script>-->
						
						
			

			<?php
					include '../pag_interiores/menu/masterFooter.php';
			?>

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