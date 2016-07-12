<!DOCTYPE html>
<!--
	
	Wide Angle by Pixelarity
	pixelarity.com @pixelarity
	License: pixelarity.com/license
-->
<html class="not-ie no-js" lang="en">
	<head>
		
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,300italic,400,500,700%7cCourgette%7cRaleway:400,700,500%7cCourgette%7cLato:700' rel='stylesheet' type='text/css'>
		
		<!-- Basic Page Needs
		================================================== -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		
		<title>EGDO</title>
		<!-- Google Web Fonts
		================================================== -->
		
		
		<!--<meta charset="utf-8" /> -->
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../assets/css/main.css" /> 
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		
		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<!-- CSS
		================================================== -->
		<link rel="stylesheet" href="../assets/css/tmm_form_wizard_style_demo.css" />
		<link rel="stylesheet" href="../assets/css/grid.css" />
		<link rel="stylesheet" href="../assets/css/tmm_form_wizard_layout.css" />
		<link rel="stylesheet" href="../assets/css/fontello.css" />
		
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
		
	</head>
	<body class="no-sidebar">
		<div id="page-wrapper">

			<!-- Header Wrapper -->
				<div id="header-wrapper">

					<!-- Header -->
						<div id="header" class="container">

							<!-- Logo -->
								<h1 id="logo"><a href="../index.php"><img class="egdo-logo-register" src="../assets/images/EGDO.png" alt=""></a></h1>

							<!-- Nav Elimado-->
								
						</div>

					</div>

			<!-- Main Wrapper -->
				
					<!-- Wide Content -->
						

			<!-- - - - - - - - - - - - - Content - - - - - - - - - - - - -  -->


		<div id="contents">

			<div class="form-container">

				<div id="tmm-form-wizard" class="containers substrate"> <!--container substrate-->

				<div class="rows">
						<div class="col-xs-12">
							<h2 class="form-login-heading">Segui los pasos,<span> registrate y registra tu curso</span></h2>
						</div>

					</div><!--/ .row-->

				

						

					</div><!--/ .row-->

					<div class="rows">

						<div class="col-xs-12">

							<div class="form-header">
								<div class="form-title form-icon title-icon-lock">
									<b><i class="fa fa-lock" aria-hidden="true"></i> Tus datos </b> 
								</div>
								<div class="steps">
									Paso 1 - 4
								</div>
							</div><!--/ .form-header-->

						</div>

					</div><!--/ .row-->

