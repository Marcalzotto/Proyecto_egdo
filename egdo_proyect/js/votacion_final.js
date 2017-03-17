$(document).ready(function(){
var num = 1;
	$("#etapa_3").click(function(){
		
		if(num != 1){
			alert("Algunos datos son incorrectos");
		}else{
			$.ajax({
				type:'POST',
				url:'scripts/votacion_final.php',
				data:{
					num:num
				},success:function(data){
					if(data == -1){
						alert("hubo un error al procesar la peticion");
					}else if(data == 1){
						alert("La votacion ha finalizado");
						location.reload();
					}else{
						alert(data);
					}
				}
			});
		}
	});

});