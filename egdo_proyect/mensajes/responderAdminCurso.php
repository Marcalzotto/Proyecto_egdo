<?php include ("../bloqueSeguridad.php");?>
<?php include('../pag_interiores/conexion.php');?>
<?php 
include('../pag_interiores/funciones/generar_notificacion.php');
generar_notificacion($conexion,$_SESSION["curso"]);
?>
<?php include('../pag_interiores/funciones/cantidad_notificaciones.php');?>
<?php include('../pag_interiores/funciones/cantidad_notificaciones_mensajes.php');?>
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
		
		<!-- mejora tooltips-->
		<link rel="stylesheet" href="../css/hint.css-2.4.1/hint.min.css" />

		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<link rel="stylesheet" type="text/css" href="../css/common.css" />
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
		<link rel="stylesheet" type="text/css" href="../css/style-assets.css" />		
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
			<script src="../js/modernizr.js"></script> <!-- Modernizr -->
			<script src="../js/jquery.min.js"></script>
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
			<script src="../js/mainModal.js"></script> <!-- Gem jQuery -->
			<script src="../js/tomarDatos.js"></script>
			
			<!-- estilos Mensajes-->	
			<link rel="stylesheet" href="../css/mensajes.css" />
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

					<!-- Wide Content -->
						<section id="content" class="container">
							
							<h3>Mensaje de Usuarios</h3>
							
							<hr class="major"/>
							
							<div class="row uniform"> <!-- sub cabecera -->
								
								<div class="12u">
									<a href="../mensajes/listarAdminCurso.php" class="button button-big adds">
										<i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Ver Mensajes
									</a>
									<a href="../mensajes/crearAdminCurso.php" class="button button-big adds">
										<i class="fa fa-pencil-square" aria-hidden="true"></i>&nbsp;Crear Mensajes
									</a>
								</div>	
								
							</div> <!-- /sub cabecera -->
							
							<hr class="major"/> <!-- /sub cabecera -->
								<?php 

								# Obtenemos el mensaje privado
								$id=base64_decode($_GET['respMsj']);
								//$sql = "SELECT * FROM mensajes_privado WHERE id_receptor='".$_SESSION['id_usuario']."' and id_mensaje='".$id."'";
								$sql = "SELECT A.nombre, A.apellido, T.* FROM usuario A INNER JOIN mensajes_privado T ON A.id_usuario=T.id_emisor WHERE T.id_receptor='".$_SESSION['id_usuario']."' and id_mensaje='".$id."'";

								$res = $conexion->query($sql) or die($conexion->error);
								$row = $res->fetch_array(MYSQLI_ASSOC);
								?>
	
					<div class="12u 12u$(medium)"> <!-- Sec Datos Empresa -->
						
						<div class="row uniform"> <!-- sub cabecera -->
								
								<div class="-3u 4u$">
									<h3><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;Mensaje de Usuarios</h3>
								</div>	
								
						</div> <!-- /sub cabecera -->
						
						
						<!-- form start -->
						<form role="form" id="re-mensaje" action="../mensajes/enviarAdminCurso.php" autocomplete="off" method="post" enctype="multipart/form-data">
									
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
									<textarea id="ccomment" name="mensaje" required></textarea>
									<label for="ccomment" class="error block"></label>
								</div>
								
									<?php echo '<input type="hidden" name="id_receptor" value="'.$row["id_emisor"].'">';?>
									<?php echo '<input type="hidden" name="asunto" value="'.$row["asunto"].'">';?>

										
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
								
							</div>
						</form>
										
					</div> <!-- /Sec Datos Empresa -->
							 
							 
					</section>

				</div>

				
				
				<?php
					include '../pag_interiores/menu/masterFooter.php';
				?>

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