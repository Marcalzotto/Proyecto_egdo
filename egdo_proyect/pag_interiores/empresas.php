<?php 
			include ("../bloqueSeguridad.php");
			include("conexion.php");
			include("funciones/calcular_calificacion_empresa.php");
			include("funciones/calcular_nuevo_ancho.php");
			include('funciones/generar_notificacion.php');
				generar_notificacion($conexion,$_SESSION["curso"]);
			include('funciones/cantidad_notificaciones.php');
?>

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
	
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<link rel="stylesheet" type="text/css" href="../css/common.css" />
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
			<script src="../js/tabs.js"></script>
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

					<!--

						The slider's images (as well as its behavior) can be configured
						at the top of "assets/js/main.js".

					-->
					
					<div id="empresas">
						<div class="lista_pasos">
							<ul class="pasos">
								<li><div>1</div><p>Dise&ntilde;a tu ropa</p></li>
								<li><div>2</div><p>Vota los dise&ntilde;os</p></li>
								<li><div>3</div><p>Arma tu pedido</p></li>
								<li><div class="active">4</div><p>Eleji tu empresa</p></li>
							</ul>
						</div>	
								<h2>Empresas</h2>	
								<div>

									<ul>
										<?php
										
										$buscarEmpresa = "select id_empresa, nombre_empresa from empresa;"; 
										$resultSet = $conexion->query($buscarEmpresa);
										if($resultSet){
											while($reg = $resultSet->fetch_array(MYSQLI_ASSOC)){
												$empresas[] = $reg;
											}
												foreach ($empresas as  $empresa) {
											
												$calificacion = calcular_calificacion($conexion,$empresa["id_empresa"]);
												$nuevo_ancho = calcular_ancho($calificacion);
												
													$item = "<li>";
													$item .= "<p>".strtoupper($empresa["nombre_empresa"])."</p>"; 
													$item .= "<a href=empresas_detalle.php?id=".base64_encode($empresa["id_empresa"])."><img width='70' height='70' src='../images/empresas_logos/logotipo.jpg' alt=''></a>";
													$item .= "<p>Calificacion:</p>";
													$item .= "<p class='puntaje'>".$calificacion."</p>";
													$item .= "<p class='estrellas'></p>";
													$item .= "<p class='estrellas-cambia' style='width:".$nuevo_ancho."px'></p>";
													$item .= "</li>";
											
												echo $item;
												}	
											}else{
											echo "<li>
															<p>Hubo un problemas con el servidor.</p>
														</li>";
											}
										?>	
									</ul>				
								</div>
								<?php
								$buscarPdf = "select pdf from curso_pdf where curso = '$_SESSION[curso]'";
								$result = $conexion->query($buscarPdf) or die("Error: ".$conexion->error);
								$resultConsult = $result->fetch_array(MYSQLI_ASSOC);
								$pdf = '../pdf/pdfGenerados/'.$resultConsult["pdf"];
								?>
								<div id="botonesMas">
									<a href='votacion.php'>Ir al paso anterior</a>
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
			<script src="../js/jquery.min.js"></script>
			<script src="../js/jquery.dropotron.min.js"></script>
			<script src="../js/skel.min.js"></script>
			<script src="../js/skel-viewport.min.js"></script>
			<script src="../js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../js/main.js"></script>
			
	</body>
</html>