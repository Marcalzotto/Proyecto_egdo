$(document).ready(function(){

var expReg = /[^0-9]/;

	$(".clasificacion input").click(function (e){
		var valor_estrella = $(this).val();
		var lugar = $(".hidden").val();
		var valoracion = "";

		if(expReg.test(valor_estrella)){
			alert("Hubo un error con la valoracion, los valores solo pueden ser numericos");
			return false;
		}else if(expReg.test(lugar)){
			alert("Hubo un error, los datos enviados solo pueden ser numericos");
			return false;
		}else if(valor_estrella <= 0 || valor_estrella > 5){
			alert("Hubo un error al con las valoraciones");
			return false;
		}else if(lugar == 0 || lugar < 0){
			alert("hubo un error con los datos, no pueden nulos o negativos");
			return false;
		}else{
			alert("pasa por aca");
			
			$.ajax({
				type:'POST',
				url:'../pag_interiores/scripts/calificar_upd.php',
				data:{
					valor:valor_estrella,
					lugar:lugar
				},
				success: function(data){
					if(data == 1){
						alert("Hubo un error los datos no son numericos");
					}else if(data == 2){
						alert("Hubo un error, los datos no pueden ser nulos o negativos");
					}else if(data == 3){
						alert("hubo un error al procesar la accion");
					}else if(data == 4){
						alert("ya has votado 3 lugares propuestos diferentes, no puede seguir votando");
					}else if(data == 5){
						alert("ya has votado este lugar, debes votar otro");
					}else if(data == 6){
						if(valor_estrella == 1){
							valoracion = "Muy Malo";
						}else if(valor_estrella == 2){
							valoracion = "Malo";
						}else if(valor_estrella == 3){
							valoracion = "Bueno";
						}else if(valor_estrella == 4){
							valoracion = "Muy Bueno";
						}else if(valor_estrella == 5){
							valoracion = "Excelente";
						} 

						$(".valoration").text(valoracion);	
					}else if(data == 7){
						alert("El evento no fue disparado");
					}else if(data == 8){
						alert("Ya existe un ganador, no es necesario votar");
					}else if(data == 9){
						alert("Solo el administrador puede desempatar");
					}else{
						alert(data);
					}
				}
			});
		}


	});
});