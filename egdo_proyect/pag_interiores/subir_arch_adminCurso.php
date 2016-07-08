<?php
session_start();
?>
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
			<script>
				$(function(){
						
						$("#formulario").on("submit", function(evento){
							evento.preventDefault();
							var formData = new FormData(document.getElementById("formulario"));
							formData.append("clave","valor");

							var direccion = "recibe_datos.php";
							$.ajax({
								url: direccion,
								type: "post",
								dataType: "html",
								data: formData,
								cache: false,
								contentType: false,
								processData: false
							})

							.done(function(response){
								$("#respuesta_ajax").html(response);
							});
						
						});
				
						
				});
			</script>
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
								
									<li class="circle"><a href="left-sidebar.html"><img src="../images/upd.png" alt="UPD"></a></li>
										
										<li class="circle">
											<a href="#">
												<img src="../images/shirt.png" alt="Dise&ntilde;ar">
											</a>
												<ul>
													<li><a href="Tee-Designer-Master/index_adminCurso_tee.php">Dise&ntilde;a tu ropa <img src="../images/dropotron_icons/disenio_ropa.png" alt="" style="float:right"></a></li>
													<li><a href="votacionAdminCurso.php">Votaci&oacute;n<img src="../images/dropotron_icons/votacion.png" alt="" style="float:right"></a></li>
													<li><a href="#">Empresas<img src="../images/dropotron_icons/empresas.png" alt="" style="float:right"></a></li>
													<li><a href="indexUsuarioAdminCurso.php">Principal<img src="../images/dropotron_icons/principal.png" alt="ir a la pagina principal" style="float:right"></a></li>
												</ul>
											</li>
										<li class="circle"><a href="no-sidebar.html"><img src="../images/party.png" alt="Dise&ntilde;ar"></a></li>
										<li class="circle"><a href="no-sidebar.html"><img src="../images/foto-evento.png" alt="foto-evento"></a></li>
										<li class="circle"><a href="no-sidebar.html"><img src="../images/bus.png" alt="info-viajes"></a></li>
										<li class="circle"><a href="no-sidebar.html">
																				<img src="../images/settings.png" alt="configuracion">
																			</a>
																			<ul>
																				<li><a href="#">Manda tu invitacion <img src="../images/dropotron_icons/send_mail.png" alt="agenda" style="float:right"></a></li>
																				<li><a href="#">Bandeja de entrada<img src="../images/dropotron_icons/mail_box.png" alt="agenda" style="float:right"></a></li>
																				<li><a href="#">Notificaciones<img src="../images/dropotron_icons/alarm.png" alt="agenda" style="float:right"></a></li>
																				<li><a href="#">Agenda<img src="../images/dropotron_icons/calendar.png" alt="agenda" style="float:right"></a></li>
																				<li><a href="#">Perfil <img src="../images/dropotron_icons/avatar.png" alt="perfil" style="float:right"></a></li>
																				<li><a href="#">Logout <img src="../images/dropotron_icons/logout.png" alt="perfil" style="float:right"></a></li>
																			</ul>


										</li>

										
									</ul>
								</nav>
								
		

						</div>
				
				</div>
</header>
			<!-- Banner Wrapper -->
				<div id="divContform">
					<?php	
						$curso_sesion = 1;
						require_once("conexion.php");
						$verificarEstadoVotacion = "select * from votacion where vigente = 1 and curso_pertenece_votacion = '$curso_sesion'";
						
						$verificar = $conexion->query($verificarEstadoVotacion) or die($conexion->error);

						if($verificar){
							
							$hayVotacion = $verificar->num_rows;
							if($hayVotacion > 0){

								$conjuntoVotacion = $verificar->fetch_array(MYSQLI_ASSOC);
								$fecha_apertura = $conjuntoVotacion["fecha_apertura"];

								$fechaHoy = new datetime(null, new DateTimeZone('America/Argentina/Buenos_Aires'));
								$fecha_de_prueba = new datetime("2016-07-09 20:00:00"); 

								$fecha_fin_primer_instancia = new datetime($conjuntoVotacion["fecha_apertura"]);
								$fecha_fin_primer_instancia->add(new dateInterval('P2D')); 

								$fecha_fin_segunda_instancia = new datetime($conjuntoVotacion["fecha_apertura"]);
								$fecha_fin_segunda_instancia->add(new dateInterval('P4D'));

								if($fecha_de_prueba >= $fecha_apertura && $fecha_de_prueba <= $fecha_fin_primer_instancia){

												echo "<div class=form>
															<h2>Subi tus dise&ntilde;os</h2>
							
															<div id=respuesta_ajax>
						
															</div>
					
															<form enctype=multipart/form-data method=post id=formulario>

															<select name=disenio_opcion id=dis_opcion>
																<option value=0>Seleccionar dise&ntilde;o:</option>
																<option value=1>Buzo/Campera</option>
																<option value=2>Remera</option>
																<option value=3>Bandera</option>
															</select>
										
															<div id=frontal>
																<p id=subir_frontal>Subir Frontal</p>
																<input type=file name=dis_frontal id=d_frontal>
															</div>
											
															<div id=impresion>
																<p id=subir_impresion>Subir Impresion</p>
																<input type=file name=vista_impresion  id=d_impresion>
															</div>
											
															<div id=btn-enviar>
																<p id=p_enviar>Subir</p>
																<input type=submit name=enviar_archs  id=d_enviar>
															</div>

															</form>
						
															</div>";
								}else if($fecha_de_prueba >= $fecha_fin_primer_instancia && $fecha_de_prueba <= $fecha_fin_segunda_instancia){
										echo "<h2>La votacion vigente ya paso la primer instancia.</h2>";
								}else if($fecha_de_prueba >= $fecha_fin_segunda_instancia){
									echo "<h2>La votacion ha finalizado.</h2>";
								}else{
									echo "<h2>Lo sentimos hubo un error inesperado</h2>";
								}

							}else{
								echo "<h2>No hay votaciones abiertas para este curso</h2>";
							}
						}else{
							echo "<h2>Lo sentimos hubo problemas con el servidor.</h2>";
						}

						
					?>		
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