<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_1_1.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.1.1 Release Announcement");
?>

<h1>PHP 5.1.1. Release Announcement</h1>
<p>
The PHP Development Team would like to announce the immediate release of
<a href="/downloads.php">PHP 5.1.1</a>.
</p>
<p>
This is a regression correction release aimed at addressing several issues
that may cause issues for certain applications. The main fixes found in this
release include the following:
<ul>
<li>Native date class is withdrawn to prevent namespace conflict with PEAR's date package.</li>
<li>Fixed fatal parse error when the last line of the script is a PHP comment.</li>
<li>eval() hangs when the code being evaluated ends with a comment.</li>
<li>Usage of \{$var} in PHP 5.1.0 resulted in the output of {$var} instead of the $var variable's value enclosed in {}.</li>
<li>Fixed inconsistency in the format of PHP_AUTH_DIGEST between Apache 1 and 2 sapis.</li>
<li>Improved safe_mode/open_basedir checks inside the cURL extension.</li>
</ul>
</p>
<p>
 For a full list of changes in PHP 5.1.1, see the
 <a href="/ChangeLog-5.php#5.1.1">ChangeLog</a>.
</p>

<?php site_footer(); ?>
