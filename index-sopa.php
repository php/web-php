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
    header('HTTP/1.1 503 Stop SOPA/PIPA');
    header('Status: 503 Stop SOPA/PIPA');
    header('Retry-After: 7200');
    header("Last-Modified: " . $tsstring);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow">
<title>Stop SOPA/PIPA!</title>
<style type="text/css" media="all">
html,
body {
    margin: 0;
    padding: 0;
    color: #d0d0d0;
    background: #000000;
    font-family:Helvetica;
    font-size:18px;
    margin:10% auto;
    max-width:800px;
    line-height:1.5em;
}
a {
    color:#fff;
}
a:hover {
    color:#a00;
}
</style>
</head>
<body>
   <h2>503: Stop SOPA/PIPA</h2> 
   <p>
   The <a href="">SOPA</a>/<a href="">PIPA</a> bills threaten the open nature of the Web and thus threaten Open Source
   projects like ours. If you have the ability to vote in the United States, help us out and contact your representatives.
   If you are not able to vote in the United States, you can help by petitioning the U.S. state department. Bills like these
   have a habit of spreading to other countries if we don't stop them at their source.
   Visit <a href="http://americancensorship.org">AmericanCensorship.org</a> to learn how to do both.
   </p>
</body>
</html>
