<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_4_9.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 4.4.9 Release Announcement");
?>

<h1>PHP 4.4.9 Release Announcement</h1>
<p>
The PHP development team would like to announce the immediate availability of
PHP 4.4.9.  It continues to improve the security and the stability of the 4.4
branch and all users are strongly encouraged to upgrade to it as soon as
possible. This release wraps up all the outstanding patches for the PHP 4.4
series, and is therefore the <b>last</b> PHP 4.4 release.
</p>

<p>
<b>Security Enhancements and Fixes in PHP 4.4.9:</b>
</p>
<ul>
	<li>Updated PCRE to version 7.7.</li>
	<li>Fixed overflow in memnstr().</li>
	<li>Fixed crash in imageloadfont when an invalid font is given.</li>
	<li>Fixed open_basedir handling issue in the curl extension.</li>
	<li>Fixed mbstring.func_overload set in .htaccess becomes global.</li>
</ul>

<p>
 For a full list of changes in PHP 4.4.9, see the <a href="/ChangeLog-4.php#4.4.9">ChangeLog</a>.
</p>


<?php site_footer(); ?>
