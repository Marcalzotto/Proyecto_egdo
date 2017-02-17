<?php include ("../../bloqueSeguridad.php");?>

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
		    <link rel="stylesheet" type="text/css" href="../assets/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="../assets/css/form-validation.css" /> 
 
			<script src="../js/modernizr.js"></script> <!-- Modernizr -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
			<script src="../js/mainModal.js"></script> <!-- Gem jQuery -->
	
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
			<!-- Main Wrapper  -->
				<div id="main-wrapper-ad">

					<!-- Wide Content -->
						<section id="content" class="container">
							
						<!--	<ul class="nav2">
								<li class="nav2-li"><a class="active" href="panel-index.html"> Mi Perfil</a></li>
								<li class="nav2-li"><a class="nav2-a" href="panel-search.html">Buscar</a></li>
								<li class="nav2-li"><a href="panel-mensaje.html" class="nav2-a">Mensaje</a></li>
								<li class="nav2-li"><a class="nav2-a" href="panel-empresas.html">Empresas</a></li>
								<li class="nav2-li"><a class="nav2-a" href="panel-search-empresa.html">Buscar Empresas</a></li>
								<li class="nav2-li"><a class="nav2-a" href="panel-info.html">Info Viajes</a></li>
								<li class="nav2-li"><a class="nav2-a" href="panel-moderar.html">Moderar</a></li>
							</ul>-->


							<div class="main-content"> <!-- main content -->

								<section id="content" class="container">
							<?php 
							$obtUsuario = $_SESSION['id_usuario'];
							$obt_curso = $_SESSION['curso'];
							//require_once("conexion.php");
							$host_db = "localhost";
							$user_db = "root";
							$pass_db = "";
							$db_name = "egdo_db";
							

							$conexion = new mysqli($host_db, $user_db, $pass_db,$db_name);

							if ($conexion->connect_error) {
							die("La conexion falló: " . $conexion->connect_error);
							}
							
							
							
							$verificarAdmin = "select * from usuario where id_usuario = '$obtUsuario' and id_curso = '$obt_curso'";
							$verificar = $conexion->query($verificarAdmin) or die($conexion->error);
							if($verificar){
								echo "<form id='pasarimagenes' class='form-validation' enctype='multipart/form-data' method='post' action='fiesta-2.php'>
                                 <fieldset>
									<div class='form-title-row'>
										<h1>Formulario Fiesta</h1>
									</div>

									<div class='form-row form-input-name-row'>

										<label>
											<span>Nombre</span>
											<input type='text' name='nombre' placeolder='Nombre' pattern='[A-Za-z]{2-16}' title='Debe escribir un nombre' required>
										</label>

										
									</div>
									
									<div class='form-row form-input-name-row'>

										<label>
											<span>Direcci&oacute;n</span>
											<input type='text' name='direccion' placeholder='Direccion' pattern=[A-Za-z][0-9] title='Debe escribir una direccion' required>
										</label>

									</div>

									<div class='form-row form-input-email-row'>

										<label>
											<span>Tel&eacute;fono</span>
											<input type='text' name='telefono' placeholder='Telefono' pattern='[0-9]{8}' title='Debe escribir un numero de telefono' required>
										</label>

									</div>

									<div class='form-row form-input-name-row'>

										<label>
											<span>Facebook</span>
                                     <input type='url' name='facebook' placeholder='http://www.facebook.com/nombreusuario' title='Debe escribir una url correcta, comenzando http://'>										</label>

									</div>

									<div class='form-row form-input-name-row'>

										<label>
											<span>Twitter</span>
									<input type='text' name='twitter' placeholder='twitter' pattern='^@?(\w){1,15}$' title='Este no es un usuario de twitter valido'>										</label>

									</div>

									<div class='form-row form-input-name-row'>

										<label>
											<span>Instagram</span>
											<input type='url' name='instagram' placeholder='http://www.instagram.com/nombreusuario' instagram'title='Debe escribir una url correcta, comenzando http://'>
										</label>

									</div>
									
									<div class='form-row form-input-name-row'>

										<label>
											<span>Web</span>
											<input type='url' name='web' placeholder='http://www.google.com'title='Debe escribir una url correcta, comenzando http://'>
										</label>

									</div>

                                    <div class='form-row form-input-name-row'>

										<label>
											<span>Detalles</span>
											<input type='text' name='detalles' placeholder='Detalles'pattern='[A-Za-z][0-9]' title='Debe ingresar algunos detalles adicionales que crea necesario' required>
										</label>

									</div>



									 <div class='form-row'>
                    <div class='form-radio-buttons'>

                        <span>Seleccione cual foto desea que sea de portada</span> 
                        <div>
                            <label>
                                    <span>Foto 1<input type='radio' name='fot' value='fot1'>
                           <input type='file' class='file_input' name='file'accept='image/*' title='Debe subir una imagen' required /> </span>
                            </label>
                        </div>

                        <div>
                            <label>
                                <span>Foto 2<input type='radio' name='fot' value='fot2'>
                                <input type='file' class='file_input' name='file' accept='image/*' title='Debe subir una imagen' /></span>
                            </label>
                        </div>

                    </div>
                </div>
								  

									<div class='form-row'>

										<input type='button' id='formFiesta' value='Enviar'/>

									</div>
                                </fieldset>
								</form>";

								}
							?>
							
						
</section>
								


							</div> <!-- /main content -->

						</section>

				</div>  <!--main wrapper-->

											

	

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
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/skel-viewport.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>

	</body>
</html>