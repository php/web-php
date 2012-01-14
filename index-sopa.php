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
<html>
<head>
<title>Stop SOPA/PIPA</title>
<style>
body { 
  background-color: #000000; 
  color:#b5b5b5;
  font-family:'Lucida Grande', 'Lucida Sans', 'Verdana', 'sans-serif';
  font-size:12px;
}
h1 {
  text-align: center; 
  margin-top: 4em;
  font-size:48px;
  color:#ffffff;
}
p {
  text-align: center; 
  margin-top: 2em;
  font-size:24px;
  color:#ffffff;
}

a:link {
  color: #ffffff;
  text-decoration: none;
}
</style>
</head>
<body>
<h1>Stop <a href="http://www.opencongress.org/bill/112-h3261/show">SOPA</a>/<a href="http://www.opencongress.org/bill/112-s968/show">PIPA</a></h1>
<p>
<a href="http://americancensorship.org/">For more information (americancensorship.org)</a>
</p>
</body>
</html>
