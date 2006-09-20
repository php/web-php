<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_4_3.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 4.4.3 Release Announcement");
?>

<h1>PHP 4.4.3. Release Announcement</h1>
<p>
The PHP development team is proud to announce the release of <a href="/downloads.php#v4">PHP 4.4.3</a>.
This release combines small number of bug fixes and resolves a number of security issues.
All PHP 4.x users are encouraged to upgrade to this release as soon as possible.
</p>

<p>
The security issues resolved include the following:
<ul>
	<li>Disallow certain characters in session names.</li>
	<li>Fixed a buffer overflow inside the wordwrap() function.</li>
	<li>Prevent jumps to parent directory via the 2nd parameter of the tempnam() function.</li>
	<li>Improved safe_mode check for the error_log() function.</li>
	<li>Fixed cross-site scripting inside the phpinfo() function.</li>
</ul>
</p>

<p>
The release also includes about 20 bug fixes and an upgraded PCRE library
(version 6.6).
</p>

<p>
 For a full list of changes in PHP 4.4.3, see the
 <a href="/ChangeLog-4.php#4.4.3">ChangeLog</a>.
</p>

<?php site_footer(); ?>
