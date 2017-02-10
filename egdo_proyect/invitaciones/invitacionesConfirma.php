<?php include ("../bloqueSeguridad.php");?>
<?php include('../pag_interiores/conexion.php');?>
<?php 
	include('../pag_interiores/funciones/generar_notificacion.php');
	generar_notificacion($conexion,$_SESSION["curso"]);
?>
<?php include('../pag_interiores/funciones/cantidad_notificaciones.php');?>
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
			<!-- Banner Wrapper -->
				<div id="banner-wrapper">

					
					<div id="votacion">
						<div id="alert">
							
						</div>
							<h2>Envia invitaciones</h2>
							
							<div id="contents">

			<div class="form-container">

				<div id="tmm-form-wizard" class="containers substrate">
								
							
				<form action="../invitaciones/invitacionesEnvio.php" method="post" role="form">

						<div class="form-wizard">
							
							<div class="rows">

								<div class="col-md-8 col-sm-7">
								
										<?php
											
												//email
											$bandera=0;
											if( empty($_POST['email']) ){
												
												$bandera=1;
												echo "Debe completar el campo email.";
												
											}
											else
											{	
													
													foreach($_POST['email'] as $invitacion)
													{
																						
														// Comprobar mediante  filter_var si es valido el email:
														if(!filter_var($invitacion,FILTER_VALIDATE_EMAIL )){
															
															$bandera=1;
															echo "- El email '".$invitacion."' no es valido.</br>";
															
															}
														else 
														{												
															// Comprobar que no supere cantidad maximo de caracteres:
															if(strlen($invitacion) > 45){
															
																echo "- El email ". $invitacion ." no puede contener mas de 45 caracteres.</br>";
																$bandera=1;
															}
															else{
															
																$emailsOk[]=$invitacion;
																
															}
														}
												
													}	
												
											}
											
											if($bandera==0){
											
												echo 'Se enviaran invitaciones a los siguientes emails:</br>';
												foreach($emailsOk as $invitacion){
												
													echo '- '.$invitacion.'</br>';
												
												}
												
												//manera de mandar array por POST o GET
												$emailsOk = serialize($emailsOk);
												$emailsOk = urlencode($emailsOk);	
												
												
												echo '<input type="hidden" name="emailsOk" value="'.$emailsOk.'">';
												echo '<input type="hidden" name="id_curso" value="'.$_POST["id_curso"].'">';
											}
											else{
											
												echo "<p><a href='registroPaso3.php'>Volver y corregir emails</a></p>";
											
											}
											
											?>
											
											
									

								</div>

							</div><!--/ .row-->
							
						</div><!--/ .form-wizard-->

						<div class="prev">
							<!--/<button class="button button-control" type="button" onclick="window.location.href='registroPaso2.php'"><span>Paso Anterior <b>Datos curso</b></span></button>
							<div class="button-divider"></div>-->
						</div>
						
						<div class="next">
							<button class="button button-control" type="submit"><span>Paso Siguiente <b>Confirmar Invitacion</b></span></button>
							<div class="button-divider"></div>
						</div>

					</form><!--/ .form-wizard-->
					
					</div><!--/ .container-->
				
					</div><!--/ .form-container-->

					</div><!--/ #content-->
							
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