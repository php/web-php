$(document).ready(function() {

    // slide mega drop-downs up/down.
    $("#headmenu li:has(div.children)").click(function(event) {
        // don't follow link.
        event.preventDefault();

        var clickedMenu = $(this);
        var activeMenu  = $('#headmenu li.current');
        var container   = $('#mega-drop-down #menu-container');

        // function to activate the clicked menu.
        var activate = function(){
            clickedMenu.addClass('current');
            clickedMenu.find("div.children").appendTo(container);
            container.find("div.children").slideUp(0).slideDown("fast");
        };

        // if there is an active menu, deactivate it first.
        if (activeMenu.length) {
            activeMenu.removeClass('current');
            var children = container.find("div.children");
            if (children) {
                children.slideUp('fast', function(){
                    children.appendTo(activeMenu);
                    if (activeMenu[0] != clickedMenu[0])
                        activate();
                });
            }
        } else {
            activate();
        }
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
    jQuery.getScript("/js/search-index-" + getLanguage() + ".js", function(){
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
        var pageid = $("section.docs > div").attr("id");
        var editurl = "https://edit.php.net/?perm=/" + getLanguage() + "/" + pageid + ".php&project=PHP";
        var bugurl  = "http://bugs.php.net/report.php?bug_type=Documentation+problem&amp;manpage=" + pageid;

        // Add edit & bugreporting urls to the footer
        $($(".footmenu")[1]).append("<li><a href='" + editurl + "'>Edit this page</a></li>");
        $($(".footmenu")[1]).append("<li><a href='" + bugurl + "'>Report bug on this page</a></li>");

        var l = "";
        $(".refsect1 h3, .sect1 h2, .sect2 h3, .sect3 h4").each(function() {
            var id = $(this).parent().attr("id");
            l += "<li><a href='#" + id + "'>" + $(this).text() + "</a></li>";
        });
        if (l) {
            $("#quicktoc").append("<h5>Quick TOC</h5><ul>" + l + "<li><a href='#usernotes'>User notes</a></li></ul>");
        } else {
            $("#quicktoc").remove();
        }
    }
    $(".docs div[id] > h1, .docs div[id] > h2, .docs div[id] > h3, .docs div[id] > h4").each(function(){
        $(this).append("<a class='genanchor' href='#" + $(this).parent().attr("id") + "'> ¶</a>");
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
 */
function getLanguage()
{
    return document.documentElement.lang;
}

