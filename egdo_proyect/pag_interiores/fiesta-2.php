<?php include ("../bloqueSeguridad.php");?>
<?php include("conexion.php");?>
<?php 
	include("funciones/generar_notificacion.php");
	generar_notificacion($conexion,$_SESSION["curso"]);
?>
<?php include("funciones/cantidad_notificaciones.php");?>
<?php include('funciones/cantidad_notificaciones_mensajes.php');?>
<?php include('funciones/calcular_calificacion_upd_fiesta.php');?>
<?php include('funciones/calcular_nuevo_ancho.php');?>
<?php include('funciones/maximos_desempate_fiesta.php');?>
<?php
$verificarFecha = "select fecha_hora from evento where id_actividad = 3 and id_curso = $_SESSION[curso]"; 
if($result = $conexion->query($verificarFecha)){
	if($result->num_rows > 0){
		$reg = $result->fetch_array(MYSQLI_ASSOC);
		$fecha = $reg["fecha_hora"];
		$fechahoy = new DateTime();
		$fechaEvento = new DateTime($fecha);

		$intervalo = $fechahoy->diff($fechaEvento);
		$intervalA = $intervalo->y;
		$intervalM = $intervalo->m;
		$intervalD = $intervalo->d;
		//echo $intervalD;
		//cuando descomente esta linea se producira un error con la libreria skel
		$vota = 0;
		if($intervalA > 0){
			$buscar_maximos = "select * from fiesta where id_curso = '$_SESSION[curso]' and calificacion = (
												 select max(calificacion) from fiesta)";
			if($result = $conexion->query($buscar_maximos)){
				//$reg = $result->fetch_array(MYSQLI_ASSOC);
				$maximos = $result->num_rows;
				if($maximos > 1){
					while($reg = $result->fetch_array(MYSQLI_ASSOC)){
						$vecMax[] = $reg;
					}
				}else{
					$reg = $result->fetch_array(MYSQLI_ASSOC);
					$vecMax[] = $reg;
				}
	
			}else{
				die("Hubo un error al buscar los maximos");
			}
		}else if($intervalM > 0){
				$buscar_maximos = "select * from fiesta where id_curso = '$_SESSION[curso]' and calificacion = (
												 select max(calificacion) from fiesta)";
			if($result = $conexion->query($buscar_maximos)){
				//$reg = $result->fetch_array(MYSQLI_ASSOC);
				$maximos = $result->num_rows;
				if($maximos > 1){
					while($reg = $result->fetch_array(MYSQLI_ASSOC)){
						$vecMax[] = $reg;
					}
				}else{
					$reg = $result->fetch_array(MYSQLI_ASSOC);
					$vecMax[] = $reg;
				}
	
			}else{
				die("Hubo un error al buscar los maximos");
			}
		}else if($intervalD >= 23){
				$buscar_maximos = "select * from fiesta where id_curso = '$_SESSION[curso]' and calificacion = (
												 select max(calificacion) from fiesta)";
			if($result = $conexion->query($buscar_maximos)){
				//$reg = $result->fetch_array(MYSQLI_ASSOC);
				$maximos = $result->num_rows;
				if($maximos > 1){
					while($reg = $result->fetch_array(MYSQLI_ASSOC)){
						$vecMax[] = $reg;
					}
				}else{
					$reg = $result->fetch_array(MYSQLI_ASSOC);
					$vecMax[] = $reg;
				}
	
			}else{
				die("Hubo un error al buscar los maximos");
			}
			
		}else if($intervalD >= 16 && $intervalD <= 22){
			//es hora de votar por los lugares propuestos
			$vota = 1; 
		}else if($intervalD <= 15){
			$vota = 0;
			//solo se ven los lugares propuestos
		}
		
	}
}else{
	die("Error al buscar la fecha");
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
		
		<!-- mejora tooltips-->
		<link rel="stylesheet" href="../css/hint.css-2.4.1/hint.min.css" />

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
			<link rel="stylesheet" href="../css/form-viaje.css">
			<link rel="stylesheet" href="../css/form-upd-comentario.css">
			<link rel="stylesheet" href="../css/viajes.css">
			 <link rel="stylesheet" type="text/css" href="../css/estrellitasCalificacion.css" /> 
			<script src="../js/modernizr.js"></script> <!-- Modernizr -->
			<script src="../js/jquery.min.js"></script>
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
			<script src="../js/mainModal.js"></script> <!-- Gem jQuery -->
			<script src="../js/tomarDatos.js"></script>
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
						<div id="intro" class="container">
									
								<h2>Lugares propuestos para la fiesta de egresados: <?php echo $intervalD; ?></h2>
				
							<?php
							if($intervalA > 0){
								maximos_desempate_fiesta($maximos, $vecMax, $conexion);
							}else if($intervalM > 0){
								maximos_desempate_fiesta($maximos, $vecMax, $conexion);
							}else if($intervalD >= 22){
								maximos_desempate_fiesta($maximos, $vecMax, $conexion);
							}else{	

								$x=0;
								$y=0;
								$traerLugares = "select * from fiesta where id_curso = '$_SESSION[curso]'";
								if($result = $conexion->query($traerLugares)){
									if($result->num_rows > 0){
										$rows = $result->num_rows;
										
										$total_rows = $rows/3;
										$resto = $rows % 3;
										$entera = $rows - $resto;
										$total_rows = ceil($total_rows);
										if($rows < 3){
											$sections = $resto;
										}else{
											$sections = 3;
										}


										while($reg = $result->fetch_array(MYSQLI_ASSOC)){
												$lugares[] = $reg; 
										}
										//echo "Necesito ".ceil($total_rows)." div rows";
										$total_rows = ceil($total_rows);
										for ($i=0; $i < $total_rows; $i++) { 
										echo "<div class='row'>";	
											if($rows == $entera){
												
												while($y < $sections){
													$calificacion = calcular($conexion,$lugares[$x]['id_fiesta'],'fiesta');
													$ancho = calcular_ancho($calificacion); 
													echo"<section class='4u 12u(mobile)'>
														<div id='cordoba'>
															<a href=fiesta-3.php?fiesta=".$lugares[$x]['id_fiesta']."><span class='number' style='background-image:url(../images/".$lugares[$x]['foto_perfil'].")'>".$lugares[$x]["nombre"]."</span></a>
														</div>";
                 						if($vota > 0){
                 						echo"<p class='detalles'>Calificacion:</p>
														<p class='detalles'>".$lugares[$x]['calificacion']."</p>
														<div id='estrellas-gris'><div id='estrellas-cambia' style='width:".$ancho."px'></div></div>";
														}
													echo"</section>";
													$y++;
													$x++;
												}
												$y = 0;

											}else{
												while($y < $sections){ 

													$calificacion = calcular($conexion,$lugares[$x]['id_fiesta'],'fiesta');
													$ancho = calcular_ancho($calificacion); 
														echo"<section class='4u 12u(mobile)'>
														<div id='cordoba'>
															<a href=fiesta-3.php?fiesta=".$lugares[$x]['id_fiesta']."><span class='number' style='background-image:url(../images/".$lugares[$x]['foto_perfil'].")'>".$lugares[$x]["nombre"]."</span></a>
														</div>";
                 					 if($vota > 0){
                 			 			echo"<p class='detalles'>Calificacion:</p>
														<p class='detalles'>".$lugares[$x]['calificacion']."</p>
														<div id='estrellas-gris'><div id='estrellas-cambia' style='width:".$ancho."px'></div></div>";
														}
													echo"</section>";
													$y++;
													$x++;
													}
													$y = 0;
													if($x == $entera){
														$sections = $resto;
													}
											}

										echo "</div>";
										}//termina for
									}else{
										echo "<h2>Aun no se han propuesto lugares para el upd</h2>";
									}
								}
							}
							?>
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