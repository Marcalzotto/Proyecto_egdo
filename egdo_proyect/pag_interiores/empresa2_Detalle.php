<?php include ("../bloqueSeguridad.php");?>

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
			<script src="../js/tabs.js"></script>
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
			<script src="../js/calificacionPalabras.js"></script>
			<script src="../js/subirComentario.js"></script>
	
			<!--<script src="../js/mainModal.js"></script>-->  <!--Gem jQuery -->
	
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
			<!-- Banner Wrapper -->
	<div id="banner-wrapper">

					<!--

						The slider's images (as well as its behavior) can be configured
						at the top of "assets/js/main.js".

					-->
					<div id="empresaDetalles">
								<h2>Detalle de Empresa</h2>

								<div id="detalle">
									<ul>
									<li><p><img src="../images/empresas_logos/logotipo.jpg" width="200" height="200" alt=""></p></li>
									<li><p>Nombre:</p> <p>Empresa 2</p></li>
									<li><p>Direcci&oacute;n:</p><p> xxxxxx</p></li>
									<li><p>Telefono:</p> <p>xx-xxxx-xxxx</p></li>
									<li><p>E-mail:</p> <p>Empresa@any.com</p></li>
									<li><p>Sedes:</p><p> Algun lugar</p></li>
									<li><p>Web:</p> <p>www.empresa.com.ar</p></li>
									</ul>
								</div>
								
								<div id="calificacion">	
										
											<ul class="l1">
													<li><p>Calificacion:</p></li>
													<li><p class="puntaje">4,0</p></li>
													<li><span class="marcado">&#9733;</span>
															<span class="marcado">&#9733;</span>
															<span class="marcado">&#9733;</span>
															<span class="marcado">&#9733;</span>
															<span>&#9733;</span>
													</li>
													<li><img src="../images/dropotron_icons/avatar.png" alt="">:&nbsp;400 en Total.</li>
													
											</ul>
											<ul class="l2">
													
													<li><span>&#9733;</span>5<div style="width: 15px; height: 20px; background:#9EBF59;">0</div></li>
													<li><span>&#9733;</span>4<div style="width: 250px; height: 20px; background:#ACD532;">400</div></li>
													<li><span>&#9733;</span>3<div style="width: 15px; height: 20px; background:#FED733;">0</div></li>
													<li><span>&#9733;</span>2<div style="width: 15px; height: 20px; background:#FEB133;">0</div></li>
													<li><span>&#9733;</span>1<div style="width: 15px; height: 20px; background:#FE8A59;">0</div></li>
											</ul>
								</div>
								<div class="formCalificar">
										<h2>Calificar esta empresa</h2>
										<form>
  											<p class="clasificacion">
    												<input id="radio1" type="radio" name="estrellas" value="5">
    												<label class="labelEstrellas" id="label5" for="radio1">★</label>
   													<input id="radio2" type="radio" name="estrellas" value="4">
    												<label class="labelEstrellas" id="label4" for="radio2">★</label>
    												<input id="radio3" type="radio" name="estrellas" value="3">
    												<label class="labelEstrellas" id="label3" for="radio3">★</label>
    												<input id="radio4" type="radio" name="estrellas" value="2">
   													<label class="labelEstrellas" id="label2" for="radio4">★</label>
    												<input id="radio5" type="radio" name="estrellas" value="1">
    												<label class="labelEstrellas" id="label1" for="radio5">★</label>
  											</p>
										</form>
										<p id="texto">No me gusta!</p>
								</div>
								<div id="comentarios">
									
									<h2>Deja tus comentarios aqu&iacute;</h2>
									<form action="">
									
										<label id="labelTextArea" for="textAreaComent">Comentario:</label>
										<textarea name="textArea" id="textAreaComent" cols="30" rows="10"></textarea>
						
										<input type="button" id="btn-comentar" value="Comentar">
										<input type="reset"  id="btn-deshacer"value="Deshacer">

									</form>
									
								</div>
								<div id="noComent">
									<span>Por favor escribe un comentario.</span>	

								</div>
									<div class="unComentario">
										<p><img src="../images/avatar_64.png" alt="">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla sed accusamus dolorum animi doloremque. Voluptates ducimus qui, vitae officia est ipsum molestias enim velit, quos, perferendis aperiam rerum, tenetur dicta?
										</p>
										<p class="tiempo">Hace 2 dias.</p>	
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
								<li><a href="no-sidebar.html" class="icon fa-facebook"><span>Facebook</span></a></li>
								<li><a href="no-sidebar.html" class="icon fa-twitter"><span>Twitter</span></a></li>
								<li><a href="no-sidebar.html" class="icon fa-instagram"><span>Instagram</span></a></li>
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