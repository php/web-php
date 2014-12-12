<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_5_14.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.5.14 Release Announcement");
?>

<h1>PHP 5.5.14 Release Announcement</h1>

<p>The PHP Development Team announces the immediate availability of PHP 5.5.14.
This release fixes several bugs against PHP 5.5.13.
Also, this release fixes a total of 8 CVEs, half of them concerning the FileInfo
extension.</p>

<p>All PHP users are encouraged to upgrade to this new version.</p>

<p>Please, note that this release also fixes a backward compatibility issue that has been
detected in the PHP 5.5.13 release. Still, the fix in PHP 5.5.14 may break some very rare
situations. As this tiny compatibility break involves security, and as security is our primary
concern, we had to fix it. This concerns 
<a href="https://bugs.php.net/bug.php?id=67072">bug 67072</a>. For more information about
this bug and its actual resolution, please visit our
<a href="http://git.php.net/?p=php-src.git;a=blob_plain;f=UPGRADING;hb=refs/heads/PHP-5.5">upgrading guide</a>.
We apologize for any inconvenience you may have experienced with this behavior.</p>

<p>For source downloads of PHP 5.5.14, please visit our <a href="http://www.php.net/downloads.php">downloads page</a>.
Windows binaries can be found on <a href="http://windows.php.net/download/">windows.php.net/download/</a>.
The list of changes is recorded in the <a href="http://www.php.net/ChangeLog-5.php#5.5.14">ChangeLog</a>.
</p>

<?php site_footer(); ?>
