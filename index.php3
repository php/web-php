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

<img src="php4zend-small-white.gif" align="right">
<h3>PHP 4 Release Candidate 1</h3>
The real thing is getting closer and closer.  After a very successful Beta 4
release that was extremely stable, <a href="version4/">PHP 4.0</a> shifts gears from the beta cycle into 
<a href="version4/downloads.php">release-quality RC1.</a>
If all goes well and no outstanding bugs are found in the RC, the final
version of PHP will be released in early April 2000.

<h3>Improve your PHP skills</h3> 
Looking for clear and useful guides to build dynamic web-sites using
PHP?  Our <a href="/books.php3">Books Resource Center</a> lists now
more than a dozen books in eight different languages. If you know
about more PHP-related books, tell us about them!

<img src="ads/ZendOptimizer.gif" align="right">
<h3>Zend Optimizer Beta Released!</h3>
<a href="http://www.zend.com">Zend Technologies</a> has announced the availability of
the Zend Optimizer for PHP 4.0 Beta 4.  The optimizer is available for
<a href="http://www.zend.com/zend/optimizer.php">free download</a>.

<h3>PHP 3.0.15 released</h3>
February 25, 2000. PHP 3.0.15 fixes a couple of issues and addresses some
security concerns. If you are using PHP's safe mode feature, you are urged
to upgrade to the latest release. More information will be posted later.
PHP 3.0.15 is available in source form and binary form (for Win32). See
the <a href="ChangeLog.php3">ChangeLog</a> for a complete list of changes.

<h3>PHP Talks at ApacheCon</h3>
<a href="http://ApacheCon.Com/"><img align="right"
src="/gifs/ac2k-speaker-logo_110x46.gif"
alt="ApacheCon 2000 Speaker" width="110" height="46" border="0"></a>
February 24, 2000.  <a href="http://php.faqts.com">Nathan Wallace</a>, <a
href="http://www.covalent.com/apachecon.php">Craig Kohtz</a> and <a
href="http://phpwizard.net">Tobias Ratschiller</a> are all giving
presentations on PHP at ApacheCon, 8-10th March 2000, in Orlando,
Florida.  The topics include sessions and authentication, advanced PHP
techniques, migrating from ASP to PHP and web design patterns.  You can
find more information about these talks <a
href="http://www.apachecon.com/html/sessions.html">here</a>.

<h3>Patch Level 1 available for PHP 4.0 Beta 4</h3>
February 21, 2000.  Unfortunately, a last-minute buglet crept into Beta 4, which prevented
PHP from working properly if the 'magic quotes' feature was turned off.  This has been fixed,
and Beta 4 was repackaged (as Beta 4 patch level 1).  The new release is <a href="/version4/downloads.php">available</a>
as both new packages, and as a diff file against the original Beta 4.

<h3>PHP 4.0 Beta 4 is out!</h3>
February 20, 2000.  The fourth beta of <a href="/version4/">PHP 4.0</a> has been released.  
With built-in XML support and a load of new features, as well as a large number of bug fixes, this Beta 
is expected to be the last on the beta cycle of PHP 4.0. 
<a href="/version4/downloads.php">Download it now!</a>

<h3>PHP Developers' Meeting</h3>
On January 20th, 2000 the primary developers of PHP met for a
4-day session in Tel Aviv, Israel.  The main goal was to organize the 
development effort.  The developers of MySQL were also present
to explore how the two projects can cooperate further to make the 
PHP/MySQL combination even stronger than it already is.  A 
<a href="summary.php3">technical summary</a> of the meeting is available.

<h3>3.0.14 Released</h3>
January 11, 2000.  3.0.14 is a minor bug-fix release to fix a safe-mode 
problem reported on bugtraq along with an annoying gd configure problem.
If you don't use safe-mode and your GD is working fine, there is no need
to upgrade from 3.0.13.  For the Windows users out there, the missing
files in the 3.0.13 release has been addressed.

<h3>PHP 3.0.13 has been released</h3>

