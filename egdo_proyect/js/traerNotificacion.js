$(document).ready(function(){

	var check = true;
	setInterval(function(){

		$.ajax({
			type:"POST",
			url:"../pag_interiores/notificacion_en_pantalla.php",
			data:{
				check:check
			},
			success:function(respond){

			}
		});
		
	},10000);

});