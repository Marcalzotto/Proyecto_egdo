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
		
		<link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="../favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
		<link rel="manifest" href="../favicon/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">

		<!-- Jquery Validate -->
		<script type="text/javascript" src="assets/js/jquery.js"></script>
		<script type="text/javascript" src="assets/js/jquery.validate.js"></script>
		<script type="text/javascript" src="assets/js/additional-methods.js"></script>
		<script type="text/javascript" src="assets/js/functionReMsj.js"></script>
		
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
						<section id="content" class="container">
							
							<h3>Mensaje de Usuarios</h3>
							
							<hr class="major"/>
							
							<div class="row uniform"> <!-- sub cabecera -->
								
								<div class="12u">
									<a href="listarMsj.php" class="button button-big adds">
										<i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Ver Mensajes
									</a>
									<a href="crearMsj.php" class="button button-big adds">
										<i class="fa fa-pencil-square" aria-hidden="true"></i>&nbsp;Crear Mensajes
									</a>
								</div>	
								
							</div> <!-- /sub cabecera -->
							
							<hr class="major"/> <!-- /sub cabecera -->
								<?php
										
										require('config_bd.php');
										$id_mensaje=base64_decode($_GET['respMsj']);
										if(filter_var($id_mensaje, FILTER_VALIDATE_INT) === false){  
											echo 'Valor incorrecto';  
										}else{  
											
											//if($_GET['idempresa']>0){
											$consulta = ("SELECT mp.id_mensaje,mp.asunto,mp.mensaje,mp.fecha_hora,
											mp.id_emisor,mp.id_receptor,u.nombre,u.apellido
											FROM mensajes_privado AS mp INNER JOIN usuario AS u ON mp.id_emisor=u.id_usuario WHERE id_mensaje='$id_mensaje'");
											$result = $conexion ->query($consulta);
											if ($result->num_rows >0) {
												while($row = $result->fetch_assoc()){
													
								?>
	
					<div class="12u 12u$(medium)"> <!-- Sec Datos Empresa -->
						
						<div class="row uniform"> <!-- sub cabecera -->
								
								<div class="-3u 4u$">
									<h3><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;Mensaje de Usuarios</h3>
								</div>	
								
						</div> <!-- /sub cabecera -->
						
						
						<!-- form start -->
						<form role="form" id="re-mensaje" autocomplete="off" method="post" enctype="multipart/form-data">
									
							<div class="row uniform 50%">	
										
								<!-- Break -->
								<input type='hidden' name='lMsj' value='<?php echo $id_protegido=base64_encode($row['id_mensaje']); ?>'/>
								
								<input type='hidden' name='receptor' value='<?php echo $row['id_emisor']; ?>'/>
								<input type='hidden' name='emisor' value='<?php echo $row['id_receptor']; ?>'/>
										
								<!-- Break -->
								<div class="-3u 2u">
									<span><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Para</span>
								</div>
								<div class="-1u 5u$">
									<span><?php echo $row['nombre']; ?>&nbsp;<?php echo $row['apellido']; ?></span>
								</div>
										
								<!-- Break -->
								<div class="-3u 2u">
									
									<span><i class="fa fa-long-arrow-right" aria-hidden="true"></i>&nbsp;Asunto</span>
								</div>
								<div class="-1u 2u$">
									<span><input type='text' id="asunto" name='asunto' class="form-class" placeholder='Asunto' value='<?php echo $row['asunto']; ?>'/>
									</span>
								</div>
										
								<!-- Break -->
								<div class="-3u 2u$">
									<span><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Mensaje</span>
								</div>
								<div class="-3u 5u$">
									<textarea id="ccomment" name="ccomment" required></textarea>
									<label for="ccomment" class="error block"></label>
								</div>
										
								<!-- Break -->
								<div class="-6u 6u$">
									<button type="submit" class="button special icon" name="btn-save" id="btn-save">
										<i class="fa fa-reply" aria-hidden="true"></i>&nbsp;Responder
									</button>
								</div>
								
								<div class="-3u 5u$"> 
									
									<div id="error" class="">
									</div>
									
								</div>
								
								
								<?php
								}
								}
								}
								//}
								$conexion->close();	
								?>
							</div>
						</form>
										
					</div> <!-- /Sec Datos Empresa -->
							 
							 
					</section>

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