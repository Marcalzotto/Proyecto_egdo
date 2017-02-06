		jQuery(function($){    
				
			$("#edit-curso").validate({
     
			rules:
			{
				esc_name: { required:true, minlength: 4, maxlength: 45},
				esc_loc: { required: true, minlength: 4, maxlength: 70},
				esc_curso: { required: true, digits:true, maxlength: 1},
				esc_div: { required: true, maxlength: 1},
				esc_cant: { required:true, digits:true, maxlength: 2 },
			}, /* fin rules */
			messages:
			{
				esc_name: { required: "Campo obligatorio", minlength: "El nombre es muy corto", maxlength:"El nombre es muy largo"},
				esc_loc:{ required: "Campo obligatorio",minlength: "El nombre es muy corto",maxlength:"El nombre es muy largo"},
				esc_curso:{ required: "Campo obligatorio",digits:"Solo numeros",maxlength:"Ingrese un caracter"},
				esc_div:{ required: "Campo obligatorio",maxlength:"Ingrese un caracter"},
				esc_cant:{ required: "Campo obligatorio",digits:"Solo numeros",maxlength:"Ingrese hasta dos digitos"},
				
			}, /* fin messages */
		
			submitHandler: submitForm 
		}); /* fin validate*/

		
			/* login submit */
			function submitForm()
			{  
				var data = $("#edit-curso").serialize();
    
				$.ajax({
						type : 'POST',
						url  : "editar_curso.php",
						data : data,
						
						success :  function(response)
						{      
							if(response=="ok"){
							/*$("#btn-save").html('<img src="btn-ajax-loader.gif" /> &nbsp; Signing In ...');
							setTimeout(' window.location.href = "home.php"; ',4000);*/
								$("#error").fadeOut();
								$("#error").fadeIn('slow', function(){
									$("#error").html('<div class="box success"> <i class="fa fa-info-circle" aria-hidden="true"></i> &nbsp; Datos actualizado correctamente</div>');
									$("#edit-curso")[0].reset();
									window.location="curso.php";
									/*$("#edit-curso").fadeOut('slow', function()
									{
										$("#edit-curso").fadeOut('slow');
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