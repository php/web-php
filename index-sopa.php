<?php // vim: et
/*
   If you're reading this, it isn't because you've found a security hole.
   this is an open source website. read and learn!
*/

/* ------------------------------------------------------------------------- */

// Get the modification date of this PHP file
$timestamp = @getlastmod();

// Note that this is not a RFC 822 date (the tz is always GMT)
$tsstring = gmdate("D, d M Y H:i:s ", $timestamp) . "GMT";

// Check if the client has the same page cached
if (isset($_SERVER["HTTP_IF_MODIFIED_SINCE"]) &&
    ($_SERVER["HTTP_IF_MODIFIED_SINCE"] == $tsstring)) {
    header("HTTP/1.1 304 Not Modified");
    exit();
}
// Inform the user agent what is our last modification date
else {
    header("Last-Modified: " . $tsstring);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow">
<title>STOP SOPA/PIPA!</title>
<style type="text/css" media="all">
html,
body {
    margin: 0;
    padding: 0;
}

#text-shadow-box {
    position: fixed;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    background: #444;
    font-family: Helvetica, Arial, sans-serif;
    -webkit-tap-highlight-color: rgba(0,0,0,0);
        -webkit-user-select: none;
}

#text-shadow-box #tsb-text,
#text-shadow-box #tsb-link {
    position: absolute;
    top: 40%;
    left: 0;
    width: 100%;
    height: 1em;
    margin: -0.77em 0 0 0;
    font-size: 90px;
    line-height: 1em;
    font-weight: bold;
    text-align: center;
}

#text-shadow-box #tsb-text {
    font-size: 100px;
    color: transparent;
}

#text-shadow-box #tsb-link a {
    color: #999;
    text-decoration: none;
}

#text-shadow-box #tsb-box,
#text-shadow-box #tsb-wall {
    position: absolute;
    top: 40%;
    left: 0;
    width: 100%;
    height: 60%;
}

#text-shadow-box #tsb-wall {
    background: #999;
}

#text-shadow-box #tsb-wall p {
    font-size: 18px;
    line-height: 1.5em;
    text-align: justify;
    color: #222;
    width: 550px;
    margin: 1.5em auto;
}

#text-shadow-box #tsb-wall p a {
    color: #fff;
}

#text-shadow-box #tsb-wall p a:hover {
    text-decoration: none;
    color: #000;
    background: #fff;
}

#tsb-spot {
    position: absolute;
    top: 0;
    left: 0;
    width: 200%;
    height: 200%;
    pointer-events: none;
    background: -webkit-gradient(radial, center center, 0, center center, 350, from(rgba(0,0,0,0)), to(rgba(0,0,0,1)));
    background: -moz-radial-gradient(center 45deg, circle closest-side, transparent 0, black 350px);
}
</style>

</head>
<body>
    
<div id="text-shadow-box">
    <div id="tsb-box"></div>
    <p id="tsb-text">STOP SOPA/PIPA!</p>
    <p id="tsb-link"><a href="http://americancensorship.org/">STOP SOPA/PIPA!</a></p>
    <div id="tsb-wall">
        <p>This site has gone dark today in protest of the U.S. Stop Online Piracy Act (<a href="http://www.opencongress.org/bill/112-h3261/show">SOPA</a>) and PROTECT-IP Act (<a href="http://www.opencongress.org/bill/112-s968/show">PIPA</a>).  The U.S. Congress is about to censor the Internet, even though the vast majority of Americans are opposed. We need to kill these bills to protect our rights to free speech, privacy, and prosperity.  Learn more at <a href="http://americancensorship.org/">AmericanCensorship.org</a></p>
    </div>
    <div id="tsb-spot"></div>
</div>

<script type="text/javascript" language="javascript" charset="utf-8">
/**
 * Zachary Johnson
 * http://www.zachstronaut.com
 * I place the following code in the public domain.
 */
 
var text = null;
var spot = null;
var box = null;
var boxProperty = '';

init();

function init() {
    text = document.getElementById('tsb-text');
    spot = document.getElementById('tsb-spot');
    box = document.getElementById('tsb-box');
    
    if (typeof box.style.webkitBoxShadow == 'string') {
        boxProperty = 'webkitBoxShadow';
    } else if (typeof box.style.MozBoxShadow == 'string') {
        boxProperty = 'MozBoxShadow';
    } else if (typeof box.style.boxShadow == 'string') {
        boxProperty = 'boxShadow';
    }

    if (text && spot && box) {
        document.getElementById('text-shadow-box').onmousemove = onMouseMove;
        document.getElementById('text-shadow-box').ontouchmove = function (e) {e.preventDefault(); e.stopPropagation(); onMouseMove({clientX: e.touches[0].clientX, clientY: e.touches[0].clientY});};
    }
    
    onMouseMove({clientX: Math.floor(window.innerWidth / 2), clientY: Math.floor(window.innerHeight / 2.75)});
}

function onMouseMove(e) {
    var xm = (e.clientX - Math.floor(window.innerWidth / 2)) * 0.4;
    var ym = (e.clientY - Math.floor(window.innerHeight / 3)) * 0.4;
    var d = Math.round(Math.sqrt(xm*xm + ym*ym) / 5);
    text.style.textShadow = -xm + 'px ' + -ym + 'px ' + (d + 10) + 'px black';
    
    if (boxProperty) {
        box.style[boxProperty] = '0 ' + -ym + 'px ' + (d + 30) + 'px black';
    }
    
    xm = e.clientX - window.innerWidth;
    ym = e.clientY - window.innerHeight;
    spot.style.backgroundPosition = xm + 'px ' + ym + 'px';
}
</script>

</body>
</html>
