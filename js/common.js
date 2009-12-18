$(document).ready(function() {

    // fade in/out mega drop-downs.
    $("#headmenu li:has(div.children)").hoverIntent({    
        interval:   200,
        timeout:    200,
        over:       function(){$(this).find("div.children").fadeIn(250);},
        out:        function(){$(this).find("div.children").fadeOut(250);}
    });

    // remove 'Search...' text on focus.
    // @todo support multilingual default text.
    var defaultSearchText = 'Search...';
    $('#headsearch-keywords').focus(function(){
        if ($(this).attr("value") == defaultSearchText) {
            $(this).attr("value", "");
        }
    }).blur(function(){
        if (!$(this).attr("value")) {
            $(this).attr("value", defaultSearchText);
        }
    });

});
