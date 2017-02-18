<?php include ("../bloqueSeguridad.php");?>
<?php include('conexion.php');?>
<?php 
	include('funciones/generar_notificacion.php');
	generar_notificacion($conexion,$_SESSION["curso"]);
?>
<?php include('funciones/cantidad_notificaciones.php');?>
<?php include('funciones/cantidad_notificaciones_mensajes.php');?>
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
		
		<link rel="stylesheet" href="../css/index_gral.css" />
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
			<link rel="stylesheet" href="../css/viajes.css">
			<link rel="stylesheet" href="../css/form-viaje.css">
			<link rel="stylesheet" href="../css/form-upd-comentario.css">

			<link rel="stylesheet" href="../css/viajes.css">

			 <link rel="stylesheet" type="text/css" href="../css/estrellitasCalificacion.css" /> 

			<script src="../js/modernizr.js"></script> <!-- Modernizr -->
			<script src="../js/jquery.min.js"></script>
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
			<script src="../js/mainModal.js"></script> <!-- Gem jQuery -->
			<script src="../js/tomarDatos.js"></script>
	</head>
<body class="homepage">
		<div id="page-wrapper">
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
                         <form class='form-validation' enctype='multipart/form-data' method='post' id='enviarimagenes'>
														<div class='form-row form-input-name-row'>
														
																<input type='text' name='nombre' id='nombre' placeholder='nombre'>
														
														</div>
 														
 														<div class='form-row form-input-name-row'>

																<input type='text' name='descripcion' id='descripcion' placeholder='descripcion'>

														</div>

														 <div class='form-row'>

			                          				  <label>Subir foto
			   
			                           						<input type='file' class='file_input' name='upd_imagen' id='upd_imagen' />
			                           				 </label>
			                        				</div>
			                   						 
												
													<button type='submit'>Subir imagen</button>

											
															</form>

					<!-- Wide Content -->
						<div id="intro" class="container">
							<div class="row">
								
								<section class="4u 12u(mobile)">
									<div id="plaza-san-justo"><a href="upd-3.php"><span class="number">Plaza San Justo</span></a></div>
                                    <div class="estrellas">
									<a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
									<a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
									<a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
									<a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
									<a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
								</div>
								

									 <!-- Agregue el div con el id bariloche para ponerle de fondo la imagen -->
									 <div id="mendoza"><a href="mendoza.html"><span class="number"></span></a></div>
								       <div class="estrellas">
									<a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
									<a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
									<a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
									<a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
									<a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
								</div>
								
								</section>
								<section class="4u 12u(mobile)">
									<div id="cordoba"><a href="cordoba.html"><span class="number"></span></a></div>
								    <div class="estrellas">
									<a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
									<a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
									<a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
									<a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
									<a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
								</div>

								    <div id="mardelplata"><a href="mardelplata.html"><span class="number"></span></a></div>
								     <div class="estrellas">
									<a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
									<a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
									<a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
									<a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
									<a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
								</div>
								
								</section>
								<section class="4u 12u(mobile)">
									<div id="brasil"><a href="brasil.html"><span class="number"></span></a></div>
									 <div class="estrellas">
									<a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
									<a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
									<a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
									<a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
									<a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
								</div>
								

									<div id="mexico"><a href="mexico.html"><span class="number"></span></a></div>
								 <div class="estrellas">
									<a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
									<a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
									<a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
									<a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
									<a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
								</div>
								
								</section>
							</div>
						</div>
					<form class="form-validation" enctype="multipart/form-data" method="post" action="#">

									<div class="form-title-row">
										<h1>Deja tu comentario</h1>
									</div>

									<div class="form-row form-input-name-row">
		
		                               <textarea name="Comentario" placeholder="Comentario"></textarea>

									</div>	

								</form>

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
			<script src="../js/jquery.min.js"></script>
			<script src="../js/jquery.dropotron.min.js"></script>
			<script src="../js/skel.min.js"></script>
			<script src="../js/skel-viewport.min.js"></script>
			<script src="../js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../js/main.js"></script>
			
			
	</body>
</html>