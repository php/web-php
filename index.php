<?php
header("Last-Modified: ".gmdate("D, d M Y H:i:s",getlastmod())." GMT");
require("shared.inc");
commonHeader("Hypertext Preprocessor");
echo "\n<!--$MYSITE-->\n";
?>
<h3>Announcing PHP-GTK</h3>

The first release of PHP-GTK is now available. PHP-GTK is a PHP extension that
provides an object-oriented interface to GTK+ toolkit and enables you to write
client-side cross-platform GUI applications. For more information, visit
<a href="http://gtk.php.net/">http://gtk.php.net/</a>.

<h3>Patch Level 1 released for PHP 4.0.4</h3>

Due to two security issues found in the Apache module version of PHP 4.0, PHP 4.0.4pl1
has been released.  This bug-fix release also fixes a few party-crashing bugs that
were discovered in PHP 4.0.4.

<h3>New usage stats for February available</h3>
<p>
<a href="/usage.php"><img align=right src="gifs/stats-small.gif" border=0 height=64 width=121 alt="PHP Usage Stats"></a>
<a href="http://www.netcraft.com/">Netcraft</a> and <a
href="http://www.securityspace.com/s_survey/">E-Soft</a> have
published their new  results for their Web Server surveys - both
of which continue to show impressive growth for PHP. Check out the <a
href="usage.php">usage page</a>.
<br clear="all">

<a href="http://conferences.oreilly.com/oscon2001/"><img src="gifs/osscon.gif" align="right" border=0></a>
<h3>PHP Conference - <a href="cfp.php">Call for Participation</a></h3>
The conference will be part of the <a
href="http://conferences.oreilly.com/oscon2001/">O'Reilly Open Source
Convention</a> alongside the 5th annual Perl Conference at the <a
href="http://www.sheraton.com/property.taf?prop=127&lc=en">Sheraton San
Diego Hotel and Marina</a>, San Diego, California, July 23-27, 2001.  All the
details on submitting talks are in the full <a href="cfp.php">CFP</a>.

<h3>PHP 4.0.4 Released</h3>
Dec 19, 2000.  This release  includes
improvements for a large number of defects
and numerous enhancements in the PHP core,
the language implementation and
extensions. <a href="downloads.php">Download</a>,
<a href="ChangeLog-4.php">ChangeLog</a>.

<h3>PHP 3.0.18 released</h3>
October 21, 2000. PHP 3.0.18 was released. This is a bug-fix release, including
fixes for file uploads and a backported imagetypes() function from PHP 4.0. The
<a href="http://cvs.php.net/viewcvs.cgi/php3/ChangeLog?rev=1.854">ChangeLog</a>
contains a full list of changes.

<h3>Improve your PHP skills</h3> 
Looking for clear and useful guides to build dynamic web-sites using
PHP?  Our <a href="/books.php">Books Resource Center</a> lists now
more than a dozen books in eight different languages. If you know
about more PHP-related books, tell us about them!

<h3>Manual Search Tip</h3>
You can go directly to PHP manual pages with a URL such as
<a href="http://php.net/strlen">php.net/strlen</a>.  

<h3>Tips and Tricks Section</h3>
Check out our <A HREF="/tips.php">tips</A> page for some "neat" things, PHP-related.
It's a little sparse right now, but feel free to make suggestions!

<img src="gifs/ZendOptimizer.gif" align="right">
<h3>Zend Optimizer Released!</h3>
<a href="http://www.zend.com">Zend Technologies</a> has announced the availability of
the Zend Optimizer for PHP 4.0.  The optimizer is available for
<a href="http://www.zend.com/zend/optimizer.php">free download</a>.

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

<?
commonFooter();
