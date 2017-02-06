jQuery(function($) {
    
	$('#example').DataTable( {
        "scrollX": true,
		 "language": {
			"url": "assets/js/Spanish.json"			
        }
    } );
	
	var table = $('#example').DataTable();
     
    $('#example tbody')
        .on( 'mouseenter', 'td', function () {
            var colIdx = table.cell(this).index().column;
 
            $( table.cells().nodes() ).removeClass( 'highlight' );
            $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
        } );
	 
	 
} );