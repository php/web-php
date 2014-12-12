<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'archive/2008.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
news_archive_sidebar();
site_header("News Archive - 2008", array("cache" => true));
?>

<h1>News Archive - 2008</h1>

<p>
 Here are the most important news items we have published in 2008 on PHP.net.
</p>

<hr>

<div class="newsItem hentry">
    <div class="newsImage"></div>
    <h1 class="summary entry-title"><a name="id2008-12-10-1" id="id2008-12-10-1" href="http://www.php.net/archive/2008.php#id2008-12-10-1" rel="bookmark" class="bookmark">Windows PECL binaries</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2008-12-10T19:50:38+01:00">[10-Dec-2008]</abbr>

        <div>
        <p>Due to unfortunate circumstances Windows binaries for PECL extensions will no longer be available on http://pecl4win.php.net.</p>
        <p>Work is being done to incorporate Windows binaries for PECL extensions into <a href="http://pecl.php.net">pecl.php.net</a> and will hopefully be ready early 2009</p>
        <p>If anyone is interested in the project please join the <a href="mailto:internals-win@lists.php.net">PHP Windows Development</a> <a href="http://php.net/mailinglist">mailinglist</a>.</p>

      </div>
    
    </div>
</div>

<hr>
<div class="newsItem hentry">
    <div class="newsImage"></div>
    <h1 class="summary entry-title"><a name="id2008-12-08-1" id="id2008-12-08-1" href="http://www.php.net/archive/2008.php#id2008-12-08-1" rel="bookmark" class="bookmark">PHP 5.2.8 Released!</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2008-12-08T15:58:43-05:00">[08-Dec-2008]</abbr>

        <div>
        <p>The PHP Development Team would like to announce the immediate availability of PHP 5.2.8. This release addresses a regression introduced by 5.2.7 in regard to the magic_quotes functionality, which was broken by an incorrect fix to the filter extension. All users who have upgraded to 5.2.7 are encouraged to upgrade to this release.  Alternatively you can apply a work-around for the bug by changing "filter.default_flags=0" in php.ini.</p>
      </div>
    
    </div>
</div>

<hr>
<div class="newsItem hentry">
    <div class="newsImage"></div>
    <h1 class="summary entry-title"><a name="id2008-12-07-1" id="id2008-12-07-1" href="http://www.php.net/archive/2008.php#id2008-12-07-1" rel="bookmark" class="bookmark">PHP 5.2.7 has been removed from distribution</a></h1>

    <div class="entry-content description">
        <abbr class="published newsdate" title="2008-12-07T22:01:14-08:00">[07-Dec-2008]</abbr>
        <div>
        <p>
        Due to a security bug found in the PHP 5.2.7 release, it has been removed from distribution.
        The bug affects configurations where <a href="/magic_quotes">magic_quotes_gpc</a> is enabled,
        because it remains off even when set to on.
        In the meantime, use PHP <a href="/releases/5_2_6.php">5.2.6</a> until PHP 5.2.8 is later released.
       </p>

      </div>
    
    </div>
</div>

<hr>
<div class="newsItem hentry">
    <div class="newsImage"></div>
    <h1 class="summary entry-title"><a name="id2008-12-04-3" id="id2008-12-04-3" href="http://www.php.net/archive/2008.php#id2008-12-04-3" rel="bookmark" class="bookmark">PHP 5.2.7 Released</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2008-12-04T20:44:17-05:00">[04-Dec-2008]</abbr>

        <div>
      <p>
       The PHP development team would like to
       announce the immediate availability of <a href="/downloads.php#v5">PHP 5.2.7</a>.
       This release focuses on improving the stability of the PHP 5.2.x branch with over
       120 bug fixes, several of which are security related. All users of PHP are
       encouraged to upgrade to this release.
      </p>
      <p>
       <b>Security Enhancements and Fixes in PHP 5.2.7:</b>
      </p>
      <ul>

       <li>
        Upgraded PCRE to version 7.8 (Fixes CVE-2008-2371)
       </li>
       <li>
        Fixed missing initialization of BG(page_uid) and BG(page_gid), reported by Maksymilian Arciemowicz.
       </li>
       <li>
        Fixed incorrect php_value order for Apache configuration, reported by Maksymilian Arciemowicz.
       </li>
       <li>

        Fixed a crash inside gd with invalid fonts (Fixes CVE-2008-3658).
       </li>
       <li>
        Fixed a possible overflow inside memnstr (Fixes CVE-2008-3659).
       </li>
       <li>
        Fixed security issues detailed in CVE-2008-2665 and CVE-2008-2666.
       </li>
       <li>
        Fixed bug #45151 (Crash with URI/file..php (filename contains 2 dots)).(Fixes CVE-2008-3660)
       </li>

       <li>
        Fixed bug #42862 (IMAP toolkit crash: rfc822.c legacy routine buffer overflow). (Fixes CVE-2008-2829)</li>
       <li>
        Fixed extraction of zip files and directories with crafted entries, reported by Stefan Esser.
       </li>
      </ul>
      <p>
       Further details about the PHP 5.2.7 release can be found in the <a href="/releases/5_2_7.php">release announcement for 5.2.7</a>, the full list of changes is available in the <a href="/ChangeLog-5.php#5.2.7">ChangeLog for PHP 5</a>.
      </p>

      <br>
      <p>
       <strong>Update (December 6th):</strong>
       Added missing zip security fix
      </p>
     </div>
    
    </div>
</div>

<hr>

