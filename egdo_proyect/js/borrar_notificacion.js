$(document).ready(function(){

	$(".del").click(function (e){

		var id_notificacion = $(this).attr("rel");
		var user = $(this).attr("u");
		
		$.ajax({
			url:"../pag_interiores/borrar_notificacion.php",
			type:"POST",
			data:{
				id:id_notificacion,
				user:user
			},
			success:function(data){
				if(data == -1){
					alert("hubo un error en el servidor");
					
				}else{
					$(e.target).closest("a").fadeOut(500);
					
				}
				
			}
		});
		//$(this).closest("a").fadeOut(500);
		return false;
	});
});