$(document).ready(function(){
	$(".reinicio").click(function(){
		var dias_trans = $(this).data("days");

		$.ajax({
			type:'POST',
			url:'tdesignAPI/pasar_disenio.php',
			data:{
				dias:dias_trans
			},success:function(data){
				if(data == -1){
					alert("hubo un error");
				}else if(data == 1){
					alert("Pasado a votacion, pulsa f5 para continuar");
				}else{
					alert(data);
				}
			}
		});
	});
});