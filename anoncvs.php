<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
commonHeader("Anonymous CVS Access");
?>

<h1>Anonymous CVS Access</h1>

<p>
 If you wish to get the latest PHP source tree, you can obtain it
 through anonymous CVS. You should be warned that the CVS version
 is a development version, and as such, is often unstable, and may
 not even compile properly. The advantage of using CVS, though,
 is that you can get the latest fixes and updates, without having
 to wait for the official releases.
</p>

<p>
 You can find more information about CVS, and
 download clients for most major platforms, at
 <a href="http://www.cvshome.org/">CVShome.org</a>.
</p>

<p>
 PHP 4 uses an advanced configuration system that requires you to have
 autoconf (2.13+), automake (1.4+), libtool (1.4+ [except 1.4.2]), bison
 (1.28+) and flex (2.5.4+) installed. All of the necessary utilities can be
 obtained from <a href="ftp://ftp.gnu.org/pub/gnu/">the GNU FTP site</a>.
</p>

<ol>
 <li>
  It is recommended that you configure CVS by putting this
  in your <tt>~/.cvsrc</tt> file:
<pre>
cvs -z3
update -d -P
checkout -P
diff -u
</pre>
 </li>

 <li>
  Log in to the PHP anonymous CVS server. Use <strong>phpfi</strong>
  as the password:<br />
  <tt>cvs -d :pserver:cvsread@cvs.php.net:/repository login</tt>
 </li>
  
 <li>
  Obtain the PHP 5 CVS tree:<br />
  <tt>cvs -d :pserver:cvsread@cvs.php.net:/repository co php5</tt>
  <div class="tip" style="margin: 10px 0 10px 20px;">
   Note that you can retrieve a specific release of PHP from CVS by using the
   -r flag in your cvs command. For example:<br />
   <tt>cvs -d :pserver:cvsread@cvs.php.net:/repository co -r PHP_4_0_7 php4</tt><br />
   Tags for major releases look like php_VERSION where version is the
   version number with periods replaced with underscores.
  </div>
 </li> 
   
 <li>
  Make sure you have autoconf 2.13 or newer, automake 1.4 or newer and libtool
  1.4 or newer.
  <div class="tip" style="margin: 10px 0 10px 20px;">
   Note that certain combinations of autoconf, automake and libtool may not
   work when used together. See <a href="#buildconf_fail">below</a> for
   details.<br />
   Also, certain versions of autoconf may generate warnings of <tt>AC_PROG_CPP
   called before AC_PROG_CC</tt>. These messages can usually be ignored.
  </div>
 </li>
  
 <li>
  Run <tt>./buildconf</tt>. After a while, the configure script should be generated.
 </li>
  
 <li>
  From this point onwards, installation is similar to the installation of one of
  the official packages with one main difference - you must have bison 1.28 or later
  and flex 2.54 or later to compile, because the pre-generated scanner and parser
  files are not included in CVS.
 </li>
</ol>

<p>
 There are also other things, like the XML source code
 for the documentation, available via anonymous CVS. See
 <a href="http://cvs.php.net/">the web-based view of the CVS
 server</a> to see what is available, and substitute the
 appropriate name for "php5" in step 3 (and ignore the later
 steps).
</p>

<p>
 You can also mirror the PHP CVS repository using CVSup. See
 <a href="/cvsup.php">our CVSup page</a> for more details.
</p>

<a name="buildconf_fail"></a>
<h2>autoconf, automake and libtool information</h2>

<p>
 There seem to be problems with libtool 1.4.2. It is suggested
 that you use libtool 1.4, along with the autoconf 2.13 and
 automake 1.4. You should also ensure that autoconf, automake
 and libtool are installed in the same directory.
</p>

<p>The following combinations are known to work:</p>
<ul>
 <li>autoconf 2.13, automake 1.4 and libtool 1.4</li>
 <li>autoconf 2.13, automake 1.5 and libtool 1.4</li>
</ul>

<?php commonFooter(); ?>
