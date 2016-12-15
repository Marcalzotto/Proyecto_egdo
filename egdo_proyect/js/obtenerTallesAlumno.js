$(document).ready(function(){
	
	$("#btn-enviar").click(function(){
		
		var talleBuzo = $("#buzo").val();
		var talleRemera = $("#remera").val();
		
		if(talleBuzo == "null" && talleRemera == "null"){
			
			alert("Por favor elige almenos un talle de prenda para realizar la operación");
		
		}else{

				$.ajax({
					type: 'POST',
					url: '../pag_interiores/validarTalles.php',
					data:{
						buzoTalle : talleBuzo,
						remeraTalle : talleRemera 
					},
					success: function(data){
						
						switch(data){
							case -1:
							alert("Por favor llena todos los campos de este formulario");
							break;

							case -2:
								alert("El talle elegido de buzo no concuerda con los proporcionados");
							break;

							case -3:
								alert("El talle elegido de remera no concuerda con los proporcionados");
							break;
							
							case -4:
								alert("Hubo problemas al cambiar los talles, intenta de nuevo mas tarde");
							break;

							case -5:
								alert("Hubo problemas al guardar tus talles");
							break;

							default:
								alert("La operacion se ha realizado con exito");
								myString = data.split("-",2);
								$("#formTalles table").remove();
								$("#formTalles").append("<table border='1'></table>")
								$("#formTalles table").append("<tr><th>Prenda</th><th>Talle</th><th>Talle elegído anteriormente</th></tr>");			
								$("#formTalles table").append("<tr><td>Buzo</td><td><select name='buzo' id='buzo'><option value='null'>Seleccionar</option><option value='xs'>XS</option><option value='s'>S</option><option value='m'>M</option><option value='l'>L</option><option value='xl'>XL</option><option value='xxl'>XXL</option></select></td><td>"+myString[0].toUpperCase()+"</td></tr>");					
								$("#formTalles table").append("<tr><td>Remera</td><td><select name='remera' id='remera'><option value='null'>Seleccionar</option><option value='xs'>XS</option><option value='s'>S</option><option value='m'>M</option><option value='l'>L</option><option value='xl'>XL</option><option value='xxl'>XXL</option></select></td><td>"+myString[1].toUpperCase()+"</td></tr>");												
															
							break;
						}

					}
				});
		}//

	});

});