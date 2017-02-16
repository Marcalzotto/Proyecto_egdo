<!DOCTYPE html>
<!--
	Wide Angle by Pixelarity
	pixelarity.com @pixelarity
	License: pixelarity.com/license
-->
<html>
	<head>
		
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../css/mainRegistro.css" />
		<!--<link rel="stylesheet" href="../css/main.css" /> -->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<script src="../js/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		
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
								</nav> <!-- /Nav -->	
						</div>
				</div>

			<!-- Main Wrapper -->
				<div id="main-wrapper">

						<!-- Main -->
						<div id="intro" class="container">
						
							<div class="row"> <!-- Row Principal -->	
							
								<section class="12u 12u(mobile)"> <!-- Pasos -->
									<header>
										<h2>SI SOS FABRICANTE DE INDUMENTARIA CONTACTATE CON NOSOTROS</h2>
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
											<h5 class="subheader-step"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; INGRESA TUS DATOS </h5>
										</div>
										
									</div>
							<hr class="major"/>	
							
							<div class="12u 12u$(medium)"> <!-- Sec Datos Empresa -->
							
							
							<!-- Contact Form -->
							<form method="post" id="acceso">
								
								<div class="row 50%">
									
									<!-- Break -->
									<div class="-2u 2u"><span>Nombre Empresa</span></div>
									<div class="-1u 5u$">
									<input class="text" type="text" name="name" id="name" placeholder="Nombre Empresa" required>
									</div>
									
									<!-- Break -->
									<div class="-2u 2u"><span>Email</span></div>
									<div class="-1u 5u$">
									<input class="text" type="text" name="email" id="email" placeholder="Email" required>
									</div>
									
									<!-- Break -->
									<div class="-2u 2u"><span>Mensaje</span></div>
									<div class="-1u 5u$">
										<textarea name="message" placeholder="Mensaje" rows="6" required></textarea>
									</div>
									
									<div class="-5u 5u$">
										<input type="submit" class="button special fit small" name="acceso"  value="enviar">
									</div>
									
									<div id="mensaje"></div>
								
								</div>
								
							</form>
							
							</div> <!-- /Sec Datos Empresa -->
							
						</section>
							
						</div> <!-- /Row Principal -->	
							
							
							
<script>
//Guardamos el controlador del div con ID mensaje en una variable
var mensaje = $("#mensaje");
//Ocultamos el contenedor
mensaje.hide();

//Cuando el formulario con ID acceso se envíe...
$("#acceso").on("submit", function(e){
	//Evitamos que se envíe por defecto
	e.preventDefault();
	//Creamos un FormData con los datos del mismo formulario
	var formData = new FormData(document.getElementById("acceso"));

	//Llamamos a la función AJAX de jQuery
	$.ajax({
		//Definimos la URL del archivo al cual vamos a enviar los datos
		url: "empresa-contacto.php",
		//Definimos el tipo de método de envío
		type: "POST",
		//Definimos el tipo de datos que vamos a enviar y recibir
		dataType: "HTML",
		//Definimos la información que vamos a enviar
		data: formData,
		//Deshabilitamos el caché
		cache: false,
		//No especificamos el contentType
		contentType: false,
		//No permitimos que los datos pasen como un objeto
		processData: false
	}).done(function(echo){
		//Una vez que recibimos respuesta
		//comprobamos si la respuesta no es vacía
		if (echo !== "") {
			//Si hay respuesta (error), mostramos el mensaje
			mensaje.html(echo);
			mensaje.slideDown(500);
		} else {
			//Si no hay respuesta, redirecionamos a donde sea necesario
			//Si está vacío, recarga la página
			window.location.replace("");
		}
	});
});

</script>

					
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