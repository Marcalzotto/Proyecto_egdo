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
			<link rel="stylesheet" href="../css/styleModal.css"> <!-- Gem style -->
			<link rel="stylesheet" href="../assets/css/viajes.css">
			<link rel="stylesheet" href="../assets/css/form-viaje.css">
			<link rel="stylesheet" href="../assets/css/form-upd-comentario.css">

			<link rel="stylesheet" href="../assets/css/viajes.css">

			 <link rel="stylesheet" type="text/css" href="../assets/css/estrellitasCalificacion.css" /> 

			<script src="../js/modernizr.js"></script> <!-- Modernizr -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
			<script src="../js/mainModal.js"></script> <!-- Gem jQuery -->
			<script>
$(function(){
						
$("#mandarimagenes").on("submit", function(evento){
	evento.preventDefault();
	var formData = new FormData(document.getElementById("mandarimagenes"));

	$.ajax({
		url: "upd-info.php",
		type: "POST",
		dataType: "HTML",
		data: formData,
		cache: false,
		contentType: false,
		processData: false
	}).done(function(echo){
		$("#men").html(echo);
	     });
     });

});
</script>
	
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
                         <form class='form-validation' enctype='multipart/form-data' method='post' id='enviarimagenes'>
														<div class='form-row form-input-name-row'>
														
																<input type='text' name='nombre' id='nombre' placeholder='nombre'>
														
														</div>
 														
 														<div class='form-row form-input-name-row'>

																<input type='text' name='descripcion' id='descripcion' placeholder='descripcion'>

														</div>

														 <div class='form-row'>

			                          				  <label>Subir foto
			   
			                           						<input type='file' class='file_input' name='upd_imagen' id='upd_imagen' />
			                           				 </label>
			                        				</div>
			                   						 
												
													<button type='submit'>Subir imagen</button>

											
															</form>

					<!-- Wide Content -->
						<div id="intro" class="container">
							<div class="row">
                               
							<div id="men"> </div>
							<?php
							$obtUsuario = $_SESSION['id_usuario'];
							$obt_curso = $_SESSION['curso'];
							$obt_nombre_usuario = $_SESSION['nombre'];

							$host_db = "localhost";
							$user_db = "root";
							$pass_db = "";
							$db_name = "egdo_db";
							

							$conexion = new mysqli($host_db, $user_db, $pass_db,$db_name);

							if ($conexion->connect_error) {
							die("La conexion falló: " . $conexion->connect_error);
							}
							
							
							
							$verificarUsu = "select * from usuario where id_usuario = '$obtUsuario' and curso = '$obt_curso'";
							$verificar = $conexion->query($verificarAdmin) or die($conexion->error);
							if($verificar){
				
								$con = "select upd.nombre, upd.direccion, upd.telefono, upd.facebook, upd.twitter, 
								upd.instagram, upd.pagina_web, upd.datelle_adicionales, upd.imagen1, upd.imagen2, 
								usuario.id_curso from upd inner join usuario on usuario.$obtUsuario = upd.id_usuario_propuesta";
								$resultado = $conexion->query($con);
								while ($datos = $resultado->fetch_assoc()) {
									
							?>
								
								<section class="4u 12u(mobile)">
         	             <p><b>Nombre:</b><br><?php echo $datos['nombre']; ?></p>
							<p><b>Direccion:</b><br><?php echo $datos['direccion']; ?></p>
							<p><b>Telefono:</b><br><?php echo $datos['telefono']; ?></p>
							<p><b>Facebook:</b><br><?php echo $datos['facebook']; ?></p>
							<p><b>Twitter:</b><br><?php echo $datos['twitter']; ?></p>
							<p><b>Instagram:</b><br><?php echo $datos['instagram']; ?></p>
							<p><b>Web:</b><br><?php echo $datos['pagina_web']; ?></p>
							<p><b>Detalles:</b><br><?php echo $datos['datelles_adicionales']; ?></p>
							<img class="number" src="data:image/jpeg;base64,<?php echo base64_encode($datos['fot1']); ?>"/> 
						</section>

							
							</div>
						</div>
					<form class="form-validation" enctype="multipart/form-data" method="post" action="#">

									<div class="form-title-row">
										<h1>Deja tu comentario</h1>
									</div>

									<div class="form-row form-input-name-row">
		
		                               <textarea name="Comentario" placeholder="Comentario"></textarea>

									</div>	

								</form>

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