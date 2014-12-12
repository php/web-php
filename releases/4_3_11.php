<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_3_11.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 4.3.11 Release Announcement");
?>

<h1>PHP 4.3.11 Release Announcement</h1>
<p>[ <a href="/releases/4_3_11_fr.php">Version Fran&ccedil;aise</a> ]</p>
<p>
PHP Development Team is would like to announce the immediate release of <a href="/downloads.php">PHP 4.3.11</a>. 
This is a maintenance release that in addition to over 70 non-critical bug fixes addresses several 
security issues inside the exif and fbsql extensions as well as the unserialize(),
swf_definepoly() and getimagesize() functions.
</p>

<p>All Users of PHP are strongly encouraged to upgrade to this release.</p> 

<h2>Bugfix release</h2>

<ul>
<li> Crash in bzopen() if supplied path to non-existent file.</li>
<li> DOM crashing when attribute appended to Document.</li>
<li> unserialize() float problem on non-English locales.</li>
<li> Crash in msg_send() when non-string is stored without being serialized.</li>
<li> Possible infinite loop in imap_mail_compose().</li>
<li> Fixed crash in chunk_split(), when chunklen > strlen.</li>
<li> session_set_save_handler crashes PHP when supplied non-existent object ref.</li>
<li> Memory leak in zend_language_scanner.c.</li>
<li> Compile failures of zend_strtod.c.</li>
<li> Fixed crash in overloaded objects &amp; overload() function.</li>
<li> cURL functions bypass open_basedir.</li>
</ul>

<p>
 For a full list of changes in PHP 4.3.11, see the
 <a href="/ChangeLog-4.php#4.3.11">ChangeLog</a>.
 </p>

<?php site_footer(); ?>
