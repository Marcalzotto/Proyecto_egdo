<?php include ("../bloqueSeguridad.php");?>
<?php include("conexion.php");?>
<?php include("funciones/generar_notificacion.php");
	generar_notificacion($conexion,$_SESSION["curso"]);
?>
<?php include('funciones/cantidad_notificaciones.php');?>
<?php include('funciones/cantidad_notificaciones_mensajes.php');?>
<?php include ("../consultasTablas/consultaUsuario.php");?>
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
		
		<link rel="stylesheet" href="../css/index_gral.css" />
		<link rel="stylesheet" href="../css/indexUser.css" />
		
		<!-- mejora tooltips-->
		<link rel="stylesheet" href="../css/hint.css-2.4.1/hint.min.css" />

		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<link rel="stylesheet" type="text/css" href="../css/common.css" />
        <link rel="stylesheet" type="text/css" href="../css/style-assets.css" /> 
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
			<script src="../js/jquery.min.js"></script>
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
			<script src="../js/tomarDatos.js"></script>
			<script src="../js/mainModal.js"></script> <!-- Gem jQuery -->
			
	</head>
	<body class="no-sidebar">
		<div id="page-wrapper">

			<!-- Header Wrapper -->
				<div id="header-wrapper">

					<!-- Header -->
						<div id="header" class="container">

							<?php
							include '../pag_interiores/menu/masterMenu.php';
							?>
							

						</div>

				</div>

			<!-- Main Wrapper -->
				<div id="main-wrapper">

					<!-- Wide Content -->
						<section id="intro" class="container">
							
							<div class="row">
							
								<section class="12u 12$">
									
									<div class="row">
									 <div class="hello 12u$"> Hola <?php echo $row['nombre']; ?>!! </div>
									</div>
									
									<header>
									<h2> Te mostramos todo lo que podes hacer con EGDO!!! </h2>
									</header>
								</section>
						    
									<section class="6u 12u(mobile)">
								
										<div class="row">
										
											<div class="12u$">
										
												<img src="../images/shirt.png" alt="">
												
												<div class="12u$">
													<a href="#" class="button special small">
													Arma tu Diseño</a>
												</div>
												
												<div class="12u$">
												<ul class="indexUser">
													<li>
														<span class="bold"><i class="fa fa-pencil" aria-hidden="true"></i>
														&nbsp;DISEÑA!&nbsp;&nbsp;</span>
														<span class="bold"><i class="fa fa-thumbs-up" aria-hidden="true"></i>
														&nbsp;PROPONE!&nbsp;</span>
														
													</li>
													<li>
														<span class="bold">
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star-half-o" aria-hidden="true"></i>
														<i class="fa fa-star-o" aria-hidden="true"></i>
														&nbsp;&nbsp;
														</span>
														<span class="bold">
														<i class="fa fa-trophy" aria-hidden="true"></i>&nbsp;&nbsp;GANADOR&nbsp;
														</span>
													</li>
												</ul>
												</div>
												
											
											</div>
										
											<div class="12u$">
										
											
												<img src="../images/foto-evento.png" alt="">
												
												<div class="12u$">
													<a href="#" class="button special small">
													Foto De Evento</a>
												</div>
												
												<div class="12u$">
												<ul class="indexUser">
													<li>
														<span class="bold"><i class="fa fa-thumbs-up" aria-hidden="true"></i>
														&nbsp;COMPARTI!&nbsp;</span>
													</li>
													<li>
														<span class="bold">
														<i class="fa fa-picture-o" aria-hidden="true"></i>
														&nbsp;FOTOS DE TUS EVENTOS&nbsp;</span>
													</li>
												
												</ul> 
												</div>
											
											</div>
											
											<div class="12u$">
									
										
												<img src="../images/settings_53x53.png" alt="">
										
												<div class="12u$">
													<a href="#" class="button special small">
													&nbsp;Herramientas&nbsp;</a>
												</div>
												
												<div class="12u$">
												<ul class="indexUser">
													<li>
														<span class="bold">
															<i class="fa fa-calendar" aria-hidden="true"></i>
															&nbsp;CALENDARIO&nbsp;</span>
													</li>
													<li>
														<span class="bold">
														<i class="fa fa-bell-o" aria-hidden="true"></i>
														&nbsp;NOTIFICACIONES&nbsp;
														</span>
														
													</li>
												</ul>
												</div>
											
											</div>
										
										</div>
								
									</section>
								
									<section class="6u 12u(mobile)">
								
									<div class="row">
										
										<div class="12u$">
									
											<img src="../images/upd.png" alt="">
										
											<div class="12u$">
												<a href="#" class="button special small">
												ORGANIZA UPD
												</a>
											</div>
											
											<div class="12u$">
												<ul class="indexUser">
													<li>
														<span class="bold">
															<i class="fa fa-map-marker" aria-hidden="true"></i>
															&nbsp;PROPONE TU LUGAR!&nbsp;&nbsp;
														</span>
														<span class="bold">
														<i class="fa fa-comment-o" aria-hidden="true"></i>
														&nbsp;COMENTALO!
														</span>
														
													</li>
													<li>
														<span class="bold">
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star-half-o" aria-hidden="true"></i>
														<i class="fa fa-star-o" aria-hidden="true"></i>
														&nbsp;&nbsp;
														</span>
														<span class="bold">
														<i class="fa fa-trophy" aria-hidden="true"></i>&nbsp;&nbsp;GANADOR&nbsp;
														</span>
														
													</li>
												</ul>
											</div>
											
										</div>
										
										<div class="12u$">
									
										
											<img src="../images/party.png" alt="">
											
											<div class="12u$">
												<a href="#" class="button special small">
												ORGANIZA FIESTA</a>
											</div>
											
											<div class="12u$">
												<ul class="indexUser">
													<li>
														<span class="bold">
															<i class="fa fa-map-marker" aria-hidden="true"></i>
															&nbsp;PROPONE TU LUGAR!&nbsp;&nbsp;
														</span>
														<span class="bold">
														<i class="fa fa-comment-o" aria-hidden="true"></i>
														&nbsp;COMENTALO!
														</span>
														
													</li>
													<li>
														<span class="bold">
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star-half-o" aria-hidden="true"></i>
														<i class="fa fa-star-o" aria-hidden="true"></i>
														&nbsp;&nbsp;
														</span>
														<span class="bold">
														<i class="fa fa-trophy" aria-hidden="true"></i>&nbsp;&nbsp;GANADOR&nbsp;
														</span>
														
													</li>
												</ul>
											</div>
											
										</div>
										
										
										
										<div class="12u$">
									
										
											<img src="../images/bus.png" alt="">
										
											<div class="12u$">
												<a href="#" class="button special small">
												&nbsp;&nbsp;Info Viaje&nbsp;&nbsp;</a>
											</div>
											<div class="12u$">
												<ul class="indexUser">
													<li>
														<span class="bold">
														<i class="fa fa-info-circle" aria-hidden="true"></i>
														&nbsp;INFO&nbsp;</span>
													</li>
													<li>
														<span class="bold">
														<i class="fa fa-map-signs" aria-hidden="true"></i>
														&nbsp;POSIBLE DESTINOS&nbsp;</span>
													</li>
												
												</ul> 
											</div>
											
										</div>
									
									</div>
									
									</section>
								
								
								</div>
						
						</section>

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
							</ul>
						</div>

					<!-- Copyright -->
						<div id="copyright" class="container">
							&copy; EGDO 2016.
						</div>

				</div>

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