$(document).ready(function(){

var expReg = /[^0-9]/;
	$(".del").click(function(e){
		var et = e.target;
	
		var com_num = $(this).attr("rel");
	
		if(expReg.test(com_num)){
			alert("Algunos datos no son correctos");
		}else if(com_num == 0){
			alert("Algunos datos no son correctos");
		}else{

			$.ajax({
				type:'POST',
				url:'../pag_interiores/scripts/moderar_comentario_fiesta.php',
				data:{
					com: com_num
				},
				success:function(data){
					if(data == -1){
						alert("Hubo un problema al procesar la peticion");
					}else if(data == -2){
						alert("hubo un error, no pudimos procesar tu peticion prueba mas tarde");
					}else if(data == 1){
						
						$(et).closest("div.row").fadeOut(600);
					}else{
						alert(data);
					}
				}

			});
		}


		
	});

});