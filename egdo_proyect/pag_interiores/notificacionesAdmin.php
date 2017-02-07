<?php include ("../bloqueSeguridad.php");?>
<?php include("conexion.php");?>
<?php include('funciones/obtener_mes.php');?>
<?php include('funciones/cantidad_notificaciones.php');?>
<?php include('funciones/add_extencion.php');?>
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
			<link rel="stylesheet" href="../css/styleTabs.css"><!--Tabs Style -->
			<!--<script type="text/javascript" src="../assets/js/jquery_min.js"></script>-->
			<!--<script type="text/javascript" src="../assets/js/slimbox2.js"></script>-->
			<!--Librarys for lightBox -->
			<script src="../js/modernizr.js"></script> <!-- Modernizr -->
			<script src="../js/jquery.min.js"></script>
			<!--<script type="text/javascript" src="../js/administrarVotacion.js"></script>-->
			
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
			<script src="../js/borrar_notificacion.js"></script>
		
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
						$resultSet = $conexion->query("select id_notificacion from notificaciones where curso_notificacion = '$_SESSION[curso]' and id_notificacion not in(
																					 select id_notificacion from notificacion_vista_por where usuario = '$_SESSION[id_usuario]' 
																					 and curso_notificacion = '$_SESSION[curso]');");
						$multi_insert = "";
						if($resultSet){
							if($resultSet->num_rows > 0){
								while($row = $resultSet->fetch_array(MYSQLI_ASSOC)){
									$ids[] = $row;
								}

								foreach ($ids as $id) {
									$multi_insert.="insert into notificacion_vista_por values('','$_SESSION[id_usuario]','$id[id_notificacion]',0,'$_SESSION[curso]');";
								}
								
								$multi_insert.="select count(id_notificacion) as cant from notificaciones where curso_notificacion = '$_SESSION[curso]' and id_notificacion not in(
																select id_notificacion from notificacion_vista_por where usuario = '$_SESSION[id_usuario]' 
																and curso_notificacion = '$_SESSION[curso]');";
								
								
								if ($conexion->multi_query($multi_insert)) {
    						
    							do{
        					/* almacenar primer juego de resultados */
        					if ($result = $conexion->store_result()) {
            				
            				while ($row = $result->fetch_row()){
                			
               				$cant_notificaciones = $row[0];
                			
            				}
            				$result->free();
        					}
        					/* mostrar divisor */
        						if ($conexion->more_results()) {
            				//printf("-----------------\n");
        						}
    							}while ($conexion->next_result());
								}
							//fin del algoritmo para multi consultas
							
							}else{
								$cant_notificaciones = 0;
							}
						}

							
						?>	
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

					<div id="contenerNotificaciones">
							
							<?php
								$resultSet = $conexion->query("select * from notificaciones n join notificacion_vista_por nvp on n.id_notificacion = nvp.id_notificacion where n.curso_notificacion = '$_SESSION[curso]' and nvp.usuario = '$_SESSION[id_usuario]' and nvp.borrada = 0 order by n.tipo_notificacion");
								if($resultSet){	
									if($resultSet->num_rows > 0){
										
										while($row = $resultSet->fetch_array(MYSQLI_ASSOC)) {
											$notificaciones[] = $row;
										}

										foreach ($notificaciones as $notificacion){
											
											$fecha_separar = split("-", $notificacion["fecha_hora"]);
											$aaaa = $fecha_separar[0];
											$mm = $fecha_separar[1];
											$dd = $fecha_separar[2];

											$mes_nombre = get_mes($mm);

											$tiempo = split(" ", $dd);
											$dia = $tiempo[0];
											$hora = $tiempo[1];

											$separar_hora = split(":", $hora);
											$horas = $separar_hora[0];
											$minutos = $separar_hora[1];

											$e = add_extension($notificacion["tipo_notificacion"],$_SESSION["id_rol"]);
											echo "<a href=".$notificacion['link'].$e."><img src=".$notificacion['icono']." alt='Remera disenios'>
											<p>".$notificacion['resumen']."</p><img src='../images/delete.png' class='del' rel=".$notificacion['id_notificacion']." u=".$_SESSION["id_usuario"]." alt='borrar notificacion' height='20' width='20'><p class='fecha'>".$dia." de ".$mes_nombre." a las ".$horas.":".$minutos." hs.</p></a>";
										}

									}else{
									echo "<h2>No tiene notificaciones pendientes</h2>";
									}
								}else{
									echo "Hubo un problema con el servidor, intente nuevamente mas tarde";
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