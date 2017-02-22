$(document).ready(function(){

var name = "";
var name_arch = "";
var aux = 12;
var max = "";

	$("#d_frontal").change(function(){
		if($("#d_frontal").get(0).files.length > 0){
			
			name = $("#d_frontal").val();
			
			max = name.length;
			name_arch = name.substring(aux, max);
			//$("#si_file").css({'left':'28em'});
			$("#si_file").text(name_arch);
		}else{
			//$("#si_file").css({'left':'28em'});
			$("#si_file").text("Ningun archivo seleccionado");
		}

	});

});
