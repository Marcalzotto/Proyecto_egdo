<?php
session_start();

//session_start();
//if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
	//print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
//$id_usuario=$_SESSION["id_usuario"];

?>
<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "egdo_db";
$tbl_name = "contacto";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

//$sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";
//$sql1= "select * from usuario where id_usuario= 1 ";
//1
//$query = $conexion->query($sql1);
//while ($row=$query->fetch_array()) {

//$name= $row['nombre'];
//$surname= $row['apellido'];

//}
 
 mysqli_close($conexion); 
 ?>


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
		<link rel="stylesheet" href="../assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<script src="../assets/js/jquery.min.js"></script>
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
								<h1 id="logo"><a href="index.html"><img class="egdo-logo-register" src="../assets/images/EGDO.png" alt=""></a></h1>

							<!-- Nav Eliminado -->
								
						</div>

				</div>

			<!-- Main Wrapper -->
				<div id="main-wrapper">

					<!-- Wide Content -->
						<section id="content" class="container">
							<header>
								<h2>Contactanos</h2>
							<p>Si sos fabricante de indumentaria para egresados, contactate con nosotros.</p>
							</header>
							
							<header>
						<h2></h2>
						
					</header>
					<div class="box container 75%">

					<!-- Contact Form -->
							<form method="post" id="acceso">
								<div class="row 50%">
									<div class="6u 12u(mobile)">
										<input class="text" type="text" name="name" id="name" placeholder="Nombre Empresa">
									</div>
									<div class="6u 12u(mobile)">
										<input class="text" type="text" name="email" id="email" placeholder="Email">
									</div>
								</div>
								<div class="row 50%">
									<div class="12u"><textarea name="message" placeholder="Mensaje" rows="6"></textarea></div>
								</div>
								<div class="row">
									<div class="12u">
										<ul class="actions">
											<li><input type="submit" class="button" name="acceso"  value="enviar"></li>
											<li><div id="mensaje"></div></li>
										</ul>
									</div>
								</div>
							</form>
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

					</div>
						</section>

				</div>
			
			<!-- Footer Wrapper -->
				<div id="footer-wrapper" class="footer-main-color">

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
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/skel-viewport.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>

	</body>
</html>