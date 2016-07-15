<?php include ("../bloqueSeguridad.php");?>
<!DOCTYPE HTML>
<!--
	Wide Angle by Pixelarity
	pixelarity.com @pixelarity
	License: pixelarity.com/license
-->
<html>
	<head>
		<title>EGDO::Admin::Msj</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	
	<link rel="stylesheet" href="../assets/css/admin-demo.css">
	<link rel="stylesheet" href="../assets/css/admin-form-basic.css">
	
	<script type="text/javascript" src="js.js"> <!-- Bandeja de entrada-->
	
	</head>
	<body class="no-sidebar">
				
			<div id="page-wrapper">

			<!-- Header Wrapper -->
				<div id="header-wrapper">

					<!-- Header -->
						<div id="header" class="container">

							<!-- Logo -->
								<h1 id="logo"><img class="egdo-logo" src="../assets/images/EGDO.png" alt=""></h1>

							<!-- Nav -->
								<nav id="nav">
									<ul>
										<li class="circle"><a href="#"><i class="fa fa-home fa-2x" aria-hidden="true"></i>
										</a>
											<ul>
												<li><a class="list-group-item" href="panel-index.php"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp; Perfil</a></li>
												<li><a class="list-group-item" href="panel-mensaje.php"><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp; Mensaje</a></li>
											</ul>
										</li>
										<li class="circle">
											<a href="#"><i class="fa fa-search fa-2x" aria-hidden="true"></i></a>
											<ul>
												<li><a class="list-group-item" href="../grid/panel-empresas.php"><i class="fa fa-building-o" aria-hidden="true"></i>&nbsp; Empresa</a></li>
												<li><a class="list-group-item" href="../grid/panel-curso.php"><i class="fa fa-university" aria-hidden="true"></i>&nbsp; Curso</a></li>
												<li><a class="list-group-item" href="../grid/panel-alumno.php"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Alumno</a></li>
												<li><a class="list-group-item" href="panel-info.php"><i class="fa fa-map-signs" aria-hidden="true"></i>&nbsp; Info Viaje</a></li>
											</ul>
										</li>
										<li class="break">
											<a href="#"><i class="fa fa-eye fa-2x" aria-hidden="true"></i></a>
											<ul>
											<li><a class="list-group-item" href="../grid/panel-moderar.php"><i class="fa fa-comments" aria-hidden="true"></i>&nbsp; Comentarios</a></li>
											<li><a class="list-group-item" href="panel-image.php"><i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp; Imagenes</a></li>
											</ul>
										</li>
										<li class="circle"><a href="#">
										<a href="../login/logout.php"><i class="fa fa-sign-out fa-2x" aria-hidden="true"></i></a>
										</li>
									</ul>
								</nav>

						</div>

				</div>

			<!-- Main Wrapper  -->
				<div id="main-wrapper-ad">
					
					<div ALIGN="left" style="font-size:130%"><a href="admin-msj-listar.php">Ver mensajes</a> | <a href="panel-mensaje.php">Crear 	mensajes</a> | <a href="../panel-index.php">Ir a inicio</a></div><br /><br />
					
					<!-- Wide Content -->
						<section id="content" class="container">
							
							<div class="main-content"> <!-- main content -->

								<!-- You only need this form and the form-basic.css -->

							<?php

$conexion = mysql_connect("localhost", "root", "")
      or die("Problemas en la conexion");
    
    mysql_select_db("egdo_db", $conexion)
      or die("Problemas en la seleccion de la base de datos");
  
	
	echo '<h3 ALIGN="left"> Bienvenido usuario: &nbsp;&nbsp;&nbsp;'.$_SESSION['nombre'].' </h3>
	<div ALIGN="left" style="font-size:130%"><a href="admin-ms-listar.php">Ver mensajes</a> | <a href="panel-mensaje.php">Crear mensajes</a> | <a href="../panel-index.php">Ir a inicio</a></div><br /><br />';

		
		@$id_receptor = $_POST['id_receptor'];
		@$asunto = $_POST['asunto'];
		@$mensaje = $_POST['mensaje'];
		
			//Establecemos zona horaria para obtener fecha
			date_default_timezone_set('America/Argentina/Buenos_Aires');
			$fecha_hora = date("Y-n-d-H-i-s");
			
			$sql = "INSERT INTO mensajes_privado (id_receptor,id_emisor,fecha_hora,asunto,mensaje) VALUES ('".$id_receptor."','".$_SESSION['id_usuario']."','".$fecha_hora."','".$asunto."','".$mensaje."')";
			mysql_query($sql,$conexion);
			echo "<h1 ALIGN='center'>Mensaje enviado correctamente</h1>";
	

?>	
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
