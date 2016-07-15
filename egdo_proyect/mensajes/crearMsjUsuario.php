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
			<link rel="stylesheet" href="../css/estiloBandeja.css"> <!-- CSS reset -->
			<link rel="stylesheet" href="../css/styleModal.css"> <!-- Gem style -->
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
							
							<h1 class="logo">
									<a href="../index.html"><img src="../favicon/favicon-96x96.png" alt=""></a>
							</h1>
							
							
							
							<!-- Nav -->
								<nav id="nav">
									
									<ul class="myfont">
								
									<li class="circle"><a href="left-sidebar.html"><img src="../images/upd.png" alt="UPD"></a></li>
										
										<li class="circle">
											<a href="no-sidebar.html">
												<img src="../images/shirt.png" alt="Dise&ntilde;ar">
											</a>
												<ul>
													<li><a href="Tee-Designer-Master/index_adminCurso_tee.php">Dise&ntilde;a tu ropa <img src="../images/dropotron_icons/disenio_ropa.png" alt="" style="float:right"></a></li>
													<li><a href="votacionAdminCurso.php">Votaci&oacute;n<img src="../images/dropotron_icons/votacion.png" alt="" style="float:right"></a></li>
													<li><a href="#">Empresas<img src="../images/dropotron_icons/empresas.png" alt="" style="float:right"></a></li>
													<li><a href="subir_arch_adminCurso.php">Subi tus dise&ntilde;os <img src="../images/dropotron_icons/upload.png" alt="subir archivos" style="float:right"></a></li>
												</ul>
											</li>
										<li class="circle"><a href="no-sidebar.html"><img src="../images/party.png" alt="Dise&ntilde;ar"></a></li>
										<li class="circle"><a href="no-sidebar.html"><img src="../images/foto-evento.png" alt="foto-evento"></a></li>
										<li class="circle"><a href="no-sidebar.html"><img src="../images/bus.png" alt="info-viajes"></a></li>
										<li class="circle"><a href="no-sidebar.html">
																				<img src="../images/settings.png" alt="configuracion">
																			</a>
																			<ul>
																				<li><a href="../mensajes/listarMsjUsuario.php">Bandeja de entrada<img src="../images/dropotron_icons/mail_box.png" alt="agenda" style="float:right"></a></li>
																				<li><a href="#">Notificaciones<img src="../images/dropotron_icons/alarm.png" alt="agenda" style="float:right"></a></li>
																				<li><a href="#">Agenda<img src="../images/dropotron_icons/calendar.png" alt="agenda" style="float:right"></a></li>
																				<li><a href="#">Perfil <img src="../images/dropotron_icons/avatar.png" alt="perfil" style="float:right"></a></li>
																				<li><a href="../login/logout.php">Logout <img src="../images/dropotron_icons/logout.png" alt="perfil" style="float:right"></a></li>
																			</ul>


										</li>
																

										
									</ul>
								</nav>
								
		

						</div>
				
				</div>
</header>
			<!-- Banner Wrapper -->
<div id="banner-wrapper">

	
	<div id="bandejaEntrada">

 <?php
    

    $conexion = mysql_connect("localhost", "root", "")
      or die("Problemas en la conexion");
    
    mysql_select_db("egdo_db", $conexion) 
      or die("Problemas en la seleccion de la base de datos");
    ?>


<div id="menu"><a class="links" href="../mensajes/listarMsjUsuario.php">Ver mensajes</a> | <a class="links" href="../mensajes/crearMsjUsuario.php">Crear mensajes</a></div><br /><br />

<form method="post" action="../mensajes/enviarMsjUsuario.php" >

<div class="descripcion">Para
<?php
$consulta=mysql_query("SELECT A.descripcion_rol, T.* 
FROM rol A INNER JOIN 
usuario T ON A.id_rol=T.id_rol 
WHERE T.id_rol=2
", $conexion)
					or die("Problemas en el select:".mysql_error());
			echo '<div class="form-group">';

echo '<select class="campoCrear" class="form-control" id="sel1" name="usuario_destino">';						
						echo '<option value=""></option>';
						while($fila = mysql_fetch_array($consulta)) {
							echo"<option value='".$fila['id_usuario']."'>".$fila['nombre']." ".$fila['apellido']." (".$fila['descripcion_rol'].")</option>";
						}					
						echo '</select></div>';
?>
</div>
<div class="descripcion">Asunto</div>
<input class="campoCrear" type="text" name="asunto" />
<div class="descripcion">Mensaje</div>
<textarea class="campoMensaje" name="mensaje"></textarea></br>
<input class="enviar" type="submit" name="enviar" value="Enviar" />
</form>

	
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