<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_6_0.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.6.0 Release Announcement");
?>

<h1>PHP 5.6.0 Release Announcement</h1>

<p>The PHP Development Team announces the immediate availability of PHP 5.6.0.
This new version comes with new features, some backward incompatible changes and many improvements.
</p>

<p><b>The main features of PHP 5.6.0 include:</b></p>
<ul>
 <li><a href="http://php.net/migration56.new-features#migration56.new-features.const-scalar-exprs">Constant scalar expressions</a>.</li>
 <li><a href="http://php.net/functions.arguments#functions.variable-arg-list">Variadic functions</a> and argument unpacking using the <code>...</code> operator.</li>
<li><a href="http://php.net/language.operators.arithmetic">Exponentiation using the <code>**</code> operator</a>.</li>
 <li><a href="http://php.net/migration56.new-features#migration56.new-features.use">Function and constant importing</a> with the <a href="http://php.net/language.namespaces.importing">use keyword</a>.</li>
 <li><a href="http://phpdbg.com/docs">phpdbg</a> as an interactive integrated debugger SAPI.</li>
 <li><a href="http://php.net/wrappers#wrappers.php.input">php://input</a> is now reusable, and <code>$HTTP_RAW_POST_DATA</code> is deprecated.</li>
 <li><a href="http://php.net/book.gmp">GMP</a> objects now support operator overloading.</li>
 <li>File uploads larger than 2 gigabytes in size are now accepted.</li>
</ul>

<p>For a full list of new features, you may read <a href="http://php.net/migration56.new-features">the new features chapter of the migration guide</a>.</p>

<p>
<b>PHP 5.6.0 also introduces changes that affect compatibility:</b>
</p>

<ul>
 <li>Array keys won't be overwritten when defining an array as a property of a class via an array literal.</li>
 <li><a href="http://php.net/function.json-decode">json_decode()</a> is more strict in JSON syntax parsing.</li>
 <li>Stream wrappers now verify peer certificates and host names by default when using SSL/TLS.</li>
 <li><a href="http://php.net/book.gmp">GMP</a> resources are now objects.</li>
 <li><a href="http://php.net/book.mcrypt">Mcrypt</a> functions now require valid keys and IVs.</li>
</ul>

<p>
 For users upgrading from PHP 5.5, <a href="http://php.net/migration56">a full migration guide</a> is available, detailing the changes between 5.5 and 5.6.0.
</p>

<p>For source downloads of PHP 5.6.0, please visit our <a href="http://www.php.net/downloads.php">downloads page</a>.
Windows binaries can be found on <a href="http://windows.php.net/download/">windows.php.net/download/</a>.
The full list of changes is available in the <a href="http://www.php.net/ChangeLog-5.php#5.6.0">ChangeLog</a>.
</p>

<?php site_footer(); ?>
