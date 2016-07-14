$(document).ready(function(){

	$(".formCalificar form label").click(function(){


			var id = $(this).attr("id");
			if(id == "label1"){
				
				$("#texto").text("No me gustó en lo absoluto.");
				$("#texto").fadeIn('slow');
			
			}else if(id == "label2"){
				
				$("#texto").text("No me gustó.");
				$("#texto").fadeIn('slow');
			
			}else if(id == "label3"){
				
				$("#texto").text("Esta bien.");
				$("#texto").fadeIn('slow');
			
			}else if(id == "label4"){
				
				$("#texto").text("Me gustó.");
				$("#texto").fadeIn('slow');
				
			}else if(id == "label5"){

				$("#texto").text("Me encantó.");
				$("#texto").fadeIn('slow');
				
			}

	});

});