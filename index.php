<?php
require_once 'prepend.inc';

$SIDEBAR_DATA = '
<h3>What is PHP?</h3>
<p>
PHP is a server-side, cross-platform, HTML embedded scripting
language.  If you are completely new to PHP and want to get some idea
of how it works, have a look at the ' . make_link("/tut.php", "introductory tutorial") . '.
Once you get beyond that, have a look at the example archive sites and some of the 
other resources available in the ' . make_link("/links.php", "links section") . '.
</p>
<p>PHP is a project of the '.make_link("http://www.apache.org/","Apache Software Foundation").'.</p>
<h3>So, How Much Does It Cost?</h3>
<p>
This may sound a little foreign to all you folks coming from a non-Unix
background, but PHP doesn\'t cost anything.  You can use it for commercial
and/or non-commercial use all you want.  You can give it to your friends,
print it out and hang it on your wall or eat it for lunch.  Welcome to
the world of ' . make_link("http://www.opensource.org/", "Open Source") . ' software!
Smile, be happy, the world is good.  For the full legalese, see the ' .
make_link("/license/", "official license") . '.
</p>
<h3>' . make_link("/thanks.php", "Thanks To:") . '</h3>
&nbsp; ' . make_link("http://chek.com/", "Chek.com") . '<BR>
&nbsp; ' . make_link("http://www.easydns.com/?V=698570efeb62a6e2", "easyDNS") . '<BR>
&nbsp; ' . make_link("http://valinux.com/", "VA Linux Systems") . '<BR>
<h3>Related sites:</h3>
&nbsp; ' . make_link("http://www.apache.org/", "Apache") . '<BR>
&nbsp; ' . make_link("http://www.mysql.com/", "MySQL") . '<BR>
&nbsp; ' . make_link("http://www.postgresql.org/", "PostgreSQL") . '<BR>
&nbsp; ' . make_link("http://www.zend.com/", "Zend Technologies") . '<BR>
<h3>Community:</h3>
&nbsp; ' . make_link("http://www.linuxfund.org/", "LinuxFund.org") . '<BR>
&nbsp; ' . make_link("http://www.osdn.org/", "OSDN") . '<BR>
';

commonHeader("Hypertext Preprocessor");
echo "\n<!--$MYSITE-->\n";

?>

<h1><?print_link("http://ApacheCon.Com/", "ApacheCon 2001");?></h1>

<p>
<font class="newsDate">[11-Apr-2001]</font>
You may have missed the conference, but you can see some of the
presentations online. Check out:</p>
<ul>
<!-- <li>Luis Argerich on <a href="">The PXP project, using reusable PHP components and XML to develop dynamic web sites</a></li> -->
 <li>Thies Arntzen on <a href="http://conf.php.net/pres/index.php?p=slides%2Foci&id=oci">Making efficient use of Oracle8i thru Apache and PHP 4</a></li>
 <li>Stig Bakken on <a href="http://conf.php.net/pres/index.php?p=slides%2Fpear&id=pear">The PHP Extension and Application Repository</a></li>
 <li>Daniel Beckham and Brian Moon on <a href="http://dealnews.com/apachecon/">Caching Dynamic Web Content to Increase Dependability and Performance</a></li>
<!-- <li>Tony Byrne with <a href="">High-Profile, High Speed: Case study in using PHP to build AlGore.com</a></li> -->
 <li>Rasmus Lerdorf's <a href="http://conf.php.net/pres/index.php?p=slides%2Fintro&id=ac2">Introduction to PHP</a></li>
<!-- <li>Zeev Suraski on <a href="">PHP 4 Internals</a></li> -->
<li>Nathan Wallace with <a href="http://www.e-gineer.com/articles/php-hackers-paradise-revisited.phtml">PHP: Hackers Paradise Revisited</a></li>
</ul>
<p>If you missed out on ApacheCon 2001 in Santa Clara, keep
your ear to the ground for more info on ApacheCon 2001 Europe in
Dublin, Ireland in October 2001! (And stay tuned for more info
on the first PHP Conference coming July 2001, part of the <a
href="http://conferences.oreilly.com/oscon/">O'Reilly Open Source
Conference</a> in San Diego, California.)</p>

<? echo hdelim(); ?>

<h1>
<? print_link("/usage.php", make_image("stats-small.gif", "PHP Usage Stats", "right") ); ?>
New Usage Stats For April vailable
</h1>
<p>
<font class="newsDate">[18-Apr-2001]</font>
<? print_link("http://www.netcraft.com/", "Netcraft"); ?> and 
<? print_link("http://www.securityspace.com/s_survey/", "E-Soft" ); ?> have
published the current results for their Web Server surveys - both
of which continue to show impressive growth for PHP. Check out the 
<? print_link("/usage.php", "usage page"); ?>.
<br clear="all">
</p>

<? echo hdelim(); ?>

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
Use the "search" feature, conveniently located in the top-right corner of every page. 
If you search for something in the function list (and it's a valid
PHP function), you will be directed to the appropriate manual page.
If the function doesn't exist, you'll get a list of all the PHP functions,
and and option to do a site-wide search for your phrase.
And don't forget to visit the <? print_link("/tips.php", "tips and tricks"); ?> page 
to add "quickref" functionality right into your web browser.
</p>

<br clear="all">

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

<?
commonFooter();
?>
