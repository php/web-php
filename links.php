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
 Additionaly to these links, we have a 
 <a href="/software">list of software</a> available under
 the PHP license.
</p>
';
site_header("Links");
?>

<h1>PHP Related Links</h1>

<p>
 On these sites you will find tutorials, articles, example scripts, PHP
 related tools, jobs, web hosting services, etc.
</p>

<a name="companies"></a>
<h4>PHP Support Companies</h4>

<ul>
 <li>
  <a href="http://www.mayflower.de/category/category.php?CatID=8&lang=de">ThinkPHP.de</a><br />
  A German and international PHP support company providing
  full PHP support (single incidents, on-call duty), software
  development, training, and performance measurements.
 </li>

 <li>
  <a href="http://www.zend.com/">Zend Technologies</a><br />
  Zend Technologies supports the PHP community and promotes
  PHP adoption. Founded by the authors of the
  <a href="http://www.zend.com/products/zend_engine">Zend Engine</a>
  and members of the PHP Group, Zend offers both free and commercial
  solutions for PHP.
 </li>
</ul>

<a name="associations"></a>
<h4>Professional PHP Associations</h4>

<ul>
 <li>
  <a href="http://www.afup.org/">AFUP.org</a><br />
  (Association Fran&ccedil;aise des Utilisateurs de PHP) : 
  The AFUP was created to answer the growing need from
  companies to have one unique place for PHP solutions.
 </li>
 <li>
  <a href="http://www.phpquebec.org/">PHP Qu&eacute;bec</a><br />
  PHP Qu&eacute;bec promotes PHP for professional users in Qu&eacute;bec, Canada.
  Every month, companies hold sessions about their use of PHP, 
  their customer cases and their solutions.
 </li>

 <li>
  <a href="http://www.nyphp.org/">New York PHP</a><br />
  International community supporting PHP adoption, projects and
  development.
 </li>

 <li>
  <a href="http://www.prophp.com.br/">Grupo de Profissionais PHP - Brasil</a><br />
  The ProPHP was created to support PHP adoption, improve its usage 
  and group all of our brazilian PHP Professionals, promoting conferences,
  zines and much more.
 </li>
</ul>

<a name="news"></a>
<h4>PHP News</h4>

<ul>
 <li>
  <a href="http://www.planet-php.net/">Planet PHP</a><br />
  Latest news aggregated from PHP related weblogs.
 </li>
</ul>

<a name="links"></a>
<h4>PHP Link Catalogs</h4>

<ul>
 <li>
  <a href="http://dmoz.org/Computers/Programming/Languages/PHP/">dmoz.org</a><br />
  The PHP category in the Open Directory Project.
 </li>

 <li>
  <a href="http://www.hotscripts.com/PHP/">HotScripts.com</a><br />
  PHP Books, Magazine Articles, Communities, Scripts and Programs, Softwares,
  Tips
 </li>

 <li>
  <a href="http://www.linuxguruz.com/">LinuxGuruz.com</a><br />
  Many Links and Tutorials, Articles and FAQ about Linux, Apache Web Server,
  HTML, PHP, MySQL ... and lots more
 </li>

 <li>
  <a href="http://phplens.com/phpeverywhere/">PHP Everywhere</a><br />
  Links and news about PHP and related technologies.
 </li>

 <li>
  <a href="http://php.resourceindex.com/">PHP Resource Index</a><br />
  Hundreds of PHP resources, categorized and searchable
 </li>

 <li>
  <a href="http://q.webring.com/hub?ring=php">PHP Sites Webring</a><br />
  Find PHP Sites within this webring!
 </li>
</ul>

<a name="faq"></a>
<h4>PHP FAQ sites</h4>

<ul>
 <li>
  <a href="http://www.alt-php-faq.org/">alt-php-faq.org</a><br />
  A big faq and some links about PHP and SQL
 </li>
 <li>
  <a href="http://www.php-faq.de/">de.comp.lang.php FAQ</a><br />
  Excellent german language FAQ about PHP
 </li>
 <li>
  <a href="http://php.faqts.com/">PHP Knowledge Base</a><br />
  A growing collection of PHP related information in a searchable
  question and answer format.
 </li>
</ul>


<a name="complex"></a>
<h4>Complex PHP Related Sites</h4>

