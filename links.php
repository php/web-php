<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'links.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
$SIDEBAR_DATA = '
<h3>Support tips and links</h3>
<p>
 We suggest you visit <a href="/support.php">our support page</a>
 for information about mailing lists on PHP.net and some international
 ones, as well as other support options.
</p>
 
<h3>PHP licensed software</h3>
<p>
 Additionally to these links, we have a 
 <a href="/software">list of software</a> available under
 the PHP license.
</p>
';
site_header("Links", array("current" => "community"));
?>

<h1>PHP Related Links</h1>

<p>
 On these sites you will find tutorials, articles, example scripts, PHP
 related tools, jobs, web hosting services, etc.
</p>

<a name="news"></a>
<h4>PHP News</h4>

<ul>
 <li>
  <a href="http://www.phpdeveloper.org/">PHPDeveloper.org</a><br />
  Latest in PHP community news.
 </li>
 <li>
  <a href="http://www.planet-php.net/">Planet PHP</a><br />
  Latest news aggregated from PHP related weblogs.
 </li>
 <li>
  <a href="http://www.phppodcasts.com">PHP Podcasts</a><br />
  The Complete list of PHP Podcasts, Screencasts, and Video Podcasts.
 </li>
</ul>

<a name="magazines"></a>
<h4>PHP Magazines</h4>

<ul>

 <li>
  <a href="http://www.phparch.com/">php|architect</a><br />
  The first monthly English magazine about PHP, distributed in PDF format
 </li>

 <li>
  <a href="http://phpmagazin.de/">PHP Magazin</a><br />
  The Software &amp; Support Verlag, based in Frankfurt,
  Germany, has now published a magazine on PHP as a 
  tribute to the steadily growing German PHP community (in German).
 </li>

 <li>
  <a href="http://www.php-mag.net/">PHP Magazine</a><br />
  An English edition of the magazine mentioned above. The PHP Magazine
  is published bimonthly and aimed at professional PHP users.
 </li>

 <li>
  <a href="http://www.phptunisie.net/formation/home/1/1/">PHP Tunisie Magazine</a><br />
  PHP Tunisie Magazine is a monthly French speaking magazine, distributed in PDF format
  and dedicated to PHP and its related technologies. It's edited by the Tunisian PHP
  users group.
 </li>

</ul>

<a name="merchandise"></a>
<h4>PHP Merchandise</h4>

<ul>
 <li>
  <a href="http://www.nexen.net/elephpant.php">The elePHPant</a><br />
  The furry PHP mascot, elePHPant.
</li>
 <li>
  <a href="http://www.cafepress.com/buy/php/">PHP projects' merchandise</a><br />
  A search result page with various PHP related projects' shops (not all results are necessarily PHP related!)
 </li>
</ul>

<a name="nonenglish"></a>
<h4>Non-English PHP Sites</h4>

<ul>
 <li>
  <strong>Arabic</strong>
  <ul>
   <li>
    <a href="http://www.ar-php.org/">ar-PHP</a><br />
    Provides set of classes to enhance developing professional Arabic web
    applications and process/present Arabic text in the PHP/MySQL environment.
   </li>
  </ul>
 </li>

 <li>
  <strong>Bosnian</strong>
  <ul>
   <li>
    <a href="http://www.php.co.ba">PHP.co.ba</a><br />
    Bosnian site with PHP and SQL manual, tutorials, scripts,
    forum, mailing list, tools, books...
   </li>
  </ul>
 </li>

 <li>
  <strong>Brazilian</strong>
  <ul>
   <li>
    <a href="http://phpbrasil.com/">PHPBrasil.com</a><br />
    Brazilian PHP portal with many links and information
   </li>
  </ul>
 </li>

 <li>
  <strong>Chinese</strong>
  <ul>
   <li>
    <a href="http://www.phpe.net/">Exceed PHP</a><br />
    Open Source site with PHP, MySQL and Apache tutorials, articles
    and scripts
   </li>
  </ul>
 </li>

 <li>
  <strong>Croatian</strong>
  <ul>
   <li>
    <a href="http://php.com.hr/">PHP.com.hr (Croatian PHP community)</a><br />
    Croatian site with news, source code, manuals, beginners guides, forums,
    questions &amp; answers, on-line help for programmers, polls, tools, etc.
   </li>
  </ul>
 </li>

 <li>
  <strong>Czech Republic</strong>
  <ul>
   <li>
    <a href="http://php.vrana.cz/">PHP tricks</a><br />
    Weblog about PHP programming
   </li>
  </ul>
 </li>

 <li>
  <strong>Dutch</strong>
  <ul>
   <li>
    <a href="http://php.startpagina.nl/">Pagina</a><br />
    A Dutch PHP portal that lists a lot of PHP links, including free hosting
   </li>
  </ul>
 </li>

 <li>
  <strong>Estonian</strong>
  <ul>
   <li>
    <a href="http://php.center.ee/">PHP Center</a><br />
    The biggest Estonian portal site with tutorials, manual translations,
    discussion board, chat room, link collection, news, etc.
   </li>
  </ul>
 </li>

 <li>
  <strong>French</strong>
  <ul>
   <li>
    <a href="http://www.nexen.net/">Nexen.net</a><br />
    Home of PHP French documentation, with comprehensive
    technical information, and all PHP related news
   </li>
   <li>
    <a href="http://www.phpdebutant.org/">phpdebutant</a><br />
    Apprendre le PHP par l'exemple, facilement et simplement.
    R&eacute;serv&eacute; d'abord aux d&eacute;butants.
   </li>
