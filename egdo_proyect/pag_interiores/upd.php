<?php include ("../bloqueSeguridad.php");?>
<?php include("conexion.php");?>
<?php 
	include('funciones/generar_notificacion.php');
	generar_notificacion($conexion,$_SESSION["curso"]);
?>
<?php include('funciones/cantidad_notificaciones_mensajes.php');?>
<?php include('funciones/cantidad_notificaciones.php');?>


<?php
$verificarFecha = "select fecha_hora from evento where id_actividad = 2 and id_curso = $_SESSION[curso]"; 
if($result = $conexion->query($verificarFecha)){
	if($result->num_rows > 0){
		$reg = $result->fetch_array(MYSQLI_ASSOC);
		$fecha = $reg["fecha_hora"];
		$fechahoy = new DateTime();
		$fechaEvento = new DateTime($fecha);

		$intervalo = $fechahoy->diff($fechaEvento);
		$intervalA = $intervalo->y;
		$intervalM = $intervalo->m;
		$intervalD = $intervalo->d;
		
		if($intervalA > 0){
			header('location:upd-2.php');
		}else if($intervalM > 0){
			header('location:upd-2.php');
		}else if($intervalD >= 15){
			header('location:upd-2.php');
		}
	}
}else{
	die("Error al buscar la fecha");
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
		    <link rel="stylesheet" type="text/css" href="../css/demo.css" />
        <link rel="stylesheet" type="text/css" href="../css/form-validation.css" /> 
 
			<script src="../js/modernizr.js"></script> <!-- Modernizr -->
			<script src="../js/jquery.min.js"></script>
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
			<script src="../js/mainModal.js"></script> <!-- Gem jQuery -->
			<script src="../js/tomarDatos.js"></script>
			<script src="../js/iniciar_upd.js"></script>
			<script src="../js/validar_form_upd.js"></script>
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

								<!-- You only need this form and the form-validation.css -->
								<?php
								$buscarSiDisparoUPD = "select count(id_evento) as evento from evento where id_actividad = 2 and id_curso = $_SESSION[curso]";
 								if($result = $conexion->query($buscarSiDisparoUPD)){
 										$reg = $result->fetch_array(MYSQLI_ASSOC);
 										$evento = $reg["evento"];
 										if($evento == 1){
 							echo "<form id='form_upd' class='form-validation' enctype='multipart/form-data' method='post'> <!--debe ir a upd-2.php-->

									<div class='form-title-row'>
										<h1>Formulario UPD</h1>
									</div>

									<div class='form-row form-input-name-row'>

										<label>
											<span>Nombre(Requerido)</span>
											<input type='text' name='name' id='name'>
										
										</label>

										<!--
											Add these three elements to every form row. They will be shown by the
											.form-valid-data and .form-invalid-data classes (see the JS for an example).
										-->

										<span class='form-valid-data-sign'><i class='fa fa-check'></i></span>

										<span class='form-invalid-data-sign'><i class='fa fa-close'></i></span>
										<span class='form-invalid-data-info'></span>

									</div>
									
									<div class='form-row form-input-name-row'>

										<label>
											<span>Calle(Requerido)</span>
											<input type='text' name='calle' id='calle'>
										</label>

										<!--
											Add these three elements to every form row. They will be shown by the
											.form-valid-data and .form-invalid-data classes (see the JS for an example).
										-->

										<span class='form-valid-data-sign'><i class='fa fa-check'></i></span>

										<span class='form-invalid-data-sign'><i class='fa fa-close'></i></span>
										<span class='form-invalid-data-info'></span>

									</div>
									<div class='form-row form-input-name-row'>

										<label>
											<span>Altura(Requerido)</span>
											<input type='number' name='altura' id='altura'>
										</label>

										<!--
											Add these three elements to every form row. They will be shown by the
											.form-valid-data and .form-invalid-data classes (see the JS for an example).
										-->

										<span class='form-valid-data-sign'><i class='fa fa-check'></i></span>

										<span class='form-invalid-data-sign'><i class='fa fa-close'></i></span>
										<span class='form-invalid-data-info'></span>

									</div>

									<div class='form-row form-input-email-row'>

										<label>
											<span>Tel&eacute;fono(Requerido)</span>
											<input type='number' name='cell_phone' id='cell_phone'>
										</label>

										<span class='form-valid-data-sign'><i class='fa fa-check'></i></span>

										<span class='form-invalid-data-sign'><i class='fa fa-close'></i></span>
										<span class='form-invalid-data-info'></span>

									</div>

									<div class='form-row form-input-name-row'>

										<label>
											<span>Facebook(No Requerido)</span>
											<input type='text' name='face' id='face'>
										</label>

										<!--
											Add these three elements to every form row. They will be shown by the
											.form-valid-data and .form-invalid-data classes (see the JS for an example).
										-->

										<span class='form-valid-data-sign'><i class='fa fa-check'></i></span>

										<span class='form-invalid-data-sign'><i class='fa fa-close'></i></span>
										<span class='form-invalid-data-info'></span>

									</div>
									<div class='form-row form-input-name-row'>

										<label>
											<span>Twitter(No Requerido)</span>
											<input type='text' name='twitter' id='twitter'>
										</label>

										<!--
											Add these three elements to every form row. They will be shown by the
											.form-valid-data and .form-invalid-data classes (see the JS for an example).
										-->

										<span class='form-valid-data-sign'><i class='fa fa-check'></i></span>

										<span class='form-invalid-data-sign'><i class='fa fa-close'></i></span>
										<span class='form-invalid-data-info'></span>

									</div>
									<div class='form-row form-input-name-row'>

										<label>
											<span>Instagram(No Requerido)</span>
											<input type='text' name='insta' id='insta'>
										</label>

										<!--
											Add these three elements to every form row. They will be shown by the
											.form-valid-data and .form-invalid-data classes (see the JS for an example).
										-->

										<span class='form-valid-data-sign'><i class='fa fa-check'></i></span>

										<span class='form-invalid-data-sign'><i class='fa fa-close'></i></span>
										<span class='form-invalid-data-info'></span>

									</div>
									<div class='form-row form-input-name-row'>

										<label>
											<span>Web(No Requerido)</span>
											<input type='text' name='web_page' id='web_page'>
										</label>

										<!--
											Add these three elements to every form row. They will be shown by the
											.form-valid-data and .form-invalid-data classes (see the JS for an example).
										-->

										<span class='form-valid-data-sign'><i class='fa fa-check'></i></span>

										<span class='form-invalid-data-sign'><i class='fa fa-close'></i></span>
										<span class='form-invalid-data-info'></span>

									</div>

                                    <div class='form-row form-input-name-row'>

										<label>
											<span>Detalles(Requerido)</span>
											<textarea name='detalles' id='detalles' cols='10' rows='5'></textarea>
											<!--<input type='text' name='detalles' id='detalles'>-->
										</label>

										<!--
											Add these three elements to every form row. They will be shown by the
											.form-valid-data and .form-invalid-data classes (see the JS for an example).
										-->

										<span class='form-valid-data-sign'><i class='fa fa-check'></i></span>

										<span class='form-invalid-data-sign'><i class='fa fa-close'></i></span>
										<span class='form-invalid-data-info'></span>

									</div>



									 <div class='form-row'>
                    <div class='form-radio-buttons'>

                        <div>
                            <label>
                                    <span>Foto Perfil Lugar(Requerido)<input type='radio' name='name'>
                           <input type='file' class='file_input' name='file_perfil' id='file_perfil'/> 
													 <input type='hidden' name='name_foto_perfil' id='name_foto_perfil'/>
                           </span>
                            </label>
                        </div>

                        <div>
                            <label>
                                <span>Foto Lugar(Requerido)<input type='radio' name='name'>
                                <input type='file' class='file_input' name='file_lugar' id='file_lugar'/>
                                <input type='hidden' name='name_foto_lugar' id='name_foto_lugar'>
                                </span>
                            </label>
                        </div>

                    </div>
                </div>
								  

									<div class='form-row buttons'>

										<button type='submit'>Enviar</button>
										<input type='reset' value='borrar'>
										
									</div>
									<div class='form-row'>
									<a href='upd-2.php'>Ver los lugares propuestos</a> 
									</div>
								</form>";
							
 										}else{
 												$rol = $_SESSION["id_rol"];
												if($rol == 3){
													echo "<h2>El evento UPD aun no esta listo, debes esperar que el administador del curso lo inicie.</h2>";
												}else{
													echo "<h3>El evento UPD aun no inicio</h3>
	
														<button id='iniciar_upd' rel='2'>Iniciar Evento</button>

														<h3 class='respond'></h3>";
												}	
 										}
 								}else{
 									echo "<h2>Lo Sentimos hubo un errores inesperados, por favor intenta mas tarde.</h2>";
 								}
 								
								?>
									

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
			<script src="../js/jquery.min.js"></script>
			<script src="../js/jquery.dropotron.min.js"></script>
			<script src="../js/skel.min.js"></script>
			<script src="../js/skel-viewport.min.js"></script>
			<script src="../js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../js/main.js"></script>

	</body>
</html>