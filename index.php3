<?
if (isset($SERVER_NAME) && $SERVER_NAME=="www.php3.net") {
        Header("Location: http://www.php.net/");
        exit;
}
Header("Last-Modified: ".gmdate("D, d M Y H:i:s",getlastmod())." GMT");
require("shared.inc");
commonHeader("PHP: Hypertext Preprocessor");
echo "\n<!--$MYSITE-->\n";
?>

<h3>PHP Developers' Meeting</h3>
On January 20th, 2000 the primary developers of PHP are meeting for a
4-day session in Tel Aviv, Israel.  The main goal is to organize the 
development effort.  The developers of MySQL will also be in attendance
to explore how the two projects can cooperate further to make the 
PHP/MySQL combination even stronger than it already is.

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
