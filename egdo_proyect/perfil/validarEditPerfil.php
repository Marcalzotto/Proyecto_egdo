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
		
		<!-- mejora tooltips-->
		<link rel="stylesheet" href="../css/hint.css-2.4.1/hint.min.css" />
		
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		
		<link rel="stylesheet" href="../css/tmm_form_wizard_style_demo.css" />
		<link rel="stylesheet" href="../css/grid.css" />
		<link rel="stylesheet" href="../css/tmm_form_wizard_layout.css" />
		<link rel="stylesheet" href="../css/fontello.css" />
		<link rel="stylesheet" href="../css/form-elements.css" />
		
		<link rel="stylesheet" href="../css/index_gral.css" />
		<link rel="stylesheet" href="../css/slimbox2.css" type="text/css" media="screen">
		
        <link rel="stylesheet" type="text/css" href="../css/style-assets.css" />
		
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--<link rel="stylesheet" type="text/css" href="../assets/css/common.css" />-->
    <!--<link rel="stylesheet" type="text/css" href="../assets/css/style.css" /> -->
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
			<script type="text/javascript" src="../js/jquery_min.js"></script>
			<script type="text/javascript" src="../js/slimbox2.js"></script>
			<!--Librarys for lightBox -->
			<script src="../js/modernizr.js"></script> <!-- Modernizr -->
			<script src="../js/jquery.min.js"></script>
			<script type="text/javascript" src="../js/administrarVotacionAdminCurso.js"></script>
			
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
			<script src="../js/tomarDatos.js"></script>
	
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
							include '../pag_interiores/menu/masterMenu.php';
							?>
								
		

						</div>
				
				</div>
</header>
			<!-- Banner Wrapper -->
				<div id="banner-wrapper">

					
					<div id="votacion">
						<div id="alert">
							
						</div>
							<h2>Editar perfil</h2>
							
							<div id="contents">

			<div class="form-container">

				<div id="tmm-form-wizard" class="containers substrate">
								
							
			<form action="../perfil/validarEditPerfil.php" method="POST" role="form">

						<div class="form-wizard">
						
							<div class="col-md-9 col-sm-7">
							
							</br>
									<div class="rows">
										
										
<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "egdo_db";
$tbl_name = "usuario";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
die("La conexion falló: " . $conexion->connect_error);
}


