<?php include ("../bloqueSeguridad.php");?>
<?php include('../pag_interiores/conexion.php');?>
<?php 
include('../pag_interiores/funciones/generar_notificacion.php');
generar_notificacion($conexion,$_SESSION["curso"]);
?>
<?php include('../pag_interiores/funciones/cantidad_notificaciones.php');?>
<?php include('../pag_interiores/funciones/cantidad_notificaciones_mensajes.php');?>
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
        <link rel="stylesheet" type="text/css" href="../css/style.css" /> 
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
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
			<script src="../js/mainModal.js"></script> <!-- Gem jQuery -->
			<script src="../js/tomarDatos.js"></script>
			
			<!-- DataTables-->
			<script type="text/javascript"  src="assets/js/jquery.dataTables.min.js"></script>
			<script type="text/javascript"  src="assets/js/configDatatables.js"></script>
			<link href="assets/css/datatables.min.css" rel="stylesheet" type="text/css">
			<link href="assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
			
				
			<!-- estilos Mensajes-->	
			<link rel="stylesheet" href="../css/mensajes.css" />
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
					<section id="content" class="container">
							
							<h3>Mensaje de Usuarios</h3>
							
							<hr class="major"/>
							
							<div class="row uniform"> <!-- sub cabecera -->
								
								<div class="12u">
									<a href="../mensajes/listarAdminCurso.php" class="button button-big adds">
										<i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Ver Mensajes
									</a>
									<a href="../mensajes/crearAdminCurso.php" class="button button-big adds">
										<i class="fa fa-pencil-square" aria-hidden="true"></i>&nbsp;Crear Mensajes
									</a>
								</div>
							
							</div> <!-- /sub cabecera -->
							
							<hr class="major"/> <!-- /sub cabecera --></br>
		<?php 

		# Obtenemos el id del mensaje
		$id = $_GET['id_mensaje'];

		# Se coloca como leido
		$sql = "UPDATE mensajes_privado SET leido=1 WHERE id_mensaje='".$id."'";
		$conexion->query($sql) or die($conexion->error);

		# Se busca mensaje
		//$sql = "SELECT * FROM mensajes_privado WHERE id_receptor='".$_SESSION['id_usuario']."' and id_mensaje='".$id."'";
		$sql = "SELECT A.nombre, A.apellido, T.* FROM usuario A INNER JOIN mensajes_privado T ON A.id_usuario=T.id_emisor WHERE T.id_receptor='".$_SESSION['id_usuario']."' and id_mensaje='".$id."'";

		$res = $conexion->query($sql) or die($conexion->error);
		$row = $res->fetch_array(MYSQLI_ASSOC);
		?>
		
		<div class="table-wrapper">
			<table class="segMsj" cellspacing="0" width="100%">
					<thead>
						<tr>
						<th></th>
						<th>De:</th>
						<th>Asunto</th>
						<th>Fecha</th>
						<th>Mensaje</th>
						<th>Responder</th>
						</tr>
					</thead>
			<tbody>
								
			<tr>
				<td>
					<i class="fa fa-envelope-o fa-2x" aria-hidden="true"></i>
				</td>
				<td>
					<i class="fa fa-user" aria-hidden="true"></i>&nbsp;<?php echo $row['nombre']; ?> <?php echo $row['apellido']; ?> 
				</td>
				<td>
					<i class="fa fa-long-arrow-right" aria-hidden="true"></i>&nbsp;<?php echo $row['asunto']; ?>
				</td>
				<td>
					<i class="fa fa-calendar-o" aria-hidden="true"></i>&nbsp;<?php echo $row['fecha_hora']; ?>
				</td>
				<td>
					<?php echo $row['mensaje']; ?>
				</td>
				<td>
					<a href="responderAdminCurso.php?respMsj=<?php echo $id_protegido=base64_encode($row['id_mensaje']);?>" class="button fit" title="Eliminar">
					<i class="fa fa-reply" aria-hidden="true"></i>&nbsp;Responder
					</a>
				</td>
			</tr>
								
			</tbody>
			</table>					
		</div>
		
					</section>

				</div>


			</div>	
				
				<!-- Footer Wrapper -->
				<div id="footer-wrapper">

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