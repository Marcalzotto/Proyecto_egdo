jQuery(function($){    
				
			$("#form-disUno").validate({
     
			rules:
			{
				imagen: { required: true, accept: "image/*" },
			
			}, /* end rules */
			messages:
			{
				imagen: {required:"Campo obligatorio",accept:"Solo se permite imagen"},
			}, /* end messages */
   
			submitHandler: submitForm 
		
		}); /* end validate*/

		/* login submit */
			function submitForm()
			{  
				//var data = $("#add-empresa").serialize();
				//var formData = new FormData($("#add-empresa")[0]);
				var formData = new FormData(document.getElementById("form-disUno"));
				formData.append("dato", "valor");
				
				$.ajax({
						type : 'POST',
						url  : "subir-disUno.php",
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
								$("#error").html('<div class="box success"> <i class="fa fa-info-circle" aria-hidden="true"></i> &nbsp; Modificacion correcta</div>');
								$("#form-disUno")[0].reset();
									window.location.href="moderar-disenio.php";
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