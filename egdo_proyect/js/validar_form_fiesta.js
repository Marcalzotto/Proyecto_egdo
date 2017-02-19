$(document).ready(function(){
//Para mover archivos en php desde una ubicacion a otra, ver funcion copy(), rename(), move_uploaded_file()
	//$("#main-wrapper-ad .container .main-content button[type=button]").click(function(){
			
		$("#form_fiesta").on("submit", function(evento){
			evento.preventDefault();
			var formData = new FormData(document.getElementById("form_fiesta"));

			$.ajax({
				url: "../pag_interiores/scripts/validar_form_fiesta.php",
				type: "POST",
				dataType: "HTML",
				data: formData,
				cache: false,
				contentType: false,
				processData: false
			}).done(function(data){
					//$("#error").text(data);
					alert(data);
	    });
     });



			//alert("vamos por el buen camino");
			/*var nombre = $("#name").val();
			var direccion = $("#dir").val();
			var cell = $("#cell_phone").val();
			var redes = $("#redes").val();
			var web = $("#web_page").val();
			var detalles = $("#detalles").val();
			var foto_perfil = $("#file_perfil").get(0).files.length;
			var foto_lugar = $("#file_lugar").get(0).files.length;

			//variables para extraer el nombre del archivo
			var path_perfil = ""; //c://fakepath/nombrearch
			var nombre_foto_perfil = "";
			var aux1 = 12;
			var max1 = 0;
			
			var path_lugar = ""; //c://fakepath/nombrearch
			var nombre_foto_lugar = "";
			var aux2 = 12;
			var max2 = 0;

			
			//fin de las variables

			var exp_nombre = /[^a-zA-Z0-9 ]/;
			var exp_email = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
		 	//var exp_web = /^http[s]?:\/\/[\w]+([\.]+[\w]+)+$/;
		 	var exp_cell = /^\d{8,13}$/;
		 	var exp_facebook = /(?:(?:http|https):\/\/)?(?:www.)?facebook.com\/?/;
		 	var exp_twitter = /(?:(?:http|https):\/\/)?(?:www.)?twitter.com\/?/;
		 	var exp_instagram = /(?:(?:http|https):\/\/)?(?:www.)?instagram.com\/?/;
		 	var exp_url = /^(www|http|https:\/\/)(.*\.(ar$|net$|com$))/;
			var exp_reg_file = /^.*\.(jpg|JPG|png|PNG)$/; 


		 	var necesario = 0;
		 	var innecesario = 0;
		 //validaciones para el nombre del lugar	
		 if(nombre == ""){
		 	alert("Por favor introduce el nombre del lugar");
		 	return false;
		 }else if(nombre.length < 5 || nombre.length > 50){
		 	alert("Por favor introduce un nombre que tenga entre 5 y 50 caracteres de longitud");
		 	return false;
		 }else if(exp_nombre.test(nombre)){
		 	alert("El nombre solo puede tener mayusculas, minusculas y numeros y espacios en blanco");
		 	return false;	
		 }
		 necesario ++;

		 //validaciones para el email
		 if(direccion == ""){
		 	alert("Por favor introduce la direccion del lugar");
		 	return false;
		 }
		 necesario++;
		 //validaciones para el celular
		 if(cell == ""){
		 	alert("Por favor introduce el numero de celular");
		 	return false;
		 }else if(!exp_cell.test(cell)){
		 	alert("Por favor pon tu numero de telefono sin guiones");
		 	return false;
		 } 
		 necesario ++;
		 
		 if(redes.length > 0){
		 		if(!exp_facebook.test(redes) && !exp_twitter.test(redes) && !exp_instagram.test(redes)){
		 				alert("Por favor introduce una red social valida");
		 				return false;
		 		}
		 }
			innecesario++;
			
			if(web.length > 0){
				if(!exp_url.test(web)){
						alert("Por favor introduce una direccion web valida");
						return false;
				}
			}
			innecesario++;
			
			if(detalles == ""){
				alert("Por favor introduce los detalles del lugar");
				return false;
			}else if(detalles.length < 30 || detalles.length > 250){
				alert("Esta informacion debe contener al menos 30 caracteres y no superar los 250 de largo");
				return false;
			}
			necesario++;

			if(foto_perfil == 0){
				alert("Por favor sube la foto de perfil de este lugar");
				return false;
			}else{
				path_perfil = $("#file_perfil").val();
				max1 = path_perfil.length;
				nombre_foto_perfil = path_perfil.substring(aux1,max1);
				//alert("este es el nombre de la foto de perfil: "+nombre_foto_perfil);
				if(!exp_reg_file.test(nombre_foto_perfil)){
					alert("La extension de tu imagen debe ser jpg o png");
					return false;
				}else{
					$("#name_foto_perfil").val(nombre_foto_perfil);
				}
			}
			necesario++;
			if(foto_lugar == 0){
				alert("Por favor sube una foto mas de este lugar");
				return false;
			}else{
				path_lugar = $("#file_lugar").val();
				max2 = path_lugar.length;
				nombre_foto_lugar = path_lugar.substring(aux2,max2);
				if(!exp_reg_file.test(nombre_foto_lugar)){
					alert("La extension de tu imagen debe ser jpg o png");
					return false;
				}else{
					$("#name_foto_lugar").val(nombre_foto_lugar);
				}

				
			}
			necesario++;
			if(necesario < 6){
				alert("no se han validado todos los campos necesarios");
				return false;
			}else{
				alert("Estan los campos necesarios para pasar:" + necesario);
				return false;
			}
			
		 	
			return false;*/


	//});

});