<!-- 
Web site does not respond
   <li>
    <a href="http://www.phpfr.org/">phpfr</a><br />
    Le site de r&eacute;f&eacute;rence sur PHP en France!
   </li>
-->
   <li>
    <a href="http://www.phpfrance.com/">phpfrance</a><br />
    Pour tout savoir sur le PHP, en fran&ccedil;ais. Vous trouverez
    un tutorial, des exemples, des astuces, toute la documentation
    n&eacute;cessaire, ainsi que des forums pour poser des questions.
   </li>
   <li>
    <a href="http://www.phpindex.com/">PHPIndex</a><br />
    A French gateway to PHP related contents
   </li>
   <li>
    <a href="http://www.phpscripts-fr.net/">PHPscripts-fr</a><br />
    More than 500 PHP applications, listed and sorted
   </li>
   <li>
    <a href="http://www.phpsecure.info/">phpsecure.info</a><br />
	Everyday PHP applicatoins advisories, bugs and vulnerabilities.
   </li>
   <li>
    <a href="http://www.phpteam.net/">phpTeam</a><br />
    Site traitant du PHP pour les professionels (php et flash,
    mysql, postgresql, pear,...)
   </li>
   <li>
    <a href="http://faqfclphp.free.fr/">FAQ of the French PHP newsgroup</a> :
    <a href="news://fr.comp.lang.php">fr.comp.lang.php</a><br />
    (was: fr.comp.infosystemes.www.auteurs.php)
   </li>
   <li>
     <a href="http://www.lephpfacile.com/">Le PHP Facile</a><br />
     Website dedicated to the French PHP Community, offering various PHP tutorials and documentations in french.
   </li>
  </ul>
 </li>

 <li>
  <strong>German</strong>
  <ul>
   <li>
    <a href="http://www.phpbar.de/">php::bar</a><br />
    PHP related wiki
   </li>
   <li>
    <a href="http://www.php-center.de/">PHP Center</a><br />
    German speaking portal site with tutorials, tips and
    tricks, job advertisements, articles and more
   </li>
   <li>
    <a href="http://www.php-homepage.de/">PHP-Homepage</a><br />
    German site about PHP with scripts, tips, forums,
    MyGuestBook, articles, news and more
   </li>
   <li>
    <a href="http://www.dynamicwebpages.de/">DynamicWebpages</a><br />
    German site with installation guides, tips &amp; scripts, BestOfGML,
    WhoIsWho - a view on german PHP-cracks, german manual,
    book reviews, links and more
   </li>
<!--
service is gone...
   <li>
    <a href="http://www.nohn.org/">PHPCrawler</a><br />
    Searchengine over German PHP-sites with webaccess to newsgroups
   </li>
   -->
   <li>
    <a href="http://www.phpwelt.de/">PHPWelt</a><br />
    A German website using PHP to offer free services, a
    huge script-archive, free scripts, tutorials and many more
   </li>
   <li>
    <a href="http://www.selfphp.info/">SelfPHP</a><br />
    German function reference for PHP like SelfHTML for HTML
   </li>
   <li>
    <a href="http://www.phpgtk.de/">phpGTK.de</a><br />
    German site about PHPGTK
   </li>
   <li>
    <a href="http://www.php-resource.de/">php-resource.de</a><br />
    This german php community gives you everything you need. A large
    script-archive, lots of tutorials and a qualified moderated forum that
    answers nearly all your question
   </li>
