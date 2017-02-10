$(document).ready(function(){

var checkIn = true;
setInterval(function(){
//unidad de tiempo, 1000 milisegundos = 1 segundo


	$.ajax({
		type:"POST",
		url:"../pag_interiores/checkNotificaciones.php",
		data:{
			check:checkIn
		},
		success: function(data){
				if(data == -1){
					alert("Hubo error inesperado");
				}else if(data == 0){
					console.log(data);
					if($(".dropotron .notificacion").has("div").length > 0){
							
							$(".dropotron .notificacion div").remove();
							$(".dropotron .notificacion").append("<img src='../images/dropotron_icons/alarm.png' alt='alarma' style='float:right'>");
					}
				
				}else if(data > 0){
					console.log(data);
					if($(".dropotron .notificacion").has("img").length > 0){
						
						$(".dropotron .notificacion img").remove();
						$(".dropotron .notificacion").append("<div class='num_notificaciones'>"+data+"</div>");
					}else if($(".dropotron .notificacion").has("div").length > 0){
						
						$(".dropotron .notificacion .num_notificaciones").remove();
						$(".dropotron .notificacion").append("<div class='num_notificaciones'>"+data+"</div>");
					}
				}
		}
	});

},1000*10);

});