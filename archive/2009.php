<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'archive/2009.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
news_archive_sidebar();
site_header("News Archive - 2009", array("cache" => true));
?>

<h1>News Archive - 2009</h1>

<p>
 Here are the most important news items we have published in 2009 on PHP.net.
</p>

<hr>
<div class="newsItem hentry"> 
    <div class="newsImage"></div> 
    <h1 class="summary entry-title"><a name="id2009-12-17-1" id="id2009-12-17-1" href="http://www.php.net/archive/2009.php#id2009-12-17-1" rel="bookmark" class="bookmark">PHP 5.2.12 Released!</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2009-12-17T07:41:36-05:00">[17-Dec-2009]</abbr> 
        <div> 
     <p> 
     The PHP development team would like to announce the immediate
     availability of PHP 5.2.12. This release focuses on improving the stability of
     the PHP 5.2.x branch with over 60 bug fixes, some of which are security related.
     All users of PHP 5.2 are encouraged to upgrade to this release.
     </p> 
     <p> 
     <b>Security Enhancements and Fixes in PHP 5.2.12:</b> 
     </p> 
     <ul> 
      <li>Fixed a safe_mode bypass in tempnam() identified by Grzegorz Stachowiak. (CVE-2009-3557, Rasmus)</li> 
      <li>Fixed a open_basedir bypass in posix_mkfifo() identified by Grzegorz Stachowiak. (CVE-2009-3558, Rasmus)</li> 
      <li>Added "max_file_uploads" INI directive, which can be set to limit the number of file uploads per-request to 20 by default, to prevent possible DOS via temporary file exhaustion, identified by Bogdan Calin. (CVE-2009-4017, Ilia)</li> 
      <li>Added protection for $_SESSION from interrupt corruption and improved "session.save_path" check, identified by Stefan Esser. (CVE-2009-4143, Stas)</li> 
      <li>Fixed bug #49785 (insufficient input string validation of htmlspecialchars()). (CVE-2009-4142, Moriyoshi, hello at iwamot dot com)</li> 
     </ul> 
     
     <p> 
  Further details about the PHP 5.2.12 release can be found in the <a href="/releases/5_2_12.php">release announcement</a>, and the full list of changes are available in the <a href="/ChangeLog-5.php#5.2.12">ChangeLog</a>.
  </p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry vevent"> 
    <div class="newsImage"><?php news_image("http://www.phpconference.co.uk/", "phpukconf2010.png", "PHP UK Conference 2010"); ?></div> 
    <h1 class="summary entry-title"><a name="id2009-12-09-1" id="id2009-12-09-1" href="http://www.phpconference.co.uk/" rel="bookmark" class="bookmark">PHP UK Conference 2010</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2009-12-09T14:38:07+01:00">[09-Dec-2009]</abbr> 
        <div> 
      <p> 
        PHP London are pleased to announce the date, venue and registration availability
        of their 5th annual UK PHP conference, building on the success of previous events
        and accommodating the continual growth of the PHP community and PHP development
        industry.
      </p> 
 
      <p> 
        The event takes place on <abbr title="2009-02-26" class="dtstart">Friday 26th February 2010</abbr> 
        at the <span class="location">Business Design Centre in the Islington area of London</span>.
        Information on the venue is available on our
        <a href="http://www.phpconference.co.uk/venue" title="Venue information">website</a>.
      </p> 
 
      <p> 
        Registration is now available, with an <em>early bird</em> discount of £20
        putting the price at £100 (ex. UK VAT), available for the rest of December 2009,
        increasing to £110 during January 2010, whilst the standard £120 price is
        available now (for those that wish to significantly contribute towards the running
        of the conference) until either the event takes place or we run out of places - so
        <a href="http://www.phpconference.co.uk/registration" title="PHP UK registration page">register</a> 
        as soon as you can to get the best price and secure your place.
      </p> 
 
      <p> 
        Feel free to create an
        <a href="http://www.phpconference.co.uk/user/register">account</a> on the PHP UK
        Conference website at and sign-up for notifications of updates to the website.
      </p> 
 
      <p> 
        Important announcements will also be made to the PHP London announcement mailing
        list - sign up at
        <a href="http://lists.phplondon.org/cgi-bin/mailman/listinfo/phplondon-announce">http://lists.phplondon.org/cgi-bin/mailman/listinfo/phplondon-announce</a> 
        - via which you may be receiving this message now, and you can also follow the
        conference on Twitter (<a href="http://twitter.com/phpukconference">@phpukconference</a> 
        - #phpuk2010) and be a <a href="http://www.facebook.com/pages/PHP-UK-Conference/62956717039">fan on Facebook</a>.
      </p> 
 
      <p> 
        We expect to announce the initial line up of talks and speakers before Christmas,
        whilst potential sponsors/exhibitors can find information at
        <a href="http://www.phpconference.co.uk/sponsors">http://www.phpconference.co.uk/sponsors</a> 
        and contact the conference committee using the form at
        <a href="http://www.phpconference.co.uk/contact">http://www.phpconference.co.uk/contact</a>.
      </p> 
 
      <p>We hope to see you at the event in 2010!</p> 
 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry"> 
    <div class="newsImage"></div> 
    <h1 class="summary entry-title"><a name="id2009-11-19-1" id="id2009-11-19-1" href="http://www.php.net/archive/2009.php#id2009-11-19-1" rel="bookmark" class="bookmark">PHP 5.3.1 Released!</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2009-11-19T17:41:11+00:00">[19-Nov-2009]</abbr> 
        <div> 
      <p>The PHP development team would like to announce the immediate
      availability of PHP 5.3.1. This release focuses on improving the 
      stability of the PHP 5.3.x branch with over 100 bug fixes, some of 
      which are security related. All users of PHP are encouraged to
      upgrade to this release.</p> 
      <p><b>Security Enhancements and Fixes in PHP 5.3.1:</b></p> 
      <ul> 
        <li>Added "max_file_uploads" INI directive, which can be set to limit the number of file uploads per-request to 20 by default, to prevent possible DOS via temporary file exhaustion.</li> 
        <li>Added missing sanity checks around exif processing.</li> 
        <li>Fixed a safe_mode bypass in tempnam().</li> 
        <li>Fixed a open_basedir bypass in posix_mkfifo().</li> 
        <li>Fixed failing safe_mode_include_dir.</li> 
      </ul> 
      <p>Further details about the PHP 5.3.1 release can be found in the <a href="http://www.php.net/releases/5_3_1.php">release announcement</a>, and the full list of changes are available in the <a href="http://www.php.net/ChangeLog-5.php#5.3.1">ChangeLog</a>.</p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry vevent"> 
    <div class="newsImage"><?php news_image("http://www.phpconference.com/", "ipc09.png", "International PHP Conference"); ?></div> 
    <h1 class="summary entry-title"><a name="id2009-10-21-1" id="id2009-10-21-1" href="http://www.phpconference.com/" rel="bookmark" class="bookmark">International PHP Conference</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2009-10-21T20:15:30+02:00">[21-Oct-2009]</abbr> 
        <div> 
     <p>With its mixture of topics the <a href="http://www.phpconference.com">International PHP Conference</a> provides an ideal resource for all professionals and their successful daily routine within the whole PHP spectrum. Insights into current Web 2.0 technologies, Security, Best Practices for tools and components, Enterprise know-how, databases, architectures and more are presented at the International PHP Conference 2009.</p> 
     <p>More than 30 Experts explain current trends and demonstrate how to make the most of your code and your business. They will answer your questions not only in the 40+ sessions and panel discussions but also during personal meetings.</p> 
     <p>And for the very first time ever, on Sunday, 15th November, the PHP community will warm up with our free IPC Unconference. This is the place, where YOU decide about the sessions - just pick your favorite topics and get in touch with some of our speakers and other developers.</p> 
     <p>Make use of this opportunity and make yourself a part of the worldwide PHP community – at the International PHP Conference 2009.</p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry vevent"> 
    <div class="newsImage"><?php news_image("http://www.phpworld-kongress.de", "phpworldkongress09.gif", "PHP World Kongress"); ?></div> 
    <h1 class="summary entry-title"><a name="id2009-10-01-1" id="id2009-10-01-1" href="http://www.phpworld-kongress.de" rel="bookmark" class="bookmark">PHP World Kongress</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2009-10-01T21:19:01+02:00">[01-Oct-2009]</abbr> 
        <div> 
    <p> 
     On 24th and 25th of November you should not miss the lectures of the top speakers of the PHP Industry on Professional Software Development with PHP at Munich Conference Center.
    </p> 
    <p> 
     10 international speakers offer you more than 20 hours of knowledge transfer in the topics "Development", "Tools &amp; Technologies", "PHP 5 Certification", "TYPO3 Certification", "Search Engine Optimization" and "Design Patterns with PHP" on two days.
    </p> 
    <p> 
     On November 24th, Pierre Joye from the PHP core team under Windows opens the congress with his keynote "PHP 5.3 and PHP 6". Amongst others topics include OOP, Web Application Security 2.0, SOAP in PHP and Zend Framework.
    </p> 
    <p> 
     The 25th November is a workshop day aimed at expanding and deepening your knowledge in PHP 5 Certification, TYPO3 Certification, Search Engine Optimization and Design Patterns with PHP.
    </p> 
    <p> 
     More detailed information is available on our <a href="http://www.phpworld-kongress.de">website</a> 
     <a href="http://www.twitter.com/phpworld">Twitter</a> or in our group on Facebook. 
    </p> 
   </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry vevent"> 
    <div class="newsImage"><?php news_image("http://phpconference.es/", "phpbarcelonaconference2009small1.jpg", "PHP Barcelona"); ?></div> 
    <h1 class="summary entry-title"><a name="id2009-09-28-1" id="id2009-09-28-1" href="http://phpconference.es/" rel="bookmark" class="bookmark">PHP Barcelona Conference 2009</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2009-09-28T21:27:54+02:00">[28-Sep-2009]</abbr> 
        <div> 
     <p>The <a href="http://phpbarcelona.org/">PHP Barcelona User Group</a> is proud to announce that the <a href="http://phpconference.es/">PHP Barcelona Conference 2009</a> is here, and it is arriving bigger than ever!  Two days, three parallel tracks of talks and workshops, and some of the biggest names and companies in the industry covering the hottest subjects to date.</p> 
     <p>Come to Barcelona (<a href="http://phpconference.es/barcelona-php-conference-2009/venue/">Citilab</a>) to see <strong>Rasmus Lerdorf</strong>, <strong>Fabien Potencier</strong>, <strong>Derick Rethans</strong>, <strong>Sebastian Bergmann</strong> and many more open the hood and expose the secrets of PHP and PHP related technologies that make the Internet what it is today, and that power what the Internet will be tomorrow.  Discover the newest evolution of the most popular scripting language and its intimate bonding with security, stability and scalability, and how its integration with cutting edge technology make it one of the most powerful and state of the art building blocks for robust applications.</p> 
     <p>For more information about PHP Barcelona Conference 2009 and to register, please visit <a href="http://phpconference.es/">http://phpconference.es</a></p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry"> 
    <div class="newsImage"></div> 
    <h1 class="summary entry-title"><a name="id2009-09-17-1" id="id2009-09-17-1" href="http://www.php.net/archive/2009.php#id2009-09-17-1" rel="bookmark" class="bookmark">PHP 5.2.11 Released!</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2009-09-17T21:45:06-04:00">[17-Sep-2009]</abbr> 
        <div> 
     <p> 
     The PHP development team would like to announce the immediate
     availability of PHP 5.2.11. This release focuses on improving the stability of
     the PHP 5.2.x branch with over 75 bug fixes, some of which are security related.
     All users of PHP 5.2 are encouraged to upgrade to this release.
     </p> 
     <p> 
     <b>Security Enhancements and Fixes in PHP 5.2.11:</b> 
     </p> 
     <ul> 
             <li>Fixed certificate validation inside php_openssl_apply_verification_policy. (Ryan Sleevi, Ilia)</li> 
             <li>Fixed sanity check for the color index in imagecolortransparent(). (Pierre)</li> 
             <li>Added missing sanity checks around exif processing. (Ilia)</li> 
             <li>Fixed bug #44683 (popen crashes when an invalid mode is passed). (Pierre)</li> 
     </ul> 
     <p> 
     Further details about the PHP 5.2.11 release can be found in the <a href="/releases/5_2_11.php">release announcement</a>, and the full list of changes are available in the <a href="/ChangeLog-5.php#5.2.11">ChangeLog</a>.
     </p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry vevent"> 
    <div class="newsImage"><?php news_image("http://zendcon.com", "ZendCon09-logo.gif", "ZendCon 2009"); ?></div> 
    <h1 class="summary entry-title"><a name="id2009-08-26-1" id="id2009-08-26-1" href="http://zendcon.com" rel="bookmark" class="bookmark">ZendCon 2009!</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2009-08-26T10:19:35+02:00">[26-Aug-2009]</abbr> 
        <div> 
    <p> 
     The Zend PHP Conference 2009 (ZendCon) is the largest event of the PHP
     community and a unique opportunity to meet with PHP developers, web
     experts and IT managers.  This year's conference will be held
     <abbr class="dtstart" title="2009-10-19">October 19</abbr>-
     <abbr class="dtend" title="2009-10-23">22, 2009</abbr> in
     <span class="location">San Jose, California</span>. It will bring together developers
     and business managers from around the world for three days of
     exceptional presentations and networking events.
    </p> 
    <p> 
     At ZendCon 2009, sessions will focus on creating, deploying and managing
     applications that take advantage of the speed, scalability and
     simplicity of PHP.  To find out more about ZendCon, see the full session
     listing, and register, visit <a href="http://zendcon.com">http://zendcon.com/</a>.
    </p> 
   </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry"> 
    <div class="newsImage"></div> 
    <h1 class="summary entry-title"><a name="id2009-07-30-1" id="id2009-07-30-1" href="http://www.php.net/archive/2009.php#id2009-07-30-1" rel="bookmark" class="bookmark">PHP TestFest 2009 Winners</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2009-07-30T12:41:28+02:00">[30-Jul-2009]</abbr> 
        <div> 
     <p> 
      A group of winners of PHP
      <a href="http://www.flickr.com/search/?w=all&amp;q=elephpants&amp;m=tags">elePHPhants</a> 
      or <a href="http://www.flickr.com/search/?w=all&amp;q=testfest+mug&amp;m=tags">TestFest mugs</a> 
      have been picked at random from the people that contributed the
      <a href="http://testfest.php.net/repos/testfest/">887 tests</a> 
      during the <a href="http://wiki.php.net/qa/testfest">2009 PHP TestFest</a>.
     </p> 
     <h2>Winners of elePHPhants</h2> 
     <ul> 
      <li>Mark Schaschke TestFest London May 2009</li> 
      <li>Patrick Allaert Belgian PHP Testfest 2009</li> 
      <li>Rafael Dohms testfest PHPSP on 2009-06-20</li> 
      <li>Guilherme Blanco testfest PHPSP on 2009-06-20</li> 
      <li>Fabio Fabbrucci Italian PHP TestFest 2009 Cesena 19-20-21 june</li> 
      <li>Rodrigo Moyle testfest PHPSP on 2009-06-20</li> 
      <li>Edgar Ferreira da Silva testfest PHPSP on 2009-06-20</li> 
      <li>Marco Fabbri PHPTestFest Cesena Italia on 2009-06-20</li> 
      <li>Jason Easter Testfest 2009 2009-06-20</li> 
      <li>Simon Westcott PHPNW Testfest 2009</li> 
     </ul> 
     
     <h2>Winners of mugs</h2> 
     <ul> 
      <li>Tim Eggert Testfest Berlin 2009-05-09</li> 
      <li>Till Klampaeckel  TestFest 2009</li> 
      <li>Havard Eide Norway 2009-06-09 \o/</li> 
      <li>Ŕlex Corretgé - Catalonia</li> 
      <li>Francesco Fullone TestFest Cesena Italia on 2009-06-20</li> 
      <li>Ivan Rosolen testfest PHPSP on 2009-06-20</li> 
      <li>Moritz Neuhaeuser Testfest Berlin 2009-05-10</li> 
      <li>Daniel Convissor  TestFest 2009 NYPHP</li> 
      <li>Matt Raines testfest London 2009-05-09</li> 
     </ul> 
 
     <p>Winners will be contacted shortly.</p> 
     <p> 
      Once again a huge <em>thank you!</em> to everyone who helped to make
      this year's TestFest such an outstanding success!
     </p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry vevent"> 
    <div class="newsImage"><?php news_image("http://conference.phpnw.org.uk/", "phpnw09_blk_300x110.png", "PHP NW 2009"); ?></div> 
    <h1 class="summary entry-title"><a name="id2009-07-21-1" id="id2009-07-21-1" href="http://conference.phpnw.org.uk/" rel="bookmark" class="bookmark">PHP North West Conference</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2009-07-21T15:37:06-07:00">[21-Jul-2009]</abbr> 
        <div> 
     <p> 
     The <a href="http://conference.phpnw.org.uk">PHP North West
     Conference</a> has announced its return for a second year, to be held
     on Saturday 10th October 2009 in Manchester, UK.  This is a one-day
     conference aimed at developers from the local region and further
     afield, with a deliberately low ticket price to ensure everyone who
     wants to attend can do so.  We combine experienced speakers with some
     new local talent to bring an event that truly has something for
     everyone and a great buzz.
     </p> 
     <p> 
     The official conference is on the Saturday but there are social events
     on Friday and Saturday and an informal schedule on Sunday, so come and
     make a weekend of it with us in Manchester!  All the venues are in
     central Manchester and walkable from mainline public transport, so do
     join us.
     </p> 
     <p> 
     There is a call for papers which runs until 16th August 2009 and the
     early bird ticket prices are fixed until September 10th.  For more
     information, to submit a paper, to buy tickets, or to contact the
     organisers please visit the <a href="http://conference.phpnw.org.uk">conference website</a>.
     </p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry"> 
    <div class="newsImage"></div> 
    <h1 class="summary entry-title"><a name="id2009-07-16-1" id="id2009-07-16-1" href="http://www.php.net/archive/2009.php#id2009-07-16-1" rel="bookmark" class="bookmark">Subversion Migration Complete</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2009-07-16T19:00:00-09:00">[16-Jul-2009]</abbr> 
        <div> 
     <p> 
      The migration from CVS to Subversion is complete.  The web interface is at
      <a href="http://svn.php.net">svn.php.net</a>.  You can read about it at
      <a href="http://php.net/svn.php">php.net/svn.php</a>, 
      <a href="http://wiki.php.net/vcs/svnfaq">wiki.php.net/vcs/svnfaq</a>.  The
      URL to feed to your svn client is http://svn.php.net/repository.  
     </p> 
     <p> 
      There is also a <a href="http://github.com/php">github mirror</a>.  Please
      use that instead of trying to do a full git clone from the svn repository.  See
      the instructions at <a href="http://wiki.php.net/vcs/svnfaq#git">wiki.php.net/vcs/svnfaq#git</a> 
     </p> 
     <p> 
      Many thanks to Gwynne who did the bulk of the work and also all the other folks who pitched in.
      It was a major effort to move 14 years of CVS history to another RCS.
     </p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry"> 
    <div class="newsImage"></div> 
    <h1 class="summary entry-title"><a name="id2009-07-09-1" id="id2009-07-09-1" href="http://www.php.net/archive/2009.php#id2009-07-09-1" rel="bookmark" class="bookmark">2009 PHP TestFest</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2009-07-09T10:04:07+02:00">[09-Jul-2009]</abbr> 
        <div> 
     <p> 
      So finally we are at the end of the
      <a href="http://wiki.php.net/qa/testfest">2009 PHP TestFest</a>.
      It has been an outstanding success with the
      <a href="http://gcov.php.net/PHP_5_3/lcov_html/">coverage increasing</a> 
      by about 2.5% overall and 887 new tests contributed in the TestFest SVN
      repository of which 637 have already been added to PHP CVS.
     </p> 
     <p> 
      <a href="http://wiki.php.net/usergroups">User groups</a> from all
      over the world have worked hard to make this happen and we thank
      <a href="http://results.testfest.php.net">each and every one of you</a> 
      for your contribution to PHP!
      You really made a difference to the PHP5.3 release quality.
     </p> 
     <p> 
      There still are few loose ends to tie up - the
      <a href="http://testfest.php.net/repos/testfest/">TestFest SVN repository</a> 
      will be <em>closed</em> for contributions later this week and the last few
      tests will be moved into the main PHP repository. Finally, we have
      <a href="http://www.flickr.com/search/?w=all&amp;q=elephpants&amp;m=tags">10 elePHPants</a> 
      and <a href="http://www.flickr.com/search/?w=all&amp;q=testfest+mug&amp;m=tags">9 TestFest mugs</a> 
      to give out. The winners of mugs and elePHPants
      will be drawn at random from a list of people who wrote tests;
      the winner's names will be announced later this month.
     </p> 
     <p> 
      For those that would like to continue to make a difference by
      writing tests there are two options. You can simply continue by
      submitting new tests to the <a href="http://php.net/mailinglists">QA mailing list</a>,
      or, if you have written a significant number of tests you might
      consider applying for your own
      <a href="http://php.net/cvs-php">PHP CVS (or SVN) ID</a>.
      In your application you should reference the tests that you have
      written in support of your application.
     </p> 
     <p> 
      Last but not least, we would  like to thank all of the
      companies and institutions that sponsored TestFest.
      These include Combell, Corretgé, Faculdade Impacta de Tecnologia, IBM,
      iBuildings, Itera, Mayflower, Microsoft, Nexen (Alter Way Group), php|architect,
      Redpill-Linpro, Steinigke Showtechnic, Verges Council and Zend.
     </p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry"> 
    <div class="newsImage"></div> 
    <h1 class="summary entry-title"><a name="id2009-06-30-1" id="id2009-06-30-1" href="http://www.php.net/archive/2009.php#id2009-06-30-1" rel="bookmark" class="bookmark">PHP 5.3.0 Released!</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2009-06-30T11:47:17+02:00">[30-Jun-2009]</abbr> 
        <div> 
     <p> 
      The PHP development team is proud to announce the immediate release of PHP
      <a href="http://php.net/downloads.php#v5.3.0">5.3.0</a>.
      This release is a major improvement in the 5.X series, which includes a
      large number of new features and bug fixes.
     </p> 
 
     <p> 
      Some of the key new features include:
      <a href="http://php.net/namespaces">namespaces</a>,
      <a href="http://php.net/lsb">late static binding</a>,
      <a href="http://php.net/closures">closures</a>,
      optional <a href="http://php.net/gc_enable">garbage collection</a> for cyclic references,
      new extensions (like <a href="http://php.net/phar">ext/phar</a>,
      <a href="http://php.net/intl">ext/intl</a> and
      <a href="http://php.net/fileinfo">ext/fileinfo</a>),
      over 140 bug fixes and much more.
     </p> 
 
     <p> 
      For users upgrading from PHP 5.2 there is a
      <a href="http://php.net/migration53">migration guide</a> 
      available here, detailing the changes between those
      releases and <a href="http://php.net/downloads.php#v5.3.0">PHP 5.3.0</a>.
     </p> 
 
     <p> 
      Further details about the
      <a href="http://php.net/downloads.php#v5.3.0">PHP 5.3.0</a> release
      can be found in the
      <a href="http://php.net/releases/5_3_0.php">release announcement</a>,
      and the full list of changes are available in the
      <a href="http://php.net/ChangeLog-5.php">ChangeLog</a>.
     </p> 
 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry vevent"> 
    <div class="newsImage"><?php news_image("http://www.phprio.org/phpnrio09", "phpnrio09.png", "PHP Rio"); ?></div> 
    <h1 class="summary entry-title"><a name="id2009-06-21-1" id="id2009-06-21-1" href="http://www.php.net/archive/2009.php#id2009-06-21-1" rel="bookmark" class="bookmark">PHP'n Rio conference</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2009-06-21T10:45:52-07:00">[21-Jun-2009]</abbr> 
        <div> 
     <p> 
      The Rio de Janeiro PHP user group is pleased to announce
      their first <em>PHP'n Rio conference</em>. It will be held July 3rd, 2009 at the
      <a href="http://www.infnet.edu.br/">Infnet Institute</a>, in Rio de Janeiro. It is a
      one day mini conference aimed on providing experienced developers and
      beginners a chance to learn more about PHP frameworks, web
      applications built in PHP, and the art of testing code.
     </p> 
     <p> 
      The keynote speaker is Jan Schneider, who will also
      talk about the Horde project. In addition, we will
      have sessions about other frameworks and include a
      <a href="http://qa.php.net/testfest.php">PHP TestFest</a>.
     </p> 
     <p> 
      PHP'n Rio sessions go from 6-9 pm. Then the PHP TestFest follows up
      until 10 pm. No fees or subscription required. Participation is entirely
      free!
     </p> 
     <p> 
      Whether you live here or are around just enjoying the marvelous city,
      come and join us :) For more information, please visit 
      <a href="http://www.phprio.org/phpnrio09">http://www.phprio.org/phpnrio09</a> 
      (portuguese only).
     </p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry"> 
    <div class="newsImage"></div> 
    <h1 class="summary entry-title"><a name="id2009-06-19-1" id="id2009-06-19-1" href="http://www.php.net/archive/2009.php#id2009-06-19-1" rel="bookmark" class="bookmark">PHP 5.3.0RC4 Release Announcements</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2009-06-19T11:02:05+02:00">[19-Jun-2009]</abbr> 
        <div> 
     <p> 
      The PHP development team is proud to announce the fourth release
      candidate of PHP 5.3.0 (PHP 5.3.0RC4). This RC focuses on bug fixes
      and stability improvements, and we hope only minimal changes are required
      for the next candidate or final stable releases. PHP 5.3.0 is a newly
      developed version of PHP featuring long-awaited features like
      <a href="http://php.net/namespaces">namespaces</a>,
      <a href="http://php.net/lsb">late static binding</a>,
      <a href="http://php.net/closures">closures</a> and much more.
     </p> 
     <p> 
      Please download and test these release candidates, and report any issues
      found. A stable release is expected next week . In case of critical
      issues we will continue producing weekly RCs. Downloads and further
      information is available at <a href="http://qa.php.net/">qa.php.net</a>.
      See also the work in progress
      <a href="http://cvs.php.net/viewvc.cgi/php-src/UPGRADING?revision=PHP_5_3">5.3 upgrade guide</a>.
     </p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry"> 
    <div class="newsImage"></div> 
    <h1 class="summary entry-title"><a name="id2009-06-18-1" id="id2009-06-18-1" href="http://www.php.net/archive/2009.php#id2009-06-18-1" rel="bookmark" class="bookmark">PHP 5.2.10 Released!</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2009-06-18T18:18:28-04:00">[18-Jun-2009]</abbr> 
        <div> 
      <p> 
       The PHP development team would like to announce the immediate availability of PHP 5.2.10. 
       This release focuses on improving the stability of the PHP 5.2.x branch with over 100 bug fixes,
       one of which is security related. All users of PHP are encouraged to upgrade to this release.
      </p> 
      <p> 
        <b>Security Enhancements and Fixes in PHP 5.2.10:</b> 
      </p> 
      <ul> 
       <li>Fixed bug #48378 (exif_read_data() segfaults on certain corrupted .jpeg files). (Pierre)</li> 
      </ul> 
      <p> 
       Further details about the PHP 5.2.10 release can be found in the
       <a href="/releases/5_2_10.php">release announcement</a>, and the full list of changes are
       available in the <a href="/ChangeLog-5.php#5.2.10">ChangeLog</a>.
      </p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry"> 
    <div class="newsImage"></div> 
    <h1 class="summary entry-title"><a name="id2009-06-12-1" id="id2009-06-12-1" href="http://www.php.net/archive/2009.php#id2009-06-12-1" rel="bookmark" class="bookmark">PHP 5.2.10RC2 and PHP 5.3.0RC3 Release Announcements</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2009-06-12T17:39:42+02:00">[12-Jun-2009]</abbr> 
        <div>     <p>      The PHP development team is proud to announce the second release candidate of PHP 5.2.10 (PHP 5.2.10RC2) and      the third release candidate of PHP 5.3.0 (PHP 5.3.0RC3).      These RCs focuses on bug fixes and stability improvements, and we hope only minimal changes are required      for the next candidate or final stable releases.     </p>     <p>      PHP 5.2.10 is a pure maintenance release for providing bugfixes and stability updates. PHP 5.3.0      is a newly developed version of PHP featuring long-awaited features like namespaces, late      static binding, closures and much more.     </p>     <p>      Please download and test these release candidates, and report any issues found.      Downloads and further information is available at <a href="http://qa.php.net/">qa.php.net</a>.      See also the work in progress <a href="http://wiki.php.net/doc/scratchpad/upgrade/53">5.3 upgrade guide</a>.     </p></div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry vevent"> 
    <div class="newsImage"><?php news_image("http://cw.mtacon.com/", "codeworks2009.png", "CodeWorks Conference"); ?></div> 
    <h1 class="summary entry-title"><a name="id2009-06-03-1" id="id2009-06-03-1" href="http://cw.mtacon.com/" rel="bookmark" class="bookmark">CodeWorks Conference</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2009-06-03T14:01:20+02:00">[03-Jun-2009]</abbr> 
        <div> 
     <p>CodeWorks 2009 is a series of <em>two-day conferences for PHP developers</em> and IT managers organized and run by the publishers of <a href="http://phparch.com/">php|architect Magazine</a>.</p> 
     <p>CodeWorks will travel to <a href="http://cw.mtacon.com/main/s/about/locations">seven locations</a> across the United States between <abbr title="2009-09-22" class="dtstart">September 22nd</abbr> and <abbr title="2009-10-06" class="dtend">October 5th</abbr> included. Each two-day event includes a day of <em>in-depth tutorials</em>  and a day of <em>conference talks</em> arranged across three different tracks, all presented by the <em>best experts</em> in the business.</p> 
     <p>These locations include:
      <ul> 
       <li>San Francisco, CA (9/22-9/23)</li> 
       <li>Los Angeles, CA (9/24-9/25)</li> 
       <li>Dallas, TX (9/26-9/27)</li> 
       <li>Atlanta, GA (9/28-9/29)</li> 
       <li>Miami, FL (9/30-10/1)</li> 
       <li>Washington, DC/Baltimore Area (10/2-10/3)</li> 
       <li>New York, NY (10/4-10/5)</li> 
      </ul> 
     </p> 
     <p>If PHP is your work, your passion or your hobby, CodeWorks is a great way to learn and connect with the greatest community of professionals in the world—and with <a href="http://cw.mtacon.com/signup/index">prices as low as $99</a> and a generous <a href="http://cw.mtacon.com/signup/s/discounts">discount program</a>, a uniquely affordable opportunity for everyone.</p> 
     <p>Remember, each event is <em>limited to 300 attendees</em> and prices increase the closer we get to each event. <a href="http://cw.mtacon.com/signup/index">Get your tickets today</a> before we run out or the price goes up!</p> 
     <p>For more information, visit <a href="http://cw.mtacon.com/">http://cw.mtacon.com</a>.</p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry vevent"> 
    <div class="newsImage"><?php news_image("http://www.afup.org/", "forumphp2009.jpg", "Forum PHP Paris"); ?></div> 
    <h1 class="summary entry-title"><a name="id2009-05-29-1" id="id2009-05-29-1" href="http://www.afup.org/" rel="bookmark" class="bookmark">Forum PHP Paris 2009</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2009-05-29T11:47:20+02:00">[29-May-2009]</abbr> 
        <div> 
      <p> 
      The <a href="http://www.afup.org/" alt="AFUP">AFUP</a> (Association française des utilisateurs PHP)
      organizes on <abbr title="2009-11-11" class="dtstart">November 11th</abbr> and <abbr title="2009-11-12" class="dtstart">November 12th</abbr> 
      at the <a href="http://www.cite-sciences.fr/" alt="Cit&#xE9; des Sciences">Cité des Sciences</a> in Paris, France,
      the <a href="" alt="Forum PHP">Forum PHP</a> for its 9th edition.
      </p> 
      <p> 
       The PHP Forum 2009 will welcome as a partner alongside the AFUP, 
       the association <a href="http://www.lemug.fr/" alt="LeMug">LeMug.fr</a> (MySQL User Group).
      </p> 
      <p> 
       On this occasion, AFUP decided to extend the pre-registration at preferential rates, and 
       also postpone the deadline for the call for speakers.
      </p> 
      <p> 
      To monitor developments and press releases, visit the following link: 
      <a href="http://afup.org/pages/forumphp2009/">http://afup.org/pages/forumphp2009/</a> 
      </p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry"> 
    <div class="newsImage"></div> 
    <h1 class="summary entry-title"><a name="id2009-05-09-1" id="id2009-05-09-1" href="http://www.php.net/archive/2009.php#id2009-05-09-1" rel="bookmark" class="bookmark">TestFest 2009</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2009-05-09T21:45:38+02:00">[09-May-2009]</abbr> 
        <div> 
      <p> 
        TestFest is upon us once again. For those who don't know, this is the
        time of year where User Groups and individuals donate a little of their
        time and effort to increasing the test coverage of PHP.
      </p> 
      <p> 
        Hundreds of thousands of lines of code are working in concert to
        assemble one of the simplest to learn and fastest running scripting
        languages in the business. All this is achieved with the expectation
        that very few bugs will make it into releases and the ones that do
        will be stomped out quickly, efficiently and will never be heard from
        again. This is a lofty goal and is only possible through a system of
        tests designed to continuously evaluate the well-being of PHP.
      </p> 
      <p> 
        This year the QA Team has been very busy implementing new features
        and improvements to make the TestFest experience easier and more
        enjoyable than ever before. Some these improvements include a
        Subversion repository for test storage and tracking, a Virtual
        Machine for simple test environment setup, and improved documentation
        of testing procedures.
      </p> 
      <p> 
        2009 is looking to be the most successful TestFest event ever. Over
        20 User Groups spanning Belgium, Brazil, Catalonia, Canada, France,
        Germany, Ireland, Italy, Netherlands, Norway, Peru, USA and the UK
        have already registered. This is an incredible response and we still
        have 2 months left to go.
      </p> 
      <p> 
        Getting involved couldn't be simpler. Visit the
        <a href="http://qa.php.net/testfest.php">QA TestFest page</a> to
        find out how you can organize a TestFest event in your community.
        We are looking forward to seeing your communities tests being
        committed into PHP.
      </p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry"> 
    <div class="newsImage"></div> 
    <h1 class="summary entry-title"><a name="id2009-05-07-1" id="id2009-05-07-1" href="http://www.php.net/archive/2009.php#id2009-05-07-1" rel="bookmark" class="bookmark">PHP 5.3.0RC2 Release Announcement</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2009-05-07T20:20:39+02:00">[07-May-2009]</abbr> 
        <div> 
     <p> 
      The PHP development team is proud to announce the second release candidate of PHP 5.3.0 (PHP 5.3.0RC2). 
      This RC focuses on bug fixes and stability improvements, and we hope only minimal changes are required 
      for the next candidate (RC3).
     </p> 
     <p> 
      Expect an RC3 in 2-3 weeks, although there will not be major changes so now is a good
      time to start the final testing of PHP 5.3.0 before it gets released, in order to find
      possible incompatibilities with your project.
     </p> 
     <p> 
      Please download and test this release candidate, and report any issues found.
      Downloads and further information is available at <a href="http://qa.php.net/">qa.php.net</a>.
      See also the work in progress <a href="http://wiki.php.net/doc/scratchpad/upgrade/53">5.3 upgrade guide</a>.
     </p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry vevent"> 
    <div class="newsImage"><?php news_image("http://www.phpday.it/", "phpday-it-2009.png", "phpDay Italy"); ?></div> 
    <h1 class="summary entry-title"><a name="id2009-04-17-1" id="id2009-04-17-1" href="http://www.phpday.it/" rel="bookmark" class="bookmark">phpDay Italy</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2009-04-17T11:42:32+02:00">[17-Apr-2009]</abbr> 
        <div> 
     <p> 
      The italian PHP user group (GrUSP), is organizing the 6th phpDay,
      theitalian conference dedicated to the PHP world (<a href="http://www.phpday.it/" class="url">http://www.phpday.it/</a>).
     </p> 
     <p> 
      This year's edition will be held in Verona on
      <abbr class="dtstart" title="2009-05-15">May 15</abbr>-<abbr class="dtend" title="2009-05-17">16th</abbr> 
      and "softwareintegration with PHP" is going to be the main theme of the event.
     </p> 
     <p> 
      The phpDay will have three channels:
      <ul> 
       <li>Developers: development approach and techniques</li> 
       <li>Community: focus on open source software and frameworks</li> 
       <li>Enterprise: real case studies for business and enterprises</li> 
      </ul> 
     </p> 
     <p> 
      For the benefit of our international visitors, there will be an
      entiretrack in english, so come and join us in the beautiful city of
      Verona!
     </p> 
     <p> 
      To subscribe to the event use our eventbrite page:
      <a href="http://phpday2009.eventbrite.com/">http://phpday2009.eventbrite.com/</a> 
     </p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry"> 
    <div class="newsImage"></div> 
    <h1 class="summary entry-title"><a name="id2009-04-08-1" id="id2009-04-08-1" href="http://www.php.net/archive/2009.php#id2009-04-08-1" rel="bookmark" class="bookmark">PHP 5.2.9-2 (Windows) released</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2009-04-08T13:49:16+02:00">[08-Apr-2009]</abbr> 
        <div> 
      <p>The PHP Development Team would like to announce the availability of a new Windows build for PHP - PHP 5.2.9-2</p> 
      <p>This release focuses on fixing security flaws in the included OpenSSL library (CVE-2009-0590, CVE-2009-0591 and CVE-2009-0789). The security advisory is available <a href="http://openssl.org/news/secadv_20090325.txt">here</a>.</p> 
      <p>The OpenSSL library has been updated to 0.9.8k, which includes fixes for these flaws.</p> 
      <p>Note: Only the Windows binaries are affected. There are no changes to the PHP sources, therefore no source releases are necessary.</p> 
      <p><strong>Updated 9th of April</strong>: Added the missing OCI8 DLL</p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry vevent"> 
    <div class="newsImage"><?php news_image("http://phpconference.nl/", "dpc09_banner.jpg", "DPC09"); ?></div> 
    <h1 class="summary entry-title"><a name="id2009-04-06-1" id="id2009-04-06-1" href="http://phpconference.nl/" rel="bookmark" class="bookmark">DPC09</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2009-04-06T21:36:59+02:00">[06-Apr-2009]</abbr> 
        <div> 
     <p> 
      Tickets are now on sale for The Dutch PHP Conference 2009 and we want to invite
      you to attend. This year's conference will be held from
      <abbr title="2009-06-11" class="dtstart">June 11</abbr>-<abbr title="2009-06-14" class="dtend">June13, 2009</abbr>.
      DPC09, like it's predecessors, will be held in Amsterdam at the RAI Center. This
      year we have expanded the conference to two days plus the tutorial day so that we
      can deliver even more sessions, events and value for your conference budget.
     </p> 
     <p> 
      Our speaker line up this year includes Andrei Zmievski, Marco Tabini, Derick
      Rethans, Ben Ramsey, Michelangelo van Dam, and Paul Reinheimer, just to name a few.
      This year's special keynote speakers are Andrei Zmievski and Owen Byrne as well as
      a special closing keynote session by Marco Tabini, Ivo Jansch and Cal Evans. You
      can see the full line up of speakers and sessions at
      <a href="http://phpconference.nl/schedule/">http://phpconference.nl/schedule/</a>.</p> 
     <p> 
      Early Bird pricing is in effect till April 30th, 2009. Save €55-€100 on ticket
      prices if you purchase before the deadline.
     </p> 
     <p> 
      For full details on DPC09 and information on how to order your tickets, visit the
      conference web site at <a href="http://phpconference.nl">http://phpconference.nl</a>.
     </p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry"> 
    <div class="newsImage"></div> 
    <h1 class="summary entry-title"><a name="id2009-03-27-1" id="id2009-03-27-1" href="http://www.php.net/archive/2009.php#id2009-03-27-1" rel="bookmark" class="bookmark">Google Summer of Code 2009</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2009-03-27T15:34:48-07:00">[27-Mar-2009]</abbr> 
        <div> 
      <p> 
       Once again we are happy to announce our involvement with the Google Summer of Code project.
       Be sure to check <a href="http://socghop.appspot.com/org/show/google/gsoc2009/php">our program</a> 
       at this years GSoC.
      </p> 
      <p> 
       We invite everyone to look at the <a href="http://wiki.php.net/gsoc/2009">list of ideas</a> for
       this years GSoC, and get involved. Students are welcome to propose their own ideas, and we
       will consider all applications that are received before the April 3rd deadline. So, thanks to
       everyone involved and we look forward to seeing many students join us on this great adventure!
      </p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry"> 
    <div class="newsImage"></div> 
    <h1 class="summary entry-title"><a name="id2009-03-24-1" id="id2009-03-24-1" href="http://www.php.net/archive/2009.php#id2009-03-24-1" rel="bookmark" class="bookmark">PHP 5.3.0RC1 Release Announcement</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2009-03-24T21:16:11+01:00">[24-Mar-2009]</abbr> 
        <div> 
      <p>The PHP development team is proud to announce the availability of the first release candidate of PHP 5.3.0 (PHP 5.3.0RC1). This release marks the final phase in a major improvement in the 5.X series, which includes a large number of new features, bug fixes and security enhancements.</p> 
      <p>The key features of the PHP 5.3 branch include:</p> 
      <ul> 
        <li>Support for <a href="http://php.net/namespaces">namespaces</a></li> 
        <li>Under the hood performance improvements</li> 
        <li><a href="http://php.net/lsb">Late static binding</a></li> 
        <li><a href="http://docs.php.net/functions.anonymous">Lambda functions and closures</a></li> 
        <li> 
         Syntax additions: 
         <a href="http://php.net/manual/language.types.string.php#language.types.string.syntax.nowdoc">NOWDOC</a>, limited GOTO,
         <a href="http://php.net/ternary#language.operators.comparison.ternary">ternary short cut "?:"</a> and
         <a href="http://php.net/__callstatic">__callStatic()</a> 
        </li> 
        <li>Optional <a href="http://php.net/gc_enable">garbage collection</a> for cyclic references</li> 
        <li>Optional <a href="http://php.net/mysqli.mysqlnd">mysqlnd</a> PHP native replacement for libmysql</li> 
        <li>Improved <a href="http://windows.php.net">windows</a> support including VC6 and VC9 binaries</li> 
        <li>More consistent float rounding</li> 
        <li>Deprecation notices are now handle via E_DEPRECATED (part of E_ALL) instead of the E_STRICT error level</li> 
        <li>Several enhancements to enable more <a href="http://php.net/ini.sections">flexiblity in php.ini</a> (and ini parsing in general)</li> 
        <li>New bundled extensions:
         <a href="http://php.net/phar">ext/phar</a>,
         <a href="http://php.net/intl">ext/intl</a>,
         <a href="http://php.net/fileinfo">ext/fileinfo</a>,
         <a href="http://php.net/sqlite3">ext/sqlite3</a>,
         <a href="http://php.net/enchant">ext/enchant</a> 
        </li> 
        <li>Countless bug fixes and improvements to existing extensions in particular to:
         <a href="http://php.net/openssl">ext/openssl</a>,
         <a href="http://php.net/spl">ext/spl</a> and
         <a href="http://php.net/datetime">ext/date</a> 
        </li> 
      </ul> 
      <p>This release also drops several extensions and unifies usage of internal APIs. Users should be aware of the following known backwards compatibility breaks:</p> 
      <ul> 
        <li>Parameter parsing API unification will cause some functions to behave more or less strict when it comes to type juggling</li> 
        <li>Removed the following extensions:
         <a href="http://php.net/mhash">ext/mhash</a> (see <a href="http://php.net/hash">ext/hash</a>),
         <a href="http://php.net/msql">ext/msql</a>,
         <a href="http://php.net/pspell">ext/pspell</a> (see <a href="http://php.net/enchant">ext/enchant</a>),
         <a href="http://php.net/sybase">ext/sybase</a> (see <a href="http://php.net/sybase">ext/sybase_ct</a>)
        </li> 
        <li>Moved the following extensions to PECL:
         <a href="http://php.net/ming">ext/ming</a>,
         <a href="http://php.net/fbsql">ext/fbsql</a>,
         <a href="http://php.net/ncurses">ext/ncurses</a>,
         <a href="http://php.net/fdf">ext/fdf</a> 
        </li> 
        <li>Removed <a href="http://php.net/manual/ini.core.php#ini.zend.ze1-compatibility-mode">zend.ze1_compatibility_mode</a></li> 
        <li>See the <a href="http://cvs.php.net/viewvc.cgi/php-src/UPGRADING?view=markup&amp;pathrev=PHP_5_3">upgrading guide</a> for other minor changes</li> 
      </ul> 
      <p>All users of PHP, especially those using earlier PHP 5 releases are advised to test this release as the final release of PHP 5.3.0 will eventually obsolete the 5.2 branch of PHP.</p> 
      <p>For users upgrading from previous PHP 5 releases there is an upgrading guide available <a href="http://cvs.php.net/viewvc.cgi/php-src/UPGRADING?view=markup&amp;pathrev=PHP_5_3">here</a>, detailing the changes between those releases and PHP 5.3.0.</p> 
      <p>Please also note that we are aware of issues surrounding float/integer handling in some edge cases (some of which have been introduced in PHP 5.2.0), as well as a crash bug in NSAPI, that will be fixed in PHP 5.3.0RC2. These issues however do not prevent wide spread testing of PHP 5.3.0RC1 as users can now rely on the feature set and implementation decisions no longer being changed.</p> 
      <p>For a full list of changes in PHP 5.3.0, see the CVS <a href="http://cvs.php.net/viewvc.cgi/php-src/NEWS?view=markup&amp;pathrev=PHP_5_3">NEWS</a> file.</p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry"> 
    <div class="newsImage"></div> 
    <h1 class="summary entry-title"><a name="id2009-03-10-1" id="id2009-03-10-1" href="http://www.php.net/archive/2009.php#id2009-03-10-1" rel="bookmark" class="bookmark">5.2.9-1 (for Windows) released</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2009-03-10T23:16:11+01:00">[10-Mar-2009]</abbr> 
        <div> 
      <p>The PHP Development Team would like to announce the availability of a new Windows build of PHP - PHP 5.2.9-1</p> 
      <p>This release focuses on fixing a security flaw introduced by the cURL library (CVE-2009-0037). Please see the following for a full description: <a href="http://curl.haxx.se/docs/adv_20090303.html">http://curl.haxx.se/docs/adv_20090303.html</a></p> 
      <p>Please note that the cURL related function is disabled when open_basedir or safe_mode enabled.</p> 
      <p>Note: Only the Windows packages are affected.</p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry"> 
    <div class="newsImage"></div> 
    <h1 class="summary entry-title"><a name="id2009-02-26-1" id="id2009-02-26-1" href="http://www.php.net/archive/2009.php#id2009-02-26-1" rel="bookmark" class="bookmark">PHP 5.2.9 Released!</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2009-02-26T18:24:50-05:00">[26-Feb-2009]</abbr> 
        <div> 
      <p>The PHP development team would like to announce the immediate availability of PHP 5.2.9. This release focuses on improving the stability of the PHP 5.2.x branch with over 50 bug fixes, several of which are security related. All users of PHP are encouraged to upgrade to this release.</p> 
      <p> 
        <b>Security Enhancements and Fixes in PHP 5.2.9:</b> 
      </p> 
      <ul>        <li>Fixed security issue in imagerotate(), background colour isn't validated correctly with a non truecolour image. Reported by Hamid Ebadi, APA Laboratory (Fixes CVE-2008-5498). (Scott)</li>        <li>Fixed a crash on extract in zip when files or directories entry names contain  a relative path. (Pierre)</li>        <li>Fixed explode() behavior with empty string to respect negative limit. (Shire)</li>        <li>Fixed a segfault when malformed string is passed to json_decode(). (Scott)</li></ul> 
      <p>Further details about the PHP 5.2.9 can be found in the release announcement for <a href="http://www.php.net/releases/5_2_9.php">5.2.9</a>  the full list of changes is available in the <a href="http://www.php.net/ChangeLog-5.php#5.2.9">ChangeLog for PHP 5</a>.</p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry vevent"> 
    <div class="newsImage"></div> 
    <h1 class="summary entry-title"><a name="id2009-02-20-1" id="id2009-02-20-1" href="http://www.php.net/archive/2009.php#id2009-02-20-1" rel="bookmark" class="bookmark">php|tek 2009</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2009-02-20T18:59:30+01:00">[20-Feb-2009]</abbr> 
        <div> 
      <p>We are happy to invite you to this year's php|tek conference, to be held <abbr title="2009-05-19" class="dtstart">May 19</abbr>-<abbr title="2009-05-23" class="dtend">22, 2009</abbr> in <span class="location">Chicago, Illinois</span>, and hosted (as always) by the folks at php|architect.</p> 
      <p>Join us to hear talks and tutorials on a variety of PHP subjects from PHP experts such as Ed Finkler, Sara Golemon, Chris Shiflett, Sebastian Bergmann, Derick Rethans, Stefan Priebsch, Christian Wenz and our mid-conference keynote by Andrei Zmievski on PHP6. You can see the full schedule at <a href="http://tek.mtacon.com/c/schedule">http://tek.mtacon.com/c/schedule</a> - we guarantee you won't be disappointed.</p> 
      <p>This year we are also happy to invite you to our Unconference and Hack-a-thon which will be held in the early evenings, separate from the main schedule. You'll have a great time and won't miss a thing! This, coupled with our entertaining evening events and multiple networking opportunities will prove to make your trip to the conference an educational and memorable one!</p> 
      <p>Early bird pricing is in effect until February 28, 2009 so hurry to take advantage of this offer before it's too late!</p> 
      <p>For details on the conference, including registration and hotel information, please visit us at <a href="http://tek.mtacon.com/" class="url">http://tek.mtacon.com/</a>.</p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry vevent"> 
    <div class="newsImage"></div> 
    <h1 class="summary entry-title"><a name="id2009-02-18-1" id="id2009-02-18-1" href="http://www.php.net/archive/2009.php#id2009-02-18-1" rel="bookmark" class="bookmark">2009 PHP Quebec Conference</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2009-02-18T02:10:11-08:00">[18-Feb-2009]</abbr> 
        <div> 
     <p> 
      The seventh edition of the PHP Quebec Conference will take place in a few days, 
      between March 4th and 6th, 2009. It will be held in Montreal, Canada.
     </p> 
     <p> 
      Don't miss out on this unique opportunity to learn more on latest development 
      techniques with PHP, RIA, Frameworks and project management. Meet with PHP 
      Community leaders such as: Zeev Suraski, Chris Shiflett, Andrei Zmievski, 
      Sara Golemon, John Coggeshall and many more.
     </p> 
     <p> 
      With over 55 technical talks, 35 international speakers and multiple networking 
      activities you are guaranteed to take your career one step ahead in a friendly 
      environment.
     </p> 
     <p> 
      Space is limited, register online before February 28th and secure your presence. 
      <a href="http://conf.phpquebec.com/">http://conf.phpquebec.com</a> 
     </p> 
    </div> 
  
    </div> 
</div>


<?php site_footer(array('elephpants' => true, 'sidebar' => $SIDEBAR_DATA));