<ul>
 <li>
  <a href="http://codewalkers.com/">Codewalkers</a><br />
  A community site dedicated to PHP developers. Includes forums, tutorials,
  and user submitted code. Home of the PHP Coding Contest.
 </li>

 <li>
  <a href="http://www.devshed.com/c/b/PHP/">Developers Shed</a><br />
  A good set of articles introducing various PHP concepts
 </li>

 <li>
  <a href="http://www.dotgeek.org/">Dotgeek</a><br />
  A PHP and PostgreSQL community site with tutorials, articles, programming marathon and news.
 </li>

 <li>
  <a href="http://www.opendeveloper.org/">Opendeveloper.org</a><br />
  Developing Open Web Sites With Linux-Apache-MySQL-PHP-Perl
 </li>

 <li>
  <a href="http://www.phpbuilder.com/">PHPBuilder.com</a><br />
  A bunch of helpful PHP resources available here
 </li>

 <li>
  <a href="http://www.devnetwork.net/">PHP Developers' network</a><br />
  The PHP Developers' Network was founded to provide the PHP Community with
  a set of solid sites that work together to promote the PHP language and 
  provide a large resource for the community as a whole.
 </li>

 <li>
  <a href="http://www.phpfreaks.com/">PHP Freaks</a><br />
  PHP Learning Center site.
 </li>
<!--
dead website on 2007-02-02
 <li>
  <a href="http://www.webkreator.com/php/">PHP Traveller</a><br />
  PHP weblog, knowledge and link directory. Regularly updated
  collection of PHP resources.
 </li>
-->
 <li>
  <a href="http://www.weberdev.com/">WeberDev.com</a><br />
  PHP related resources (articles, tutorials, forums, advanced search etc.)
 </li>

 <li>
  <a href="http://devzone.zend.com/">Zend.com DevZone</a><br />
  A community site for developers of all levels, including a code
  gallery, applications, tips, forums, tutorials and more.
 </li>
</ul>

<a name="scripts"></a>
<h4>PHP Scripts and Programs</h4>

<ul>
 <li>
  <a href="http://freshmeat.net/browse/183/">freshmeat.net PHP Projects</a>:
  A huge number of projects, both commercial and open source
 </li>

 <li>
  <a href="http://www.nexen.net/component/option,com_nexen_v2/Itemid,234/">Nexen's
  script library</a><br />An exhaustive collection of PHP scripts,
  with over 800 useful functions (French).
 </li>

 <li>
  <a href="http://sourceforge.net/softwaremap/trove_list.php?form_cat=183">PHP
  projects at SourceForge</a><br />
  A great number of open source PHP projects actively developed
 </li>

 <li>
  <a href="http://px.sklar.com/">PX - PHP Code Exchange</a><br />
  The PHP Code Exchange is a great place to start. Here you'll find many
  example scripts and useful functions, organized for easy finding. Includes
  a search function
 </li>

 <li>
  <a href="http://www.phpclasses.org/">The PHP Classes Repository</a><br />
  Useful PHP classes in a categorized listing
 </li>
</ul>

<a name="magazines"></a>
<h4>PHP Magazines</h4>

<ul>
 <li>
  <a href="http://www.directionphp.biz/">Direction|PHP</a><br />
  Direction|PHP is a monthly French speaking magazine, dedicated 
  to PHP and MySQL. It covers industry news and technology reviews. 
  It is mainly downloaded by professionnals, in PDF format.
 </li>

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
<!-- 
dead
 <li>
  <a href="http://www.zpmag.com/">ZPmag</a><br />
  ZPmag is a webzine (exclusively online distribution  newspaper), 
  dedicated to PHP and its technologies (in French).
 </li>
 -->
</ul>

<a name="videos"></a>
<h4>PHP Video and audio</h4>

<ul>
 <li>
  <a href="http://conf.phpquebec.org/main.php/en/dvd2003/main">DVD PHP Qu&eacute;bec</a><br />
  The PHP Qu&eacute;bec DVD was shot during the Montr&eacute;al sessions, in 2003.
  It gathers 6 hours of advanced technics sessions, subtitled in French
  and English.
 </li>
 <li>
  <a href="http://conf.phpquebec.org/main.php/en/cdrom2004/main">CD-ROM PHP Qu&eacute;bec</a><br />
  The PHP Qu&eacute;bec CD-ROM was recorded during the Montr&eacute;al sessions, in 2004.
  It gathers 21 hours of advanced technics sessions in audio format, with the slides.
 </li>
</ul>

<a name="tutorials"></a>
<h4>PHP Tutorials</h4>

