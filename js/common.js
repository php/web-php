/* Plugins, etc, are on top. */

String.prototype.escapeSelector = function () {
    return this.replace(/(.|#)([ #;&,.+*~\':"!^$\[\]\(\)=>|\/])/g, '$1' + '\\\\$2');
};

String.prototype.toInt = function () {
    return parseInt(this);
};

var PHP_NET = {};

PHP_NET.HEADER_HEIGHT = 52;

Mousetrap.bind('up up down down left right left right b a enter', function () {
    $(".brand img").attr("src", "/images/php_konami.gif");
});
Mousetrap.bind("?", function () {
    $("#trick").slideToggle();
});
Mousetrap.bind("esc", function () {
    $("#trick").slideUp();
    $("#goto").slideUp();

    $("html").off("keydown");
    $("html").off("keypress");
});
/*
Mousetrap.bind("j", function() {
    var n = window.pageYOffset + 20;
    $.scrollTo(n, 10);
});
Mousetrap.bind("k", function() {
    var n = window.pageYOffset - 20;
    $.scrollTo(n, 10);
});
*/
Mousetrap.bind("G", function () {
    var n = $(document).height();
    $.scrollTo(n, 10);
});
Mousetrap.bind("g h", function () {
    window.location.href = "/";
});
Mousetrap.bind("g g", function () {
    $.scrollTo(0, 10);
});
Mousetrap.bind("g p", function () {
    var link = $("link[rel=prev]").attr("href");
    if (link) {
        window.location.href = link;
    }
});
Mousetrap.bind("g n", function () {
    var link = $("link[rel=next]").attr("href");
    if (link) {
        window.location.href = link;
    }
});
Mousetrap.bind("b o r k", function () {
    var bork = function (text) {
        var subs = [
            [/a([nu])/g, 'u$1'],
            [/A([nu])/g, 'U$1'],
            [/a\B/g, 'e'],
            [/A\B/g, 'E'],
            [/en\b/g, 'ee'],
            [/\Bew/g, 'oo'],
            [/\Be\b/g, 'e-a'],
            [/\be/g, 'i'],
            [/\bE/g, 'I'],
            [/\Bf/g, 'ff'],
            [/\Bir/g, 'ur'],
            [/(\w*?)i(\w*?)$/g, '$1ee$2'],
            [/\bow/g, 'oo'],
            [/\bo/g, 'oo'],
            [/\bO/g, 'Oo'],
            [/the/g, 'zee'],
            [/The/g, 'Zee'],
            [/th\b/g, 't'],
            [/\Btion/g, 'shun'],
            [/\Bu/g, 'oo'],
            [/\BU/g, 'Oo'],
            [/v/g, 'f'],
            [/V/g, 'F'],
            [/w/g, 'w'],
            [/W/g, 'W'],
            [/([a-z])[.]/g, '$1. Bork Bork Bork!']
        ];
        for (var i = 0; i < subs.length; i++) {
            text = text.replace(subs[i][0], subs[i][1]);
        }
        return text;
    };
    $('*:not(iframe)').contents().filter(function () {
        return this.nodeType === 3 && /[^\t\n\r ]/.test(this.textContent);
    }).each(function (_, el) {
        el.textContent = bork(el.textContent);
    });
    Mousetrap.unbind("b o r k");
});

var FIXED_HEADER_HEIGHT = 50;

function cycle(to, from) {
    from.removeClass("current");
    to.addClass("current");
    $.scrollTo(to.offset().top - FIXED_HEADER_HEIGHT);
}

function getNextOrPreviousSibling(node, forward) {
    if (forward) {
        return node.next();
    }
    return node.prev();
}

function cycleMenuItems(current, forward) {
    if (getNextOrPreviousSibling(current, forward).length) {
        cycle(getNextOrPreviousSibling(current, forward), current);
        curr.children("a").first().focus().css({
            outline: "none"
        });
    }
}

function cycleHeaders(matches, forward) {
    /* forward=1 next match
     * forward=0 previous match
     */
    var gotmatch = 0;

    matches.each(function (k, item) {
        if ($(item).hasClass("current")) {
            if ($(matches[forward ? k + 1 : k - 1]).length) {
                cycle($(matches[forward ? k + 1 : k - 1]), $(item));
                gotmatch = 1;
                return false;
            }
        }
    });
    if (!gotmatch) {
        cycle($(matches[forward ? 0 : matches.length - 1]), $(matches[forward ? matches.length - 1 : 0]));
    }
}
Mousetrap.bind("j", function () {
    /* Doc page */
    var node = $(".layout-menu .current");
    if (node.length) {
        cycleMenuItems(node, 1);
    } else {
        /* Cycle through headers on normal pages */
        var matches = $("#layout-content h1, #layout-content h2, #layout-content h3");
        cycleHeaders(matches, 1);
    }
});
Mousetrap.bind("k", function () {
    var node = $(".layout-menu .current");
    if (node.length) {
        cycleMenuItems(node, 0);
    } else {
        /* Cycle through headers on normal pages */
        var matches = $("#layout-content h1, #layout-content h2, #layout-content h3");
        cycleHeaders(matches, 0);
    }
});
$.expr[":"].icontains = $.expr.createPseudo(function (arg) {
    return function (elem) {
        return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
    };
});

function lookfor(txt) {
    var retval = $("#layout a:icontains('" + txt + "')");
    $(retval).each(function (k, val) {
        $("#goto .results ul").append("<li><a href='" + $(val).attr("href") + "'>" + $(val).text() + "</a></li>");
    });
}

function localpage(text) {
    lookfor(text);
}
Mousetrap.bind("g s", function (e) {
    boogie(e, localpage);
});

function boogie(e, cb) {
    cb($("#goto .text").text());
    $("#goto .results a:first").focus();
    $("#goto").slideToggle();

    $("html").on("keydown", function (e) {
        switch (e.which || e.keyCode) {
            case 8:
                /* Backspace */
                var txt = $("#goto .text").text();
                txt = txt.substring(0, txt.length - 1);
                $("#goto .text").text(txt);
                $("#goto .results ul").empty();
                cb(txt);
                $("#goto .results a:first").focus();
                e.preventDefault();
                break;
            case 13:
                /* Enter */
                Mousetrap.unpause();
                Mousetrap.trigger('esc');
                return true;
            case 9:
                /* Tab */
                $(document.activeElement).parent().next().first().focus();
                break;
            case 27:
                Mousetrap.unpause();
                Mousetrap.trigger('esc');
        }
    });
    $("html").on("keypress", function (e) {
        if (e.which == 13) {
            return true;
        }
        e.preventDefault();
        var letter = String.fromCharCode(e.which || e.keyCode);
        $("#goto .text").append(letter);
        var txt = $("#goto .text").text().trim();
        $("#goto .results ul").empty();
        cb(txt);
        $("#goto .results a:first").focus();
    });

    Mousetrap.pause();
}
if (!('contains' in String.prototype)) {
    String.prototype.contains = function (str, startIndex) {
        return -1 !== String.prototype.indexOf.call(this, str, startIndex);
    };
}
Mousetrap.bind("g a", function (e) {
    boogie(e, globalsearch);
});

function globalsearch(txt) {
    var key = "search-en";
    var cache = window.localStorage.getItem(key);
    cache = JSON.parse(cache);

    var term = txt.toLowerCase();
    if (term.length < 3) {
        return;
    }
    if (cache) {
        for (var type in cache.data) {
            console.log(type);
            var elms = cache.data[type].elements;
            for (var node in elms) {
                if (elms[node].description.toLowerCase().contains(term) || elms[node].name.toLowerCase().contains(term)) {
                    $("#goto .results ul").append("<li><a href='/manual/en/" + elms[node].id + ".php'>" + elms[node].name + ": " + elms[node].description + "</a></li>");
                    if ($("#goto .results ul li") > 30) {
                        return;
                    }
                }
            }
        }
    }
}
Mousetrap.bind("/", function (e) {
    if (e.preventDefault) {
        e.preventDefault();
    } else {
        // internet explorer
        e.returnValue = false;
    }
    $("input[type=search]").focus();
});
var rotate = 0;
Mousetrap.bind("r o t a t e enter", function (e) {
    rotate += 90;
    if (rotate > 360) {
        rotate = 0;
    }
    $("html").css("-webkit-transform", "rotate(" + rotate + "deg)");
    $("html").css("-moz-transform", "rotate(" + rotate + "deg)");
    $("html").css("-o-transform", "rotate(" + rotate + "deg)");
    $("html").css("-ms-transform", "rotate(" + rotate + "deg)");
    $("html").css("transform", "rotate(" + rotate + "deg)");
});
var scale = 1;
Mousetrap.bind("m i r r o r enter", function (e) {
    scale *= -1;
    $("html").css("-webkit-transform", "scaleX(" + scale + ")");
    $("html").css("-moz-transform", "scaleX(" + scale + ")");
    $("html").css("-o-transform", "scaleX(" + scale + ")");
    $("html").css("-ms-transform", "scaleX(" + scale + ")");
    $("html").css("transform", "scaleX(" + scale + ")");
});
Mousetrap.bind("I space h a t e space P H P enter", function (e) {
    window.location = "http://python.org";
});
Mousetrap.bind("I space l o v e space P H P enter", function (e) {
    flashMessage({
        text: 'Live long and prosper !'
    });
});
Mousetrap.bind("l o g o enter", function (e) {
    var time = new Date().getTime();
    $(".brand img").attr("src", "/images/logo.php?refresh&time=" + time);
});
Mousetrap.bind("u n r e a d a b l e enter", function (e) {
    document.cookie = 'MD=; path=/; expires=Thu, 01 Jan 1970 00:00:00 GMT';
    location.reload(true);
});
Mousetrap.bind("r e a d a b l e enter", function (e) {
    document.cookie = 'MD=1; path=/';
    location.reload(true);
});

function fixTimeout() {
    Mousetrap.trigger("m i r r o r enter");
    setTimeout(function () {
        Mousetrap.trigger("m i r r o r enter");
    }, 200);
    setTimeout(function () {
        fixTimeout();
    }, 30000);
}

function fixEdges(rotate) {
    if (rotate > 360) {
        rotate = 0;
        $("html").css("zoom", 1);
        $("html").css("-moz-transform", "scale(1)");
        $("html").css("-webkit-transform", "scale(1)");
        setTimeout(function () {
            fixEdges(36);
        }, 30000);
    } else {
        $("html").css("zoom", 0.5);
        $("html").css("-moz-transform", "scale(0.5)");
        $("html").css("-webkit-transform", "scale(0.5)");
        setTimeout(function () {
            fixEdges(rotate + 36);
        }, 100);
    }
    $("html").css("-webkit-transform", "rotate(" + rotate + "deg)");
    $("html").css("-moz-transform", "rotate(" + rotate + "deg)");
    $("html").css("-o-transform", "rotate(" + rotate + "deg)");
    $("html").css("-ms-transform", "rotate(" + rotate + "deg)");
    $("html").css("transform", "rotate(" + rotate + "deg)");
}
$(document).ready(function () {
    /*
        if (Math.floor(Math.random()*10) % 2) {
            fixTimeout();
        } else {
            fixEdges(36);
        }
    */
    var $docs = $('.docs');
    var $refsect1 = $docs.find('.refentry .refsect1');
    var $docsDivWithId = $docs.find('div[id]');
    $docsDivWithId.children("h1, h2, h3, h4").each(function () {
        $(this).append("<a class='genanchor' href='#" + $(this).parent().attr("id") + "'> ¶</a>");
    });

    $('.refentry code.parameter').click(function (event) {
        var id = $(this).text().replace(/^&?(\.\.\.)?\$?/g, '');
        var offsetTop = $('.parameters, .options').find('.parameter').filter(function () {
            return $(this).text().trim() === id; // https://bugs.php.net/bug.php?id=74493
        }).offset().top - 52;
        $.scrollTo({
            top: offsetTop,
            left: 0
        }, 400);
    });

    $('h1[id], h2[id], h3[id], h4[id]').each(function () {
        var $this = $(this);
        $this.append("<a class='genanchor' href='#" + $this.attr('id') + "'> ¶</a>");
    });

    (function () {
        var $elephpants = $(".elephpants");

        var $elephpantsImages = $elephpants.find('.images');
        // load the elephpant images if elephpants div is in the dom.
        $elephpantsImages.first().each(function (idx, node) {

            // function to fetch and insert images.
            var fetchImages = function () {

                // determine how many elephpants are required to fill the
                // viewport and subtract for any images we already have.
                var count = Math.ceil($(document).width() / 75) -
                    $elephpantsImages.find("img").length;

                // early exit if we don't need any images.
                if (count < 1) {
                    return;
                }

                // do the fetch.
                $.ajax({
                    url: '/images/elephpants.php?count=' + count,
                    dataType: 'json',
                    success: function (data) {
                        var photo, image;
                        for (photo in data) {
                            photo = data[photo];
                            link = $('<a>');
                            link.attr('href', photo.url);
                            link.attr('title', photo.title);
                            image = $('<img>');
                            image.attr('src', 'data:image/jpeg;base64,' + photo.data);
                            $(node).append(link.append(image));
                        }
                    },
                    error: function () {
                        $elephpants.hide();
                    }
                });
            };

            // begin by fetching the images we need now.
            fetchImages();

            // fetch more if viewport gets larger.
            var deferred = null;
            $(window).resize(function () {
                window.clearTimeout(deferred);
                deferred = window.setTimeout(function () {
                    fetchImages();
                }, 250);
            });
        });
    })();

    // We have <p> tags generated with nothing in them and it requires a PHD change, meanwhile this fixes it.
    $refsect1.find('p').each(function () {
        var $this = $(this),
            html = $this.html();
        if (html !== null && html.replace(/\s|&nbsp;/g, '').length == 0) {
            $this.remove();
        }
    });

    /*{{{ Scroll to top */
    (function () {
        var settings = {
            text: 'To Top',
            min: 200,
            inDelay: 600,
            outDelay: 400,
            containerID: 'toTop',
            containerHoverID: 'toTopHover',
            scrollSpeed: 400,
            easingType: 'linear'
        };

        var toTopHidden = true;
        var toTop = $('#' + settings.containerID);

        toTop.click(function (e) {
            e.preventDefault();
            $.scrollTo(0, settings.scrollSpeed, {
                easing: settings.easingType
            });
        });

        $(window).scroll(function () {
            var sd = $(this).scrollTop();
            if (sd > settings.min && toTopHidden) {
                toTop.fadeIn(settings.inDelay);
                toTopHidden = false;
            } else if (sd <= settings.min && !toTopHidden) {
                toTop.fadeOut(settings.outDelay);
                toTopHidden = true;
            }
        });

    })();
    /*}}}*/

    /*{{{User Notes*/
    $("#usernotes a.usernotes-voteu, #usernotes a.usernotes-voted").each(function () {
        $(this).click(function (event) {
            event.preventDefault();
            var url = $(this).attr("href");
            var id = url.match(/\?id=(\d+)/)[1];
            var request = $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                headers: {
                    "X-Json": "On"
                },
                beforeSend: function () {
                    $("#Vu" + id).hide();
                    $("#Vd" + id).hide();
                    $("#V" + id).html("<img src=\"/images/working.gif\" alt=\"Working...\" border=\"0\" title=\"Working...\">");
                }
            });
            request.done(function (data) {
                if (data.success != null && data.success == true) {
                    $("#V" + id).html("<div style=\"float: left; width: 16px; height: 16px; background-image: url(/images/notes-features.png); background-position:-32px 16px; margin-right: 8px; overflow: hidden;\" border=\"0\" alt=\"success\" title=\"Thank you for voting!\"></div>" + data.update);
                    flashMessage({
                        text: 'Thank you for voting!'
                    });
                } else {
                    var responsedata = "Error :(";
                    if (data.msg != null) {
                        responsedata = data.msg;
                    }
                    $("#V" + id).html("<div style=\"float: left; width: 16px; height: 16px; background-image: url(/images/notes-features.png); background-position:-32px 0px; margin-right: 8px; overflow: hidden;\" border=\"0\" alt=\"fail\" title=\"" + responsedata + "\"></div>");
                    flashMessage({
                        text: 'Unexpected error occured, please try again later!',
                        type: 'error'
                    });
                }
            });
            request.fail(function (jqXHR, textStatus) {
                $("#Vu" + id).show();
                $("#Vd" + id).show();
                $("#V" + id).html("<div style=\"float: left; width: 16px; height: 16px; background-image: url(/images/notes-features.png); background-position:-32px 0px; margin-right: 8px; overflow: hidden;\" border=\"0\" alt=\"fail\" title=\"Error :(\"></div>");
                flashMessage({
                    text: 'Something went wrong :(',
                    type: 'error'
                });
            });
            request.always(function (data) {
                $("#V" + id).fadeIn(500, "linear");
            });
        });
    });
    /*}}}*/

    // Search box autocomplete (for browsers that aren't IE <= 8, anyway).
    if (typeof window.brokenIE === "undefined") {
        jQuery("#topsearch .search-query").search({
            language: getLanguage(),
            limit: 30
        });
    }

    /* {{{ Negative user notes fade-out */
    var usernotes = document.getElementById('usernotes');
    if (usernotes != null) {
        var mapper = new function () {
            this.domain = {
                "max": -1,
                "min": -5
            };
            this.range = {
                "max": 0.75,
                "min": 0.35
            };

            // This is a generic normalizaion algorithm:
            //   range.min + (value - domain.min)(range.max - range.min)/(domain.max-domain.min)
            // Note that some of this computation is not dependent on the input value, so we
            // compute it at object creation time.
            var multiplier = (this.range.max - this.range.min) / (this.domain.max - this.domain.min);
            this.normalize = function (value) {
                value = Math.max(value, this.domain.min);
                return (value - this.domain.min) * multiplier + this.range.min;
            };
        };
        $(usernotes).on('mouseenter mouseleave', '.note', function (event) {
            var opacity = 1;
            var $note = $(this).find('.text');
            if (event.type === 'mouseleave' && $note.data('opacity') !== undefined) {
                opacity = $note.data('opacity');
            }
            $note.css('opacity', opacity);
        }).find('.note').each(function () {
            $(this).find('.tally:contains("-")').each(function () {
                var id = this.id.replace('V', 'Hcom');
                var v = mapper.normalize(this.innerHTML.toInt());
                $('#' + id).css('opacity', v).data("opacity", v);
            });
        });
    }
    /* }}} */

    /* {{{ Remove "inline code" style from .parameter */
    // CSS3 can't traverse up the DOM tree
    $('code.parameter').closest('em').addClass('reset');
    /* }}} */

    /* {{{ Init template generated flash messages */
    $('#flash-message .message').each(function () {
        flashMessage($(this));
    });
    /* }}} */
});

