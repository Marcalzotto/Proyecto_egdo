<?php include ("../bloqueSeguridad.php");?>
<?php require('conexion.php'); ?>
<?php 
	include('funciones/generar_notificacion.php');
	generar_notificacion($conexion,$_SESSION["curso"]);
?>
<?php include('funciones/cantidad_notificaciones.php');?>
<?php include('funciones/cantidad_notificaciones_mensajes.php');?>
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
			<link rel="stylesheet" type="text/css" href="../css/viajes.css" />
			 <link rel="stylesheet" type="text/css" href="../css/demo.css" />
        <link rel="stylesheet" type="text/css" href="../css/form-viaje.css" /> 
			<script src="../js/modernizr.js"></script> <!-- Modernizr -->
			<script src="../js/jquery.min.js"></script>
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
			<script src="../js/mainModal.js"></script> <!-- Gem jQuery -->
			<script>
$(function(){
						
$("#enviarimagenes").on("submit", function(evento){
	evento.preventDefault();
	var formData = new FormData(document.getElementById("enviarimagenes"));

	$.ajax({
		url: "subirImg.php",
		type: "POST",
		dataType: "HTML",
		data: formData,
		cache: false,
		contentType: false,
		processData: false
	}).done(function(echo){
		$("#mensaje").html(echo);
	     });
     });

});
</script>

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

			<!-- Main Wrapper -->
				<div id="main-wrapper">

					<!-- Wide Content -->
						
                                 

<?php 
  $admin_curso = 1;
    require_once("conexion.php");
						$verificarAdmin = "select * from usuario where id_rol = '$admin_curso'";
						
						$verificar = $conexion->query($verificarAdmin) or die($conexion->error);

                         if($verificar){
														echo "
							
															<form class='form-validation' enctype='multipart/form-data' method='post' id='enviarimagenes'>
														<div class='form-row form-input-name-row'>
														
																<input type='text' name='nombre' id='nombre' placeholder='nombre'>
														
														</div>
 														
 														<div class='form-row form-input-name-row'>

																<input type='text' name='descripcion' id='descripcion' placeholder='descripcion'>

														</div>

														 <div class='form-row'>

			                          				  <label>Subir foto
			   
			                           						<input type='file' class='file_input' name='info_imagen' id='info_imagen' />
			                           				 </label>
			                        				</div>
			                   						 
												
													<button type='submit'>Subir imagen</button>

											
															</form>
						                                          ";
						}




    ?>

    <div id="intro" class="container">
		<div class="row">
     <div id="mensaje">
     	</div>

<?php
$con = "select * from info_viaje";
$resultado = $conexion->query($con);

while ($datos = $resultado->fetch_assoc()) {
?>

        <section class="4u 12u(mobile)">
         	
          <?php 
           if($datos['nombre_lugar']=='Bariloche'){

         echo "<a href='bariloche.php'><h2>$datos[nombre_lugar]</h2></a>";
              }  

              else if ($datos['nombre_lugar']=='Dique San roque'){
            	echo "<a href='cordoba.php'><h2>$datos[nombre_lugar]</h2></a>";
            }  

            else if ($datos['nombre_lugar']=='Camboriu'){
            	echo "<a href='brasil.php'><h2>$datos[nombre_lugar]</h2></a>";
            }  

             else if ($datos['nombre_lugar']=='San Rafael'){
            	echo "<a href='mendoza.php'><h2>$datos[nombre_lugar]</h2></a>";
            }  

             else if ($datos['nombre_lugar']=='Mardel'){
            	echo "<a href='mardelplata.php'><h2>$datos[nombre_lugar]</h2></a>";
            }  
              else{

         echo "<a href='mexico.php'><h2>$datos[nombre_lugar]</h2></a>";
               } 
           ?>


	 <p><b>Descripcion:</b><br><?php echo $datos['descripcion']; ?></p>
	<img class="number" src="data:image/jpeg;base64,<?php echo base64_encode($datos['img']); ?>"/> 
</section>

<?php
};
?>

								</div>
						</div>

				</div>






								
							<!--	<section class="4u 12u(mobile)">
									<div id="cordoba"><a href="cordoba.html"><span class="number">Córdoba</span></a></div>
								    <div id="mardelplata"><a href="mardelplata.html"><span class="number">Mar del plata</span></a></div>
								</section>
								<section class="4u 12u(mobile)">
									<div id="brasil"><a href="brasil.html"><span class="number">Brasil</span></a></div>
									<div id="mexico"><a href="mexico.html"><span class="number">Mexico</span></a></div>
								</section>
							</div>
						</div>

				</div>-->
				
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