<p>
January 1, 2000. The long-awaited release of PHP 3.0 contains numerous
bug fixes and a bonus of new features. Support for GNU recode, portable
access to stdio streams, enhanced FTP support, support for Mcal and IMSP,
as well as PNG functions for gd make this release a must for every
user of PHP. The <a href="ChangeLog.php3">ChangeLog</a> provides a complete
list of changes.
<br clear="all">

<h3>New usage stats for November available</h3>
<p>
<a href="/usage.php3"><img align=right src="stats-small.gif" border=0 height=64 width=121 alt="PHP Usage Stats"></a>
<a href="http://www.netcraft.com/">Netcraft</a> and <a href="http://www.e-softinc.com/">E-Soft</a>
have published the November results for their Web Server surveys - both of which
show an impressive jump for PHP.  As expected, PHP has passed the one million barrier 
on Netcraft's survey!  Check out the <a href="usage.php3">usage page</a>.
<br clear="all">

<img src="php4zend-small-white.gif" align="right">
<h3>PHP 4.0 Beta 3 is out!</h3>

<p>
Three months after PHP 4.0 Beta 2 was released, Beta 3 is finally here.
This release has a lot of changes, including a "pure" automake/libtool-based
build system, Java support and lots of other stuff.
All 4.0 beta users are encouraged to upgrade.
<a href="http://www.php.net/version4/">Check it out here!</a>.
</p>

<h3>PHP Talk at Atlanta Linux Showcase</h3>
<p>
<a href="als99/"><img align=right src="gifs/als99.gif" border=0 width=64 height=61 alt="Atlanta Linux Showcase"></a>
Jim Winstead gave a talk at the <a href="http://www.linuxshowcase.com/">Atlanta
Linux Showcase</a> on October 16, 1999, in Atlanta, Georgia. You can view the slides from the talk
<a href="als99/">here</a> (Only works with Netscape).
</p>

<img src="lilogo.gif" align="right">
<h3>Network Computing takes a look at Web Server technologies</h3>
<p>
They didn't quite manage to get the name of PHP right, and they have a few 
contradictions here and there, but overall the combination of Apache and PHP
fared much better than IIS/ASP and Netscape/Java in this <a href="http://www.nwc.com/1020/1020f1.html">
article</a>.  Don't forget to check the links in the blue panel on the right for more detailed
info on each system they tested.
</p>

<h3>CNET's Builder.com discovers PHP</h3>
<p><img src="cnet.gif" align="right">
CNET has put up an <a href="http://www.builder.com/Programming/PHPIntro/?dd.bu.bb.0805.03">
introductory PHP article</a> that is an interesting read.
</p>

<h3>LinuxWorld Editors' Choice Awards</h3>
<p><img src="lwedchoice-200.gif" align="right">
PHP was a Finalist in the <a href="http://www.wpi.com/linuxworld/lw-ec-winners.html">
LinuxWorld Editors' Choice Awards</a> presented on Aug.11 in San Jose, CA.  PHP was
up against QT from Troll Tech in the &quot;Programming Library/Tools&quot; category.
</p>

<h3>PHP/MySQL Tutorials on HotWired</h3>
<p>
Graeme Merrall has written a 3-part tutorial on PHP/MySQL that is worth a
read if you are new to PHP.  Head on over to 
<a href="http://www.hotwired.com/webmonkey/databases/tutorials/tutorial4.html">
HotWired's WebMonkey Site</a> to read it.  For other tutorials and interesting
articles check out <a href="http://www.phpbuilder.com">PHPBuilder.com</a> as well.
</p>


<h3>What is PHP?</h3>
<P>
PHP is a server-side, cross-platform, HTML embedded scripting language.  
If you are completely new to PHP and want to get some idea of how it works, 
have a look at the <a href="tut.php3">Introductory Tutorial</a>.  Once you get
beyond that have a look at the example archive sites and some of the other
resources available in the <a href="links.php3">Links</a> section.
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
<a href="y2k.php3">read this</a>.

<h3><a href="oldinfo.php3">Older information</a></h3>

<?
commonFooter();
?>
<!-- comment: 15-Jun-1999 16:35 EDT -->
