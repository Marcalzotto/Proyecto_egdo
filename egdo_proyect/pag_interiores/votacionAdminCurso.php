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
		<link rel="stylesheet" href="../assets/css/slimbox2.css" type="text/css" media="screen">
		
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css" />
		
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
			<script type="text/javascript" src="../assets/js/jquery_min.js"></script>
			<script type="text/javascript" src="../assets/js/slimbox2.js"></script>
			<!--Librarys for lightBox -->
			<script src="../js/modernizr.js"></script> <!-- Modernizr -->
			<script src="../assets/js/jquery.min.js"></script>
			<script type="text/javascript" src="../js/administrarVotacionAdminCurso.js"></script>
			
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

					<!--

						The slider's images (as well as its behavior) can be configured
						at the top of "assets/js/main.js".

					-->
					<div id="votacion">
						<div id="alert">
							<span>No puedes votar dos veces este disenio</span>
						</div>
							<h2>Vota hasta 5 dise&ntilde;os distintos de cada Item</h2>
								
							<div id="main">
  
  							<input id="tab1" type="radio" name="tabs" checked>
  							<label for="tab1"><img src="../images/tab_icons/sweatshirt.png" alt=""> Buzo/Campera</label>
    						
  							<input id="tab2" type="radio" name="tabs">
  							<label for="tab2"><img src="../images/tab_icons/shirt.png" alt="">Remera</label>
    
  							<input id="tab3" type="radio" name="tabs">
  							<label for="tab3"><img src="../images/tab_icons/flag.png" alt="">Bandera</label>
    
    							<?php 
    									require_once("conexion.php");



    									$cursoBuscarPorSesion = $_SESSION['curso'];
    								

    									$votacionAbierta = "select id_votacion, fecha_apertura from votacion where vigente = 1 and 
    									curso_pertenece_votacion = '$cursoBuscarPorSesion'";
    								 	$datosVotacion = $conexion->query($votacionAbierta) or die($conexion->error);

    									if($datosVotacion){

												$hayVotacionAbierta = $datosVotacion->num_rows;
												
												if($hayVotacionAbierta > 0){
													
													$traerDatosVotacion = $datosVotacion->fetch_array(MYSQLI_ASSOC);
													$fecha_apertura = $traerDatosVotacion["fecha_apertura"];
													$numVotacion = $traerDatosVotacion["id_votacion"];
													
													//echo "Fecha de apertura votacion".$fecha_apertura."</br>";
													
													//$fechaHoy = new datetime(null, new dateTimeZone('America/Argentina/Buenos_Aires'));
														
													//se usa para ver que todo funcione en forma correcta
													$fechaHoy = new datetime("2016-07-17 20:00:00"); 
													//echo "fecha de Hoy".$fechaHoy->format("Y-m-d H:i:s")."</br>";

													$fecha_fin_primer_instancia = new datetime($traerDatosVotacion["fecha_apertura"]);
													
													//echo "Fecha fin primer instancia".$fecha_fin_primer_instancia->format("Y-m-d H:i:s")."</br>";
													
													$fecha_fin_primer_instancia->add(new dateInterval('P2D')); 
													//prueba periodo de 2 dias(P2D) real a periodo de 2 minutos y 4 minutos para las fechas
													
													//echo "Fecha fin primer instancia + 2 dias".$fecha_fin_primer_instancia->format("Y-m-d H:i:s")."</br>";
													$fecha_fin_segunda_instancia = new datetime($traerDatosVotacion["fecha_apertura"]);

													//echo "Fecha fin segunda instancia".$fecha_fin_segunda_instancia->format("Y-m-d H:i:s")."</br>";
													$fecha_fin_segunda_instancia->add(new dateInterval('P4D'));

													//echo "Fecha fin segunda instancia + 4 dias".$fecha_fin_segunda_instancia->format("Y-m-d H:i:s")."</br>";
													$response = 1;

												}else{	
													
														$response = 0;
												}
    									
    									}else{
    								 		$response = -1;
    								 	}
    							?>

  								<section id="content1">

										<?php
											
											if($response > 0){

														if($fechaHoy >= $fecha_apertura && $fechaHoy <= $fecha_fin_primer_instancia){

														$qry = "select * from disenio as d join usuario as u on d.id_usuario_subio 
														= u.id_usuario where d.codigo_tipo = 1 and d.votacion_pertenece = '$numVotacion'";
														$resultSetTipo1 = $conexion->query($qry) or die($conexion->error);

														if($resultSetTipo1){
													
																$cant_regs = $resultSetTipo1->num_rows;

																if($cant_regs == 0){
																		echo "<p id=no-ul >No hay dise&ntilde;os subidos para esta votacion</p>";
																}else{
																
																		while($reg = $resultSetTipo1->fetch_array(MYSQLI_ASSOC)){
																			$varRegistros[] = $reg;
																		}

																			echo "<ul class=primer_instancia>";

																		foreach($varRegistros as $unVar){
																			echo "<li><a href=levantar_img_impresion.php?id_imp=".$unVar["id_disenio"]." rel='lightbox'><img src=levantar_img_frontal.php?id=".$unVar["id_disenio"]." "
    																			."width='105' height='105' class='ropa'></a><p>Subido por: ".$unVar["nombre"]."</p><p>Calificacion: <span>".$unVar["cantidad_votos"]."</span> 
    																		<img data-id=".$unVar["id_disenio"]." data-tipo=".$unVar["codigo_tipo"]." src=../images/dropotron_icons/like.png alt=''></p></li>";
																		}

																			echo "</ul>";
																}

														}else{
															echo "<p id=no-ul >Lo sentimos hubo un problema con el servidor.</p>";
														}
													}else if($fechaHoy >= $fecha_fin_primer_instancia && $fechaHoy <= $fecha_fin_segunda_instancia){
																
																	$traerDiseniosMasVotados = "select * from disenio as d join usuario u on d.id_usuario_subio = u.id_usuario 
																	where d.codigo_tipo = 1 and d.votacion_pertenece = '$numVotacion' order by d.cantidad_votos desc limit 3";
																
																	$consultaMasVotados = $conexion->query($traerDiseniosMasVotados) or die($conexion->error);

																	if($consultaMasVotados){
																		
																			$cantidadDeRegistros = $consultaMasVotados->num_rows;
																			if($cantidadDeRegistros > 0){
																			
																					echo "<ul class=segunda_instancia>";		
																				
																					while($deAunGanador = $consultaMasVotados->fetch_array(MYSQLI_ASSOC)){
																						$arrayMasVotados1[] = $deAunGanador;
																					}

																					foreach($arrayMasVotados1 as $unoMasVotado){
																					echo "<li><a href=levantar_img_impresion.php?id_imp=".$unoMasVotado["id_disenio"]." rel='lightbox'><img src=levantar_img_frontal.php?id=".$unoMasVotado["id_disenio"]." "
    																			."width='105' height='105' class='ropa'></a><p>Subido por: ".$unoMasVotado["nombre"]."</p><p>Calificacion: <span>".$unoMasVotado["votos_segunda_instancia"]."</span> 
    																			<img data-id=".$unoMasVotado["id_disenio"]." data-tipo=".$unoMasVotado["codigo_tipo"]." src=../images/dropotron_icons/like.png alt=''></p></li>";
																					}

																					echo "</ul>";

																			}else{
																				echo "<p id=no-ul >No hay dise&ntilde;os subidos para la segunda instancia de votacion</p>";
																			}

																	}else{
																	echo "<p id=no-ul >Lo sentimos hubo un problema con el servidor.</p>";
																	}	
													}else if($fechaHoy >= $fecha_fin_segunda_instancia){
																
														$buscarGanador = "select * from disenio as d join usuario u on d.id_usuario_subio = u.id_usuario where d.codigo_tipo = 1 and d.votacion_pertenece = '$numVotacion' order by d.votos_segunda_instancia desc limit 1";
																
																$traerGanador = $conexion->query($buscarGanador) or die($conexion->error);

																if($traerGanador){
																	$hayUnGanador = $traerGanador->num_rows;

																	if($hayUnGanador > 0){
																		echo "<p id=ganador>Dise&ntilde;o ganador!</p>";
																		echo "<ul class=tercer_instancia>";

																		$elGanador = $traerGanador->fetch_array(MYSQLI_ASSOC);

																		echo "<li><a href=levantar_img_impresion.php?id_imp=".$elGanador["id_disenio"]." rel='lightbox'><img src=levantar_img_frontal.php?id=".$elGanador["id_disenio"]." "
    																		."width='105' height='105' class='ropa'></a><p>Subido por: ".$elGanador["nombre"]."</p><p>Calificacion: <span>".$elGanador["votos_segunda_instancia"]."</span> 
    																		 <img data-id=".$elGanador["id_disenio"]." data-tipo=".$elGanador["codigo_tipo"]." src=../images/dropotron_icons/like.png alt=''></p></li>";
																		
																		echo "</ul>";
																	}else{
																		echo "<p id=no-ul >No hay dise&ntilde;os subidos para esta votacion</p>";
																	}
																}else{
																	echo "<p id=no-ul >Lo sentimos hubo un problema con el servidor.</p>";
																}
													}else{
														echo "<p id=no-ul >Lo sentimos hubo un problema con el servidor.</p>";
													}
											}else if($response == 0){
													
														echo "<p id=no-ul >No hay votacion abierta para este curso.</p>";
													
											}else{

													echo "<p id=no-ul >Lo sentimos hubo un problema con el servidor.</p>";
											}	
										?>
  								</section>
    
  								<section id="content2">
    									<?php
    										
    										if($response > 0){

    											if($fechaHoy >= $fecha_apertura && $fechaHoy <= $fecha_fin_primer_instancia){


    												$qry = "select * from disenio as d join usuario as u on d.id_usuario_subio = u.id_usuario where d.codigo_tipo = 2 and d.votacion_pertenece = '$numVotacion'";
														
														$resultSet = $conexion->query($qry) or die($conexion->error);
    										
    												if($resultSet){

    														$cant_regs = $resultSet->num_rows;
    											
    														if($cant_regs == 0){
    												
    																echo "<p id=no-ul>No hay dise&ntilde;os subidos para esta votacion.</p>";
    											
    														}else{
    													
    																while($registro = $resultSet->fetch_array(MYSQLI_ASSOC)){
    																	$contenerRegistros[] = $registro;
    																}
    											
    																echo "<ul class=primer_instancia>";

    																foreach ($contenerRegistros as $unRegistro) {
    					
    																echo "<li><a href=levantar_img_impresion.php?id_imp=".$unRegistro["id_disenio"]." rel='lightbox'><img src=levantar_img_frontal.php?id=".$unRegistro["id_disenio"]." "
    																."width='105' height='105' class='ropa'></a><p>Subido por: ".$unRegistro["nombre"]."</p><p>Calificacion: <span>".$unRegistro["cantidad_votos"]."</span> 
    																<img data-id=".$unRegistro["id_disenio"]." data-tipo=".$unRegistro["codigo_tipo"]." src=../images/dropotron_icons/like.png alt=''></p></li>";
    																}
    												
    																echo "</ul>";	
    														}
    												}else{
    													
    													echo "<p id=no-ul >Lo sentimos hubo un problema con el servidor.</p>";
    												}
    											}else if($fechaHoy >= $fecha_fin_primer_instancia && $fechaHoy <= $fecha_fin_segunda_instancia){

    													$traerDiseniosMasVotados = "select * from disenio as d join usuario u on d.id_usuario_subio = u.id_usuario where d.codigo_tipo = 2 and d.votacion_pertenece = 
    													'$numVotacion' order by d.cantidad_votos desc limit 3";
																
															$consultaMasVotados = $conexion->query($traerDiseniosMasVotados) or die($conexion->error);

															if($consultaMasVotados){
																		
																$cantidadDeRegistros = $consultaMasVotados->num_rows;
																
																if($cantidadDeRegistros > 0){
																			
																		echo "<ul class=segunda_instancia>";		
																				
																		while($deAunGanador = $consultaMasVotados->fetch_array(MYSQLI_ASSOC)){
																			$arrayMasVotados2[] = $deAunGanador;
																		}
																		
																		foreach($arrayMasVotados2 as $unoMasVotado){
																			echo "<li><a href=levantar_img_impresion.php?id_imp=".$unoMasVotado["id_disenio"]." rel='lightbox'><img src=levantar_img_frontal.php?id=".$unoMasVotado["id_disenio"]." "
    																			."width='105' height='105' class='ropa'></a><p>Subido por: ".$unoMasVotado["nombre"]."</p><p>Calificacion: <span>".$unoMasVotado["votos_segunda_instancia"]."</span> 
    																			<img data-id=".$unoMasVotado["id_disenio"]." data-tipo=".$unoMasVotado["codigo_tipo"]." src=../images/dropotron_icons/like.png alt=''></p></li>";
																		}

																		echo "</ul>";

																	}else{
																				echo "<p id=no-ul >No hay dise&ntilde;os subidos para la segunda instancia de votacion</p>";
																	}

																}else{
																	echo "<p id=no-ul >Lo sentimos hubo un problema con el servidor.</p>";
																}		
    											}else{

    														$buscarGanador = "select * from disenio as d join usuario u on d.id_usuario_subio = u.id_usuario where d.codigo_tipo = 2 and d.votacion_pertenece = '$numVotacion' order by d.votos_segunda_instancia desc limit 1";
																$traerGanador = $conexion->query($buscarGanador) or die($conexion->error);

																if($traerGanador){
																	$hayUnGanador = $traerGanador->num_rows;

																	if($hayUnGanador > 0){
																		
																		echo "<p id=ganador>Dise&ntilde;o ganador!</p>";
																		echo "<ul class=tercer_instancia>";

																		$elGanador = $traerGanador->fetch_array(MYSQLI_ASSOC);
																		echo "<li><a href=levantar_img_impresion.php?id_imp=".$elGanador["id_disenio"]." rel='lightbox'><img src=levantar_img_frontal.php?id=".$elGanador["id_disenio"]." "
    																		."width='105' height='105' class='ropa'></a><p>Subido por: ".$elGanador["nombre"]."</p><p>Calificacion: <span>".$elGanador["votos_segunda_instancia"]."</span> 
    																		 <img data-id=".$elGanador["id_disenio"]." data-tipo=".$elGanador["codigo_tipo"]." src=../images/dropotron_icons/like.png alt=''></p></li>";
																		
																		echo "</ul>";
																	}else{
																		echo "<p id=no-ul >No hay dise&ntilde;os subidos para esta votacion</p>";
																	}
																}else{
																	echo "<p id=no-ul >Lo sentimos hubo un problema con el servidor.</p>";
																}

    											}	
    										}else if($response == 0){
    											echo "<p id=no-ul >No hay votacion abierta para este curso.</p>";
    										}else{
    											echo "<p id=no-ul >Lo sentimos hubo un problema con el servidor.</p>";
    										}	
    									?>
  								</section>
    							
    							<section id="content3">
    								<?php
    										
    										if($response > 0){

    											if($fechaHoy >= $fecha_apertura && $fechaHoy <= $fecha_fin_primer_instancia){

    												$qry = "select * from disenio as d join usuario as u on d.id_usuario_subio = u.id_usuario where d.codigo_tipo = 3 and d.votacion_pertenece = '$numVotacion'";

    												$resultSetTipo2 = $conexion->query($qry) or die($conexion->error);

    												if($resultSetTipo2){
    										
    													$cant_regs = $resultSetTipo2->num_rows; 	

    														if($cant_regs == 0){
    																echo "<p id=no-ul>No hay dise&ntilde;os subidos para esta votacion.</p>";
																}else{
    													
    																while($reg2 = $resultSetTipo2->fetch_array(MYSQLI_ASSOC)){
    																	$vector[] = $reg2; 
    																}
    										
    																echo "<ul class=primer_instancia>";

    																	foreach ($vector as $var) {
    												
    																		echo "<li><a href=levantar_img_impresion.php?id_imp=".$var["id_disenio"]." rel='lightbox'><img src=levantar_img_frontal.php?id=".$var["id_disenio"]." "
    																		."width='105' height='105' class='ropa'></a><p>Subido por: ".$var["nombre"]."</p><p>Calificacion: <span>".$var["cantidad_votos"]."</span> 
    																		<img data-id=".$var["id_disenio"]." data-tipo=".$var["codigo_tipo"]." src=../images/dropotron_icons/like.png alt=''></p></li>";
    																	}

    																echo "</ul>";
    														}	
    												}else{
    														echo "<p id=no-ul >Lo sentimos hubo un problema con el servidor.</p>";
    												}
    											}else if($fechaHoy >= $fecha_fin_primer_instancia && $fechaHoy <= $fecha_fin_segunda_instancia){
    													
    													$traerDiseniosMasVotados = "select * from disenio as d join usuario u on d.id_usuario_subio = u.id_usuario where d.codigo_tipo = 3 and d.votacion_pertenece = 
    													'$numVotacion' order by d.cantidad_votos desc limit 3";
																
															$consultaMasVotados = $conexion->query($traerDiseniosMasVotados) or die($conexion->error);

															if($consultaMasVotados){
																	
																$cantidadDeRegistros = $consultaMasVotados->num_rows;
																
																if($cantidadDeRegistros > 0){
																				
																		echo "<ul class=segunda_instancia>";		
																				
																		while($deAunGanador = $consultaMasVotados->fetch_array(MYSQLI_ASSOC)){
																			$arrayMasVotados3[] = $deAunGanador;
																		}

																		foreach($arrayMasVotados3 as $unoMasVotado){
																			echo "<li><a href=levantar_img_impresion.php?id_imp=".$unoMasVotado["id_disenio"]." rel='lightbox'><img src=levantar_img_frontal.php?id=".$unoMasVotado["id_disenio"]." "
    																			."width='105' height='105' class='ropa'></a><p>Subido por: ".$unoMasVotado["nombre"]."</p><p>Calificacion: <span>".$unoMasVotado["votos_segunda_instancia"]."</span> 
    																			<img data-id=".$unoMasVotado["id_disenio"]." data-tipo=".$unoMasVotado["codigo_tipo"]." src=../images/dropotron_icons/like.png alt=''></p></li>";
																		}

																		echo "</ul>";

																	}else{
																				echo "<p id=no-ul >No hay dise&ntilde;os subidos para la segunda instancia de votacion</p>";
																	}

																}else{
																	echo "<p id=no-ul >Lo sentimos hubo un problema con el servidor.</p>";
																}		
    											}else{

    												$buscarGanador = "select * from disenio as d join usuario u on d.id_usuario_subio = u.id_usuario where d.codigo_tipo = 3 and d.votacion_pertenece = '$numVotacion' order by d.votos_segunda_instancia desc limit 1";
																$traerGanador = $conexion->query($buscarGanador) or die($conexion->error);

																if($traerGanador){
																	$hayUnGanador = $traerGanador->num_rows;

																	if($hayUnGanador > 0){
																		echo "<p id=ganador>Dise&ntilde;o ganador!</p>";
																		echo "<ul class=tercer_instancia>";

																		$elGanador = $traerGanador->fetch_array(MYSQLI_ASSOC);
																		echo "<li><a href=levantar_img_impresion.php?id_imp=".$elGanador["id_disenio"]." rel='lightbox'><img src=levantar_img_frontal.php?id=".$elGanador["id_disenio"]." "
    																		."width='105' height='105' class='ropa'></a><p>Subido por: ".$elGanador["nombre"]."</p><p>Calificacion: <span>".$elGanador["votos_segunda_instancia"]."</span> 
    																		 <img data-id=".$elGanador["id_disenio"]." data-tipo=".$elGanador["codigo_tipo"]." src=../images/dropotron_icons/like.png alt=''></p></li>";
																		
																		echo "</ul>";
																	}else{
																		echo "<p id=no-ul >No hay dise&ntilde;os subidos para esta votacion</p>";
																	}
																}else{
																	echo "<p id=no-ul >Lo sentimos hubo un problema con el servidor.</p>";
																}
    											}
    										}else if($response == 0){
    											echo "<p id=no-ul >No hay votacion abierta para este curso.</p>";
    										}else{
    											echo "<p id=no-ul >Lo sentimos hubo un problema con el servidor.</p>";
    										}

    										$conexion->close();
    								?>
  								</section>
    							</div>
										<p id="respuestaDisparo">Hola soy Span!</p>
										
										<div id="formDisparaVotacion">
    									<button data-num="1" id="btn-disparar">Disparar Votacion</button>
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
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/skel-viewport.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>
			
	</body>
</html>