	function generar_calendario(mes,anio)
	{
		var agenda=$(".cal");
		agenda.html("<img src='../images/calendar-img/loading.gif'>");
		$.ajax({
			type: "POST",
			url: "ajax_calendario.php",
			cache: false,
			data: { mes:mes,anio:anio,accion:"generar_calendario" }
		}).done(function( respuesta ) 
		{
			agenda.html(respuesta);
		});
	}
		
	function formatDate (input) {
		var datePart = input.match(/\d+/g),
		year = datePart[0].substring(2),
		month = datePart[1], day = datePart[2];
		return day+'-'+month+'-'+year;
	}
	
	function validate_form(){
		var expRegEvento = /[^a-zA-Z0-9 .]/;
		var expRegBarrio = /[^A-Za-z ]/;
		var expRegCalle = /[^a-zA-Z0-9 .]/;
		var expRegAltura = /[^0-9]/;

		var vec = [0,0,0,0,0,0,0];
		var ne = $("#evento_titulo").val();
		var color = $("#color").val();
		var arch = $("#arch").val();
		var time = $("#evento_hora").val();
		var splitTime;
		var barrio = $("#evento_lugar").val();
		var calle  = $("#calle").val();
		var altura = $("#altura").val();

		//alert(time);
		if(ne == ""){
			$("#evento_titulo").css({'border':'1px solid red'});
			$("#field1").text("El nombre del evento no puede ser vacio");
			$("#field1").css({'display':'block'});
			vec[0] = 0;
		}else if(ne.length < 5 || ne.length > 40){
			$("#evento_titulo").css({'border':'1px solid red'});
			$("#field1").text("El nombre del evento debe tener entre 5 y 40 caracteres");
			$("#field1").css({'display':'block'});
			vec[0] = 0;
		}else if(expRegEvento.test(ne) == true){
			$("#evento_titulo").css({'border':'1px solid red'});
			$("#field1").text("El nombre del evento solo puede tener letras y numeros");
			$("#field1").css({'display':'block'});
			vec[0] = 0;
		}else{
			$("#evento_titulo").css({'border':'0'});
			$("#field1").css({'display':'none'});
			vec[0] = 1;
		}

		 if(color == 0){
			$("#color").css({'border':'1px solid red'});
			$("#field2").text("Por favor seleccione un color");
			$("#field2").css({'display':'block'});
		 	vec[1] = 0;
		 }else{
		 	$("#color").css({'border':'0'});
			$("#field2").css({'display':'none'});
		 	vec[1] = 1;
		 }

		 if(arch == ""){
		 	$("#arch").css({'border':'1px solid red'});
			$("#field3").text("Por favor seleccione un archivo");
			$("#field3").css({'display':'block'});
		 	vec[2] = 0;
		 }else{
		 	$("#arch").css({'border':'0'});
			$("#field3").css({'display':'none'});
		 	vec[2] = 1;
		 }

		 splitTime = time.split(':');
		 if(time == ""){
		 		$("#evento_hora").css({'border':'1px solid red'});
		 		$("#field4").text("Por favor introduce la hora del evento");
		 		$("#field4").css({'display':'block'});
		 		vec[3] = 0;
		 }else if((splitTime[0] < 00 && splitTime[0] > 23) || (splitTime[1] < 00 && splitTime[1] > 59)){
		 		$("#evento_hora").css({'border':'1px solid red'});
		 		$("#field4").text("Por favor introduce una hora valida");
		 		$("#field4").css({'display':'block'});
		 		vec[3] = 0;
		 }else{
		 	$("#evento_hora").css({'border':'0'});
		 	$("#field4").css({'display':'none'});
		 	vec[3] = 1;
		 }	

		 if(barrio == ""){
		 		$("#evento_lugar").css({'border':'1px solid red'});
		 		$("#field5").text("Por favor introduce el barrio");
		 		$("#field5").css({'display':'block'});
		 		vec[4] = 0;
		 }else if(barrio.length > 50){
		 		$("#evento_lugar").css({'border':'1px solid red'});
		 		$("#field5").text("El nombre del barrio es demasiado largo");
		 		$("#field5").css({'display':'block'});
		 		vec[4] = 0;
		 }else if(expRegBarrio.test(barrio) == true){
		 		$("#evento_lugar").css({'border':'1px solid red'});
		 		$("#field5").text("El nombre del barrio solo puede contener letras");
		 		$("#field5").css({'display':'block'});
		 		vec[4] = 0;
		 }else{
		 		$("#evento_lugar").css({'border':'0'});
		 		$("#field5").css({'display':'none'});
		 		vec[4] = 1;
		 }

		 if(calle == ""){
		 	$("#calle").css({'border':'1px solid red'});
		 	$("#field6").text("Por favor introduce el nombre de la calle");
		 	$("#field6").css({'visibility':'visible'});
		 	vec[5] = 0;
		 }else if(expRegCalle.test(calle) == true){
		 	$("#calle").css({'border':'1px solid red'});
		 	$("#field6").text("Por favor introduce un nombre de calle valido");
		 	$("#field6").css({'visibility':'visible'});
		 	vec[5] = 0;
		 }else{
		 	$("#calle").css({'border':'0'});
		 	$("#field6").css({'visibility':'hidden'});
		 	vec[5] = 1;
		 }

		 if(altura == ""){
		 	$("#altura").css({'border':'1px solid red'});
		 	$("#field7").text("Por favor introduce la altura");
		 	$("#field7").css({'visibility':'visible'});
		 	vec[6] = 0;
		 }else if(expRegAltura.test(altura) == true || altura < 0){
		 	$("#altura").css({'border':'1px solid red'});
		 	$("#field7").text("Por favor introduce una altura valida");
		 	$("#field7").css({'visibility':'visible'});
		 	vec[6] = 0;
		 }else{
		 	$("#altura").css({'border':'0'});
		 	$("#field7").css({'visibility':'hidden'});
		 	vec[6] = 1;
		 }

		 if(vec[0] == 1 && vec[1] == 1 && vec[2] == 1 && vec[3] == 1 && vec[4] == 1 && vec[5] == 1 && vec[6] == 1)
		 return true;
		 else
		 return false;	
	}

		$(document).ready(function()
		{
			/* GENERAMOS CALENDARIO CON FECHA DE HOY */
			generar_calendario("<?php if (isset($_POST["mes"])) echo $_POST["mes"]; ?>","<?php if (isset($_POST["anio"])) echo $_POST["anio"]; ?>");
			
			/* AGREGAR UN EVENTO */
			$(document).on("click",'a.add',function(e) 
			{
				e.preventDefault();
				var id = $(this).data('evento');
				var fecha = $(this).attr('rel');
				
				$('#mask').fadeIn(1000).html("<div id='nuevo_evento' class='window' rel='"+fecha+"'><h2>Agregar un evento el "+formatDate(fecha)+"</h2><a href='#' class='close' rel='"+fecha+"'>&nbsp;</a><div id='respuesta_form'></div><form class='formeventos' id='form_inserta_eventos'><input type='text' name='evento_titulo' id='evento_titulo' class='required' placeholder='Escribe el nombre del evento'><p id='field1'></p><select name='color' id='color' class='required'><option value='0'>Elegir Color</option><option value='1'>Cyan</option></select><p id='field2'></p><label for='arch'>Seleccionar un icono</label><input name='arch' id='arch' type='file' class='required'/><p id='field3'></p><label for='evento_hora'>Elegir la hora del evento</label><input type='time' name='evento_hora' id='evento_hora' class='required' placeholder='Escribe la hora del evento'><p id='field4'></p><input type='text' name='evento_lugar' id='evento_lugar' class='required' placeholder='Barrio'><p id='field5'></p><input type='text' name='calle' id='calle' placeholder='Calle' /><input type='number' name='altura' id='altura' placeholder='altura' min='0' max='100000'/><div class='fields67'><p id='field6'></p><p id='field7'></p></div><input type='button' name='Enviar' value='Guardar' class='enviar'><input type='reset' value='limpiar' /><input type='hidden' name='evento_fecha' id='evento_fecha' value='"+fecha+"'><input type='hidden' id='curso_evento' name='curso_evento' value='<?php echo base64_encode($_SESSION['curso']); ?>' /><input type='hidden' name='accion' id='accion' value='guardar_evento' /></form></div>");
			});
			
			/* LISTAR EVENTOS DEL DIA */
			$(document).on("click",'a.modal',function(e) 
			{
				e.preventDefault();
				var fecha = $(this).attr('rel');
				
				$('#mask').fadeIn(1000).html("<div id='nuevo_evento' class='window' rel='"+fecha+"'><h2>Eventos del "+formatDate(fecha)+"</h2><a href='#' class='close' rel='"+fecha+"'>&nbsp;</a><div id='respuesta'></div><div id='respuesta_form'></div></div>");
				$.ajax({
					type: "POST",
					url: "ajax_calendario.php",
					cache: false,
					data: { fecha:fecha,accion:"listar_evento" }
				}).done(function( respuesta ){
					$("#respuesta_form").html(respuesta);
				});
			
			});

			//ver datos de un evento en particular 
			$(document).on("click",'a.ver_evento',function (e){	
				
				var id = $(this).attr('rel');
				var fecha = $(".close").attr('rel');

				e.preventDefault();
				$('#mask').append("<div id='datos_evento' class='window' rel='"+fecha+"'><h2>Datos evento: "+formatDate(fecha)+"</h2><a href='#' class='close2' rel='"+fecha+"'>&nbsp;</a><div id='respuesta_form2'></div></div>");
				$('#datos_evento').fadeIn(1000);
				$.ajax({
					type:"POST",
					url:"ajax_calendario.php",
					cache: false,
					data:{id:id, fecha:fecha, accion:"ver_datos_evento"}
				}).done(function( respuesta ){
					$("#respuesta_form2").html(respuesta);
				});

			});
			//cerrar div #nuevo_evento
			$(document).on("click",'.close',function (e){
				e.preventDefault();
				$('#mask').fadeOut();
				setTimeout(function() 
				{ 
					var fecha=$(".window").attr("rel");
					var fechacal=fecha.split("-");
					generar_calendario(fechacal[1],fechacal[0]);
				}, 500);
			});
			//cerrar div #datos_evento
			$(document).on("click",'.close2',function (e){
				e.preventDefault();
				$('#datos_evento').fadeOut(500);
				$('#datos_evento').remove();
			});

			//guardar evento
			$(document).on("click",'.enviar',function (e) {
				e.preventDefault();
				var validation;
				validation = validate_form();	

				if (validation==true){
				
					$("#respuesta_form").html("<img src='../images/calendar-img/loading.gif'>");
					var fecha=$("#evento_fecha").val();
				

					var insForm = new FormData(document.getElementById("form_inserta_eventos"));
					insForm.append("key","value");
					
					$.ajax({
						type: "POST",
						url: "ajax_calendario.php",
						dataType: "html",
						data: insForm,
						cache: false,
						contentType: false,
						processData: false
					}).done(function( respuesta2 ){
						$("#respuesta_form").html(respuesta2);
						$(".formeventos .close").hide();
						setTimeout(function(){ 
							
							$('#mask').fadeOut('fast');
							var fechacal=fecha.split("-");
							generar_calendario(fechacal[1],fechacal[0]);
						}, 3000);
					});
				}
			
			});

			//modificar un evento(solamente ver los datos dentro del form)
			$(document).on("click",'a.modificar_evento', function (e){
					
					e.preventDefault();
					var id = $(this).attr("rel");
					
					var fecha = $(".window").attr("rel");
					$("#mask").append("<div id='modifica_evento' class='window' rel='"+fecha+"' rel2='"+id+"'><h2>modificar evento del "+formatDate(fecha)+"</h2><a href='#' class='close3' rel='"+fecha+"'>&nbsp;</a><div id='respuesta_form3'></div><form id='formeventos_mod' class='formeventos_mod'></form></div>");

					$.ajax({
						type:"POST",
						url:"ajax_calendario.php",
						cache:false,
						data:{id:id, fecha:fecha, accion:"solicitar_datos"}
				}).done(function(datos){
						$("#formeventos_mod").html(datos);
				});
			});
				
			//enviar las modificaciones al servidor
			$(document).on("click",".modificar", function (e){
				e.preventDefault();
				//$("#respuesta_form3").html("<img src='../images/calendar-img/loading.gif'>");

				var valido;
				valido = validate_form();
				var id = $("#modifica_evento").attr("rel2");
				var fecha = $("#evento_fecha").val();
					
					if(valido == true){
						$("#respuesta_form3").html("<img src='../images/calendar-img/loading.gif'>");
						console.log(valido);
						var objForm = new FormData(document.getElementById("formeventos_mod"));
						objForm.append("key","value");
						
						$.ajax({
							url: "ajax_calendario.php",
							type:"post",
							dataType: "html",
							data: objForm,
							cache: false,
							contentType: false,
							processData: false
						
						}).done(function(respuesta){
							$("#respuesta_form3").html("<img src='../images/calendar-img/loading.gif'>");
							$("#respuesta_form3").html(respuesta);
						});
					
							setTimeout(function(){ 
								$('#mask').fadeOut('fast');
								var fechacal=fecha.split("-");
								generar_calendario(fechacal[1],fechacal[0]);
							}, 3000);

					}

				
			});
					
			//cerrar div modifica_evento
			$(document).on("click",'.close3',function (e) 
			{
				e.preventDefault();
				$('#modifica_evento').fadeOut(500);
				$('#modifica_evento').remove();
			});


			//eliminar evento
			$(document).on("click",'.eliminar_evento',function (e) {
				e.preventDefault();
				var current_p=$(this);
				$("#respuesta").html("<img src='../images/calendar-img/loading.gif'>");
				var id=$(this).attr("rel");
				$.ajax({
					type: "POST",
					url: "ajax_calendario.php",
					cache: false,
					data: { id:id,accion:"borrar_evento" }
				}).done(function( respuesta2 ) 
				{
					$("#respuesta").html(respuesta2);
					current_p.parent("p").fadeOut();
				});
			});
				
			$(document).on("click",".anterior,.siguiente",function(e)
			{
				e.preventDefault();
				var datos=$(this).attr("rel");
				var nueva_fecha=datos.split("-");
				generar_calendario(nueva_fecha[1],nueva_fecha[0]);
			});

		});