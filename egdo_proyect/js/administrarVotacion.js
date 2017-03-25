	$(document).ready(function(){
					$("#votacion #main section .primer_instancia li p img").click(function(evento){
						
						evento.preventDefault();
						
						var id = $(this).data("id");
						var tipo =  $(this).data("tipo");
						var url_servidor = "funciones_votacion/voto_hecho.php";
						var target = $(this);
						
						$.post(url_servidor,{'id':id, 'tipo':tipo},function(data){

							if(data == -1){
								var messaje = "No puedes volver a votar este disenio";
								$("#alert").find("span").text(messaje);
								$("#alert").fadeIn('slow');
								//return false;
							
							}else if(data == -2){
									
								var messaje = "Lo sentimos hubo problemas con el servidor";
								$("#alert").find("span").text(messaje);
								$("#alert").fadeIn('slow');
								//return false;
							
							}else if(data == -3){
								
								var messaje = "Usted excedio los 5 votos para este Item";
								$("#alert").find("span").text(messaje);
								$("#alert").fadeIn('slow');

							}else{
							
								target.closest("p").find("span").text(data);
							
							}

							setTimeout(function(){$("#alert").fadeOut('slow');}, 3500);
						});


					});

				$("#votacion #main section .segunda_instancia li p img").click(function(evento){
					evento.preventDefault();

					var id = $(this).data("id");
					var tipo =  $(this).data("tipo");
					var url_servidor = "funciones_votacion/voto_segunda_instancia.php";
					var target = $(this);

					$.post(url_servidor,{'id':id, 'tipo':tipo},function(data){
							
							var messaje = "";
							if(data == -1){
								
								messaje = "Solo se permite un voto por usuario";
								$("#alert").find("span").text(messaje);
								$("#alert").fadeIn('slow');

							}else if(data == -2){
								messaje = "Lo sentimos hubo un problema con el servidor";
								$("#alert").find("span").text(messaje);
								$("#alert").fadeIn('slow');
							}else{
								target.closest("p").find("span").text(data);
							}
					
							setTimeout(function(){$("#alert").fadeOut('slow');}, 3500);
					});

				});

				$("#votacion #main section .segunda_instancia li p #prenda-empate").click(function(evento){
					evento.preventDefault();
					var id = $(this).data("idempate");
					var tipo = $(this).data("tipoempate");

					var url = "funciones_votacion/voto_desempate.php";
					var target = $(this);

					$.post(url,{'id':id, 'tipo':tipo},function(data){
						
						var messaje = "";

						if(data == -1){
							
							messaje = "se ha producido un error";
							$("#alert").find("span").text(messaje);
							$("#alert").fadeIn('slow');
						
						
						}else if(data == -2){
					
							messaje = "hubo problemas con el servidor, instenta mas tarde";
							$("#alert").find("span").text(messaje);
							$("#alert").fadeIn('slow');
							
						
						}else if(data == -3){

							messaje = "Solo el administrador puede desempatar";
							$("#alert").find("span").text(messaje);
							$("#alert").fadeIn('slow');

						}else{
							target.closest("p").find("span").text(data);

							 location.reload();
						}

						setTimeout(function(){$("#alert").fadeOut('slow');}, 3500);
					});

				});

});