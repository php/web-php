<?
require("shared.inc");

commonHeader("Browscap Patch for PHP 3.0 and 3.0.1");
?>

<p>A problem in the browscap scanner has been found in the released versions of PHP 3, which
prevents the browscap module from working properly.  To remedy this problem before PHP 3.0.2
is out, download <a href="distributions/browscap-fix.diff.gz">this patch</a>.

<p>To apply this patch, change to your PHP 3.0/3.0.1 directory, and type:

<p><code>gunzip < /path/to/downloaded/file | patch -p0</code>

<p>Afterwards, you'd have to rerun 'make', and if using the Apache module version, relink
apache and restart it.

<? commonFooter(); ?>