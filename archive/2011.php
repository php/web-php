<?php
// $Id: 2010.php 293613 2010-01-16 13:38:42Z bjori $
$_SERVER['BASE_PAGE'] = 'archive/2011.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
news_archive_sidebar();
site_header("News Archive - 2011", array("cache" => true));
?>

<h1>News Archive - 2011</h1>

<p>
 Here are the most important news items we have published in 2011 on PHP.net.
</p>

<hr>
<div class="newsItem hentry">
    <div class="newsImage"></div>
    <h1 class="summary entry-title"><a name="id2011-12-25-1" id="id2011-12-25-1" href="#id2011-12-25-1" rel="bookmark" class="bookmark">PHP 5.4.0 RC4 released</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2011-12-25T01:14:52+01:00">[25-Dec-2011]</abbr>
        <div>
     <p>
       The PHP development team is proud to announce the 4th
       <a href="http://qa.php.net">release candidate</a> of PHP 5.4.
       PHP 5.4 includes new language features and removes several legacy
       (deprecated) behaviours. Windows binaries can be downloaded from the
       <a href="http://windows.php.net/qa/">Windows QA site</a>.
     </p>
     <p>
       <strong>THIS IS A RELEASE CANDIDATE - DO NOT USE IT IN PRODUCTION!</strong>.
     </p>
     <p>
       This is the 4th release candidate. The release candidate phase is intended as
       a period of bug fixing prior to the stable release. No new features should
       be included before the final version of PHP 5.4.0.
     </p>
     <p>
       The new release candidate fixed several bugs, including:
     </p>
     <ul>
       <li>Added max_input_vars directive to prevent attacks based on hash collisions</li>
       <li>Fixed a segfault in the traits code</li>
     </ul>
     <p>
       Read the <a href="https://svn.php.net/repository/php/php-src/tags/php_5_4_0RC4/NEWS">NEWS</a>
       file for a complete list of changes in this release.
     </p>
     <p>
       Please continue to help us to identify bugs in order to ensure that the release is
       solid and all things behave as expected.  Please test this release candidate
       against your code base and report any problems that you encounter to the
       <a href="mailto:php-qa@lists.php.net">QA mailing list</a> and/or the
       <a href="https://bugs.php.net/">PHP bug tracker</a>.
     </p>
     <p>
       The next release candidate will be released in 14 days.
     </p>
    </div>
  
    </div>
</div>

<hr>
<div class="newsItem hentry vevent">
    <div class="newsImage"><?php news_image("http://www.phpconference.nl/", "dpc_2012.png", "Dutch PHP Conference 2012"); ?></div>
    <h1 class="summary entry-title"><a name="id2011-12-23-1" id="id2011-12-23-1" href="http://www.phpconference.nl/" rel="bookmark" class="bookmark">Dutch PHP Conference 2012</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2011-12-23T11:11:49+01:00">[23-Dec-2011]</abbr>
        <div>
     <p>Ibuildings is proud to organise the sixth Dutch PHP Conference on June 8 and 9, plus a pre-conference tutorial day on June 7. Both programs will be completely in English so the only Dutch thing about it is the location. Keywords for these days: Know-how, Technology, Best Practices, Networking, Tips &amp; Tricks.
     </p>
     <p>
         Website: <a href="http://www.phpconference.nl/">http://www.phpconference.nl/</a>
     </p>
    </div>
  
    </div>
</div>

<hr>
<div class="newsItem hentry">
    <div class="newsImage"></div>
    <h1 class="summary entry-title"><a name="id2011-12-14-1" id="id2011-12-14-1" href="#id2011-12-14-1" rel="bookmark" class="bookmark">PHP 5.4.0RC3 released</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2011-12-14T15:43:13+01:00">[14-Dec-2011]</abbr>
        <div>
      <p>
        The PHP development team is proud to announce the third
        <a href="http://qa.php.net">release candidate</a> of PHP 5.4.
        PHP 5.4 includes new language features and removes several legacy 
        (deprecated) behaviours. Windows binaries can be downloaded from the 
        <a href="http://windows.php.net/qa/">Windows QA site</a>.
      </p>
      <p>
        <strong>THIS IS A RELEASE CANDIDATE - DO NOT USE IT IN PRODUCTION!</strong>.
      </p>
      <p>
        This is the third release candidate. The release candidate phase is intended as 
        a period of bug fixing prior to the stable release. No new features should
        be included before the final version of PHP 5.4.0.
      </p>
      <p>
        <strong>Changes since the previous release candidate include:</strong>
      </p>
      <ul>
        <li>The intl extension now supports UTS #46 mapping for IDNA</li>
        <li>$_SERVER['SERVER_NAME'] and $_SERVER['SERVER_PORT'] are now available in the builtin CLI server implementation.</li>
        <li>Several improvements and bug fixes in the Zend Engine, Core and other extensions.</li>
      </ul>
      <p>
        Read the <a href="https://svn.php.net/repository/php/php-src/tags/php_5_4_0RC3/NEWS">NEWS</a>
        file for a complete list of changes in this release.
      </p>
      <p>
        Please continue to help us to identify bugs in order to ensure that the release is
        solid and all things behave as expected.  Please test this release candidate
        against your code base and report any problems that you encounter to the
        <a href="mailto:php-qa@lists.php.net">QA mailing list</a> and/or the
        <a href="https://bugs.php.net/">PHP bug tracker</a>.
      </p>
    </div>
  
    </div>
</div>

