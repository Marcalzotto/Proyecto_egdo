$(document).ready(function(){
	
	$("#btn-disparar").click(function(){

		$.get("tdesignAPI/iniciarEvento.php",function(data, status){
			$(".span").text(data);
		});
	});
});