<ul>
 <li>
  <a href="http://www.awtrey.com/tutorials/dbeweb/">Database enabled websites tutorial</a><br />
  Introductory tutorial</li>

<!--
Site has moved, due to old age 2007/02/07
 <li>
  <a href="http://www.e-gineer.com/instructions/">E-gineer Instructions</a><br />
  Lots of tutorials/instructions related to Apache, PHP and MySQL
 </li>
-->
 <li>
  <a href="http://www.justphukit.com/php-tutorials.php">justPhukit!</a><br />
  A collection of external links to PHP tutorials
 </li>

 <li><a href="http://www.melonfire.com/community/columns/trog/archives.php?category=PHP">Melonfire</a><br />
  A series of PHP tutorials for novices
 </li>

 <li><a href="http://www.onlamp.com/php/">ONLamp</a><br />
  Great collection of tutorials from O'Reilly
 </li>

<!--
dead web site
 <li><a href="http://elmo.engineering.tech.nhl.nl/two/index.html">technisch web ontwerp</a><br />
  Site with information on a PHP course at a Dutch college.
 </li>
-->
 <li><a href="http://www.thescripts.com/serversidescripting/php/">TheScripts.com</a><br />
  Web Programming Resource - PHP Tutorials
 </li>

 <li><a href="http://www.find.com.au/tutorials/webdevelopment/php/default.asp?ct=21&amp;ob=3">Tutorialfind</a><br />
  A growing list of PHP tutorials at TutorialFind
 </li>

 <li><a href="http://www.vtc.com/products/php.htm">Video tutorials</a><br />
  Video tutorials at Virtaul Training Company
 </li>
<!-- 
PHP Service is gone
 <li><a href="http://hotwired.lycos.com/webmonkey/programming/">Webmonkey PHP</a><br />
  The PHP section on the famous Webmonkey tutorial site
 </li>
-->
 <li><a href="http://devzone.zend.com/public/view/tag/tutorials">Zend.com DevZone</a><br />
  The tutorials section on the Zend.com developer zone
 </li>

 <li><a href="http://www-128.ibm.com/developerworks/db2/products/opensource/">IBM PHP tutorials</a><br />
  Use PHP and other open source tools to develop applications for IBM Information Management servers.
 </li>
</ul>

<a name="setup"></a>
<h4>PHP Setup and Authoring Tools</h4>

<ul>
 <li>
  <a href="http://www.hotscripts.com/PHP/Software_and_Servers/Installation_Kits/">List of installation kits</a><br />
  An extensive list of installation kits setting up servers and PHP for you in minutes.
 </li>

 <li>
  <a href="http://www.midnighthax.com/phpeditors.php">PHP Editors List</a><br />
  A comprehensive list of editors you can use to edit PHP programs
 </li>
</ul>

<a name="commercialtools"></a>
<h4>Companies that provide commercial tools for PHP</h4>

<ul>
 <li>
  <a href="http://www.activestate.com/">ActiveState</a><br />
  ActiveState, a division of Sophos, produces Komodo, a professional
  integrated development environment (IDE) for open source languages.
 </li>

 <li>
  <a href="http://www.interaktonline.com/">InterAKT Online</a><br />
  InterAKT Online provides quality software development tools used by tens
  of thousands of PHP developers around the world, including PHAkt and
  Krysalis.
 </li>

 <li>
  <a href="http://www.ioncube.com/">ionCube</a><br />
  ionCube produces PHP development and end-user tools, including the popular
  free PHP Accelerator and affordable encoding solutions for code protection.
 </li>

 <li>
  <a href="http://www.adobe.com/">Macromedia</a><br />
  Macromedia created Dreamweaver MX, a rapid web application development
  tool supporting PHP.
 </li>
 
 <li>
  <a href="http://www.maguma.com/">Maguma</a><br />
  Maguma produces an IDE with debugging to speed up the development of
  PHP enabled websites and applications.
 </li>

 <li>
  <a href="http://www.sourceguardian.com/">SourceGuardian</a><br />
  SourceGuardian produces tools to help commercial developers distribute their
  scripts safely including the popular SourceGuardian Pro for encrypting and
  obfuscating PHP source code.
 </li>

 <li>
  <a href="http://www.nusphere.com/products/index.htm">NuSphere</a><br />
  NuSphere delivers products and services that allow companies to deploy
  reliable, cost-effective database-driven Internet applications and sites.
 </li>

 <li>
  <a href="http://www.waterproof.fr/">WaterProof</a><br />
  WaterProof produce PHPEdit, an IDE mainly targetted to PHP development with
  integrated debugger and tools to speed up and enhance quality of your php
  projects.
 </li>

 <li>
  <a href="http://www.zend.com/store/">Zend Technologies, Inc.</a><br />
  Zend Technologies, Inc. provides tools to Develop, Protect and Scale your
  PHP Applications.
 </li>