<hr>
<div class="newsItem hentry">
    <div class="newsImage"></div>
    <h1 class="summary entry-title"><a name="id2011-11-29-1" id="id2011-11-29-1" href="#id2011-11-29-1" rel="bookmark" class="bookmark">PHP 5.4 RC2 released</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2011-11-29T21:34:29+00:00">[29-Nov-2011]</abbr>
        <div>
      <p>
        The PHP development team is proud to announce the second 
        <a href="http://qa.php.net">release candidate</a> of PHP 5.4.
        PHP 5.4 includes new language features and removes several legacy 
        (deprecated) behaviours. Windows binaries can be downloaded from the 
        <a href="http://windows.php.net/qa/">Windows QA site</a>.
      </p>
      <p>
        <strong>THIS IS A RELEASE CANDIDATE - DO NOT USE IT IN PRODUCTION!</strong>.
      </p>
      <p>
        This is the second release candidate. The release candidate phase is intended as 
        a period of bug fixing prior to the stable release. No new features should
        be included before the final version of PHP 5.4.0.
      </p>
      <p>
        <strong>Changes since the previous release candidate include:</strong>
      </p>
      <ul>
        <li>Further bug fixes in the built-in web server.</li>
        <li>PHP-FPM is no longer marked as EXPERIMENTAL.</li>
        <li>Several improvements and bug fixes in the Zend Engine, Core and other extensions.</li>
      </ul>
      <p>
        Read the <a href="https://svn.php.net/repository/php/php-src/tags/php_5_4_0RC2/NEWS">NEWS</a>
        file for a complete list of changes in this release.
      </p>
      <p>
        Please continue to help us to identify bugs in order to ensure that the release is
        solid and all things behave as expected.  Please test this release candidate
        against your code base and report any problems that you encounter to the
        <a href="mailto:php-qa@lists.php.net">QA mailing list</a> and/or the
        <a href="https://bugs.php.net/">PHP bug tracker</a>.
      </p>
    </div>
  
    </div>
</div>

<hr>
<div class="newsItem hentry vevent">
    <div class="newsImage"><?php news_image("http://www.phpday.it/", "phpday2012.png", "Italian phpDay"); ?></div>
    <h1 class="summary entry-title"><a name="id2011-11-17-1" id="id2011-11-17-1" href="http://www.phpday.it/" rel="bookmark" class="bookmark">Italian phpDay 2012</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2011-11-17T11:05:04+01:00">[17-Nov-2011]</abbr>
        <div>
     <p>
         The <a href="http://www.grusp.it">Italian PHP user group GrUSP</a> is pleased to
         announce the 9th edition of the <a href="http://www.phpday.it">Italian phpDay conference</a>, taking place
         on May 18th and 19th, 2012 in Verona. We will show new development
         traits, best-practices and success cases related to quality, revision
         control, test-driven development, continuous integration and so on.
         There are also talks about design, project management, agile and various
         php-related technologies.
     </p>
     <p>
         phpDay is the first historic Italian conference dedicated solely to PHP
         development, technologies and management. It is aimed to IT managers,
         developers and innovators. Each year it renews the opportunity to link
         to new business partners.
     </p>
     <p>
         The call for papers is open and will run until Feb 28th 2012. For more
         information, please visit our website: <a href="http://www.phpday.it">http://www.phpday.it</a>
     </p>
    </div>
  
    </div>
</div>

<hr>
<div class="newsItem hentry">
    <div class="newsImage"></div>
    <h1 class="summary entry-title"><a name="id2011-11-11-1" id="id2011-11-11-1" href="#id2011-11-11-1" rel="bookmark" class="bookmark">PHP 5.4 RC1 released</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2011-11-11T00:01:11+00:00">[11-Nov-2011]</abbr>
        <div>
     <p>
      The PHP development team is proud to announce the first 
      <a href="http://qa.php.net/">release candidate</a> of PHP 5.4. 
      PHP 5.4 includes new language features and removes several legacy 
      (deprecated) behaviours. Windows binaries can be downloaded from the 
      <a href="http://windows.php.net/qa/">Windows QA site</a>.
     </p>
     <p>
      <strong>THIS IS A RELEASE CANDIDATE - DO NOT USE IT IN PRODUCTION!</strong>
     </p>
     <p>
      This is the first release candidate. No new features will be included 
      before the final version of PHP 5.4.0. The release candidate phase is 
      intended as a period of bug fixing prior to the stable release.
     </p>
     <p>
       <strong>Changes since the last beta version include:</strong>
      </p>
      <ul>
        <li>Added class member access on instantiation (e.g. (new Foo)-&gt;bar()).</li>
        <li>Changed silent conversion of array to string to produce a notice.</li>
        <li>Numerous bug fixes and improvements in the Core and other extensions.</li>
      </ul>
     <p>
      Please help us to identify bugs in order to ensure that the release is solid and 
      all things behave as expected.  Please test this release candidate against your 
      code base and report any problems that you encounter to the 
      <a href="mailto:php-qa@lists.php.net">QA mailing list</a> and/or the 
      <a href="https://bugs.php.net/">PHP bug tracker</a>.
     </p>
     <p>
      Read the <a href="/releases/NEWS_5_4_0_RC1.txt">NEWS</a> file for a 
      complete list of changes in this release.
     </p>
    </div>
  
    </div>
</div>

<hr>
<div class="newsItem hentry">
    <div class="newsImage"></div>
    <h1 class="summary entry-title"><a name="id2011-10-26-1" id="id2011-10-26-1" href="#id2011-10-26-1" rel="bookmark" class="bookmark">PHP 5.4 beta2 released</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2011-10-26T19:16:50+00:00">[26-Oct-2011]</abbr>
        <div>
      <p>
       The PHP development team is proud to announce the second <a href="http://qa.php.net/">beta release</a> of PHP 5.4.
       PHP 5.4 includes new language features and removes several legacy (deprecated) behaviours.
       Windows binaries can be downloaded from the <a href="http://windows.php.net/qa/">Windows QA site</a>.
      </p>
      <p>
       <strong>THIS IS A DEVELOPMENT PREVIEW - DO NOT USE IT IN PRODUCTION!</strong>
      </p>
      <p>
       Please help us to identify bugs by testing new features and looking for
       unintended backward compatibility breaks, so we can fix the problems and
       fully document intended changes before PHP 5.4.0 is released.
       Report findings to the <a href="mailto:php-qa@lists.php.net">QA mailing list</a> and/or
       the <a href="https://bugs.php.net/">PHP bug tracker</a>.
      </p>
      <p>
       This release includes numerous bug fixes and improvements since the first beta release.
      </p>
      <p>
       Read the <a href="/releases/NEWS_5_4_0_beta2.txt">NEWS</a>
       file for a complete list of changes.
      </p>
    </div>
  
    </div>
