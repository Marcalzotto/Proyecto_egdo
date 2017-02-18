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

		<!-- Jquery Validate -->
		<script type="text/javascript" src="assets/js/jquery.js"></script>
		<script type="text/javascript" src="assets/js/jquery.validate.js"></script>
		<script type="text/javascript" src="assets/js/additional-methods.js"></script>
		<script type="text/javascript" src="assets/js/functionAddMsj.js"></script>
		<link rel="stylesheet" href="../assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	
		<link rel="stylesheet" type="text/css" href="../css/viajes.css" />
		<link rel="stylesheet" type="text/css" href="../css/demo.css" />
        <link rel="stylesheet" type="text/css" href="../css/form-viaje.css" /> 
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
								<h1 id="logo"><a href="admin-index.php"><img class="logo-img" src="assets/images/EGDO.png" alt=""/></a></h1>

							<!-- Nav -->
								<nav id="nav">
									<ul>
										<!-- Item home -->
										<li> 
											<a href="admin-index.php" title="Home">
												<span class="fa-stack fa-3x">
												<i class="fa fa-circle fa-stack-2x"></i>
												<i class="fa fa-home fa-stack-1x fa-inverse"></i>
												</span> 
											</a>
										</li>
										<!-- Item search -->
										<li>
											<a href="#" title="Buscar">
												<span class="fa-stack fa-3x">
												<i class="fa fa-circle fa-stack-2x"></i>
												<i class="fa fa-search fa-stack-1x fa-inverse"></i>
												</span>
											</a>
											<ul>
												<li><a class="list-group-item" href="empresa.php"><i class="fa fa-building-o" aria-hidden="true"></i>&nbsp; Empresas</a></li>
												<li><a class="list-group-item" href="curso.php"><i class="fa fa-university" aria-hidden="true"></i>&nbsp; Cursos</a></li>
												<li><a class="list-group-item" href="alumno.php"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Usuarios</a></li>
												<li><a class="list-group-item" href="panel-info.php"><i class="fa fa-map-signs" aria-hidden="true"></i>&nbsp; Info Viaje</a></li>
											</ul>
										</li>
										<!-- Item filter -->
										<li class="break" >
											<a href="#" title="Filtrar">
												<span class="fa-stack fa-3x">
												<i class="fa fa-circle fa-stack-2x"></i>
												<i class="fa fa-filter fa-stack-1x fa-inverse"></i>
												</span>
											</a>
											<ul>
												<li><a class="list-group-item" href="moderar-comentario.php"><i class="fa fa-comments" aria-hidden="true"></i>&nbsp; Comentarios Actividades</a></li>
												<li><a class="list-group-item" href="moderar-comentarioEmpresas.php"><i class="fa fa-comments-o" aria-hidden="true"></i></i>&nbsp; Comentarios Empresas</a></li>
												<li><a class="list-group-item" href="moderar-disenio.php">
													<i class="fa fa-pencil" aria-hidden="true"></i>&nbsp; Diseño</a>
												</li>
												<li>
													<span><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp; UPD</a></span>
													<ul> <!-- Sub items -->
														<li>
															<a class="list-group-item" href="moderar-UPD.php">
																<i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp; Galeria 1
															</a>
														</li>
														<li>
															<a class="list-group-item" href="moderar-UPD1.php">
																<i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp; 
																Galeria 2
															</a>
														</li>
													</ul> <!-- /Sub items -->	
												</li>	
												<li>
													<span><i class="fa fa-ticket" aria-hidden="true"></i>&nbsp;Fiesta</a></span>
													<ul> <!-- Sub items -->
														<li>
															<a class="list-group-item" href="moderar-fiesta.php">
																<i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp; Galeria 1
															</a>
														</li>
														<li>
															<a class="list-group-item" href="moderar-fiesta1.php">
																<i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp; 
																Galeria 2
															</a>
														</li>
													</ul> <!-- /Sub items -->	
												</li>
											</ul>
										</li>
										<!-- Item setting -->
										<li>
											<a href="" title="Herramientas">
												<span class="fa-stack fa-3x">
												<i class="fa fa-circle fa-stack-2x"></i>
												<i class="fa fa-cogs fa-stack-1x fa-inverse"></i>
												</span>
											</a>
											<ul>
												<li><a class="list-group-item" href="edit-perfil.php"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Editar Perfil</a></li>
												<li><a class="list-group-item" href="listarMsj.php"><i class="fa fa-inbox" aria-hidden="true"></i>&nbsp; Mensaje</a></li>
												<li><a class="list-group-item" href="../login/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; Cerrar Sesion</a></li>
											</ul>
										</li>
									</ul>
								</nav> <!-- /Nav -->

						</div>

				</div>

			<!-- Main Wrapper  -->
				<div id="main-wrapper-ad">

					<!-- Wide Content -->
						<section id="content" class="container">
							<?php 
							$adminEgdo = $_SESSION['id_rol']; //arreglar 
							$usu_id = $_SESSION['id_usuario'];
							//require_once("conexion.php");
							$host_db = "localhost";
							$user_db = "root";
							$pass_db = "";
							$db_name = "egdo_db";
							

							$conexion = new mysqli($host_db, $user_db, $pass_db,$db_name);

							if ($conexion->connect_error) {
							die("La conexion falló: " . $conexion->connect_error);
							}
							
							
							
							$verificarAdmin = "select * from usuario where id_rol = '$adminEgdo'";
							$verificar = $conexion->query($verificarAdmin) or die($conexion->error);
							if($verificar){
								echo "<form class='form-validation' enctype='multipart/form-data' method='post' id='enviarimagenes'>
									<div class='form-row'>
										<label>Subir foto 
										<input type='file' class='file_input' name='info_imagen' id='info_imagen' /></label>
			                        </div>
			                        <div class='form-row form-input-name-row'>
										<input type='text' name='descripcion' id='descripcion' placeholder='descripcion'>
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
									$ruta_img = $datos['nombre_lugar'];
							?>
						<section class="4u 12u(mobile)">
         	

						<?php 
							if($ruta_img =='Bariloche.jpg'){
								echo"<a href='bariloche.php'><h2>Bariloche</h2></a>";
							}  
							else if ($ruta_img =='dique_sanroque.jpg'){
								echo "<a href='cordoba.php'><h2>Dique San Roque</h2></a>";
							}  
							else if ($ruta_img =='balneario_camboriu.jpg'){
								echo "<a href='brasil.php'><h2>Camboriu</h2></a>";
							}  
							else if ($ruta_img =='San Rafael.jpg'){
								echo "<a href='mendoza.php'><h2>San Rafael</h2></a>";
							}  
							else if ($ruta_img =='mardelplata.jpg'){
								echo "<a href='mardelplata.php'><h2>Mar del plata</h2></a>";
							}  

							else if ($ruta_img =='Cancun.jpg'){
								echo "<a href='mexico.php'><h2>Cancun</h2></a>";
							}  
							else{
								echo "<h2>Error al subir imagen</h2>";
							} 
						?>

							<p><b>Descripcion:</b><br><?php echo $datos['descripcion']; ?></p>
							<img class="number" src="/Proyecto_egdo/egdo_proyect/img/<?php echo $ruta_img; ?>"/> 
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