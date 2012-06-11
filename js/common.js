$(document).ready(function() {


    // Ugh, cookie handling.
    var cookies = document.cookie.split(";");
    var showBetaWarning = true;
    for (var i = 0; i < cookies.length; i++) {
        if (cookies[i].indexOf("BetaWarning=") != -1) {
            showBetaWarning = false;
            break;
        }
    }

    var $headBetaWarning = $('#head-beta-warning'); // Cache for multiple references

    // Wire up the beta warning.
    $("#beta-warning-close").click(function(event) {
        event.preventDefault();
        $('body').css('margin-top', 0);
        $headBetaWarning.slideUp("fast");

        // Hide it for a month by default.
        var expiry = new Date();
        expiry.setTime(expiry.getTime() + (30 * 24 * 60 * 60 * 1000));

        document.cookie = "BetaWarning=off; expires=" + expiry.toGMTString() + "; path=/";
    });

    // This is a temporary implementation so if you click on the Arrows on the Download area of the homepage
    // That it takes you to the default .gz download. Could not apply HTML5's <a> tag to wrap around the <li>
    // Because it contains <a> tags within it and the target conflicted. Using <li ref="#...'> to workaround this
    // Until an elegant implementation is found.
    var $homeDownload = $('div.download .download-list');
    if($homeDownload.length > 0) {
        $homeDownload.find('li').bind('click', function() {
            window.location.href = $(this).attr('rel').replace('#', '');
        });
    }



    if (showBetaWarning) {
        $headBetaWarning.show();
        $('body').css('margin-top', '25px');
        $('#beta-warning').slideDown(300, function() {
           $(this).find('.blurb').fadeIn('slow');
        });
    }
    // auto-expand the home menu when on the home page
    // and remove it from other pages.
    $("#headhome.current div.children").appendTo($('#menu-container'));
    $("#headhome div.children").remove();

    // slide mega drop-downs up/down.
    $("#headmenu li:has(div.children)").click(function(event) {
        // don't follow link.
        event.preventDefault();

        var clickedMenu = $(this);
        var container   = $('#mega-drop-down #menu-container');

        // ignore clicks if we're busy.
        if (container.hasClass('busy')) return;
        container.addClass('busy');

        // function to activate the clicked menu.
        var activate = function(){
            clickedMenu.addClass('current');
            clickedMenu.find("div.children").appendTo(container);
            container.find("div.children").slideUp(0).slideDown(100,
                function(){ container.removeClass('busy'); }
            );
        };

        // if there is an active menu, deactivate it first.
        var activeMenu    = $('#headmenu li.current');
        var activeSubMenu = container.find("div.children");
        if (activeMenu.length) {
            activeMenu.removeClass('current');
        }
        if (activeSubMenu.length) {
            activeSubMenu.slideUp(100, function(){
                activeSubMenu.appendTo(activeMenu);
                if (activeMenu[0] != clickedMenu[0])
                    activate();
                else
                    container.removeClass('busy');
            });
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
                    n.append("<a><span class='search-item-label'>" + item.label + " <span class='search-item-category'>(" + cat + ")</span></span><span class='search-item-description'>" + item.desc + "</span></a>");
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
                return indexes[key] || key;
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
                    window.location = '/manual/' + getLanguage() + '/' + ui.item.value + '.php';
                }
            }
        });
    });

    var foundToc = false;
    var $quicktoc = $("#quicktoc");
    if ($quicktoc.length) {
        var pageid = $("section.docs > div").attr("id");
        var editurl = "https://edit.php.net/?perm=/" + getLanguage() + "/" + pageid + ".php&project=PHP";
        var bugurl  = "http://bugs.php.net/report.php?bug_type=Documentation+problem&amp;manpage=" + pageid;

        // Add edit & bugreporting urls to the footer
        $($(".footmenu")[1]).after(
              "<ul class='footmenu pagetools'>"
            + "<li><a href='" + editurl + "'>Edit this page</a></li>"
            + "<li><a href='" + bugurl + "'>Report bug on this page</a></li>"
            + "</ul>"
        );

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
                    $.scrollTo($(this).attr("href").replace(".", "\\\."), 400);
                });
            });

            $quicktoc.find(".content").append("<h5>Quick TOC</h5>").append(l);
            $quicktoc.find('.links, .content').show();

        } else {
            $quicktoc.remove();
        }

    }

    var $docs = $('.docs');
    var $docsDivWithId = $docs.find('div[id]');
    $docsDivWithId.children("h1, h2, h3, h4").each(function(){
        $(this).append("<a class='genanchor' href='#" + $(this).parent().attr("id") + "'> ¶</a>");
    });
    $docs.find(".methodparam .parameter").each(function () {
        var $node = $(this);
        $(".parameters .term .parameter").each(function (idx, param) {
            var $param = $(param);
            if ($param.text() == $node.text().substring(1)) {
                $node.click(function() {
                    $.scrollTo($param, 800);
                });
            }
        });
    });

    var $elephpants = $(".elephpants");
    var $elephpantsImages = $elephpants.find('.images');
    // load the elephpant images if elephpants div is in the dom.
    $elephpantsImages.first().each(function (idx, node) {

        // function to fetch and insert images.
        var fetchImages = function() {

            // determine how many elephpants are required to fill the
            // viewport and subtract for any images we already have.
            var count = Math.ceil($(document).width() / 75)
                      - $elephpantsImages.find("img").length;

            // early exit if we don't need any images.
            if (count < 1) {
                return;
            }

            // do the fetch.
            $.ajax({
                url:      '/images/elephpants.php?count=' + count,
                dataType: 'json',
                success:  function(data) {
                    var photo, image;
                    for (photo in data) {
                        photo = data[photo];
                        link  = $('<a>');
                        link.attr('href',    photo.url);
                        link.attr('title',   photo.title);
                        image = $('<img>');
                        image.attr('src',    'data:image/jpeg;base64,' + photo.data);
                        $(node).append(link.append(image));
                    }
                },
                error:    function() {
                    $elephpants.hide();
                }
            });

        }

        // begin by fetching the images we need now.
        fetchImages();

        // fetch more if viewport gets larger.
        var deferred = null;
        $(window).resize(function() {
            window.clearTimeout(deferred);
            deferred = window.setTimeout(function(){
                fetchImages();
            }, 250);
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