<div class="newsItem hentry">
    <div class="newsImage"></div>
    <h1 class="summary entry-title"><a name="id2008-12-04-2" id="id2008-12-04-2" href="http://www.php.net/archive/2008.php#id2008-12-04-2" rel="bookmark" class="bookmark">PHP 5.3 alpha3 released!</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2008-12-04T17:00:32+01:00">[04-Dec-2008]</abbr>
        <div>
        <p>The PHP development team is proud to announce the <a href="http://qa.php.net/">third alpha release</a>

        of the upcoming PHP 5.3.0 minor version update of PHP.
        Several new features have already been documented in the <a href="http://php.net/docs.php">official documentation</a>,
        others are listed on the <a href="http://wiki.php.net/doc/scratchpad/upgrade/53">wiki</a>
        in preparation of getting documented. It is imperative that more people
        join the effort to complete the documentation for PHP 5.3.0.
        Please also review the <a href="http://php.net/php5news">NEWS</a> file.</p>
        <strong>THIS IS A DEVELOPMENT PREVIEW - DO NOT USE IT IN PRODUCTION!</strong>
        <p>The purpose of this alpha release is to encourage users to not only actively
         participate in identifying bugs, but also in ensuring that all new features or
         necessary backwards compatibility breaks are noted in the documentation. Please
         report any findings to the <a href="mailto:php-qa@lists.php.net">QA mailinglist</a>

         or the <a href="http://bugs.php.net">bug tracker</a>.</p>
        <p>There have been a great number of other additions and improvements since the last alpha,
        but here is a short overview of the most important changes:</p>
        <ul>
          <li><a href="http://php.net/language.namespaces">Namespaces</a> (documentation has been updated to the current state)</li>
          <li>

            <a href="http://wiki.php.net/rfc/rounding">Rounding behavior</a>
          </li>
          <li>ext/msql has been removed, while ext/ereg will now raise E_DEPRECATED notices</li>
          <li>ext/mhash has been replaced by ext/hash but full BC is maintained</li>
          <li>PHP now uses cc as the default compiler, instead of gcc</li>
          <li>A number of bug fixes to ext/pdo, ext/soap, the stream layer among others</li>

        </ul>
        <p>Several under the hood changes also require in depth testing with existing
        applications to ensure that any backwards compatibility breaks are minimized.</p>
        <p>The current <a href="http://wiki.php.net/todo/php53">release plan</a> expects
        a stable release sometime around the end of Q1 2009.</p>
      </div>
    
    </div>
</div>

<hr>
<div class="newsItem hentry">
    <div class="newsImage"></div>
    <h1 class="summary entry-title"><a name="id2008-12-04-1" id="id2008-12-04-1" href="http://www.php.net/archive/2008.php#id2008-12-04-1" rel="bookmark" class="bookmark">PHP Advent 2008</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2008-12-04T09:30:00-05:00">[04-Dec-2008]</abbr>
        <div>
        <p>December is a busy and exciting time of the year.
        <a href="http://phpadvent.org/">PHP Advent</a> is an attempt to capture
        and share doses of wisdom from a few of the people in the PHP community
        who have been kind enough to share their thoughts and tips. Please join
        us on our daily journey by <a href="http://feeds.feedburner.com/phpadvent">subscribing to our feed</a>

        or <a href="http://twitter.com/phpadvent">following us on Twitter</a>.
        Happy holidays.</p>
      </div>
    
    </div>
</div>

