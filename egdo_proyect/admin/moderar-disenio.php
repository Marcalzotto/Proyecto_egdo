<!DOCTYPE HTML>
<!--
	Wide Angle by Pixelarity
	pixelarity.com @pixelarity
	License: pixelarity.com/license
-->
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>EGDO</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/mainAdmin.css" /> 
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<script type="text/javascript"  src="assets/js/jquery-1.12.3.js"></script>
		<script type="text/javascript"  src="assets/js/jquery-1.12.3.min.js"></script>
		
		<link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="../favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
		<link rel="manifest" href="../favicon/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">

		<!-- DataTables-->
		<script type="text/javascript"  src="assets/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript"  src="assets/js/configDatatables.js"></script>
		<link href="assets/css/datatables.min.css" rel="stylesheet" type="text/css">
		<link href="assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
		
		<!-- mejora tooltips-->
		<link rel="stylesheet" href="../css/hint.css-2.4.1/hint.min.css" />

	
	</head>
	<body class="no-sidebar">
		<div id="page-wrapper">

			<!-- Header Wrapper -->
				<div id="header-wrapper">

					<!-- Header -->
						<div id="header" class="container">

							<!-- Logo -->
								<h1 id="logo"><a href="admin-index.php"><img class="logo-img" src="assets/images/EGDO.png" alt=""/></a></h1>

							<?php
							include '../admin/menuAdminEgdo.php';
							?>

						</div>

				</div>

			<!-- Main Wrapper -->
				<div id="main-wrapper">

					<!-- Wide Content -->
						<section id="content" class="container">
							
							<h3>Control imagenes de Diseño</h3>
							
							<hr class="major"/>
							
							<div>
							
							<div class="">
									<table id="example" class="alt hover order-column" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>ID</th>
												<th>Codigo</th>
												<th>Diseño_Frontal</th>
												<th>Nombre_Imagen</th>
												<th>Diseño_impresion</th>
												<th>Nombre_Impresion</th>
												<th>Usuario_Subio</th>
												<th>Estado</th>
												<th>Moderar1</th>
												<th>Moderar2</th>
											</tr>
										</thead>
										<tbody>
		<?php
		require('config_bd.php');								
	
		$consulta = ("SELECT id_disenio,codigo_tipo,disenio_frontal,nombre_imagen,disenio_impresion,
		nombre_impresion,id_usuario_subio,estado_moderar FROM disenio ORDER BY id_disenio DESC");
		$result = mysqli_query($conexion, $consulta);
		if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)){
	
													
		?>
		
			<tr>
			<td><?php echo $row['id_disenio']; ?></td>
			<td><?php echo $row['codigo_tipo']; ?></td>
			<td><img class="mod-img-table" src="data:image/jpeg;base64,<?php echo base64_encode($row['disenio_frontal']); ?>"/></td>
			<td><?php echo $row['nombre_imagen']; ?></td>
			<td><img class="mod-img-table" src="data:image/jpeg;base64,<?php echo base64_encode($row['disenio_impresion']); ?>"/></td>
			<td><?php echo $row['nombre_impresion']; ?></td>
			<td><?php echo $row['id_usuario_subio']; ?></td>
			<td><?php echo $row['estado_moderar']; ?></td>
			<td>
				<a href="detalle-disenio.php?dis=<?php echo $id_protegido=base64_encode($row['id_disenio']);?>" class="edit-link" href="#" title="Detalles">
				<i class="fa fa-filter fa-lg" aria-hidden="true"></i>
				</a>
			</td>
			<td>
				<a href="detalle-disenio2.php?dis=<?php echo $id_protegido=base64_encode($row['id_disenio']);?>" class="edit-link" href="#" title="Detalles">
				<i class="fa fa-filter fa-lg" aria-hidden="true"></i>
				</a>
			</td>
			
			</tr>
		<?php
		}
		}
		else{echo"<tfoot><tr><td>0 results </td></tr></tfoot>";}
		//}
		mysqli_close($conexion);
		?>
										</tbody>
									</table>
								</div>
							</div>			
							
						</section>

				
				</div>

			<!-- Footer Wrapper -->
				<div id="footer-wrapper">

					<!-- Footer -->
						<div id="footer" class="container">
							<header>
								<h2>Seguinos en nuestras redes sociales</h2>
							</header>
							<p><i class="fa fa-envelope fa-lg" aria-hidden="true"></i>&nbsp; egdoweb@gmail.com</p>
							<ul class="contact">
								<li><a href="https://www.instagram.com/egdoweb/" class="icon fa-instagram"><span>Instagram</span></a></li>
								<li><a href="https://www.facebook.com/egdo.web" class="icon fa-facebook"><span>Facebook</span></a></li>
								<li><a href="https://twitter.com/WebEgdo" class="icon fa-twitter"><span>Twitter</span></a></li>
							</ul>
						</div>

					<!-- Copyright -->
						<div id="copyright" class="container">
							&copy; Egdo 2016.
						</div>

				</div> <!-- /Footer Wrapper -->

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