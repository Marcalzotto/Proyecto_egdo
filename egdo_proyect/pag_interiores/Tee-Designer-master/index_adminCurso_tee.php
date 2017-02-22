<?php 
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
   header('Location: ../../index.php');

exit;
}

$now = time();

if($now > $_SESSION['expire']) {
session_destroy();

header('Location: ../../index.php');
exit;
}
?>
<?php require_once("../conexion.php");?>
<?php 
	include('../funciones/generar_notificacion.php');
	include('../funciones/cantidad_notificaciones_mensajes.php');
	generar_notificacion($conexion,$_SESSION["curso"]);
?>
<?php include("../funciones/cantidad_notificaciones.php");?>

<?php
	$flag = 0;

	$queryVerFecha = "select * from actividad_disenio where curso_pertenece_votacion = '$_SESSION[curso]'";

	$result = $conexion->query($queryVerFecha);
	if($result){
		
		if($result->num_rows > 0){
			
			$reg = $result->fetch_array(MYSQLI_ASSOC);
			$fecha_apertura = new DateTime($reg['fecha_apertura']);
			$fechaHoy = new DateTime();
			$fechaHoy->format("Y-m-d");
			$interval = $fechaHoy->diff($fecha_apertura);
			$intervalInYear = $interval->y;
			$intervalInMonth = $interval->m;
			$intervalInDays = $interval->d;
			
			if($intervalInYear > 0){
				header('location:../votacionAdminCurso.php');
			}else if($intervalInMonth > 0){
				header('location:../votacionAdminCurso.php');
			}else if($intervalInDays >= 7){
				header('location:../votacionAdminCurso.php');
			}else{
				$flag = 1;
			}
		}


	}else{
		die("Lo sentimos hubo problemas con el servidor");
	}
							
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TalkInTee</title>
		
	<link href="css/normalize.css" rel="stylesheet">
	
	<!-- mejora tooltips-->
	<link rel="stylesheet" href="../../css/hint.css-2.4.1/hint.min.css" />

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilosTeeDesigner.css">
		
		<script src="../../js/jquery.min.js"></script>
		<script src="js/disparaEvento.js"></script>
		<script src="js/tomarDatos2.js"></script>
		<script>

			$(function(){
				$('#main-nav > ul').dropotron({ 
						offsetY: -50,
						mode: 'fade',
						noOpenerFade: true,
						alignment: 'center'
				});
			});
		</script>
   
		<!--<script src="js/jquery-1.10.2.js"></script>-->
		<script src="js/bootstrap.js"></script>
		
</head>

