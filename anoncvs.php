<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'anoncvs.php';
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
 PHP uses an advanced configuration system that requires you to have
 the following tools.  All necessary utilities can be obtained from
 <a href="ftp://ftp.gnu.org/pub/gnu/">the GNU FTP site</a>.
</p>

<ul>
 <li><i>autoconf</i>: 2.13+</li>
 <li><i>automake</i>: 1.4+</li>
 <li><i>libtool</i>: 1.4.x+ (except 1.4.2)</li>
 <li><i>bison</i>: 1.28 (preferred), 1.35, or 1.75</li>
 <li><i>flex</i>: 2.5.4</li>
</ul>

<p>
 If you're experiencing problems, see also the section on
 <a href="#buildconf_fail">buildconf failures</a>.
</p>

<h2>Steps for using PHP from CVS</h2>
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
  Log in to the PHP CVS server. We'll use the anonymous user <strong>cvsread</strong> 
  as the username, and use <strong>phpfi</strong> as the password:<br />
  <tt>cvs -d :pserver:cvsread@cvs.php.net:/repository login</tt>
 </li>
 
 <li>
  Obtain the latest PHP source from CVS.  There is a single <i>php-src</i> 
  directory that contains all PHP 4 and PHP 5 branches.  To get PHP from CVS, 
  use the <i>"cvs checkout -r BRANCH"</i> notation.  To checkout the
  latest, consider the following CVS commands:<br /><br />
  <strong>PHP 4</strong>: 
  <tt>cvs -d :pserver:cvsread@cvs.php.net:/repository checkout -r PHP_4 php-src</tt>
  <br />
  <strong>PHP 5</strong>: 
  <tt>cvs -d :pserver:cvsread@cvs.php.net:/repository checkout php-src</tt>
  <br /><br />
  Some tips and notes:
  <br />
  <div class="tip" style="margin: 10px 0 10px 20px;">
   You may retrieve a specific release of PHP from CVS by using the
   <i>-r</i> flag in your cvs command.  Some examples:<br />
   <tt>cvs -d :pserver:cvsread@cvs.php.net:/repository checkout -r PHP_4_3 php-src</tt><br />
   <tt>cvs -d :pserver:cvsread@cvs.php.net:/repository checkout -r PHP_4_3_2 php-src</tt>
  </div>
  <ul>
   <li>
    The branch names can also be used for cvs diff and merge operations.
   </li>
   <li>
    All of the above commands create a local directory named "php-src".  You can also 
    specify another directory name, for example, to put PHP 5 HEAD into a directory 
    named myphp5:<br />
    <tt>cvs -d :pserver:cvsread@cvs.php.net:/repository checkout -d myphp5 php-src</tt>
   </li>
  </ul>
 </li>
 
 <li>
  Make sure you have autoconf 2.13 or newer, automake 1.4 or newer and libtool
  1.4.
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
  and flex 2.5.4 to compile, because the pre-generated scanner and parser
  files are not included in CVS.
 </li>
</ol>

<p>
 There are also other things, like the XML source code
 for the documentation, available via anonymous CVS. See
 <a href="http://cvs.php.net/">the web-based view of the CVS
 server</a> to see what is available, and substitute the
 appropriate module name for "<i>php-src</i>" in step 
 3 (and ignore the later steps).  For example, to checkout the
 latest english version of the PHP manual:<br />
 <tt>cvs -d :pserver:cvsread@cvs.php.net:/repository checkout phpdoc</tt>
</p>

<p>
 You can also mirror the PHP CVS repository using CVSup, see
 <a href="/cvsup.php">our CVSup page</a> for more details.
 You may also be interested in a PHP snapshot, see
 <a href="http://snaps.php.net/">snaps.php.net</a>.
 Compiled snapshots for Windows users are also included.
</p>

<a name="buildconf_fail"></a>
<h2>autoconf, automake and libtool information</h2>

<p>
 There seem to be problems with libtool 1.4.2. It is suggested
 that you use libtool 1.4, along with the autoconf 2.13 and
 automake 1.4. You should also ensure that autoconf, automake
 and libtool are installed in the same directory.  libtool 1.5
 will not work.
</p>

<p>The following combinations are known to work:</p>
<ul>
 <li>autoconf 2.13, automake 1.4 and libtool 1.4</li>
 <li>autoconf 2.13, automake 1.5 and libtool 1.4</li>
</ul>

<?php commonFooter(); ?>
