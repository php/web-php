<?
if (isset($SERVER_NAME) && $SERVER_NAME=="www.php3.net") {
        Header("Location: http://www.php.net/");
        exit;
}
Header("Last-Modified: ".gmdate("D, d M Y H:i:s",getlastmod())." GMT");
require("shared.inc");
commonHeader("Hypertext Preprocessor");
echo "\n<!--$MYSITE-->\n";
?>

<h3>PHP 4.0.1 Patch Level 2 available</h3>
PHP 4.0.1pl2 addresses two bugs that were discovered in PHP 4.0.1, that
prevent error_reporting() and readdir() from working properly.

<h3>PHP 4.0.1 Released!</h3>
June 28, 2000.  The first maintenance release for PHP 4.0 is out.  The new release features increased
stability under Windows, improved error handling, several new features and lots of bug fixes (the full list 
of changes is <a href="ChangeLog-4.php">available</a>).  It's a
recommended upgrade for all PHP users.  <a href="downloads.php">Download now!</a>

<img src="gifs/php4zend-small-white.gif" align="right">
<h3>PHP 4.0.0 Released!</h3>
May 22, 2000.  It's here, it's ready, and it has the long awaited 'Release'
tag.  The successor of PHP 3.0 has finally been released.  At this point, everyone is
encouraged to begin upgrading their systems to use this version.
<a href="downloads.php">Download it now!</a>  Some more PHP 4.0 related information
can be found <a href="/version4">here</a>.

<h3>PHP 3.0.16 released</h3>
April 05, 2000. PHP 3.0.16 was released. This is mostly a bug fix release which
adds support for gd-1.8, ucd-snmp 4.1, and high-resolution timers on OS/2.
OpenBSD support has been improved considerably. The source package and
Win32 binaries are available from the PHP homepage. The 
<a href="ChangeLog.php3">ChangeLog</a> contains a
full list of changes.


<h3>Improve your PHP skills</h3> 
Looking for clear and useful guides to build dynamic web-sites using
PHP?  Our <a href="/books.php">Books Resource Center</a> lists now
more than a dozen books in eight different languages. If you know
about more PHP-related books, tell us about them!

<img src="ads/ZendOptimizer.gif" align="right">
<h3>Zend Optimizer Beta Released!</h3>
<a href="http://www.zend.com">Zend Technologies</a> has announced the availability of
the Zend Optimizer for PHP 4.0 Beta 4.  The optimizer is available for
<a href="http://www.zend.com/zend/optimizer.php">free download</a>.

<h3>New usage stats for March available</h3>
<p>
<a href="/usage.php"><img align=right src="gifs/stats-small.gif" border=0 height=64 width=121 alt="PHP Usage Stats"></a>
<a href="http://www.netcraft.com/">Netcraft</a> and <a
href="http://www.securityspace.com/s_survey/">E-Soft</a> have
published the March results for their Web Server surveys - both
of which continue to show impressive growth for PHP. Check out the <a
href="usage.php">usage page</a>.
<br clear="all">

<h3>What is PHP?</h3>
<P>
PHP is a server-side, cross-platform, HTML embedded scripting language.  
If you are completely new to PHP and want to get some idea of how it works, 
have a look at the <a href="tut.php">Introductory Tutorial</a>.  Once you get
beyond that have a look at the example archive sites and some of the other
resources available in the <a href="links.php">Links</a> section.
</P>

<h3>So, how much does it cost?</h3>
<P>
This may sound a little foreign to all you folks coming from a non-Unix
background, but PHP doesn't cost anything.  You can use it for commercial
and/or non-commercial use all you want.  You can give it to your friends,
print it out and hang it on your wall or eat it for lunch.  Welcome to
the world of <a href="http://www.opensource.org">Open Source</a> software!  
Smile, be happy, the world is good.  For the full legalese, see the 
official <a href="license.html">license</a>.
</P>

<h3>Year 2000 Compliance</h3>
Just like your C compiler or your favourite text editor, PHP is just about as
year 2000 compliant as your pencil.  If you're still worried (perhaps all
pencils are built to break on December 31st 1999?) -
<a href="y2k.php">read this</a>.

<h3><a href="oldinfo.php">Older information</a></h3>

<?
commonFooter();
?>
<!-- comment: 15-Jun-1999 16:35 EDT -->
