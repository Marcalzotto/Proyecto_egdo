$(document).ready(function(){
	
	var estandar = "estandar";
	var otra = "otra"; 
	$('#btn-bandera').click(function(){
			var medida = "";
			var medida = $('input:radio[name=medida]:checked').val();
			
			if(medida == undefined){
				alert("Por favor elige una medida de banera");
				return false;
			}else if(estandar.localeCompare(medida) != 0 && otra.localeCompare(medida) != 0){
				alert("Hubo un error al seleccionar la medida, por favor intentalo nuevamente");
				//alert("Hubo un error por favor vuelve a elegir la medida de la bandera");
				//return false;
			}else{
				
				$.ajax({
					url: '../pag_interiores/validarBandera.php',
					type: 'POST',
					data:{
						medidaBand : medida
					},
					success: function(data){
						alert(data);
					}
				});
				//return false;
			}


	});

	$("#cancelar").click(function(){
		
			$('input:radio[name=medida]:checked').attr("checked", false);
		
		return false;
	});
});