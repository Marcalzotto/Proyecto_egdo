$(document).ready(function(){

	var check = true;
	
	setInterval(function(){

		$.ajax({
			type:"POST",
			url:"../pag_interiores/notificacion_en_pantalla.php",
			data:{
				check:check
			},
			success:function(respond){
				if(respond == -1){
					alert("Lo sentimos hubo un error con los datos enviados");
				}else if(respond == -2){
					alert("Lo sentimos hubo un error con el servidor");
				}else{
					
					var vec = respond.split("|");
					//var vec = str.split("-");
					var max = vec.length; 
					if($("#contenerNotificaciones").has("h2").length > 0 && respond != 0){
							$("#contenerNotificaciones h2").remove();
							
							for (var i = 0; i < max-1; i++) {
					
							$("#contenerNotificaciones").append(vec[i]);
							$("#contenerNotificaciones a:last").css({"border-color":"#cccccc"});
							$("#contenerNotificaciones a:last").animate({"border-color":"#333"},1500);
							
							}

					}else if(respond != 0){
							for (var i = 0; i < max-1; i++) {
						
							$("#contenerNotificaciones").append(vec[i]);
							$("#contenerNotificaciones a:last").css({"border-color":"#cccccc"});
							$("#contenerNotificaciones a:last").animate({"border-color":"#333"},1500);
							}
					}

					if(vec[max-1] > 0){
						alert("Hubo errores inesperados");
					}
				}
			}
		});
		
	},1000*30);

});