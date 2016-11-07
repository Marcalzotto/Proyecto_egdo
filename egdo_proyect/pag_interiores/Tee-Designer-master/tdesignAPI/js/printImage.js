$(document).ready(function() {
  $('#imprimir1').click(function(){
      
      $(".popUp").css("display","block");

  });




  $("#continuar").click(function(){

    $(".popUp").css("display","none");

      var captura1 = $('#img_front').val();
      var captura2 = $('#img_back').val();
      var captura3;
      var tipoPrenda = parseInt($("#typeCloth").val());   
      var frontal;
      var espalda;
      
     
      
      switch(tipoPrenda){
        
        case 1:
        
        frontal = "frontalBuzo";
        espalda = "espaldaBuzo";
        break;

        case 2:

        frontal = "frontalRemera";
        espalda = "espaldaRemera";
        break;

        case 3:
        frontal = "frontalBandera";
        espalda = "espaldaBandera";
        break;
      }
      
        html2canvas($('#image_reply'), {
            onrendered: function(canvas) {//comienzo del evento orendered
            captura3 = canvas.toDataURL("image/jpeg");
              
              $.ajax({
                  type: 'POST',
                  url: 'tdesignAPI/recibirImagen.php',
                  data:{
                    img : captura1,
                    img2 : captura2,
                    img3 : captura3,
                    idPrenda : tipoPrenda,
                    frontal : frontal,
                    espalda : espalda
                  },

                  success: function(data){
                      switch(data){
                      
                        case -1:
                          alert("los diseños no pudieron ser actualizados");
                        break;

                        case 1:
                          alert("lo sentimos hubo problemas al guardar los disenios");
                        break;

                        case 2:
                          alert("lo sentimos sus disenios no pudieron ser guardados");
                        break;

                        case 3:
                          alert("Lo sentimos hubo errores al guardar los disenios");
                        break;

                        case 4:
                          alert("Lo sentimos hubo errores en el envio de datos, por favor intentalo de nuevo");
                        break;

                        default:
                          alert("sus diseños fueron guardados con exito");
                          switch(tipoPrenda){
                        
                            case 1:
                        
                              if($("#modal-hoodie").length){
                          
                              $("#modal-hoodie img").each(function(index,value){
                                value.remove();
                              });
                          
                              $("<img class='front' src='tdesignAPI/images/userDesigns/frontalBuzo"+data+".jpg' alt='frontal buzo'>").insertBefore("#modal-hoodie div");
                              $("<img class='back' src='tdesignAPI/images/userDesigns/espaldaBuzo"+data+".jpg' alt='espalda buzo'>").insertBefore("#modal-hoodie div");
                        
                              }else{

                                $(".buzo").append("<div>1</div>");
                                $(".design_api_container").append("<div id='modal-hoodie'></div>");
                                $("#modal-hoodie").append("<img class='front' src='tdesignAPI/images/userDesigns/frontalBuzo"+data+".jpg' alt='frontal buzo'>");
                                $("#modal-hoodie").append("<img class='back' src='tdesignAPI/images/userDesigns/espaldaBuzo"+data+".jpg' alt='espalda buzo'>");
                                $("#modal-hoodie").append("<div><button id='btn-cerrar1'>Cerrar</button></div>");
                        
                                $("#btn-cerrar1").on("click",function(){
                                  $("#modal-hoodie").css("display","none");
                                  $(".layer2").css("visibility","hidden");
                                });
                              }
                            break;
                        
                            case 2:

                              if($("#modal-tee").length){

                              $("#modal-tee img").each(function(index,value){
                                value.remove();
                              });

                              $("<img class='front' src='tdesignAPI/images/userDesigns/frontalRemera"+data+".jpg' alt='frontal remera'>").insertBefore("#modal-tee div");
                              $("<img class='back' src='tdesignAPI/images/userDesigns/espaldaRemera"+data+".jpg' alt='espalda remera'>").insertBefore("#modal-tee div");

                              }else{

                                $(".remera").append("<div>1</div>");
                                $(".design_api_container").append("<div id='modal-tee'></div>");
                                $("#modal-tee").append("<img class='front' src='tdesignAPI/images/userDesigns/frontalRemera"+data+".jpg' alt='frontal remera'>");
                                $("#modal-tee").append("<img class='back' src='tdesignAPI/images/userDesigns/espaldaRemera"+data+".jpg' alt='espalda remera'>");
                                $("#modal-tee").append("<div><button id='btn-cerrar2'>Cerrar</button></div>");

                                $("#btn-cerrar2").on("click",function(){
                                $("#modal-tee").css("display","none");
                                $(".layer2").css("visibility","hidden");
                                });
                              }
                            break;
                        
                            case 3: 
                        
                              if($("#modal-flag").length){
                                $("#modal-flag img").each(function(index,value){
                                  value.remove();
                                });

                              $("<img class='front' src='tdesignAPI/images/userDesigns/frontalBandera"+data+".jpg' alt='frontal bandera'>").insertBefore("#modal-flag div");
                              $("<img class='back' src='tdesignAPI/images/userDesigns/espaldaBandera"+data+".jpg' alt='espalda bandera'>").insertBefore("#modal-flag div");

                              }else{

                                $(".bandera").append("<div>1</div>");
                                $(".design_api_container").append("<div id='modal-flag'></div>");
                                $("#modal-flag").append("<img class='front' src='tdesignAPI/images/userDesigns/frontalBandera"+data+".jpg' alt='frontal bandera'>");
                                $("#modal-flag").append("<img class='back' src='tdesignAPI/images/userDesigns/espaldaBandera"+data+".jpg' alt='espalda bandera'>");
                                $("#modal-flag").append("<div><button id='btn-cerrar3'>Cerrar</button></div>");

                                $("#btn-cerrar3").on("click",function(){
                                  $("#modal-flag").css("display","none");
                                  $(".layer2").css("visibility","hidden");
                                });
                              }
                            break;

                            // default:
                              //$(".remera").append("<div>1</div>");
                              //break;
                          }
                        break;
                      }
                  }//success
              });//ajax metodo
          
            }//fin del evento onrendered
        });
  
  });
      
      
  $("#cancelar").click(function(){
      $(".popUp").css("display","none");
  });
             
  

});