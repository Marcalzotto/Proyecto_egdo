<?php include ("../bloqueSeguridad.php");?>
<!DOCTYPE HTML>
<!--
	Wide Angle by Pixelarity
	pixelarity.com @pixelarity
	License: pixelarity.com/license
-->
<html>
	<head>
		<title>EGDO::Admin::Msj-Usuario</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	
	<link rel="stylesheet" href="../assets/css/admin-demo.css">
	<link rel="stylesheet" href="../assets/css/admin-form-basic.css">
	<link rel="stylesheet" href="../css/estiloBandeja.css"> <!-- CSS reset -->
	
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
										<li class="circle"><a href="#">
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

								<!-- You only need this form and the form-basic.css -->

	<div id="bandejaEntrada">
<?php

    $conexion = mysql_connect("localhost", "root", "")
      or die("Problemas en la conexion");
    
    mysql_select_db("egdo_db", $conexion) 
      or die("Problemas en la seleccion de la base de datos");
    ?>
	
	<?php
	//$sqlCapacidad = "SELECT max_msj_priv FROM usuario WHERE usuario='".$_SESSION['usuario']."'";
	//$resultado = mysql_query($sqlCapacidad, $conexion) or die(mysql_error());
	//$rowCapacidad = mysql_fetch_assoc($resultado);
	//echo '<h3 ALIGN="left"> Bienvenido usuario: &nbsp;&nbsp;&nbsp;'.$_SESSION['usuario'].' </h3>
	//	  <h3 ALIGN="left"> Limite de almacenamiento: &nbsp;&nbsp;&nbsp;'.$rowCapacidad['max_msj_priv'].' mensajes</h3>'
	?>

<?php
	
	# Buscamos los mensajes privados
//$sql = "SELECT * FROM mensajes_privado WHERE id_receptor='".$_SESSION['id_usuario']."'";
$sql = "SELECT A.nombre, A.apellido, T.* FROM usuario A INNER JOIN mensajes_privado T ON A.id_usuario=T.id_emisor WHERE T.id_receptor='".$_SESSION['id_usuario']."'";
$res = mysql_query($sql, $conexion) or die(mysql_error());

?>
<div id="menu"><a class="links" href="../pag_interiores/admin-msj-listar.php">Ver mensajes</a> | <a class="links" href="../pag_interiores/panel-mensaje.php">Crear mensajes</a></div><br /><br />
  <table width="800" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
	  <th class="columna"><strong>Mensaje Nro</strong></td>
      <th class="columna"><strong>Asunto</strong></td>
      <th class="columna"><strong>De</strong></td>
	  <th class="columna"><strong>Fecha</strong></td>
	  <th class="columna"><strong>Eliminar</strong></td>
    </tr>
    <?php
	$i = 0; 
	while($row = mysql_fetch_assoc($res)){ ?>
    <tr class="fila">
	  <td class="columna"><?=$i+1?></td>
      <td class="columna"><a class="linkLeer" href="../pag_interiores/admin-msj-leer.php?id_mensaje=<?=$row['id_mensaje']?>"><?=$row['asunto']?></a></td>
      <td class="columna"><?=$row['nombre']?> <?=$row['apellido']?></td>
	  <td class="columna"><?=$row['fecha_hora']?></td>
	  <td class="columna"><a href="../pag_interiores/admin-msj-eliminar.php?id_mensaje=<?=$row['id_mensaje']?>"><img alt="" src="../mensajes/images/delete.png" width="15" height="15"></a></td>
    </tr>
<?php $i++; 
} ?>
</table>
		
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