</div>

<hr>
<div class="newsItem hentry vevent">
    <div class="newsImage"><?php news_image("http://www.phprio.org/phpnrio11", "phpnrio11.png", "PHP'n Rio 11"); ?></div>
    <h1 class="summary entry-title"><a name="id2011-10-06-1" id="id2011-10-06-1" href="http://www.phprio.org/phpnrio11" rel="bookmark" class="bookmark">PHP'n Rio 11</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2011-10-06T16:40:59+02:00">[06-Oct-2011]</abbr>
        <div>
     <p>
               <a href="http://www.phprio.org/">The PHP Rio User Group</a>
               is pleased to announce their third edition of
               the <em>PHP'n Rio</em> conference. It will be held on November 05th,
               2011, at the <a href="http://portal.cefet-rj.br/">CEFET-RJ university</a>,
               Rio de Janeiro. It is a one day conference aimed on providing
               experienced developers and beginners a chance to learn more about PHP
               frameworks, web applications built in PHP, and the art of testing
               code.
           </p>
     
           <p>
               Whether you live here or are around just enjoying the marvelous city,
               come and join us :) For more information, please visit
               <a href="http://www.phprio.org/phpnrio11">
                   http://www.phprio.org/phpnrio11
               </a>
               (Portuguese only).
           </p>
    </div>
  
    </div>
</div>

<hr>
<div class="newsItem hentry vevent">
    <div class="newsImage"><?php news_image("http://www.web-devcon.de", "webdevcon2011.jpg", "Web DevCon 2011"); ?></div>
    <h1 class="summary entry-title"><a name="id2011-09-30-1" id="id2011-09-30-1" href="http://www.web-devcon.de" rel="bookmark" class="bookmark">Web DevCon 2011</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2011-09-30T18:43:17+02:00">[30-Sep-2011]</abbr>
        <div>
     <p>
     The Web DevCon 2011, the conference for web developers, will take place
     from 17th – 18th of October 2011 in the InterContinental in Hamburg
     (Germany). Web DevCon features trends, solutions and know-how for web
     developers: From web technology and web architecture to programming
     languages such as php, java and ruby as well as web frameworks and
     development tools.
     </p>
     <p>
     The event is aimed at web programmers, web designer, webmaster, software
     developers, agencies and project managers from advertising- and media
     agencies.
     </p>
     <p>
     Conference Tickets:
     <ul>
     <li>1-day: € 399,– plus vat/tax before 7th of September 2011
     (later booking € 499,– plus vat/tax)</li>
     <li>2-day: € 699,– plus vat/tax before 7th of September 2011
     (later booking € 799,– plus vat/tax)</li>
     <li>3-day: € 999,– plus vat/tax before 7th of September 2011
     (later booking € 1.099,– plus vat/tax)
     </li>
     </ul>
     </p>
     <p>
     Information and booking via the website: <a href="http://www.web-devcon.de">http://www.web-devcon.de</a>
     </p>
    </div>
  
    </div>
</div>

<hr>
<div class="newsItem hentry">
    <div class="newsImage"></div>
    <h1 class="summary entry-title"><a name="id2011-09-27-1" id="id2011-09-27-1" href="#id2011-09-27-1" rel="bookmark" class="bookmark">PHP 5.4 beta1 released</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2011-09-27T01:05:49+02:00">[27-Sep-2011]</abbr>
        <div>
      <p>
       The PHP development team is proud to announce the first <a href="http://qa.php.net/">beta release</a> of PHP 5.4.
       PHP 5.4 includes new language features and removes several legacy (deprecated) behaviors.
       Windows binaries can be downloaded from the <a href="http://windows.php.net/qa/"> Windows QA site</a>.
      </p>
      <p>
       <strong>THIS IS A DEVELOPMENT PREVIEW - DO NOT USE IT IN PRODUCTION!</strong>
      </p>
      <p>
       New features were added and bugs were fixed since alpha1.
       Please help us to identify bugs by testing new features and looking for
       unintended backward compatability breaks, so we can fix the problems and
       fully document intended changes before PHP 5.4.0 is released.
       Report findings to the <a href="mailto:php-qa@lists.php.net">QA mailing list</a> and/or
       the <a href="https://bugs.php.net/">PHP bug tracker</a>.
      </p>
      <p>
       <strong>Changes since the first alpha version include:</strong>
      </p>
      <ul>
        <li>Added callable typehint.</li>
        <li>Removed the timezone guessing algorithm. "UTC" is now used in case the timezone is not set.</li>
        <li>The mysql, mysqli and pdo_mysql extensions now use mysqlnd by default.</li>
      </ul>
      <p>
        Read the <a href="/releases/NEWS_5_4_0_beta1.txt">NEWS</a>
        file for a complete list of changes.
      </p>
    </div>
  
    </div>
</div>

