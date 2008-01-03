<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_4_8.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 4.4.8 Release Announcement");
?>

<h1>PHP 4.4.8 Release Announcement</h1>
<p>
The PHP development team would like to announce the immediate availability of
PHP 4.4.8.  It continues to improve the security and the stability of the 4.4
branch and all users are strongly encouraged to upgrade to it as soon as
possible. This release wraps up all the outstanding patches for the PHP 4.4
series, and is therefore the last normal PHP 4.4 release. If necessary,
releases to address security issues could be made until 2008-08-08.
</p>

<p>
<b>Security Enhancements and Fixes in PHP 4.4.8:</b>
</p>
<ul>
	<li>Improved fix for MOPB-02-2007.</li>
	<li>Fixed an integer overflow inside chunk_split(). Identified by Gerhard Wagner.</li>
	<li>Fixed integer overlow in str[c]spn().</li>
	<li>Fixed regression in glob when open_basedir is on introduced by #41655 fix.</li>
	<li>Fixed money_format() not to accept multiple %i or %n tokens.</li>
	<li>Addded "max_input_nesting_level" php.ini option to limit nesting level of input variables. Fix for MOPB-03-2007.</li>
	<li>Fixed INFILE LOCAL option handling with MySQL - now not allowed when open_basedir or safe_mode is active.</li>
	<li>Fixed session.save_path and error_log values to be checked against open_basedir and safe_mode (CVE-2007-3378).</li>
</ul>

<p>
 For a full list of changes in PHP 4.4.8, see the <a href="/ChangeLog-4.php#4.4.8">ChangeLog</a>.
</p>


<?php site_footer(); ?>
