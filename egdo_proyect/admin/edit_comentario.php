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
		<script type="text/javascript" src="assets/js/functionEditComment.js"></script>
	
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
										<h2>Editar Comentario Actividades</h2>
									</header>
									<hr class="major"/>
									
									<div class="row uniform">
										<div class="12u">
											<a href="moderar-comentario.php" class="button button-big ver"><i class="fa fa-eye fa-fw" aria-hidden="true"></i>&nbsp;Ver Comentarios Actividades</a>
											<hr class="major"/>
										</div>
										
										<div class="12u"> 
											<div id="error" class=""> </div>
										</div>
									
									</div>
									<?php
										
										require('config_bd.php');
										$id_comentario=base64_decode($_GET['comm']);
										if(filter_var($id_comentario, FILTER_VALIDATE_INT) === false){  
											echo 'Valor incorrecto';  
										}else{  
											
											//if($_GET['idempresa']>0){
											$consulta = ("SELECT id_comentario, comentario, fecha_hora ,
															u.id_usuario, nombre, apellido,
															a.id_actividad, nombre_actividad
															FROM comentario c JOIN usuario u ON c.id_usuario = u.id_usuario
															JOIN actividad a ON a.id_actividad = c.id_actividad WHERE id_comentario='$id_comentario'");
											$result = $conexion ->query($consulta);
											if ($result->num_rows >0) {
												while($row = $result->fetch_assoc()){
													
									?>
									<div class="12u 12u$(medium)"> <!-- Sec Datos Empresa -->
									<!-- form start -->
									<form role="form" id="edit-comment" autocomplete="off" method="post">
									<!--<div class="grid-demo">-->
									<div class="row uniform 50%">	
										<!-- Break -->
										<input type='hidden' name='comentario' value='<?php echo $id_protegido=base64_encode($row['id_comentario']); ?>'/>
										<!-- Break -->
										<div class="-1u 2u"><label class="edit-comment">Comentario</label></div>
										<div class="-1u 5u$"><span><?php echo $row['comentario']; ?></span>
										</div>
										<!-- Break -->
										<div class="-1u 2u"><label class="edit-comment">Fecha-Hora:</label></div>
										<div class="-1u 5u$"><span><?php echo $row['fecha_hora']; ?></span></div>
										<!-- Break -->
										<div class="-1u 2u"><label class="edit-comment">Id Usuario:</label></div>
										<div class="-1u 5u$"><span><?php echo $row['id_usuario']; ?></span></div>
										<!-- Break -->
										<div class="-1u 2u"><label class="edit-comment">Nombre Usuario:</label></div>
										<div class="-1u 5u$"><span><?php echo $row['nombre']; ?></span></div>
										<!-- Break -->
										<div class="-1u 2u"><label class="edit-comment">Apellido Usuario:</label></div>
										<div class="-1u 5u$"><span><?php echo $row['apellido']; ?></span></div>
										<!-- Break -->
										<div class="-1u 2u"><label class="edit-comment">Id Actividad:</label></div>
										<div class="-1u 5u$"><span><?php echo $row['id_actividad']; ?></span></div>
										<!-- Break -->
										<div class="-1u 2u"><label class="edit-comment">Actividad:</label></div>
										<div class="-1u 5u$"><span><?php echo $row['nombre_actividad']; ?></span></div>
										<!-- Break -->
										<div class="-1u 2u"><label class="edit-comment-fa"> <i class="fa fa-pencil" aria-hidden="true"></i> &nbsp; Editar Comentario </label></div>
										<div class="-1u 5u$">
											<div class="select-wrapper">
												<select class="select" name="comment" value=''>
												<option value="">seleccione</option>
												<option value="Eliminado.TituloFueraLugar.">Titulo fuera de lugar.</option>
												<option value="Eliminado.Acumulacion Denuncia.">Acumulacion Denuncia.</option>
												<option value="Eliminado.No Cumple Actividad.">No cumple actividad.</option>
												<option value="Eliminado.Link Prohibido.">Link prohibido.</option>
												<option value="Eliminado.Lenguaje Inapropiado.">Lenguaje inapropiado.</option>
												<option value="Eliminado.Violencia Verbal.">Violencia verbal.</option>
												<option value="Eliminado.Otro Motivo.">Otro motivo.</option>
												</select>
											</div>
										</div>
										<!-- Break -->
										<div class="-1u 2u"><label class="edit-comment-fa"> <i class="fa fa-check-square" aria-hidden="true"></i> &nbsp; Estado </label></div>
										<div class="-1u 5u$">
										<input type="checkbox" id="agree" name="agree">
										<label for="agree"> Moderado </label>
										<label for="agree" class="error block"></label>
										</div>
										<!--<input type="checkbox" id="agree" name="agree" title="Check es obligatorio" required>
										<label for="agree"> hello </label>
										<label for="agree" class="error block"></label> -->
										<!-- Break -->
										<div class="-2u 8u$">
											<button type="submit" class="button special icon fa fa-floppy-o" name="btn-save" id="btn-save">
											Guardar
											</button>
										</div>
								    <?php
										}
										}
										}
										//}
										$conexion->close();	
											
									?>
									</div>
									<!--</div> -->
									</form>
										
								</div> <!-- /Sec Datos Empresa -->
								
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