<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_3_6.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.3.6 Release Announcement");
?>

<h1>PHP 5.3.6 Release Announcement</h1>

<p>The PHP development team would like to announce the immediate
availability of PHP 5.3.6. This release focuses on improving the
stability of the PHP 5.3.x branch with over 60 bug fixes, some of which
are security related.</p>

<p><b>Security Enhancements and Fixes in PHP 5.3.6:</b></p>
<ul>
    <li>Enforce security in the fastcgi protocol parsing with fpm SAPI.</li>
    <li>Fixed bug #54247 (format-string vulnerability on Phar). (CVE-2011-1153)</li>
    <li>Fixed bug #54193 (Integer overflow in shmop_read()). (CVE-2011-1092)</li>
    <li>Fixed bug #54055 (buffer overrun with high values for precision ini setting).</li>
    <li>Fixed bug #54002 (crash on crafted tag in exif). (CVE-2011-0708)</li>
    <li>Fixed bug #53885 (ZipArchive segfault with FL_UNCHANGED on empty archive). (CVE-2011-0421)</li>
</ul>

<p><b>Key enhancements in PHP 5.3.6 include:</b></p>
<ul>
    <li>Upgraded bundled Sqlite3 to version 3.7.4.</li>
    <li>Upgraded bundled PCRE to version 8.11.</li>
    <li>Added ability to connect to HTTPS sites through proxy with basic authentication using stream_context/http/header/Proxy-Authorization.</li>
    <li>Added options to debug backtrace functions.</li>
    <li>Changed default value of ini directive serialize_precision from 100 to 17.</li>
    <li>Fixed Bug #53971 (isset() and empty() produce apparently spurious runtime error).</li>
    <li>Fixed Bug #53958 (Closures can't 'use' shared variables by value and by reference).</li>
    <li>Fixed bug #53577 (Regression introduced in 5.3.4 in open_basedir with a trailing forward slash).</li>
    <li>Over 60 other bug fixes.</li>
</ul>

<p>Windows users: please mind that we do no longer provide builds created 
with Visual Studio C++ 6. It is impossible to maintain a high quality 
and safe build of PHP for Windows using this unmaintained compiler.</p>

<p>For Apache SAPIs (php5_apache2_2.dll), be sure that you use a Visual 
Studio C++ 9 version of Apache. We recommend the Apache builds as provided 
by <a href="http://www.apachelounge.com/">ApacheLounge</a>. For any other 
SAPI (CLI, FastCGI via mod_fcgi, FastCGI with IIS or other FastCGI capable 
server), everything works as before. Third party extension providers 
must rebuild their extensions to make them compatible and loadable with 
the Visual Studio C++9 builds that we now provide.</p>

<p>All PHP users should note that the PHP 5.2 series is NOT supported 
anymore. All users are strongly encouraged to upgrade to PHP 5.3.6.</p>


<?php site_footer(); ?>
