<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_3_8.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.3.8 Release Announcement");
?>

<h1>PHP 5.3.8 Release Announcement</h1>

<p>The PHP development team would like to announce the immediate
availability of PHP 5.3.8. This release fixes two issues introduced in
the PHP 5.3.7 release:</p>

<ul>
    <li>Fixed bug #55439 (crypt() returns only the salt for MD5)</li>
    <li>Reverted a change in timeout handling restoring PHP 5.3.6 behavior,
     which caused mysqlnd SSL connections to hang (Bug #55283).</li>
</ul>

<p>All PHP users should note that the PHP 5.2 series is NOT supported 
anymore. All users are strongly encouraged to upgrade to PHP 5.3.8.</p>


<?php site_footer(); ?>
