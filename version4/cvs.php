<?
require("shared.inc");
commonHeader("PHP 4.0 CVS");
echo "\n<!--$MYSITE-->\n";
?>

<p>If you wish to get the latest PHP 4.0 source tree, you can obtain it through
CVS.  As before, you should be warned that the CVS version is a development version,
and as such, is often unstable, and may not even compile properly.  The advantage
of using CVS, though, is that you can get the latest fixes and updates, without
having to wait for the official releases.</p>

<p>Getting the PHP 4.0 CVS version to work is a bit more complicated than it was
with PHP 3.0 for two main reasons - first, the engine, Zend, has been separated
from the main language tree, and resides in a different CVS repository.  And second,
PHP 4.0 uses a much more advanced configuration system, that requires you to have
not only autoconf installed, but also automake and libtool.</p>

<p>All of the necessary utilities (autoconf, automake. libtool, bison and flex) can be obtained from
<a href="ftp://ftp.gnu.org/pub/gnu/">the GNU FTP site</a>.</p>

<p>If after these warnings you're still interested in obtaining the PHP 4.0 CVS,
here's how.<p>

<ul>
	<li>It is recommended that you configure CVS by putting this in your <tt>~/.cvsrc</tt> file:
<pre>
cvs -z4
update -d -P
checkout -P
diff -u
</pre>

	<li>Login to the PHP CVS repository.  Use <strong>phpfi</strong> as the password.<br>
		<pre>cvs -d :pserver:cvsread@cvs.php.net:/repository login</pre></li>
	<li>Obtain the PHP 4.0 CVS tree:<br>
		<pre>cvs -d :pserver:cvsread@cvs.php.net:/repository co php4</pre>
<!--
	<li>Move to the PHP 4.0 source tree:<br>
		<pre>cd php4</pre>
-->
	<li>Login to the Zend CVS repository.  Use <strong>zend</strong> as the password.<br>
		<pre>cvs -d :pserver:cvsread@cvs.zend.com:/repository login</pre></li>
	<li>Obtain the Zend CVS tree:<br>
		<pre>cvs -d :pserver:cvsread@cvs.zend.com:/repository co libzend</pre>
	<li>Obtain the TSRM (Thread Safe Resource Manager) CVS tree:<br>
		<pre>cvs -d :pserver:cvsread@cvs.zend.com:/repository co TSRM</pre>
	<li>Make sure you have autoconf 2.13 or newer, automake 1.4 or newer and libtool 1.3.3 or newer.</li>
	<li>Run ./buildconf.  After a while, the configure script should be generated.</li>
	<li>From this point onwards, installation is similar to the installation of one of the official packages with one main difference - you must have bison 1.25 or later and flex 2.54 or later to install this version.</li>
</ul>

<? commonFooter(); ?>
