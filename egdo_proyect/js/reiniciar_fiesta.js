$(document).ready(function(){
var num = 1;
	$("#btn-fiesta").click(function(){
		if(num != 1){
			alert("Hubo error al procesar la peticion");
		}else{
			$.ajax({
				type:'POST',
				url:'../pag_interiores/scripts/reiniciar_fiesta.php',
				data:{
					num:num
				},
				success: function(data){
					if(data == -1){
						alert("Hubo un error inesperado, intenta mas tarde");
					}else{
						alert("El evento se reinicio");
						location.reload();
					}
				}
			});
		}
	});
});