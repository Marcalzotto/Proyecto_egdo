$(document).ready(function(){

	$("#btn-comentar").click(function(){
		var comentario = $("#textAreaComent").val();
		var tiempo = "Hace 1h";

		if(comentario == ""){
			$("#noComent").fadeIn('slow');
			
		}else{
				
				$('#empresaDetalles').append("<div class='unComentario'></div>");
				$('#empresaDetalles div:last').append("<p></p>");
				$('#empresaDetalles div:last').find("p").append("<img src='../images/avatar_64.png' alt='' />");
				$('#empresaDetalles div:last').find("p").append(comentario);
				$('#empresaDetalles div:last').append("<p class='tiempo'></p>");
				$('#empresaDetalles div:last').find(".tiempo").text(tiempo);

		}

		setTimeout(function(){$("#noComent").fadeOut('slow');},3000);
	});
});