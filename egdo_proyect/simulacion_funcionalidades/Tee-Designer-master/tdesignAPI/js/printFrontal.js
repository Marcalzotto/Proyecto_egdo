$(document).ready(function() {
 $('#imprimir_front').click(function(){
    html2canvas($('#preview_front'), 
    {
      onrendered: function (canvas) {
        var a = document.createElement('a');
        // toDataURL defaults to png, so we need to request a jpeg, then convert for file download.
        a.href = canvas.toDataURL("image/jpeg").replace("image/jpeg", "image/octet-stream");
        a.download = 'frontal.jpg';
        a.click();
      }
    });
  });

});