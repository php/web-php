<?php
// $Id$
               $_SERVER['BASE_PAGE'] = 'releases/5.2.17.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.2.17 Release Announcement");
?>

<h1>PHP 5.2.17 Release Announcement</h1>
<p>
The PHP development team would like to announce the immediate
availability of PHP 5.2.17.</p>
 
<p>This release resolves a critical issue, reported as PHP bug #53632,
where conversions from string to double might cause the PHP interpreter
to hang on systems using x87 FPU registers.</p>

<p>The problem is known to only affect x86 32-bit PHP processes, regardless
of whether the system hosting PHP is 32-bit or 64-bit. You can test
whether your system is affected by running <a href="/distributions/test_bug53632.txt">this script</a>
from the command line.</p>

<p>All users of PHP are strongly advised to update to these versions
immediately.</p>

<p>
<b>Security Enhancements and Fixes in PHP 5.2.17:</b>
</p>
<ul>
  <li>Fixed bug #53632 (PHP hangs on numeric value 2.2250738585072011e-308). (CVE-2010-4645)</li>
</ul>

<?php site_footer(); ?>
