<?
require("shared.inc");
commonHeader("Older News");
?>


<img src="gifs/php4zend-small-white.gif" align="right">
<h3>PHP 4.0 Beta 1 is out!</h3>


<h3>PHP 4 Release Candidate 2</h3>
May 10, 2000. The PHP Group is proud to announce the release of the <a
href="version4/">second release candidate of the upcoming PHP 4.0</a>.
Highlights of this release include
support for new web servers (Zeus, Netscape Enterprise, Apache Win32 module),
improved portability of the Unix build framework and tons of bug fixes.
We expect this to be the final release candidate before PHP 4.0.

<h3>PHP 4 Release Candidate 1</h3>
The real thing is getting closer and closer.  After a very successful Beta 4
release that was extremely stable, <a href="version4/">PHP 4.0</a> shifts gears from the beta cycle into
<a href="version4/downloads.php">release-quality RC1.</a>
If all goes well and no outstanding bugs are found in the RC, the final   
version of PHP will be released sometime.


<h3>PHP 4</h3>
<p>
The long awaited beta of the new generation of PHP is <a href="version4/">here</a>.
</p>

<h3>PHP 3.0.12 has been released!</h3>
<p>
July 28, 1999.  Nothing major in this release.  Mostly bug fixes.  Support for
the new gd-1.6, Internet Time, FreeType2 support, Mac OS X build fixes, LDAP
error functions, some new imap functions, socket io bug fixes, RH6 apxs build
fix and support for the upcoming Apache-1.3.7.  See the 
<a href="ChangeLog.php3">ChangeLog</a> for a full list of the changes.
</P>

<h3>PHP Tutorials at O'Reilly Open Source Software Convention</h3>
<p>
<a href="http://conferences.oreilly.com/"><img align=right src="gifs/oss_conf_speaker.gif" border=0 width=72 height=117 alt="Open Source Software Convention"></a>
Rasmus Lerdorf and Jim Winstead will be giving a pair of three-hour
tutorials at <a href="http://conferences.oreilly.com/">O'Reilly's
Open Source Software Convention</a> on August 21, 1999, in Monterey,
California. You can find more information about the tutorials
<a href="http://conferences.oreilly.com/apache/tuts_desc.html">here</a>.
</p>

<h3>PHP Related Books are Available</h3>
<P>
Get ready for a wave of PHP related books to hit the shelves!  We don't
know exactly how many there are going to be yet, but some are already
available through Amazon.com and Borders.  <A HREF="/books.php">Click
here</A> to see them all.
</P>

<h3>PHP in the News</h3>
<P>
<a href="http://www.netcraft.com">Netcraft's</a> June server survey results are
out.  They don't actually have scripting language numbers online at Netcraft, but
they do a manual grep and email us this information monthly.  Here is a little 
<a href="usage.php">bar chart</a> showing the growth of PHP usage over the past
year.
</P>

<a href="http://www.zend.com/"><img align="right" src="gifs/zend_rgb-on-white1.gif" border="0"></a>
<h3><b>Zend</b> has been announced</h3>
<p>
<b>Zend</b>, a new optimized engine for PHP has been <a
href="http://www.zend.com/PR.html">announced</a> on January 4th, 1999.<br>
Visit the <a href="http://www.zend.com/">Zend Web site</a>!  Note that
Zend is not a new version of PHP.  Zend is the name of the engine that
will be a critical component of PHP Version 4 which is still a couple
of months away from being available in any form whatsoever.

</p>

<h3>Browscap module fix</h3>

A small yet important bug has been found in the browscap module of PHP 3.0 and 3.0.1,
which effectively, renders this module useless.  If you want to use the browscap
feature and don't want to wait until PHP 3.0.2, a patch is
<a href="browscap-patch.php3">available</a>.  The bug does <strong>not</strong> affect
any other part of PHP.


<h3>PHP 3.0.1 has been released</h3>

Version 3.0.1 is a service release for version 3.0.  It mainly includes fixes
to minor problems, and a small amount of new features.  You can download the
whole package or a patch against version 3.0 from the
<a href="download-php3.php">downloads page</a>, or see
<a href="ChangeLog-3.0.1.php3">what has changed since version 3.0</a>.


<h3>PHP 3.0 Final is out!</h3>

See the <a href="news.php">In The News</a> page for the release announcement 
and the accompanying press release.	
 

<h3>PHP & MySQL wins Database of the Year at Web98</h3>
<img src="/gifs/wtawards.gif" border=0 align=left hspace=5>
Read all about the winning combination of PHP and <A HREF="http://www.tcx.se">MySQL</A>
on the <a href="news.php">In The News</a> page.<BR clear=all>


<H3>Help DevShed Promote PHP Awareness, Literacy, and Development</h3>
<a href="http://www.devshed.com"><img src="/gifs/devshed3.gif" border=0 hspace=5 align=left></a>
DevShed.com will soon be creating a special section devoted to PHP 3.0, and 
they need your help.  DevShed is looking for PHP 3.0 tutorials (2-3000 words) 
for various topics.  DevShed will pay authors US$100, and will contribute 
a matching $100 to the PHP Development Fund for each article published.  
Contact <a href="mailto: php&#64;devshed.com">php&#64;devshed.com</a> for 
more information.<br clear=all>

<h3>PHP Meaning Vote</h3>

<strong>PHP: Hypertext Preprocessor</strong> was chosen as the official
meaning of the PHP acronym with 53% of the votes.  You can see the votes
as well as some ideas to plenty of other unofficial meanings
<a href="http://il.php.net/vote_listing.php3">here</a>.

<h3>New Site</h3>

The PHP site has been given a serious facelift recently.  The design is
courtesy of Colin Viebrock at <a
href="http://www.privateworld.com">Private World Communications</a>.
Please let us know of any problems with the site by sending a message
to <a href="mailto:webmaster&#64;php.net?subject=<?
echo "New Look Feedback (browser:$HTTP_USER_AGENT, site:$SERVER_NAME)";
?>">webmaster&#64;php.net</A>.

<?
commonFooter();
?>
