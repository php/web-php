<?php
require("shared.inc");
commonHeader("Documentation ");
?>

<H1>PHP FAQ</H1>
<ul>
<li>The <a href="FAQ.php">PHP FAQ</a> is your first stop for general
    information and those questions that seem to be on most people's minds.

</ul>

<H1>The PHP Manual On-line</H1>
<ul>
<li><a href="manual/">PHP Manual Online</a>. Your reference
    to everything that's great about PHP.

<li><a href="manual/html/">Plain HTML PHP Manual Online</a>. The very
    same manual in a light-weight, HTML 3.2 version without any bells or
    whistles.

<li><a href="http://snaps.php.net/manual/">Latest Version and Internation Versions</a>.
    Depending on how industrious the documentation team has been, you may find more
    up-to-date info in this version of the manual than you will at one of the above
    links.  You can also browse or download translated versions here.
</ul>

<H2>PHP Annotated Manuals</H2>
<ul>
<LI><A href="http://www.php.net/manual/">PHP Annotated Manual</A>. This
    is the same as the above, except there is a built-in errata/note system
    that users all around the world can (and have!) contributed to. Of
    all of the documentation, this will be the most current version,
    as it is updated (and annotated) daily.

<LI><A href="http://www.php.net/manual/browse-errata.php3">PHP Manual
    Errata</A>. This is the collected errata from the on-line errata/note
    system.
</ul>

<H1>Downloadable PHP Manuals</H1>
<H2>HTML Version</H2>
<ul>
<li><? download_link("bigmanual.html", "PHP HTML Manual (one BIG file)"); ?>
<li><? download_link("manual.zip", "PHP HTML Manual ZIP File"); ?>
<li><? download_link("manual.tar.gz", "PHP HTML Manual .tar.gz File"); ?>
</ul>
<H2>Latest versions (daily snapshots)</H2>
<ul>
<li><?php download_link("http://snaps.php.net/manual/manual-en-current.tar.gz", "PHP HTML Manual (English) .tar.gz File"); ?>
<li><?php download_link("http://snaps.php.net/manual/manual-de-current.tar.gz", "PHP HTML Manual (German) .tar.gz File"); ?>
<li><?php download_link("http://snaps.php.net/manual/manual-it-current.tar.gz", "PHP HTML Manual (Italian) .tar.gz File"); ?>
<li><?php download_link("http://snaps.php.net/manual/manual-ja-current.tar.gz", "PHP HTML Manual (Japanese) .tar.gz File"); ?>
<li><?php download_link("http://snaps.php.net/manual/manual-fr-current.tar.gz", "PHP HTML Manual (French) .tar.gz File"); ?>
<li><?php download_link("http://snaps.php.net/manual/manual-es-current.tar.gz", "PHP HTML Manual (Spanish) .tar.gz File"); ?>
<li><?php download_link("http://snaps.php.net/manual/manual-hu-current.tar.gz", "PHP HTML Manual (Hungarian) .tar.gz File"); ?>

</ul>


<H2>PDF Version</H2>
<ul>
<li><? download_link("manual.pdf", "PHP PDF Manual - January 4, 2001"); ?>. 1033 pages
</ul>

<H2>Other Versions</H2>
<ul>
<li><? download_link("manual.rtf", "PHP Manual RTF File"); ?>
<li><? download_link("manual.chm", "PHP Manual Windows Help File - January 5, 2001"); ?>
<li><?php download_link("manual_isilo.pdb","PHP Manual - PalmPilot Isilo format"); ?>
<li><?php download_link("manual_doc.pdb","PHP Manual - PalmPilot DOC format"); ?>
</ul>

<H1>Translations</H1>
<ul>
<li><a href="http://www.cityfujisawa.ne.jp/~louis/apps/phpfi/index.html"
    >Japanese translation of the PHP manual</a>

<li><a href="http://dev.nexen.net/docs/php/annotee/manuel_toc.php">Version fran&ccedil;aise annot&eacute;e.</a><br>
Versions t&eacute;l&eacute;chargeables <a href="http://dev.nexen.net/docs/php/chargement.html">disponibles</a>. (PDF, HTML, doc, ps, palm).
</ul>

<H1>More information</H1>
<ul>
<li><a href="http://zugeschaut-und-mitgebaut.de/php/">PHP Function Table</a>.
    This page has a overview about which pages are translated to the
	different languages and in which versions of PHP the functions
	are available.

<li><a href="books.php">Books on PHP</A>. Here you can find a
    great selection of books on PHP and related themes.

<li><a href="/version4/win32build.php">Win32 build instructions</a></li>	
<li>Download <a href="/version4/logos.php"> PHP 4.0 Logos</a></li>

<li>Read the <a href="/version4/migration.php">Migration notes</a> on how to migrate from PHP 3.0</li>
<li>Read about the (very few) <a href="/version4/incompatibilities.php">incompatibilities</a> between PHP 3.0 and PHP 4.0.</li>
<li>License questions?  See the <a href="/version4/license-FAQ.php">License FAQ</a></li>	
</ul>

<H1>CVS Account</H1>
<ul>
<li><a href="/version4/cvs.php">CVS instructions</a></li>
<li><A href="/cvs-php.php">Getting a CVS account</a>.  If you wish to help out
with the development of PHP, read this.
</ul>

<H1>Old/unsupported information</H1>
<ul>
<li><a href="manual/phpfi2.html">PHP/FI 2.0 Manual</a>. This includes
    discussions on a few topics that aren't covered in the PHP 3 manual
    yet.
<li>Read what has <a href="changes.php3">changed since PHP/FI 2.0</a>
</ul>


<? commonFooter("") ?>
