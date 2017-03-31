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
		<!-- mejora tooltips-->
		<link rel="stylesheet" href="../css/hint.css-2.4.1/hint.min.css" />

		
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		
		<link rel="stylesheet" href="../css/tmm_form_wizard_style_demo.css" />
		<link rel="stylesheet" href="../css/grid.css" />
		<link rel="stylesheet" href="../css/tmm_form_wizard_layout.css" />
		<link rel="stylesheet" href="../css/fontello.css" />
		<link rel="stylesheet" href="../css/form-elements.css" />
		
		<link rel="stylesheet" href="../css/index_gral.css" />
		<link rel="stylesheet" href="../css/slimbox2.css" type="text/css" media="screen">
		
        <link rel="stylesheet" type="text/css" href="../css/style-assets.css" />
		
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--<link rel="stylesheet" type="text/css" href="../assets/css/common.css" />-->
    <!--<link rel="stylesheet" type="text/css" href="../assets/css/style.css" /> -->
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
			<script type="text/javascript" src="../js/jquery_min.js"></script>
			<script type="text/javascript" src="../js/slimbox2.js"></script>
			<!--Librarys for lightBox -->
			<script src="../js/modernizr.js"></script> <!-- Modernizr -->
			<script src="../js/jquery.min.js"></script>
			<script type="text/javascript" src="../js/administrarVotacionAdminCurso.js"></script>
			
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
			<script src="../js/tomarDatos.js"></script>
	
			<!--<script src="../js/mainModal.js"></script>-->  <!--Gem jQuery -->
	
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

						<!-- Main -->
						<div id="intro" class="container">
						
							<div class="row"> <!-- Row Principal -->	
							
								<section class="12u 12u(mobile)"> <!-- Pasos -->
									<header>
										<h2>ENVIA INVITACIONES</h2>
									</header>
									
									<hr class="major"/>
									</br>									
										<h6>Ingresa los emails de cada invitado</h6>
									</br>
									<hr class="major"/>
									</br>
								
								</section> <!-- Pasos -->
							
							</div> <!-- Row Principal -->
						</div>
						
						<!-- Wide Content -->
						<section id="content" class="container">
							
						<div class="row"> <!-- Row Principal -->
				
						<section class="12u 12u">
							
							<div class="12u 12u$(medium)"> <!-- Sec Datos Empresa -->
							
							
							<!-- Contact Form -->
							<form action="../invitaciones/invitacionesConfirma.php" method="post" id="acceso" role="form">
								
								<div class="row 50%">
									
										<?php
										
										// Arrays para guardar errores:
										$aErrores = array();
										// Patrón para usar en expresiones regulares (admite solo numeros):
										$patron_num = "/^[[0-9\s]+$/";
										
										//Cantidad de alumnos
										$cant_alumnos = trim(htmlentities($conexion->real_escape_string($_POST["cant_alumnos"])));
										
										if( empty($cant_alumnos) )
											$aErrores[] = "- Debe completar el campo Cantidad de alumnos";
										else
										{
											// Comprobar mediante una expresión regular, que sólo contiene numeros:
											if( !preg_match($patron_num, $cant_alumnos) )
												$aErrores[] = "- El campo Cantidad de alumnos solo puede contener numeros";
											else 
											{
												// Comprobar que no supere cantidad maxima:
												if(($cant_alumnos < 0) || ($cant_alumnos > 70))
													$aErrores[] = "- El campo cantidad de alumnos debe ser mayor a 0 y menor a 70";
											}
										}
										
										
										if( count($aErrores) > 0 )
										{
											echo "<p>ERRORES ENCONTRADOS:</p>";

											// Mostrar los errores:
											for( $contador=0; $contador < count($aErrores); $contador++ )
												echo '<div class="12u 12u"><span>'. $aErrores[$contador]."<br/>";
												echo '</span></div>';
												echo '<div class="12u 12u"><span>';
												echo "<p><a href='../invitaciones/invitaciones.php'>Volver y completar nuevamente</a></p>";
												echo '</span></div>';
										}
										else
										{	
										
										$cant_alumnos=$_POST["cant_alumnos"];
										
										for ($inputEmail = 0; $inputEmail < $cant_alumnos; $inputEmail++){

											echo '								
											
											<div class="5u 5u$">
											<input id="name" class="text" type="text" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" class="text" name="email[]" placeholder="Email" required />
											</div>';
											
										}

										echo '<input type="hidden" name="id_curso" value="45">';
										
										echo '<div class="-5u 12u$">
										<input type="submit" class="button special fit small" name="acceso"  value="Paso siguiente">
										</div>';
										}
										?>
									
									
									
								
								</div>
								
							</form>
							
							</div> <!-- /Sec Datos Empresa -->
							
						</section>
							
						</div> <!-- /Row Principal -->	


					
						</section>

				</div>	
					
					
				<?php
					include '../pag_interiores/menu/masterFooter.php';
				?>

		

		
		
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