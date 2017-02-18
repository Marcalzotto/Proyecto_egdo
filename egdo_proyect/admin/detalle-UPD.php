<!DOCTYPE HTML>
<!--
	Wide Angle by Pixelarity
	pixelarity.com @pixelarity
	License: pixelarity.com/license
-->
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>EGDO</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/mainAdmin.css" /> 
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<script type="text/javascript"  src="assets/js/jquery-1.12.3.js"></script>
		<script type="text/javascript"  src="assets/js/jquery-1.12.3.min.js"></script>
		
		<!-- Jquery Validate -->
		<script type="text/javascript" src="assets/js/jquery.js"></script>
		<script type="text/javascript" src="assets/js/jquery.validate.js"></script>
		<script type="text/javascript" src="assets/js/additional-methods.js"></script>
		<script type="text/javascript" src="assets/js/functionUPD.js"></script>
		
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
						<div id="intro" class="container">
							
							<div class="row">
								
									<section class="12u 12u(mobile)">
										<header>
											<h2>Control de Imagenes</h2>
										</header>
										<hr class="major"/>
											
											<a href="moderar-disenio.php" class="button button-big adds"><i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp;Imagenes</a>
										
										<hr class="major"/>
									
									</section>
									
									<section class="12u 12u(mobile)">
										<header>
											<h2>Datos de Imagen</h2>
										</header>
									</section>
									
									<?php
										
										include('config_bd.php');
										 
										$id_upd=base64_decode($_GET['upd']);
										if(filter_var($id_upd, FILTER_VALIDATE_INT) === false){  
											echo 'Valor incorrecto';  
										}else{  
											$conexion;
											
											//if($_GET['idempresa']>0){
											$consulta = 
											("SELECT upd.id_upd,upd.nombre_lugar,upd.calle,upd.altura,upd.telefono,
											upd.localidad,upd.partido,upd.provincia,upd.imagen1,upd.imagen2,
											upd.id_usuario_propuesta,u.nombre,u.apellido
											FROM upd INNER JOIN usuario AS u ON upd.id_usuario_propuesta = u.id_usuario
											WHERE id_upd='$id_upd");
											
											$result=mysqli_query($conexion,$consulta);
											if (!$result) {
											printf("Error: %s\n", mysqli_error($conexion));
											exit();
											}
											while ($row = mysqli_fetch_array($result)){
											//$result = $conexion ->query($consulta);
											//if ($result->num_rows >0) {
											//	while($row = $result->fetch_assoc()){
													
									?>
									
									<section class="6u 12u(mobile)"> <!-- section uss-->
										<header>
											<h3> <i class="fa fa-user" aria-hidden="true"></i> Datos de Usuario</h3>
										</header>
									    
										<div class="row uniform 25%">
											<!-- Break -->
											<div class="-3u 1u"><span>Nombre: </span></div>
												
											<div class="-1u 5u$">
												<span><?php echo $row['nombre']; ?></span>
											</div>
											
											<!-- Break -->
											<div class="-3u 1u">
												<span>Apellido: </span>
											</div>
											
											<div class="-1u 5u$">
												<span><?php echo $row['apellido']; ?></span>
											</div>
											
										</div>
									
									</section> <!-- /section uss-->
									
									<section class="6u 12u$(mobile)"> <!-- section uss-->
										<header>
											<h3> <i class="fa fa-picture-o" aria-hidden="true"></i> Datos de Lugar</h3>
										</header>
									    
										<div class="row uniform 25%">
											<!-- Break -->
											<div class="-2u 4u"><span>Nombre Lugar: </span></div>
												
											<div class="-1u 3u$">
												<span><?php echo $row['nombre_lugar']; ?></span>
											</div>
											
											<!-- Break -->
											<div class="-2u 4u">
												<span>Dirección: </span>
											</div>
											
											<div class="-1u 3u$">
												<span><?php echo $row['calle']; ?> <?php echo $row['altura']; ?></span>
											</div>
											
										</div>
									
									</section> <!-- /section uss-->
									
									<section class="12u 12u(mobile)">
										
										
									<header>	
										<h2>Moderar Imagen </h2>
									</header>	
										
									
									</section>
									
									
									<section class="6u 12u(mobile)"> <!-- section uss-->
									
											
										<div class="-2u 8u$">
										<img class="mod-img-det" src="data:image/jpeg;base64,<?php echo base64_encode($row['imagen1']); ?>" />
										</div>
										
										
									
									</section> <!-- /section uss-->
									
									<section class="6u 12u$(mobile)"> <!-- section image -->
										
										<header>	
											<h2>Seleccione Imagen </h2>
										</header>
										
										<header>
											<h3> <i class="fa fa-picture-o" aria-hidden="true"></i>Imagen 1</h3>
										</header>
										
										<!-- form start -->
										
										<form role="form" id="form-upd" autocomplete="off" method="post" enctype="multipart/form-data">
									
										<div class="row uniform 50%">	
										<!-- Break -->
										<input type='hidden' name='upd' value='<?php echo $id_protegido=base64_encode($row['id_upd']); ?>'/>
										
										<!-- Break -->
										<div class="-1u 2u"><span>Imagen</span></div>
										<div class="-1u 5u$"><input type="file" name='imagen' id='imagen' class="form-class"/></div>
										
										<!-- Break -->
										<div class="-2u 8u$">
											<button type="submit" class="button" name="btn-save" id="btn-save">
											<i class="fa fa-upload" aria-hidden="true"></i> Subir
											</button>
										</div>
								    
										<div id="error"> </div>
										
										</div>
									
										</form> <!-- form start -->
									
										
										
										
									</section> <!-- /section image -->
							
									<?php
										}
										}
										//}
										$conexion->close();	
											
									?>
							
							
							</div>
							
						</div>

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