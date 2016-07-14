	$(document).ready(function(){
					$("#votacion #main section .primer_instancia li p img").click(function(evento){
						
						evento.preventDefault();
						
						var id = $(this).data("id");
						var tipo =  $(this).data("tipo");
						var url_servidor = "voto_hecho.php";
						var target = $(this);
						
						$.post(url_servidor,{'id':id, 'tipo':tipo},function(data){

							if(data == -1){
								
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
					var url_servidor = "voto_segunda_instancia.php";
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

				});