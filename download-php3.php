<?php
require_once 'prepend.inc';

$current = "3.0.18";
$win32_current = "3.0.17";

$filesizes["php-${current}.tar.gz"]="2,220 kB";
$filesizes["php-${win32_current}-win32.zip"]="1,895 kB";

commonHeader("Download PHP 3.0 Engine");
?>
<h1>Latest version of PHP 3.0</h1>
<p><em>Note:</em> PHP 3 is no longer being actively developed, and
non-security-related bugs will probably not be addressed.</p>
<h2>Complete Source Code</h2>
<ul>
  <li><?echo download_link($src_file, "PHP $current source");?></li>
</ul>
<h2>Win32 Binaries</h2>
<ul>
  <li><?echo download_link($win32_zfile, "$win32_current Win32 binary");?></li>
</ul>
<?php
commonFooter();
?>