<hr>
<div class="newsItem hentry vevent">
    <div class="newsImage"><?php news_image("http://www.afup.org/", "afup2008.png", "Forum AFUP Paris 2008"); ?></div>
    <h1 class="summary entry-title"><a name="id2008-11-15-1" id="id2008-11-15-1" href="http://www.php.net/archive/2008.php#id2008-11-15-1" rel="bookmark" class="bookmark">Forum PHP Paris 2008</a></h1>

    <div class="entry-content description">
        <abbr class="published newsdate" title="2008-11-15T21:56:55-07:00">[15-Nov-2008]</abbr>
        <p>The 2008 edition of the French PHP users welcomes once again unique
      speakers : Zak Greant, from Foo Associates, Laura Thompson from Mozilla, and
      Lukas Smith, Core PHP Developper.
          </p>
      <p>
  Set in Paris, on December 8th and 9th 2008, by the
  Association Française des Utilisateurs de PHP (French PHP User Group,
  <a href="http://www.afup.org/" title="AFUP">http://www.afup.org/</a>),
  the Forum PHP 2008 focuses on the themas of Professional Web Services,
  and PHP large scale projects.
    </p>
    
    </div>

</div>

<hr>
<div class="newsItem hentry vevent">
    <div class="newsImage"><?php news_image("http://conference.phpnw.org.uk", "phpnw08_logo.jpg", "PHPNW08 logo"); ?></div>
    <h1 class="summary entry-title"><a name="id2008-11-04-2" id="id2008-11-04-2" href="http://conference.phpnw.org.uk" rel="bookmark" class="bookmark">PHPNW08 - November 22nd - Manchester, UK</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2008-11-04T12:55:09+00:00">[04-Nov-2008]</abbr>
        <div>
        <p>

       PHP North West are pleased to announce their first conference, PHPNW08, to be held at <span class="location">Manchester Central (formerly GMex)</span>.
      </p>
        <p>
       On <abbr class="dtstart" title="2008-11-22">Saturday 22nd November 2008</abbr>,
       PHPNW08 will bring together the North-of-England PHP community for a
       one-day event of exceptional presentations, challenging workshops,
       sensational debates and networking opportunities. The conference will
       host a mixture of well-known regulars on the speakers' circuit and local
       talent, and aims to highlight current best practices and emerging topics
       within the sphere of PHP and web development. See our
       <a href="http://conference.phpnw.org.uk/phpnw08/?page_id=118" class="url">conference schedule</a> for details.
      </p>
        <p>

       We would love developers, designers, managers or anyone else with an
       interest in the PHP programming language to join us for what promises to
       be an awesome event at a very reasonable rate:
      </p>
        <ul>
          <li>Standard tickets: £60.00</li>
          <li>Early bird (until 8th November): £50.00</li>
          <li>Concessionary tickets: £35.00</li>
        </ul>
        <p>

       Tickets for PHPNW08 are on sale now at
       <a href="http://conference.phpnw.org.uk/phpnw08/register/" class="url">http://conference.phpnw.org.uk/phpnw08/register/</a>.
      </p>
      </div>
    
    </div>
</div>

<hr>
<div class="newsItem hentry vevent">
    <div class="newsImage"></div>
    <h1 class="summary entry-title"><a name="id2008-09-16-1" id="id2008-09-16-1" href="http://www.php.net/archive/2008.php#id2008-09-16-1" rel="bookmark" class="bookmark">PHP Quebec 2009</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2008-09-16T10:12:12+02:00">[16-Sep-2008]</abbr>
        <p>

  PHP Québec is pleased to announce the seventh edition of the PHP Québec Conference.
    The Conference will take place in <span class="location">Montréal, Québec,
    Canada</span> between <abbr title="2009-03-04T00:00:00+01:00" class="dtstart">March 4</abbr>
    and <abbr title="2009-03-06T00:00:00+01:00" class="dtend">6th 2009</abbr>.
    We are looking for speakers willing to share their expertise with Canadian and United States PHP professionals.
  </p>
      <p>
  The Conference features technical talks and Labs dedicated to advanced software development techniques with PHP5 and PHP6, XML, web services,databases, etc., project management where speakers and visitor swill try to find solutions to actual business problems.
  </p>

      <p>
  Organizers will prioritize new and original topics in English or French. For more information, visit the website:
  <a href="http://conf.phpquebec.com/en" title="2009 PHP QuebecConference">http://conf.phpquebec.com</a>
</p>
    
    </div>
</div>

<hr>
<div class="newsItem hentry vevent">
    <div class="newsImage"><?php news_image("http://phpconference.es/", "PHPBarcelonaConference003.png", "Barcelona PHP Conference"); ?></div>
    <h1 class="summary entry-title"><a name="id2008-09-10-1" id="id2008-09-10-1" href="http://phpconference.es/" rel="bookmark" class="bookmark">Barcelona PHP Conference 2008</a></h1>

    <div class="entry-content description">
        <abbr class="published newsdate" title="2008-09-10T15:08:49+02:00">[10-Sep-2008]</abbr>
        <div>
        <p><a href="http://phpbarcelona.org/">The PHP Barcelona User Group</a>
        is proud to announce its first
        <a href="http://phpconference.es/">international PHP Conference</a>.
        It will be celebrated on <abbr class="dtstart" title="2008-09-27">Saturday,
         September 27th</abbr>, at <span class="location">Barcelona</span>.
       </p>

        <p>
        The PHP Barcelona User Group (aka PHPBarcelona) is a non-profit
        organization aimed at spreading and interchanging knowledge among
        the PHP developers community of Barcelona and surroundings, and
        also evangelizing the PHP technology on universities and
        enterprises as well.
       </p>
        <p>
        This year they had celebrated another events but this one is
        the first which will be developed completely in English. The
        highlights of this conference will be the talks of internationally
        recognized PHP developers, like Derick Rethans and Scott MacVicar
        among others.
       </p>
        <p>
        For more information about Barcelona PHP Conference 2008 and to
        register, please visit
        <a href="http://phpconference.es/" class="url">http://phpconference.es</a>
       </p>

      </div>
    
    </div>
</div>

<hr>
<div class="newsItem hentry vevent">
    <div class="newsImage"><?php news_image("http://www.phpconference.com/", "icp08.jpg", "International PHP Conference 2008"); ?></div>
    <h1 class="summary entry-title"><a name="id2008-09-08-1" id="id2008-09-08-1" href="http://www.phpconference.com/" rel="bookmark" class="bookmark">International PHP Conference 2008 October 27-31st Mainz, Germany</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2008-09-08T12:31:08+02:00">[08-Sep-2008]</abbr>

        <div>
        <h3>The premiere PHP Conference – Celebrate the 14th event with us!</h3>
        <p>
       Today the ICP is <em>the</em> reference whenever substructures of existing technologies
       should be extended or the basis for new developments should be created. Thus, you
       do not only profit from the concentrated know-how of worldwide acknowledged,
       international PHP-experts but also from the professional transfer of knowledge
       between industry and development.
      </p>
        <p>
       With its mixture of topics the International PHP Conference provides an ideal
       resource for all professionals and their successful daily routine within the whole
       PHP-spectrum. Insights into current Web 2.0 technologies, Security, Best Practices
       for tools and components, Enterprise know-how, databases, architectures and more
       are provided at the ICP 2008.
      </p>

        <p>
       The International PHP Conference celebrates it's 14th Edition. Celebrate with us,
       and profit from our Celebrate 14teen offers!
      </p>
        <ul>
          <li>199 € / Special Price</li>
          <li>149 €* / Special Price for Freelancer</li>
          <li>99 €** / Student Price</li>
        </ul>

        <p>Offer is valid till 30th September!</p>
        <p>
          <a href="http://phpconference.com/">Register now!</a>
        </p>
        <p>
          <small>* Confirmation with your company's letter head</small>
          <br>

          <small>** With Student ID. Limited seating available</small>
        </p>
      </div>
    
    </div>
</div>

<hr>
<div class="newsItem hentry vevent">
    <div class="newsImage"><?php news_image("http://phpworks.mtacon.com/", "phppyworks.png", "php|works / PyWorks 2008: Chicago"); ?></div>
    <h1 class="summary entry-title"><a name="2008-09-03-1" id="2008-09-03-1" href="http://phpworks.mtacon.com/" rel="bookmark" class="bookmark">php|works &amp; PyWorks 2008 - Atlanta</a></h1>

    <div class="entry-content description">
        <abbr class="published newsdate" title="2008-09-03T11:49:33+02:00">[03-Sep-2008]</abbr>
        <div>
        <a href="http://tek.phparch.com/" class="url">php|tek 2008: Chicago</a>
        <p>
          The publishers of <a href="http://www.phparch.com/">php|architect Magazine</a> and <a href="http://pythonmagazine.com">Python Magazine</a> are proud to announce the
          joint <a href="http://phpworks.mtacon.com">php|works</a> / <a href="http://pyworks.mtacon.com">PyWorks 2008</a> conferences in Atlanta, Georgia, USA.
        </p>

        <p>
          php|works and PyWorks feature over 65 talks, 10 tutorials and 5 tracks on topics ranging from web development to database optimization with PHP and Python over the course of two days,
          social events in the evening and plenty of networking opportunities with industry peers.
        </p>
        <p>
          This year, the PHP Community (and the Python Community, too!) meets <abbr class="dtstart" title="2008-11-12">November 12</abbr>-<abbr class="dtend" title="2008-11-14">14</abbr> for one of North America's premier PHP conferences of 2008.
        </p>
        <p>

          Join us to hear <a href="http://phpworks.mtacon.com/c/schedule">top speakers</a> such as Derick Rethans (eZ Systems), Chris Shiflett (OmniTI), Mike Potter (Adobe) and more.
        </p>
      </div>
    
    </div>
</div>

<hr>
<div class="newsItem hentry">
    <div class="newsImage"></div>
    <h1 class="summary entry-title"><a name="id2008-08-07-1" id="id2008-08-07-1" href="http://www.php.net/archive/2008.php#id2008-08-07-1" rel="bookmark" class="bookmark">PHP 4.4.9 released!</a></h1>

    <div class="entry-content description">
        <abbr class="published newsdate" title="2008-08-07T20:12:42+02:00">[07-Aug-2008]</abbr>
        <div>
        <p>The PHP development team would like to announce the immediate
        availability of PHP 4.4.9. It continues to improve the security and the
        stability of the 4.4 branch and all users are strongly encouraged to
        upgrade to it as soon as possible. This release wraps up all the
        outstanding patches for the PHP 4.4 series, and is therefore the
        <b>last</b> PHP 4.4 release.</p>
        <p>
          <b>Security Enhancements and Fixes in PHP 4.4.9:</b>

        </p>
        <ul>
          <li>Updated PCRE to version 7.7.</li>
          <li>Fixed overflow in memnstr().</li>
          <li>Fixed crash in imageloadfont when an invalid font is given.</li>
          <li>Fixed open_basedir handling issue in the curl extension.</li>
          <li>Fixed mbstring.func_overload set in .htaccess becomes global.</li>

        </ul>
        <p> For a full list of changes in PHP 4.4.9, see the <a href="/ChangeLog-4.php#4.4.9">ChangeLog</a>.</p>
      </div>
    
    </div>
</div>

<hr>
<div class="newsItem hentry">
    <div class="newsImage"></div>

    <h1 class="summary entry-title"><a name="id2008-08-01-1" id="id2008-08-01-1" href="http://www.php.net/archive/2008.php#id2008-08-01-1" rel="bookmark" class="bookmark">PHP 5.3 alpha1 released!</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2008-08-01T08:50:37+02:00">[01-Aug-2008]</abbr>
        <div>
        <p>The PHP development team is proud to announce the <a href="http://qa.php.net/">first alpha release</a> of the upcoming minor version update of PHP. <a href="http://windows.php.net/download/">Windows binaries</a> will be available starting with alpha2 (intermediate snapshots available at <a href="http://snaps.php.net">snaps.php.net</a>). The new version PHP 5.3 is expected to improve stability and performance as well as add new language syntax and extensions. Several new features have already been documented in the <a href="http://php.net/docs.php">official documentation</a>, others are listed on the <a href="http://wiki.php.net/doc/scratchpad/upgrade/53">wiki</a> in preparation of getting documented. Please also review the <a href="http://php.net/php5news">NEWS</a> file.</p>

        <strong>THIS IS A DEVELOPMENT PREVIEW - DO NOT USE IT IN PRODUCTION!</strong>
        <p>The purpose of this alpha release is to encourage users to not only actively
         participate in identifying bugs, but also in ensuring that all new features or
         necessary backwards compatibility breaks are noted in the documentation. Please
         report any findings to the <a href="mailto:php-qa@lists.php.net">QA mailinglist</a>
         or the <a href="http://bugs.php.net">bug tracker</a>.</p>
        <p>There have been a great number of other additions and improvements, but here is a short overview of the most important changes:</p>
        <ul>

          <li><a href="http://php.net/language.namespaces">Namespaces</a> (documentation maybe out dated)</li>
          <li><a href="http://php.net/oop5.late-static-bindings">Late static binding</a> and <a href="http://php.net/language.oop5.overloading">__callStatic</a></li>
          <li>
            <a href="http://wiki.php.net/rfc/closures">Lambda functions and closures</a>
          </li>

          <li>Addition of the <a href="http://php.net/book.intl">intl</a>, <a href="http://php.net/book.phar">phar</a> (phar is scheduled for some more work a head of alpha2), <a href="http://php.net/book.fileinfo">fileinfo </a> and <a href="http://php.net/book.sqlite3">sqlite3</a> extensions</li>
          <li>Optional cyclic garbage collection</li>

          <li>Optional support for the <a href="http://forge.mysql.com/wiki/PHP_MYSQLND">MySQLnd</a> replacement driver for libmysql</li>
          <li>Windows older than Windows 2000 (Windows 98, NT4, etc.) are not supported anymore (<a href="http://wiki.php.net/internals/windows/releasenotes">details</a>)</li>
          <li>New syntax features like <a href="http://php.net/language.types.string#language.types.string.syntax.nowdoc">NOWDOC</a>, limited GOTO, ternary short cut "?:"</li>
        </ul>

        <p>Several under the hood changes also require in depth testing with existing applications to ensure that any backwards compatibility breaks are minimized. This is especially important for users that require the undocumented Zend engine multibyte support.</p>
        <p>The current <a href="http://wiki.php.net/todo/php53">release plan</a> states that there will be alpha/beta/RC releases in 2-3 week intervals with an expected stable release of PHP 5.3 between mid September and mid October of 2008.</p>
      </div>
    
    </div>
</div>

<hr>
<div class="newsItem hentry">

    <div class="newsImage"></div>
    <h1 class="summary entry-title"><a name="id2008-07-30-1" id="id2008-07-30-1" href="http://www.php.net/archive/2008.php#id2008-07-30-1" rel="bookmark" class="bookmark">TestFest 2008 wrap-up</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2008-07-30T00:23:14+01:00">[30-Jul-2008]</abbr>
        <div>
        <p>Overall 158 tests have been submitted as part of <a href="http://qa.php.net/testfest.php">TestFest 2008</a> since the launch of the <a href="http://testfest.php.net">TestFest submission site</a> by 30 different people from people all over the world. Actually this is not counting the various submissions by existing core developers, who also took this opportunity to add some more tests. This has actually increased total <a href="http://gcov.php.net/" target="_new">test coverage</a> for ext/reflection, ext/dom and ext/exif by about 10% each. While the organization of the TestFest was a bit adhoc, there were numerous TestFest events in local user groups. So the number of people exposed to the PHP test framework is much greater. Hopefully this will lead to more people submitting bug reports with an accompanying <a href="http://qa.php.net/write-test.php">phpt</a> test file!</p>

        <p>Our top submitter Felix De Vliegher has actually committed his last submissions himself since, based on the high quality of his submissions, he has been granted commit rights to the PHP repository. We have not heard back from all participants, but we encourage everybody to <a href="http://www.deshong.net/?p=76" target="_new">blog</a> about their experience and provide us with feedback on how to improve future events.</p>
        <p>Now better late than never, here are the 10 winners of the promised <a href="http://flickr.com/groups/elephpants/pool/">elePHPant</a> raffle sponsored by <a href="http://www.nexen.net">Nexen</a>. Note that Felix asked me not to include him in the raffle, since he is already herding quite a number of elePHPants at home.</p>
        <ul>
          <li>Eric Stewart</li>

          <li>Håvard Eide</li>
          <li>Marc Veldman</li>
          <li>Michelangelo van Dam</li>
          <li>Rein Velt</li>
          <li>Rob Young</li>
          <li>Sami Greenbury</li>

          <li>Sebastian Deutsch</li>
          <li>Sebastian Schürmann</li>
          <li>Stefan Koopmanschap</li>
        </ul>
        <p>We will provide Nexen with the email addresses of the winners, so that they can arrange to get the elePHPants shipped. Also for those people wondering, you can continue to submit tests on the <a href="http://testfest.php.net">TestFest submission site</a>. A bit thank you to all participants and TestFest organizers! Without the countless people that helped organize local events, implement the infrastructure and submissions reviewers, the TestFest would have obviously not worked out as well as it has. We will surely do similar events in the future based on the big success of TestFest 2008.</p>
      </div>

    
    </div>
</div>

<hr>
<div class="newsItem hentry">
    <div class="newsImage"></div>
    <h1 class="summary entry-title"><a name="id2008-07-29-1" id="id2008-07-29-1" href="http://www.php.net/archive/2008.php#id2008-07-29-1" rel="bookmark" class="bookmark">Manual restructure and license change</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2008-07-29T23:50:37+02:00">[29-Jul-2008]</abbr>
        <div>

        <p>
        A few weeks ago the <a href="/manual">manual</a> was restructured
        to improve navigation and make room for
        <a href="/pdo.prepared-statements">per-extension chapters</a>
        and <a href="/haru.examples">usage examples</a> along with
        <a href="/class.xmlreader">improved documentation</a> for
        <a href="/oop5/">object oriented</a> extensions.
       </p>

        <p>
        The most noticable changes are the <a href="/funcref">function reference</a>,
        <a href="/reserved.variables">predefined variables</a>,
        <a href="/context">context options and parameters</a> and
        <a href="/reserved.exceptions">predefined exceptions</a> manual pages,
        for which <a href="/contact">we would really appreciate feedback</a> on.
       </p>

        <p>
        The upcomming PHP5.3 release introduces
        <a href="http://wiki.php.net/doc/scratchpad/upgrade/53">several major features</a>
        such as <a href="/namespaces">namespaces</a>, closures,
        <a href="/lsb">late static bindings</a>, <a href="/intl">internationalization functions</a>,
        <a href="/ini.sections">INI sections</a>, and <a href="/phar">Phar</a> among others.
        We would really appreciate any and all help we can get improving the documentation.
       </p>

        <p>
        In related news, the manual was relicensed recently and is now
        covered by the
        <a href="http://creativecommons.org/licenses/by/3.0/" rel="license">CreativeCommons Attribution license</a>.
       </p>
      </div>
    
    </div>
</div>

<hr>
<div class="newsItem hentry vevent">
    <div class="newsImage"><?php news_image("http://zendcon.com/", "zlogo.gif", "ZendCon 2008"); ?></div>

    <h1 class="summary entry-title"><a name="id2008-07-13-1" id="id2008-07-13-1" href="http://zendcon.com/" rel="bookmark" class="bookmark">ZendCon 2008 - September 15-18 - Santa Clara, CA-US</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2008-07-13T18:23:14+02:00">[13-Jul-2008]</abbr>
        <div>
        <p>Join us for the largest PHP only gathering, <abbr class="dtstart" title="2008-09-15T00:00:00+02:00">September 15th</abbr> - <abbr class="dtend" title="2008-09-19T00:00:00+02:00">18th</abbr>. Discuss topics such as:</p>

        <ul>
          <li>PHP in the Enterprise</li>
          <li>Advanced PHP Programming Techniques</li>
          <li>Scalability</li>
          <li>PHP and RIAs</li>
        </ul>
        <p>Our guest keynote speaker this year is Zak Greant who will be speaking on <q>The Age of Literate Machines</q></p>

        <p>For more information and to register for the biggest PHP even of the year, visit <a href="http://zendcon.com/">http://zendcon.com/</a></p>
      </div>
    
    </div>
</div>

<hr>

<div class="newsItem hentry vevent">
    <div class="newsImage"><?php news_image("http://www.afup.org/", "elephpants.jpg", "elePHPants"); ?></div>
    <h1 class="summary entry-title"><a name="id2008-05-13-1" id="id2008-05-13-1" href="http://www.php.net/archive/2008.php#id2008-05-13-1" rel="bookmark" class="bookmark">Call for PUG, for elePHPants, 2008 generation</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2008-05-13T11:56:55-07:00">[13-May-2008]</abbr>

        <div>
        <p>The elePHPants are now ready to make their 2008 generation.
      PHP User groups, enthusiasts and companies that are interested in
      groups of elePHPants, shall join this year's herd.</p>
        <p>
ElePHPants are a great link of the community, happily promoting your favorite
language in conferences, on work station, baby cribs and other unusual places.
Production prices make it possible for groups to raise funds, entice membership
or simply bring joy and PHP around.
    </p>
        <p>
Pre-register your <a href="http://www.nexen.net/elephpant/2008_en.php">herd of elePHPants</a>
online, for big and small,
and join the <a href="http://www.flickr.com/photos/tags/elephpant/">world of blue elePHPants</a>.
    </p>

      </div>
    
    </div>
</div>

<hr>
<div class="newsItem hentry">
    <div class="newsImage"></div>
    <h1 class="summary entry-title"><a name="id2008-04-22-1" id="id2008-04-22-1" href="http://www.php.net/archive/2008.php#id2008-04-22-1" rel="bookmark" class="bookmark">Google Summer of Code: php.net students</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2008-04-22T20:04:48+02:00">[22-Apr-2008]</abbr>

        <div>
        <p>
  The PHP team is once again proud to participate in the
  <a href="http://code.google.com/soc/">Google Summer of Code</a>.
  Ten students will "flip bits instead of burgers" this summer:
</p>
        <ul>
          <li><span class="vcard"><a href="http://code.google.com/soc/2008/php/appinfo.html?csaid=73D5F5E282F9163F" class="url">Zend LLVM Extension</a> by
    <span class="fn"><span class="given-name">Joonas </span><span class="family-name">Govenius</span></span>,
  </span>

  mentored by
  <span class="vcard"><span class="fn"><span class="given-name">Nuno </span><span class="family-name">Lopes</span></span></span></li>
          <li><span class="vcard"><a href="http://code.google.com/soc/2008/php/appinfo.html?csaid=12A8D27646C9771A" class="url">PHP Optimizer</a> by
    <span class="fn"><span class="given-name">Samuel </span><span class="family-name">Graham Kelly IV</span></span>,
  </span>
  mentored by
  <span class="vcard"><span class="fn"><span class="given-name">Derick </span><span class="family-name">Rethans</span></span></span></li>

          <li><span class="vcard"><a href="http://code.google.com/soc/2008/php/appinfo.html?csaid=3D5258783F22F62C" class="url">PhD (PHP Docbook) Project</a> by
    <span class="fn"><span class="given-name">Rudy </span><span class="family-name">Nappée</span></span>,
  </span>
  mentored by
  <span class="vcard"><span class="fn"><span class="given-name">Hannes </span><span class="family-name">Magnusson</span></span></span></li>
          <li><span class="vcard"><a href="http://code.google.com/soc/2008/php/appinfo.html?csaid=93F63E6C761134FB" class="url">Replace auto* with CMake</a> by
    <span class="fn"><span class="given-name">Alejandro Leiva </span><span class="family-name">Rojas</span></span>,
  </span>

  mentored by
  <span class="vcard"><span class="fn"><span class="given-name">Pierre A. </span><span class="family-name">Joye</span></span></span></li>
          <li><span class="vcard"><a href="http://code.google.com/soc/2008/php/appinfo.html?csaid=F74E5E31D92F95D0" class="url">gsoc:2008 - XDebug</a> by
    <span class="fn"><span class="given-name">Chung-Yang </span><span class="family-name">Lee</span></span>,
  </span>
  mentored by
  <span class="vcard"><span class="fn"><span class="given-name">David </span><span class="family-name">Coallier</span></span></span></li>

          <li><span class="vcard"><a href="http://code.google.com/soc/2008/php/appinfo.html?csaid=435245F847240738" class="url">Rewrite the run-tests.php script</a> by
    <span class="fn"><span class="given-name">Cesar </span><span class="family-name">Montedonico</span></span>,
  </span>
  mentored by
  <span class="vcard"><span class="fn"><span class="given-name">Travis </span><span class="family-name">Swicegood</span></span></span></li>
          <li><span class="vcard"><a href="http://code.google.com/soc/2008/php/appinfo.html?csaid=837287100B93044F" class="url">PHP Bindings for Cairo</a> by
    <span class="fn"><span class="given-name">Akshat </span><span class="family-name">Gupta</span></span>,
  </span>

  mentored by
  <span class="vcard"><span class="fn"><span class="given-name">Anant </span><span class="family-name">Narayanan</span></span></span></li>
          <li><span class="vcard"><a href="http://code.google.com/soc/2008/php/appinfo.html?csaid=25AE6211DDEC86FD" class="url">Algorithm Optimizations</a> by
    <span class="fn"><span class="given-name">Michal </span><span class="family-name">Dziemianko</span></span>,
  </span>
  mentored by
  <span class="vcard"><span class="fn"><span class="given-name">Scott </span><span class="family-name">MacVicar</span></span></span></li>

          <li><span class="vcard"><a href="http://code.google.com/soc/2008/php/appinfo.html?csaid=5A442E6A7568434D" class="url">PECL, Website Improvements</a> by
    <span class="fn"><span class="given-name">Barry </span><span class="family-name">Carlyon</span></span>,
  </span>
  mentored by
  <span class="vcard"><span class="fn"><span class="given-name">Helgi Þormar </span><span class="family-name">Þorbjörnsson</span></span></span></li>
          <li><span class="vcard"><a href="http://code.google.com/soc/2008/php/appinfo.html?csaid=AD4803BA9A70BCB3" class="url">Implement Unicode into PHP 6</a> by
    <span class="fn"><span class="given-name">Henrique do Nascimento </span><span class="family-name">Angelo</span></span>,
  </span>

  mentored by
  <span class="vcard"><span class="fn"><span class="given-name">Scott </span><span class="family-name">MacVicar</span></span></span></li>
        </ul>
        <p><strong>Update (<abbr class="updated" title="2008-05-11T17:48:11+02:00">May 11th</abbr>):</strong>
         Unfortunately <span class="vcard"><span class="fn">Nicholas Sloan</span></span> had to drop out of the
         program, but he will be replaced by <span class="vcard"><span class="fn">Rudy Nappée</span></span> working on the same application.</p>

      </div>
    
    </div>
</div>

<hr>
<div class="newsItem hentry">
    <div class="newsImage"></div>
    <h1 class="summary entry-title"><a name="id2008-05-01-1" id="id2008-05-01-1" href="http://www.php.net/archive/2008.php#id2008-05-01-1" rel="bookmark" class="bookmark">PHP 5.2.6 Released</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2008-05-01T19:27:58-04:00">[01-May-2008]</abbr>

        <div>
        <p>The PHP development team would like to announce the immediateavailability of PHP 5.2.6. This release focuses on improving the stability ofthe PHP 5.2.x branch with over 120 bug fixes, several of which are security related.All users of PHP are encouraged to upgrade to this release.</p>
        <p>        Further details about the PHP 5.2.6 release can be found in the        <a href="/releases/5_2_6.php">release announcement for 5.2.6</a>, the full list of        changes is available in the <a href="/ChangeLog-5.php#5.2.6">ChangeLog for PHP 5</a>.</p>
        <p>
          <b>Security Enhancements and Fixes in PHP 5.2.6:</b>

        </p>
        <ul>
          <li>Fixed possible stack buffer overflow in the FastCGI SAPI identified by Andrei Nigmatulin.</li>
          <li>Fixed integer overflow in printf() identified by Maksymilian Aciemowicz.</li>
          <li>Fixed security issue detailed in CVE-2008-0599 identified by Ryan Permeh.</li>
          <li>Fixed a safe_mode bypass in cURL identified by Maksymilian Arciemowicz.</li>
          <li>Properly address incomplete multibyte chars inside escapeshellcmd() identified by Stefan Esser.</li>

          <li>Upgraded bundled PCRE to version 7.6</li>
        </ul>
        <p><strong>Update (<abbr class="updated" title="2008-05-06T09:56:38+02:00">May 6th</abbr>):</strong> The Windows installers were missing the <a href="/xsl">XSL</a>
         and <a href="/imap">IMAP</a> extensions.</p>

        <p><strong>Update (<abbr class="updated" title="2008-05-03T09:56:38+02:00">May 3rd</abbr>):</strong> The Windows archives were missing the <a href="/xsl">XSL</a>
         and <a href="/imap">IMAP</a> extensions.</p>
      </div>
    
    </div>

</div>

<hr>
<div class="newsItem hentry vevent">
    <div class="newsImage"><?php news_image("http://www.afup.org/", "afup2008.png", "Forum AFUP Paris 2008"); ?></div>
    <h1 class="summary entry-title"><a name="id2008-04-13-2" id="id2008-04-13-2" href="http://www.php.net/archive/2008.php#id2008-04-13-2" rel="bookmark" class="bookmark">Call for speakers for Forum PHP Paris 2008</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2008-04-13T21:56:55-07:00">[13-Apr-2008]</abbr>
        <p>The AFUP, Association Française des Utilisateurs de PHP,
  is proud to announce the upcoming conference "Forum PHP 2008".</p>

      <p>For this unique event in France, we are looking for the best French speaking experts,
  who want to share their know-how and enthusiasm.
  This two day conference features one technical day, with the most advanced PHP techniques
  and a business day, with case studies and examples of successful projects.
</p>
        <ul><li>How to manage a PHP project (tools, methods, ...)</li><li>Insure code quality</li><li>Internet and legal issues (intellectual property, ...)</li><li>Build a business around</li><li>PHP scalibility</li><li>Connect services(web services)</li><li>Rich User Interfaces (technology choice, implementation, ...)</li></ul>
      <h3>Date and location</h3>
      <p>

    The "Forum PHP Paris 2008" will take place in Paris on
    <abbr class="dtstart" title="2008-12-08">8th</abbr>-<abbr class="dtend" title="2008-12-10">9th december 2008</abbr>
  </p>
      <p>Sessions will typically be 45 minutes long followed by a 10 minutes Q&amp;A session and up to
    3 hours for workshops. Use the <a href="http://afup.org/pages/forumphp2008/appel-a-conferenciers.php">form on the site</a>,
    no email proposal will be accepted.</p>
      <p>
    Proposals will be reviewed after the deadline has passed. Additional information may be asked where needed. Proposals will be chosen according to their layout, relevancy for a professional audience and the overall homegeneity of the forum. Every candidate will be personnally notified of the status of their proposal. The decision is final. Priority will be given to sessions in French.
    </p>

    
    </div>
</div>

<hr>
<div class="newsItem hentry vevent">
    <div class="newsImage"><?php news_image("http://www.dcphpconference.com/", "dcphpconference.2008.png", "PHP DC conference 2008"); ?></div>
    <h1 class="summary entry-title"><a name="id2008-04-13-1" id="id2008-04-13-1" href="http://www.dcphpconference.com/" rel="bookmark" class="bookmark">PHP DC conference 2008</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2008-04-13T12:00:00-05:00">[13-Apr-2008]</abbr>
        <div>

        <p>
        The DC PHP Developers Group recently announced Kshemendra Paul as a
    featured keynote speaker at the DC PHP Conference &amp; Expo,
    <abbr class="dtstart" title="2008-06-02">June 2</abbr>-<abbr class="dtend" title="2008-06-05">4</abbr>,
        2008, at George Washington University in Washington, DC. Paul, chief
        architect for the Office of Management and Budget Executive Office of
        the President, will be presenting on "Federal E-Government and
        Enterprise Architecture Updates."
        </p>
        <p>
    Join hundreds of PHP practitioners, business managers, and government
    officials from around the world in the exchange of ideas and solutions
    for building a better web application infrastructure. The DC PHP
    conference will include tracks pertaining to business cases, best
    practices, the art of PHP, PHP applications, PHP in the enterprise,
    and Open Source. The full speaker schedule will be announced shortly.
    </p>
        <p>

    For more information about DC PHP Conference &amp; Expo 2008 and to register,
    please visit <a href="http://www.dcphpconference.com/">www.dcphpconference.com</a>.
    Early discounted registration rates affective until April 15, 2008
    </p>
      </div>
    
    </div>
</div>

<hr>
<div class="newsItem hentry">
    <div class="newsImage"></div>

    <h1 class="summary entry-title"><a name="2008-03-30-1" id="2008-03-30-1" href="http://www.php.net/archive/2008.php#2008-03-30-1" rel="bookmark" class="bookmark">TestFest 2008</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2008-03-30T21:06:55+01:00">[30-Mar-2008]</abbr>
        <div>
        <p>The PHP-QA team would like to announce the
        <a href="http://qa.php.net/testfest.php">TestFest</a> for the month of
        May 2008. The TestFest is an event that aims at improving the
        <a href="http://gcov.php.net">code coverage</a> of the
        <a href="http://qa.php.net/running-tests.php">test suite</a> for the PHP
        language itself. As part of this event, local User Groups (UG) are
        invited to join the TestFest. These UGs can meet physically or come
        together virtually. The point however is that people network to learn
        together. Aside from being an opportunity for all of you to make friends
        with like minded people in your (virtual) community, it also will
        hopefully reduce the work load for the PHP.net mentors.</p>

        <p>All it takes is someone to organize a UG to spearhead the event and
        to get others involved in
        <a href="http://qa.php.net/write-test.php">writing phpt tests</a>.
        The submissions will then be reviewed by members of php.net before
        getting included in the official test suite. Please visit the
        <a href="http://qa.php.net/testfest.php">TestFest homepage</a> to get
        additional details on the TestFest on how to get involved, either as a
        UG or by setting up the necessary infrastructure.</p>
      </div>
    
    </div>
</div>

<hr>
<div class="newsItem hentry">
    <div class="newsImage"></div>
    <h1 class="summary entry-title"><a name="2008-03-19-1" id="2008-03-19-1" href="http://www.php.net/archive/2008.php#2008-03-19-1" rel="bookmark" class="bookmark">Google Summer of Code 2008</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2008-03-19T13:53:55-04:00">[19-Mar-2008]</abbr>
        <div>
        <p>Once again we are glad to announce that we have been accepted to be a Google Summer of Code project. See <a href="http://code.google.com/soc/2008/php/about.html">our program</a> for this year's GSoC.</p>

        <p>We would like to take this opportunity to say thanks to Google Inc. for this privilege to participate once again, and would like to invite everyone to look at our list of ideas: <a href="http://wiki.php.net/gsoc/2008">http://wiki.php.net/gsoc/2008</a>. Students are of course more than welcome to come up with their own ideas for their proposals and we will consider each and every application that we will receive.</p>
        <p>So once again, thanks to everyone who is involved in this magnificent journey and we hope to see many of you great students and open source passionate join us in our most enjoyable <a href="http://code.google.com/soc/2008">Google Summer of Code</a> projects.</p>
      </div>
    
    </div>
</div>

<hr>
<div class="newsItem hentry vevent">
    <div class="newsImage"><?php news_image("http://tek.phparch.com/", "phptek_2008.png", "php|tek 2008: Chicago"); ?></div>
    <h1 class="summary entry-title"><a name="2008-02-19-1" id="2008-02-19-1" href="http://tek.phparch.com/" rel="bookmark" class="bookmark">php|tek 2008: Chicago</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2008-02-19T11:45:00-05:00">[19-Feb-2008]</abbr>
        <div>
        <a href="http://tek.phparch.com/" class="url">php|tek 2008: Chicago</a>

        <p>
The publishers of <a href="http://www.phparch.com/">php|architect Magazine</a> are proud to announce the php|tek 2008 conference in Chicago, Illinois, USA.
</p>
        <p>
The PHP Community meets <abbr class="dtstart" title="2008-05-20">May 20</abbr>-<abbr class="dtend" title="2008-05-24">23</abbr> for one of North America's premier PHP conferences of 2008. Join us to hear <a href="http://tek.phparch.com/c/schedule">top speakers</a> such as Derick Rethans (eZ Systems), Lucas Nelan (Facebook), Chris Shiflett (OmniTI), Eli White (Digg) and yes, even Terry Chay (Tagged).

</p>
        <p>
For the past two years, php|architect's spring conference has sold out <em>weeks</em> before the start date, so if you're interested in attending, don't delay, and be sure to <a href="http://tek.phparch.com/c/p/signup">sign up</a> ASAP!
</p>
      </div>
    
    </div>
</div>

<hr>
<div class="newsItem hentry vevent">
    <div class="newsImage"><?php news_image("http://conf.phpquebec.com/en/conf2008/", "conference_php_quebec.gif", "PHP Québec conference 2008"); ?></div>
    <h1 class="summary entry-title"><a name="2008-02-06-1" id="2008-02-06-1" href="http://conf.phpquebec.com/en/conf2008/" rel="bookmark" class="bookmark">PHP Québec conference 2008</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2008-02-06T19:23:51+01:00">[06-Feb-2008]</abbr>
        <div>
        <a href="http://conf.phpquebec.com/">2008 PHP Quebec Conference &amp; Job Fair</a>

        <p>
The PHP Quebec team is pleased to present the sixth edition of the <a href="http://conf.phpquebec.com" class="url">PHP
Quebec Conference</a>. The Conference will take place in Montreal, Canada,
on <abbr class="dtstart" title="2008-03-12">March 12</abbr> through
<abbr class="dtend" title="2008-03-15">14</abbr>.
</p>
        <p>
Join us for the PHPLabs, 2 days of technical talks, the Open Source Job
Fair &amp; Cocktail. Meet with well know community members such as: John
Coggeshall, Marcus Boerger, Zak Greant, Chris Shiflett, Damien Seguy and
many more.
</p>

        <p>
Take note that online registration ends on March 7th. For more information,
visit the website: <a href="http://conf.phpquebec.com">http://conf.phpquebec.com</a></p>
      </div>
    
    </div>
</div>

<hr>
<div class="newsItem hentry vevent">
    <div class="newsImage"><?php news_image("http://www.phpconference.co.uk/", "phplondon2008.png", "PHP London Conference 08"); ?></div>
    <h1 class="summary entry-title"><a name="2008-01-10-1" id="2008-01-10-1" href="http://www.phpconference.co.uk/" rel="bookmark" class="bookmark">phplondon conference 2008</a></h1>

    <div class="entry-content description">
        <abbr class="published newsdate" title="2008-01-10T16:23:20+01:00">[10-Jan-2008]</abbr>
        <div>
        <p><abbr class="dtstart" title="2008-02-29">February 29th</abbr> (Leap Year Day). phplondon.org  announce their third
            annual <a href="http://www.phpconference.co.uk" title="phplondon.org community conference" class="url">community conference</a>
            to be held at Inmarsat, Old Street, London.</p>
        <p>This year the conference will run two tracks and include speakers such as Derick Rethans, Wez Furlong, Scott MacVicar and Zoe Slattery.</p>

        <p>We will also be holding an extended presentation and discussion on frameworks for PHP.</p>
        <p>Visit our <a href=" http://www.phpconference.co.uk" title="phplondon.org community conference">conference site</a> to register. Early bird discount is available until 1st February 2008.</p>
      </div>
    
    </div>
</div>

<hr>
<div class="newsItem hentry">
    <div class="newsImage"></div>
    <h1 class="summary entry-title"><a name="2008-01-03-1" id="2008-01-03-1" href="http://www.php.net/archive/2008.php#2008-01-03-1" rel="bookmark" class="bookmark">PHP 4.4.8 Released</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2008-01-03T10:13:50+01:00">[03-Jan-2008]</abbr>

        <div>
        <p>
The PHP development team would like to announce the immediate <a href="http://www.php.net/downloads.php#v4">availability of
PHP 4.4.8</a>.  It continues to improve the security and the stability of the 4.4
branch and all users are strongly encouraged to upgrade to it as soon as
possible. This release wraps up all the outstanding patches for the PHP 4.4
series, and is therefore the last normal PHP 4.4 release. If necessary,
releases to address security issues could be made until 2008-08-08.
</p>
        <p>
          <b>Security Enhancements and Fixes in PHP 4.4.8:</b>
        </p>
        <ul>

          <li>Improved fix for MOPB-02-2007.</li>
          <li>Fixed an integer overflow inside chunk_split(). Identified by Gerhard Wagner.</li>
          <li>Fixed integer overlow in str[c]spn().</li>
          <li>Fixed regression in glob when open_basedir is on introduced by #41655 fix.</li>
          <li>Fixed money_format() not to accept multiple %i or %n tokens.</li>
          <li>Added "max_input_nesting_level" php.ini option to limit nesting level of input variables. Fix for MOPB-03-2007.</li>

          <li>Fixed INFILE LOCAL option handling with MySQL - now not allowed when open_basedir or safe_mode is active.</li>
          <li>Fixed session.save_path and error_log values to be checked against open_basedir and safe_mode (CVE-2007-3378).</li>
        </ul>
        <p>
 For a full list of changes in PHP 4.4.8, see the <a href="http://www.php.net/ChangeLog-4.php#4.4.8">ChangeLog</a>.
</p>
      </div>

    
    </div>
</div>

<?php site_footer(array('elephpants' => true, 'sidebar' => $SIDEBAR_DATA));