/* {{{ add-user.php animations */
$(function () {
    if (!document.getElementById('add-note-usernotes')) {
        return;
    }

    $('#usernotes').animate({
        marginLeft: 0
    }, 1000);

    $('#usernotes .note').removeAttr('style');

    var times = [3, 7, 10];
    for (i in times) {
        times[i] = times[i] * 1000;
    }

    var notes = [];
    notes[0] = $('#usernotes .bad');
    notes[1] = $('#usernotes .good');
    notes[2] = $('#usernotes .spam');

    setTimeout(function () {
        notes[0].find('.usernotes-voted').css('border-top-color', '#001155');
        notes[1].find('.usernotes-voteu').css('border-bottom-color', '#001155');

        var t = 1000;
        var i = 1;
        var timer = setInterval(function () {
            if (i * t > times[1] - times[0]) {
                clearTimeout(timer);
                return;
            }

            notes[0].find('.tally').html(notes[0].find('.tally').html().toInt() - 1);
            notes[1].find('.tally').html(notes[1].find('.tally').html().toInt() + 1);

            i++;
        }, t);

        notes[0].find('.text').animate({
            opacity: 0.3
        }, (times[1] - times[0]));

    }, times[0]);

    setTimeout(function () {
        notes[2].find('.text').html("@BJORI DOESN'T LIKE SPAM").css('background-color', '#F9ECF2');
    }, times[1]);

    setTimeout(function () {
        notes[0].fadeOut();
        notes[2].fadeOut();
        $('#usernotes .count').html('1 note');
    }, times[2]);
});
/* }}} */

