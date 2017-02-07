jQuery(function($){    
				
			$("#edit-mail").validate({
     
			rules:
			{
				email: { required: true, email: true, maxlength: 45 },
				
			}, /* fin rules */
			messages:
			{  	
				email:{required: "Campo obligatorio",email:"Formato no valido", maxlength:"Debe poseer maximo 45 caracteres"},
				
			}, /* fin messages */
		
			submitHandler: submitForm 
		}); /* fin validate*/

		
			/* login submit */
			function submitForm()
			{  
				var data = $("#edit-mail").serialize();
    
				$.ajax({
						type : 'POST',
						url  : "editar_correo.php",
						data : data,
						
						success :  function(response)
						{      
							if(response=="ok"){
							/*$("#btn-save").html('<img src="btn-ajax-loader.gif" /> &nbsp; Signing In ...');
							setTimeout(' window.location.href = "home.php"; ',4000);*/
								$("#error").fadeOut();
								$("#error").fadeIn('slow', function(){
									$("#error").html('<div class="box success"> <i class="fa fa-info-circle"   	aria-hidden="true"></i> &nbsp; Datos actulizados correctamente</div>');
									$("#edit-mail")[0].reset();
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