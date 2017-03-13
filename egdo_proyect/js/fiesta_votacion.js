$(document).ready(function(){
var num = 1;
	$("#btn-votacion-fiesta").click(function(){
		
		if(num != 1){
			alert("Algunos datos son incorrectos");
		}else{
			$.ajax({
				type:'POST',
				url:'scripts/fiesta_votacion.php',
				data:{
					num:num
				},success:function(data){
					if(data == -1){
						alert("hubo un error al procesar la peticion");
					}else if(data == 1){
						alert("cambiado a votacion, pulsa f5 para continuar");
					}else{
						alert(data);
					}
				}
			});
		}
	});

});