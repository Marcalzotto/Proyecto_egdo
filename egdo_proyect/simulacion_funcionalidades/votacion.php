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
		
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<link rel="stylesheet" type="text/css" href="../assets/css/common.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" /> 
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
			<script type="text/javascript">
				$(document).ready(function(){
					$("#votacion #main section ul li p img").click(function(evento){
						
						evento.preventDefault();
						
						var id = $(this).data("id");
						var tipo =  $(this).data("tipo");
						var url_servidor = "voto_hecho.php";
						var target = $(this);
						
						$.post(url_servidor,{'id':id, 'tipo':tipo},function(data){

							if(data == -1){
								
								$("#alert").fadeIn('slow');
								//return false;
							
							}else if(data == -2){
									
								var messaje = "Lo sentimos hubo problemas con el servidor";
								$("#alert").find("span").text(messaje);
								$("#alert").show();
								//return false;
							
							}else{
							
								target.closest("p").find("span").text(data);
							
							}

							setTimeout(function(){$("#alert").fadeOut('slow');}, 3500);
						});

					});
				});
			</script>
			
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
							
						<h1 class="logo">
									<a href="../index.html"><img src="../favicon/favicon-96x96.png" alt=""></a>
						</h1>
							
							
							
							<!-- Nav -->
								<nav id="nav">
									
									<ul class="myfont">

									
								
									<li class="circle"><a href="left-sidebar.html"><img src="../images/upd.png" alt="UPD"></a></li>
										
										<li class="circle">
											<a href="no-sidebar.html">
												<img src="../images/shirt.png" alt="Dise&ntilde;ar">
											</a>
												<ul>
													<li><a href="Tee-Designer-master/index.php">Dise&ntilde;a tu ropa <img src="../images/dropotron_icons/disenio_ropa.png" alt="disenio de ropa" style="float:right"></a></li>
													<li><a href="../pag_interiores/index_general.html">Pagina Principal<img src="../images/dropotron_icons/principal.png" alt="principal" style="float:right"></a></li>
													<li><a href="no-sidebar.html">Empresas<img src="../images/dropotron_icons/empresas.png" alt="empresas" style="float:right"></a></li>
													<li><a href="subir_arch.php">Subi tus dise&ntilde;os<img src="../images/dropotron_icons/upload.png" alt="subir archivos" style="float:right"></a></li>
												</ul>
											</li>
										<li class="circle"><a href="no-sidebar.html"><img src="../images/party.png" alt="Dise&ntilde;ar"></a></li>
										<li class="circle"><a href="no-sidebar.html"><img src="../images/foto-evento.png" alt="foto-evento"></a></li>
										<li class="circle"><a href="no-sidebar.html"><img src="../images/bus.png" alt="info-viajes"></a></li>
										<li class="circle"><a href="no-sidebar.html">
																				<img src="../images/settings.png" alt="configuracion">
																			</a>
																			<ul>
																				<li><a href="no-sidebar.html">Manda tu invitacion <img src="../images/dropotron_icons/send_mail.png" alt="agenda" style="float:right"></a></li>
																				<li><a href="no-sidebar.html">Bandeja de entrada<img src="../images/dropotron_icons/mail_box.png" alt="agenda" style="float:right"></a></li>
																				<li><a href="no-sidebar.html">Notificaciones<img src="../images/dropotron_icons/alarm.png" alt="agenda" style="float:right"></a></li>
																				<li><a href="no-sidebar.html">Agenda<img src="../images/dropotron_icons/calendar.png" alt="agenda" style="float:right"></a></li>
																				<li><a href="no-sidebar.html">Perfil <img src="../images/dropotron_icons/avatar.png" alt="perfil" style="float:right"></a></li>
																				<li><a href="no-sidebar.html">Logout <img src="../images/dropotron_icons/logout.png" alt="perfil" style="float:right"></a></li>
																			</ul>


										</li>

										
									</ul>
								</nav>
								
		

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
							<h2>Vota hasta 5 dise&ntilde;os distintos</h2>
										
								<div id="main">
  
  							<input id="tab1" type="radio" name="tabs" checked>
  							<label for="tab1"><img src="../images/tab_icons/sweatshirt.png" alt=""> Buzo/Campera</label>
    						
  							<input id="tab2" type="radio" name="tabs">
  							<label for="tab2"><img src="../images/tab_icons/shirt.png" alt="">Remera</label>
    
  							<input id="tab3" type="radio" name="tabs">
  							<label for="tab3"><img src="../images/tab_icons/flag.png" alt="">Bandera</label>
    
    							<?php 
    									$mysqli = new mysqli("localhost","root","","egdo_pruebas");
    										if($mysqli->errno){
    											die("Error de conexion: ".$mysqli->error);
    										}
    							?>

  								<section id="content1">
    							
    								<!--<ul>
											<li><a href="../images/votacion_ropa/buzo_campera/mymodel.jpg" rel="lightbox"><img src="../images/votacion_ropa/buzo_campera/black_front.png" alt="" width="70" height="100" class="ropa"></a><p>Subido Por: Fulano</p><p>Calificacion: 0 <img src="../images/dropotron_icons/like.png" alt=""></p></li>
											<li><img src="../images/votacion_ropa/buzo_campera/purple_front.png" alt="" width="70" height="100" class="ropa"><p>Subido Por: Fulano</p><p>Calificacion: 2 <img src="../images/dropotron_icons/like.png" alt=""></p></li>
											<li><img src="../images/votacion_ropa/buzo_campera/black_front.png" alt="" width="70" height="100" class="ropa"><p>Subido Por: Fulano</p><p>Calificacion: 0 <img src="../images/dropotron_icons/like.png" alt=""></p></li>
											<li><img src="../images/votacion_ropa/buzo_campera/purple_front.png" alt="" width="70" height="100" class="ropa"><p>Subido Por: Fulano</p><p>Calificacion: 2 <img src="../images/dropotron_icons/like.png" alt=""></p></li>
											<li><img src="../images/votacion_ropa/buzo_campera/black_front.png" alt="" width="70" height="100" class="ropa"><p>Subido Por: Fulano</p><p>Calificacion: 0 <img src="../images/dropotron_icons/like.png" alt=""></p></li>
											<li><img src="../images/votacion_ropa/buzo_campera/purple_front.png" alt="" width="70" height="100" class="ropa"><p>Subido Por: Fulano</p><p>Calificacion: 2 <img src="../images/dropotron_icons/like.png" alt=""></p></li>
											<li><img src="../images/votacion_ropa/buzo_campera/black_front.png" alt="" width="70" height="100" class="ropa"><p>Subido Por: Fulano</p><p>Calificacion: 0 <img src="../images/dropotron_icons/like.png" alt=""></p></li>
											<li><img src="../images/votacion_ropa/buzo_campera/purple_front.png" alt="" width="70" height="100" class="ropa"><p>Subido Por: Fulano</p><p>Calificacion: 2 <img src="../images/dropotron_icons/like.png" alt=""></p></li>
											<li><img src="../images/votacion_ropa/buzo_campera/black_front.png" alt="" width="70" height="100" class="ropa"><p>Subido Por: Fulano</p><p>Calificacion: 0 <img src="../images/dropotron_icons/like.png" alt=""></p></li>
											<li><img src="../images/votacion_ropa/buzo_campera/purple_front.png" alt="" width="70" height="100" class="ropa"><p>Subido Por: Fulano</p><p>Calificacion: 2 <img src="../images/dropotron_icons/like.png" alt=""></p></li>
											<li><img src="../images/votacion_ropa/buzo_campera/purple_front.png" alt="" width="70" height="100" class="ropa"><p>Subido Por: Fulano</p><p>Calificacion: 2 <img src="../images/dropotron_icons/like.png" alt=""></p></li>
											<li><img src="../images/votacion_ropa/buzo_campera/black_front.png" alt="" width="70" height="100" class="ropa"><p>Subido Por: Fulano</p><p>Calificacion: 0 <img src="../images/dropotron_icons/like.png" alt=""></p></li>
											<li><img src="../images/votacion_ropa/remera/frontal.jpg" alt="" width="70" height="100" class="ropa"><p>Subido Por: Fulano</p><p>Calificacion: 2 <img src="../images/dropotron_icons/like.png" alt=""></p></li>
											<li><a href="../images/votacion_ropa/buzo_campera/mymodel.jpg" rel="lightbox"><img src="../images/votacion_ropa/buzo_campera/black_front.png" alt="" width="70" height="100" class="ropa"></a><p>Subido Por: Fulano</p><p>Calificacion: 0 <img src="../images/dropotron_icons/like.png" alt=""></p></li>
											<li><img src="../images/votacion_ropa/buzo_campera/purple_front.png" alt="" width="70" height="100" class="ropa"><p>Subido Por: Fulano</p><p>Calificacion: 2 <img src="../images/dropotron_icons/like.png" alt=""></p></li>
											<li><img src="../images/votacion_ropa/buzo_campera/black_front.png" alt="" width="70" height="100" class="ropa"><p>Subido Por: Fulano</p><p>Calificacion: 0 <img src="../images/dropotron_icons/like.png" alt=""></p></li>
											<li><img src="../images/votacion_ropa/buzo_campera/purple_front.png" alt="" width="70" height="100" class="ropa"><p>Subido Por: Fulano</p><p>Calificacion: 2 <img src="../images/dropotron_icons/like.png" alt=""></p></li>
											<li><img src="../images/votacion_ropa/buzo_campera/black_front.png" alt="" width="70" height="100" class="ropa"><p>Subido Por: Fulano</p><p>Calificacion: 0 <img src="../images/dropotron_icons/like.png" alt=""></p></li>
											<li><img src="../images/votacion_ropa/buzo_campera/purple_front.png" alt="" width="70" height="100" class="ropa"><p>Subido Por: Fulano</p><p>Calificacion: 2 <img src="../images/dropotron_icons/like.png" alt=""></p></li>
											<li><img src="../images/votacion_ropa/buzo_campera/black_front.png" alt="" width="70" height="100" class="ropa"><p>Subido Por: Fulano</p><p>Calificacion: 0 <img src="../images/dropotron_icons/like.png" alt=""></p></li>
											<li><img src="../images/votacion_ropa/buzo_campera/purple_front.png" alt="" width="70" height="100" class="ropa"><p>Subido Por: Fulano</p><p>Calificacion: 2 <img src="../images/dropotron_icons/like.png" alt=""></p></li>
											<li><img src="../images/votacion_ropa/buzo_campera/black_front.png" alt="" width="70" height="100" class="ropa"><p>Subido Por: Fulano</p><p>Calificacion: 0 <img src="../images/dropotron_icons/like.png" alt=""></p></li>
											<li><img src="../images/votacion_ropa/buzo_campera/purple_front.png" alt="" width="70" height="100" class="ropa"><p>Subido Por: Fulano</p><p>Calificacion: 2 <img src="../images/dropotron_icons/like.png" alt=""></p></li>
											<li><img src="../images/votacion_ropa/buzo_campera/purple_front.png" alt="" width="70" height="100" class="ropa"><p>Subido Por: Fulano</p><p>Calificacion: 2 <img src="../images/dropotron_icons/like.png" alt=""></p></li>
											<li><img src="../images/votacion_ropa/buzo_campera/black_front.png" alt="" width="70" height="100" class="ropa"><p>Subido Por: Fulano</p><p>Calificacion: 0 <img src="../images/dropotron_icons/like.png" alt=""></p></li>
											<li><img src="../images/votacion_ropa/remera/frontal.jpg" alt="" width="70" height="100" class="ropa"><p>Subido Por: Fulano</p><p>Calificacion: 2 <img src="../images/dropotron_icons/like.png" alt=""></p></li>
										</ul>-->

										<?php
											$qry = "select * from disenio as d join usuarios as u on d.id_usuario_subio = u.id_usuario where codigo_tipo = 1";

											$resultSetTipo1 = $mysqli->query($qry) or die($mysqli->error);

											if($resultSetTipo1){
													
													$cant_regs = $resultSetTipo1->num_rows;

												if($cant_regs == 0){
													echo "<p id=no-ul >No hay dise&ntilde;os subidos para esta votacion</p>";
												}else{
														
														while($reg = $resultSetTipo1->fetch_array(MYSQLI_ASSOC)){
															$varRegistros[] = $reg;
														}

														echo "<ul>";

														foreach($varRegistros as $unVar){
															echo "<li><a href=levantar_img_impresion.php?id_imp=".$unVar["id_disenio"]." rel='lightbox'><img src=levantar_img_frontal.php?id=".$unVar["id_disenio"]." "
    														."width='70' height='100' class='ropa'></a><p>Subido por: ".$unVar["nombre"]."</p><p>Calificacion: <span>".$unVar["cantidad_votos"]."</span> 
    														<img data-id=".$unVar["id_disenio"]." data-tipo=".$unVar["codigo_tipo"]." src=../images/dropotron_icons/like.png alt=''></p></li>";
														}

														echo "</ul>";
												}

											}else{
													echo "<p id=no-ul >Lo sentimos hubo un problema con el servidor.</p>";
											}
										?>
  								</section>
    
  								<section id="content2">
    									<?php
    										
    										
    										/*$qry = "select d.id_disenio, d.codigo_tipo, d.disenio_frontal, d.ancho_frontal, 
    										d.alto_frontal, d.nombre_imagen, d.tipo_frontal, d.disenio_impresion, d.ancho_impresion, 
    										d.alto_impresion, d.nombre_impresion, d.tipo_impresion, d.id_usuario_subio, 
    										u.nombre, count(voto) as votos from usuarios as u join disenio as d on 
    										u.id_usuario = d.id_usuario_subio  join votos on d.id_disenio = disenio_votado 
    										where d.codigo_tipo = 2 group by d.id_disenio"; */

    										$qry = "select * from disenio as d join usuarios as u on d.id_usuario_subio = u.id_usuario where codigo_tipo = 2";

    										
    										$resultSet = $mysqli->query($qry) or die($mysqli->error);
    										
    										if($resultSet){

    											$cant_regs = $resultSet->num_rows;
    											
    											if($cant_regs == 0){
    												
    												echo "<p id=no-ul>No hay dise&ntilde;os subidos para esta votacion.</p>";
    											
    											}else{
    													
    													while($registro = $resultSet->fetch_array(MYSQLI_ASSOC)){
    														$contenerRegistros[] = $registro;
    													}
    											
    													echo "<ul>";

    														foreach ($contenerRegistros as $unRegistro) {
    					
    														echo "<li><a href=levantar_img_impresion.php?id_imp=".$unRegistro["id_disenio"]." rel='lightbox'><img src=levantar_img_frontal.php?id=".$unRegistro["id_disenio"]." "
    														."width='70' height='100' class='ropa'></a><p>Subido por: ".$unRegistro["nombre"]."</p><p>Calificacion: <span>".$unRegistro["cantidad_votos"]."</span> 
    														<img data-id=".$unRegistro["id_disenio"]." data-tipo=".$unRegistro["codigo_tipo"]." src=../images/dropotron_icons/like.png alt=''></p></li>";
    														}
    												
    													echo "</ul>";	
    											}
    										}else{
    											echo "<p id=no-ul >Lo sentimos hubo un problema con el servidor.</p>";
    										}		


    									?>
  								</section>
    
  								<section id="content3">
    								<?php
    									$qry = "select * from disenio as d join usuarios as u on d.id_usuario_subio = u.id_usuario where codigo_tipo = 3";

    									$resultSetTipo2 = $mysqli->query($qry) or die($mysqli->error);

    									if($resultSetTipo2){
    										
    										$cant_regs = $resultSetTipo2->num_rows; 	

    											if($cant_regs == 0){
    													echo "<p id=no-ul>No hay dise&ntilde;os subidos para esta votacion.</p>";
													}else{
    													
    													while($reg2 = $resultsetTipo2->fetch_array(MYSQLI_ASSOC)){
    													$vector[] = $reg2; 
    													}
    										
    													echo "<ul>";

    														foreach ($vector as $var) {
    												
    															echo "<li><a href=levantar_img_impresion.php?id_imp=".$var["id_disenio"]." rel='lightbox'><img src=levantar_img_frontal.php?id=".$var["id_disenio"]." "
    															."width='70' height='100' class='ropa'></a><p>Subido por: ".$var["nombre"]."</p><p>Calificacion: <span>".$var["cantidad_votos"]."</span> 
    															<img data-id=".$var["id_disenio"]." data-tipo=".$var["codigo_tipo"]." src=../images/dropotron_icons/like.png alt=''></p></li>";
    														}

    													echo "</ul>";
    											}	
    										}else{
    											echo "<p id=no-ul >Lo sentimos hubo un problema con el servidor.</p>";
    										}
    									

    								?>
  								</section>
    
  								
    
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
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/skel-viewport.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>
			
	</body>
</html>