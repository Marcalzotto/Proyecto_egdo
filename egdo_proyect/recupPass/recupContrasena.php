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
		<link rel="stylesheet" href="../css/main.css" />  
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		
		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<!-- CSS
		================================================== -->
		<link rel="stylesheet" href="../css/tmm_form_wizard_style_demo.css" />
		<link rel="stylesheet" href="../css/grid.css" />
		<link rel="stylesheet" href="../css/tmm_form_wizard_layout.css" />
		<link rel="stylesheet" href="../css/fontello.css" />
		
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

							<!-- Nav Eliminado -->

						</div>

				</div>

			<!-- Main Wrapper -->
				
					<!-- Wide Content -->
						

			<!-- - - - - - - - - - - - - Content - - - - - - - - - - - - -  -->

		<div id="contents">

			<div class="form-container">

				<div id="tmm-form-wizard" class="containers substrate"> <!--container substrate-->

					<div class="rows">
						<div class="col-xs-12">
							<h2 class="form-login-heading">Reestablece tu contrase&ntilde;a</h2>
						</div>

					</div><!--/ .row-->

					<div class="rows stage-container">

						

					</div><!--/ .row-->

					<div class="rows">

						<div class="col-xs-12">

							<div class="form-header">
								<div class="form-title form-icon title-icon-lock">
									<b><i class="fa fa-lock" aria-hidden="true"></i> Completa los campos </b> 
								</div>
								<div class="steps">
									
								</div>
							</div><!--/ .form-header-->

						</div>

					</div><!--/ .row-->

					<form action="../recupPass/enviaEmail.php" method="post" role="form">

						<div class="form-wizard">
							
							<div class="rows">

								<div class="col-md-8 col-sm-7">
										
										
										</br>
										<fieldset class="input-block">
										<label for="email">Email</label>		
										<input type="text" id="email" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" class="form-icon form-icon-mail" name="email" placeholder="Email" required />
										</fieldset><!--/ .input-email-->
										
										</br>
										<img src="captcha.php" alt=""> </br>
										<fieldset class="input-block">
										<label for="codigo">Por razones de seguridad, ingresa el c&oacute;digo que aparece en el cuadro.</label>
										<input id="codigo" name="introducido" type="text" class="form-icon form-icon-mail" placeholder="C&oacute;digo">
										</fieldset><!--/ .input-email-->
									

								</div>

							</div><!--/ .row-->
							
						</div><!--/ .form-wizard-->

						<div class="prev">
							<!--/<button class="button button-control" type="button" onclick="window.location.href='registroPaso2.php'"><span>Paso Anterior <b>Datos curso</b></span></button>
							<div class="button-divider"></div>-->
						</div>
						
						<div class="next">
							<button name="Enviar" class="button button-control" type="submit"><span>Enviar <b>email</b></span></button>
							<div class="button-divider"></div>
						</div>

					</form><!--/ .form-wizard-->

				</div><!--/ .container-->
				
			</div><!--/ .form-container-->

		</div><!--/ #content-->
	

		<!-- - - - - - - - - - - - end Content - - - - - - - - - - - - - -->


		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>-->

		<!--[if lt IE 9]>
				<script src="js/respond.min.js"></script>
		<![endif]-->
		
		<!--<script src="js/tmm_form_wizard_custom.js"></script>-->
						
						
			

			<?php
					include '../pag_interiores/menu/masterFooter.php';
			?>

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