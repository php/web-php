$(document).ready(function() {

    // fade in/out mega drop-downs.
    $("#headmenu li:has(div.children)").hoverIntent({    
        interval:   100,
        timeout:    200,
        over:       function(){$(this).find("div.children").fadeIn(250);},
        out:        function(){$(this).find("div.children").fadeOut(250);}
    });

    // remove default search text on focus.
    $('#headsearch-keywords').focus(function(){
        if ($(this).attr("value") == getDefaultSearchText()) {
            $(this).attr("value", "");
        }
    }).blur(function(){
        if (!$(this).attr("value")) {
            $(this).attr("value", getDefaultSearchText());
        }
    });

    // load the search index and enable auto-complete.
    jQuery.getScript("js/search-index-" + getLanguage() + ".js", function(){
        $('#headsearch-keywords').autocomplete(searchIndex, {
            matchContains:  true,
            scrollHeight:   240,
            formatItem:     function(item) {
                return item.name;
            }
        }).result(
            function(event, item){
                alert("User selected: " + item['name'] + "\n" +
                      "Direct user to: " + item['page']);
            }
        );        
    });

});

/**
 * Get the default search text to use (e.g. 'Search...').
 */
function getDefaultSearchText()
{
    switch (getLanguage()) {
        case "en":
            return "Search...";
    }
}

/**
 * Determine what language to present to the user.
 * 
 * @todo    make this detect the user's language.
 */
function getLanguage()
{
    return "en";
}
