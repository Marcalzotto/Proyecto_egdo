<!-- Nav -->
<!--<?php //include("../bloqueSeguridad.php");?>-->

<!-- LOGO -->
<div id="logoE" class="logo">
	<a href="../pag_interiores/indexUsuarioAdminCurso.php">
		<img src="../favicon/favicon-96x96.png" alt="">
	</a>
</div>


<nav id="nav">

	
	<ul class="myfont">
	<!--head aca-->
	<!--<li class="circle"><a href="../pag_interiores/indexUsuarioAdminCurso.php"><img src="../favicon/favicon-96x96.png" alt=""></a></li>-->
	
<!-- lineas de error-->

	<!-- UPD -->
		<li class="circle">
			<span class="hint--bottom hint--always" data-hint="UPD">
				<a href="../pag_interiores/upd.php">
					<img src="../images/upd.png" alt="UPD">
				</a>
			</span>
		</li>

		
		
		<!-- DISENAR -->
		<li class="circle">
			<span class="hint--bottom hint--always" data-hint="Dise&ntilde;ar">
				<a href="#">
					<img src="../images/shirt.png" alt="Dise&ntilde;ar">
				</a>
			</span>
			<ul>
				<!-- Diseno -->
				<li>
					<a href="../pag_interiores/Tee-Designer-Master/index_adminCurso_tee.php">Dise&ntilde;o
						<img src="../images/dropotron_icons/disenio_ropa.png" alt="" style="float:right">
					</a>
				</li>
			<!--<li>
					<a href="../pag_interiores/votacionAdminCurso.php">Votaci&oacute;n
						<img src="../images/dropotron_icons/votacion.png" alt="" style="float:right">
					</a>
				</li>
				<li>
					<a href="../pag_interiores/empresasAdmin.php">Empresas
						<img src="../images/dropotron_icons/empresas.png" alt="" style="float:right">
					</a>
				</li>
				<li>
					<a href="../pag_interiores/subir_arch_adminCurso.php">Subi tus dise&ntilde;os 
						<img src="../images/dropotron_icons/upload.png" alt="subir archivos" style="float:right">
					</a>
				</li>-->
			</ul>
		</li>
		
		
		
<!--fin codigo de error-->
		
		<!-- FIESTA -->
		<li class="circle">
			<span class="hint--bottom hint--always" data-hint="Fiesta">
				<a href="../pag_interiores/fiesta.php">
					<img src="../images/party.png" alt="FIESTA">
				</a>
			</span>
		</li>
		
		
		
		
		<!-- FOTO EVENTO -->
		<li class="circle">
			<span class="hint--bottom hint--always" data-hint="Foto-Evento">
				<a href="#">
					<img src="../images/foto-evento.png" alt="foto-evento">	
				</a>
			</span>
			<ul>
				<li>
					<p>Foto Evento</p>
				</li>
				<!-- Fotos UPD -->
				<li>
					<a href="../pag_interiores/fotoUpdAdmin.php">Fotos UPD
						<img src="../images/dropotron_icons/upd.png" alt="" style="float:right">
					</a>
				</li>
				<!-- Fotos Fiesta de Egresados -->
				<li>
					<a href="../pag_interiores/galeriaFiestaAdmin.php">Fotos Fiesta de Egresados
						<img src="../images/dropotron_icons/party.png" alt="" style="float:right">
					</a>
				</li>
				<!-- Fotos Viaje de Egresados -->
				<li>
					<a href="../pag_interiores/fotoViajeEgresadosAdmin.php">Fotos Viaje de Egresados
						<img src="../images/dropotron_icons/viaje_egresados.png" alt="" style="float:right">
					</a>
				</li>
				<!-- Subi tus fotos -->
				<li>
					<a href="../pag_interiores/formSubirFotosAdmin.php">Subi tus fotos
					<img src="../images/dropotron_icons/upload.png" alt="subir fotos" style="float:right">
					</a>
				</li>
			</ul>
		</li>
		
		
		
		
		<!-- INFO VIAJE -->
		<li class="circle">
			<span class="hint--bottom hint--always" data-hint="Info-Viaje">
				<a href="../pag_interiores/infoViaje.php">
					<img src="../images/bus.png" alt="info-viajes">
				</a>
			</span>
		</li>			
		
		
		
		
		
		<!-- CONFIGURACION -->
		<li class="circle">
			<span class="hint--bottom hint--always" data-hint="configuracion">
				<a href="#">
					<img src="../images/settings.png" alt="configuracion">
				</a>
			</span>
			<ul>
				<!-- Manda tu invitacion -->
				<li>
					<a href="../invitaciones/invitaciones.php">Manda tu invitacion 
						<img src="../images/dropotron_icons/send_mail.png" alt="agenda" style="float:right">
					</a>
				</li>
				<!-- Bandeja de entrada -->
				<li>
					<a href="../mensajes/listarAdminCurso.php">Bandeja de entrada
						<?php							
							if($cant_mensajes > 0){
								echo "<div class='num_notificaciones'>".$cant_mensajes."</div>";
							}else if($cant_mensajes == 0){
								//echo "<div class='num_notificaciones'>10</div>";
								echo "<img src='../images/dropotron_icons/mail_box.png' alt='agenda' style='float:right'>";
							}else{
							echo "<div class='num_notificaciones'>".$cant_mensajes."</div>";
							}
						?>
					</a>
				</li>
				<!-- Notificaciones -->
				<li>
					<a class="notificacion" href="../pag_interiores/notificacionesAdmin.php">Notificaciones
						<?php							
							if($cant > 0){
								echo "<div class='num_notificaciones'>".$cant."</div>";
							}else if($cant == 0){
								//echo "<div class='num_notificaciones'>10</div>";
								echo "<img src='../images/dropotron_icons/alarm.png' alt='alarma' style='float:right'>";
							}else{
							echo "<div class='num_notificaciones'>".$cant."</div>";
							}
						?>
					</a>
				</li>
				<!-- Agenda -->
				<li>
					<a href="../pag_interiores/agendaAdmin.php">Agenda
						<img src="../images/dropotron_icons/calendar.png" alt="agenda" style="float:right">
					</a>
				</li>
				<!-- Perfil -->
				<li>
					<a href="../perfil/editarPerfil.php">Perfil 
						<img src="../images/dropotron_icons/avatar.png" alt="perfil" style="float:right">
					</a>
				</li>
				<!-- Logout -->
				<li>
					<a href="../login/logout.php">Logout 
						<img src="../images/dropotron_icons/logout.png" alt="perfil" style="float:right">
					</a>
				</li>
			</ul>

		</li>
									
	</ul>

<?php include ("../consultasTablas/consultaUsuario.php");?>	
	
	

<!-- NOMBRE DE USUARIO -->	
<div class="bienvenida">Hola </br><?php echo $row['nombre']; ?>!!</div>
		
</nav>