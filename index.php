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


<h1>
Mailing Lists temporarily unavailable
</h1>
<p>
<font class="newsDate">[02-Jun-2001]</font>
While the CVS repository has been reactivated, we are still
working on reestablishing our mailing list infrastructure.
We will keep you posted about the progress. Thank
you for your patience.
<br clear="all">
</p>

<? echo hdelim(); ?>


<?/* move this entry to the top when you update it! */?>
<h1>
<? print_link("/usage.php", make_image("stats-small.gif", "PHP Usage Stats", "right") ); ?>
New Usage Stats For May available
</h1>
<p>
<font class="newsDate">[02-Jun-2001]</font>
<? print_link("http://www.netcraft.com/", "Netcraft"); ?> and 
<? print_link("http://www.securityspace.com/s_survey/", "E-Soft" ); ?> have
published the current results for their Web Server surveys - both
of which continue to show impressive growth for PHP. Check out the 
<? print_link("/usage.php", "usage page"); ?>.
<br clear="all">
</p>

<? echo hdelim(); ?>
<h1>ApacheCon Europe 2001 Call for Participation</h1>

<p>
<font class="newsDate">[05-May-2001]</font>
The <?echo make_link("http://apachecon.com/2001/EU/#cfp","call for
participation")?> has gone out for ApacheCon Europe 2001, which will
run October 15-17 in Dublin, Ireland. Have an idea for a session
or tutorial you could present about PHP or other Apache Software
Foundation projects? Submit it before June 2, 2001!
<br clear="all">
</p>

<? echo hdelim(); ?>

<h1>PHP Conference</h1>
<p>
<font class="newsDate">[1-May-2001]</font>
The first official PHP Conference, part of the <a href="http://conferences.oreilly.com/oscon/">O'Reilly Open Source Convention</a>, will bring the community together for
<a href="http://conferences.oreillynet.com/cs/os2001/pub/w/os2001/sessions_php.html">sessions</a> and <a href="http://conferences.oreillynet.com/cs/os2001/pub/10/php_tutorials.html">tutorials</a> designed to explore and strengthen PHP in
the open source space. Take a look under the hood at everything
PHP--from understanding PHP on wireless devices to participating
in a discussion on the future of PHP featuring some of the core
developers and luminaries from the PHP community. The conference
runs July 23-27, 2001, at the Sheraton San Diego Hotel and Marina
in San Diego, California. <a href="http://conferences.oreillynet.com/cs/os2001/pub/10/register.html">Register before June 22 to
save up to $400!</a>.
<br clear="all">
</p>

<? echo hdelim(); ?>

<h1>PHP 4.0.5 Released!</h1>

<p>
<font class="newsDate">[30-Apr-2001]</font>
<a href="downloads.php">PHP 4.0.5</a> is a maintenance release, that features many bug fixes from
PHP 4.0.4, as well as output compression, new experimental
FastCGI support, and significantly improved thread-safe versions.  For a full list of
changes, check out the <a href="/ChangeLog-4.php">Change Log</a>.
<br clear="all">
</p>

<? echo hdelim(); ?>



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
<li>Zeev Suraski on <a href="http://conf.php.net/pres/other/internals/">PHP 4 Internals</a></li> 
<li>Nathan Wallace with <a href="http://www.e-gineer.com/articles/php-hackers-paradise-revisited.phtml">PHP: Hackers Paradise Revisited</a></li>
</ul>
<p>If you missed out on ApacheCon 2001 in Santa Clara, keep
your ear to the ground for more info on ApacheCon 2001 Europe in
Dublin, Ireland in October 2001! (And stay tuned for more info
on the first PHP Conference coming July 2001, part of the <a
href="http://conferences.oreilly.com/oscon/">O'Reilly Open Source
Conference</a> in San Diego, California.)</p>

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

<h1>
<? echo make_image("php-gtk-white.gif", "PHP-GTK", "right"); ?>
Announcing PHP-GTK</h1>

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
