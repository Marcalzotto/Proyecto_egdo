<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script>

		window.onload = hora;
		fecha = new Date("<? echo date('Y-m-d H:i:s'); ?>");
		//fecha = new Date();
		function hora(){

		var hora=fecha.getHours();
		var minutos=fecha.getMinutes();
		var segundos=fecha.getSeconds();
		
		if(hora<10){ 
			hora='0'+hora;
		}
		
		if(minutos<10){
			minutos='0'+minutos; 
		}

		if(segundos<10){ 
			segundos='0'+segundos; 
		}

		fech = hora+':'+minutos+':'+segundos;

		document.getElementById('hora').innerHTML=fech;
		fecha.setSeconds(fecha.getSeconds()+1);
		
		}

		setTimeout("hora()",1000);
	</script>
</head>
<body>
	<div id="hora"></div>
</body>
</html>		