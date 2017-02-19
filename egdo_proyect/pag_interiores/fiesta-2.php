<?php include ("../bloqueSeguridad.php");?>
<?php include("conexion.php");?>
<?php 
	include("funciones/generar_notificacion.php");
	generar_notificacion($conexion,$_SESSION["curso"]);
?>
<?php include("funciones/cantidad_notificaciones.php");?>
<?php
$verificarFecha = "select fecha_hora from evento where id_actividad = 2 and id_curso = $_SESSION[curso]"; 
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
							
							<?php
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
												
												while($y < $sections) { 
													echo"<section class='4u 12u(mobile)'>
														<div id='cordoba'>
															<a href=fiesta-3.php?fiesta=".$lugares[$x]['id_fiesta']."><span class='number' style='background-image:url(../images/".$lugares[$x]['foto_perfil'].")'>".$lugares[$x]["nombre"]."</span></a>
														</div>
                 						<p class='detalles'>Calificacion:</p>
														<div id='estrellas-gris'><div id='estrellas-cambia' style='width:95px'></div></div>
														<p class='detalles'>3.2</p>
														<p class='detalles'>Votar</p>

														<form>
  													<p class='clasificacion'>
    												<input id='radio5' type='radio' name='estrellas' value='5'>
    												<label class='labelEstrellas' id='label5' for='radio5'>★</label>
   													<input id='radio4' type='radio' name='estrellas' value='4'>
    												<label class='labelEstrellas' id='label4' for='radio4'>★</label>
    												<input id='radio3' type='radio' name='estrellas' value='3'>
    												<label class='labelEstrellas' id='label3' for='radio3'>★</label>
    												<input id='radio2' type='radio' name='estrellas' value='2'>
   													<label class='labelEstrellas' id='label2' for='radio2'>★</label>
    												<input id='radio1' type='radio' name='estrellas' value='1'>
    												<label class='labelEstrellas' id='label1' for='radio1'>★</label>
    												<input type='hidden' value='1' id='hidden'>
  													</p>
														</form>
													</section>";
													$y++;
													$x++;
												}
												$y = 0;

											}else{
												while($y < $sections){ 
													echo"<section class='4u 12u(mobile)'>
														<div id='cordoba'>
															<a href=fiesta-3.php?fiesta=".$lugares[$x]['id_fiesta']."><span class='number' style='background-image:url(../images/".$lugares[$x]['foto_perfil'].")'>".$lugares[$x]["nombre"]."</span></a>
														</div>
                 					 	<p class='detalles'>Calificacion:</p>
														<div id='estrellas-gris'><div id='estrellas-cambia' style='width:100px'></div></div>
														<p class='detalles'>3.2</p>
														<p class='detalles'>Votar</p>

														<form>
  													<p class='clasificacion'>
    												<input id='radio5' type='radio' name='estrellas' value='5'>
    												<label class='labelEstrellas' id='label5' for='radio5'>★</label>
   													<input id='radio4' type='radio' name='estrellas' value='4'>
    												<label class='labelEstrellas' id='label4' for='radio4'>★</label>
    												<input id='radio3' type='radio' name='estrellas' value='3'>
    												<label class='labelEstrellas' id='label3' for='radio3'>★</label>
    												<input id='radio2' type='radio' name='estrellas' value='2'>
   													<label class='labelEstrellas' id='label2' for='radio2'>★</label>
    												<input id='radio1' type='radio' name='estrellas' value='1'>
    												<label class='labelEstrellas' id='label1' for='radio1'>★</label>
    												<input type='hidden' value='1' id='hidden'>
  													</p>
														</form>
													</section>";
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


							?>




							<!--<div class="row">
                               
								<section class="4u 12u(mobile)">
									<div id="mia-quinta"><a href="fiesta-3.php"><span class="number">MiaQuinta</span></a></div>
                                    <div class="estrellas">
									<a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
									<a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
									<a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
									<a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
									<a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
								</div>


									  Agregue el div con el id bariloche para ponerle de fondo la imagen 
									 <div id="mendoza"><a href="mendoza.html"><span class="number"></span></a></div>
								       <div class="estrellas">
									<a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
									<a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
									<a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
									<a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
									<a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>

								</section>
								<section class="4u 12u(mobile)">
									<div id="cordoba"><a href="cordoba.html"><span class="number"></span></a></div>
								    <div class="estrellas">
									<a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
									<a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
									<a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
									<a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
									<a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
								</div>

								    <div id="mardelplata"><a href="mardelplata.html"><span class="number"></span></a></div>
								     <div class="estrellas">
									<a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
									<a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
									<a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
									<a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
									<a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
								</div>
								
								</section>
								<section class="4u 12u(mobile)">
									<div id="brasil"><a href="brasil.html"><span class="number"></span></a></div>
									 <div class="estrellas">
									<a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
									<a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
									<a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
									<a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
									<a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
								</div>

									<div id="mexico"><a href="mexico.html"><span class="number"></span></a></div>
								 <div class="estrellas">
									<a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
									<a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
									<a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
									<a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
									<a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
								</div>
								
								</section>
							</div>-->
						</div>
						<!--<form class="form-validation" enctype="multipart/form-data" method="post" action="#">

									<div class="form-title-row">
										<h1>Deja tu comentario</h1>
									</div>

									<div class="form-row form-input-name-row">
		
		                               <textarea name="Comentario" placeholder="Comentario"></textarea>

									</div>	

								</form>-->
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