$(document).ready(function(){
var num = 1;
	$("#etapa_2").click(function(){
		
		if(num != 1){
			alert("Algunos datos son incorrectos");
		}else{
			$.ajax({
				type:'POST',
				url:'scripts/votacion_segunda.php',
				data:{
					num:num
				},success:function(data){
					if(data == -1){
						alert("hubo un error al procesar la peticion");
					}else if(data == 1){
						alert("se paso a la segunda instancia pulsa f5 para continuar");
					}else{
						alert(data);
					}
				}
			});
		}
	});

});