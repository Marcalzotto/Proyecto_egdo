<?php include ("../bloqueSeguridad.php");?>
<?php include('../pag_interiores/conexion.php');?>


<?php 
 	include('../pag_interiores/funciones/generar_notificacion.php');
 	generar_notificacion($conexion,$_SESSION["curso"]);
 ?>
 <?php include('../pag_interiores/funciones/cantidad_notificaciones_mensajes.php');?>
 <?php include('../pag_interiores/funciones/cantidad_notificaciones.php');?>



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

		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]--> 
    
		<link rel="stylesheet" type="text/css" href="../css/viajes.css" />
		<link rel="stylesheet" type="text/css" href="../css/demo.css" />
        <link rel="stylesheet" type="text/css" href="../css/form-viaje.css" />
        <link rel="stylesheet" type="text/css" href="../css/estilos-slider.css" />  
    
        
		<link rel="stylesheet" href="../admin/assets/css/mainAdmin.css" />	
        <link rel="stylesheet" href="../css/hint.css-2.4.1/hint.min.css" />	
		
      <script src="../js/jquery.min.js"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      
 
	</head>
	<body class="no-sidebar">
		<div id="page-wrapper"> <!-- page-wrapper -->

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

							   <?php 
								$obtUsuario = $_SESSION['id_usuario'];
               	
								$id= $_GET['id'];
										if(filter_var($id, FILTER_VALIDATE_INT) === false){  
											echo 'Valor incorrecto';  
										}else{  
											
							
           
              $con = "select * from info_viaje where id_info_viaje = $id";
                if($resultado = $conexion->query($con)){
                if ($resultado ->num_rows > 0) {
                while ($datos = $resultado->fetch_array(MYSQLI_ASSOC)){
                             $ruta_img_1 = $datos['imagen1'];
                              $ruta_img_2 = $datos['imagen2'];
                               $ruta_img_3 = $datos['imagen3'];
                               $desc2 = $datos['descripcion1'];
                               $desc3 = $datos['descripcion2'];
                               $desc4 = $datos['descripcion3'];
                                    }
                                }
                                }
                            }
                                 ?>   

				<section id='content' class='container'>  <!-- section -->  
				<div class="row"> <!-- Row -->
					<section class="12u 12u$">
					<div id='sliders'>
					<ul class='bjqs'> 
                     
					<li>
						<img src='../images/<?php echo $ruta_img_1 ?>' alt='Imagenes' title='<?php echo $desc2 ?> '>
					</li>
					<li>
						<img src='../images/<?php echo $ruta_img_2 ?>' alt='Imagenes' title='<?php echo $desc3 ?> '>
					</li>
					<li>
						<img src='../images/<?php echo $ruta_img_3 ?>' alt='Imagenes' title='<?php echo $desc4 ?> '>
					</li>

             
                    </ul>
                    </div>
					</section>

			
 					<?php $conexion->close(); ?>
                 
				</div> <!-- /Row -->
				</section> <!-- /section -->
				
				
			</div><!--/main wrapper-->


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

		</div><!-- /page-wrapper -->

		<!-- Scripts -->
		<script src="../js/jquery.min.js"></script>
		<script src="../js/jquery.dropotron.min.js"></script>
		<script src="../js/skel.min.js"></script>
		<script src="../js/skel-viewport.min.js"></script>
		<script src="../js/util.js"></script>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script src="../js/main.js"></script>
		<!-- Incluimos la libreria jQuery -->
        
 
        <!-- Incluimos el plugin -->
        <script src="../js/bjqs.min.js"></script>
        <script src="../js/script.js"></script>

	</body>
</html>