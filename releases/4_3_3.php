<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_3_3.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 4.3.3 Release Announcement");
?>

<h1>PHP 4.3.3 Release Announcement</h1>

<p>[ <a href="/releases/4_3_3_fr.php">Version Fran&ccedil;aise</a> ]</p>

<p>
 After a lengthy QA process, <a href="/downloads.php">PHP 4.3.3</a> is finally out!<br>
 This maintenance release solves a fair number of bugs found in prior PHP versions and
 addresses several security issues. All users are <strong>strongly</strong> advised to
 upgrade to 4.3.3 as soon as possible.
</p>

<h2>Bugfix release</h2>

<p>
 PHP 4.3.3 contains, among others, following important fixes, additions and improvements:
</p>

<ul>
 <li>Improved the engine to use POSIX/socket IO where feasible.</li>
 <li>Fixed several potentially hazardous integer and buffer overflows.</li>
 <li>Fixed corruption of multibyte character including 0x5c as second byte in multipart/form-data.</li>
 <li>Fixed each() to be binary safe for keys.</li>
 <li>Major improvements to the NSAPI SAPI.</li>
 <li>Improvements to the IMAP extension.</li>
 <li>Improvements to the InterBase extension.</li>
 <li>Added DBA handler 'inifile' to support ini files.</li>
 <li>Added long options into CLI & CGI (e.g. --version).</li>
 <li>Added a new parameter to preg_match*() that can be used to specify the starting offset in the subject string to match from.</li>
 <li>Upgraded the bundled Expat library to version 1.95.6</li>
 <li>Upgraded the bundled PCRE library to version 4.3</li>
 <li>Upgraded the bundled GD library to version GD 2.0.15</li>

 <li>Over 100 various bug fixes!</li>
</ul>

<p>
 For a full list of changes in PHP 4.3.3, see the
 <a href="/ChangeLog-4.php#4.3.3">ChangeLog</a>.
</p>

<?php site_footer(); ?>
