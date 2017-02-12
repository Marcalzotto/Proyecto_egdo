jQuery(function($){    
				
			$("#edit-user").validate({
     
			rules:
			{
				user_name: { required:true, minlength: 4, maxlength: 45},
				user_apellido: { required:true, minlength: 4, maxlength: 45},
				user_email: { required: true, email: true },
				user_rol: { required: true, maxlength: 1 },
				user_curso: { required: true, maxlength: 3 },
				user_estado: { required: true },
				
			}, /* fin rules */
			messages:
			{  	user_name: {required: "Campo obligatorio",minlength: "El nombre es muy corto",
				maxlength:"El nombre es muy largo"},
				user_apellido:{required: "Campo obligatorio",minlength: "El nombre es muy corto",
				maxlength:"El nombre es muy largo"},
				user_email:{required: "Campo obligatorio",email:"Formato no valido"},
				user_rol: { required: "Campo obligatorio", maxlength:" Rol muy largo" },
				user_curso: { required: "Campo obligatorio", maxlength:" Curso muy largo" },
				user_estado: { required: "Campo obligatorio" },
			}, /* fin messages */
		
			submitHandler: submitForm 
		}); /* fin validate*/

		
			/* login submit */
			function submitForm()
			{  
				var data = $("#edit-user").serialize();
    
				$.ajax({
						type : 'POST',
						url  : "editar_alumno.php",
						data : data,
						
						success :  function(response)
						{      
							if(response=="ok"){
							/*$("#btn-save").html('<img src="btn-ajax-loader.gif" /> &nbsp; Signing In ...');
							setTimeout(' window.location.href = "home.php"; ',4000);*/
								$("#error").fadeOut();
								$("#error").fadeIn('slow', function(){
									$("#error").html('<div class="box success"> <i class="fa fa-info-circle" aria-hidden="true"></i> &nbsp; Datos actulizado correctamente</div>');
									$("#edit-user")[0].reset();
									window.location.href="alumno.php";
									/*$("#edit-user").fadeOut('slow', function()
									{
										$("#edit-user").fadeOut('slow');
										$("#error").html('<div class="box success"> <i class="fa fa-info-circle" aria-hidden="true"></i> &nbsp; Datos insertados correctamente</div>');
									});*/
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