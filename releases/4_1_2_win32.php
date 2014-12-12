<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_1_2_win32.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 4.1.2 Windows (Win32) Release Announcement");
?>

<h1>PHP 4.1.2 Windows (Win32) Release Announcement</h1>

<p>
 Due to an issue with the Windows binary allowing any user to read or
 execute the contents of a file directly from the PHP binary, we have
 delayed the 4.1.2 release of PHP for Windows to allow for this fix.
 This release also fixes the file upload security problem.
</p>

<p>
 With this new release, we introduce 2 new php.ini settings, which
 <strong>MUST</strong> be set to make the binary work. It's worth
 noting, at this point, that this particular fix only applies to
 the CGI binary. The SAPI module will still work as expected,
 and it's use is encouraged.
</p>

<p>The new settings are:</p>
<ul>
 <li><code>cgi.force_redirect 0|1</code></li>
 <li><code>cgi.redirect_status_env ENV_VAR_NAME</code></li>
</ul>

<h2>WebServers affected by this vulnerability</h2>

<p>
 It is known that Apache (any version) and iPlanet servers are
 vulnerable to this issue, however Microsoft IIS is not. Since
 cgi.force_redirect takes a value of either 1 or 0, (on or off)
 you should set it to 1 if you are running Apache or iPlanet
 servers, and to 0 for IIS. If you are unsure of which you need,
 set it to 1 and see if your scripts execute. You will need to
 stop and restart your server when you change your php.ini file,
 for the changes to have effect.
</p>
<p>
 If cgi.force_redirect is turned on, and you are not running under
 Apache or Netscape (iPlanet) web servers, you MAY need to set an
 environment variable name that PHP will look for to know it is OK
 to continue execution. Setting this variable MAY cause security
 issues, so check what you are doing first.
</p>

<p>
 More information can be found <a href="http://security.e-matters.de/advisories/012002.html">here</a> 
 relating to the form upload exploit that caused the release of 4.1.2 initially.
</p>

<?php site_footer(); ?>