// Arrays para guardar errores:
    $aErrores = array();

    // Patrón para usar en expresiones regulares (admite letras acentuadas y espacios):
    $patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";

    // Comprobar si se ha enviado el formulario:
    if( !empty($_POST) )
    {
			$buscarUsuario = 'SELECT * FROM usuario WHERE email ="'.$_SESSION['email'].'"';

			$result = $conexion->query($buscarUsuario);

			$row = mysqli_fetch_array($result);//devuelve info utilizando nombre de campo (mysql_fetch_array da error, agregar i)

			//función trim que se encarga de eliminar los espacios en blanco 
			//función mysql_real_escape_string para evitar las inyecciones sql 
			//htmlentities para xss 
			$nombre = trim(htmlentities(mysql_real_escape_string($_POST["nombre"])));
			$apellido = trim(htmlentities(mysql_real_escape_string($_POST["apellido"])));
			$passActual = trim(htmlentities(mysql_real_escape_string($_POST["passActual"])));
			$nuevaPass = trim(htmlentities(mysql_real_escape_string($_POST["nuevaPass"])));
			$reNuevaPass = trim(htmlentities(mysql_real_escape_string($_POST["reNuevaPass"])));
			

		            //
					//echo "FORMULARIO RECIBIDO:<br/>";
					//echo "====================<p/>";
                    //
					//// Mostrar la información recibida del formulario:
					//echo "Nombre: ".$nombre."<br/>";
					//echo "Apellido: ".$apellido."<br/>";
					//echo "Email: ".$email."<br/>";
					//echo "Password: ".$pass."<br/>";
					//echo "Confirma password: ".$repass."<br/>";
					//echo "====================<p/>";
	
					// Comprobar si llenaron los campos requeridos:
					if( isset($nombre) && isset($apellido) )
					{
						// Nombre:
						if( empty($nombre) )
							$aErrores[] = "- Debe completar el campo Nombre.";
						else
						{
							// Comprobar mediante una expresión regular, que sólo contiene letras y espacios:
							if( !preg_match($patron_texto, $nombre) ){
							
								$aErrores[] = "- El nombre solo puede contener letras y espacios";
								
							}
							else 
							{
								// Comprobar que no supere cantidad maximo de caracteres:
								if(strlen($nombre) > 45)
								$aErrores[] = "- El nombre no puede contener mas de 45 caracteres";
							}
						}

						// Apellidos:
						if( empty($apellido) )
							$aErrores[] = "- Debe completar el campo apellido";
						else
						{
							// Comprobar mediante una expresión regular, que sólo contienen letras y espacios:
							if( !preg_match($patron_texto, $apellido) )
								$aErrores[] = "- El apellido solo puede contener letras y espacios";
							else 
							{
								// Comprobar que no supere cantidad maximo de caracteres:
								if(strlen($apellido) > 45)
								$aErrores[] = "- El apellido no puede contener mas de 45 caracteres";
							}
						}
					
						
						//contrasenia
						
						// Comprobar si los campos ingrese y confirme password son iguales
						if( !(empty($passActual) && empty($nuevaPass) && empty($reNuevaPass))){
							
							if(!password_verify($passActual, $row['contrasenia'])){
							
								$aErrores[] = "- El password actual no coincide";
								
							}
							else 
							{
								
								if($nuevaPass != $reNuevaPass){
									$aErrores[] = "- Error al repetir nuevo password";
								}
								else {
								
									// Comprobar que no supere cantidad maximo de caracteres:
									if(strlen($nuevaPass) < 3 ||strlen($nuevaPass) > 45)
										$aErrores[] = "- El nuevo password no puede contener menos de 3 caracteres y mas de 45 caracteres";
									else {
										$bandera=1;
									}
									
								}
							}						
						}
						else{
						
							$bandera=0;
						
						}

					}
					else
					{
						echo "<p>Los campos nombre y apellido no pueden estar vacios.</p>";
					}

					// Si han habido errores se muestran, sino continua al siguiente paso
					if( count($aErrores) > 0 )
					{
						echo "<p>ERRORES ENCONTRADOS:</p>";

						// Mostrar los errores:
						for( $contador=0; $contador < count($aErrores); $contador++ )
							echo $aErrores[$contador]."<br/>";
							echo "<p><a href='../perfil/editarPerfil.php'>Volver y completar nuevamente</a></p>";
					}
					else
					{		
							//Validado los campos se inserta los datos a la base
					
														
							$email = $_SESSION['email'];

							if($bandera==1){
							
								$passhash = password_hash($nuevaPass, PASSWORD_BCRYPT);
								
								$query = "UPDATE usuario SET nombre='$nombre',apellido='$apellido',contrasenia='$passhash'
									 WHERE email='$email'";									 
							}
							else{
						
							 
							 $query = "UPDATE usuario SET nombre='$nombre',apellido='$apellido'
									 WHERE email='$email'";
									 
							}

								 if (!mysqli_query($conexion, $query)){
									 echo "<script language='JavaScript'>
											alert('Error al modificar perfil, cargue nuevamente los datos!');
											</script>"; 
									 die('Error: ' . mysqli_error());
									 mysqli_close($conexion);
									 header('Location:../perfil/editarPerfil.php');
								 }
								 else {
										
										echo '<h3>tus datos se modificaron correctamente!!!</h3>';
										echo "<p><a href='../perfil/editarPerfil.php'>Ir a editar perfil</a></p>";
									
								}
						}
									
					
    }
    else
    {
        echo "<p>No se ha enviado el formulario.</p>";
		echo "<p><a href='../perfil/editarPerfil.php'>volver</a></p>";
    }
?>
									
																	
										
									</div><!--/ .row-->
							</div>
							
						</div><!--/ .form-wizard-->
						
						<div class="next">
							<button class="button button-control" type="submit"><span>Guardar <b>cambios</b></span></button>
							<div class="button-divider"></div>
						</div>

					</form><!--/ form-->
					
					</div><!--/ .container-->
				
					</div><!--/ .form-container-->

					</div><!--/ #content-->
							
					</div>
					
					
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