</ul>

<a name="accelerators"></a>
<h4>PHP Accelerators</h4>

<ul>
 <li>
  <a href="http://pecl.php.net/apc">APC</a><br />
  Alternative PHP Cache, Free open source accelerator available from Community
  Connect.
 </li>

 <li>
   <a href="http://eaccelerator.net/">EAccelerator</a><br />
   A fork of Turck MMCache.
 </li>

 <li>
  <a href="http://php-accelerator.co.uk/">ionCube PHP Accelerator</a><br />
  A free accelerator available from ionCube.
 </li>

 <li>
  <a href="http://turck-mmcache.sourceforge.net/">Turck MMCache for PHP</a><br />
  Free open source accelerator, optimizer, encoder and dynamic content cache from TurckSoft.
 </li>

 <li>
  <a href="http://www.zend.com/products/zend_platform">Zend Accelerator</a><br />
  Commercial accelerator available from Zend Technologies, Inc.
 </li>
</ul>

<a name="merchandise"></a>
<h4>PHP Merchandise</h4>

<ul>
 <?php /* 
 <li>
  <a href="http://www.copyleft.net/search.phtml?search=1&amp;lookup%5Bbrand_id%5D=47">Copyleft</a><br />
  Some t-shirts, hats and stickers with the Copyleft variant of the PHP logo on them.
 </li> */ ?>

 <li>
  <a href="http://www.cafepress.com/buy/php//-/fpt_">PHP projects' merchandise</a><br />
  A search result page with various PHP related projects' shops (not all results are necessarily PHP related!)
 </li>
</ul>

<a name="nonenglish"></a>
<h4>Non-English PHP Sites</h4>

<ul>
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
    Opensource site with PHP, MySQL and Apache tutorials, articles
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
    <a href="http://develnet.org/">develnet.org</a><br />
    Some German tutorials about PHP
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

<hr />

<a name="jobs"></a>
<h1>Developers and Job Opportunities</h1>

<p>Here's a list of sites with that publish PHP-related job listings:</p>

<ul>
 <li><a href="http://www.dice.com/">dice.com</a></li>
 <li><a href="http://www.getafreelancer.com">getafreelancer.com</a></li>
 <li><a href="http://www.gnujobs.com/">gnujobs.com</a></li>
 <li><a href="http://hotjobs.yahoo.com">hotjobs.com</a></li>
 <li><a href="http://www.jobs.com/">Jobs.com</a></li>
 <li><a href="http://mojolin.com/">Mojolin</a></li>
 <li><a href="http://www.monster.com/">Monster.com</a></li>
 <li><a href="http://www.php-freelancers.com/">php-freelancers.com</a></li>
 <li><a href="http://www.phpcareer.com/">phpcareer.com</a></li>
 <li><a href="http://www.totalfreelance.com/">totalfreelance.com</a></li>
 <li><a href="http://careers.yahoo.com/">Yahoo! Careers</a></li>
 <li><a href="http://www.zend.com/jobs/index.php">Zend.com PHP Jobs</a></li>
</ul>

<p>
 For a more exhaustive list of job search sites on
 the web, take a look at
 <a href="http://www.dmoz.org/Business/Employment/Job_Search/">dmoz.org's
 Job Search listings</a>.
</p>

<hr />

<a name="hosts"></a>
<h1>ISPs that support PHP</h1>

<p>
 Looking for an ISP or hosting service that supports PHP?
 The following sites list some providers:
</p>

<ul>
 <li><a href="http://dmoz.org/Computers/Internet/Web_Design_and_Development/Hosting/">dmoz.org's web hosting index</a></li>
 <li><a href="http://www.free-php-hosting.com/">free-php-hosting.com</a></li>
 <li><a href="http://www.oinko.net/freephp/">Oinko free PHP hosting directory</a></li>
 <li><a href="http://www.weberdev.com/Hosting/Index.php">WeberDev's Hosting Provider Listing</a></li>
</ul>

<?php site_footer(); ?>
