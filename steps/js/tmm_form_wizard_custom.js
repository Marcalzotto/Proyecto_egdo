/*global jQuery, window, Modernizr, navigator, objLayerSlider, objFlickr, objPostSlider, google, objGoogleMap*/

(function($, window, document) {

    "use strict";
    
    /* ------------------------------------------------------------------ */
    /*	Ready															  */
    /* ------------------------------------------------------------------ */

    $(function() {
       
        var listSize = $(this).find('.input-block input').length;
        for (var i = 1; i <= listSize; i++) {
            $('.input-block input:nth-child(' + i + ')').blur(function() {
                var count = 0;
                if(!this.value) {
                     $(this).next().fadeIn(300);
                }
                $(this).on('focus', function() {
                    $(this).next().fadeOut(300);
                    count++;
                    if (count > 0) {
                        $(this).next().removeClass().empty();
                    }
                });
            });
        }
    });

}(jQuery, window, document));