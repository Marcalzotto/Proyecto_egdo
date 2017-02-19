<?php
include ("../bloqueSeguridad.php");
?>
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
		
		<link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="../favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
		<link rel="manifest" href="favicon/manifest.json">
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
				<?php
					require('config_bd.php');
					
					$id_usuario=$_SESSION["id_usuario"];
					
					//$id_usuario=1;
					
					$consulta= "SELECT nombre,apellido FROM usuario WHERE id_usuario='$id_usuario'";
					
					$query = $conexion->query($consulta);
					while ($row=$query->fetch_array()) {
						$nombre= $row['nombre'];
						$apellido= $row['apellido'];
					}
 
					mysqli_close($conexion); 
				?>
				
				
				<div id="main-wrapper">

					<!-- Main -->
						<div id="intro" class="container">
							
							<div class="row"> <!-- Row Principal -->	
								
								<div class="12u$">	
									<hr class="major"/>
										<div class="-5u 2u">	
											<img src="../images/imagesAdmin/user-avatar.png" alt=""/>
										</div>
									<hr class="major"/>
								
								</div>
								
									
								<div class="12u$">	
									
									<header>
										<h2>Bienvenido Administrador</h2>
									</header>
									
									<!-- form start -->
									<form role="form" id="add-user" autocomplete="off" method="post" action="">
									
										<div class="row uniform 50%">	<!-- Sec Datos User -->
											
											
											<!-- Break -->
											<input type='hidden' name='user' value='<?php echo $id_protegido=base64_encode($row['id_usuario']); ?>'/>
											
											<!-- Break -->
											<div class="-4u 4u$"><span>Nombre: <?php echo $nombre ?></span></div>
											
											<!-- Break -->
											<div class="-4u 4u$"><span>Apellido: <?php echo $apellido ?></span></div>
										
											<!-- Break -->
											<div class="-2u 8u$">
												<a href="edit-perfil.php" class="button button-big adds"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>&nbsp;Editar Perfil</a>
											</div>
										</div> <!-- /Sec Datos User -->
									
									</form>
										
								</div>
							
							</div>	<!-- /Row Principal -->
							
						</div>

				</div> <!-- /Main Wrapper -->

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