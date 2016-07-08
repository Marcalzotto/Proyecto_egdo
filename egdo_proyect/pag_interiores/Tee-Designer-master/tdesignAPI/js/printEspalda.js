$(document).ready(function() {
 $('#imprimir_trasero').click(function(){
    html2canvas($('#preview_back'), 
    {
      onrendered: function (canvas) {
        var a = document.createElement('a');
        // toDataURL defaults to png, so we need to request a jpeg, then convert for file download.
        a.href = canvas.toDataURL("image/jpeg").replace("image/jpeg", "image/octet-stream");
        a.download = 'espalda.jpg';
        a.click();
      }
    });
  });

});