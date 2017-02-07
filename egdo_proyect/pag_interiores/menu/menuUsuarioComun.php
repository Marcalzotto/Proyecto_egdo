<!-- Nav -->

<div id="logoE" class="logo">
			<a href="../pag_interiores/index_usuarioComun.php"><img src="../favicon/favicon-96x96.png" alt=""></a>
</div>

<nav id="nav">
	
	<ul class="myfont">

	<li class="circle"><a href="../pag_interiores/upd.php"><img src="../images/upd.png" alt="UPD"></a></li>
		
		<li class="circle">
			<a href="#">
				<img src="../images/shirt.png" alt="Dise&ntilde;ar">
			</a>
				<ul>
					<li><a href="../pag_interiores/Tee-Designer-Master/index.php">Dise&ntilde;o<img src="../images/dropotron_icons/disenio_ropa.png" alt="" style="float:right"></a></li>
					<!--<li><a href="../pag_interiores/votacion.php">Votaci&oacute;n<img src="../images/dropotron_icons/votacion.png" alt="" style="float:right"></a></li>
					<li><a href="../pag_interiores/empresas.php">Empresas<img src="../images/dropotron_icons/empresas.png" alt="" style="float:right"></a></li>
					<li><a href="../pag_interiores/subir_arch.php">Subi tus dise&ntilde;os <img src="../images/dropotron_icons/upload.png" alt="subir archivos" style="float:right"></a></li>-->
				</ul>
		</li>
		<li class="circle"><a href="../pag_interiores/fiesta.php"><img src="../images/party.png" alt="Dise&ntilde;ar"></a></li>
		<li class="circle">
			<a href="#">
				<img src="../images/foto-evento.png" alt="foto-evento">
			</a>
				<ul>
					<li><p>Foto Evento</p></li>
					<li><a href="../pag_interiores/fotoUpd.php">Fotos UPD<img src="../images/dropotron_icons/upd.png" alt="" style="float:right"></a></li>
					<li><a href="../pag_interiores/galeriaFiesta.php">Fotos Fiesta de Egresados<img src="../images/dropotron_icons/party.png" alt="" style="float:right"></a></li>
					<li><a href="../pag_interiores/fotoViajeEgresados.php">Fotos Viaje de Egresados<img src="../images/dropotron_icons/viaje_egresados.png" alt="" style="float:right"></a></li>
					<li><a href="../pag_interiores/formSubirFotos.php">Subi tus fotos<img src="../images/dropotron_icons/upload.png" alt="subir fotos" style="float:right"></a></li>
				</ul>			
		</li>
		<li class="circle"><a href="../pag_interiores/infoViaje.php"><img src="../images/bus.png" alt="info-viajes"></a></li>
		<li class="circle"><a href="#">
								<img src="../images/settings.png" alt="configuracion">
							</a>
								<ul>																				
									<li><a href="../mensajes/listarMsjUsuario.php">Bandeja de entrada<img src="../images/dropotron_icons/mail_box.png" alt="agenda" style="float:right"></a></li>
									<li><a href="../pag_interiores/notificaciones.php">Notificaciones<?php
										
												if($cant > 0){
													echo "<div class='num_notificaciones'>".$cant."</div>";
												}else if($cant == 0){
													//echo "<div class='num_notificaciones'>10</div>";
													echo "<img src='../images/dropotron_icons/alarm.png' alt='agenda' style='float:right'>";
												}else{
												echo "<div class='num_notificaciones'>".$cant."</div>";
												}
									  ?></a></li>
									<li><a href="../pag_interiores/agenda.php">Agenda<img src="../images/dropotron_icons/calendar.png" alt="agenda" style="float:right"></a></li>
									<li><a href="../perfil/editarPerfil.php">Perfil <img src="../images/dropotron_icons/avatar.png" alt="perfil" style="float:right"></a></li>
									<li><a href="../login/logout.php">Logout <img src="../images/dropotron_icons/logout.png" alt="perfil" style="float:right"></a></li>
								</ul>
		</li>
		
	</ul>
	
<?php include ("../consultasTablas/consultaUsuario.php");?>	
	
	
	
	<div class="bienvenida">Hola </br><?php echo $row['nombre']; ?>!!</div>
</nav><!-- Fin Nav -->