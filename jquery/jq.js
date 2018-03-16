/*var jq = document.createElement('script');
jq.src = "jquery-3.3.1.min.js";
document.getElementsByTagName('head')[0].appendChild(jq);
// ... give time for script to load, then type (or see below for non wait option)
//jQuery.noConflict();
*/
 (function(e, s) {
    e.src = s;
    e.onload = function() {
        
        jQuery.noConflict();
        console.log('jQuery injected');
    };
    document.head.appendChild(e);
})(document.createElement('script'), 'jquery-3.3.1.min.js');
setTimeout(function(){ alert("Hello"); }, 3000);