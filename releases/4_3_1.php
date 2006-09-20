<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_3_1.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 4.3.1 Release Announcement");
?>

<h1>
PHP Security Advisory: CGI vulnerability in PHP version 4.3.0
</h1>

<dl>
 <dt>Issued on:</dt>
 <dd>February 17, 2003</dd>
 <dt>Software:</dt>
 <dd>PHP version 4.3.0</dd>
 <dt>Platforms:</dt>
 <dd>All</dd>
</dl>

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
 encouraged to upgrade to this latest version. <a href="/downloads.php">The
 downloads page</a> has the new 4.3.1 source tarballs, Windows binaries
 and source patch from 4.3.0 available for download. You will only need
 to upgrade if you're using the CGI module of PHP 4.3.0. There are no
 other bugfixes contained in this release.
</p>

<h2>Workarounds</h2>

<p>None.</p>

<h2>Credits</h2>

<p>
 The PHP Group would like to thank Kosmas Skiadopoulos for discovering 
 this vulnerability.
</p>
   
<?php site_footer(); ?>
