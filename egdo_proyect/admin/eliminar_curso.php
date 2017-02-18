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
		<link rel="stylesheet" href="assets/css/mainAdmin.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<script type="text/javascript" src="assets/js/jquery-1.11.1.js"></script>
		
		<link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="../favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
		<link rel="manifest" href="../favicon/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
		
		<!-- mejora tooltips-->
		<link rel="stylesheet" href="../css/hint.css-2.4.1/hint.min.css" />

	
	</head>
	<body class="no-sidebar">
		<div id="page-wrapper">

			<!-- Header Wrapper -->
				<div id="header-wrapper">

					<!-- Header -->
						<div id="header" class="container">

							<!-- Logo -->
								<h1 id="logo"><a href="admin-index.php"><img class="logo-img" src="assets/images/EGDO.png" alt=""/></a></h1>

							<?php
							include '../admin/menuAdminEgdo.php';
							?>
						</div>

				</div>

			<!-- Main Wrapper -->
				<div id="main-wrapper">
					
					<!-- Wide Content -->
						<section id="intro" class="container">
							
							<div class="row"> <!-- Row Principal -->
								<section class="12u 12u">
									<header>
										<h2>Registro Cursos</h2>
									</header>
									<hr class="major"/>
									
									<div class="row uniform">
										<div class="12u">
											<a href="curso.php" class="button button-big ver"><i class="fa fa-eye fa-fw" aria-hidden="true"></i>&nbsp;Ver Cursos</a>
											<hr class="major"/>
										</div>
										
										<div class="12u"> 
											<div id="error" class=""> </div>
										</div>
									
									</div>
									<?php
										
										require('config_bd.php');
										$id_curso=base64_decode($_GET['cur']);
										if(filter_var($id_curso, FILTER_VALIDATE_INT) === false){  
											echo 'Valor incorrecto';  
										}else{  
											$consulta = ("DELETE c, ad, pdf, ev, img, mb, notif, nvp, tc, tcal, u 
														FROM curso AS c 
														INNER JOIN actividad_disenio AS ad INNER JOIN curso_pdf AS pdf 
														INNER JOIN evento AS ev 
														INNER JOIN imagen AS img 
														INNER JOIN medidas_bandera AS mb 
														INNER JOIN notificaciones AS notif 
														INNER JOIN notificacion_vista_por AS nvp  
														INNER JOIN talles_curso AS tc  
														INNER JOIN tcalendario AS tcal
														INNER JOIN usuario AS u 
														WHERE c.id_curso = ad.curso_pertenece_votacion
														AND ad.curso_pertenece_votacion = pdf.curso 
														AND pdf.curso = ev.id_curso
														AND ev.id_curso = img.id_curso
														AND img.id_curso = mb.curso
														AND mb.curso = notif.curso_notificacion
														AND notif.curso_notificacion = nvp.curso_notificacion
														AND nvp.curso_notificacion = tc.curso
														AND tc.curso = tcal.curso_eventos
														AND tcal.curso_eventos = u.id_curso
														AND c.id_curso = '$id_curso'");
											if($conexion ->query($consulta)=== TRUE){
												echo "<div class='box success'> <i class='fa fa-info-circle' aria-hidden='true'></i> &nbsp; Registro eliminado correctamente</div>";
											}else {
												 echo "<div class='box danger'> <i class='fa fa-info-circle' aria-hidden='true'></i> &nbsp; Error al eliminar al registro  </div>" . $conexion->error;
											}	
										}
										$conexion->close();			
									?>
									
								
								</section>
								
								
								
								
							</div> <!-- /Row Principal -->
							
							
						</section> <!-- Wide Content -->

				</div>

			<!-- Footer Wrapper -->
				<div id="footer-wrapper">

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