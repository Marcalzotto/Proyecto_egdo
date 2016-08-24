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
<html>
	<head>
		<title>Untitled</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	
		<link rel="stylesheet" type="text/css" href="../css/viajes.css" />
		<link rel="stylesheet" type="text/css" href="../css/demo.css" />
        <link rel="stylesheet" type="text/css" href="../css/form-viaje.css" /> 
		
		<script src="../assets/js/jquery.min.js"></script>
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
		$("#mensaje").html(echo);
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
								<h1 id="logo"><img class="egdo-logo" src="../assets/images/EGDO.png" alt=""></h1>

							<!-- Nav -->
								<nav id="nav">
									<ul>
										<li class="circle"><a href="#"><i class="fa fa-home fa-2x" aria-hidden="true"></i>
										</a>
											<ul>
												<li><a class="list-group-item" href="panel-index.php"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp; Perfil</a></li>
												<li><a class="list-group-item" href="panel-mensaje.php"><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp; Mensaje</a></li>
											</ul>
										</li>
										<li class="circle">
											<a href="#"><i class="fa fa-search fa-2x" aria-hidden="true"></i></a>
											<ul>
												<li><a class="list-group-item" href="../grid/panel-empresas.php"><i class="fa fa-building-o" aria-hidden="true"></i>&nbsp; Empresa</a></li>
												<li><a class="list-group-item" href="../grid/panel-curso.php"><i class="fa fa-university" aria-hidden="true"></i>&nbsp; Curso</a></li>
												<li><a class="list-group-item" href="../grid/panel-alumno.php"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Alumno</a></li>
												<li><a class="list-group-item" href="panel-info.php"><i class="fa fa-map-signs" aria-hidden="true"></i>&nbsp; Info Viaje</a></li>
											</ul>
										</li>
										<li class="break">
											<a href="#"><i class="fa fa-eye fa-2x" aria-hidden="true"></i></a>
											<ul>
											<li><a class="list-group-item" href="../grid/panel-moderar.php"><i class="fa fa-comments" aria-hidden="true"></i>&nbsp; Comentarios</a></li>
											<li><a class="list-group-item" href="panel-image.php"><i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp; Imagenes</a></li>
											</ul>
										</li>
										<li class="circle">
											<a href="../login/logout.php"><i class="fa fa-sign-out fa-2x" aria-hidden="true"></i></a>	
										</li>
									</ul>
								</nav>

						</div>

				</div>

			<!-- Main Wrapper  -->
				<div id="main-wrapper-ad">

					<!-- Wide Content -->
						<section id="content" class="container">
							<?php 
							$admin_curso = 1;
							//require_once("conexion.php");
							$host_db = "localhost";
							$user_db = "root";
							$pass_db = "";
							$db_name = "egdo_db";
							

							$conexion = new mysqli($host_db, $user_db, $pass_db,$db_name);

							if ($conexion->connect_error) {
							die("La conexion falló: " . $conexion->connect_error);
							}
							
							
							
							$verificarAdmin = "select * from usuario where id_rol = '$admin_curso'";
							$verificar = $conexion->query($verificarAdmin) or die($conexion->error);
							if($verificar){
								echo "<form class='form-validation' enctype='multipart/form-data' method='post' id='enviarimagenes'>
									<div class='form-row form-input-name-row'>
										<input type='text' name='nombre' id='nombre' placeholder='nombre'>
									</div>
 									<div class='form-row form-input-name-row'>
										<input type='text' name='descripcion' id='descripcion' placeholder='descripcion'>
									</div>
									<div class='form-row'>
										<label>Subir foto </label>
										<input type='file' class='file_input' name='info_imagen' id='info_imagen' />
			                           	
			                        </div>
			                   		<button type='submit'>Subir imagen</button>
									</form>	";
								}
							?>
							
						</section>
					 <div id="intro" class="container"> 
						<div class="row">
							<div id="mensaje"> </div>
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
							<img class="number" src="data:image/jpeg;base64,<?php echo base64_encode($datos['imagen']); ?>"/> 
						</section>

						<?php
					};
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
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/skel-viewport.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>

	</body>
</html>