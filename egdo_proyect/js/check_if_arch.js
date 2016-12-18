function verificar_arch(){

		if($('#d_frontal').get(0).files.length > 0){

			var name = $('#d_frontal').val();
			alert(name);
			$("#si_file").text("Un archivo seleccionado: " + name);
		
}
	
verificar_arch();
	
	/*if ($('#d_frontal').get(0).files.length == 0) {
    var file = $('#d_frontal').get(0).files.length;
    $("#si_file").text("Ningun archivo seleccionado");
    alert(file);
    //console.log("No files selected.");
	}
		/*var file = $('#d_frontal').get(0).files.length;
   	var name = $('#d_frontal').val();
   $("#si_file").text("Has seleccionado un archivo");
    alert(file + name);*/
	

