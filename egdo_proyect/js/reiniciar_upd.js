$(document).ready(function(){
var num = 1;
	$("#btn-upd").click(function(){
		if(num != 1){
			alert("Hubo error al procesar la peticion");
		}else{
			$.ajax({
				type:'POST',
				url:'../pag_interiores/scripts/reiniciar_upd.php',
				data:{
					num:num
				},
				success: function(data){
					if(data == -1){
						alert("Hubo un error inesperado, intenta mas tarde");
					}else{
						alert("El evento fue reiniciado, pulsa f5 para continuar");
					}
				}
			});
		}
	});
});