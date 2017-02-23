<?php include ("../bloqueSeguridad.php");?>
<?php include('../pag_interiores/conexion.php');?>
<?php 
	include('../pag_interiores/funciones/generar_notificacion.php');
	generar_notificacion($conexion,$_SESSION["curso"]);
?>
<?php include('../pag_interiores/funciones/cantidad_notificaciones.php');?>
<?php include('../pag_interiores/funciones/cantidad_notificaciones_mensajes.php');?>
<!DOCTYPE HTML>
<!--
	Wide Angle by Pixelarity
	pixelarity.com @pixelarity
	License: pixelarity.com/license
-->
<html lang="en" class="no-js">
	<head>
		<title>EGDO</title>
		<meta charset="utf-8" />
	
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!-- mejora tooltips-->
		<link rel="stylesheet" href="../css/hint.css-2.4.1/hint.min.css" />

		
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		
		<link rel="stylesheet" href="../css/tmm_form_wizard_style_demo.css" />
		<link rel="stylesheet" href="../css/grid.css" />
		<link rel="stylesheet" href="../css/tmm_form_wizard_layout.css" />
		<link rel="stylesheet" href="../css/fontello.css" />
		<link rel="stylesheet" href="../css/form-elements.css" />
		
		<link rel="stylesheet" href="../css/index_gral.css" />
		<link rel="stylesheet" href="../css/slimbox2.css" type="text/css" media="screen">
		
        <link rel="stylesheet" type="text/css" href="../css/style-assets.css" />
		
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--<link rel="stylesheet" type="text/css" href="../assets/css/common.css" />-->
    <!--<link rel="stylesheet" type="text/css" href="../assets/css/style.css" /> -->
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
			
			<!-- modal  -->
			
			
			
			<link rel="stylesheet" href="../css/reset.css"> <!-- CSS reset -->
			
			<link rel="stylesheet" href="../css/styleModal.css"> <!-- Gem style -->
			<script type="text/javascript" src="../js/jquery_min.js"></script>
			<script type="text/javascript" src="../js/slimbox2.js"></script>
			<!--Librarys for lightBox -->
			<script src="../js/modernizr.js"></script> <!-- Modernizr -->
			<script src="../js/jquery.min.js"></script>
			<script type="text/javascript" src="../js/administrarVotacionAdminCurso.js"></script>
			
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
			<script src="../js/tomarDatos.js"></script>	
	
			<!--<script src="../js/mainModal.js"></script>-->  <!--Gem jQuery -->
	
	</head>
	<body class="homepage">
		<header role="banner">
			<!-- Header Wrapper -->
				<div id="header-wrapper">

					<!-- Header -->
						
						<div id="header" class="container">
							
						<?php
							include '../pag_interiores/menu/masterMenu.php';
							?>
								
		

						</div>
				
				</div>
	</header>

							<!-- Main Wrapper -->
				<div id="main-wrapper">

						<!-- Main -->
						<div id="intro" class="container">
						
							<div class="row"> <!-- Row Principal -->	
							
								<section class="12u 12u(mobile)"> <!-- Pasos -->
									<header>
										<h2>ENVIA INVITACIONES</h2>
									</header>
									
									
								
								</section> <!-- Pasos -->
							
							</div> <!-- Row Principal -->
						</div>
						
						<!-- Wide Content -->
						<section id="content" class="container">
							
						<div class="row"> <!-- Row Principal -->
				
						<section class="12u 12u">
							
							<div class="12u 12u$(medium)"> <!-- Sec Datos Empresa -->
							
							
							<!-- Contact Form -->
							<form action="../invitaciones/invitacionesEnvio.php" method="post" role="form">
								
								<div class="row 50%">
									
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
												$mail->Host = 'smtp.gmail.com';                       // Especificamos el host del servidor SMTP
												$mail->SMTPAuth = true;                               // Activamos la autenticacion
												$mail->Username = 'egdo.egresados@gmail.com';       // Correo SMTP
												$mail->Password = 'egdo2016';                // Contraseña SMTP
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
												//$id_curso="2";
												$id_curso=$_SESSION['curso'];
												//echo 'el id curso es:'.$id_curso;
												//Esta parte la corrijio marcos cambie id_curso por curso.

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
														die('Error: ' . mysqli_error($conexion));
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
													
													
													$bandera=0;
													if(!$mail->send()) {
														
														$bandera=1;
														
														
													} else {
													
														$bandera=0;
														
														$mail->ClearAddresses();
														$mail->ClearAttachments();								
													}
													
													
													
											
												}
											}
											
											if($bandera==1) {
														
														echo'<hr class="major"/>
														<div class="12u 12u"><span>
														</br>									
															<h6>Error al enviar invitaciones, verifica tu conexion de internet!</h6>
														</br>
														</span></div>
														<hr class="major"/>
														</br>';
														
														
													} else {											
														
													echo'<hr class="major"/>
														<div class="12u 12u"><span>
														</br>									
															<h6>Se han enviado las invitaciones correctamente!</h6>
														</br>
														</span></div>
														<hr class="major"/>
														</br>';
														
														$mail->ClearAddresses();
														$mail->ClearAttachments();								
													}
										
											
											?>
										
									
								
								</div>
								
							</form>
							
							</div> <!-- /Sec Datos Empresa -->
							
						</section>
							
						</div> <!-- /Row Principal -->	


					
						</section>

				</div>



								
				<?php
					include '../pag_interiores/menu/masterFooter.php';
				?>

		

		
		
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