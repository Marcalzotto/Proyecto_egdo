		jQuery(function($){    
				
				// cuit validacion 
				var cuitregex = /^[0-9]{2}-[0-9]{8}-[0-9]$/;
					$.validator.addMethod("validcuit", function( value, element ) {
					return this.optional( element ) || cuitregex.test( value );
				}); 
				// tel validacion 
				var telregex = /^([0-9]|-)*$/;
					$.validator.addMethod("validtel", function( value, element ) {
					return this.optional( element ) || telregex.test( value );
				}); 
   
			$("#edit-empresa").validate({
     
			rules:
			{
				emp_name: { required:true, minlength: 4, maxlength: 45},
				emp_cuit: { required:true, validcuit:true},
				emp_calle: { required: true, minlength: 4, maxlength: 45},
				emp_tel: { required: true, validtel: true, minlength: 4, maxlength: 20 },
				emp_mail: { required: true, email: true },
				emp_www: { url: true, maxlength: 100 },
				emp_face: { url: true, maxlength: 100 },
				emp_twit: { url: true, maxlength: 100 },
				emp_inst: { url: true, maxlength: 100 },
			}, /* end rules */
			messages:
			{
				emp_name: { required: "Campo obligatorio",minlength: "El nombre es muy corto",maxlength:"El nombre es muy largo"},
				emp_cuit: {required: "Campo obligatorio",validcuit:"Formato no valido"},
				emp_calle:{required: "Campo obligatorio",minlength:"El nombre es muy corto",maxlength:"El nombre es muy largo"},
				emp_tel:{required:"Campo obligatorio", validtel:"Solo numeros y guiones", minlength:"El nombre es muy corto",
				maxlength:"El nombre es muy largo"},
				emp_mail:{required: "Campo obligatorio",email:"Formato no valido"},
				emp_www:{url:"Formato invalido",maxlength:"El nombre es muy largo"},
				emp_face:{url:"Formato invalido",maxlength:"El nombre es muy largo"},
				emp_twit:{url:"Formato invalido",maxlength:"El nombre es muy largo"},
				emp_inst: {url:"Formato invalido",maxlength:"El nombre es muy largo"},
			}, /* end messages */
   
			submitHandler: submitForm 
		
		}); /* end validate*/

		/* login submit */
			function submitForm()
			{  
				//var data = $("#edit-empresa").serialize();
				var formData = new FormData(document.getElementById("edit-empresa"));
				formData.append("dato", "valor");
				
				$.ajax({
						type : 'POST',
						url  : "editar_empresa.php",
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
									$("#error").html('<div class="box success"> <i class="fa fa-info-circle" aria-hidden="true"></i> &nbsp; Datos actualizados correctamente</div>');
									$("#edit-empresa")[0].reset();
									window.location="empresa.php";
									
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