/*jQuery(document).ready(
    function($) {
        console.log('ShowHide Script loaded ....');
        jQuery( '.button-container' ).append( '<input value="Transcript" type="button" class="right" onclick="showHide(this);" />' );
    });
*/

jQuery(document).ready(
    function($) {
        jQuery( '.button-container' ).append( '<input value="Transcript" type="button" class="right" id="showtranscript" />' );
        jQuery('#showtranscript').click(function() {
            jQuery('.show-hide').slideToggle('medium').hide();
        });
    });

