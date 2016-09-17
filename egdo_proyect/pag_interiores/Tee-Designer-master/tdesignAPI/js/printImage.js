$(document).ready(function() {
 $('#imprimir').click(function(){
    html2canvas($('#image_reply'), 
    {
      onrendered: function (canvas) {
        var a = document.createElement('a');
        // toDataURL defaults to png, so we need to request a jpeg, then convert for file download.
        a.href = canvas.toDataURL("image/jpeg").replace("image/jpeg", "image/octet-stream");
        a.download = 'mymodel.jpg';
        a.click();
        //lo comentado es para descargar el canvas desde la aplicacion.
      }

    });
  });

});