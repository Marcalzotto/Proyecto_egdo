<?php require_once("../bloqueSeguridad.php");?>
<?php require_once("conexion.php");?>
<?php include('funciones/cantidad_notificaciones.php');?>
<?php 
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	$flag = 0;
	$curso = $_SESSION['curso'];
	$usuario = $_SESSION['id_usuario'];
	$queryVerFecha = "select * from actividad_disenio where curso_pertenece_votacion = '$curso'";

	$result = $conexion->query($queryVerFecha);
	if($result){
		
		if($result->num_rows > 0){
			
			$reg1 = $result->fetch_array(MYSQLI_ASSOC);
			$fecha_apertura = new DateTime($reg1['fecha_apertura']);
			//echo $fecha_apertura->format("Y-m-d")."</br>";
			$fechaHoy = new DateTime();
			$fechaHoy->format("Y-m-d");
			$interval = $fechaHoy->diff($fecha_apertura);
			$intervalInYear = $interval->y;
			$intervalInMonth = $interval->m;
			$intervalInDays = $interval->d;
			if($intervalInYear > 0){
				$flag = 1;
			}else if($intervalInMonth > 0){
				$flag = 1;
			}else if($intervalInDays >= 7){
				$flag = 1;
			}else{
				header('location:Tee-Designer-master/index.php');
			}
		}else{
			header('location:Tee-Designer-master/index.php');
		}

	}else{
		die("Lo sentimos hubo problemas con el servidor");
	}

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
		<link rel="stylesheet" href="../css/styleTabs.css"><!--Tabs Style -->
		<script type="text/javascript" src="../js/jquery_min.js"></script>
		<script type="text/javascript" src="../js/slimbox2.js"></script>
			
		<!--Librarys for lightBox -->
		<script src="../js/modernizr.js"></script> <!-- Modernizr -->
		<script src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/administrarVotacion.js"></script>
		<script type="text/javascript" src="../js/obtenerTallesAlumno.js"></script>
		<script type="text/javascript" src="../js/eliminarTallesUsuario.js"></script>
			
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		
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
											
				<?php 
				include("conexion.php");
    			$var = 0; 
    			//se usa para ver que todo funcione en forma correcta
    			//$fechaPrueba = new datetime("2016-07-19 20:00:00"); 
					//echo "fecha de Hoy".$fechaHoy->format("Y-m-d H:i:s")."</br>";
    			$fecha_apertura->add(new dateInterval('P7D'));
					
					//echo $fecha_apertura->format("Y-m-d")."</br>"; 
					
					$fecha_fin_primer_instancia = new DateTime($reg1['fecha_apertura']);
													
					//echo "Fecha fin primer instancia".$fecha_fin_primer_instancia->format("Y-m-d H:i:s")."</br>";
					
					$fecha_fin_primer_instancia->add(new dateInterval('P9D'));
					
					//echo $fecha_fin_primer_instancia->format("Y-m-d")."</br>"; 
					
					//prueba periodo de 2 dias(P2D) real a periodo de 2 minutos y 4 minutos para las fechas
													
					//echo "Fecha fin primer instancia + 2 dias".$fecha_fin_primer_instancia->format("Y-m-d H:i:s")."</br>";
					$fecha_fin_segunda_instancia = new DateTime($reg1['fecha_apertura']);

					//echo "Fecha fin segunda instancia".$fecha_fin_segunda_instancia->format("Y-m-d H:i:s")."</br>";
					$fecha_fin_segunda_instancia->add(new dateInterval('P12D'));
					
					//echo $fecha_fin_segunda_instancia->format("Y-m-d")."</br>";
					//echo "Fecha fin segunda instancia + 4 dias".$fecha_fin_segunda_instancia->format("Y-m-d H:i:s")."</br>";
				
						include('funciones/obtenerMaximoDisenio.php');
						include("funciones/funcion_imprimir_disenios.php");
						include('funciones/funcion_imprimir_formularios_talles.php');

						$maxBuzo = obtener_cantidad_ganadores($conexion, 1, $curso);
						$maxRemera = obtener_cantidad_ganadores($conexion, 2, $curso);
						$maxBandera = obtener_cantidad_ganadores($conexion, 3, $curso);

						if($fechaHoy <= $fecha_fin_segunda_instancia){
							
							echo "<div class='lista_pasos'>
											<ul class='pasos'>
												<li><div>1</div><p>Dise&ntilde;a tu ropa</p></li>
												<li><div class='active'>2</div><p>Vota los dise&ntilde;os</p></li>
												<li><div>3</div><p>Arma tu pedido</p></li>
												<li><div>4</div><p>Eleji tu empresa</p></li>
											</ul>
										</div>";
						}else if($maxBuzo == 1 && $maxRemera == 1 && $maxBandera == 1){
							
							echo "<div class='lista_pasos'>
											<ul class='pasos'>
												<li><div>1</div><p>Dise&ntilde;a tu ropa</p></li>
												<li><div>2</div><p>Vota los dise&ntilde;os</p></li>
												<li><div class='active'>3</div><p>Arma tu pedido</p></li>
												<li><div>4</div><p>Eleji tu empresa</p></li>
											</ul>
										</div>";
						}else{
							echo "<div class='lista_pasos'>
											<ul class='pasos'>
												<li><div>1</div><p>Dise&ntilde;a tu ropa</p></li>
												<li><div class='active'>2</div><p>Vota los dise&ntilde;os</p></li>
												<li><div>3</div><p>Arma tu pedido</p></li>
												<li><div>4</div><p>Eleji tu empresa</p></li>
											</ul>
										</div>";
						}
						
				?>
		<div id="votacion">
			<div id="alert">
				<span>No puedes votar dos veces este disenio</span>
			</div>
			<?php
					if($fechaHoy >= $fecha_apertura && $fechaHoy <= $fecha_fin_primer_instancia){
							print "<h2>Vota hasta 5 dise&ntilde;os distintos de cada Item</h2>";
					}else if($fechaHoy > $fecha_fin_primer_instancia && $fechaHoy <= $fecha_fin_segunda_instancia){
							print "<h2>Vota el mejor dise&ntilde;o, solo puedes votar 1.</h2>";
					}else if($fechaHoy > $fecha_fin_segunda_instancia){
							if($maxBuzo == 1 && $maxRemera == 1 && $maxBandera == 1){
							print "<h2>Votacion finalizada</h2>";
							}else{
							print "<h2>Votacion empatada, esperando desempate.</h2>";		
							}
					}
			?>
								
				<div id="main">
  
  				<input id="tab1" type="radio" name="tabs" checked>
  				<label for="tab1"><img src="../images/tab_icons/sweatshirt.png" alt=""> Buzo/Campera</label>
    						
  				<input id="tab2" type="radio" name="tabs">
  				<label for="tab2"><img src="../images/tab_icons/shirt.png" alt="">Remera</label>
    
  				<input id="tab3" type="radio" name="tabs">
  				<label for="tab3"><img src="../images/tab_icons/flag.png" alt="">Bandera</label>
    			
    				<section id="content1">

						<?php
						
		imprimir_disenios($conexion,$fecha_apertura,$fecha_fin_primer_instancia,$fecha_fin_segunda_instancia,$curso,1);
								
						?>
  					</section>
    				<section id="content2">
    				<?php

   imprimir_disenios($conexion, $fecha_apertura,$fecha_fin_primer_instancia,$fecha_fin_segunda_instancia,$curso,2);
    				?>
  					</section>
    				<section id="content3">
    				<?php

   imprimir_disenios($conexion, $fecha_apertura,$fecha_fin_primer_instancia,$fecha_fin_segunda_instancia,$curso,3);
    									
    				?>
  					</section>
    		</div>
										
						<?php
							imprimir_forms_talles($conexion,$maxBuzo, $maxRemera, $maxBandera, $usuario, $curso, $fechaHoy, $fecha_fin_segunda_instancia);
							$conexion->close();
						?>
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
								<li><a href="no-sidebar.html" class="icon fa-facebook"><span>Facebook</span></a></li>
								<li><a href="no-sidebar.html" class="icon fa-twitter"><span>Twitter</span></a></li>
								<li><a href="no-sidebar.html" class="icon fa-instagram"><span>Instagram</span></a></li>
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