<!--
dead domain as 2007/02/07 
<li>
    <a href="http://www.phpreferenz.de/workshops.html">www.phpreferenz.de</a><br />
    Free printable workshops for PHP newcomers
   </li>
   -->
  </ul>
 </li>

 <li>
  <strong>Hebrew</strong>
  <ul>
   <li>
    <a href="http://www.learnphp.co.il">http://www.learnphp.co.il</a><br />
    Leading PHP teaching site in Israel, with dozens of papers around PHP and a security" category, teaching the basis to a valid and safe coding in PHP.
   </li>
  </ul>
 </li>

 <li>
  <strong>Hungarian</strong>
  <ul>
   <li>
    <a href="http://php.lap.hu/">PHP.lap.hu</a><br />
    Starting point for Hungarian and International PHP sites
   </li>
   <li>
    <a href="http://weblabor.hu/">Weblabor</a><br />
    Fresh news, articles, links and mailing lists from the
    world of web development and PHP
   </li>
  </ul>
 </li>

 <li>
  <strong>Italian</strong>
  <ul>
   <li>
    <a href="http://php.html.it/">php.html.it</a><br />
    The biggest Italian speaking source for PHP: daily updated links
    to scripts, articles, tutorials and many other resources.
   </li>
   <li>
    <a href="http://www.tutorials.it/">Tutorials.it</a><br />
    An Italian site that provides a variety of developer tutorials,
    with a small PHP section
   </li>
   <li>
    <a href="http://www.phpcenter.it/">PHPcenter.it</a><br />
    An Italian-language PHP site that features a variety of projects, reviews,
    courses, tutorials and other resources
   </li>
   <li>
    <a href="http://www.risorse.net/php/">Risorse.net</a><br />
    Section of an Italian site that provides tutorials about PHP,
    hundreds of scripts, books and a list of free and pay webhosts
    which support PHP
   </li>
  </ul>
 </li>

 <li>
  <strong>Norwegian</strong>
  <ul>
   <li>
    PHP@sindrem.com (<a href="http://www.sindrem.com">http://www.sindrem.com</a>)<br />
    Norwegian site for newbies and intermediates. Installation help 
    and scripts.
   </li>
  </ul>
 </li>

 <li>
  <strong>Persian</strong>
  <ul>
   <li>
    <a href="http://www.iranphp.net/">IranPHP.net</a><br />
    A site about PHP for Iranians, with news and forums.
   </li>
   <li>
    <a href="http://www.phpgroup.ir/">Iranian PHP Group</a><br />
    Iranian blog and forums.
   </li>
  </ul>
 </li>

 <li>
  <strong>Polish</strong>
  <ul>
   <li>
    <a href="http://php.pl">php.pl</a><br />
    Daily updated website with articles, translations, the
    biggest PHP Polish forum, dedicated IRC server, legal
    information section, etc.
   </li>
  </ul>
 </li>
 <li>
  <strong>Portuguese</strong>
  <ul>
   <li>
    <a href="http://www.php-pt.com/">portuguese php users group</a><br />
    The site intends to help, support, and guide all portuguese php users.
   </li>
  </ul>
 </li>

<!--
dead domain 2007/02/07	   <li>
    <a href="http://www.cidadela.org/php/">Cidadela</a><br />
    The PHP section of Cidadela provides articles, tutorials,
    a help forum, and an Application Market.
   </li>

-->
 <li>
  <strong>Romanian</strong>
  <ul>
   <li>
    <a href="http://www.phpromania.net/">PHPromania.net</a><br />
	Romanian PHP Community, articles, tutorials, online discussions and forums.
   </li>
  </ul>
 </li>

 <li>
  <strong>Russian</strong>
  <ul>
   <li>
    <a href="http://phpclub.net/">phpclub.net</a><br />
    International PHPClub community based in Russia. Forums,
    articles, lessons, consulting.
   </li>
   <li>
    <a href="http://php.net.ua/">php.net.ua</a><br />
    PHP in Russian. Full Russian documentation.
   </li>
  </ul>
 </li>

 <li>
  <strong>Spanish</strong>
  <ul>
   <li>
    <a href="http://www.programacion.com/php/">PHP en Castellano</a><br />
    Spanish PHP community. Articles, tutorials, courses,
    source code, forums, and more about PHP.
   </li>
   <li>
    <a href="http://zonaphp.com/">zonaphp.com</a><br />
    News and tutorials
   </li>
   <li>
   <a href="http://www.dirphp.com">dirphp.net</a><br />
   A PHP resource directory for the spanish speaking people, programming articles and translated news.
   </li>
  </ul>
 </li>

 <li>
  <strong>Swedish</strong>
  <ul>
   <li>
    <a href="http://www.phpportalen.net/">phpportalen.net</a><br />
    A Swedish PHP portal with articles, news, forums and much more
   </li>
  </ul>
 </li>
</ul>


<?php site_footer(); ?>
