$(document).ready(function(){

	$("#btn-comentar").click(function(){
		var comentario = $("#textAreaComent").val();
		var empresa = $("#empresa").val();
		var id = $("#user").val();
		
		var texto = "";
		var tiempo = "";
		var newText = "";
		var fechaActual = new Date();
		var fecha_comentario;
		var anio_actual = fechaActual.getFullYear();
		
		if(comentario == ""){
			texto = "Por favor escribe un comentario.";
			$("#noComent").find('span').text(texto);
			$("#noComent").fadeIn('slow');
			
		}else if(comentario.length > 1000){
			 texto = "Tu comentario es muy largo";
			$("#noComent").find('span').text(texto);
			$("#noComent").fadeIn('slow');

		}else{
			url = '../pag_interiores/registrar_comentario.php';
			$.ajax({
				type:'POST',
				url:url,
				data:{
					empresa: empresa,
					user: id,
					comentario: comentario
				}, success: function(data){
						if(data == -1){
							 
							 texto = "Se produjo un error.";
							$("#noComent").find('span').text(texto);
							$("#noComent").fadeIn('slow');
						}else if(data == -2){
							 texto = "Se produjo un error con el servidor.";
							$("#noComent").find('span').text(texto);
							$("#noComent").fadeIn('slow');
						}else{
							newText = data.split("-",6);
							
							var mes_numero = parseInt(newText[3]);
							var anio = parseInt(newText[2]);
						
							
							var hora = newText[5]; 
							switch(mes_numero){
								case 1:
								mes = "Enero";
								break;
								case 2:
								mes = "Febrero";
								break;
								case 3:
								mes = "Marzo";
								break;
								case 4:
								mes = "Abril";
								break;
								case 5:
								mes = "Mayo";
								break;
								case 6:
								mes = "Junio";
								break;
								case 7:
								mes = "Julio";
								break;
								case 8:
								mes = "Agosto";
								break;
								case 9:
								mes = "Septiembre";
								break;
								case 10:
								mes = "Octubre";
								break;
								case 11:
								mes = "Noviembre";
								break;
								case 12:
								mes = "Diciembre";
								break;
								
							}
							if(anio == anio_actual){
								$("#empresaDetalles").append("<div class='unComentario'><p class='nombre'><a href='#'>"+newText[0]+"</a></p><p>"+newText[1]+"</p><p class='tiempo'>"+newText[4]+" de "+mes+" a las "+hora+" hs</p></div>");
							}else{
								$("#empresaDetalles").append("<div class='unComentario'><p class='nombre'><a href='#'>"+newText[0]+"</a></p><p>"+newText[1]+"</p><p class='tiempo'>"+newText[4]+" de "+mes+" del "+anio+" a las "+hora+" hs</p></div>");
							}
						}
					}
			});
			
		}

		setTimeout(function(){$("#noComent").fadeOut('slow');},3000);
	});
});