<hr>
<div class="newsItem hentry vevent">
    <div class="newsImage"><?php news_image("http://phpconference.es/", "PHPBarcelonaConference2011.png", "PHP Barcelona 2011"); ?></div>
    <h1 class="summary entry-title"><a name="id2011-09-15-1" id="id2011-09-15-1" href="http://phpconference.es/" rel="bookmark" class="bookmark">PHP Barcelona 2011</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2011-09-15T08:46:28+02:00">[15-Sep-2011]</abbr>
        <div>
     <p>
     The <a href="http://phpbarcelona.org/">PHP Barcelona User Group</a> is proud
     to announce that the 5th edition of the <a href="http://phpconference.es/">PHP
     Barcelona Conference</a> is here!
     </p>
     
     <p>
     There will be 30 one-hour talks and workshops in two days with three
     parallel tracks, covering many PHP development subjects such as Application
     Scalability, High Performance, Frameworks and IDEs, Continuous Integration,
     Unit Testing, Best Practices, Cloud Computing, and many more topics and
     surprises.
     </p>
     
     <p>
     The conference will take place from the 28th to the 29th of October and will
     bring together <strong>Rasmus Lerdorf</strong>, <strong>Derick
     Rethans</strong>, <strong>Fabien Potencier</strong>, <strong>Marco
     Tabini</strong> and many more of the shiniest names in the industry for two
     fun-packed days of intensive PHP.
     </p>
     
     <p>
     For registration and more info about it, please visit
     <a href="http://phpconference.es/">http://phpconference.es</a>
     </p>
     <p>
     Hope to see you in Barcelona!
     </p>
    </div>
  
    </div>
</div>

<hr>
<div class="newsItem hentry vevent">
    <div class="newsImage"><?php news_image("http://conference.phpbenelux.eu/2012/", "phpbnl2012.png", "PHPBenelux 2012"); ?></div>
    <h1 class="summary entry-title"><a name="id2011-09-12-1" id="id2011-09-12-1" href="http://conference.phpbenelux.eu/2012/" rel="bookmark" class="bookmark">PHPBenelux 2012</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2011-09-12T11:52:55+02:00">[12-Sep-2011]</abbr>
        <div>
     <p>The PHPBenelux Conference is ready for its third edition and takes place
     January 27th &amp; 28th in Antwerp (Belgium). We're
     <a href="http://conference.phpbenelux.eu/2012/call-for-papers/">calling for papers</a>
     until October 15th and we're very much looking forward to your submissions.
     </p>
     <p>
     These are the topics we're aiming for:
     </p>
     
     <ul>
     <li>Content Management Systems</li>
     <li>Cloud</li>
     <li>NoSQL</li>
     <li>Analytics</li>
     <li>Frameworks</li>
     <li>Best practises</li>
     <li>General and in depth programming skills</li>
     <li>HTML5 &amp; co (with a PHP twist)</li>
     </ul>
     
     <p>
     All information about the conference and the CFP can be found on our
     <a href="http://conference.phpbenelux.eu/2012">conference website</a>.
     Schedule and ticket information will be announced early November
     </p>
     
    </div>
  
    </div>
</div>

