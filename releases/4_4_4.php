<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_4_4.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 4.4.4 Release Announcement");
?>

<h1>PHP 4.4.4 Release Announcement</h1>
<p>
This release address a series of locally exploitable security problems
discovered since PHP 4.4.3.  All PHP users are encouraged to upgrade to this
release as soon as possible.
</p>

<p>
This release provides the following security fixes:
<ul>
	<li>Added missing safe_mode/open_basedir checks inside the error_log(), file_exists(), imap_open() and imap_reopen() functions.</li>
	<li>Fixed overflows inside str_repeat() and wordwrap() functions on 64bit systems.</li>
	<li>Fixed possible open_basedir/safe_mode bypass in cURL extension.</li>
	<li>Fixed overflow in GD extension on invalid GIF images.</li>
	<li>Fixed a buffer overflow inside sscanf() function.</li>
	<li>Fixed memory_limit restriction on 64 bit system.</li>
</ul>
</p>

<p>
In addition to the security fixes, both releases include a small number of non-security related bug fixes.
</p>

<p>
 For a full list of changes in PHP 4.4.4, see the
 <a href="/ChangeLog-4.php#4.4.4">ChangeLog</a>.
</p>

<?php site_footer(); ?>
