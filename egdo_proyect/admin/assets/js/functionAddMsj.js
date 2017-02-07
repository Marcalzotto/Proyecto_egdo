jQuery(function($){    
				
			$("#add-mensaje").validate({
     
			rules:
			{
				asunto: { required:true, minlength: 4, maxlength: 45},
				ccomment: { required:true},
				receptor: { required: true },
				
			}, /* fin rules */
			messages:
			{  	asunto: {required: "Campo obligatorio",minlength: "Asunto es muy corto",
				maxlength:"Asunto es muy largo"},
				ccomment: { required: "Ingrese su mensaje"},
				receptor: { required: "Seleccione una opcion" },
				
			}, /* fin messages */
		
			submitHandler: submitForm 
		}); /* fin validate*/

		
			/* login submit */
			function submitForm()
			{  
				var data = $("#add-mensaje").serialize();
    
				$.ajax({
						type : 'POST',
						url  : "procesar_mensaje.php",
						data : data,
						
						success :  function(response)
						{      
							if(response=="ok"){
							/*$("#btn-save").html('<img src="btn-ajax-loader.gif" /> &nbsp; Signing In ...');
							setTimeout(' window.location.href = "home.php"; ',4000);*/
								$("#error").fadeOut();
								$("#error").fadeIn('slow', function(){
									$("#error").html('<div class="box success"> <i class="fa fa-info-circle" aria-hidden="true"></i> &nbsp; Mensaje enviado correctamente</div>');
									$("#add-mensaje")[0].reset();
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