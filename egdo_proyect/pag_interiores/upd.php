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
		
		<!-- mejora tooltips-->
		<link rel="stylesheet" href="../css/hint.css-2.4.1/hint.min.css" />
		
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
	
	<style>
	
	input[type="text"],
	input[type="password"],
	input[type="email"],
	input[type="tel"],
	.select,
	textarea , 
	.form-class 
	{
		-moz-appearance: none;
		-webkit-appearance: none;
		-ms-appearance: none;
		appearance: none;
		background: rgba(144, 144, 144, 0.075);
		border-radius: 4px;
		border: none;
		border: solid 1px rgba(144, 144, 144, 0.25);
		color: inherit;
		display: block;
		outline: 0;
		padding: 0 1em;
		text-decoration: none;
		width: 100%;
		font:inherit;
	}

		input[type="text"]:invalid,
		input[type="password"]:invalid,
		input[type="email"]:invalid,
		input[type="tel"]:invalid,
		.select:invalid,
		textarea:invalid,
		.form-class :invalid
		{
			box-shadow: none;
		}

		input[type="text"]:focus,
		input[type="password"]:focus,
		input[type="email"]:focus,
		input[type="tel"]:focus,
		.select:focus,
		textarea:focus,
		.form-class :focus
		{
			border: solid 1px rgba(144, 144, 144, 0.25);
			border-color: solid 1px #5AA6ED;
			box-shadow: 0 0 0 1px #5AA6ED;
		}

	.select-wrapper {
		text-decoration: none;
		display: block;
		position: relative;
	}

		.select-wrapper:before {
			content: "?";
			-moz-osx-font-smoothing: grayscale;
			-webkit-font-smoothing: antialiased;
			font-family: FontAwesome;
			font-style: normal;
			font-weight: normal;
			text-transform: none !important;
		}

		.select-wrapper:before {
			color: rgba(144, 144, 144, 0.25);
			display: block;
			height: 2.75em;
			line-height: 2.75em;
			pointer-events: none;
			position: absolute;
			right: 0;
			text-align: center;
			top: 0;
			width: 2.75em;
		}

		.select-wrapper select::-ms-expand {
			display: none;
		}

	input[type="text"],
	input[type="password"],
	input[type="email"],
	select
	{
		height: 2.75em;
	}

	textarea {
		padding: 0.75em 1em;
	}

	input[type="checkbox"],
	input[type="radio"] {
		-moz-appearance: none;
		-webkit-appearance: none;
		-ms-appearance: none;
		appearance: none;
		display: block;
		float: left;
		margin-right: -2em;
		opacity: 0;
		width: 1em;
		z-index: -1;
	}

		input[type="checkbox"] + label,
		input[type="radio"] + label {
			text-decoration: none;
			color: #444;
			cursor: pointer;
			display: inline-block;
			font-size: 1em;
			font-weight: normal;
			padding-left: 2.4em;
			padding-right: 0.75em;
			position: relative;
		}

			input[type="checkbox"] + label:before,
			input[type="radio"] + label:before {
				-moz-osx-font-smoothing: grayscale;
				-webkit-font-smoothing: antialiased;
				font-family: FontAwesome;
				font-style: normal;
				font-weight: normal;
				text-transform: none !important;
			}

			input[type="checkbox"] + label:before,
			input[type="radio"] + label:before {
				background: rgba(144, 144, 144, 0.075);
				border-radius: 4px;
				border: solid 1px rgba(144, 144, 144, 0.25);
				content: '';
				display: inline-block;
				height: 1.65em;
				left: 0;
				line-height: 1.58125em;
				position: absolute;
				text-align: center;
				top: 0;
				width: 1.65em;
			}

		input[type="checkbox"]:checked + label:before,
		input[type="radio"]:checked + label:before {
			background: #5a5a5a;
			border-color: #5a5a5a;
			color: #ffffff;
			content: '\f00c';
		}

		input[type="checkbox"]:focus + label:before{
			border-color: #5AA6ED;
			box-shadow: 0 0 0 1px #5AA6ED;
		}

	input[type="checkbox"] + label:before {
		border-radius: 4px;
	}

	input[type="radio"] + label:before {
		border-radius: 100%;
	}

	::-webkit-input-placeholder {
		color: #666666 !important;
		opacity: 1.0;
	}

	:-moz-placeholder {
		color: #666666 !important;
		opacity: 1.0;
	}

	::-moz-placeholder {
		color: #666666 !important;
		opacity: 1.0;
	}

	:-ms-input-placeholder {
		color: #666666 !important;
		opacity: 1.0;
	}

	.formerize-placeholder {
		color: #666666 !important;
		opacity: 1.0;
	}
		/* Button */

	input[type="submit"],
	input[type="reset"],
	input[type="button"],
	button,
	.button {
		-moz-appearance: none;
		-webkit-appearance: none;
		-ms-appearance: none;
		appearance: none;
		-moz-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
		-webkit-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
		-ms-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
		transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
		background-color: #EF2F72;
		border-radius: 4px;
		border: 0;
		color: #ffffff !important;
		cursor: pointer;
		display: inline-block;
		font-weight: bold;
		height: 2.85em;
		line-height: 2.95em;
		padding: 0 1.5em;
		text-align: center;
		text-decoration: none;
		white-space: nowrap;
	}

		input[type="submit"]:hover,
		input[type="reset"]:hover,
		input[type="button"]:hover,
		button:hover,
		.button:hover {
			background-color: #a60c42;
		}

		input[type="submit"]:active,
		input[type="reset"]:active,
		input[type="button"]:active,
		button:active,
		.button:active {
			background-color: #4d4d4d;
		}

		input[type="submit"].icon,
		input[type="reset"].icon,
		input[type="button"].icon,
		button.icon,
		.button.icon {
			padding-left: 1.35em;
		}

			input[type="submit"].icon:before,
			input[type="reset"].icon:before,
			input[type="button"].icon:before,
			button.icon:before,
			.button.icon:before {
				margin-right: 0.5em;
			}

		input[type="submit"].big,
		input[type="reset"].big,
		input[type="button"].big,
		button.big,
		.button.big {
			font-size: 1.35em;
		}

		input[type="submit"].special,
		input[type="reset"].special,
		input[type="button"].special,
		button.special,
		.button.special {
			background-color:#60B822; /*#5AA6ED;*/
			color: #ffffff !important;
		}

			input[type="submit"].special:hover,
			input[type="reset"].special:hover,
			input[type="button"].special:hover,
			button.special:hover,
			.button.special:hover {
				background-color: #448118;
			}

			input[type="submit"].special:active,
			input[type="reset"].special:active,
			input[type="button"].special:active,
			button.special:active,
			.button.special:active {
				background-color: #439aea;
			}

		input[type="submit"].disabled, input[type="submit"]:disabled,
		input[type="reset"].disabled,
		input[type="reset"]:disabled,
		input[type="button"].disabled,
		input[type="button"]:disabled,
		button.disabled,
		button:disabled,
		.button.disabled,
		.button:disabled {
			background-color: #444 !important;
			box-shadow: inset 0 -0.15em 0 0 rgba(0, 0, 0, 0.15);
			color: #fff !important;
			cursor: default;
			opacity: 0.25;
		}
	.upd-link {color: #EF2F72;
	font-family: 'Open Sans Condensed',sans-serif;
	font-size: 1.5em;
	font-weight: 900;
	}
	
	</style>
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
				<div id="main-wrapper">

					<!-- Wide Content -->
						<section id="content" class="container">
						
						<div class="row"> <!-- Row Principal -->
							<section class="12u 12u$">
									<header>
										<h2>Formulario UPD</h2>
									</header>
									
							<div class="12u 12u$(medium)"> <!-- Sec Datos Empresa -->

								<!-- You only need this form and the form-validation.css -->
								<?php
								$buscarSiDisparoUPD = "select count(id_evento) as evento from evento where id_actividad = 2 and id_curso = $_SESSION[curso]";
 								if($result = $conexion->query($buscarSiDisparoUPD)){
 										$reg = $result->fetch_array(MYSQLI_ASSOC);
 										$evento = $reg["evento"];
 										if($evento == 1){
 							echo "<form id='form_upd' enctype='multipart/form-data' method='post'> <!--debe ir a upd-2.php-->

							<div class='row uniform 50%'>
							<!-- Break -->
							<div class='-1u 3u'><span>Nombre(Requerido) </span></div>
							<div class='-1u 4u$'>
							<input type='text' class='form-class' name='name' id='name'>
							</div>
							
							<!-- Break -->
							<div class='-1u 3u'><span>Calle(Requerido) </span></div>
							<div class='-1u 4u$'>
							<input type='text' class='form-class' name='calle' id='calle'>
							</div>
							
							<!-- Break -->
							<div class='-1u 3u'><span>Altura (Requerido) </span></div>
							<div class='-1u 4u$'>
							<input type='number' class='form-class' name='altura' id='altura'>
							</div>
							
							<!-- Break -->
							<div class='-1u 3u'><span>Tel&eacute;fono(Requerido) </span></div>
							<div class='-1u 4u$'>
							<input type='number' class='form-class' name='cell_phone' id='cell_phone'>
							</div>
							
							<!-- Break -->
							<div class='-1u 3u'><span>Facebook(No Requerido) </span></div>
							<div class='-1u 4u$'>
							<input type='text' class='form-class' name='face' id='face'>
							</div>
							
							<!-- Break -->
							<div class='-1u 3u'><span>Twitter(No Requerido) </span></div>
							<div class='-1u 4u$'>
							<input type='text' class='form-class' name='twitter' id='twitter'>
							</div>
							
							<!-- Break -->
							<div class='-1u 3u'><span>Instagram(No Requerido) </span></div>
							<div class='-1u 4u$'>
							<input type='text' class='form-class' name='insta' id='insta'>
							</div>
							
							<!-- Break -->
							<div class='-1u 3u'><span>Web(No Requerido)</span></div>
							<div class='-1u 4u$'>
							<input type='text' class='form-class' name='web_page' id='web_page'>
							</div>
							
							<!-- Break -->
							<div class='-1u 3u'><span>Detalles(Requerido)</span></div>
							<div class='-1u 4u$'>
							<textarea class='form-class' name='detalles' id='detalles' cols='10' rows='3'></textarea>
							</div>
							
							<!-- Break -->
							<div class='-1u 3u'><span>Foto Perfil Lugar(Requerido)</span></div>
							<div class='-1u 4u$'>
							<input type='file' class='file_input' name='file_perfil' id='file_perfil'/> 
							<input type='hidden' name='name_foto_perfil' id='name_foto_perfil'/>
							</div>
							
							<!-- Break -->
							<div class='-1u 3u'><span>Foto Lugar(Requerido)</span></div>
							<div class='-1u 4u$'>
							<input type='file' class='file_input' name='file_lugar' id='file_lugar'/>
                            <input type='hidden' name='name_foto_lugar' id='name_foto_lugar'>
							</div>
                            
							<div class='-4u 8u$'>
							<button type='submit' class='button special icon fa fa-floppy-o'>Enviar</button>
							<input type='reset' class='button special icon fa fa-floppy-o' value='borrar'>
							</div>		
							
							<div class='-4u 8u$'>
							<a href='upd-2.php' class='upd-link'>Ver los lugares propuestos</a> 
							</div>
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
									
							</div> <!-- Sec Datos Empresa -->
							
						</section>
						</div> <!-- /Row Principal -->
						
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