$(function(){
						
						$("#formulario").on("submit", function(evento){
							evento.preventDefault();
							var formData = new FormData(document.getElementById("formulario"));
							formData.append("clave","valor");

							var direccion = "recibe_datos.php";
							$.ajax({
								url: direccion,
								type: "post",
								dataType: "html",
								data: formData,
								cache: false,
								contentType: false,
								processData: false
							})

							.done(function(response){
								$("#respuesta_ajax").html(response);
							});
						
						});
});