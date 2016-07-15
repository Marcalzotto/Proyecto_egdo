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
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		
		<link rel="stylesheet" href="../assets/css/index_gral.css" />

		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<link rel="stylesheet" type="text/css" href="../assets/css/common.css" />
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css" /> 
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
			<script src="../js/modernizr.js"></script> <!-- Modernizr -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
			<script src="../js/mainModal.js"></script> <!-- Gem jQuery -->
			<script src="../js/subirFotosEventos.js"></script>
	</head>
	<body class="homepage">
		<div id="page-wrapper">
		<header role="banner">
			<!-- Header Wrapper -->
				<div id="header-wrapper">

					<!-- Header -->
						
						<div id="header" class="container">
							
							<h1 class="logo">
									<a href="../index.html"><img src="../favicon/favicon-96x96.png" alt=""></a>
							</h1>
							
							
							
							<!-- Nav -->
								<nav id="nav">
									
									<ul class="myfont">
								
									<li class="circle"><a href="#"><img src="../images/upd.png" alt="UPD"></a></li>
										
										<li class="circle">
											<a href="#">
												<img src="../images/shirt.png" alt="Dise&ntilde;ar">
											</a>
												<ul>
													<li><a href="Tee-Designer-Master/index.php">Dise&ntilde;a tu ropa <img src="../images/dropotron_icons/disenio_ropa.png" alt="" style="float:right"></a></li>
													<li><a href="votacion.php">Votaci&oacute;n<img src="../images/dropotron_icons/votacion.png" alt="" style="float:right"></a></li>
													<li><a href="empresas.php">Empresas<img src="../images/dropotron_icons/empresas.png" alt="" style="float:right"></a></li>
													<li><a href="index_usuarioComun.php">Principal<img src="../images/dropotron_icons/principal.png" alt="ir a la pagina principal" style="float:right"></a></li>
												</ul>
											</li>
										<li class="circle"><a href="#"><img src="../images/party.png" alt="Dise&ntilde;ar"></a></li>
										<li class="circle"><a href="#"><img src="../images/foto-evento.png" alt="foto-evento"></a></li>
										<li class="circle"><a href="#"><img src="../images/bus.png" alt="info-viajes"></a></li>
										<li class="circle"><a href="#">
																				<img src="../images/settings.png" alt="configuracion">
																			</a>
																			<ul>
																				<li><a href="#">Manda tu invitacion <img src="../images/dropotron_icons/send_mail.png" alt="agenda" style="float:right"></a></li>
																				<li><a href="#">Bandeja de entrada<img src="../images/dropotron_icons/mail_box.png" alt="agenda" style="float:right"></a></li>
																				<li><a href="notificaciones.php">Notificaciones<img src="../images/dropotron_icons/alarm.png" alt="agenda" style="float:right"></a></li>
																				<li><a href="agenda.php">Agenda<img src="../images/dropotron_icons/calendar.png" alt="agenda" style="float:right"></a></li>
																				<li><a href="#">Perfil <img src="../images/dropotron_icons/avatar.png" alt="perfil" style="float:right"></a></li>
																				<li><a href="../login/logout.php">Logout <img src="../images/dropotron_icons/logout.png" alt="perfil" style="float:right"></a></li>
																			</ul>


										</li>

										
									</ul>
								</nav>
								
		

						</div>
				
				</div>
</header>
			<!-- Banner Wrapper -->
			
				<div id="divContform">
							
							<div class="form">
								
								<h2>Subi tus fotos</h2>
							
										<div id="respuesta_ajax">
						
										</div>
					
										<form enctype="multipart/form-data" method="post" id="formulario">

												<select name="evento_opcion" id="event_opcion">
													<option value="0">Elejir Evento</option>
													<option value="1">UPD</option>
													<option value="2">Fiesta Egresados</option>
													<option value="3">Viaje Egresados</option>
												</select>
										
													<div id="frontal">
														<p id="subir_frontal">Subir Foto</p>
														<input type="file" name="foto_evento" id="d_frontal">
													</div>
											
													
											
													<div id="btn-enviar">
														<p id="p_enviar">Subir</p>
														<input type="submit" name="enviar_archs"  id="d_enviar">
													</div>

										</form>
						
							</div>
				</div>
			<!-- Footer Wrapper -->
				<div id="footer-wrapper">

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
								<!--<li><a href="#" class="icon fa-linkedin"><span>LinkedIn</span></a></li> -->
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