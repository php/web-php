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
        $headBetaWarning.slideUp("fast", function(){$(this).remove()});

        // Hide it for a month by default.
        var expiry = new Date();
        expiry.setTime(expiry.getTime() + (30 * 24 * 60 * 60 * 1000));

        document.cookie = "BetaWarning=off; expires=" + expiry.toGMTString() + "; path=/";
    });

    // This is a temporary implementation for clicking on the arrows for the Downloading PHP
    var $homeDownload = $('div.download .download-list');
    if($homeDownload.length > 0) {
        $homeDownload.find('li').bind('click', function() {
            window.location.href = $(this).attr('rel');
        });
    }



    if (showBetaWarning) {
        $headBetaWarning.show();
        $('body').css('margin-top', $headBetaWarning.outerHeight()+12);
        $headBetaWarning.slideDown(300, function() {
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

    var $docs = $('.docs');
    var $docsDivWithId = $docs.find('div[id]');
    $docsDivWithId.children("h1, h2, h3, h4").each(function(){
        $(this).append("<a class='genanchor' href='#" + $(this).parent().attr("id") + "'> ¶</a>");
    });
    var scrollHeightOfHeadnav = - document.getElementById('head-nav').scrollHeight;
    scrollHeightOfHeadnav -= 12; //some margin
    $parameters = $(".parameters .term .parameter");
    $docs.find(".refsect1 .parameter").each(function () {
        var $node = $(this);
        var $nodeText = $node.text();
        if ($nodeText[0].charAt(0) === '$') {
            $nodeText = $nodeText.substring(1);
        }
        $parameters.each(function (idx, param) {
            var $param = $(param);
            if ($param.text() == $nodeText) {
                $node.click(function() {
                    $.scrollTo($param, 600, {'offset':{'top':scrollHeightOfHeadnav}});
                });
            }
        });
    });

    var $headingsWithIds = $('h1 a[id], h2 a[id], h3 a[id], h4 a[id]');
    $headingsWithIds.each(function(){
        var $this = $(this);
        $this.after("<a class='genanchor' href='#" + $this.attr('id') + "'> ¶</a>")
    });
    $('h1[id], h2[id], h3[id], h4[id]').each(function() {
        var $this = $(this);
        $this.append("<a class='genanchor' href='#" + $this.attr('id') + "'> ¶</a>");
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
    
    // We have <p> tags generated with nothing in them and it requires a PHD change, meanwhile this fixes it.
    $('.docs .refentry .parameters p, .docs .refsect1.examples p, .docs .refsect1.seealso p').each(function() {
        var $this = $(this), html = $this.html();
        if(html !== null && html.replace(/\s|&nbsp;/g, '').length == 0) {
            $this.remove();
        }
    });
    
    $().UItoTop({ easingType: 'easeOutQuart' });
    
});

/**
 * Determine what language to present to the user.
 */
function getLanguage()
{
    return document.documentElement.lang;
}
