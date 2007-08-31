<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_2_4.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.2.4 Release Announcement");
?>

<h1>PHP 5.2.4 Release Announcement</h1>
<p>
The PHP development team would like to announce the immediate
availability of PHP 5.2.4. This release focuses on improving the stability
of the PHP 5.2.X branch with over 120 various bug fixes in
addition to resolving several low priority security bugs. All
users of PHP are encouraged to upgrade to this release.
</p>

<p>
<b>Security Enhancements and Fixes in PHP 5.2.4:</b>
</p>
<ul>
	<li>Fixed a floating point exception inside wordwrap() (Reported by Mattias Bengtsson)</li>
	<li>Fixed several integer overflows inside the GD extension (Reported by Mattias Bengtsson)</li>
	<li>Fixed size calculation in chunk_split() (Reported by Gerhard Wagner)</li>
	<li>Fixed integer overflow in str[c]spn(). (Reported by Mattias Bengtsson)</li>
	<li>Fixed money_format() not to accept multiple %i or %n tokens. (Reported by Stanislav Malyshev)</li>
	<li>Fixed zend_alter_ini_entry() memory_limit interruption vulnerability. (Reported by Stefan Esser)</li>
	<li>Fixed INFILE LOCAL option handling with MySQL extensions not to be allowed when open_basedir or safe_mode is active. (Reported by Mattias Bengtsson)</li>
	<li>Fixed session.save_path and error_log values to be checked against open_basedir and safe_mode (CVE-2007-3378) (Reported by Maksymilian Arciemowicz)</li>
	<li>Fixed a possible invalid read in glob() win32 implementation (CVE-2007-3806) (Reported by shinnai)</li>
	<li>Fixed a possible buffer overflow in php_openssl_make_REQ (Reported by zatanzlatan at hotbrev dot com)</li>
	<li>Fixed an open_basedir bypass inside glob() function (Reported by dr at peytz dot dk)</li>
	<li>Fixed a possible open_basedir bypass inside session extension when the session file is a symlink (Reported by c dot i dot morris at durham dot ac dot uk)</li>
	<li>Improved fix for MOPB-03-2007.</li>
	<li>Corrected fix for CVE-2007-2872.</li>
</ul>

<p>
<b>Key enhancements in PHP 5.2.4 include:</b>
</p>
<ul>
	<li>Upgraded PCRE to version 7.2</li>
	<li>Added persistent connection status checker to pdo_pgsql.</li>
	<li>Fixed oci8 and PDO_OCI extensions to allow configuring with Oracle 11g client libraries.</li>
	<li>Fixed bug #41831 (pdo_sqlite prepared statements convert resources to strings).</li>
	<li>Fixed bug #41770 (SSL: fatal protocol error due to buffer issues)</li>
	<li>Fixed bug #41713 (Persistent memory consumption on win32 since 5.2)</li>

	<li>Over 120 bug fixes.</li>
</ul>

<p>
For users upgrading from PHP 5.0 and PHP 5.1, an upgrade guide is available 
<a href="/UPDATE_5_2.txt">here</a>, detailing the changes between those releases
and PHP 5.2.4.
</p>

<p>
 For a full list of changes in PHP 5.2.4, see the <a href="/ChangeLog-5.php#5.2.4">ChangeLog</a>.
</p>


<?php site_footer(); ?>
