<?php
require_once 'prepend.inc';

$SIDEBAR_DATA = '
<h3>What is PHP?</h3>
<p>
PHP is a server-side, cross-platform, HTML embedded scripting
language.  If you are completely new to PHP and want to get some idea
of how it works, have a look at the <a href="/tut.php">Introductory
Tutorial</a>.  Once you get beyond that, have a look at the example
archive sites and some of the other resources available in the <a
href="/links.php">Links</a> section.
</p>
<b>So, How Much Does It Cost?</b>
<p>
This may sound a little foreign to all you folks coming from a non-Unix
background, but PHP doesn\'t cost anything.  You can use it for commercial
and/or non-commercial use all you want.  You can give it to your friends,
print it out and hang it on your wall or eat it for lunch.  Welcome to
the world of <a href="http://www.opensource.org/">Open Source</a> software!
Smile, be happy, the world is good.  For the full legalese, see the 
official <a href="/license/">license</a>.
</p>
<p>
<b><a href="/thanks.php">Thanks to:</a></b>
<br>&nbsp; <a href="http://chek.com">Chek.com</a>
<br>&nbsp; <a href="http://www.easydns.com/?V=698570efeb62a6e2">easyDNS</a>
<br>&nbsp; <a href="http://valinux.com">VA Linux Systems</a>
</p>
<p>
<b>Related sites:</b>
<br>&nbsp; <a href="http://www.apache.org/">Apache</a>
<br>&nbsp; <a href="http://www.mysql.com/">MySQL</a>
<br>&nbsp; <a href="http://www.postgresql.org/">PostgreSQL</a>
<br>&nbsp; <a href="http://www.zend.com">Zend Tech.</a>
</p>
<p>
<b>Community:</b>
<br>&nbsp; <a href="http://www.linuxfund.org">LinuxFund.org</a>
<br>&nbsp; <a href="http://www.osdn.org" class=whitelink>OSDN</a>
</p>
';

commonHeader("Hypertext Preprocessor");
echo "\n<!--$MYSITE-->\n";

?>

<h1>New Site Design</h1>

<p>
<font class="newsDate">[08-Mar-2001]</font>
You might notice that things look a little different around
here. We've streamlined the site, with a new design from the
esteemed Colin Viebrock. Bear with us while we shake out the
bugs that are surely lingering behind this new facade.
</p>

<p>
Looking for the <? print_link("/quickref.php", "quickref"); ?> box?  
Use the 'search' feature, conveniently located in the top-right corner of every page. 
If you search for something in the function list (and it's a valid
PHP function), you will be directed to the appropriate manual page.
If the function doesn't exist, you'll get a list of all the PHP functions,
and and option to do a site-wide search for your phrase.
And don't forget to visit the <? print_link("/tips.php", "tips and tricks"); ?>
page to add 'quickref' functionality right into your web browser.
</p>

<br clear="all">

<? echo hdelim(); ?>

<h1><?print_link("http://ApacheCon.Com/", "ApacheCon 2001");?></h1>

<p>
<font class="newsDate">[07-Mar-2001]</font>
Registration for <a href="http://ApacheCon.Com/2001/US/">ApacheCon 2001</a> in Santa Clara on April 4-6, 2001
is underway! There's sessions about PHP from Luis Argerich, Thies
Arntzen, Stig Bakken, Daniel Beckham, Tony Bryne, Rasmus Lerdorf,
Brian Moon, Zeev Suraski and Nathan Wallace, as well as tons of
sessions on other cool open-source projects. <a href="http://ApacheCon.Com/2001/US/html/registry.html">Early registration</a>
ends March 9, so act fast for discounted prices!
<br clear="all">
</p>

<? echo hdelim(); ?>

<h1>Announcing PHP-GTK</h1>

<p>
<font class="newsDate">[03-Mar-2001]</font>
The first release of PHP-GTK is now available. PHP-GTK is
a PHP extension that provides an object-oriented interface
to GTK+ toolkit and enables you to write client-side
cross-platform GUI applications. For more information, visit
<?print_link("http://gtk.php.net/")?>.
<br clear="all">
</p>

<? echo hdelim(); ?>

<h1>Patch Level 1 released for PHP 4.0.4</h1>

<p>
<font class="newsDate">[11-Jan-2001]</font>
Due to two security issues found in the Apache module version of
PHP 4.0, PHP 4.0.4pl1 has been released.  This bug-fix release also
fixes a few party-crashing bugs that were discovered in PHP 4.0.4.
<br clear="all">
</p>

<? echo hdelim(); ?>

<h1>
<? print_link("/usage.php", make_image("stats-small.gif", "PHP Usage Stats", "right") ); ?>
New Usage Stats For February Available
</h1>
<p>
<font class="newsDate">[7-Mar-2001]</font>
<? print_link("http://www.netcraft.com/", "Netcraft"); ?> and 
<? print_link("http://www.securityspace.com/s_survey/", "E-Soft" ); ?> have
published the February results for their Web Server surveys - both
of which continue to show impressive growth for PHP. Check out the 
<? print_link("/usage.php", "usage page"); ?>.
<br clear="all">
</p>

<? echo hdelim(); ?>

<h1>
PHP 4.0.4 Released
</h1>
<p>
<font class="newsDate">[18-Dec-2000]</font>
This release includes improvements for a large number of defects
and numerous enhancements in the PHP core, the language implementation and
extensions. <? print_link("/downloads.php", "Download"); ?> and
<? print_link("/ChangeLog-4.php", "ChangeLog"); ?>.
<br clear="all">
</p>

<? echo hdelim(); ?>

<h1>
PHP 3.0.18 Released
</h1>
<p>
<font class="newsDate">[21-Oct-2000]</font>
PHP 3.0.18 was released. This is a bug-fix release, including
fixes for file uploads and a backported imagetypes() function from PHP 4.0. The
<? print_link("http://cvs.php.net/viewcvs.cgi/php3/ChangeLog?rev=1.854", "ChangeLog"); ?> contains a full list of changes.
<br clear="all">
</p>

<? echo hdelim(); ?>

<h1>
Improve Your PHP Skills
</h1> 
<p>
Looking for clear and useful guides to build dynamic web-sites using
PHP?  Our <? print_link("/books.php", "Books Resource Center"); ?> lists now
more than a dozen books in eight different languages. If you know
about more PHP-related books, tell us about them!
<br clear="all">
</p>

<? echo hdelim(); ?>

<h1>
Tips and Tricks Section
</h1>
<p>
Check out our <? print_link("/tips.php", "tips"); ?> page for some "neat" things, 
PHP-related.  It's a little sparse right now, but feel free to make suggestions!
<br clear="all">
</p>


<? echo hdelim(); ?>


<h1>
<? print_image("ZendOptimizer.gif", "Zend", "right"); ?>
Zend Optimizer Released
</h1>
<p>
<? print_link("http://www.zend.com", "Zend Technologies"); ?> has announced the 
availability of the Zend Optimizer for PHP 4.0.  The optimizer is available for
<? print_link("http://www.zend.com/zend/optimizer.php", "free download"); ?>.
<br clear="all">
</p>

<?
commonFooter();
?>
