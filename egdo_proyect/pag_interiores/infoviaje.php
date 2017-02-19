<?php include ("../bloqueSeguridad.php");?>
<?php require('conexion.php'); ?>
 <?php 
 	include('funciones/generar_notificacion.php');
 	generar_notificacion($conexion,$_SESSION["curso"]);
 ?>
 <?php include('funciones/cantidad_notificaciones_mensajes.php');?>
 <?php include('funciones/cantidad_notificaciones.php');?>

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
        <link rel="stylesheet" type="text/css" href="../css/style.css" /> 
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
			<link rel="stylesheet" href="../css/viajes.css"> <!-- Gem style -->
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

			<!-- Main Wrapper -->
				<div id="main-wrapper">
                    <?php 
							
							//require_once("conexion.php");
							$host_db = "localhost";
							$user_db = "root";
							$pass_db = "";
							$db_name = "egdo_db";
							

							$conexion = new mysqli($host_db, $user_db, $pass_db,$db_name);

							if ($conexion->connect_error) {
							die("La conexion falló: " . $conexion->connect_error);
							}
							?>

     <div id="intro" class="container"> 
						<div class="row">
							<div id="mensaje"> </div>
							<?php
								$con = "select * from info_viaje";
								$resultado = $conexion->query($con);
								while ($datos = $resultado->fetch_assoc()) {
									$ruta_img = $datos['nombre_lugar'];
							?>
						<section class="4u 12u(mobile)">
         	

						<?php 
							if($ruta_img =='Bariloche.jpg'){
								echo"<a href='bariloche.php'><h2>Bariloche</h2></a>";
							}  
							else if ($ruta_img =='Dique San Roque.jpg'){
								echo "<a href='cordoba.php'><h2>Dique San Roque</h2></a>";
							}  
							else if ($ruta_img =='Camboriu.jpg'){
								echo "<a href='brasil.php'><h2>Camboriu</h2></a>";
							}  
							else if ($ruta_img =='Mendoza.jpg'){
								echo "<a href='mendoza.php'><h2>San Rafael</h2></a>";
							}  
							else if ($ruta_img =='Mar del plata.jpg'){
								echo "<a href='mardelplata.php'><h2>Mar del plata</h2></a>";
							}  

							else if ($ruta_img =='Cancun.jpg'){
								echo "<a href='mexico.php'><h2>Cancun</h2></a>";
							}  
							else{
								echo "<a href='destinos.php'><h2>$datos[nombre_lugar]</h2></a>";
							} 
						?>

							<p><b>Descripcion:</b><br><?php echo $datos['descripcion']; ?></p>
							<img class="number" src="/Proyecto_egdo/egdo_proyect/img/<?php echo $ruta_img; ?>"/> 
						</section>

						<?php
					};
						?>

								</div>
						</div>

				</div>
					<!-- Wide Content -->
						<!--<div id="intro" class="container">
							<div class="row">

								<section class="4u 12u(mobile)">
									<div id="bariloche"><a href="bariloche.html"><span class="number">Bariloche</span></a></div> <!-- Agregue el div con el id bariloche para ponerle de fondo la imagen -->
								<!--	 <div id="mendoza"><a href="mendoza.html"><span class="number">Mendoza</span></a></div>
								</section>
								<section class="4u 12u(mobile)">
									<div id="cordoba"><a href="cordoba.html"><span class="number">Córdoba</span></a></div>
								    <div id="mardelplata"><a href="mardelplata.html"><span class="number">Mar del plata</span></a></div>
								</section>
								<section class="4u 12u(mobile)">
									<div id="brasil"><a href="brasil.html"><span class="number">Brasil</span></a></div>
									<div id="mexico"><a href="mexico.html"><span class="number">Mexico</span></a></div>
								</section>
							</div>
						</div>

				</div> -->
				
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