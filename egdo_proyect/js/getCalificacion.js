$(document).ready(function(){

var val = 0; 
		
		$(".formCalificar form label").click(function(){
			var id = $(this).attr("id");
			if(id == "label1"){

				val = $("#radio1").val();
				
				$("#texto").text("No me gustó en lo absoluto.");
				$("#texto").fadeIn('slow');
			
			}else if(id == "label2"){

				val = $("#radio2").val();
				
				$("#texto").text("No me gustó.");
				$("#texto").fadeIn('slow');
			
			}else if(id == "label3"){

				val = $("#radio3").val();
				
				$("#texto").text("Esta bien.");
				$("#texto").fadeIn('slow');
			
			}else if(id == "label4"){

				val = $("#radio4").val();
				
				$("#texto").text("Me gustó.");
				$("#texto").fadeIn('slow');
				
			}else if(id == "label5"){

				val = $("#radio5").val();

				$("#texto").text("Me encantó.");
				$("#texto").fadeIn('slow');
				
			}

			$.ajax({
				type:'POST',
				url:'../pag_interiores/registrarCalificacion.php',
				data:{
					estrellasValor : val
				},
				success:function(data){
						if(data == 1){
							alert("bien");
							var anchoNuevo = val * 150;
							var division = anchoNuevo / 5;
							division = division + 'px';
							alert(division);

							$("#estrellas-cambia").css({'width':division,'height':'30px'});

						}else if(data == -1){
							alert("mal");
						}else if(data == -2){
							alert("problemas del servidor");
						}else{
							alert(data);
						}
				}

			});
		});
});