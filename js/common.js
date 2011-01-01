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

    // load the search index and enable auto-complete.
    jQuery.getScript("/search-index.php?lang=" + getLanguage(), function(){
        var haveDesc = 0;
        jQuery.getScript("/search-index.php?lang=" + getLanguage() + "&description=1", function(){
            haveDesc = 1;
        });
        $.widget("custom.catcomplete", $.ui.autocomplete, {
            /*
             // Print out category headers rather then in () after the match
            _renderMenu: function(ul, items) {
                var self = this, currentCategory = "";
                $.each(items, function(index, item) {
                    if (item.category != currentCategory) {
                        var cat = self._resolveIndexName(item.category);
                        ul.append("<li class='ui-autocomplete-category'>" + cat + "</li>");
                        currentCategory = item.category;
                    }

                    self._renderItem(ul, item);
                });
            },
            */
            _renderItem: function(ul, item) {
                var n = $("<li></li>").data("item.autocomplete", item);
                var cat = this._resolveIndexName(item.category);
                if (item.desc) {
                    n.append("<a>" + item.label + " (" + cat + ")<br>" + item.desc + "</a>");
                }
                else {
                    n.append("<a>" + item.label + " (" + cat + ") </a>");
                }

                return n.appendTo(ul);
            },
            // Resolve the element names to human understandable things
            _resolveIndexName: function(key) {
                var indexes = {
                    'phpdoc:varentry': 'Variables',
                    'phpdoc:classref': 'Classes',
                    'phpdoc:exceptionref': 'Exceptions',
                    'refentry': 'Functions'
                };
                return indexes[key];
            }
        });
        $('#headsearch-keywords').catcomplete({
            delay:      50,
            minScore:   50,
            maxResults: 20,
            source: function(request, response){
                var term  = request.term;
                var minScore = this.options.minScore;
                
                // Score an possible match
                var score = function(item){
                    var match = item.search(new RegExp(term, "i"));
                    if (match < 0) return 0;
                    return 100 - (match * 2) - (item.length - term.length);
                };

                var results = [];
                $.each(searchIndex, function(idx, item) {
                    var itemScore = score(item[0]);
                    if (item && itemScore > minScore) {
                        results.push({
                            label: item[0],
                            value: item[1],
                            desc: haveDesc ? descriptionIndex[item[1]] : '',
                            category: item[2],
                            score: itemScore
                        });
                    }
                });

                // Only sort the matches
                results.sort(function(a, b){
                    return b.score - a.score;
                });

                // Return at most maxResults
                response(results.slice(0, this.options.maxResults));
            },
            focus: function(event, ui) {
                $('#headsearch-keywords').val(ui.item.label);
                return false;
            },
            select: function(event, ui){
                event.preventDefault();
                $('#headsearch-keywords').val(ui.item.label);
                if (ui.item.value) {
                    window.location = '/manual/' + getLanguage() + '/' + ui.item.value;
                }
            }
        });
    });

    var foundToc = false;
    if ($("#quicktoc").length) {
        var pageid = $("section.docs > div").attr("id");
        var editurl = "https://edit.php.net/?perm=/" + getLanguage() + "/" + pageid + ".php&project=PHP";
        var bugurl  = "http://bugs.php.net/report.php?bug_type=Documentation+problem&amp;manpage=" + pageid;

        // Add edit & bugreporting urls to the footer
        $($(".footmenu")[1])
            .append("<li><a href='" + editurl + "'>Edit this page</a></li>")
            .append("<li><a href='" + bugurl + "'>Report bug on this page</a></li>")
        ;

        // Make a list, start making <li>'s dynamically.
        // we use .data() to store which element the TOC item should scrollTo()
        var l = $('<ul id="toc_list">');
        $(".refsect1 h3, .sect1 h2, .sect2 h3, .sect3 h4, .docs .sect4 h5").each(function() {
            if(foundToc === false) {
                foundToc = true;
            }
            var currItem = $(this);
            $('<a class="toc_item" href="#' + currItem.parent().attr('id') + '">' + currItem.text() + '</a>')
                .appendTo( $('<li>') ).parent().appendTo(l);
     
        });

        if (foundToc) {
            jQuery.getScript("/js/jquery.scrollto.min.js", function(){
                l.delegate("a.toc_item","click keypress", function(e) {
                    // Escape dots in ids so they won't be treated as class selectors
                    $.scrollTo($(this).attr("href").replace(".", "\\\."), 800);
                });
            });
            $("#quicktoc").append("<h5>Quick TOC</h5>").append(l);
        } else {
            $("#quicktoc").remove();
        }

    }
    $(".docs div[id] > h1, .docs div[id] > h2, .docs div[id] > h3, .docs div[id] > h4").each(function(){
        $(this).append("<a class='genanchor' href='#" + $(this).parent().attr("id") + "'> ¶</a>");
    });
    $(".docs .methodparam .parameter").each(function (idx, node) {
        $(".parameters .term i > tt.parameter").each(function (idx, param) {
            if ($(param).text() == $(node).text().substring(1)) {
                $(node).click(function() {
                    $(param).scrollTo(0, 800);
                });
            }
        });
    });

});

/**
 * Determine what language to present to the user.
 */
function getLanguage()
{
    return document.documentElement.lang;
}