<?php
    // Arrays para guardar errores:
    $aErrores = array();

    // Patrón para usar en expresiones regulares (admite letras acentuadas, numeros y espacios):
    $patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ0123456789\s]+$/";
	// Patrón para usar en expresiones regulares (admite solo numeros):
	$patron_num = "/^[[0-9\s]+$/";

    // Comprobar si se ha enviado el formulario:
    if( !empty($_POST) )
    {
			//función trim que se encarga de eliminar los espacios en blanco 
			//función mysql_real_escape_string para evitar las inyecciones sql 
			//htmlentities para xss 
			$nombre_escuela = trim(htmlentities(mysql_real_escape_string($_POST["nombre_escuela"])));
			$localidad = trim(htmlentities(mysql_real_escape_string($_POST["localidad"])));
			$cant_alumnos = trim(htmlentities(mysql_real_escape_string($_POST["cant_alumnos"])));
			$curso_anio = $_POST["curso_anio"];
			$curso_letra = $_POST["curso_letra"];
			
			//Establecemos zona horaria para obtener fecha
			date_default_timezone_set('America/Argentina/Buenos_Aires');
			$fecha_creacion = date("Y-n-d-H-i-s");

		
					echo "FORMULARIO RECIBIDO:<br/>";
					echo "====================<p/>";

					// Mostrar la información recibida del formulario:

					echo "Nombre  de escuela: ".$nombre_escuela."<br/>";
					echo "Localidad: ".$localidad."<br/>";
					echo "Curso-anio: ".$curso_anio."<br/>";
					echo "Curso-letra: ".$curso_letra."<br/>";
					echo "Cantidad de alumnos: ".$cant_alumnos."<br/>";
					echo "Fecha de creacion: ".$fecha_creacion."<br/>";
					echo "====================<p/>";
	
					// Comprobar si llenaron los campos requeridos:
					if( isset($nombre_escuela) && isset($localidad)&& isset($curso_anio)&& isset($curso_letra)&& isset($cant_alumnos) )
					{
						// Nombre:
						if( empty($nombre_escuela) )
							$aErrores[] = "- Debe completar el campo Nombre de escuela.";
						else
						{
							// Comprobar mediante una expresión regular, que sólo contiene letras y espacios:
							if( !preg_match($patron_texto, $nombre_escuela) )
								$aErrores[] = "- El campo Nombre de escuela solo puede contener letras, numeros y espacios";
							else 
							{
								// Comprobar que no supere cantidad maximo de caracteres:
								if(strlen($nombre_escuela) > 100)
								$aErrores[] = "- El campo Nombre de escuela no puede contener mas de 100 caracteres";
							}
						}

						// Apellidos:
						if( empty($localidad) )
							$aErrores[] = "- Debe completar el campo localidad";
						else
						{
							// Comprobar mediante una expresión regular, que sólo contienen letras, numeros y espacios:
							if( !preg_match($patron_texto, $localidad) )
								$aErrores[] = "- El campo localidad solo puede contener letras, numeros y espacios";
							else 
							{
								// Comprobar que no supere cantidad maximo de caracteres:
								if(strlen($localidad) > 70)
								$aErrores[] = "- El campo localidad no puede contener mas de 70 caracteres";
							}
						}
						
						//Cantidad de alumnos
						if( empty($cant_alumnos) )
							$aErrores[] = "- Debe completar el campo Cantidad de alumnos";
						else
						{
							// Comprobar mediante una expresión regular, que sólo contiene numeros:
							if( !preg_match($patron_num, $cant_alumnos) )
								$aErrores[] = "- El campo Cantidad de alumnos solo puede contener numeros";
							else 
							{
								// Comprobar que no supere cantidad maxima:
								if(($cant_alumnos < 0) || ($cant_alumnos > 70))
									$aErrores[] = "- El campo cantidad de alumnos debe ser mayor a 0 y menor a 70";
							}
						}

					}
					else
					{
						echo "<p>No se han completado todos los campos.</p>";
					}

					// Si han habido errores se muestran, sino continua al siguiente paso
					if( count($aErrores) > 0 )
					{
						echo "<p>ERRORES ENCONTRADOS:</p>";

						// Mostrar los errores:
						for( $contador=0; $contador < count($aErrores); $contador++ )
							echo $aErrores[$contador]."<br/>";
							echo "<p><a href='registroPaso2.php'>Volver y completar nuevamente</a></p>";
					}
					else
					{		
							//Validado los campos se inserta los datos a la base y se redirecciona al paso 3
					
							
							 $host_db = "localhost";
							 $user_db = "root";
							 $pass_db = "";
							 $db_name = "egdo_db";
							 $tbl_name = "usuario";

							 $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

							 if ($conexion->connect_error) {
							 die("La conexion falló: " . $conexion->connect_error);
							}
						
							 
								 $query = "INSERT INTO curso (nombre_escuela,localidad,curso_anio,curso_letra,cant_alumnos,fecha_creacion)
									VALUES ('$nombre_escuela','$localidad','$curso_anio','$curso_letra','$cant_alumnos','$fecha_creacion')";

								 if (!mysqli_query($conexion, $query)){
									 echo "<script language='JavaScript'>
											alert('Error al crear curso, cargue nuevamente los datos!');
											</script>"; 
									 die('Error: ' . mysqli_error());
									 mysqli_close($conexion);
									 header('Location: registroPaso2.php');
								 }
								 else {
								 
									 mysqli_close($conexion);
									 echo ("<script>location.href='registroPaso3.php?cant_alumnos=	$cant_alumnos'</script>");
									 // atado con alambreeeeee!!!!!!! ver con rusty!!!!!!!!!!
									 //header('Location: registroPaso3.php');
								 }
							 			
					}
    }
    else
    {
        echo "<p>No se ha enviado el formulario.</p>";
		echo "<p><a href='registroPaso2.php'>volver</a></p>";
    }


?>


				</div><!--/ .container-->
				
			</div><!--/ .form-container-->

		</div><!--/ #content-->
	

		<!-- - - - - - - - - - - - end Content - - - - - - - - - - - - - -->


		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>-->

		<!--[if lt IE 9]>
				<script src="js/respond.min.js"></script>
		<![endif]-->
		
		<!--<script src="js/tmm_form_wizard_custom.js"></script>-->
						
						
			

			<!-- Footer Wrapper -->
					<div id="footer-wrapper" class="footer-main-color">

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