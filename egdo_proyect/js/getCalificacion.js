$(document).ready(function(){

var val = 0; 
var id_empresa = $("#hidden").val();
var valores = 0;
var ancho_barras = 0;

		//alert(id_empresa);
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
					estrellasValor : val,
					empresa: id_empresa
				},
				success:function(data){
						
					  if(data == -1){
							alert("Lo sentimos hubo un error");
						}else if(data == -2){
							alert("problemas del servidor");
						}else{
							//alert(data);
							valores = data.split("-",13);//Traemos todos los valores a cambiar del server 12 en total
//Calificacion,ancho estrellas, total votos, ancho barra n°5, cantidad calificacion valor 5, ancho barra n°X, cantidad calificacion valor x(todo hasta 1)
							$("#calificacion .l1 li").find('.puntaje').text(valores[0]);

							//alert(valores[0]+" "+valores[1]+" "+valores[2]+" "+valores[3]+" "+valores[4]+" "+valores[5]+" "+valores[6]+" "+valores[7]+" "+valores[8]+" "+valores[9]+" "+valores[10]+" "+valores[11]+" "+valores[12]);
							//var anchoNuevo = valores[0] * 150;
							//var division = anchoNuevo / 5;
							var division = 0;
							division = valores[1] + 'px';
							
							$("#estrellas-cambia").css({'width':division,'height':'30px'});
							$("#calificacion .l1 li").find('span').text(valores[2]+' en Total.');
						
						var i = 3;
						var j = 4;
						
						$("#calificacion .l2 li").each(function(index){
							ancho_barras = valores[i] + 'px';
							$(this).children('div').css({'width':ancho_barras, 'height':'20px'});
							i = i + 2;
							
							$(this).children('.num').text(valores[j]);
							j = j + 2;
						
						});

						}
				}

			});
		});
});