<?php 
			include("../bloqueSeguridad.php");
			include('conexion.php');
			include('funciones/calcular_calificacion_empresa.php');
			include('funciones/calcular_nuevo_ancho.php');
			include('funciones/funcion_obtener_cantidad_votos.php');
			include('funciones/calcular_ancho_barritas.php');
			include('funciones/obtener_mes.php');
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
		
		<!-- mejora tooltips-->
		<link rel="stylesheet" href="../css/hint.css-2.4.1/hint.min.css" />
		
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		
		<link rel="stylesheet" href="../css/index_gral.css" />
		
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
			
			<!--<link rel="stylesheet" type="text/css" href="../css/common.css" />-->
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
			<script src="../js/subirComentario.js"></script>
			<script src="../js/getCalificacion.js"></script>
	
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
					<?php
						
						$usuario = $_SESSION['id_usuario'];
						if(isset($_GET["id"])){
							
							$id = base64_decode($_GET["id"]);
							filter_var($id, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
							$buscarEmpresa = "select * from empresa where id_empresa = '$id'"; 
							$resultSet = $conexion->query($buscarEmpresa);
							if($resultSet){
								if($resultSet->num_rows == 1){
							
										$empresa = $resultSet->fetch_array(MYSQLI_ASSOC);
										
										$calificacion = calcular_calificacion($conexion,$id);
										$nuevo_ancho = calcular_ancho($calificacion);
										$resultSet->close();
								}else{
									if($id_rol == 2)	
									header('location: empresasAdmin.php');
									else
									header('location: empresas.php');	
								}


							}else{
									if($id_rol == 2)	
									header('location: empresasAdmin.php');
									else
									header('location: empresas.php');	
							}
						}
						?>
					<div id="empresaDetalles">
								<h2>Detalle de Empresa</h2>

								<div id="detalle">
									<ul>
									<li><p><img src="../images/empresas_logos/logotipo.jpg" width="200" height="200" alt=""></p></li>
									<li><p>Nombre: </p> <p><?php echo $empresa["nombre_empresa"]; ?></p></li>
									<li><p>Calle: </p><p><?php echo $empresa["calle"]; ?></p></li>
									<!--<li><p>Altura: </p><p><?php //echo $empresa["altura"]; ?></p></li>-->
									<!--<li><p>Localidad: </p><p><?php //echo $empresa["localidad"]; ?></p></li>-->
									<li><p>Telefono: </p> <p><?php echo $empresa["telefono"]; ?></p></li>
									<li><p>E-mail: </p> <p><?php echo $empresa["email"]; ?></p></li>
									<li><p>Sedes: </p><p> Algun lugar</p></li>
									<li><p>Web: </p> <p><?php echo $empresa["pagina_web"]; ?></p></li>
									</ul>
								</div>
								<?php
									$cant_votos = "select count(id_calificacion) as total from calificacion where id_empresa = '$id'";
									$resultSet = $conexion->query($cant_votos);
									if($resultSet){
										$votos = $resultSet->fetch_array(MYSQLI_ASSOC);
										$total_votos = $votos["total"];
									}else{
										$total_votos = -1;
									}

									$resultSet->close();
								?>
								<div id="calificacion">	
										
											<ul class="l1">
													<li><p>Calificacion:</p></li>
													<li><p class="puntaje"><?php echo $calificacion; ?></p></li>
													<li id="estrellas"><p id="estrellas-cambia" style="width:<?php echo $nuevo_ancho; ?>px"></p>
													</li>
													<li><img src="../images/dropotron_icons/avatar.png" alt="">:&nbsp;<span><?php echo $total_votos;?> en Total.</span></li>
													
											</ul>
											<?php
												$cal5 = obtener_cantidad($conexion,$id,5);
												$cal4 = obtener_cantidad($conexion,$id,4); 
												$cal3 = obtener_cantidad($conexion,$id,3); 
												$cal2 = obtener_cantidad($conexion,$id,2); 
												$cal1 = obtener_cantidad($conexion,$id,1);  
												$ancho5 = ancho_barra($total_votos, $cal5);
												$ancho4 = ancho_barra($total_votos, $cal4);
												$ancho3 = ancho_barra($total_votos, $cal3);
												$ancho2 = ancho_barra($total_votos, $cal2);
												$ancho1 = ancho_barra($total_votos, $cal1);
											?>
											<ul class="l2">
													
													<li><span>5</span><span>&#9733;</span><div style="width: <?php echo $ancho5; ?>px; height: 20px; background:#9EBF59;"></div><span class="num"><?php echo $cal5; ?></span></li>
													<li><span>4</span><span>&#9733;</span><div style="width: <?php echo $ancho4; ?>px; height: 20px; background:#ACD532;"></div><span class="num"><?php echo $cal4; ?></span></li>
													<li><span>3</span><span>&#9733;</span><div style="width: <?php echo $ancho3; ?>px; height: 20px; background:#FED733;"></div><span class="num"><?php echo $cal3; ?></span></li>
													<li><span>2</span><span>&#9733;</span><div style="width: <?php echo $ancho2; ?>px; height: 20px; background:#FEB133;"></div><span class="num"><?php echo $cal2; ?></span></li>
													<li><span>1</span><span>&#9733;</span><div style="width: <?php echo $ancho1; ?>px; height: 20px; background:#FE8A59;"></div><span class="num"><?php echo $cal1; ?></span></li>
											</ul>
								</div>
								
								<div class="formCalificar">
										
										<h2>Calificar esta empresa</h2>
										
										<form>
  											<p class="clasificacion">
    												<input id="radio5" type="radio" name="estrellas" value="5">
    												<label class="labelEstrellas" id="label5" for="radio5">★</label>
   													<input id="radio4" type="radio" name="estrellas" value="4">
    												<label class="labelEstrellas" id="label4" for="radio4">★</label>
    												<input id="radio3" type="radio" name="estrellas" value="3">
    												<label class="labelEstrellas" id="label3" for="radio3">★</label>
    												<input id="radio2" type="radio" name="estrellas" value="2">
   													<label class="labelEstrellas" id="label2" for="radio2">★</label>
    												<input id="radio1" type="radio" name="estrellas" value="1">
    												<label class="labelEstrellas" id="label1" for="radio1">★</label>
    												<input type="hidden" value="<?php echo $id; ?>" id="hidden">
  											</p>
										</form>
										<p id="texto" class="thanks">Gracias por tu voto!</p>
								</div>
								<div id="comentarios">
									
									<h2>Deja tus comentarios aqu&iacute;</h2>
									<form action="">
									
										<label id="labelTextArea" for="textAreaComent">Comentario:</label>
										<textarea class="charcounter-control" name="test" id="textAreaComent" maxlength='1000'  warnlength='800' cols="30" rows="10"></textarea>
										<input type="hidden" id="user" value="<?php echo base64_encode($usuario) ?>">
										<input type="hidden" id="empresa" value="<?php echo base64_encode($id)?>">
										<input type="button" id="btn-comentar" value="Comentar">
										<input type="reset"  id="btn-deshacer"value="Deshacer">

									</form>
									
								</div>
								<div id="noComent">
									<span></span>	

								</div>
									
									<?php
									$buscarComentarioEmpresa = "select u.nombre, ce.comentario, ce.fecha from usuario u join comentario_empresas ce on u.id_usuario = ce.id_usuario where id_empresa = '$id'";
									$resultSet = $conexion->query($buscarComentarioEmpresa);
									if($resultSet){
										
										if($resultSet->num_rows > 0){

											while($comentario = $resultSet->fetch_array(MYSQLI_ASSOC)){
												$comentarios[] = $comentario;
											}

											foreach ($comentarios as $unComentario){
												
												$fecha_separar = explode("-", $unComentario["fecha"]);
												$aaaa = $fecha_separar[0];
												$mm = $fecha_separar[1];
												$dd = $fecha_separar[2];
												
												$mes = get_mes($mm);
												$tiempo = explode(" ", $dd);
												$dia = $tiempo[0];
												$hora = $tiempo[1];

												$tiempo_partes = explode(":",$hora);
												$horas  = $tiempo_partes[0];
												$minutos = $tiempo_partes[1];
												$segundos = $tiempo_partes[2];

												echo "<div class='unComentario'>
															<p class='nombre'><a href='#'>".$unComentario["nombre"]."</a></p>
															<p>".$unComentario['comentario']."</p>
															
															<p class='tiempo'>".$dia." de ".$mes." a las ".$horas.":".$minutos." hs.</p>
														
													 </div>";
											}
										}
									}
									?>							
								
								
					</div>
					<?php $conexion->close(); ?>
					
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
			<!--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>-->
			<script src="../js/jquery.charcounter.js"></script>
			<script src="../js/countDown.js"></script>
			
	</body>
</html>