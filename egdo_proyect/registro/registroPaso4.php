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
		<link rel="stylesheet" href="../css/mainRegistro.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		
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
								<h1 id="logo">
									<a href="../index.php"><img class="egdo-logo-register" src="../images/imagesAdmin/EGDO.png" alt=""></a>
								</h1>

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
											<a href="registroPaso1.php">REGISTRO</a>
										</li>
										<li class="circle">
											<a href="#contacto">CONTACTO</a>
										</li>
									</ul>
								</nav>

						</div>

				</div>

			<!-- Main Wrapper -->
				<div id="main-wrapper">

					
						<!-- Main -->
						<div id="intro" class="container">
							
							<div class="row"> <!-- Row Principal -->	
							
								<section class="12u 12u(mobile)"> <!-- Pasos -->
									<header>
										<h2>SEGUI LOS PASOS, REGISTRATE Y REGISTRA TU CURSO</h2>
									</header> 
									
									<div class="row uniform">
									
									<!-- Break -->
									<div class="3u">
										<span class="fa-stack fa-lg icon-sucess">
											<i class="fa fa-circle fa-stack-2x"></i>
											<i class="fa fa-lock fa-stack-1x fa-inverse"></i>
										</span> 
										<header>
											<h5>1.CREAR TU CUENTA <i class="fa fa-check-circle" aria-hidden="true"></i></h5>
										</header>
											
									</div>
									
									<!-- Break -->
									<div class="3u">
										<span class="fa-stack fa-lg icon-sucess">
											<i class="fa fa-circle fa-stack-2x"></i>
											<i class="fa fa-university fa-stack-1x fa-inverse"></i>
										</span> 
										<header>
											<h5>2.DATOS DEL CURSO <i class="fa fa-check-circle" aria-hidden="true"></i></h5>
										</header>
										
									</div>
									
									<!-- Break -->
									<div class="3u">
										<span class="fa-stack fa-lg icon-sucess">
											<i class="fa fa-circle fa-stack-2x"></i>
											<i class="fa fa-users fa-stack-1x fa-inverse"></i>
										</span> 
										<header>
											<h5>3.ENVIAR INVITACIONES <i class="fa fa-check-circle" aria-hidden="true"></i></h5>
										</header>
										
									</div>
									
									<!-- Break -->
									<div class="3u$">
										<span class="fa-stack fa-lg icon-active">
											<i class="fa fa-circle fa-stack-2x"></i>
											<i class="fa fa-check-circle-o fa-stack-1x fa-inverse"></i>
										</span> 
										<header>
											<h5>4.CONFIRMAR INVITACIONES</h5>
										</header>
										
									</div>
									
								</div>
								
								
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
											<h5 class="subheader-step"><i class="fa fa-check" aria-hidden="true"></i>&nbsp; CONFIRMAR INVITACIONES</h5>
										</div>
										<div class="-4u 3u$">
											<h5 class="subheader-step">PASO 4-4 </h5>
										</div>
										
									</div>
									
									<hr class="major"/>	
									
									<div class="12u 12u$(medium)"> <!-- Sec Datos Alumno -->
									
										<!-- form start -->
										<form role="form" method="post" action="registroFinal.php">
										
										
										
										<div class="row uniform 50%">	
										
										<!-- Break -->
										<div class="-2u 5u">
										
										<?php
											
												//email
											$bandera=0;
											if( empty($_POST['email']) ){
												
												$bandera=1;
												echo "Debe completar el campo email.";
												
											}
											else
											{	
													
													foreach($_POST['email'] as $invitacion)
													{
																						
														// Comprobar mediante  filter_var si es valido el email:
														if(!filter_var($invitacion,FILTER_VALIDATE_EMAIL )){
															
															$bandera=1;
															echo "- El email '".$invitacion."' no es valido.</br>";
															
															}
														else 
														{												
															// Comprobar que no supere cantidad maximo de caracteres:
															if(strlen($invitacion) > 45){
															
																echo "- El email ". $invitacion ." no puede contener mas de 45 caracteres.</br>";
																$bandera=1;
															}
															else{
															
																$emailsOk[]=$invitacion;
																
															}
														}
												
													}	
												
											}
											
											if($bandera==0){
											
												echo 'Se enviaran invitaciones a los siguientes emails:</br>';
												foreach($emailsOk as $invitacion){
												
													echo '- '.$invitacion.'</br>';
												
												}
												
												//manera de mandar array por POST o GET
												$emailsOk = serialize($emailsOk);
												$emailsOk = urlencode($emailsOk);	
												
												
												echo '<input type="hidden" name="emailsOk" value="'.$emailsOk.'">';
												echo '<input type="hidden" name="id_curso" value="'.$_POST["id_curso"].'">';
											}
											else{
											
												echo "<p><a href='registroPaso3.php'>Volver y corregir emails</a></p>";
											
											}
											
											?>
										
										</div>
										
										<!-- Break -->
										<div class="-2u 5u$">
											<button type="submit" class="button special fit small" name="btn-save" id="btn-save">
											Siguiente <i class="fa fa-angle-right" aria-hidden="true"></i>
											</button>
										</div>
										
										
										</div>
									
									
									
									</form>
								
										
									</div> <!-- /Sec Datos Alumno -->
								
								</section>
								
								
								
								
							</div> <!-- /Row Principal -->
							
							
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
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/skel-viewport.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>

	</body>
</html>