/* {{{ Flash Messenger */
function flashMessage(o) {
    var defaults = {
        timeout: 6000,
        type: 'success',
        text: '',
        parent: '#flash-message'
    };

    // Options are passed, set defaults and generate message
    if (!o.jquery) {
        var options = $.extend(defaults, o);

        var id = 'id_' + Math.random().toString().replace('0.', '');

        var message = $('<div>')
            .addClass('message ' + options.type)
            .data('type', options.type)
            .attr('id', id)
            .html(options.text);

        $(options.parent).append(message);

        var o = $('#' + id);
    }
    // jQuery object is passed, that means the message is pre-generated
    // Only timeout is adjustable via data-timeout=""
    else {
        options = {
            timeout: o.data('timeout')
        };
    }

    var remove = function (o) {
        o.slideUp(400, function () {
            $(this).remove();
        });
    };

    if (options.timeout) {
        setTimeout(function () {
            if (!o.length) {
                return;
            }
            remove(o);
        }, options.timeout);
    }

    o.on('click', function () {
        remove($(this));
    });

    return true;
}
/* }}} */

/**
 * Determine what language to present to the user.
 */
function getLanguage() {
    return document.documentElement.lang;
}

(function ($) {
    $('#legacy-links a').each(function () {
        var $link = $(this);
        $link.attr('href', $link.attr('href') + window.location.hash);
    });
})(jQuery);

// vim: set ts=4 sw=4 et:
