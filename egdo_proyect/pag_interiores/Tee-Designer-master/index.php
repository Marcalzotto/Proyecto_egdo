<?php require_once("../../bloqueSeguridad.php");?>
<?php require_once("../conexion.php");?>
<?php
	$flag = 0;

	$queryVerFecha = "select * from actividad_disenio where curso_pertenece_votacion = '$_SESSION[curso]'";

	$result = $conexion->query($queryVerFecha);
	if($result){
		
		if($result->num_rows > 0){
			
			$reg = $result->fetch_array(MYSQLI_ASSOC);
			$fecha_apertura = new DateTime($reg['fecha_apertura']);
			$fechaHoy = new DateTime();
			$fechaHoy->format("Y-m-d H:i:s");
			$interval = $fechaHoy->diff($fecha_apertura);
			$intervalInDays = $interval->d;
			if($intervalInDays < 7){
				$flag = 1;
			}else if($intervalInDays >= 7 && $intervalInDays < 21){
				header('location:../votacion.php');
				
			}else if($intervalInDays >= 14 && $intervalInDays < 21){
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
	
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilosTeeDesigner.css">
		
		<script src="../../js/jquery.min.js"></script>
		
		<script>

			$(function() {
				
				
				$('#main-nav > ul').dropotron({ 
						offsetY: -50,
						mode: 'fade',
						noOpenerFade: true,
						alignment: 'center'
				});
			
			});
		</script>
   
		<script src="js/jquery-1.10.2.js">	</script>

		<script src="js/bootstrap.js">		</script>
		
		<style>

</style>

</head>

<body>
<div id="contenedor">
	<header>
		<nav id="main-nav">
			<ul>
				<li class="logo"><a href=""><img src="../../favicon/favicon-96x96.png" alt=""></a></li>
				<li class="circle"><a href=""><img src="tdesignAPI/images/upd.png" alt=""></a></li>
				<li class="circle"><a href="">
					<img src="tdesignAPI/images/shirt.png" alt=""></a>
						<ul>
							<li><a href="../../pag_interiores/index_usuarioComun.php">Pagina Principal 
								<img src="../../images/dropotron_icons/principal.png" alt="" style="float:right"></a></li>
							<li><a href="../votacion.php">Votaci&oacute;n 
								<img src="../../images/dropotron_icons/votacion.png" alt="" style="float:right"></a></li>
							<li><a href="#">Empresas 
								<img src="../../images/dropotron_icons/empresas.png" alt="" style="float:right"></a></li>
							<li><a href="../subir_arch.php">Subi tus dise&ntilde;os 
								<img src="../../images/dropotron_icons/upload.png" alt="subir disenios" style="float:right"></a></li>
						</ul>		
				</li>
				<li class="circle"><a href=""><img src="tdesignAPI/images/party.png" alt=""></a></li>
				<li class="circle">
					<a href="">
						<img src="tdesignAPI/images/foto-evento.png" alt="">
					</a>
					<ul>
						<li><p>Foto Evento</p></li>
						<li><a href="../fotoUpd.php">UPD<img src="../../images/dropotron_icons/upd.png" alt="" style="float:right"></a></li>
						<li><a href="../galeriaFiesta.php">Fiesta de Egresados<img src="../../images/dropotron_icons/party.png" alt="" style="float:right"></a></li>
						<li><a href="../fotoViajeEgresados.php">Viaje de Egresados<img src="../../images/dropotron_icons/viaje_egresados.png" alt="" style="float:right"></a></li>
						<li><a href="../formSubirFotos.php">Subi tus fotos<img src="../../images/dropotron_icons/upload.png" alt="subir fotos" style="float:right"></a></li>
					</ul>
				</li>
				<li class="circle"><a href=""><img src="tdesignAPI/images/bus.png" alt=""></a></li>
				<li class="circle"><a href=""><img src="tdesignAPI/images/settings.png" alt=""></a>
																			<ul>
																				<li><a href="#">Manda tu invitacion <img src="../../images/dropotron_icons/send_mail.png" alt="agenda" style="float:right"></a></li>
																				<li><a href="../mensajes/listarAdminCurso.php">Bandeja de entrada<img src="../../images/dropotron_icons/mail_box.png" alt="agenda" style="float:right"></a></li>
																				<li><a href="../notificaciones.php">Notificaciones<img src="../../images/dropotron_icons/alarm.png" alt="agenda" style="float:right"></a></li>
																				<li><a href="../agenda.php">Agenda<img src="../../images/dropotron_icons/calendar.png" alt="agenda" style="float:right"></a></li>
																				<li><a href="#">Perfil <img src="../../images/dropotron_icons/avatar.png" alt="perfil" style="float:right"></a></li>
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
					espera a que el administrador de tu curso la inicie.</p>";
			}

			
		?>
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
