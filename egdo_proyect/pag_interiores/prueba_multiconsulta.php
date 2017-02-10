<?php

	include("conexion.php");

		$buscarMax = "select count(id_disenio) as ganadores from disenio as di join usuario u on di.id_usuario_subio = u.id_usuario 
											where u.id_curso = 2 and codigo_tipo = 1 and votos_segunda_instancia in(
																													select max(d.votos_segunda_instancia) from disenio as d);";
		
		$buscarMax .= "select count(id_disenio) as ganadores from disenio as di join usuario u on di.id_usuario_subio = u.id_usuario 
											where u.id_curso = 2 and codigo_tipo = 2 and votos_segunda_instancia in(
																													select max(d.votos_segunda_instancia) from disenio as d);";
		
		$buscarMax .= "select count(id_disenio) as ganadores from disenio as di join usuario u on di.id_usuario_subio = u.id_usuario 
											where u.id_curso = 2 and codigo_tipo = 3 and votos_segunda_instancia in(
																													select max(d.votos_segunda_instancia) from disenio as d);";
	
	if ($conexion->multi_query($buscarMax)) {
    					$cont = 0;	
    			do{
        					/* almacenar primer juego de resultados */
        		if ($result = $conexion->store_result()) {
            				
            				while ($row = $result->fetch_row()){
                			
               				printf("%s\n",$row[0]);
               				$vec[] = $row[0];
                			$cont++;
                			printf("%s\n",$cont);
            				}
            				$result->free();
        					}
        					/* mostrar divisor */
        						if ($conexion->more_results()) {
            				printf("-----------------\n");
        						}
    							}while ($conexion->next_result());
		}

		print("Escribimos los resultados alojados en el vector</br>");
		/*foreach ($vec as $key) {
			echo "Valor: ".$key[0]."</br>";
		}*/

		//echo $vec[0][0]." ".$vec[1][0]." ".$vec[2][0]."</br>";
		echo $vec[0]." ".$vec[1]." ".$vec[2]."</br>";

		$query = "select * from notificaciones";
		$result = $conexion->query($query);
		
		if($result){
			echo "Single query ok</br>";
			$multi_inserts = "insert into tipo_notificaciones values(16,'notificacion de prueba');";
			$multi_inserts .= "insert into tipo_notificaciones values(17,'notificacion de prueba');";
			$multi_inserts .= "insert into tipo_notificaciones values(18,'notificacion de prueba');";
			
			//if ($conexion->multi_query($multi_inserts) === true) {
    			echo "Multi query ok";
			//}else{
				//echo $conexion->error;
			//}


		}else{
			echo "Error".$conexion->error;
		}

		$fechaHoy = new DateTime();
		//$fechaMostrar = $fechaHoy->format("Y-m-d H:i:s");
		//echo "</br> Esta es la fecha de hoy: ".$fechaMostrar;

		if(isset($fechaHoy)){
			echo "La fecha esta creada";
		}else{
			echo "No esta la creada";
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script>
		//setInterval(function(){
			//$("ul li:contains('Rafael')").css({"color":"blue"});

		//},10000);	

</script>
</head>
<body>
<!--<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.8&appId=1721074368181212";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-share-button" data-href="http://www.egdo.com.ar/" data-layout="button" data-size="large" data-mobile-iframe="false"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.egdo.com.ar%2F&amp;src=sdkpreparse">Compartir</a></div>-->

<!--Aca compartimos la imagen si es que se llega a poder-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.8&appId=1721074368181212";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-share-button" data-href="http://localhost:8080/Proyecto_egdo/egdo_proyect/pag_interiores/images/delete.png" data-layout="button" data-size="large" data-mobile-iframe="false"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%3A8080%2FProyecto_egdo%2Fegdo_proyect%2Fpag_interiores%2Fimages%2Fdelete.png&amp;src=sdkpreparse&width=500&height=500">Compartir</a></div>

<?php
echo "<ul>
	<li>German</li>
	<li>Raul</li>
	<li>Damian</li>
	<li>Fernando</li>
	<li>Rafael</li>
</ul>"; ?>


</body>
</html>