<?php include ("../bloqueSeguridad.php");?>


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
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		
		<link rel="stylesheet" href="../css/index_gral.css" />

		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<link rel="stylesheet" type="text/css" href="../css/common.css" />
        <link rel="stylesheet" type="text/css" href="../css/style.css" /> 
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
			<link rel="stylesheet" href="../css/estiloBandeja.css"> <!-- CSS reset -->
			<link rel="stylesheet" href="../css/styleModal.css"> <!-- Gem style -->
			<script src="../js/modernizr.js"></script> <!-- Modernizr -->
			<script src="../js/jquery.min.js"></script>
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
			<script src="../js/mainModal.js"></script> <!-- Gem jQuery -->
	
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
<div id="menu"><a class="links" href="../mensajes/listarMsjUsuario.php">Ver mensajes</a> | <a class="links" href="../mensajes/crearMsjUsuario.php">Crear mensajes</a></div><br /><br />
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
      <td class="columna"><a class="linkLeer" href="../mensajes/leerMsjUsuario.php?id_mensaje=<?=$row['id_mensaje']?>"><?=$row['asunto']?></a></td>
      <td class="columna"><?=$row['nombre']?> <?=$row['apellido']?></td>
	  <td class="columna"><?=$row['fecha_hora']?></td>
	  <td class="columna"><a href="../mensajes/eliminarMsjUsuario.php?id_mensaje=<?=$row['id_mensaje']?>"><img alt="" src="../mensajes/images/delete.png" width="15" height="15"></a></td>
    </tr>
<?php $i++; 
} ?>
</table>
		
	</div>
	
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