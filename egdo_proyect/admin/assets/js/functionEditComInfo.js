		jQuery(function($){    
				
			$("#edit-comment").validate({
     
			rules:
			{
				comment: { required: true },
				agree: { required: true },
			
			}, /* end rules */
			messages:
			{
				comment: { required: "Seleccione una categoria" },
				agree: { required: "Seleccione estado comentario" },
			}, /* end messages */
   
			submitHandler: submitForm 
		
		}); /* end validate*/

		/* login submit */
			function submitForm()
			{  
				var data = $("#edit-comment").serialize();
    
				$.ajax({
						type : 'POST',
						url  : "editar_comInfoViaje.php",
						data : data,
						
						success :  function(response)
						{      
							if(response=="ok"){
							/*$("#btn-save").html('<img src="btn-ajax-loader.gif" /> &nbsp; Signing In ...');
							setTimeout(' window.location.href = "home.php"; ',4000);*/
								$("#error").fadeOut();
								$("#error").fadeIn('slow', function(){
									$("#error").html('<div class="box success"> <i class="fa fa-info-circle" aria-hidden="true"></i> &nbsp; Comentario actulizado correctamente</div>');
									$("#edit-comment")[0].reset();
									window.location.href="moderar-comentarioInfoViaje.php";
									/*$("#edit-comment").fadeOut('slow', function()
									{
										$("#edit-comment").fadeOut('slow');
										
										$("#error").html('<div class="box success"> <i class="fa fa-info-circle" aria-hidden="true"></i> &nbsp; Dato actulizado correctamente</div>');
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