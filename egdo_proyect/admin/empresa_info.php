<!DOCTYPE HTML>
<!--
	Wide Angle by Pixelarity
	pixelarity.com @pixelarity
	License: pixelarity.com/license
-->
<html>
	<head>
		<title>EGDO</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/mainAdmin.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!-- animate css -->
		<link rel="stylesheet" href="assets/css/animate.css" />
		
		<link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="../favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
		<link rel="manifest" href="favicon/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
		
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
			<?php
										
			require('config_bd.php');
			$id_empresa=base64_decode($_GET['emp_det']);
			//$id_empresa=10;
			if(filter_var($id_empresa, FILTER_VALIDATE_INT) === false){  
				echo 'Valor incorrecto';  
			}else{  
				
				//if($_GET['idempresa']>0){
				$consulta = ("SELECT nombre_empresa,telefono,calle,email,pagina_web,facebook,twitter,
							instagram,cuit,logo FROM empresa WHERE id_empresa='$id_empresa'");
				$result = mysqli_query($conexion, $consulta);
				if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)){
				
			?>
			
			
			<!-- Main Wrapper -->
				<div id="main-wrapper">

					<!-- Wide Content -->
						<div id="intro" class="container"> <!--<section id="content" class="container"> -->
										
							<div class="row"> <!-- row -->
									
									<section class="4u 12u(mobile)"> <!-- img logo -->
										<header>
											<h2>
												<span class="inf-header"> 
													<a href="<?php echo $row['pagina_web']; ?>" title="Link"><i class="fa fa-external-link icon-header" aria-hidden="true"></i>&nbsp;<?php echo $row['nombre_empresa']; ?></a>
												</span>
											</h2>
										</header>
										
										<div class="row 0%">
											<div class="-2u 2u">
												<img class="item animated flipInY" src="data:image/jpeg;base64,<?php echo base64_encode($row['logo']); ?>" alt="Logo"/>
											</div>
										</div>
									
									</section> <!--/img logo -->
									
									
									
									<section class="8u 12u(mobile)"><!-- seccion info -->
										<div class="row uniform 25%">
										<!-- Break -->
										<div class="6u">
											<i class="fa fa-map-marker fa-lg icon-circle" aria-hidden="true"></i>&nbsp;
											<span class="inf">Dónde estamos?</span>
										</div>
										<!-- Break -->
										<div class="6u$">
											<i class="fa fa-user fa-lg icon-circle" aria-hidden="true"></i>&nbsp;
											<span class="inf">CUIT EMPRESA</span>
										</div>
										<!-- Break -->
										<div class="6u">
											<span><?php echo $row['calle']; ?>&nbsp;&nbsp
											</span>
										</div>
										<!-- Break -->
										<div class="6u$">
											<span><?php echo $row['cuit']; ?></span>
										</div>
										<!-- Break -->
										<div class="12u$">
											<hr class="major"/>
										</div>
										
										<!-- Break -->
										<div class="6u">
											<i class="fa fa-phone fa-lg icon-circle" aria-hidden="true"></i>&nbsp;
											<span class="inf">Llamanos!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
										</div>
										<!-- Break -->
										<div class="6u$">
											<i class="fa fa-at fa-lg icon-circle" aria-hidden="true"></i>&nbsp; 
											<span class="inf">Contactanos!</span>
										</div>
										<!-- Break -->
										<div class="6u"> <!-- Llamanos! telefono -->
											<span><?php echo $row['telefono']; ?></span>
										</div>
										<!-- Break -->
										<div class="6u$"> <!-- Contactanos! email -->
											<span><?php echo $row['email']; ?></span>
										</div>
										<!-- Break -->
										<div class="12u$">
											<hr class="major"/>
										</div>
										<!-- Break -->
										<div class="6u$">
											<i class="fa fa-thumbs-o-up fa-lg icon-circle" aria-hidden="true"></i>&nbsp;
											<span class="inf">Seguinos!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
										</div>
										<!-- Break -->
										<div class="6u">
												<i class="fa fa-facebook-official fa-lg icon-redes" aria-hidden="true"></i>&nbsp; <span class="inf-redes"><?php echo $row['facebook']; ?></span> <!-- face -->
										</div>
										<!-- Break -->
										<div class="6u$">
											<i class="fa fa-twitter-square fa-lg icon-redes" aria-hidden="true"></i>&nbsp;
											<span class="inf-redes"><?php echo $row['twitter']; ?></span> <!-- twitter -->
										</div>
										<!-- Break -->
										<div class="12u$">
											<i class="fa fa-instagram fa-lg icon-redes" aria-hidden="true"></i>&nbsp;
											<span class="inf-redes"><?php echo $row['instagram']; ?></span> <!-- instagram -->
										</div>
										</div>
									</section> <!-- /seccion info -->
							
						    </div> <!-- /row -->
						
						</div> <!-- final <section id="content" class="container"> -->

				</div> <!-- /Main Wrapper -->
			 <?php
				}
				}
				}
				//}
				mysqli_close($conexion);
			?>
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