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
        $('#headsearch-keywords').autocomplete({
            delay:      50,
            minScore:   75,
            maxResults: 50,
            source: function(request, response){
                // sort the search index by similarity to the user's query
                var term  = request.term;
                var score = function(item){
                    var match = item.name.search(new RegExp(term, "i"));
                    if (match < 0) return 0;
                    return 100 - (match * 2) - (item.name.length - term.length);
                };
                searchIndex.sort(function(a, b){
                    return score(b) - score(a);
                });
                
                // display the best matches
                var results = [];
                for (var i = 0; i < this.options.maxResults; i++){
                    var item = searchIndex[i];
                    if (item && score(item) > this.options.minScore){
                        results.push({
                            label: item.name,
                            value: item.page
                        });
                    }
                }
                response(results);
            },
            focus: function(event, ui) {
                $('#headsearch-keywords').val(ui.item.label);
                return false;
            },
            select: function(event, ui){
                $('#headsearch-keywords').val(ui.item.label);
                if (ui.item.value)
                    window.location = '/manual/' + getLanguage() + '/' + ui.item.value;
            }
        });
    });
    if ($("#quicktoc").length) {
        var l = "";
        $(".refsect1 h3").each(function() {
            var id = $(this).parent().attr("id");
            l += "<li><a href='#" + id + "'>" + $(this).text() + "</a></li>";
        });
        if (l) {
            $("#quicktoc").append("<h5>Quick TOC</h5><ul>" + l + "<li><a href='#usernotes'>User notes</a></li></ul>");
        } else {
            $("#quicktoc").remove();
        }
    }

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
