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
		<script type="text/javascript" src="assets/js/jquery-1.11.1.js"></script>
		<!-- Jquery Validate -->
		<script type="text/javascript" src="assets/js/jquery.js"></script>
		<script type="text/javascript" src="assets/js/jquery.validate.js"></script>
		<script type="text/javascript" src="assets/js/additional-methods.js"></script>
		<script type="text/javascript" src="assets/js/functionEditEmpresa.js"></script>
		
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

			<!-- Main Wrapper -->
				<div id="main-wrapper">
					
					<!-- Wide Content -->
						<section id="intro" class="container">
							
							<div class="row"> <!-- Row Principal -->
								<section class="12u 12u">
									<header>
										<h2>Registro Empresas</h2>
									</header>
									<hr class="major"/>
									
									<div class="row uniform">
										<div class="12u">
											<a href="empresa.php" class="button button-big ver"><i class="fa fa-eye fa-fw" aria-hidden="true"></i>&nbsp;Ver Empresas</a>
											<hr class="major"/>
										</div>
										
										<div class="12u"> 
											<div id="error" class=""> </div>
										</div>
									
									</div>
									<?php
										
										require('config_bd.php');
										$id_empresa=base64_decode($_GET['emp']);
										if(filter_var($id_empresa, FILTER_VALIDATE_INT) === false){  
											echo 'Valor incorrecto';  
										}else{  
											
											//if($_GET['idempresa']>0){
											$consulta = ("SELECT * FROM empresa WHERE id_empresa='$id_empresa'");
											$result = $conexion ->query($consulta);
											if ($result->num_rows >0) {
												while($row = $result->fetch_assoc()){
													
									?>
									<div class="12u 12u$(medium)"> <!-- Sec Datos Empresa -->
									<!-- form start -->
									<form role="form" id="edit-empresa" autocomplete="off" method="post" enctype="multipart/form-data">
									<!--<div class="grid-demo">-->
									<div class="row uniform 50%">	
										<!-- Break -->
										<input type='hidden' name='emp' value='<?php echo $id_protegido=base64_encode($row['id_empresa']); ?>'/>
										<!-- Break -->
										<div class="-4u 4u$">
										<img class="logo-size" src="data:image/jpeg;base64,<?php echo base64_encode($row['logo']); ?>" />
										</div>
										<!-- Break -->
										<div class="-1u 2u"><span>Nombre Empresa</span></div>
										<div class="-1u 5u$"><span><input type='text' name='emp_name' class="form-class" placeholder='Nombre' value='<?php echo $row['nombre_empresa']; ?>'/></span>
										</div>
										<!--<div class="4u"><label></span></div> -->
										<!-- Break -->
										<div class="-1u 2u"><span>Cuit Empresa</span></div>
										<div class="-1u 5u$"><span><input type='text' name='emp_cuit' class="form-class" placeholder='11-11111111-1' value='<?php echo $row['cuit']; ?>'/></span></div>
										<!-- Break -->
										<div class="-1u 2u"><span>Calle </span></div>
										<div class="-1u 5u$"><span><input type='text' name='emp_calle' class="form-class" placeholder='Calle' value='<?php echo $row['calle']; ?>'/></span></div>
										<!-- Break -->
										<div class="-1u 2u"><span>Tel&eacute;fono </span></div>
										<div class="-1u 5u$"><span><input type='text' name='emp_tel' class="form-class" placeholder='11-1111-1111' value='<?php echo $row['telefono']; ?>'/></span></div>
										<!-- Break -->
										<div class="-1u 2u"><span>Email </span></div>
										<div class="-1u 5u$"><span><input type='text' name='emp_mail' class="form-class" placeholder='empresa@empresa.com' value='<?php echo $row['email']; ?>'/></span></div>
										<!-- Break -->
										<div class="-1u 2u"><span>P&aacute;gina Web </span></div>
										<div class="-1u 5u$"><span><input type='text' name='emp_www' class="form-class" placeholder='https://www.empresa.com/' value='<?php echo $row['pagina_web']; ?>'/></span></div>
										<!-- Break -->
										<div class="-1u 2u"><span>Facebook </span></div>
										<div class="-1u 5u$"><span><input type='text' name='emp_face' class="form-class" placeholder='https://www.facebook.com/' value='<?php echo $row['facebook']; ?>'/></span></div>
										<!-- Break -->
										<div class="-1u 2u"><span>Twitter </span></div>
										<div class="-1u 5u$"><span><input type='text' name='emp_twit' class="form-class" placeholder='https://twitter.com/' value='<?php echo $row['twitter']; ?>'/></span></div>
										<!-- Break -->
										<div class="-1u 2u"><span>Instagram </span></div>
										<div class="-1u 5u$"><span><input type='text' name='emp_inst' class="form-class" placeholder='https://www.instagram.com/' value='<?php echo $row['instagram']; ?>'/></span></div>
										<!-- Break -->
										<div class="-1u 2u"><span>Logo </span></div>
										<div class="-1u 5u$"><input type="file" name='imagen' id='imagen' class="form-class"/></div>
										<!-- Break -->
										<div class="-2u 8u$">
											<button type="submit" class="button special icon fa fa-floppy-o" name="btn-save" id="btn-save">
											Guardar Registro
											</button>
										</div>
								    <?php
										}
										}
										}
										//}
										$conexion->close();	
											
									?>
									</div>
									<!--</div> -->
									</form>
										
								</div> <!-- /Sec Datos Empresa -->
								
								</section>
								
								
								
								
							</div> <!-- /Row Principal -->
							
							
						</section> <!-- Wide Content -->

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