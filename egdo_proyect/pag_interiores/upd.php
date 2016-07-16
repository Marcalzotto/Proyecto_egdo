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
		    <link rel="stylesheet" type="text/css" href="../assets/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="../assets/css/form-validation.css" /> 
 
			<script src="../js/modernizr.js"></script> <!-- Modernizr -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
			<script src="../js/mainModal.js"></script> <!-- Gem jQuery -->
	
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
			<!-- Main Wrapper  -->
				<div id="main-wrapper-ad">

					<!-- Wide Content -->
						<section id="content" class="container">
							
						<!--	<ul class="nav2">
								<li class="nav2-li"><a class="active" href="panel-index.html"> Mi Perfil</a></li>
								<li class="nav2-li"><a class="nav2-a" href="panel-search.html">Buscar</a></li>
								<li class="nav2-li"><a href="panel-mensaje.html" class="nav2-a">Mensaje</a></li>
								<li class="nav2-li"><a class="nav2-a" href="panel-empresas.html">Empresas</a></li>
								<li class="nav2-li"><a class="nav2-a" href="panel-search-empresa.html">Buscar Empresas</a></li>
								<li class="nav2-li"><a class="nav2-a" href="panel-info.html">Info Viajes</a></li>
								<li class="nav2-li"><a class="nav2-a" href="panel-moderar.html">Moderar</a></li>
							</ul>-->


							<div class="main-content"> <!-- main content -->

								<!-- You only need this form and the form-validation.css -->

								<form class="form-validation" enctype="multipart/form-data" method="post" action="upd-2.php">

									<div class="form-title-row">
										<h1>Formulario UPD</h1>
									</div>

									<div class="form-row form-input-name-row">

										<label>
											<span>Nombre</span>
											<input type="text" name="name">
										</label>

										<!--
											Add these three elements to every form row. They will be shown by the
											.form-valid-data and .form-invalid-data classes (see the JS for an example).
										-->

										<span class="form-valid-data-sign"><i class="fa fa-check"></i></span>

										<span class="form-invalid-data-sign"><i class="fa fa-close"></i></span>
										<span class="form-invalid-data-info"></span>

									</div>
									
									<div class="form-row form-input-name-row">

										<label>
											<span>Direcci&oacute;n</span>
											<input type="text" name="name">
										</label>

										<!--
											Add these three elements to every form row. They will be shown by the
											.form-valid-data and .form-invalid-data classes (see the JS for an example).
										-->

										<span class="form-valid-data-sign"><i class="fa fa-check"></i></span>

										<span class="form-invalid-data-sign"><i class="fa fa-close"></i></span>
										<span class="form-invalid-data-info"></span>

									</div>

									<div class="form-row form-input-email-row">

										<label>
											<span>Tel&eacute;fono</span>
											<input type="email" name="email">
										</label>

										<span class="form-valid-data-sign"><i class="fa fa-check"></i></span>

										<span class="form-invalid-data-sign"><i class="fa fa-close"></i></span>
										<span class="form-invalid-data-info"></span>

									</div>

									<div class="form-row form-input-name-row">

										<label>
											<span>Redes</span>
											<input type="text" name="name">
										</label>

										<!--
											Add these three elements to every form row. They will be shown by the
											.form-valid-data and .form-invalid-data classes (see the JS for an example).
										-->

										<span class="form-valid-data-sign"><i class="fa fa-check"></i></span>

										<span class="form-invalid-data-sign"><i class="fa fa-close"></i></span>
										<span class="form-invalid-data-info"></span>

									</div>
									
									<div class="form-row form-input-name-row">

										<label>
											<span>Web</span>
											<input type="text" name="name">
										</label>

										<!--
											Add these three elements to every form row. They will be shown by the
											.form-valid-data and .form-invalid-data classes (see the JS for an example).
										-->

										<span class="form-valid-data-sign"><i class="fa fa-check"></i></span>

										<span class="form-invalid-data-sign"><i class="fa fa-close"></i></span>
										<span class="form-invalid-data-info"></span>

									</div>

                                    <div class="form-row form-input-name-row">

										<label>
											<span>Detalles</span>
											<input type="text" name="name">
										</label>

										<!--
											Add these three elements to every form row. They will be shown by the
											.form-valid-data and .form-invalid-data classes (see the JS for an example).
										-->

										<span class="form-valid-data-sign"><i class="fa fa-check"></i></span>

										<span class="form-invalid-data-sign"><i class="fa fa-close"></i></span>
										<span class="form-invalid-data-info"></span>

									</div>



									 <div class="form-row">
                    <div class="form-radio-buttons">

                        <div>
                            <label>
                                    <span>Foto 1<input type="radio" name="name">
                           <input type="file" class="file_input" name="file" /> </span>
                            </label>
                        </div>

                        <div>
                            <label>
                                <span>Foto 2<input type="radio" name="name">
                                <input type="file" class="file_input" name="file" /></span>
                            </label>
                        </div>

                    </div>
                </div>
								  

									<div class="form-row">

										<button type="submit">Submit Form</button>

									</div>

								</form>


							</div> <!-- /main content -->

						</section>

				</div>  <!--main wrapper-->

											

	

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