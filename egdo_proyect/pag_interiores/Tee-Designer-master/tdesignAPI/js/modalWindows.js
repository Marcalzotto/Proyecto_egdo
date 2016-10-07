$(document).ready(function(){
	//cuando hago click en la imagen de la remera que esta a la derecha
	var prendaBorrada;

	$(".remera").click(function(){
		
		if($("#modal-tee").length){
			
			$("#modal-tee").css("display", "block");
			$(".layer2").css("visibility", "visible");
		}else{
			$(".messaje").text("No tienes disenios disponibles");
			$(".messaje").fadeIn('slow');
			setTimeout(function(){$(".messaje").fadeOut('slow');}, 3500);
		}

	});

//cuando hago click en la imagen del buzo que esta a la derecha	
	$(".buzo").click(function(){
		if($("#modal-hoodie").length){
			
			$("#modal-hoodie").css("display","block");
			$(".layer2").css("visibility","visible");
		
		}else{
			$(".messaje").text("No tienes disenios disponibles");
			$(".messaje").fadeIn('slow');
			setTimeout(function(){$(".messaje").fadeOut('slow');}, 3500);
		}
	});

//cuando hago click en la imagen de la bandera que esta a la derecha
	$(".bandera").click(function(){
		if($("#modal-flag").length){
			
			$("#modal-flag").css("display","block");
			$(".layer2").css("visibility","visible");
		}else{
			$(".messaje").text("No tienes disenios disponibles");
			$(".messaje").fadeIn('slow');
			setTimeout(function(){$(".messaje").fadeOut('slow');}, 3500);
		}
	});

	//cuando presiona el boton cerrar de la ventana de los buzos
	$("#btn-cerrar1").on("click", function(){
		
		$("#modal-hoodie").css("display","none");
		$(".layer2").css("visibility","hidden");
		
	});

	//cuando presiona el boton eliminar debajo del buzo
	$(".delBuzo").click(function(){
		
		var srcFrontal = $("#modal-hoodie .front").attr('src');
		var srcEspalda = $("#modal-hoodie .back").attr('src');

		$(".buzo div").remove();
		$("#modal-hoodie").remove();
		prendaBorrada = 1;

		$.ajax({
					type: 'POST',
					url: 'tdesignAPI/borrarDisenios.php',
					data:{
						frontal : srcFrontal,
						espalda : srcEspalda, 
						prenda : prendaBorrada
					},
					success: function(data){
						
						$(".messaje").text(data);
						$(".messaje").fadeIn('slow');
						setTimeout(function(){$(".messaje").fadeOut('slow');}, 3500);
					}	

		});

	});

	//cuando presiona el boton cerrar de la ventana de las remeras
	$("#btn-cerrar2").click(function(){
		$("#modal-tee").css("display","none");
		$(".layer2").css("visibility","hidden");
	});

	//cuando presiona el boton eliminar debajo de la remera
	$(".delRemera").click(function(){
		
		var srcFrontal = $("#modal-tee .front").attr('src');
		var srcEspalda = $("#modal-tee .back").attr('src');
		
		$(".remera div").remove();
		$("#modal-tee").remove();

		prendaBorrada = 2;

		$.ajax({
					type: 'POST',
					url: 'tdesignAPI/borrarDisenios.php',
					data:{
						frontal : srcFrontal,
						espalda : srcEspalda, 
						prenda : prendaBorrada
					},
					success: function(data){
						
						$(".messaje").text(data);
						$(".messaje").fadeIn('slow');
						setTimeout(function(){$(".messaje").fadeOut('slow');}, 3500);
					}	

		});

	});

	//cuando presiona el boton cerrar de la ventana  de las banderas
	$("#btn-cerrar3").click(function(){
		$("#modal-flag").css("display","none");
		$(".layer2").css("visibility","hidden");
	});

	//cuando presiona el boton eliminar debajo de la bandera
	$(".delBandera").click(function(){

		var srcFrontal = $("#modal-flag .front").attr('src');
		var srcEspalda = $("#modal-flag .back").attr('src');

		$(".bandera div").remove();
		$("#modal-flag").remove();

		var prendaBorrada = 3;
		$.ajax({
					type: 'POST',
					url: 'tdesignAPI/borrarDisenios.php',
					data:{
						frontal : srcFrontal,
						espalda : srcEspalda, 
						prenda : prendaBorrada
					},
					success: function(data){
						
						$(".messaje").text(data);
						$(".messaje").fadeIn('slow');
						setTimeout(function(){$(".messaje").fadeOut('slow');}, 3500);
					}	

		});

	});

});