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
								<h1 id="logo"><a href="../index.php"><img class="egdo-logo-register" src="../assets/images/EGDO.png" alt=""></a></h1>

							<!-- Nav Eliminado -->

						</div>

				</div>

			<!-- Main Wrapper -->
				
					<!-- Wide Content -->
						

			<!-- - - - - - - - - - - - - Content - - - - - - - - - - - - -  -->
<?php

$datos = $_GET;

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "egdo_db";
$tbl_name = "usuario";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
die("La conexion falló: " . $conexion->connect_error);
}											

//consulta si el email y id_confirmacion se encuentran asociados
$buscarUsuario = 'SELECT * FROM usuario
WHERE email ="'. $datos["email"].'" and id_confirmacion="'. $datos["id_confirmacion"].'"';

$result = $conexion->query($buscarUsuario);

$count = mysqli_num_rows($result);

if ($count == 1) {

	//al dar ok se actualiza el estado de activacion a 1 y se redirecciona al paso 2
	$query = 'UPDATE usuario SET estadoActivacion = 1 
	WHERE email ="'. $datos["email"].'" and id_confirmacion="'. $datos["id_confirmacion"].'"';
	mysqli_query($conexion,$query);
	mysqli_close($conexion);
	//header('Location:registroPaso2.php?email='.$datos["email"].'');

}
else {
	echo "<script language='JavaScript'>
		alert('Error al activar cuenta, comunicate con EGDO');
		</script>";
	//header('Location:../index.php');		
}

//	mysqli_close($conexion);
?>

		<div id="contents">

			<div class="form-container">

				<div id="tmm-form-wizard" class="containers substrate"> <!--container substrate-->

					<div class="rows">
						<div class="col-xs-12">
							<h2 class="form-login-heading">Tu cuenta ya esta activa,<span> solo falta completar tus datos</span></h2>
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

					<form action="validaCuentaUsuario.php" method="POST" role="form">

						<div class="form-wizard">

							<div class="rows">
								
								<div class="col-md-9 col-sm-7">

									<fieldset class="input-block">
										<label for="username">Nombre</label>
										<input type="text" id="username" class="form-icon form-icon-user" name="nombre" placeholder="Nombre" required />
									</fieldset><!--/ .input-login name-->
									
									<fieldset class="input-block">
										<label for="surname">Apellido</label>
										<input type="text" id="surname" class="form-icon form-icon-user" name="apellido" placeholder="Apellido" required />
									</fieldset><!--/ .input-login surname-->
									
									<fieldset class="input-block">
										<label for="password">Password</label>
										<input type="password" id="password" placeholder="Password" name="pass" required />
									</fieldset><!--/ .input-password-->
									
									<fieldset class="input-block">
										<label for="pass-confirm">Confirmar password</label>
										<input type="password" id="pass-confirm" placeholder="Password" name="repass" required />
									</fieldset><!--/ .input-conf-password-->
									
									<?php echo '<input type="hidden" name="email" value="'.$datos["email"].'">';?>
										
								</div>

							</div><!--/ .row-->
							
						</div><!--/ .form-wizard-->
						
							<div class="prev" style="display: none;">
								<button class="button button-control" type="button" ><span>Prev Step <b>Account Information</b></span></button>
								<div class="button-divider"></div>
							</div>
						
							<div class="next">
								<button class="button button-control" type="submit" ><span>Confirmar <b> info</b></span></button>
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