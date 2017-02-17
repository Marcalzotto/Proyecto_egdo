<?php include ("../bloqueSeguridad.php");?>

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



<html lang="en" class="no-js">
	<head>
		<title>EGDO</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		
		<link rel="stylesheet" href="../assets/css/index_gral.css" />

		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<link rel="stylesheet" type="text/css" href="../assets/css/common.css" />
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css" /> 
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
			<link rel="stylesheet" href="../assets/css/form-viaje.css">
			<link rel="stylesheet" href="../assets/css/form-upd-comentario.css">
			<link rel="stylesheet" href="../assets/css/viajes.css">
			 <link rel="stylesheet" type="text/css" href="../assets/css/estrellitasCalificacion.css" /> 
			<script src="../js/modernizr.js"></script> <!-- Modernizr -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
			<script src="../js/mainModal.js"></script> <!-- Gem jQuery -->
			<script src="../js/levantarComentFiesta.js"></script>


			<script>
$(function(){
						
$("#pasarimagenes").on("submit", function(evento){
	evento.preventDefault();
	var formData = new FormData(document.getElementById("pasarimagenes"));

	$.ajax({
		url: "fiesta-updinfo.php",
		type: "POST",
		dataType: "HTML",
		data: formData,
		cache: false,
		contentType: false,
		processData: false
	}).done(function(echo){
		$("#men").html(echo);
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
						<div id="intro" class="container">
							<div class="row">
                               
							<div id="men"> </div>
							<?php
							$obtUsuario = $_SESSION['id_usuario'];
							$obt_curso = $_SESSION['curso'];
							$obt_nombre_usuario = $_SESSION['nombre'];

							$host_db = "localhost";
							$user_db = "root";
							$pass_db = "";
							$db_name = "egdo_db";
							

							$conexion = new mysqli($host_db, $user_db, $pass_db,$db_name);

							if ($conexion->connect_error) {
							die("La conexion falló: " . $conexion->connect_error);
							}
							
							
							
							$verificarUsu = "select * from usuario where id_usuario = '$obtUsuario' and curso = '$obt_curso'";
							$verificar = $conexion->query($verificarAdmin) or die($conexion->error);
							if($verificar){
				
								$con = "select fiesta.nombre, fiesta.direccion, fiesta.telefono, fiesta.facebook, fiesta.twitter, 
								fiesta.instagram, fiesta.pagina_web, fiesta.datelle_adicionales, fiesta.imagen1, fiesta.imagen2, 
								usuario.id_curso from fiesta inner join usuario on usuario.$ = fiesta.id_usuario_propuesta";
								$resultado = $conexion->query($con);
								while ($datos = $resultado->fetch_assoc()) {
									
							?>
						<section class="4u 12u(mobile)">
         	             <p><b>Nombre:</b><br><?php echo $datos['nombre']; ?></p>
							<p><b>Direccion:</b><br><?php echo $datos['direccion']; ?></p>
							<p><b>Telefono:</b><br><?php echo $datos['telefono']; ?></p>
							<p><b>Facebook:</b><br><?php echo $datos['facebook']; ?></p>
							<p><b>Twitter:</b><br><?php echo $datos['twitter']; ?></p>
							<p><b>Instagram:</b><br><?php echo $datos['instagram']; ?></p>
							<p><b>Web:</b><br><?php echo $datos['pagina_web']; ?></p>
							<p><b>Detalles:</b><br><?php echo $datos['datelles_adicionales']; ?></p>
							<img class="number" src="data:image/jpeg;base64,<?php echo base64_encode($datos['fot1']); ?>"/> 
						</section>


								<section class="4u 12u(mobile)">
									<div id="mia-quinta"><a href="fiesta-3.php"><span class="number">MiaQuinta</span></a></div>
                                    <div class="estrellas">
									<a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
									<a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
									<a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
									<a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
									<a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
								</div>


									 <!-- Agregue el div con el id bariloche para ponerle de fondo la imagen -->
									 <div id="mendoza"><a href="mendoza.html"><span class="number"></span></a></div>
								       <div class="estrellas">
									<a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
									<a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
									<a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
									<a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
									<a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>

								</section>
								<section class="4u 12u(mobile)">
									<div id="cordoba"><a href="cordoba.html"><span class="number"></span></a></div>
								    <div class="estrellas">
									<a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
									<a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
									<a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
									<a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
									<a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
								</div>

								    <div id="mardelplata"><a href="mardelplata.html"><span class="number"></span></a></div>
								     <div class="estrellas">
									<a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
									<a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
									<a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
									<a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
									<a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
								</div>
								
								</section>
								<section class="4u 12u(mobile)">
									<div id="brasil"><a href="brasil.html"><span class="number"></span></a></div>
									 <div class="estrellas">
									<a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
									<a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
									<a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
									<a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
									<a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
								</div>

									<div id="mexico"><a href="mexico.html"><span class="number"></span></a></div>
								 <div class="estrellas">
									<a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
									<a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
									<a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
									<a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
									<a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
								</div>
								
								</section>
							</div>
						</div>
						
				

						<form class='form-validation' method='post' action='' onsubmit="return envioComent();">

									
									<div class='form-title-row'>
										<h1>Deja tu comentario</h1>
									</div>
								       
									<div class='form-row form-input-name-row'>
		
		                               <textarea name='Comentario' id="cf" placeholder='Comentario'></textarea>
                                       <input type='hidden' id='usu' value="<?php echo '($obtUsuario)'?>"/>
									</div>	
									<div class='form-row'>

								   <input type='button' id='comentFiesta' value='Enviar'/>


								
								</div>	

								</form>

                          <?php 
						        $comentFiesta= "select comentario.comentario, comentario.fecha_hora, 
								comentario.id_usuario, comentario.id_actividad, usuario.id_usuario,usuario.nombre, actividad.id_actividad 
						 	from fiesta inner join usuario on usuario.id_usuario=comentario.id_usuario
							 inner join actividad on comentario.id_actividad=actividad.id_actividad order by comentario.fecha_hora desc";
                                $resComent = $conexion->query($coment);

                                   if($resComent){
                                   	   if($resComent->num_rows > 0){
							while ($comentDispo = $resComent->fetch_array(MYSQLI_ASSOC))
								    {
								    	$comments[] = $comentDispo;
								    }
                                     foreach($comments as $com){


								    	$nom = $comentDispo['nombre'];
								    	$tario = $comentDispo['comentario'];
								    	$fecha = $comentDispo['fecha_hora'];
								
								 
				

    echo = "<div id='all_comments'>
            <h5> $nom </h5></span>
            <br/>
            <p>
               $tario
            </p>
            <p>$fecha</p>
    </div>";
    }
   }
  } 
    ?>
    

				</div>
				
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
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/skel-viewport.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>
			
			
	</body>
</html>