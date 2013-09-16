/* Plugins, etc, are on top. */

/** {{{
 * jQuery.ScrollTo - Easy element scrolling using jQuery.
 * Copyright (c) 2007-2009 Ariel Flesler - aflesler(at)gmail(dot)com | http://flesler.blogspot.com
 * Dual licensed under MIT and GPL.
 * Date: 5/25/2009
 * @author Ariel Flesler
 * @version 1.4.2
 *
 * http://flesler.blogspot.com/2007/10/jqueryscrollto.html
 */
;(function(d){var k=d.scrollTo=function(a,i,e){d(window).scrollTo(a,i,e)};k.defaults={axis:'xy',duration:parseFloat(d.fn.jquery)>=1.3?0:1};k.window=function(a){return d(window)._scrollable()};d.fn._scrollable=function(){return this.map(function(){var a=this,i=!a.nodeName||d.inArray(a.nodeName.toLowerCase(),['iframe','#document','html','body'])!=-1;if(!i)return a;var e=(a.contentWindow||a).document||a.ownerDocument||a;return d.browser.safari||e.compatMode=='BackCompat'?e.body:e.documentElement})};d.fn.scrollTo=function(n,j,b){if(typeof j=='object'){b=j;j=0}if(typeof b=='function')b={onAfter:b};if(n=='max')n=9e9;b=d.extend({},k.defaults,b);j=j||b.speed||b.duration;b.queue=b.queue&&b.axis.length>1;if(b.queue)j/=2;b.offset=p(b.offset);b.over=p(b.over);return this._scrollable().each(function(){var q=this,r=d(q),f=n,s,g={},u=r.is('html,body');switch(typeof f){case'number':case'string':if(/^([+-]=)?\d+(\.\d+)?(px|%)?$/.test(f)){f=p(f);break}f=d(f,this);case'object':if(f.is||f.style)s=(f=d(f)).offset()}d.each(b.axis.split(''),function(a,i){var e=i=='x'?'Left':'Top',h=e.toLowerCase(),c='scroll'+e,l=q[c],m=k.max(q,i);if(s){g[c]=s[h]+(u?0:l-r.offset()[h]);if(b.margin){g[c]-=parseInt(f.css('margin'+e))||0;g[c]-=parseInt(f.css('border'+e+'Width'))||0}g[c]+=b.offset[h]||0;if(b.over[h])g[c]+=f[i=='x'?'width':'height']()*b.over[h]}else{var o=f[h];g[c]=o.slice&&o.slice(-1)=='%'?parseFloat(o)/100*m:o}if(/^\d+$/.test(g[c]))g[c]=g[c]<=0?0:Math.min(g[c],m);if(!a&&b.queue){if(l!=g[c])t(b.onAfterFirst);delete g[c]}});t(b.onAfter);function t(a){r.animate(g,j,b.easing,a&&function(){a.call(this,n,b)})}}).end()};k.max=function(a,i){var e=i=='x'?'Width':'Height',h='scroll'+e;if(!d(a).is('html,body'))return a[h]-d(a)[e.toLowerCase()]();var c='client'+e,l=a.ownerDocument.documentElement,m=a.ownerDocument.body;return Math.max(l[h],m[h])-Math.min(l[c],m[c])};function p(a){return typeof a=='object'?a:{top:a,left:a}}})(jQuery);
/*}}}*/
$(document).ready(function() {

    // Ugh, cookie handling.
    var cookies = document.cookie.split(";");

    // Wire up the beta warning.
    $("#beta-warning-close").click(function(event) {
        event.preventDefault();
        $('#head-beta-warning').slideUp("fast", function(){$(this).remove()});

        // Hide it for a month by default.
        var expiry = new Date();
        expiry.setTime(expiry.getTime() + (30 * 24 * 60 * 60 * 1000));

        document.cookie = "BetaWarning=off; expires=" + expiry.toGMTString() + "; path=/";
    });

    var $docs = $('.docs');
    var $refsect1 = $docs.find('.refentry .refsect1');
    var $docsDivWithId = $docs.find('div[id]');
    $docsDivWithId.children("h1, h2, h3, h4").each(function(){
        $(this).append("<a class='genanchor' href='#" + $(this).parent().attr("id") + "'> ¶</a>");
    });
    var scrollHeightOfHeadnav = - document.getElementById('head-nav').scrollHeight;
    scrollHeightOfHeadnav -= 12; //some margin
    $parameters = $refsect1.filter(".parameters").find(".term .parameter");
    $refsect1.find(".parameter").each(function () {
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
    $refsect1.find('p').each(function() {
        var $this = $(this), html = $this.html();
        if(html !== null && html.replace(/\s|&nbsp;/g, '').length == 0) {
            $this.remove();
        }
    });

/*{{{ Scroll to top */
    (function() {
        var settings = {
            text: 'To Top',
            min: 200,
            inDelay:600,
            outDelay:400,
            containerID: 'toTop',
            containerHoverID: 'toTopHover',
            scrollSpeed: 400,
            easingType: 'linear'
        };
        var containerIDhash = '#' + settings.containerID;
        var containerHoverIDHash = '#'+settings.containerHoverID;

        $('body').append('<a href="#" id="'+settings.containerID+'" onclick="return false;"><img src="/images/to-top@2x.png" width="40" hieght="40" alt="'+settings.text+'"/></a>');
        $(containerIDhash).hide().click(function(){
            $('html, body').animate({scrollTop:0}, settings.scrollSpeed, settings.easingType);
            $('#'+settings.containerHoverID, this).stop().animate({'opacity': 0 }, settings.inDelay, settings.easingType);
            return false;
        })
        .prepend('<span id="'+settings.containerHoverID+'"></span>')
        .hover(function() {
            $(containerHoverIDHash, this).stop().animate({
                'opacity': 1
            }, 600, 'linear');
        }, function() {
            $(containerHoverIDHash, this).stop().animate({
                'opacity': 0
            }, 700, 'linear');
        });

        $(window).scroll(function() {
            var sd = $(window).scrollTop();
            if (typeof document.body.style.maxHeight === "undefined") {
                $(containerIDhash).css({
                    'position': 'absolute',
                    'top': $(window).scrollTop() + $(window).height() - 50
                });
            }
            if ( sd > settings.min ) {
                $(containerIDhash).fadeIn(settings.inDelay);
            } else {
                $(containerIDhash).fadeOut(settings.outDelay);
            }
        });    

    })();
/*}}}*/

/*{{{User Notes*/
    $("#usernotes a.usernotes-voteu, #usernotes a.usernotes-voted").each(
    function () {
      $(this).click(
        function (event) {
          event.preventDefault();
          var url = $(this).attr("href");
          var id = url.match(/\?id=(\d+)/)[1];
          var request = $.ajax({
            type: "POST",
            url: url,
            dataType: "json",
            headers: {"X-Json": "On" },
            beforeSend: function() {
              $("#Vu"+id).hide();
              $("#Vd"+id).hide();
              $("#V"+id).html("<img src=\"/images/working.gif\" alt=\"Working...\" border=\"0\" title=\"Working...\" />");
            }
          });
          request.done(function(data) {
            if(data.success != null && data.success == true) {
              $("#V"+id).html("<div style=\"float: left; width: 16px; height: 16px; background-image: url(/images/notes-features.png); background-position:-32px 16px; margin-right: 8px; overflow: hidden;\" border=\"0\" alt=\"success\" title=\"Thank you for voting!\"></div>" + data.update);
            }
            else {
              var responsedata = "Error :(";
              if (data.msg != null) {
                responsedata = data.msg;
              }
              $("#V"+id).html("<div style=\"float: left; width: 16px; height: 16px; background-image: url(/images/notes-features.png); background-position:-32px 0px; margin-right: 8px; overflow: hidden;\" border=\"0\" alt=\"fail\" title=\"" + responsedata + "\"></div>");
            }
          });
          request.fail(function(jqXHR, textStatus) {
            $("#Vu"+id).show();
            $("#Vd"+id).show();
            $("#V"+id).html("<div style=\"float: left; width: 16px; height: 16px; background-image: url(/images/notes-features.png); background-position:-32px 0px; margin-right: 8px; overflow: hidden;\" border=\"0\" alt=\"fail\" title=\"Error :(\"></div>");
          });
          request.always(function(data) {
            $("#V"+id).fadeIn(500, "linear");
          });
        }
      );
    }
    );
/*}}}*/

});

/**
 * Determine what language to present to the user.
 */
function getLanguage()
{
    return document.documentElement.lang;
}
