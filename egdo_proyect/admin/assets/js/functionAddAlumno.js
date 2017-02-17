jQuery(function($){    
				
			$("#add-user").validate({
     
			rules:
			{
				user_name: { required:true, minlength: 4, maxlength: 45},
				user_apellido: { required:true, minlength: 4, maxlength: 45},
				user_email: { required: true, email: true },
				password: { required:true, minlength: 3, maxlength: 45},
				user_rol: { required: true },
				user_curso: { required: true },
			
			}, /* fin rules */
			messages:
			{  	user_name: {required: "Campo obligatorio",minlength: "El nombre es muy corto",
				maxlength:"El nombre es muy largo"},
				user_apellido:{required: "Campo obligatorio",minlength: "El nombre es muy corto",
				maxlength:"El nombre es muy largo"},
				user_email:{required: "Campo obligatorio",email:"Formato no valido"},
				password: {required: "Campo obligatorio",minlength: "Debe poseer minimo 3 caracteres",
				maxlength:"Debe poseer maximo 45 caracteres"},
				user_rol: { required: "Campo obligatorio" },
				user_curso: { required: "Campo obligatorio" },
			}, /* fin messages */
		
			submitHandler: submitForm 
		}); /* fin validate*/

		
			/* login submit */
			function submitForm()
			{  
				var data = $("#add-user").serialize();
    
				$.ajax({
						type : 'POST',
						url  : "procesar_alumno.php",
						data : data,
						
						success :  function(response)
						{      
							if(response=="ok"){
							/*$("#btn-save").html('<img src="btn-ajax-loader.gif" /> &nbsp; Signing In ...');
							setTimeout(' window.location.href = "home.php"; ',4000);*/
								$("#error").fadeOut();
								$("#error").fadeIn('slow', function(){
									$("#error").html('<div class="box success"> <i class="fa fa-info-circle" aria-hidden="true"></i> &nbsp; Datos insertados correctamente</div>');
									$("#add-user")[0].reset();
								});	
							}
							else{
							$("#error").fadeOut();
							$("#error").fadeIn('slow', function(){      
							$("#error").html('<div class="box danger"> <i class="fa fa-info-circle" aria-hidden="true"></i> &nbsp; '+response+' !</div>');
							});
							}
						}			
					});
					return false;
			} /* login submit */
    
		
}); /*end jquery function*/