$(document).ready(function(){

	var talleRemeraEliminado = "";
	var talleBuzoEliminado = "";

	$("#btn-eliminar").click(function(){
			
			if($("#p1").is(":checked")){
				
				talleBuzoEliminado = $("#p1").val();
				
			}
			
			if($("#p2").is(":checked")){
				
				talleRemeraEliminado = $("#p2").val();
				
			}

		if((talleBuzoEliminado == "") && (talleRemeraEliminado == "")){
			alert("Por favor tilda la casilla del talle a eliminar");
		}else{
		
				$.ajax({
					type: 'POST',
					url: '../pag_interiores/eliminarTalle.php',
					data:{
						buzo : talleBuzoEliminado,
						remera : talleRemeraEliminado 
					},
					success: function(data){
						
							switch(data){
								
								case "uno":
								alert("Por favor tilda la casilla del talle a eliminar");
								break;
								
								case "dos": 
								alert("No tienes ningun talle para eliminar");
								break;
								
								case "tres":
								alert("Lo sentimos hubo problemas internos, por favor intenta mas tarde");
								break;
								
								case "cuatro":
								alert("Hubo problemas para realizar la operacion, intenta nuevamente mas tarde");
								break;
			
								default:
								alert("La operacion se realizo con exito");
								
								myString2 = data.split("-",2);
								$("#formTalles table").remove();
								$("#formTalles").append("<table border='1'></table>")
								$("#formTalles table").append("<tr><th>Prenda</th><th>Talle</th><th>Talle elegído anteriormente</th></tr>");			
								$("#formTalles table").append("<tr><td>Buzo</td><td><select name='buzo' id='buzo'><option value='null'>Seleccionar</option><option value='xs'>XS</option><option value='s'>S</option><option value='m'>M</option><option value='l'>L</option><option value='xl'>XL</option><option value='xxl'>XXL</option></select></td><td>"+myString2[0].toUpperCase()+"</td></tr>");					
								$("#formTalles table").append("<tr><td>Remera</td><td><select name='remera' id='remera'><option value='null'>Seleccionar</option><option value='xs'>XS</option><option value='s'>S</option><option value='m'>M</option><option value='l'>L</option><option value='xl'>XL</option><option value='xxl'>XXL</option></select></td><td>"+myString2[1].toUpperCase()+"</td></tr>");												
								
								break;
							}
					}
				});
		}	
	});

	$("#btn-limpiarchk").click(function(){
			
			$("input[name='prenda']").each(function(){
				$(this).removeAttr("checked");
			});
	});

});