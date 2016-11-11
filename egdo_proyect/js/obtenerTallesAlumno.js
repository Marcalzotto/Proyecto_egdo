$(document).ready(function(){
	
	$("#btn-enviar").click(function(){

		var talleBuzo = $("#buzo").val();
		var talleRemera = $("#remera").val();

		alert(talleRemera);

		if(talleBuzo == "null" || talleRemera == "null"){
			alert("Por favor llena todos los campos de este formulario");
		}else{

				$.ajax({
					type: 'POST',
					url: '../pag_interiores/validarTalles.php',
					data:{
						buzoTalle : talleBuzo,
						remeraTalle : talleRemera 
					},
					success: function(data){
						alert(data);
					}
				});
		}

	});	
});