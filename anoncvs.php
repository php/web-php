<?php
require_once 'prepend.inc';
commonHeader("Anonymous CVS Access");
?>

<p>If you wish to get the latest PHP source tree, you can obtain it
through anonymous CVS. You should be warned that the CVS version
is a development version, and as such, is often unstable, and may
not even compile properly. The advantage of using CVS, though,
is that you can get the latest fixes and updates, without having
to wait for the official releases.</p>

<p>You can find more information about CVS, and
download clients for most major platforms, at <a
href="http://www.cvshome.org/">CVShome.org</a>.</p>

<p>Getting the PHP 4.0 CVS version to work is a bit more complicated
than it is for PHP 3.0 for two main reasons - first, the engine,
Zend, has been separated from the main language tree, and resides
in a different CVS repository. And second, PHP 4.0 uses a much
more advanced configuration system, that requires you to have not
only autoconf installed, but also automake and libtool.</p>

<p>All of the necessary utilities (autoconf, automake. libtool,
bison and flex) can be obtained from <a
href="ftp://ftp.gnu.org/pub/gnu/">the GNU FTP site</a>.</p>

<p>If after these warnings you're still interested in obtaining
PHP from CVS, here's how.<p>

<ul>
  <li>It is recommended that you configure CVS by putting this
  in your <tt>~/.cvsrc</tt> file:
<pre>
cvs -z3
update -d -P
checkout -P
diff -u
</pre></li>

  <li>Log in to the PHP anonymous CVS server. Use <strong>phpfi</strong> as the password.<br>
    <pre>cvs -d :pserver:cvsread@cvs.php.net:/repository login</pre></li>
  <li>Obtain the PHP 4.0 CVS tree:<br>
    <pre>cvs -d :pserver:cvsread@cvs.php.net:/repository co php4</pre></li>
	<li>Move to the PHP 4.0 source tree:<br>
    <pre>cd php4</pre></li>
  <li>Login to the Zend CVS repository. Use <strong>zend</strong> as the password.<br>
    <pre>cvs -d :pserver:cvsread@cvs.zend.com:/repository login</pre></li>
  <li>Obtain the Zend and TSRM (Thread Safe Resource Manager) CVS tree:<br>
    <pre>cvs -d :pserver:cvsread@cvs.zend.com:/repository co Zend TSRM</pre></li>
  <li>Make sure you have autoconf 2.13 or newer, automake 1.4 or newer and libtool 1.4 or newer.</li>
  <li>Run ./buildconf. After a while, the configure script should be generated.</li>
  <li>From this point onwards, installation is similar to the installation of one of
    the official packages with one main difference - you must have bison 1.28 or later
    and flex 2.54 or later to compile, because the pre-generated scanner and parser
    files are not included in CVS.</li>
</ul>

<p>There are also other things, like the XML source code
for the documentation, available via anonymous CVS. See <a
href="http://cvs.php.net/">the web-based view</a> of the CVS server
to see what is available, and substitute the appropriate name for
"php4" in step 3 (and ignore the later steps).</p>

<p>You can also mirror the PHP CVS repository using CVSup. See
<a href="/cvsup.php">here</a> for more details.</p>

<?php commonFooter(); ?>