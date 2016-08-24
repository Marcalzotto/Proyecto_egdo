<?php include ("../bloqueSeguridad.php");?>
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

$id_usuario=$_SESSION["id_usuario"];

$sql1= "select * from usuario where id_usuario= '$id_usuario'  ";
$query = $conexion->query($sql1);
while ($row=$query->fetch_array()) {

$name= $row['nombre'];
$surname= $row['apellido'];

}
 
 mysqli_close($conexion); 
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
	
	<link rel="stylesheet" href="../css/admin-demo.css">
	<link rel="stylesheet" href="../css/admin-form-mini.css">
	
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
							
							
							<div class="main-content"> <!-- main content -->

								<!-- You only need this form and the form-mini.css -->

        <div class="form-mini-container">

				
			<form class="form-mini" method="post" action="#">
				
				<img src="../assets/images/user.png" alt="">
				
				<div class="form-row">
                    <label><span>Bienvenido Administrador</span></label>
				</div>
				
				<div class="form-row">
                    <label><span>Nombre: <?php echo $name ?> </span></label>
				</div>

                <div class="form-row">
                    <label><span>Apellido: <?php echo $surname ?></span></label>
                </div>

                
				<div class="form-row form-last-row">
                    <a class="form-a" href="panel-editar.php"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Editar</a>
				</div>

            </form>
        </div>
								

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