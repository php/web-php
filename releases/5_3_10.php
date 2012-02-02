<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_3_10.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.3.10 Release Announcement");
?>

<h1>PHP 5.3.10 Release Announcement</h1>

<p>The PHP development team would like to announce the immediate
availability of PHP 5.3.10. This release delivers a critical security
fix.</p>

<p>Security Fixes in PHP 5.3.10:</p>

<ul>
  <li>Fixed arbitrary remote code execution vulnerability reported by Stefan 
    Esser, CVE-2012-0830.</li>
</ul>

<p>All users are strongly encouraged to upgrade to PHP 5.3.10.</p>

<?php site_footer(); ?>
