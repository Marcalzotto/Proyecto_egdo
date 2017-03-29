jQuery(document).ready(function($) {
    $('#sliders').bjqs({
 
         
// PARAMETROS OPCIONALES QUE NOS OFRECE EL PLUGIN
width : 1200,
height : 650,
 
// animation values
animtype : 'fade', // accepts 'fade' or 'slide'
animduration : 500, // how fast the animation are
animspeed : 4000, // the delay between each slide
automatic : true, // automatic
 
// control and marker configuration
showcontrols : true, // show next and prev controls
centercontrols : true, // center controls verically
nexttext : '<img src=images/png/next32.png />', // Text for 'next' button (can use HTML)
prevtext : '<img src=images/png/back32.png />', // Text for 'previous' button (can use HTML)
showmarkers : true, // Show individual slide markers
centermarkers : true, // Center markers horizontally
 
// interaction values
keyboardnav : true, // enable keyboard navigation
hoverpause : true, // pause the slider on hover
 
// presentational options
usecaptions : true, // show captions for images using the image title tag
responsive : true // enable responsive capabilities (beta)
    });
});
