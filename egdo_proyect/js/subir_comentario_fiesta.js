$(document).ready(function(){

	$("#enviar_comentario_fiesta").click(function(){

		var comentario = $("#id_comentario_fiesta").val();
		var lugar = $(this).data("lugar");
		if(comentario == ""){
			alert("El comentario no puede ser vacio");
			return false;
		}else if(comentario.length > 1000){
			alert("El comentario supera los 1000 caracteres");
			return false;
		}else{
			$.ajax({
				type:'POST',
				url:'../pag_interiores/scripts/subir_comentario_fiesta.php',
				data:{
					comentario:comentario,
					lugar:lugar
				},success: function(data){
					if(data == -1){
						alert("Por favor intoduce un comentario");
						return false;
					}else if(data == -2){
						alert("El comentario puede ser de maximo 1000 caracteres");
						return false;
					}else if(data == -3){
						alert("Los datos enviado son erroneos");
						return false;
					}else if(data == -4){
						alert("Hubo un error al procesar los datos");
						return false;
					}else if(data == -5){
						alert("hubo un error al procesar sus datos");
					}else{
						//tratar de traer el comentario en una sola variable y hacer append
							alert("comentario guardado con exito");
							$(".aloja_comentario h4").remove();
							$(".aloja_comentario").append(data);
							$(".aloja_comentario .row:last").css({"border-color":"#cccccc"});
							$(".aloja_comentario .row:last").animate({"border-color":"#333"},1500);
							$(".aloja_comentario .row:last").on("click",function(e){
								
								var id_comm = $(this).find(".del").attr("rel");
								
								$.ajax({
									type:'POST',
									url:'../pag_interiores/scripts/moderar_comentario_fiesta.php',
									data:{
										com: id_comm
									},
									success:function(data){
										if(data == -1){
											alert("Hubo un problema al procesar la peticion");
										}else if(data == -2){
											alert("hubo un error, no pudimos procesar tu peticion prueba mas tarde");
										}else if(data == 1){
						
											$(e.target).closest("div.row").fadeOut(600);
										}else{
											alert(data);
										}
									}
								});
							});
							
					}
				}

			});
		}
		return false;
	});

});