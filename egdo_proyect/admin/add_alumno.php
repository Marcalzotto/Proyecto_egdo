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
		<!-- Jquery Validate -->
		<script type="text/javascript" src="assets/js/jquery.js"></script>
		<script type="text/javascript" src="assets/js/jquery.validate.js"></script>
		<script type="text/javascript" src="assets/js/additional-methods.js"></script>
		<script type="text/javascript" src="assets/js/functionAddAlumno.js"></script>
		
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
										<h2>Registro Usuarios</h2>
									</header>
									<hr class="major"/>
									
									<div class="row uniform">
										<div class="12u">
											<a href="alumno.php" class="button button-big ver"><i class="fa fa-eye fa-fw" aria-hidden="true"></i>&nbsp;Ver Usuarios</a>
											<hr class="major"/>
										</div>

										<div class="12u"> 
										
											<div id="error" class=""> </div>
										
										</div>
										
									</div>
									
									<div class="12u 12u$(medium)"> <!-- Sec Datos Alumno -->
									
									<!-- form start -->
									<form role="form" id="add-user" autocomplete="off" method="post" action="">
									<!--<div class="grid-demo">-->
									<div class="row uniform 50%">	
										<!-- Break -->
										<div class="-1u 2u"><span>Nombre</span></div>
										<div class="-1u 5u$"><span><input type='text' name='user_name' class="form-class" placeholder='Nombre Alumno'/></span>
										</div>
										<!-- Break -->
										<div class="-1u 2u"><span>Apellido</span></div>
										<div class="-1u 5u$"><span><input type='text' name='user_apellido' class="form-class" placeholder='Apellido Alumno'/></span></div>
										<!-- Break -->
										<div class="-1u 2u"><span>Email</span></div>
										<div class="-1u 5u$"><span><input type='text' name='user_email' class="form-class" placeholder='user@email.com'/></span></div>
										<!-- Break -->
										<div class="-1u 2u"><span>Password</span></div>
										<div class="-1u 5u$"><span><input type='password' name='password' class="form-class" placeholder='**********'/></span></div>
										<!-- Break -->
										<div class="-1u 2u"><span>Rol</span></div>
										<div class="-1u 5u$">
										<div class="select-wrapper">
										<select class="select" name="user_rol" id="user_rol">
										<option value="">seleccione</option>
										<option value="2">Administrador Curso</option>
										<option value="3">Usuario</option>
										</select>
										</div>
										</div>
										<!-- Break -->
										<div class="-1u 2u"><span>Curso</span></div>
										<div class="-1u 5u$">
										<div class="select-wrapper">
										<select class="select" name="user_curso" id="user_curso">
										<option value="">seleccione</option>
										<?php
										require('config_bd.php');
										$consulta = ('SELECT id_curso,nombre_escuela,localidad FROM curso');
										$result = $conexion ->query($consulta);
										if ($result->num_rows >0) {
											while($row = $result->fetch_assoc()){
											echo'<option value='.$row['id_curso'].'>'.$row['nombre_escuela'].'-'.$row['localidad'].'</option>';	
											}
										} else {
												echo '<option value="">"0 resultado" </option>';
										}
										$conexion->close();
										?>
										</select>
										</div>
										</div>
										<!-- Break -->
										<div class="-2u 8u$">
											<button type="submit" class="button special icon fa fa-plus" name="btn-save" id="btn-save">
											Guardar Registro
											</button>
										</div>
								    </div>
									<!--</div> -->
									</form>
										
								</div> <!-- /Sec Datos Alumno -->
								
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