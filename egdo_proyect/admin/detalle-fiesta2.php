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
		<script type="text/javascript" src="assets/js/functionFiesta1.js"></script>
		
		
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
								<h1 id="logo"><a href="admin-index.php"><img class="logo-img" src="../assets/images/EGDO.png" alt=""/></a></h1>

							<!-- Nav -->
								<nav id="nav">
									<ul>
										<!-- Item home -->
										<li> 
											<a href="admin-index.php" title="Home">
												<span class="fa-stack fa-3x">
												<i class="fa fa-circle fa-stack-2x"></i>
												<i class="fa fa-home fa-stack-1x fa-inverse"></i>
												</span> 
											</a>
										</li>
										<!-- Item search -->
										<li>
											<a href="#" title="Buscar">
												<span class="fa-stack fa-3x">
												<i class="fa fa-circle fa-stack-2x"></i>
												<i class="fa fa-search fa-stack-1x fa-inverse"></i>
												</span>
											</a>
											<ul>
												<li><a class="list-group-item" href="empresa.php"><i class="fa fa-building-o" aria-hidden="true"></i>&nbsp; Empresas</a></li>
												<li><a class="list-group-item" href="curso.php"><i class="fa fa-university" aria-hidden="true"></i>&nbsp; Cursos</a></li>
												<li><a class="list-group-item" href="alumno.php"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Usuarios</a></li>
												<li><a class="list-group-item" href="panel-info.php"><i class="fa fa-map-signs" aria-hidden="true"></i>&nbsp; Info Viaje</a></li>
											</ul>
										</li>
										<!-- Item filter -->
										<li class="break" >
											<a href="#" title="Filtrar">
												<span class="fa-stack fa-3x">
												<i class="fa fa-circle fa-stack-2x"></i>
												<i class="fa fa-filter fa-stack-1x fa-inverse"></i>
												</span>
											</a>
											<ul>
												<li><a class="list-group-item" href="moderar-comentario.php"><i class="fa fa-comments" aria-hidden="true"></i>&nbsp; Comentarios Actividades</a></li>
												<li><a class="list-group-item" href="moderar-comentarioEmpresas.php"><i class="fa fa-comments-o" aria-hidden="true"></i></i>&nbsp; Comentarios Empresas</a></li>
												<li>
													<span><i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp; Imagenes</a></span>
													<ul> <!-- Sub items -->
														<li>
															<a class="list-group-item" href="moderar-disenio.php">
																<i class="fa fa-pencil" aria-hidden="true"></i>&nbsp; Diseño
															</a>
														</li>
														<li>
															<a class="list-group-item" href="moderar-fiesta.php">
																<i class="fa fa-music" aria-hidden="true"></i>&nbsp; Fiesta
															</a>
														</li>
														<li>
															<a class="list-group-item" href="moderar-UPD.php">
															<i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;UPD
															</a>
														</li>
													</ul> <!-- /Sub Items  -->
												</li>
											</ul>
										</li>
										<!-- Item setting -->
										<li>
											<a href="" title="Herramientas">
												<span class="fa-stack fa-3x">
												<i class="fa fa-circle fa-stack-2x"></i>
												<i class="fa fa-cogs fa-stack-1x fa-inverse"></i>
												</span>
											</a>
											<ul>
												<li><a class="list-group-item" href="edit-perfil.php"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Editar Perfil</a></li>
												<li><a class="list-group-item" href="bandeja.php"><i class="fa fa-inbox" aria-hidden="true"></i>&nbsp; Mensaje</a></li>
												<li><a class="list-group-item" href="../login/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; Cerrar Sesion</a></li>
											</ul>
										</li>
									</ul>
								</nav> <!-- /Nav -->

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
											
											<a href="moderar-fiesta.php" class="button button-big adds"><i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp;Imagenes</a>
										
										<hr class="major"/>
									
									</section>
									
									<section class="12u 12u(mobile)">
										<header>
											<h2>Datos de Lugar</h2>
										</header>
									</section>
									
									<?php
										
										include('config_bd.php');
										 
										$id_fiesta=base64_decode($_GET['mod']);
										if(filter_var($id_fiesta, FILTER_VALIDATE_INT) === false){  
											echo 'Valor incorrecto';  
										}else{  
											$conexion;
											
											//if($_GET['idempresa']>0){
											$consulta = 
											("SELECT f.id_fiesta,f.nombre AS lugar,f.calle,f.altura,f.telefono,
											f.imagen1,f.imagen2,f.id_usuario_propuesta,u.nombre,u.apellido
											FROM fiesta AS f INNER JOIN usuario AS u ON f.id_usuario_propuesta = u.id_usuario
											WHERE id_fiesta='$id_fiesta'");
											
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
											<div class="-2u 4u"><span>Lugar Fiesta: </span></div>
												
											<div class="-1u 3u$">
												<span><?php echo $row['lugar']; ?></span>
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
										<h2>Seleccionar Imagen </h2>
									</header>	
										
									
									</section>
									
									
									<section class="6u 12u(mobile)"> <!-- section uss-->
										
									
										<div class="-2u 8u$">
										<img class="mod-img-fiesta" src="data:image/jpeg;base64,<?php echo base64_encode($row['imagen2']); ?>" />
										</div>
										
									</section> <!-- /section uss-->
									
									<section class="6u 12u$(mobile)"> <!-- section image -->
										
										<header>	
											<h2>Seleccione Imagen </h2>
										</header>
										
										<header>
											<h3> <i class="fa fa-picture-o" aria-hidden="true"></i> Imagen 1</h3>
										</header>
									
										<!-- form start -->
										
										<form role="form" id="form-fiesta" autocomplete="off" method="post" enctype="multipart/form-data">
									
										<div class="row uniform 50%">	
										<!-- Break -->
										<input type='hidden' name='form-fiesta' value='<?php echo $id_protegido=base64_encode($row['id_fiesta']); ?>'/>
										
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