<?php
/* if you're reading this, it isn't because you've found a security hole.
   this is an open source website. read and learn! */

header("Cache-Control: public, max-age=600");

require_once 'prepend.inc';

commonHeader("Hypertext Preprocessor");
echo "\n<!--$MYSITE-->\n";
?>

<h1>
PHP Security Advisory: Vulnerability in PHP versions 4.2.0 and 4.2.1
</h1>

<p>[ <a href="/release_4_2_2_fr.php">Version Fran&ccedil;aise</a> ]&nbsp;</p>

<p><table border="0" cellpadding="0" cellspacing="0">
<tr><td>Issued on:</td><td>&nbsp;&nbsp;</td><td><b>July 22, 2002</b></td></tr>
<tr><td>Software:</td><td>&nbsp;&nbsp;</td><td><b>PHP versions 4.2.0 and 4.2.1</b></td></tr>
<tr><td>Platforms:</td><td>&nbsp;&nbsp;</td><td><b>All</b></td></tr>
</table></p>

<p>The PHP Group has learned of a serious security vulnerability in PHP
   versions 4.2.0 and 4.2.1. An intruder may be able to execute arbitrary
   code with the privileges of the web server. This vulnerability may be
   exploited to compromise the web server and, under certain conditions,
   to gain privileged access.</p>


<h2>Description</h2>

<p>PHP contains code for intelligently parsing the headers of HTTP POST
   requests. The code is used to differentiate between variables and files
   sent by the user agent in a "multipart/form-data" request. This parser
   has insufficient input checking, leading to the vulnerability.</p>
   
<p>The vulnerability is exploitable by anyone who can send HTTP POST
   requests to an affected web server. Both local and remote users, even
   from behind firewalls, may be able to gain privileged access.</p>


<h2>Impact</h2>

<p>Both local and remote users may exploit this vulnerability to compromise
   the web server and, under certain conditions, to gain privileged access.
   So far only the IA32 platform has been verified to be safe from the
   execution of arbitrary code. The vulnerability can still be used on IA32
   to crash PHP and, in most cases, the web server.</p>
   

<h2>Solution</h2>

<p>The PHP Group has released a new PHP version, 4.2.2, which incorporates
   a fix for the vulnerability. All users of affected PHP versions are
   encouraged to upgrade to this latest version. The downloads web site at

      <ul><a href="http://www.php.net/downloads.php">http://www.php.net/downloads.php</a></ul>
   
   has the new 4.2.2 source tarballs, Windows binaries and source patches
   from 4.2.0 and 4.2.1 available for download.</p>



<h2>Workaround</h2>

<p>If the PHP applications on an affected web server do not rely on HTTP
   POST input from user agents, it is often possible to deny POST requests
   on the web server.</p>
   
<p>In the Apache web server, for example, this is possible with the
   following code included in the main configuration file or a top-level
   .htaccess file:
   
      <ul><code>
      &lt;Limit POST&gt;<br>
      &nbsp;&nbsp;&nbsp;Order deny,allow<br>
      &nbsp;&nbsp;&nbsp;Deny from all<br>
      &lt;/Limit&gt;<br>
      </code></ul>
      
   Note that an existing configuration and/or .htaccess file may have
   parameters contradicting the example given above.</p>
   

<h2>Credits</h2>

<p>The PHP Group would like to thank Stefan Esser of e-matters GmbH for
   discovering this vulnerability.</p>
   
<?php commonFooter(); ?>
