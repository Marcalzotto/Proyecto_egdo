<?php require_once("../bloqueSeguridad.php");?>
<?php require_once("conexion.php");?>
<?php 
	$flag = 0;

	$queryVerFecha = "select * from actividad_disenio where usuario_apertura = '$_SESSION[id_usuario]' 
										and curso_pertenece_votacion = '$_SESSION[curso]'";

	$result = $conexion->query($queryVerFecha);
	if($result){
		
		if($result->num_rows > 0){
			
			$reg1 = $result->fetch_array(MYSQLI_ASSOC);
			$fecha_apertura = new DateTime($reg1['fecha_apertura']);
			$fechaHoy = new DateTime();
			$fechaHoy->format("Y-m-d H:i:s");
			$interval = $fechaHoy->diff($fecha_apertura);
			$intervalInDays = $interval->d;
			if($intervalInDays < 7){
				header('location:Tee-Designer-master/index_adminCurso_tee.php');
			
			}else if($intervalInDays >= 7 && $intervalInDays < 21){
				$flag = 1;
			}
		}else{
			header('location:Tee-Designer-master/index_adminCurso.php');
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
			<script type="text/javascript" src="../js/obtenerMedidaBandera.js"></script>
			<script type="text/javascript" src="../js/obtenerTallesAlumno.js"></script>
			
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
					$var = 0;
    				//se usa para ver que todo funcione en forma correcta
    				$fechaPrueba = new datetime("2016-07-19 20:00:00"); 
						//echo "fecha de Hoy".$fechaHoy->format("Y-m-d H:i:s")."</br>";
    				//$fecha_apertura->add(new dateInterval('P6D'));

						$fecha_fin_primer_instancia = new datetime($reg1["fecha_apertura"]);
													
						//echo "Fecha fin primer instancia".$fecha_fin_primer_instancia->format("Y-m-d H:i:s")."</br>";
													
						$fecha_fin_primer_instancia->add(new dateInterval('P9D')); 
						//prueba periodo de 2 dias(P2D) real a periodo de 2 minutos y 4 minutos para las fechas
													
						//echo "Fecha fin primer instancia + 2 dias".$fecha_fin_primer_instancia->format("Y-m-d H:i:s")."</br>";
						$fecha_fin_segunda_instancia = new datetime($reg1["fecha_apertura"]);

						//echo "Fecha fin segunda instancia".$fecha_fin_segunda_instancia->format("Y-m-d H:i:s")."</br>";
						$fecha_fin_segunda_instancia->add(new dateInterval('P11D'));

						//echo "Fecha fin segunda instancia + 4 dias".$fecha_fin_segunda_instancia->format("Y-m-d H:i:s")."</br>";
						
						if($fechaHoy <= $fecha_fin_primer_instancia && $fechaHoy <= $fecha_fin_segunda_instancia){
							
							echo "<div class='lista_pasos'>
											<ul class='pasos'>
												<li><div>1</div><p>Dise&ntilde;a tu ropa</p></li>
												<li><div class='active'>2</div><p>Vota los dise&ntilde;os</p></li>
												<li><div>3</div><p>Arma tu pedido</p></li>
												<li><div>4</div><p>Eleji tu empresa</p></li>
											</ul>
										</div>";
						}else{
							$var = 1;
							echo "<div class='lista_pasos'>
											<ul class='pasos'>
												<li><div>1</div><p>Dise&ntilde;a tu ropa</p></li>
												<li><div>2</div><p>Vota los dise&ntilde;os</p></li>
												<li><div class='active'>3</div><p>Arma tu pedido</p></li>
												<li><div>4</div><p>Eleji tu empresa</p></li>
											</ul>
										</div>";
						}
				?>

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
    
    							<section id="content1">

										<?php
											
										if($fechaHoy <= $fecha_fin_primer_instancia){

										$qry = "select * from disenio as d join usuario as u on d.id_usuario_subio = u.id_usuario 
										where u.id_curso = '$_SESSION[curso]' and d.codigo_tipo = 1";

														$resultSetTipo1 = $conexion->query($qry) or die($conexion->error);

														if($resultSetTipo1){
													
																$cant_regs = $resultSetTipo1->num_rows;

																if($cant_regs == 0){
																		echo "<p id=no-ul >No hay dise&ntilde;os subidos para la votacion</p>";
																}else{
																
																		while($reg = $resultSetTipo1->fetch_array(MYSQLI_ASSOC)){
																			$varRegistros[] = $reg;
																		}

																			echo "<ul class=primer_instancia>";

																		foreach($varRegistros as $unVar){
																			
																			echo "<li><a href=Tee-Designer-master/tdesignAPI/".$unVar['path_img_doble']." rel='lightbox'><img src=Tee-Designer-master/tdesignAPI/".$unVar['path_frontal']." 
																						width='105' height='105' class='ropa' alt='buzo frente'></a><p>Subido por: ".$unVar['nombre']."</p>
																						<p>Calificacion: <span>".$unVar['cantidad_votos']."</span><img data-id=".$unVar['id_disenio']." 
																						data-tipo=".$unVar['codigo_tipo']." src='../images/dropotron_icons/like.png' alt='Like'></p></li>";
																		}
																			echo "</ul>";
																}

														}else{
															echo "<p id=no-ul >Lo sentimos hubo un problema con el servidor.</p>";
														}
													}else if($fechaHoy > $fecha_fin_primer_instancia && $fechaHoy <= $fecha_fin_segunda_instancia){
																
																	$traerDiseniosMasVotados = "select * from disenio as d join usuario u on d.id_usuario_subio = u.id_usuario 
																	where d.codigo_tipo = 1 and u.id_curso = '$_SESSION[curso]' order by d.cantidad_votos desc limit 3";
																
																	$consultaMasVotados = $conexion->query($traerDiseniosMasVotados) or die($conexion->error);

																	if($consultaMasVotados){
																		
																			$cantidadDeRegistros = $consultaMasVotados->num_rows;
																			if($cantidadDeRegistros > 0){
																			
																					echo "<ul class=segunda_instancia>";		
																				
																					while($deAunGanador = $consultaMasVotados->fetch_array(MYSQLI_ASSOC)){
																						$arrayMasVotados1[] = $deAunGanador;
																					}

																					foreach($arrayMasVotados1 as $unoMasVotado){
																					
																					echo "<li><a href=Tee-Designer-master/tdesignAPI/".$unoMasVotado['path_img_doble']." rel='lightbox'><img src=Tee-Designer-master/tdesignAPI/".$unoMasVotado['path_frontal']." 
																						width='105' height='105' class='ropa' alt='buzo frente'></a><p>Subido por: ".$unoMasVotado['nombre']."</p>
																						<p>Calificacion: <span>".$unoMasVotado['votos_segunda_instancia']."</span><img data-id=".$unoMasVotado['id_disenio']." 
																						data-tipo=".$unoMasVotado['codigo_tipo']." src='../images/dropotron_icons/like.png' alt='Like'></p></li>";	
																					
																					}

																					echo "</ul>";

																			}else{
																				echo "<p id=no-ul >No hay dise&ntilde;os subidos para la segunda instancia de votacion</p>";
																			}

																	}else{
																	echo "<p id=no-ul >Lo sentimos hubo un problema con el servidor.</p>";
																	}	
													}else if($fechaHoy >= $fecha_fin_segunda_instancia){
																/*ESTE CODIGO AHORA VA EN LA PANTALLA DONDE SE ELIJE EL LISTADO DE TALLES*/
														$buscarGanador = "select * from disenio as d join usuario u on d.id_usuario_subio = u.id_usuario where d.codigo_tipo = 1 and u.id_curso = '$_SESSION[curso]' order by d.votos_segunda_instancia desc limit 1";
																
																$traerGanador = $conexion->query($buscarGanador) or die($conexion->error);

																if($traerGanador){
																	$hayUnGanador = $traerGanador->num_rows;

																	if($hayUnGanador > 0){
																		echo "<p id=ganador>Dise&ntilde;o ganador!</p>";
																		echo "<ul class=tercer_instancia>";

																		$elGanador = $traerGanador->fetch_array(MYSQLI_ASSOC);

																		echo "<li><a href=Tee-Designer-master/tdesignAPI/".$elGanador['path_img_doble']." rel='lightbox'><img src=Tee-Designer-master/tdesignAPI/".$elGanador['path_frontal']." 
																						width='105' height='105' class='ropa' alt='buzo frente'></a><p>Subido por: ".$elGanador['nombre']."</p>
																						<p>Calificacion: <span>".$elGanador['votos_segunda_instancia']."</span><img data-id=".$elGanador['id_disenio']." 
																						data-tipo=".$elGanador['codigo_tipo']." src='../images/dropotron_icons/like.png' alt='Like'></p></li>";	
																		
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
										?>
  								</section>
    
  								<section id="content2">
    									<?php
    										
    										if($fechaHoy >= $fecha_apertura && $fechaHoy <= $fecha_fin_primer_instancia){

    												$qry = "select * from disenio as d join usuario as u on d.id_usuario_subio = u.id_usuario 
														where u.id_curso = '$_SESSION[curso]' and d.codigo_tipo = 2";
    												
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

    																echo "<li><a href=Tee-Designer-master/tdesignAPI/".$unRegistro['path_img_doble']." rel='lightbox'><img src=Tee-Designer-master/tdesignAPI/".$unRegistro['path_frontal']." 
																					width='105' height='105' class='ropa' alt='remera frente'></a><p>Subido por: ".$unRegistro['nombre']."</p>
																					<p>Calificacion: <span>".$unRegistro['votos_segunda_instancia']."</span><img data-id=".$unRegistro['id_disenio']." 
																					data-tipo=".$unRegistro['codigo_tipo']." src='../images/dropotron_icons/like.png' alt='Like'></p></li>";	
    																}
    												
    																echo "</ul>";	
    														}
    												}else{
    													
    													echo "<p id=no-ul >Lo sentimos hubo un problema con el servidor.</p>";
    												}
    											}else if($fechaHoy >= $fecha_fin_primer_instancia && $fechaHoy <= $fecha_fin_segunda_instancia){

    													$traerDiseniosMasVotados = "select * from disenio as d join usuario u on d.id_usuario_subio = u.id_usuario 
																	where d.codigo_tipo = 2 and u.id_curso = '$_SESSION[curso]' order by d.cantidad_votos desc limit 3";
    													
															$consultaMasVotados = $conexion->query($traerDiseniosMasVotados) or die($conexion->error);

															if($consultaMasVotados){
																		
																$cantidadDeRegistros = $consultaMasVotados->num_rows;
																
																if($cantidadDeRegistros > 0){
																			
																		echo "<ul class=segunda_instancia>";		
																				
																		while($deAunGanador = $consultaMasVotados->fetch_array(MYSQLI_ASSOC)){
																			$arrayMasVotados2[] = $deAunGanador;
																		}
																		
																		foreach($arrayMasVotados2 as $unoMasVotado){
																			
																			echo "<li><a href=Tee-Designer-master/tdesignAPI/".$unoMasVotado['path_img_doble']." rel='lightbox'><img src=Tee-Designer-master/tdesignAPI/".$unoMasVotado['path_frontal']." 
																					width='105' height='105' class='ropa' alt='remera frente'></a><p>Subido por: ".$unoMasVotado['nombre']."</p>
																					<p>Calificacion: <span>".$unoMasVotado['votos_segunda_instancia']."</span><img data-id=".$unoMasVotado['id_disenio']." 
																					data-tipo=".$unoMasVotado['codigo_tipo']." src='../images/dropotron_icons/like.png' alt='Like'></p></li>";	
																		}

																		echo "</ul>";

																	}else{
																				echo "<p id=no-ul >No hay dise&ntilde;os subidos para la segunda instancia de votacion</p>";
																	}

																}else{
																	echo "<p id=no-ul >Lo sentimos hubo un problema con el servidor.</p>";
																}		
    											}else{
    														
    														$buscarGanador = "select * from disenio as d join usuario u on d.id_usuario_subio = u.id_usuario where d.codigo_tipo = 2 and u.id_curso = '$_SESSION[curso]' order by d.votos_segunda_instancia desc limit 1";
    														
																$traerGanador = $conexion->query($buscarGanador) or die($conexion->error);

																if($traerGanador){
																	$hayUnGanador = $traerGanador->num_rows;

																	if($hayUnGanador > 0){
																		
																		echo "<p id=ganador>Dise&ntilde;o ganador!</p>";
																		echo "<ul class=tercer_instancia>";

																		$elGanador = $traerGanador->fetch_array(MYSQLI_ASSOC);
																		
																		echo "<li><a href=Tee-Designer-master/tdesignAPI/".$elGanador['path_img_doble']." rel='lightbox'><img src=Tee-Designer-master/tdesignAPI/".$elGanador['path_frontal']." 
																					width='105' height='105' class='ropa' alt='remera frente'></a><p>Subido por: ".$elGanador['nombre']."</p>
																					<p>Calificacion: <span>".$elGanador['votos_segunda_instancia']."</span><img data-id=".$elGanador['id_disenio']." 
																					data-tipo=".$elGanador['codigo_tipo']." src='../images/dropotron_icons/like.png' alt='Like'></p></li>";	

																		echo "</ul>";
																	}else{
																		echo "<p id=no-ul >No hay dise&ntilde;os subidos para esta votacion</p>";
																	}
																}else{
																	echo "<p id=no-ul >Lo sentimos hubo un problema con el servidor.</p>";
																}
													}	
    								?>
  								</section>
    							
    							<section id="content3">
    								<?php
    										
    									if($fechaHoy >= $fecha_apertura && $fechaHoy <= $fecha_fin_primer_instancia){

														$qry = "select * from disenio as d join usuario as u on d.id_usuario_subio = u.id_usuario 
														where u.id_curso = '$_SESSION[curso]' and d.codigo_tipo = 3";

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
    																		
    																		echo "<li><a href=Tee-Designer-master/tdesignAPI/".$var['path_img_doble']." rel='lightbox'><img src=Tee-Designer-master/tdesignAPI/".$var['path_frontal']." 
																							width='105' height='105' class='ropa' alt='bandera'></a><p>Subido por: ".$var['nombre']."</p>
																							<p>Calificacion: <span>".$var['votos_segunda_instancia']."</span><img data-id=".$var['id_disenio']." 
																							data-tipo=".$var['codigo_tipo']." src='../images/dropotron_icons/like.png' alt='Like'></p></li>";	
																			}

    																echo "</ul>";
    														}	
    												}else{
    														echo "<p id=no-ul >Lo sentimos hubo un problema con el servidor.</p>";
    												}
    											}else if($fechaHoy >= $fecha_fin_primer_instancia && $fechaHoy <= $fecha_fin_segunda_instancia){
    													
    													$traerDiseniosMasVotados = "select * from disenio as d join usuario u on d.id_usuario_subio = u.id_usuario 
															where d.codigo_tipo = 3 and u.id_curso = '$_SESSION[curso]' order by d.cantidad_votos desc limit 3";
															
															$consultaMasVotados = $conexion->query($traerDiseniosMasVotados) or die($conexion->error);

															if($consultaMasVotados){
																	
																$cantidadDeRegistros = $consultaMasVotados->num_rows;
																
																if($cantidadDeRegistros > 0){
																				
																		echo "<ul class=segunda_instancia>";		
																				
																		while($deAunGanador = $consultaMasVotados->fetch_array(MYSQLI_ASSOC)){
																			$arrayMasVotados3[] = $deAunGanador;
																		}

																		foreach($arrayMasVotados3 as $unoMasVotado){
																			
																			echo "<li><a href=Tee-Designer-master/tdesignAPI/".$unoMasVotado['path_img_doble']." rel='lightbox'><img src=Tee-Designer-master/tdesignAPI/".$unoMasVotado['path_frontal']." 
																					width='105' height='105' class='ropa' alt='bandera'></a><p>Subido por: ".$unoMasVotado['nombre']."</p>
																					<p>Calificacion: <span>".$unoMasVotado['votos_segunda_instancia']."</span><img data-id=".$unoMasVotado['id_disenio']." 
																					data-tipo=".$unoMasVotado['codigo_tipo']." src='../images/dropotron_icons/like.png' alt='Like'></p></li>";	
																			}

																		echo "</ul>";

																	}else{
																				echo "<p id=no-ul >No hay dise&ntilde;os subidos para la segunda instancia de votacion</p>";
																	}

																}else{
																	echo "<p id=no-ul >Lo sentimos hubo un problema con el servidor.</p>";
																}		
    											}else{

    												$buscarGanador = "select * from disenio as d join usuario u on d.id_usuario_subio = u.id_usuario 
    												where d.codigo_tipo = 3 and u.id_curso = '$_SESSION[curso]' order by d.votos_segunda_instancia desc limit 1";
    												
																$traerGanador = $conexion->query($buscarGanador) or die($conexion->error);

																if($traerGanador){
																	$hayUnGanador = $traerGanador->num_rows;

																	if($hayUnGanador > 0){
																		echo "<p id=ganador>Dise&ntilde;o ganador!</p>";
																		echo "<ul class=tercer_instancia>";

																		$elGanador = $traerGanador->fetch_array(MYSQLI_ASSOC);

																		echo "<li><a href=Tee-Designer-master/tdesignAPI/".$elGanador['path_img_doble']." rel='lightbox'><img src=Tee-Designer-master/tdesignAPI/".$elGanador['path_frontal']." 
																					width='105' height='105' class='ropa' alt='bandera'></a><p>Subido por: ".$elGanador['nombre']."</p>
																					<p>Calificacion: <span>".$elGanador['votos_segunda_instancia']."</span><img data-id=".$elGanador['id_disenio']." 
																					data-tipo=".$elGanador['codigo_tipo']." src='../images/dropotron_icons/like.png' alt='Like'></p></li>";	

																		echo "</ul>";
																	}else{
																		echo "<p id=no-ul >No hay dise&ntilde;os subidos para esta votacion</p>";
																	}
																}else{
																	echo "<p id=no-ul >Lo sentimos hubo un problema con el servidor.</p>";
																}
    											}
    								?>
  								</section>
    							</div>
										
										<?php
											//Verificar la altura de la votacion, si paso la segunda instancia se muestra form con talles
										if($var == 1){
											$buscarTalleAnterior = "select talle_buzo, talle_remera from talles_curso where usuario = $_SESSION[id_usuario]";
											$talles = $conexion->query($buscarTalleAnterior);

											if($talles){
													if($talles->num_rows > 0){
														
														$varr = $talles->fetch_array(MYSQLI_ASSOC);
														$tBuzo = $varr["talle_buzo"];
														$tRemera = $varr["talle_remera"];
														$tBuzo = strtoupper($tBuzo);
														$tRemera = strtoupper($tRemera);
													}else{
														$tBuzo = "N/D";
														$tRemera = "N/D";
													}
											}else{
												$tBuzo = "N/D";
												$tRemera = "N/D";
											}

											echo "<div id='formTalles'>	
															<h2>Eleg&iacute; tu talle de ropa</h2>
															
															<table border='1'>
																<tr>
																	<th>Prenda</th>
																	<th>Talle</th>
																	<th>Talle elegído anteriormente</th>
																</tr>
																<tr>
																	<td>Buzo</td>
																	<td><select name='buzo' id='buzo'>
																				<option value='null'>Seleccionar</option>
    																		<option value='xs'>XS</option>
    																		<option value='s'>S</option>
    																		<option value='m'>M</option>
    																		<option value='l'>L</option>
    																		<option value='xl'>XL</option>
    																		<option value='xxl'>XXL</option>
																			</select></td>
																			<td>$tBuzo</td>
																</tr>
																<tr>
																	<td>Remera</td>
    															<td><select name='remera' id='remera'>
    																		<option value='null'>Seleccionar</option>
    																		<option value='xs'>XS</option>
    																		<option value='s'>S</option>
    																		<option value='m'>M</option>
    																		<option value='l'>L</option>
    																		<option value='xl'>XL</option>
    																		<option value='xxl'>XXL</option>
    																	</select></td>
    																	<td>$tRemera</td>
																</tr>
															</table>
															<button id='tabTalles'>Ver tabla de talles</button><button id='btn-enviar'>Guardar Cambios</button>
															
														</div>";

														

														echo "<div id='tablaBandera'>
																		<h2>Elegi la medida de la bandera</h2>
																		
																		
																		<table border='1'>
																			<tr>
																				<th>Item</th>
																				<th colspan='2'>Medida</th>
																			</tr>
																			<tr>
																				<td rowspan='2'>Bandera</td>
																				<td>Estandar(1x1,50) Consultar</td>
																				<td>Otra</td>
																			</tr>
																			<tr>
																				<td><input type='radio' value='estandar' name='medida'></td>
																				<td><input type='radio' value='otra' name='medida'></td>
																			</tr>
																		</table>
																		<button id='btn-bandera'>Enviar</button><button id='cancelar'>Limpiar</button>
																		
																	</div>";

																
														echo "<div id='todosLosTalles'>";

															$buscartallesAlumnos = "select nombre, talle_buzo, talle_remera from usuario as u join talles_curso tc on u.id_usuario = tc.usuario;"; 
																$allTalles = $conexion->query($buscartallesAlumnos);
																if($allTalles){
																	if($allTalles->num_rows > 0){
																	echo "<h2>Talles de los alumnos de todo el curso</h2>
    																		<table border='1'>
    																			<tr>
    																				<th>Alumno</th>
    																				<th>Talle Buzo</th>
    																				<th>Talle Remera</th>
    																			</tr>";
    															while($varTalles = $allTalles->fetch_array(MYSQLI_ASSOC)){
    																	$vecTalles[] = $varTalles;
    															}		
    															foreach ($vecTalles as $trTalles) {
    																	echo"<tr>
    																				<td>".$trTalles["nombre"]."</td>
    																				<td>".strtoupper($trTalles["talle_buzo"])."</td>
    																				<td>".strtoupper($trTalles["talle_remera"])."</td>
    																			 </tr>";
    															}		
    																	
    															echo "</table>";
    															echo "<button>Armar Pedido</button>";
    															
																	}
																}
															echo "</div>";
    																
    								}

										$conexion->close();
										?>
										
    								<!--<div id="todosLosTalles">
    									<h2>Talles de los alumnos de todo el curso</h2>
    									<table border="1">
    										<tr>
    											<th>Alumno</th>
    											<th>Talle Buzo</th>
    											<th>Talle Remera</th>
    										</tr>
    										<tr>
    											<td>Pepe</td>
    											<td>XS</td>
    											<td>S</td>
    										</tr>
    										<tr>
    											<td>Jose</td>
    											<td>L</td>
    											<td>M</td>
    										</tr>
    										<tr>
    											<td>Marcos</td>
    											<td>M</td>
    											<td>M</td>
    										</tr>
    									</table>
    									<button>Armar Pedido</button>
    								</div>-->
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