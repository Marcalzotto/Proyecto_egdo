<!DOCTYPE html>
<!--
	Wide Angle by Pixelarity
	pixelarity.com @pixelarity
	License: pixelarity.com/license
-->
<html class="not-ie no-js" lang="en">
	<head>
		
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,300italic,400,500,700%7cCourgette%7cRaleway:400,700,500%7cCourgette%7cLato:700' rel='stylesheet' type='text/css'>
		
		<!-- Basic Page Needs
		================================================== -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		
		<title>EGDO</title>
		<!-- Google Web Fonts
		================================================== -->
		
		
		<!--<meta charset="utf-8" /> -->
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../assets/css/main.css" />	 
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		
		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<!-- CSS
		================================================== -->
		<link rel="stylesheet" href="../assets/css/tmm_form_wizard_style_demo.css" />
		<link rel="stylesheet" href="../assets/css/grid.css" />
		<link rel="stylesheet" href="../assets/css/tmm_form_wizard_layout.css" />
		<link rel="stylesheet" href="../assets/css/fontello.css" />
		
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
								<h1 id="logo"><a href="../index.php"><img class="egdo-logo-register" src="../assets/images/EGDO.png" alt=""></a></h1>

							<!-- Nav Eliminado-->

						</div>
						
					</div>

			<!-- Main Wrapper -->
				
					<!-- Wide Content -->
						

			<!-- - - - - - - - - - - - - Content - - - - - - - - - - - - -  -->
			<div id="contents">

			<div class="form-container">

				<div id="tmm-form-wizard" class="containers substrate">

					<div class="rows">

						<div class="col-xs-12">
							<h2 class="form-login-heading">Segui los pasos,<span> registrate y registra tu curso</span></h2>
						</div>

					</div><!--/ .row-->

					<div class="rows stage-container">

						<div class="stage tmm-success col-md-3 col-sm-3">
							<div class="stage-header head-icon head-icon-lock"></div>

							<div class="stage-content">
								<h3 class="stage-title">Crear cuenta</h3>
								<div class="stage-info">
									Ingresar datos personales 
									nombre email password
								</div>
							</div>
						</div><!--/ .stage-->
						
						<div class="stage tmm-current col-md-3 col-sm-3">
							<div class="stage-header head-icon head-icon-user"></div>
							<div class="stage-content">
								<h3 class="stage-title">Datos del Curso</h3>
								<div class="stage-info">
									Ingresar nombre escuela
									curso cantidad alumnos
								</div>
							</div>
						</div><!--/ .stage-->
						
						<div class="stage col-md-3 col-sm-3">
							<div class="stage-header head-icon head-icon-payment"></div>
							<div class="stage-content">
								<h3 class="stage-title">Enviar Invitaciones</h3>
								<div class="stage-info">
									Invita a tus compa&ntilde;eros
									ingresando sus email
								</div>
							</div>
						</div><!--/ .stage-->
						
						<div class="stage col-md-3 col-sm-3">
							<div class="stage-header head-icon head-icon-details"></div>
							<div class="stage-content">
								<h3 class="stage-title">Confirma Invitaciones</h3>
								<div class="stage-info">
									Vas a enviar invitaciones
									los siguientes email
								</div>
							</div>
						</div><!--/ .stage-->

					</div><!--/ .row-->

					<div class="rows">

						<div class="col-xs-12">

							<div class="form-header">
								
								<div class="form-title form-icon title-icon-user">
									<b><i class="fa fa-university" aria-hidden="true"></i>Datos Curso</b> 
								</div>
								<div class="steps">
									Paso 2 - 4
								</div>
								
							</div><!--/ .form-header-->

						</div>

					</div><!--/ .row-->

					<form action="validaRegistroPaso2.php" method="POST" role="form">

						<div class="form-wizard">
						
							<div class="col-md-9 col-sm-7">
							
									<div class="rows">
							
										<div class="col-md-12 col-sm-12">
											<fieldset class="input-block">
												<label for="address">Nombre de Escuela</label>
												<input type="text" id="address" placeholder="Nombre de Escuela" name="nombre_escuela" required />
											</fieldset><!--/ .input-first-name-->
										</div>
									</div><!--/ .row-->
									
									<div class="rows">
										
										<div class="col-md-12 col-sm-12">
											<fieldset class="input-block">
												<label for="last-name">Localidad</label>
												<input type="text" id="last-name" placeholder="Localidad" name="localidad" required />
											</fieldset><!--/ .input-first-name-->
										</div>
										
									</div><!--/ .row-->

									<div class="rows">
										
										<div class="col-md-6 col-sm-6">

											<div class="input-block">
												<label>Curso - A&ntilde;o</label>
												<div class="dropdown">
													<select class="dropdown-select" name="curso_anio">
														<option value="1">1&deg;</option>
														<option value="2">2&deg;</option>
														<option value="3">3&deg;</option>
														<option value="4">4&deg;</option>
														<option value="5">5&deg;</option>
														<option value="6">6&deg;</option>
														<option value="7">7&deg;</option>
														<option value="8">8&deg;</option>
														<option value="9">9&deg;</option>
													</select>
												</div><!--/ .dropdown-->												
											</div><!--/ .input-role-->
											
										</div>

										<div class="col-md-6 col-sm-6">

											<fieldset class="input-block">
												<label>Curso - Letra</label>
												<div class="dropdown">
													<select class="dropdown-select" name="curso_letra">
														<option value="A">A</option>
														<option value="B">B</option>
														<option value="C">C</option>
														<option value="D">D</option>
														<option value="E">E</option>
														<option value="F">F</option>
														<option value="G">G</option>
														<option value="H">H</option>
														<option value="I">I</option>
														<option value="J">J</option>
													</select>
												</div><!--/ .dropdown-->	
											</fieldset><!--/ .input-role-->
											
										</div>

									</div><!--/ .row-->

									<div class="rows">
										
										<div class="col-md-12 col-sm-12">
											<fieldset class="input-block">
												<label for="first-name">Cantidad de alumnos</label>
												<input type="text" id="first-name" placeholder="Cantidad de alumnos" name="cant_alumnos"required />													
											</fieldset><!--/ .input-first-name-->
										</div>
									</div><!--/ .row-->
							</div>
							
						</div><!--/ .form-wizard-->
						
						<div class="next">
							<button class="button button-control" type="submit"><span>Paso Siguiente <b>Enviar Invitacion</b></span></button>
							<div class="button-divider"></div>
						</div>

					</form><!--/ form-->

				</div><!--/ .container-->
				
			</div><!--/ .form-container-->

		</div><!--/ #content-->

		
	

		<!-- - - - - - - - - - - - end Content - - - - - - - - - - - - - -->


		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>-->

		<!--[if lt IE 9]>
				<script src="js/respond.min.js"></script>
		<![endif]-->
		
		<!--<script src="js/tmm_form_wizard_custom.js"></script>-->
						
						
			

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

		<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/skel-viewport.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>
	</body>
</html>