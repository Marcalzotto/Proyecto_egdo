<?php include ("../bloqueSeguridad.php");

?>
<?php 

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "egdo_db";
//$tbl_name = "usuario";

$conexion = new mysqli($host_db, $user_db, $pass_db,$db_name );

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

?>
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

		<!-- mejora tooltips-->
		<link rel="stylesheet" href="../css/hint.css-2.4.1/hint.min.css" />
		
		<!-- Jquery Validate -->
		<script type="text/javascript" src="assets/js/jquery.js"></script>
		<script type="text/javascript" src="assets/js/jquery.validate.js"></script>
		<script type="text/javascript" src="assets/js/additional-methods.js"></script>
		<script type="text/javascript" src="assets/js/functionAddMsj.js"></script>
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	
		<link rel="stylesheet" type="text/css" href="../css/viajes.css" />
		<!--<link rel="stylesheet" type="text/css" href="../css/demo.css" />
        <link rel="stylesheet" type="text/css" href="../css/form-viaje.css" /> -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	
	<script>
$(function(){
						
$("#enviarimagenes").on("submit", function(evento){
	evento.preventDefault();
	var formData = new FormData(document.getElementById("enviarimagenes"));

	$.ajax({
		url: "panel-info2.php",
		type: "POST",
		dataType: "HTML",
		data: formData,
		cache: false,
		contentType: false,
		processData: false
	}).done(function(echo){
		$(".mensaje").html(echo);
	     });
     });

});
</script>


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

			<!-- Main Wrapper  -->
				<div id="main-wrapper">

					<!-- Wide Content -->
						<section id="content" class="container">
							
							<div class="row"> <!-- Row Principal -->
								<section class="12u 12u"> <!-- formulario subida-->



							<?php 
							$adminEgdo = $_SESSION['id_rol']; 
							$usu_id = $_SESSION['id_usuario'];
			
							
							$verificarAdmin = "select * from usuario where id_rol = '$adminEgdo'";
							$verificar = $conexion->query($verificarAdmin) or die($conexion->error);
							if($verificar){
								echo "<form role='form' autocomplete='off' enctype='multipart/form-data' method='post' id='enviarimagenes'>
									<div class='row uniform 50%'>
									    
									    <div class='-1u 2u'><span>Subir foto 1</span></div>
										
										<div class='3u'><span><input type='file' class='form-class' name='info_imagen_1' id='info_imagen_1' required /></span>
									    </div> 

										<div class='3u'><span><input type='text' name='descripcion' id='descripcion' placeholder='Descripcion foto 1' class='form-class' required></span>
									    </div>
										
										<div class='3u$'><span><input type='text' name='nombre' id='nombre' class='form-class' placeholder='Nombre lugar' required></span>
									    </div>
										
										
										

										<div class='-1u 2u'><span>Subir foto 2</span></div>
										
										<div class='3u'><span><input type='file' class='form-class' name='info_imagen_2' id='info_imagen_2' required /></span>
									    </div>
										
										<div class='3u$'><span><input type='text' name='descripcion2' id='descripcion2' placeholder='Descripcion foto 2' class='form-class' required></span></div>
									
										
										<div class='-1u 2u'><span>Subir foto 3</span></div>
										
										<div class='3u'><input type='file' class='form-class' name='info_imagen_3' id='info_imagen_3' required /></span>
									    </div>
										
                                        <div class='3u$'><input type='text' name='descripcion3' id='descripcion3' placeholder='Descripcion foto 3' class='form-class' required></span></div>
									
										
										<div class='-1u 2u'><span>Subir foto 4</span></div>
										
										<div class='3u'><span><input type='file' class='form-class' name='info_imagen_4' id='info_imagen_4' required /></span>
									    </div>
										
                                       	<div class='3u$'><span><input type='text' name='descripcion4' id='descripcion4' placeholder='Descripcion foto 4' class='form-class' required></span></div>
									
			                        <div class='-2u 8u$'>
			                   		<button type='submit' class='button special icon fa fa-plus'>Subir imagen</button>
                                    </div> 
			                   		</div>
									</form>	";
								}
							?>
							
							</section> <!-- /formulario subida-->
							</div><!--/row -->
						</section>
						
					 	<div id="intro" class="container"> 
						<div class="mensaje"> </div>
						<div class="row">
							
							
							<?php
								$con = "select * from info_viaje";
								$resultado = $conexion->query($con);
								while ($datos = $resultado->fetch_assoc()) {
									$nombre = $datos['nombre_lugar'];
									$traerIdlugar = $datos['id_info_viaje'];
									$ruta_img = $datos['imagen'];
									$descripcion = $datos['descripcion'];
                                  
						

							echo	"<section class='4u 12u(mobile)'>
									<header>
										<h2><a href='../pag_interiores/turismo.php?id=".$traerIdlugar."'>" .$nombre."</a></h2>
									</header>
									<img class='number' src='../img/".$ruta_img."'/>
								
									<p>".$descripcion."</p>
								</section>";

						  	}

						   ?>
                  
            
				
								</div>

							
						</div>
				
				
				
				</div>  <!--main wrapper-->

			<!-- Footer Wrapper -->
				<div id="footer-wrapper">

					<!-- Footer -->
						<div id="footer" class="container">
							<header>
								<h2>SEGUINOS EN NUESTRAS REDES SOCIALES</h2>
							</header>
							<p>Email: egdoweb@gmail.com.</p>
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
			<script src="../js/jquery.min.js"></script>
			<script src="../js/jquery.dropotron.min.js"></script>
			<script src="../js/skel.min.js"></script>
			<script src="../js/skel-viewport.min.js"></script>
			<script src="../js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../js/main.js"></script>

	</body>
</html>