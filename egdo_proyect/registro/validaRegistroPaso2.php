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
		<link rel="stylesheet" href="../css/mainAdmin.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		
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
								<h1 id="logo">
									<a href="../index.php"><img class="egdo-logo-register" src="../images/imagesAdmin/EGDO.png" alt=""></a>
								</h1>

							<!-- Nav -->
								<nav id="nav">
									<ul>
										<li class="circle">
											<a href="../index.php">COMENZA</a>
										</li>
										<li class="circle">
											<a href="../contactoEmpresas/empresa.php">EMPRESAS</a>
										</li>
										<li class="break circle">
											<a href="registroPaso1.php">REGISTRO</a>
										</li>
										<li class="circle">
											<a href="#contacto">CONTACTO</a>
										</li>
									</ul>
								</nav>

						</div>

				</div>

			<!-- Main Wrapper -->
				<div id="main-wrapper">

					
						<!-- Main -->
						<div id="intro" class="container">
							
							<div class="row"> <!-- Row Principal -->	
							
								<section class="12u 12u(mobile)"> <!-- Pasos -->
									<header>
										<h2>SEGUI LOS PASOS, REGISTRATE Y REGISTRA TU CURSO</h2>
									</header> 
									
									<div class="row uniform">
									
									<!-- Break -->
									<div class="3u">
										<span class="fa-stack fa-lg icon-active">
											<i class="fa fa-circle fa-stack-2x"></i>
											<i class="fa fa-lock fa-stack-1x fa-inverse"></i>
										</span> 
										<header>
											<h5>1.CREAR TU CUENTA</h5>
										</header>
											
									</div>
									
									<!-- Break -->
									<div class="3u">
										<span class="fa-stack fa-lg icon-step">
											<i class="fa fa-circle fa-stack-2x"></i>
											<i class="fa fa-university fa-stack-1x fa-inverse"></i>
										</span> 
										<header>
											<h5>2.DATOS DEL CURSO</h5>
										</header>
										
									</div>
									
									<!-- Break -->
									<div class="3u">
										<span class="fa-stack fa-lg icon-step">
											<i class="fa fa-circle fa-stack-2x"></i>
											<i class="fa fa-users fa-stack-1x fa-inverse"></i>
										</span> 
										<header>
											<h5>3.ENVIAR INVITACIONES</h5>
										</header>
										
									</div>
									
									<!-- Break -->
									<div class="3u$">
										<span class="fa-stack fa-lg icon-step">
											<i class="fa fa-circle fa-stack-2x"></i>
											<i class="fa fa-check-circle-o fa-stack-1x fa-inverse"></i>
										</span> 
										<header>
											<h5>4.CONFIRMAR INVITACIONES </h5>
										</header>
										
									</div>
									
								</div>
								
								
								</section> <!-- Pasos -->
							
							</div> <!-- Row Principal -->
						</div>	
							
						<!-- Wide Content -->
						<section id="content" class="container">
						<div class="row"> <!-- Row Principal -->
								<section class="12u 12u">
									
									<hr class="major"/>
									
									<div class="row uniform">
										
										<div class="-2u 3u">
											<h5 class="subheader-step"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; INGRESA TUS DATOS </h5>
										</div>
										<div class="-4u 3u$">
											<h5 class="subheader-step">PASO 1-4 </h5>
										</div>
										
									</div>
									
									<hr class="major"/>	
									
									<div class="12u 12u$(medium)"> <!-- Sec Datos Alumno -->
									
									<div class="row uniform 50%">	
										<!-- Break -->
										<div class="-2u 2u">
										
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
						
								//cargamos datos del nuevo curso
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
									
									
									$email=$_POST["email"];
									
									$result = 'SELECT id_curso FROM curso
									WHERE fecha_creacion ="'. $fecha_creacion.'" and nombre_escuela ="'. $nombre_escuela.'" and localidad="'. $localidad.'"';
									
									$result1=$conexion->query($result);
									// recorrer fila y da resultado
									while ($row =mysqli_fetch_row($result1)) {
									$id_curso =$row[0];
									echo $id_curso;
									}
									
									//Liberar el resultado
									mysqli_free_result($result1);
								
									//asigno id del curso al usuario admin
									$query = "UPDATE usuario SET id_curso = '$id_curso' WHERE email='$email'";
									$conexion->query($query);
									 mysqli_close($conexion);
									 echo ("<script>location.href='registroPaso3.php?cant_alumnos=$cant_alumnos&id_curso=$id_curso'</script>");
									 // atado con alambreeeeee!!!!!!! ver con rusty!!!!!!!!!!
									 //header('Location: registroPaso3.php?cant_alumnos=$cant_alumnos&id_curso=$id_curso');
								 }
							 			
					}
    }
    else
    {
        echo "<p>No se ha enviado el formulario.</p>";
		echo "<p><a href='registroPaso2.php'>volver</a></p>";
    }


?>
										</div>
										
									</div>
									
									
										
								</div> <!-- /Sec Datos Alumno -->
								
								</section>
								
								
								
								
							</div> <!-- /Row Principal -->
							
							
						</section>

				</div>

			<!-- Footer Wrapper -->
				<div id="footer-wrapper">

					<div id="contacto"> <!-- Ancla -->
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
						</div> <!-- /Footer -->
					</div>
					<!-- Copyright -->
						<div id="copyright" class="container">
							&copy; Egdo 2016.
						</div>
				
				</div> <!-- /Footer Wrapper -->

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