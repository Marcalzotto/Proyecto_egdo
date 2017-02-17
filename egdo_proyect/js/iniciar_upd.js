$(document).ready(function(){

	$("#iniciar_upd").click(function(){

		var evento = $(this).attr("rel");

		$.ajax({
			type:"POST",
			url: "../pag_interiores/scripts/inicia_upd.php",
			data:{
				evento:evento
			}, success: function(data){
					
					$("#main-wrapper-ad .container .main-content .respond").text(data);
			}
		});
	
	});

});