<body>
<div id="contenedor">
	<header>
		<nav id="main-nav">
			<ul>
				<li class="logo"><a href="../indexUsuarioAdminCurso.php"><img src="../../favicon/favicon-96x96.png" alt=""></a></li>
				<li class="circle"><span class="hint--bottom hint--always" data-hint="UPD"><a href="../upd.php"><img src="tdesignAPI/images/upd.png" alt=""></a></span></li>
				<li class="circle"><span class="hint--bottom hint--always" data-hint="DISE&Ntilde;AR"><a href="#">
					<img src="tdesignAPI/images/shirt.png" alt=""></a></span>
						<ul>
							<li>
								<a href="../indexUsuarioAdminCurso.php">Pagina Principal 
										<img src="../../images/dropotron_icons/principal.png" alt="" style="float:right">
								</a>
							</li>
						</ul>		
				</li>
				<li class="circle"><span class="hint--bottom hint--always" data-hint="FIESTA"><a href="../fiesta.php"><img src="tdesignAPI/images/party.png" alt=""></a></span></li>
				<li class="circle"><span class="hint--bottom hint--always" data-hint="FOTO-EVENTO">
					<a href="#">
						<img src="tdesignAPI/images/foto-evento.png" alt="">
					</a></span>
					<ul>
						<li><p>Foto Evento</p></li>
						<li><a href="../fotoUpdAdmin.php">UPD<img src="../../images/dropotron_icons/upd.png" alt="" style="float:right"></a></li>
						<li><a href="../galeriaFiestaAdmin.php">Fiesta de Egresados<img src="../../images/dropotron_icons/party.png" alt="" style="float:right"></a></li>
						<li><a href="../fotoViajeEgresadosAdmin.php">Viaje de Egresados<img src="../../images/dropotron_icons/viaje_egresados.png" alt="" style="float:right"></a></li>
						<li><a href="../formSubirFotosAdmin.php">Subi tus fotos<img src="../../images/dropotron_icons/upload.png" alt="subir fotos" style="float:right"></a></li>
					</ul>
				</li>
				<li class="circle"><span class="hint--bottom hint--always" data-hint="INFO-VIAJE"><a href="../infoviajeAdminEgdo.php"><img src="tdesignAPI/images/bus.png" alt=""></a></span></li>
				<li class="circle"><span class="hint--bottom hint--always" data-hint="CONFIGURACION"><a href="#"><img src="tdesignAPI/images/settings.png" alt=""></span></a>
																			<ul>
																				<li><a href="../../invitaciones/invitaciones.php">Manda tu invitacion <img src="../../images/dropotron_icons/send_mail.png" alt="agenda" style="float:right"></a></li>
																				<li><a href="../../mensajes/listarAdminCurso.php">Bandeja de entrada
																					<?php					
																						$cant_mensajes = cantidad_notificaciones_mensajes($conexion,$_SESSION['id_usuario']);
																						if($cant_mensajes > 0){
																							echo "<div class='num_notificaciones'>".$cant_mensajes."</div>";
																						}else if($cant_mensajes == 0){
																							//echo "<div class='num_notificaciones'>10</div>";
																							echo "<img src='../../images/dropotron_icons/mail_box.png' alt='agenda' style='float:right'>";
																						}else{
																						echo "<div class='num_notificaciones'>".$cant_mensajes."</div>";
																						}
																					?>
																				</a></li>
																				<li>
																					<a class="notificacion" href="../notificacionesAdmin.php">Notificaciones
																					<?php 
																						$cant = cantidad_notificaciones($conexion,$_SESSION['id_usuario'],$_SESSION['curso']);

																						if($cant > 0){
																							echo "<div class='num_notificaciones'>".$cant."</div>";
																						}else if($cant == 0){
																							//echo "<div class='num_notificaciones'>10</div>";
																							echo "<img src='../../images/dropotron_icons/alarm.png' alt='alarma' style='float:right'>";
																						}else{
																							echo "<div class='num_notificaciones'>".$cant."</div>";
																						}
																					?>
																					</a></li>
																				<li><a href="../agendaAdmin.php">Agenda<img src="../../images/dropotron_icons/calendar.png" alt="agenda" style="float:right"></a></li>
																				<li><a href="../../perfil/editarPerfil.php">Perfil <img src="../../images/dropotron_icons/avatar.png" alt="perfil" style="float:right"></a></li>
																				<li><a href="../../login/logout.php">Logout <img src="../../images/dropotron_icons/logout.png" alt="perfil" style="float:right"></a></li>
																			</ul>
				</li>
			</ul>
		</nav>
	</header>
	
</div>

	<div id="maindiv">
		
		<?php
			
			if($flag == 1){
				include 'tdesignAPI/new_applit.php';
			}else if($flag == 0){
					echo "<p class='msn'>No se ha iniciado la etapa de dise&ntilde;o para este curso, 
					pulsando aqu&iacute; puedes iniciar el evento.</p>";
					echo "<button id='btn-disparar'>Disparar Evento</button>";
					echo "<p class='span'></p>";
			}
			
		?>
	</div>
	<div id="advertisment">
		<h2>No puede ver esta herramienta porque el dispositivo es demasiado pequenio, la resolucion debe ser mayor a 1200px.</h2>

	</div>
	<div id="footer">
		<h2>SEGUINOS EN NUESTRAS REDES SOCIALES</h2>
		
		<p>Email: egdoweb@gmail.com</p>
		
		<ul class="pie">
			<li><a class="icon fa-facebook" href=""></a></li>
			<li><a class="icon fa-twitter" href=""></a></li>
			<li><a class="icon fa-instagram" href=""></a></li>
		</ul>
	<div id="copyright">
		&copy; EGDO 2016.
	</div>

	</div>
	
			
			<script src="../../js/jquery.dropotron.min.js"></script>
</body>
		
</html>
