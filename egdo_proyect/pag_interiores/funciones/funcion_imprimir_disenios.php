<?php
function imprimir_disenios($conexion,$fa,$fpi,$fsi,$curso,$tipo_prenda){

date_default_timezone_set('America/Argentina/Buenos_Aires');
$fechaHoy = new DateTime();
$fechaHoy->format("Y-m-d");

if($fechaHoy >= $fa && $fechaHoy <= $fpi){

	$qry = "select * from disenio as d join usuario as u on d.id_usuario_subio = u.id_usuario 
	where u.id_curso = '$curso' and d.codigo_tipo = '$tipo_prenda'";

	$resultSetTipo1 = $conexion->query($qry) or die($conexion->error);

	if($resultSetTipo1){
													
	$cant_regs = $resultSetTipo1->num_rows;

		if($cant_regs == 0){
			echo "<p id=no-ul >No hay dise&ntilde;os subidos para la votacion</p>";
		}else{
																
				while($reg = $resultSetTipo1->fetch_array(MYSQLI_ASSOC)){
					$varRegistros[] = $reg;
				}
				echo "<ul class=primer_instancia>";

							foreach($varRegistros as $unVar){
																			
				echo "<li><a href=Tee-Designer-master/tdesignAPI/".$unVar['path_img_doble']." rel='lightbox'><img src=Tee-Designer-master/tdesignAPI/".$unVar['path_frontal']." 
							width='105' height='105' class='ropa' alt='buzo frente'></a><p>Subido por:</p><p>".$unVar['nombre']."</p><p>Calificacion: <span>".$unVar['cantidad_votos']."</span>
							<img data-id=".$unVar['id_disenio']." data-tipo=".$unVar['codigo_tipo']." src='../images/dropotron_icons/like.png' alt='Like'></p></li>";
							}
				echo "</ul>";
		}

	}else{
		echo "<p id=no-ul >Lo sentimos hubo un problema con el servidor.</p>";
	}

}else if($fechaHoy > $fpi && $fechaHoy <= $fsi){
																
	$traerDiseniosMasVotados = "select * from disenio as d join usuario u on d.id_usuario_subio = u.id_usuario 
	where d.codigo_tipo = '$tipo_prenda' and u.id_curso = '$curso' order by d.cantidad_votos desc limit 3";
																
	$consultaMasVotados = $conexion->query($traerDiseniosMasVotados) or die($conexion->error);

		if($consultaMasVotados){
																		
			$cantidadDeRegistros = $consultaMasVotados->num_rows;
				if($cantidadDeRegistros > 0){
					echo "<ul class=segunda_instancia>";		
																				
					while($deAunGanador = $consultaMasVotados->fetch_array(MYSQLI_ASSOC)){
						$arrayMasVotados1[] = $deAunGanador;
					}

						foreach($arrayMasVotados1 as $unoMasVotado){
																					
echo "<li><a href=Tee-Designer-master/tdesignAPI/".$unoMasVotado['path_img_doble']." rel='lightbox'><img src=Tee-Designer-master/tdesignAPI/".$unoMasVotado['path_frontal']." 
			width='105' height='105' class='ropa' alt='buzo frente'></a><p>Subido por: </p><p>".$unoMasVotado['nombre']."</p><p>Calificacion: <span>".$unoMasVotado['votos_segunda_instancia']."</span>
			<img data-id=".$unoMasVotado['id_disenio']." data-tipo=".$unoMasVotado['codigo_tipo']." src='../images/dropotron_icons/like.png' alt='Like'></p></li>";	
																					
						}

					echo "</ul>";

				}else{
					echo "<p id=no-ul >No hay dise&ntilde;os subidos para la segunda instancia de votacion</p>";
				}

		}else{
			echo "<p id=no-ul >Lo sentimos hubo un problema con el servidor.</p>";
		}	
}else if($fechaHoy > $fsi){
																
		$buscarGanador = "select * from disenio as di join usuario u on di.id_usuario_subio = u.id_usuario 
											where u.id_curso = '$curso' and di.codigo_tipo = '$tipo_prenda' and di.votos_segunda_instancia in(
											select max(d.votos_segunda_instancia) from disenio as d where d.codigo_tipo = '$tipo_prenda');";												
				
				$traerGanador = $conexion->query($buscarGanador) or die($conexion->error);

					if($traerGanador){
							$hayUnGanador = $traerGanador->num_rows;

							if($hayUnGanador > 0){
								if($hayUnGanador > 1){
									echo "<p id=ganador>Se ha producido un empate, el administrador debe desempatar</p>";
										echo "<ul class=segunda_instancia>";
									while($unganador = $traerGanador->fetch_array(MYSQLI_ASSOC)){
										$empatados[] = $unganador;
									}

									foreach ($empatados as $empatado) {
	echo "<li><a href=Tee-Designer-master/tdesignAPI/".$empatado['path_img_doble']." rel='lightbox'><img src=Tee-Designer-master/tdesignAPI/".$empatado['path_frontal']." 
	width='105' height='105' class='ropa' alt='buzo frente'></a><p>Subido por: </p><p>".$empatado['nombre']."</p><p>Calificacion: <span>".$empatado['votos_segunda_instancia']."</span>
	<img id='prenda-empate' data-idempate=".$empatado['id_disenio']." data-tipoempate=".$empatado['codigo_tipo']." src='../images/dropotron_icons/like.png' alt='Like'></p></li>";	
									}
									echo "</ul>";	
								}else{
								//$hayUnGanador = $traerGanador->fetch_array(MYSQLI_ASSOC);
								
								echo "<p id=ganador>Dise&ntilde;o ganador!</p>";
								echo "<ul class=tercer_instancia>";

									$elGanador = $traerGanador->fetch_array(MYSQLI_ASSOC);

echo "<li><a href=Tee-Designer-master/tdesignAPI/".$elGanador['path_img_doble']." rel='lightbox'><img src=Tee-Designer-master/tdesignAPI/".$elGanador['path_frontal']." 
			width='105' height='105' class='ropa' alt='buzo frente'></a><p>Subido por: <p></p>".$elGanador['nombre']."</p><p>Calificacion: 
			<span>".$elGanador['votos_segunda_instancia']."</span></p></li>";	
				
				//<img data-id=".$elGanador['id_disenio']."data-tipo=".$elGanador['codigo_tipo']." src='../images/dropotron_icons/like.png' alt='Like'>														
				//esta linea iria despues del span, dentro del parrafo				
								echo "</ul>";
							}
						}else{
								echo "<p id=no-ul >No hay dise&ntilde;os subidos para esta votacion.</p>";
						}
					}else{
							echo "<p id=no-ul >Lo sentimos hubo un problema con el servidor.</p>";
					}

}else{
	echo "<p id=no-ul >Lo sentimos hubo un problema con el servidor.</p>";
}

}
?>