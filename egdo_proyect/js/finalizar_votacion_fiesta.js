$(document).ready(function(){
	
	var num = 1;
	$("#btn-fin-fiesta").click(function(){
		if(num != 1){
			alert("hubo errores en el envio de datos");
		}else{
			$.ajax({
				type:'POST',
				url:'scripts/finalizar_votacion_fiesta.php',
				data:{
					num:num
				},success:function(data){
					if(data == -1){
						alert("hubo errores en el envio de datos");
					}else if(data == 1){
						alert("Finalizo la votacion");
						location.reload();
					}
				}

			});
		}
	});

});