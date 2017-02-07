jQuery(function($){    
				
			$("#edit-pass").validate({
     
			rules:
			{
				password: { required:true, minlength: 3, maxlength: 45},
				rpassword: { equalTo: "#password", minlength: 3, maxlength: 45 },
				
			}, /* fin rules */
			messages:
			{  	
				password: {required: "Campo obligatorio",minlength: "Debe poseer minimo 3 caracteres",
				maxlength:"Debe poseer maximo 45 caracteres"},
				rpassword:{ equalTo: "Campos deben coincidir", minlength: "Debe poseer minimo 3 caracteres", maxlength:"Debe poseer maximo 45 caracteres" },
				
			}, /* fin messages */
		
			submitHandler: submitForm 
		}); /* fin validate*/

		
			/* login submit */
			function submitForm()
			{  
				var data = $("#edit-pass").serialize();
    
				$.ajax({
						type : 'POST',
						url  : "editar_pass.php",
						data : data,
						
						success :  function(response)
						{      
							if(response=="ok"){
							/*$("#btn-save").html('<img src="btn-ajax-loader.gif" /> &nbsp; Signing In ...');
							setTimeout(' window.location.href = "home.php"; ',4000);*/
								$("#error").fadeOut();
								$("#error").fadeIn('slow', function(){
									$("#error").html('<div class="box success"> <i class="fa fa-info-circle" aria-hidden="true"></i> &nbsp; Datos actulizados correctamente</div>');
									$("#edit-pass")[0].reset();
								
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