jQuery(function($){    
				
			$("#edit-datos").validate({
     
			rules:
			{
				user_name: { required:true, minlength: 3, maxlength: 45},
				user_apellido: { required:true, minlength: 3, maxlength: 45},
				/*user_email: { required: true, email: true },*/
			}, /* fin rules */
			messages:
			{  	user_name: {required: "Campo obligatorio",minlength: "El nombre es muy corto",
				maxlength:"El nombre es muy largo"},
				user_apellido:{required: "Campo obligatorio",minlength: "El nombre es muy corto",
				maxlength:"El nombre es muy largo"},
				/*user_email:{required: "Campo obligatorio",email:"Formato no valido"},*/
			}, /* fin messages */
		
			submitHandler: submitForm 
		}); /* fin validate*/

		
			/* login submit */
			function submitForm()
			{  
				var data = $("#edit-datos").serialize();
    
				$.ajax({
						type : 'POST',
						url  : "editar_datosPer.php",
						data : data,
						
						success :  function(response)
						{      
							if(response=="ok"){
							/*$("#btn-save").html('<img src="btn-ajax-loader.gif" /> &nbsp; Signing In ...');
							setTimeout(' window.location.href = "home.php"; ',4000);*/
								$("#error").fadeOut();
								$("#error").fadeIn('slow', function(){
									$("#error").html('<div class="box success"> <i class="fa fa-info-circle" aria-hidden="true"></i> &nbsp; Datos actulizados correctamente</div>');
									$("#edit-datos")[0].reset();
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