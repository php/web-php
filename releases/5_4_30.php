<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_4_30.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.4.30 Release Announcement");
?>

<h1>PHP 5.4.30 Release Announcement</h1>

<p>The PHP development team announces the immediate availability of PHP
5.4.30. Over 20 bugs were fixed in this release, including the following security issues:
CVE-2014-3981, CVE-2014-0207, CVE-2014-3478, CVE-2014-3479, CVE-2014-3480, CVE-2014-3487, 
CVE-2014-4049, CVE-2014-3515.

All PHP 5.4 users are encouraged to upgrade to this version.
</p>

<p>Please, note that this release also fixes a backward compatibility issue that has been
detected in the PHP 5.4.29 release. Still, the fix in PHP 5.4.30 may break some very rare
situations. As this tiny compatibility break involves security, and as security is our primary
concern, we had to fix it. This concerns 
<a href="https://bugs.php.net/bug.php?id=67072">bug 67072</a>. For more information about
this bug and its actual resolution, please refer to our
<a href="http://git.php.net/?p=php-src.git;a=blob_plain;f=UPGRADING;hb=refs/heads/PHP-5.4">upgrading guide</a>, section 4a. 
We apologize for any inconvenience you may have experienced with this behavior.</p>
        

<p>For source downloads of PHP 5.4.30 please visit our <a href="http://www.php.net/downloads.php">downloads page</a>,
Windows binaries can be found on <a href="http://windows.php.net/download/">windows.php.net/download/</a>.
The list of changes is recorded in the <a href="http://www.php.net/ChangeLog-5.php#5.4.30">ChangeLog</a>.
</p>

<?php site_footer(); ?>