<hr>
<div class="newsItem hentry">
    <div class="newsImage"></div>
    <h1 class="summary entry-title"><a name="id2011-08-23-1" id="id2011-08-23-1" href="#id2011-08-23-1" rel="bookmark" class="bookmark">PHP 5.3.8 Released!</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2011-08-23T17:08:45+02:00">[23-Aug-2011]</abbr>
        <div>
     <p>The PHP development team would like to announce the immediate
     availability of PHP 5.3.8. This release fixes two issues introduced in
     the PHP 5.3.7 release:</p>
     
     <ul>
         <li>Fixed bug <a href="https://bugs.php.net/bug.php?id=55439">#55439</a> (crypt() returns only the salt for MD5)</li>
         <li>Reverted a change in timeout handling restoring PHP 5.3.6 behavior,
          which caused mysqlnd SSL connections to hang (Bug #55283).</li>
     </ul>
     
     <p>All PHP users should note that the PHP 5.2 series is NOT supported
        anymore. All users are strongly encouraged to upgrade to PHP 5.3.8.</p>

     <p>For a full list of changes in PHP 5.3.8, see the <a href="/ChangeLog-5.php#5.3.8">ChangeLog</a>. For source downloads please
        visit our <a href="/downloads.php">downloads page</a>, Windows binaries
    can be found on <a href="http://windows.php.net/download/">windows.php.net/download/</a>.</p>
    <p>
         <strong>For more details on the crypt() blowfish security issue in pre 5.3.6 see <a href="http://php.net/security/crypt_blowfish">the crypt blowfish page</a></strong>
    </p>
    </div>
  
    </div>
</div>

<hr>
<div class="newsItem hentry">
    <div class="newsImage"></div>
    <h1 class="summary entry-title"><a name="id2011-08-22-1" id="id2011-08-22-1" href="#id2011-08-22-1" rel="bookmark" class="bookmark">5.3.7 upgrade warning</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2011-08-22T10:02:44+02:00">[22-Aug-2011]</abbr>
        <div>
     <p>
         Due to unfortunate issues with 5.3.7 (see <a href="https://bugs.php.net/bug.php?id=55439">bug#55439</a>)
         users should postpone upgrading until 5.3.8 is released (expected in a few days).
     </p>
    </div>
  
    </div>
</div>

<hr>
<div class="newsItem hentry vevent">
    <div class="newsImage"><?php news_image("http://www.zendcon.com/", "zendcon_Logo_2011_225wide.jpg", "ZendCon 2011"); ?></div>
    <h1 class="summary entry-title"><a name="id2011-08-19-1" id="id2011-08-19-1" href="http://www.zendcon.com/" rel="bookmark" class="bookmark">Zend PHP Conference 2011 (ZendCon)</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2011-08-19T12:04:13+02:00">[19-Aug-2011]</abbr>
        <div>
     <p>
     The Zend PHP Conference (ZendCon) is the largest gathering of the PHP Community and brings together PHP developers and IT managers from around the world to discuss PHP best practices and explore new technologies.
     </p>
     
     <p>This year’s conference will be held on October 17-20, 2011 at the Convention Center in Santa Clara, California. The conference will include a variety of technical sessions and in-depth tutorials in the following areas:
     <ul>
     <li>Cloud Computing - build applications, not infrastructure.<br>Learn about the latest developments in PHP Cloud infrastructure, management and application services</li>
     <li>Mobile and User Experience - go beyond the browser<br>Learn how to build engaging mobile apps with the latest PHP technologies and tools</li>
     <li>Enterprise and Professional PHP - master your craft<br>Explore PHP best practices, new technologies and practical tips with industry experts</li>
     </ul>
     </p>
     <p>
     For more details and to register for ZendCon, visit the website at: http://www.zendcon.com/
     </p>
    </div>
  
    </div>
</div>

<hr>
<div class="newsItem hentry">
    <div class="newsImage"></div>
    <h1 class="summary entry-title"><a name="id2011-08-18-1" id="id2011-08-18-1" href="#id2011-08-18-1" rel="bookmark" class="bookmark">PHP 5.3.7 Released!</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2011-08-18T10:02:24-04:00">[18-Aug-2011]</abbr>
        <div>
     <p>The PHP development team would like to announce the immediate
     availability of PHP 5.3.7. This release focuses on improving the
     stability of the PHP 5.3.x branch with over 90 bug fixes, some of which
     are security related.</p>
     
     <p><b>Security Enhancements and Fixes in PHP 5.3.7:</b></p>
     <ul>
         <li>Updated crypt_blowfish to 1.2. (CVE-2011-2483) <a href="http://php.net/security/crypt_blowfish">(more info)</a></li>
         <li>Fixed crash in error_log(). Reported by Mateusz Kocielski</li>
         <li>Fixed buffer overflow on overlog salt in crypt().</li>
         <li>Fixed bug #54939 (File path injection vulnerability in RFC1867 File upload filename). Reported by Krzysztof Kotowicz. (CVE-2011-2202)</li>
         <li>Fixed stack buffer overflow in socket_connect(). (CVE-2011-1938)</li>
         <li>Fixed bug #54238 (use-after-free in substr_replace()). (CVE-2011-1148)</li>
     </ul>
     
     <p><b>Key enhancements in PHP 5.3.7 include:</b></p>
     <ul>
         <li>Upgraded bundled Sqlite3 to version 3.7.7.1</li>
         <li>Upgraded bundled PCRE to version 8.12</li>
         <li>Fixed bug #54910 (Crash when calling call_user_func with unknown function name)</li>
         <li>Fixed bug #54585 (track_errors causes segfault)</li>
         <li>Fixed bug #54262 (Crash when assigning value to a dimension in a non-array)</li>
         <li>Fixed a crash inside dtor for error handling</li>
         <li>Fixed bug #55339 (Segfault with allow_call_time_pass_reference = Off)</li>
         <li>Fixed bug #54935 php_win_err can lead to crash</li>
         <li>Fixed bug #54332 (Crash in zend_mm_check_ptr // Heap corruption)</li>
         <li>Fixed bug #54305 (Crash in gc_remove_zval_from_buffer)</li>
         <li>Fixed bug #54580 (get_browser() segmentation fault when browscap ini directive is set through php_admin_value)</li>
         <li>Fixed bug #54529 (SAPI crashes on apache_config.c:197)</li>
         <li>Fixed bug #54283 (new DatePeriod(NULL) causes crash).</li>
         <li>Fixed bug #54269 (Short exception message buffer causes crash)</li>
         <li>Fixed Bug #54221 (mysqli::get_warnings segfault when used in multi queries)</li>
         <li>Fixed bug #54395 (Phar::mount() crashes when calling with wrong parameters)</li>
         <li>Fixed bug #54384 (Dual iterators, GlobIterator, SplFileObject and SplTempFileObject crash when user-space classes don't call the parent constructor)</li>
         <li>Fixed bug #54292 (Wrong parameter causes crash in SplFileObject::__construct())</li>
         <li>Fixed bug #54291 (Crash iterating DirectoryIterator for dir name starting with \0)</li>
         <li>Fixed bug #54281 (Crash in non-initialized RecursiveIteratorIterator)</li>
         <li>Fixed bug #54623 (Segfault when writing to a persistent socket after closing a copy of the socket)</li>
         <li>Fixed bug #54681 (addGlob() crashes on invalid flags)</li>
         <li>Over 80 other bug fixes.</li>
     </ul>
     
     <p>Windows users: please mind that we do no longer provide builds created
     with Visual Studio C++ 6. It is impossible to maintain a high quality
     and safe build of PHP for Windows using this unmaintained compiler.</p>
     
     <p>For Apache SAPIs (php5_apache2_2.dll), be sure that you use a Visual
     Studio C++ 9 version of Apache. We recommend the Apache builds as provided
     by <a href="http://www.apachelounge.com/">ApacheLounge</a>. For any other
     SAPI (CLI, FastCGI via mod_fcgi, FastCGI with IIS or other FastCGI capable
     server), everything works as before. Third party extension providers
     must rebuild their extensions to make them compatible and loadable with
     the Visual Studio C++9 builds that we now provide.</p>
     
     <p>All PHP users should note that the PHP 5.2 series is NOT supported
     anymore. All users are strongly encouraged to upgrade to PHP 5.3.7.</p>
    </div>

    <p xmlns="http://www.w3.org/2005/Atom">For a full list of changes in PHP 5.3.7, see the
     <a href="/ChangeLog-5.php#5.3.7">ChangeLog</a>. For source downloads
     please visit our <a href="/downloads.php">downloads page</a>, Windows
     binaries can be found on <a href="http://windows.php.net/download/">windows.php.net/download/</a>.</p>
  
    </div>
</div>

<hr>
<div class="newsItem hentry vevent">
    <div class="newsImage"><?php news_image("http://confoo.ca/en", "confoo2012.gif", "ConFoo 2012"); ?></div>
    <h1 class="summary entry-title"><a name="id2011-08-11-1" id="id2011-08-11-1" href="http://confoo.ca/en" rel="bookmark" class="bookmark">ConFoo 2012</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2011-08-11T18:10:12+02:00">[11-Aug-2011]</abbr>
        <div>
     <p>We just launched ConFoo 2012 edition and are presently calling for papers.
     We are looking for the best speakers willing to share their skills and
     experience with developers and managers. ConFoo is a community driven
     conference dedicated to Web technologies.</p>
     
     <p>The conference will be held in Montreal from February 29th to March 2nd,
     2012 at the prestigious Hotel Hilton Bonaventure. We will also have two days
     of private training. The topics will be revealed later this year.</p>
     
     <p>Talk proposals must be received by September 2nd and may be written in English
     or French.</p>
     
     <p>For more information and updates, visit our Website:
     <a href="http://confoo.ca/en">http://confoo.ca/en</a>.</p>
    </div>
  
    </div>
</div>

<hr>
<div class="newsItem hentry">
    <div class="newsImage"></div>
    <h1 class="summary entry-title"><a name="id2011-06-28-1" id="id2011-06-28-1" href="#id2011-06-28-1" rel="bookmark" class="bookmark">PHP 5.4 alpha1 released</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2011-06-28T23:34:42+02:00">[28-Jun-2011]</abbr>
        <div> 
     <p>
      The PHP development team is proud to announce the first PHP 5.4 <a href="http://qa.php.net/">alpha release</a>.
      PHP 5.4 includes new language features and removes several legacy (deprecated) behaviors.
      Read the <a href="/releases/NEWS_5_4_0_alpha1.txt">NEWS</a>
      file for a complete list of changes.
     </p>
     <p>
      <strong>THIS IS A DEVELOPMENT PREVIEW - DO NOT USE IT IN PRODUCTION!</strong>
     </p>
     <p>
      This alpha release exists to encourage users to identify bugs, and
      to ensure that all new features and backward compatibility breaks are evaluated
      and documented before PHP 5.4.0 is released. Please report findings to
      the <a href="mailto:php-qa@lists.php.net">QA mailing list</a> and/or
      the <a href="https://bugs.php.net/">PHP bug tracker</a>. Windows binaries
      can be downloaded from the <a href="http://windows.php.net/qa/">
      Windows QA site</a>.
     </p> 
     <p>
      Here is an incomplete list of changes:
     </p>
     <ul> 
       <li>Added: Traits language construct</li>
       <li>Added: Array dereferencing support</li>
       <li>Added: DTrace support</li>
       <li>Improved: Improved Zend Engine memory usage and performance</li>
       <li>Moved: ext/sqlite moved to pecl (sqlite3 support is still built-in)</li>
     </ul>
     <p>
      Please note that some legacy features have been removed, including:
     </p>
     <ul>
       <li>Removed: break/continue $var syntax</li>
       <li>Removed: register_globals, allow_call_time_pass_reference, and register_long_arrays ini options</li>
       <li>Removed: session_is_registered(), session_registered(), and session_unregister()</li>
     </ul>
     <p>
         This is the first release that adopts the
         <a href="https://wiki.php.net/rfc/releaseprocess/">releaseprocess RFC</a>.
         The next alpha will be released within four weeks. The PHP 5.4 feature
         set and API has not been finalized.
     </p> 
    </div> 
  
    </div>
</div>

<hr>
<div class="newsItem hentry">
    <div class="newsImage"></div>
    <h1 class="summary entry-title"><a name="id2011-06-25-1" id="id2011-06-25-1" href="#id2011-06-25-1" rel="bookmark" class="bookmark">PHP Documentation update</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2011-06-25T15:05:28-07:00">[25-Jun-2011]</abbr>
        <div>

     <p>
      PHP has several new documentation features that the community should be aware of:
     </p>
     <ul>
     <li>pman - PHP man pages
     <ul>
     <li>$ pear install doc.php.net/pman</li>
     <li>$ pman strlen (this example displays a local textual version of the strlen docs)</li>
     </ul>
     </li>
     <li>Enhanced CHM - contains user notes (over 25,000)
     <ul>
     <li>This additional CHM file is <a href="/download-docs.php">downloadable</a></li>
     </ul>
     </li>
     <li>Online Documentation Editor - allows everyone to edit the PHP manual
     <ul>
     <li>URL: <a href="https://edit.php.net/">https://edit.php.net/</a></li>
     <li>Every manual page will link to it in the future</li>
     <li>Includes an IRC window to the #php.doc channel, so let's talk</li>
     </ul>
     </li>
     </ul>
     <p>
      We hope you find the above features useful, and please write <a href="mailto:phpdoc@lists.php.net">phpdoc@lists.php.net</a> with feedback.
      Additional features are being refined, which includes a JSON version of the manual.
     </p>

    </div>
  
    </div>
</div>

<hr>
<div class="newsItem hentry vevent">
    <div class="newsImage"><?php news_image("http://2011.osidays.com/blog/php-days-call-paper", "OSIDays2011.png", "PHP Days | OSI Days"); ?></div>
    <h1 class="summary entry-title"><a name="id2011-06-10-1" id="id2011-06-10-1" href="http://2011.osidays.com/blog/php-days-call-paper" rel="bookmark" class="bookmark">PHP Days | OSI Days</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2011-06-10T06:33:32-07:00">[10-Jun-2011]</abbr>
        <div>
     <p>
     Come and speak at PHP Days, co-organized with OSI Days which will be held in
     Bangalore, India on 20-21 November 2011. This year will be the 8th edition of
     OSI Days.  This special conference is designed to bring focused attention to
     PHP.  The last day of submission is June 20, 2011.  This edition of <em>PHP Days
     | OSI Days</em> will have special focus on:
     </p>
     <ul>
      <li>Enterprise and Professional PHP</li>
      <li>Quality Management in PHP</li>
      <li>PHP in Cloud</li>
     </ul>
     <p>
      <a href="http://2011.osidays.com/blog/php-days-call-paper">Submit a proposal now!</a>
     </p>
    </div>
  
    </div>
</div>

<hr>
<div class="newsItem hentry vevent">
    <div class="newsImage"><?php news_image("http://conference.phpnw.org.uk/phpnw11/", "phpnw11_200x66.png", "PHPNW11"); ?></div>
    <h1 class="summary entry-title"><a name="id2011-05-30-1" id="id2011-05-30-1" href="http://conference.phpnw.org.uk/phpnw11/" rel="bookmark" class="bookmark">PHP North West, 2011</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2011-05-30T15:59:07+02:00">[30-May-2011]</abbr>
        <div>
     <p>The <a href="http://conference.phpnw.org.uk/phpnw11/">PHP North West
     conference</a> returns in 2011 with the usual great selection of
     technical content for you to enjoy!</p>
     <p>
     We're at Ramada Hotel on Picadilly Gardens right in the centre of
     Manchester on October 8th and 9th (Saturday and Sunday) with some
     excellent talks.  For those looking for more in-depth technical
     learning, we're adding a tutorial day this year; join us on Friday 7th
     October for a full day of workshop format sessions with industry
     leaders - and every ticket includes a pass to the main conference!
     </p>
     <p>
     Our call for papers runs until June 12th 2011, and whether you join us
     as a speaker, a sponsor, or an attendee, we know you'll have a great
     time.  PHPNW is a fun weekend of PHP and technology with an excellent
     crowd to hang out with - hope to see you there :)
     </p>
    </div>
  
    </div>
</div>

<hr>
<div class="newsItem hentry vevent">
    <div class="newsImage"><?php news_image("http://www.phpconference.nl/", "dpc11_banner.png", "Dutch PHP Conference 2011"); ?></div>
    <h1 class="summary entry-title"><a name="id2011-04-06-1" id="id2011-04-06-1" href="http://www.phpconference.nl/" rel="bookmark" class="bookmark">Dutch PHP Conference 2011</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2011-04-06T16:07:54+02:00">[06-Apr-2011]</abbr>
        <div>
     <p>
     Ibuildings is proud to organise the fifth <a href="http://www.phpconference.nl/">Dutch PHP Conference</a> on May 20 and 21, plus a pre-conference tutorial day on May 19.
     </p>
     <p>
     Both programs will be completely in English so the only Dutch thing about it is the location. <br>
     Keywords for these days: Know-how, Technology, Best Practices, Networking, Tips &amp; Tricks.
     </p>
    </div>
  
    </div>
</div>

<hr>
<div class="newsItem hentry vevent">
    <div class="newsImage"><?php news_image("http://www.phpday.it/", "phpday2011.png", "Italian phpDay"); ?></div>
    <h1 class="summary entry-title"><a name="id2011-04-04-1" id="id2011-04-04-1" href="http://www.phpday.it/" rel="bookmark" class="bookmark">Italian phpDay 2011</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2011-04-04T17:23:04+02:00">[04-Apr-2011]</abbr>
        <div>
     <p>
     The <a href="http://www.grusp.it">Italian PHP user group GrUSP</a> is pleased to
     announce the 8th edition of the <a href="http://www.phpday.it">Italian phpDay</a>
     conference, taking place from May 12th to 14th, 2011 in Verona. We will
     show new development traits, best-practices and success cases related to
     quality, revision control, test-driven development, continuous
     integration and so on. There are also talks about design, project
     management, agile and various php-related technologies.
     </p>
     
     <p>
     phpDay is the first historic Italian conference dedicated solely to PHP
     development, technologies and management. It is aimed to IT managers,
     developers and innovators. Each year it renews the opportunity to link
     to new business partners.
     </p>
     
     <p>
     <a href="http://www.phpday.it">phpDay</a> introduces the most important
     international PHP gurus to italian
     and european developers. Tree tracks, three days of talks and workshops:
     you can learn best-practices, good methodologies, case histories about
     quality assurance, and have a broader view on development and innovation
     with PHP.
     </p>
    </div>
  
    </div>
</div>

<hr>
<div class="newsItem hentry">
    <div class="newsImage"></div>
    <h1 class="summary entry-title"><a name="id2011-03-19-1" id="id2011-03-19-1" href="#id2011-03-19-1" rel="bookmark" class="bookmark">php.net security notice</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2011-03-19T11:20:04-07:00">[19-Mar-2011]</abbr>
        <div>
     <p>The wiki.php.net box was compromised and the attackers were able to
     collect wiki account credentials. No other machines in the php.net
     infrastructure appear to have been affected. Our biggest concern is,
     of course, the integrity of our source code. We did an extensive code
     audit and looked at every commit since 5.3.5 to make sure that no stolen
     accounts were used to inject anything malicious. Nothing was found.
     The compromised machine has been wiped and we are forcing a password
     change for all svn accounts.</p>
     
     <p>We are still investigating the details of the attack which combined a
     vulnerability in the Wiki software with a Linux root exploit.</p>
    </div>
  
    </div>
</div>

<hr>
<div class="newsItem hentry">
    <div class="newsImage"></div>
    <h1 class="summary entry-title"><a name="id2011-03-17-1" id="id2011-03-17-1" href="#id2011-03-17-1" rel="bookmark" class="bookmark">PHP 5.3.6 Released!</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2011-03-17T13:43:21+00:00">[17-Mar-2011]</abbr>
        <div>
     <p>The PHP development team would like to announce the immediate
     availability of PHP 5.3.6. This release focuses on improving the
     stability of the PHP 5.3.x branch with over 60 bug fixes, some of which
     are security related.</p>
     
     <p><b>Security Enhancements and Fixes in PHP 5.3.6:</b></p>
     <ul>
     <li>Enforce security in the fastcgi protocol parsing with fpm SAPI.</li>
     <li>Fixed bug #54247 (format-string vulnerability on Phar). (CVE-2011-1153)</li>
     <li>Fixed bug #54193 (Integer overflow in shmop_read()). (CVE-2011-1092)</li>
     <li>Fixed bug #54055 (buffer overrun with high values for precision ini setting).</li>
     <li>Fixed bug #54002 (crash on crafted tag in exif). (CVE-2011-0708)</li>
     <li>Fixed bug #53885 (ZipArchive segfault with FL_UNCHANGED on empty archive). (CVE-2011-0421)</li>
     </ul>
     
     <p><b>Key enhancements in PHP 5.3.6 include:</b></p>
     <ul>
     <li>Upgraded bundled Sqlite3 to version 3.7.4.</li>
     <li>Upgraded bundled PCRE to version 8.11.</li>
     <li>Added ability to connect to HTTPS sites through proxy with basic authentication using stream_context/http/header/Proxy-Authorization.</li>
     <li>Added options to debug backtrace functions.</li>
     <li>Changed default value of ini directive serialize_precision from 100 to 17.</li>
     <li>Fixed Bug #53971 (isset() and empty() produce apparently spurious runtime error).</li>
     <li>Fixed Bug #53958 (Closures can't 'use' shared variables by value and by reference).</li>
     <li>Fixed bug #53577 (Regression introduced in 5.3.4 in open_basedir with a trailing forward slash).</li>
     <li>Over 60 other bug fixes.</li>
     </ul>
     
     <p>Windows users: please mind that we do no longer provide builds created
     with Visual Studio C++ 6. It is impossible to maintain a high quality
     and safe build of PHP for Windows using this unmaintained compiler.
     </p>
     
     <p>For Apache SAPIs (php5_apache2_2.dll), be sure that you use a Visual
     Studio C++ 9 version of Apache. We recommend the Apache builds as provided
     by <a href="http://www.apachelounge.com/">ApacheLounge</a>. For any other SAPI (CLI,
     FastCGI via mod_fcgi, FastCGI with IIS or other FastCGI capable
     server), everything works as before. Third party extension providers
     must rebuild their extensions to make them compatible and loadable with
     the Visual Studio C++ 9 builds that we now provide.
     </p>
     
     <p>All PHP users should note that the PHP 5.2 series is NOT supported anymore. All users
     are strongly encouraged to upgrade to PHP 5.3.6.</p>

     <p>For a full list of changes in PHP 5.3.6, see the
     <a href="/ChangeLog-5.php#5.3.6">ChangeLog</a>. For source downloads
     please visit our <a href="/downloads.php">downloads page</a>, Windows
     binaries can be found on <a href="http://windows.php.net/download/">windows.php.net/download/</a>.</p>
    </div>
  
    </div>
</div>

<hr>
<div class="newsItem hentry vevent">
    <div class="newsImage"><?php news_image("http://phpcon.org/", "phpcomcon2011.jpg", "PHP Community Conference"); ?></div>
    <h1 class="summary entry-title"><a name="id2011-03-03-1" id="id2011-03-03-1" href="http://phpcon.org/" rel="bookmark" class="bookmark">PHP Community Conference</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2011-03-03T04:05:38+00:00">[03-Mar-2011]</abbr>
        <div>
      <p>
        The <a href="http://phpcon.org/">PHP Community Conference</a> is
        a conference by and for the PHP community. It's for people who care
        about PHP and what they make with it.
      </p>
      <p>
        Inspired by conferences like <a href="http://www.webstock.org.nz/">Webstock</a>
        and <a href="http://brooklynbeta.org/">Brooklyn Beta</a>, we want
        to make a friendly conference for us. Together with our friends and
        peers, we (<a href="http://twitter.com/ramsey">Ben</a>,
        <a href="http://twitter.com/lisamusing">Lisa</a>, and
        <a href="http://twitter.com/NickASloan">Nick</a>) aim to inspire you
        to make great things with PHP.
      </p>
      <p>
        The PHP Community Conference is a two-day event, taking place April
        21st and 22nd, 2011 in Nashville, TN. We have an
        <a href="http://phpcon.org/speakers">awesome line-up of speakers</a>,
        including a keynote address by <strong>Rasmus Lerdorf</strong>.
      </p>
      <p>
        We'll kick things off with a tutorial day that will introduce you
        to tools and ideas that you can use in your code right away. The
        second day will consist of presentations that will inspire you to
        create something new with PHP. With the help of our sponsors, we
        are able to offer admission to the entire event for $350 USD. We'll
        provide lunch and snacks on both days. On Friday night, we'll
        finish off the conference with a party featuring
        <a href="http://en.wikipedia.org/wiki/Pecha_Kucha">pecha kucha</a>
        talks by our awesome attendees.
      </p>
      <p>
        For more information and to register, check out our website at
        <a href="http://phpcon.org/">phpcon.org</a>.
      </p>
      <p>
        See you in Nashville!
      </p>
    </div>
  
    </div>
</div>

<hr>
<div class="newsItem hentry">
    <div class="newsImage"></div>
    <h1 class="summary entry-title"><a name="id2011-01-06-1" id="id2011-01-06-1" href="#id2011-01-06-1" rel="bookmark" class="bookmark">PHP 5.3.5 and 5.2.17 Released!</a></h1>
    <div class="entry-content description">
        <abbr class="published newsdate" title="2011-01-06T13:34:56-08:00">[06-Jan-2011]</abbr>
        <div>
    <p>
     The PHP development team would like to announce the immediate
     availability of PHP <a href="/releases/5_3_5.php">5.3.5</a> and <a href="/releases/5_2_17.php">5.2.17</a>.
    </p>
    <p>
     This release resolves a critical issue, reported as PHP bug #53632 and
     CVE-2010-4645, where conversions from string to double might cause the PHP
     interpreter to hang on systems using x87 FPU registers.
    </p>
    <p>
     The problem is known to only affect x86 32-bit PHP processes, regardless
     of whether the system hosting PHP is 32-bit or 64-bit. You can test
     whether your system is affected by running <a href="/distributions/test_bug53632.txt">this script</a>
     from the command line.
    </p>
    <p>
     All users of PHP are strongly advised to update to these versions
     immediately.
    </p>
    </div>
  
    </div>
</div>

<?php site_footer(array('elephpants' => true, 'sidebar' => $SIDEBAR_DATA));
