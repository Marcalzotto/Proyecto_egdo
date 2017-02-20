<?php
function maximos_desempate_fiesta($maximos, $vecMax, $conexion){
 //include('calcular_calificacion_upd_fiesta.php');
 //include('calcular_nuevo_ancho.php');

		if($maximos > 1){
		echo "<h2>Ha habido un empate, el admin de curso debe desempatar</h2>";
		echo "<div class=row>";
			foreach ($vecMax as $max){
				$calificacion = calcular($conexion,$max['id_fiesta'],'fiesta');
				$ancho = calcular_ancho($calificacion); 
					echo"<section class='4u 12u(mobile)'>
							<div id='cordoba'>
								<a href=fiesta-3.php?fiesta=".$max['id_fiesta']."><span class='number' style='background-image:url(../images/".$max['foto_perfil'].")'>".$max["nombre"]."</span></a>
							</div>
                <p class='detalles'>Calificacion:</p>
							<p class='detalles'>".$max['calificacion']."</p>
							<div id='estrellas-gris'><div id='estrellas-cambia' style='width:".$ancho."px'></div></div>";
													
					echo"</section>";
			}

			echo  "</div>";
		}else{//termina if $maximos 1
				echo "<h2>Lugar ganador</h2>";
				echo "<div class=row>";
				$calificacion = calcular($conexion,$vecMax[0]['id_fiesta'],'fiesta');
					$ancho = calcular_ancho($calificacion); 
				
					echo"<section class='4u 12u(mobile)'>
									<div id='cordoba'>
										<a href=fiesta-3.php?fiesta=".$vecMax[0]['id_fiesta']."><span class='number' style='background-image:url(../images/".$vecMax[0]['foto_perfil'].")'>".$vecMax[0]["nombre"]."</span></a>
									</div>
                 	<p class='detalles'>Calificacion:</p>
									<p class='detalles'>".$vecMax[0]['calificacion']."</p>
									<div id='estrellas-gris'><div id='estrellas-cambia' style='width:".$ancho."px'></div></div>";
													
							echo"</section>";

				echo  "</div>";
		}

}
?>