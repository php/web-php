<?
require("shared.inc");
commonHeader("Older News");
?>


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
<a href="download-php.php3">downloads page</a>, or see
<a href="ChangeLog-3.0.1.php3">what has changed since version 3.0</a>.


<h3>PHP 3.0 Final is out!</h3>

See the <a href="news.php3">In The News</a> page for the release announcement 
and the accompanying press release.	
 

<h3>PHP & MySQL wins Database of the Year at Web98</h3>
<img src="/gifs/wtawards.gif" border=0 align=left hspace=5>
Read all about the winning combination of PHP and <A HREF="http://www.tcx.se">MySQL</A>
on the <a href="news.php3">In The News</a> page.<BR clear=all>


<H3>Help DevShed Promote PHP Awareness, Literacy, and Development</h3>
<a href="http://www.devshed.com"><img src="/gifs/devshed3.gif" border=0 hspace=5 align=left></a>
DevShed.com will soon be creating a special section devoted to PHP3, and 
they need your help.  DevShed is looking for PHP3 tutorials (2-3000 words) 
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
