<?php
/* if you're reading this, it isn't because you've found a security hole.
   this is an open source website. read and learn! */

header("Cache-Control: public, max-age=600");

require_once 'prepend.inc';

commonHeader("Hypertext Preprocessor");
echo "\n<!--$MYSITE-->\n";
?>

<h1>
PHP Security Advisory: CGI vulnerability in PHP version 4.3.0
</h1>

<table border="0" cellpadding="0" cellspacing="0">
<tr><td>Issued on:</td><td>&nbsp;&nbsp;</td><td><b>February 17, 2003</b></td></tr>
<tr><td>Software:</td><td>&nbsp;&nbsp;</td><td><b>PHP version 4.3.0</b></td></tr>
<tr><td>Platforms:</td><td>&nbsp;&nbsp;</td><td><b>All</b></td></tr>
</table>

<p>
  The PHP Group has learned of a serious security vulnerability in 
  the CGI SAPI of PHP version 4.3.0.
</p>


<h2>Description</h2>

<p>
  PHP contains code for preventing direct access to the CGI binary with
  configure option "--enable-force-cgi-redirect" and php.ini option
  "cgi.force_redirect". In PHP 4.3.0 there is a bug which renders these
  options useless.
</p>

<p>
  NOTE: This bug does NOT affect any of the other SAPI modules.
  (such as the Apache or ISAPI modules, etc.)
</p>
   
<h2>Impact</h2>

<p>
  Anyone with access to websites hosted on a web server which employs 
  the CGI module may exploit this vulnerability to gain access to any file
  readable by the user under which the webserver runs.
</p>

<p>
  A remote attacker could also trick PHP into executing arbitrary PHP code 
  if attacker is able to inject the code into files accessible by the CGI. 
  This could be for example the web server access-logs.
</p>

<h2>Solution</h2>

<p>
  The PHP Group has released a new PHP version, 4.3.1, which incorporates
  a fix for the vulnerability. All users of affected PHP versions are
  encouraged to upgrade to this latest version. The downloads web site at
  <a href="http://www.php.net/downloads.php">http://www.php.net/downloads.php</a>
  has the new 4.3.1 source tarballs, Windows binaries and source patch
  from 4.3.0 available for download. You will only need to upgrade if 
  you're using the CGI module of PHP 4.3.0. There are no other bugfixes
  contained in this release.
</p>

<h2>Workarounds</h2>

<p>None.</p>

<h2>Credits</h2>

<p>
  The PHP Group would like to thank Kosmas Skiadopoulos for discovering 
  this vulnerability.
</p>
   
<?php commonFooter(); ?>
