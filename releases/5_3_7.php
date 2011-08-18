<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_3_7.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.3.7 Release Announcement");
?>

<h1>PHP 5.3.7 Release Announcement</h1>

<p>The PHP development team would like to announce the immediate
availability of PHP 5.3.7. This release focuses on improving the
stability of the PHP 5.3.x branch with over 90 bug fixes, some of which
are security related.</p>

<p><b>Security Enhancements and Fixes in PHP 5.3.7:</b></p>
<ul>
	<li>Updated crypt_blowfish to 1.2. (CVE-2011-2483)</li>
	<li>Fixed crash in error_log(). Reported by Mateusz Kocielski</li>
	<li>Fixed buffer overflow on overlog salt in crypt().</li>
	<li>Fixed bug #54939 (File path injection vulnerability in RFC1867 File upload filename). Reported by Krzysztof Kotowicz. (CVE-2011-2202)</li>
	<li>Fixed stack buffer overflow in socket_connect(). (CVE-2011-1938)</li>
	<li>Fixed bug #54238 (use-after-free in substr_replace()). (CVE-2011-1148)</li>
</ul>

<p><b>Key enhancements in PHP 5.3.7 include:</b></p>
<ul>
    <li>Upgraded bundled Sqlite3 to version 3.7.7.1</li>
    <li>Upgraded bundled PCRE to version 8.12</li>
    <li>Fixed bug #54910 (Crash when calling call_user_func with unknown function name)</li>
    <li>Fixed bug #54585 (track_errors causes segfault)</li>
    <li>Fixed bug #54262 (Crash when assigning value to a dimension in a non-array)</li>
    <li>Fixed a crash inside dtor for error handling</li>
    <li>Fixed bug #55339 (Segfault with allow_call_time_pass_reference = Off)</li>
    <li>Fixed bug #54935 php_win_err can lead to crash</li>
    <li>Fixed bug #54332 (Crash in zend_mm_check_ptr // Heap corruption)</li>
    <li>Fixed bug #54305 (Crash in gc_remove_zval_from_buffer)</li>
    <li>Fixed bug #54580 (get_browser() segmentation fault when browscap ini directive is set through php_admin_value)</li>
    <li>Fixed bug #54529 (SAPI crashes on apache_config.c:197)</li>
    <li>Fixed bug #54283 (new DatePeriod(NULL) causes crash).</li>
    <li>Fixed bug #54269 (Short exception message buffer causes crash)</li>
    <li>Fixed Bug #54221 (mysqli::get_warnings segfault when used in multi queries)</li>
    <li>Fixed bug #54395 (Phar::mount() crashes when calling with wrong parameters)</li>
    <li>Fixed bug #54384 (Dual iterators, GlobIterator, SplFileObject and SplTempFileObject crash when user-space classes don't call the parent constructor)</li>
    <li>Fixed bug #54292 (Wrong parameter causes crash in SplFileObject::__construct())</li>
  	<li>Fixed bug #54291 (Crash iterating DirectoryIterator for dir name starting with \0)</li>
  	<li>Fixed bug #54281 (Crash in non-initialized RecursiveIteratorIterator)</li>
  	<li>Fixed bug #54623 (Segfault when writing to a persistent socket after closing a copy of the socket)</li>
  	<li>Fixed bug #54681 (addGlob() crashes on invalid flags)</li>
    <li>Over 80 other bug fixes.</li>
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
anymore. All users are strongly encouraged to upgrade to PHP 5.3.7.</p>


<?php site_footer(); ?>
