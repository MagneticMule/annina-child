jQuery(document).ready(
    function($) {
        console.log("Star Trekking, across the universe...");
        jQuery( '.button-container' ).append( '<input value="Show" type="button" id="showtranscript" style="margin: 0;"/>' );
        jQuery('#showtranscript').click(function() {
            jQuery('.show-hide').slideToggle('medium');
        });
    });