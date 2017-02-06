jQuery(function($){    
				
			$("#re-mensaje").validate({
     
			rules:
			{
				asunto: { required:true, minlength: 4, maxlength: 45},
				ccomment: { required:true},
				
			}, /* end rules */
			messages:
			{
				asunto: {required: "Campo obligatorio",minlength: "Asunto es muy corto",
				maxlength:"Asunto es muy largo"},
				ccomment: { required: "Ingrese su mensaje"},
			
			}, /* end messages */
   
			submitHandler: submitForm 
		
		}); /* end validate*/

		/* login submit */
			function submitForm()
			{  
				//var data = $("#add-empresa").serialize();
				//var formData = new FormData($("#add-empresa")[0]);
				var formData = new FormData(document.getElementById("re-mensaje"));
				formData.append("dato", "valor");
				
				$.ajax({
						type : 'POST',
						url  : "enviar_respMsj.php",
						data: formData,
						dataType: "HTML",
						cache: false,
						contentType: false,
						processData: false,
						
						success :  function(response)
						{      
							if(response=="ok"){
							/*$("#btn-save").html('<img src="btn-ajax-loader.gif" /> &nbsp; Signing In ...');
							setTimeout(' window.location.href = "home.php"; ',4000);*/
							$("#error").fadeOut();
							$("#error").fadeIn('slow', function(){
									$("#error").html('<div class="box success"> <i class="fa fa-info-circle" aria-hidden="true"></i> &nbsp; Respuesta enviada correctamente</div>');
									$("#re-mensaje")[0].reset();
									window.location="listarMsj.php";
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