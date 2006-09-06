<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'sitemap.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("Sitemap");
?>

<h1>PHP.net Sitemap</h1>

<h2>News</h2>

<ul>
 <li><a href="/index.php">Home Page</a></li>
 <li><a href="/news-2006.php">News Archives</a></li>
 <li><a href="/news.rss">RSS newsfeed</a></li>
</ul>

<h2>Getting PHP</h2>

<ul>
 <li><a href="/downloads.php">Downloads</a></li>
</ul>

<h2>PHP Bugs</h2>

<ul>
 <li><a href="http://bugs.php.net/">Submit a bug or a feature request</a></li>
 <li><a href="http://bugs.php.net/search.php">Search for bugs</a></li>
</ul>

<h2>PHP Support</h2>

<ul>
 <li><a href="/support.php">Getting Help</a>
  <ul>
   <li>Documentation
    <ul>
     <li><a href="/docs.php">Online Documentation</a></li>
     <li><a href="/faq.php">Frequently Asked Questions</a></li>
     <li><a href="/download-docs.php">Download documentation</a></li>
    </ul>
   </li>
   <li>Other support pages
    <ul>
     <li><a href="/mailing-lists.php">Mailing Lists</a>, <a href="/unsub.php">Unsubscribe</a></li>
     <li><a href="/cal.php">Events</a></li>
     <li><a href="/links.php">Links</a></li>
    </ul>
   </li>
  </ul>
 </li>
</ul>

<h2>Navigation</h2>

<ul>
 <li><a href="/my.php">My PHP.net</a></li>
 <li><a href="/search.php">Search</a></li>
 <li><a href="/sidebars.php">Search Bars</a></li>
 <li><a href="/urlhowto.php">URL Shortcuts</a></li>
 <li><a href="/quickref.php">Quick Function Reference</a></li>
 <li><a href="/tips.php">Quick Reference Tips</a></li>
 <li><a href="/sites.php">PHP.net Sites List</a></li>
</ul>

<h2>CVS instructions</h2>

<ul>
 <li><a href="/anoncvs.php">Getting PHP from CVS</a></li>
 <li><a href="/cvs-php.php">Using CVS for PHP Development</a></li>
 <li><a href="/cvsup.php">Maintaining a Local CVS Repository</a></li>
</ul>

<h2>Mirror sites</h2>

<ul>
 <li>Mirror site information
  <ul>
   <li><a href="/mirrors.php">List of Mirror Sites</a></li>
   <li><a href="/mirror.php">Information About this Mirror Site</a></li>
  </ul>
 </li>
 <li>Mirroring
  <ul>
   <li><a href="/mirroring.php">Mirroring PHP.net</a></li>
   <li><a href="/mirroring-stats.php">Mirroring - stats service</a></li>
  </ul>
 </li>
</ul>

<h2>Other pages</h2>

<ul>
 <li><a href="/download-logos.php">Download Logos</a></li>
 <li><a href="/contact.php">Contact</a></li>
 <li><a href="/copyright.php">Copyright</a></li>
 <li><a href="/credits.php">Credits</a></li>
 <li><a href="/manual/howto">Documentation HOWTO</a></li>
 <li><a href="/contact.php#ads">Advertising at PHP.net</a></li>
</ul>

<?php site_footer();
