<?
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

<H2>PDF Version</H2>
<ul>
<li><? download_link("manual.pdf", "PHP PDF Manual - Indexed - May 23, 00"); ?>. In this PDF, where possible, the version of PHP in which the function first became supported is noted. Note this version of the manual tends to lag behind the other versions available here.
<li><? download_link("manual.A4.en.pdf", "PHP PDF Manual - June 13, 00"); ?>. 873 pages
<li><? download_link("manual.ts.A4.en.pdf", "PHP PDF Manual - June 13, 00"); ?>. 670 pages
</ul>

<H2>Other Versions</H2>
<ul>
<li><? download_link("manual.rtf", "PHP Manual RTF File"); ?>
<li><? download_link("manual.prc", "PHP Manual PalmPilot DOC File"); ?>
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

<li><a href="manual/phpfi2.html">PHP/FI 2.0 Manual</a>. This includes
    discussions on a few topics that aren't covered in the PHP 3 manual
    yet.

<li>Read what has <a href="changes.php3">changed since PHP/FI 2.0</a>
</ul>

<H1>CVS Account</H1>
<ul>
<li><A href="/cvs-php3.php">Getting a CVS account</a>.  If you wish to help out
with the development of PHP, read this.
</ul>

<? commonFooter("") ?>
