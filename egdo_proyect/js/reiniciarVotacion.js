$(document).ready(function(){

	var num = 1;
	$("#volver_disenio").click(function(){

		$.ajax({
			type:'POST',
			url:'scripts/reiniciarVotacion.php',
			data:{
				num:num
			},
			success:function(data){
				if(data == 1){
					alert("Se ha reiniciado la votacion, por favor pulsa f5 para continuar");
				}else if(data == 2){
					alert("Hubo un error inesperado");
				}else if(data == 3){
					alert("hubo un error inesperado, por favor intenta mas tarde");
				}
			}
		});
	});
});