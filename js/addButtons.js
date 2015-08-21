jQuery(document).ready(
    function($) {
        console.log('ShowHide Script loaded ....');
        jQuery( '.button-container' ).append( '<input value="Transcript" type="button" class="right" onclick="showHide(this);" />' );
    });

function showHide(el) {
    // we are passing in the buttons or links reference so we need a reference to the containing element here
    console.log(el);
    var pNode = el.parentNode.parentNode.getElementsByClassName("show-hide")[0];
    console.log(pNode);
    if (hasClass(pNode, "hidden")) {
        removeClass(pNode, "hidden");
        pNode.className+=" visible";
    } else {
        removeClass(pNode, "visible");
        pNode.className+=" hidden";
    }
}


// hasClass, takes two params: element and classname
function hasClass(el, cls) {
  return el.className && new RegExp("(\\s|^)" + cls + "(\\s|$)").test(el.className);
}

// removeClass, takes two params: element and classname
function removeClass(el, cls) {
  var reg = new RegExp("(\\s|^)" + cls + "(\\s|$)");
  el.className = el.className.replace(reg, " ").replace(/(^\s*)|(\s*$)/g,"");
}