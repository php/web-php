<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'archive/2010.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
news_archive_sidebar();
site_header("News Archive - 2010", array("cache" => true));
?>

<h1>News Archive - 2010</h1>

<p>
 Here are the most important news items we have published in 2010 on PHP.net.
</p>

<hr>
<div class="newsItem hentry"> 
    <div class="newsImage"></div> 
    <h1 class="summary entry-title"><a name="id2010-12-16-1" id="id2010-12-16-1" href="http://www.php.net/archive/2010.php#id2010-12-16-1" rel="bookmark" class="bookmark">PHP 5.2.16 Released!</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2010-12-16T00:22:44-05:00">[16-Dec-2010]</abbr> 
        <div> 
     <p> 
     The PHP development team would like to announce the immediate
     availability of PHP 5.2.16. This release marks the end of support
     for PHP 5.2. All users of PHP 5.2 are encouraged to upgrade to PHP 5.3.
     </p> 
     
     <p> 
     This release focuses on addressing a regression in open_basedir implementation
     introduced in 5.2.15 in addition to fixing a crash inside PDO::pgsql
     on data retrieval when the server is down. All users who have upgraded to 5.2.15 and are
     utilizing open_basedir are strongly encouraged to upgrade to 5.2.16 or 5.3.4.
     </p> 
     
     <p>To prepare for upgrading to PHP 5.3, now that PHP 5.2's support ended, a
     migration guide available on <a href="/migration53">http://php.net/migration53</a>, details the changes between
     PHP 5.2 and PHP 5.3.</p> 
     
     <p>For a full list of changes in PHP 5.2.16 see the ChangeLog at
     <a href="/ChangeLog-5.php#5.2.16">http://www.php.net/ChangeLog-5.php#5.2.16</a>.</p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry"> 
    <div class="newsImage"></div> 
    <h1 class="summary entry-title"><a name="id2010-12-10-1" id="id2010-12-10-1" href="http://www.php.net/archive/2010.php#id2010-12-10-1" rel="bookmark" class="bookmark">PHP 5.3.4 Released!</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2010-12-10T01:19:36+01:00">[10-Dec-2010]</abbr> 
        <div> 
     <p> 
     The PHP development team is proud to announce the immediate release of PHP
     5.3.4. This is a maintenance release in the 5.3 series, which includes a
     large number of bug fixes.
     </p> 
     
     <p> 
     <b>Security Enhancements and Fixes in PHP 5.3.4:</b> 
     </p> 
     <ul> 
       <li>Fixed crash in zip extract method (possible CWE-170).</li> 
       <li>Paths with NULL in them (foo\0bar.txt) are now considered as invalid (CVE-2006-7243).</li> 
       <li>Fixed a possible double free in imap extension (Identified by Mateusz
         Kocielski). (CVE-2010-4150).</li> 
       <li>Fixed NULL pointer dereference in ZipArchive::getArchiveComment.
         (CVE-2010-3709).</li> 
       <li>Fixed possible flaw in open_basedir (CVE-2010-3436).</li> 
       <li>Fixed MOPS-2010-24, fix string validation. (CVE-2010-2950).</li> 
       <li>Fixed symbolic resolution support when the target is a DFS share.</li> 
       <li>Fixed bug #52929 (Segfault in filter_var with FILTER_VALIDATE_EMAIL with
         large amount of data) (CVE-2010-3710).</li> 
     </ul> 
     
     <p> 
     <b>Key Bug Fixes in PHP 5.3.4 include:</b> 
     </p> 
     <ul> 
       <li>Added stat support for zip stream.</li> 
       <li>Added follow_location (enabled by default) option for the http stream
         support.</li> 
       <li>Added a 3rd parameter to get_html_translation_table. It now takes a charset hint, like htmlentities et al.</li> 
       <li>Implemented FR #52348, added new constant ZEND_MULTIBYTE to detect
         zend multibyte at runtime.</li> 
       <li>Multiple improvements to the FPM SAPI.</li> 
       <li>Over 100 other bug fixes.</li> 
     </ul> 
     
     <p> 
     For users upgrading from PHP 5.2 there is a migration guide
     available <a href="http://php.net/migration53">here</a>, detailing
     the changes between those releases and PHP 5.3.
     </p> 
     
     <p> 
      For a full list of changes in PHP 5.3.4, see the
      <a href="/ChangeLog-5.php#5.3.4">ChangeLog</a>. For source downloads
      please visit our <a href="/downloads.php">downloads page</a>, Windows
      binaries can be found on <a href="http://windows.php.net/download/">windows.php.net/download/</a>.
     </p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry"> 
    <div class="newsImage"></div> 
    <h1 class="summary entry-title"><a name="id2010-12-09-1" id="id2010-12-09-1" href="http://www.php.net/archive/2010.php#id2010-12-09-1" rel="bookmark" class="bookmark">PHP 5.2.15 Released!</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2010-12-09T15:29:10-05:00">[09-Dec-2010]</abbr> 
        <div> 
     <p> 
     The PHP development team would like to announce the immediate
     availability of PHP 5.2.15. This release marks the end of support
     for PHP 5.2. All users of PHP 5.2 are encouraged to upgrade to PHP 5.3.
     </p> 
     
     <p> 
     This release focuses on improving the security and stability of the
     PHP 5.2.x branch with a small number, of predominatly security fixes.
     </p> 
     
     <p> 
     <b>Security Enhancements and Fixes in PHP 5.2.15:</b> 
     </p> 
     <ul> 
         <li>Fixed extract() to do not overwrite $GLOBALS and $this when using EXTR_OVERWRITE.</li> 
         <li>Fixed crash in zip extract method (possible CWE-170).</li> 
         <li>Fixed a possible double free in imap extension.</li> 
         <li>Fixed possible flaw in open_basedir (CVE-2010-3436).</li> 
         <li>Fixed NULL pointer dereference in ZipArchive::getArchiveComment. (CVE-2010-3709).</li> 
         <li>Fixed bug #52929 (Segfault in filter_var with FILTER_VALIDATE_EMAIL with large amount of data).</li> 
     </ul> 
     
     <p> 
     <b>Key enhancements in PHP 5.2.15 include:</b> 
     </p> 
     <ul> 
         <li>Fixed bug #47643 (array_diff() takes over 3000 times longer than php 5.2.4).</li> 
         <li>Fixed bug #44248 (RFC2616 transgression while HTTPS request through proxy with SoapClient object).</li> 
     </ul> 
     
     <p>To prepare for upgrading to PHP 5.3, now that PHP 5.2's support ended, a
     migration guide available on <a href="/migration53">http://php.net/migration53</a>, details the changes between
     PHP 5.2 and PHP 5.3.</p> 
     
     <p>For a full list of changes in PHP 5.2.15 see the ChangeLog at
     <a href="http://www.php.net/ChangeLog-5.php#5.2.15">http://www.php.net/ChangeLog-5.php#5.2.15</a>.</p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry vevent"> 
    <div class="newsImage"><?php news_image("http://www.confoo.ca/", "logo_confoo_300_95.gif", "Confoo"); ?></div> 
    <h1 class="summary entry-title"><a name="id2010-11-08-1" id="id2010-11-08-1" href="http://confoo.ca/" rel="bookmark" class="bookmark">Confoo</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2010-11-08T20:05:56-02:00">[08-Nov-2010]</abbr> 
        <p> 
        <a href="http://www.phpquebec.org/">PHP Quebec</a> is pleased to announce the 2011 edition of the <a href="http://confoo.ca/">http://confoo.ca/</a> Conference.
        The Conference will take place in Montréal, Québec, Canada between March 9 and
        11th 2011. We are looking for speakers willing to share their expertise with
        Canadian and United States PHP professionals programmers and managers.
      </p> 
 
      <p> 
        The Conference features technical one hour talks dedicated many aspects of
        Web development such as mobile apps, security, databases, cloud, web standards,
        accessibility, project management, agile methods, CMS &amp; Frameworks, startups
        and of course, PHP.
      </p> 
 
      <p> 
        Organizers will prioritize new and original topics in English or French.
        For more information, visit the website: <a href="http://confoo.ca/">http://confoo.ca/</a> 
      </p> 
 
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry vevent"> 
    <div class="newsImage"><?php news_image("http://www.phprio.org/phpnrio10", "phpnrio10.png", "PHP'n Rio 10"); ?></div> 
    <h1 class="summary entry-title"><a name="id2010-11-02-1" id="id2010-11-02-1" href="http://www.phprio.org/phpnrio10" rel="bookmark" class="bookmark">PHP'n Rio 10</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2010-11-02T20:05:56-02:00">[02-Nov-2010]</abbr> 
        <p> 
          <a href="http://www.phprio.org/">The PHP Rio User Group</a> 
          is pleased to announce their second edition of
          the <em>PHP'n Rio</em> conference. It will be held on November 20th,
          2010, at the <a href="http://www.puc-rio.br/">PUC Rio university</a>,
          Rio de Janeiro. It is a one day conference aimed on providing
          experienced developers and beginners a chance to learn more about PHP
          frameworks, web applications built in PHP, and the art of testing
          code.
      </p> 
 
      <p> 
          No fees or subscription required. Participation is entirely free!
      </p> 
 
      <p> 
          Whether you live here or are around just enjoying the marvelous city,
          come and join us :) For more information, please visit
          <a href="http://www.phprio.org/phpnrio10"> 
              http://www.phprio.org/phpnrio10
          </a> 
          (Portuguese only).
      </p> 
 
 
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry vevent"> 
    <div class="newsImage"><?php news_image("http://www.zendcon.com/", "zend_phpconf10.jpg", "Zend / PHP Conference"); ?></div> 
    <h1 class="summary entry-title"><a name="id2010-09-30-1" id="id2010-09-30-1" href="http://www.zendcon.com/" rel="bookmark" class="bookmark">Zend / PHP Conference</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2010-09-30T15:27:22+08:00">[30-Sep-2010]</abbr> 
        <div> 
     <p> 
         The 6th Annual Zend/PHP Conference will bring together PHP developers and
         IT managers from around the world to discuss PHP best practices and explore
         new technologies.
     </p> 
     
     <p> 
         At ZendCon, you'll learn from a variety of technical sessions in 9 tracks,
         renowned speakers, in-depth tutorials, an Exhibit Hall featuring industry
         leaders and unique networking opportunities.
     </p> 
     
     <ul> 
         <li> 
             Learn PHP best practices for architecture, design and development
         </li> 
         <li> 
             Discover new advances in the PHP language and how to best harness them
         </li> 
         <li> 
             Gain insights from peers, PHP luminaries, community members and
             thought-leaders
         </li> 
         <li> 
             Discover how to deploy and scale large PHP applications
         </li> 
         <li> 
             Explore new technologies like NoSQL and Cloud Computing
         </li> 
         <li> 
             Learn how to effectively leverage Zend Framework and the changes coming
             in Zend Framework 2.0
         </li> 
     </ul> 
     
     <p> 
         Register now so you don't miss out on the most popular tutorials and
         savings.  And join us at the 2010 Zend/PHP Conference - the largest
         gathering of the PHP community!
     </p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry vevent"> 
    <div class="newsImage"><?php news_image("http://phpconference.es/", "barcelona2010.png", "PHP Barcelona Conference 2010"); ?></div> 
    <h1 class="summary entry-title"><a name="id2010-09-25-2" id="id2010-09-25-2" href="http://phpconference.es/" rel="bookmark" class="bookmark">PHP Barcelona Conference 2010</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2010-09-25T13:30:45+02:00">[25-Sep-2010]</abbr> 
        <div> 
     <p>The <a href="http://phpbarcelona.org/">PHP Barcelona User Group</a> is pleased to announce the 4th edition of the <a href="http://phpconference.es/">PHP Barcelona Conference</a>. Come to the shores of the Mediterranean for two fun-packed days of cutting edge PHP, Application Scalability, High Performance, Databases, Integration, Testing, Clouds (not in the sky, we hope) and many many more topics and surprises. The event will take place from the 29th to the 30th of October and will bring together <strong>Ilia Alshanetsky</strong>, <strong>Fabien Potencier</strong>, <strong>Stefan Priebsch</strong>, <strong>Lorenzo Alberton</strong>, <strong>Enrico Zimuel</strong> and many more of the shiniest names in the industry for 48 hours of intensive PHP and fiesta!</p> 
     
     <p>For more information visit <a href="http://phpconference.es/">http://phpconference.es</a> and book your spot now before tickets run out and don't lose out on one of the most appealing events on the PHP calendar :)</p> 
     
     <p>See you in Barcelona!</p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry vevent"> 
    <div class="newsImage"><?php news_image("http://phpconference.com/", "ipc2010.gif", "International PHP Conference 2010"); ?></div> 
    <h1 class="summary entry-title"><a name="id2010-09-25-1" id="id2010-09-25-1" href="http://phpconference.com/" rel="bookmark" class="bookmark">International PHP Conference</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2010-09-25T13:09:54+02:00">[25-Sep-2010]</abbr> 
        <div> 
     <p>Not just another conference - this year has seen some high-valued
     conferences (like our IPC Spring Edition in Berlin) and we are already
     preparing the next big PHP conference. But this year makes a difference.
     It's the 10th. anniversary of the International PHP Conference. Being in
     business for ten years, we met some great people, made true fans and
     encouraged PHP developers all over the world to commit their passion for
     web-development to a growing community, that is behind some of the most
     well-known websites today.</p> 
     
     <p>Of course, a great event is nothing without great developers and we are very
     happy to welcome the PHP community to our next International PHP Conference
     2010! Again, this conference is packed with workshops, sessions and keynotes
     on some of the most trending topics in PHP and web development today. Wether
     you are the developer dealing with core PHP features, the project lead that
     is in continuous integration or the CTO looking for professional solutions,
     this conference is the place to be. Not because of our 10 years of
     experience in bringing together some of the most experienced heads in PHP
     development - but because of this conference being one of Europe's leading
     technology events that have been made possible by a really passionate
     community. And that is ... by you.</p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry vevent"> 
    <div class="newsImage"><?php news_image("http://conference.phpnw.org.uk/phpnw10/", "phpnw10_logo.png", "PHP | OSI Days 2010"); ?></div> 
    <h1 class="summary entry-title"><a name="id2010-09-09-1" id="id2010-09-09-1" href="http://www.php.net/archive/2010.php#id2010-09-09-1" rel="bookmark" class="bookmark">PHPNW10</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2010-09-09T23:53:00+08:00">[09-Sep-2010]</abbr> 
        <p> 
    PHP North West is a PHP conference with a regional focus, bringing the best
    of PHP speakers to the north-west of England on Saturday 9th October. A
    full day of conference speakers over at least two tracks this should again
    prove to be one of the best events for PHP user-led conferences in Europe.
    We're also, as last year, having an informal half day of speakers on Sunday
    10th October, at the Museum of Science and Industry (MOSI) nearby. With a
    weekend packed with all things PHP and a ticket price to suit business and
    hobbyists alike there are no reasons to miss out - see you in Manchester :)
   </p> 
   <ul> 
    <li> 
     PHPNW10:
     <a href="http://conference.phpnw.org.uk/phpnw10/">conference.phpnw.org.uk/phpnw10/</a> 
    </li> 
    <li> 
     Registration:
     <a href="http://conference.phpnw.org.uk/register/">conference.phpnw.org.uk/register/</a> 
    </li> 
   </ul> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry"> 
    <div class="newsImage"></div> 
    <h1 class="summary entry-title"><a name="id2010-07-22-2" id="id2010-07-22-2" href="http://www.php.net/archive/2010.php#id2010-07-22-2" rel="bookmark" class="bookmark">PHP 5.3.3 Released!</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2010-07-22T15:44:32+02:00">[22-Jul-2010]</abbr> 
        <div> 
     <p> 
     The PHP development team would like to announce the immediate
     availability of PHP 5.3.3. This release focuses on improving the
     stability and security of the PHP 5.3.x branch with over 100 bug
     fixes, some of which are security related. All users are encouraged
     to upgrade to this release.
     </p> 
     
     <p> 
     <b>Backwards incompatible change:</b> 
     </p> 
     <ul> 
             <li>Methods with the same name as the last element of a namespaced class name
             will no longer be treated as constructor. This change doesn't affect
             non-namespaced classes.
     
             <p><code>&lt;?php<br> 
namespace Foo;<br> 
class Bar {<br> 
    public function Bar() {<br> 
        // treated as constructor in PHP 5.3.0-5.3.2<br> 
        // treated as regular method in PHP 5.3.3<br> 
    }<br> 
}<br> 
?&gt;</code></p> 
             <p>There is no impact on migration from 5.2.x because namespaces were only introduced in PHP 5.3.</p></li> 
     </ul> 
     <p> 
     <b>Security Enhancements and Fixes in PHP 5.3.3:</b> 
     </p> 
     <ul> 
             <li>Rewrote var_export() to use smart_str rather than output buffering, prevents data disclosure if a fatal error occurs (CVE-2010-2531).</li> 
             <li>Fixed a possible resource destruction issues in shm_put_var().</li> 
             <li>Fixed a possible information leak because of interruption of XOR operator.</li> 
             <li>Fixed a possible memory corruption because of unexpected call-time pass by refernce and following memory clobbering through callbacks.</li> 
             <li>Fixed a possible memory corruption in ArrayObject::uasort().</li> 
             <li>Fixed a possible memory corruption in parse_str().</li> 
             <li>Fixed a possible memory corruption in pack().</li> 
             <li>Fixed a possible memory corruption in substr_replace().</li> 
             <li>Fixed a possible memory corruption in addcslashes().</li> 
             <li>Fixed a possible stack exhaustion inside fnmatch().</li> 
             <li>Fixed a possible dechunking filter buffer overflow.</li> 
             <li>Fixed a possible arbitrary memory access inside sqlite extension.</li> 
             <li>Fixed string format validation inside phar extension.</li> 
             <li>Fixed handling of session variable serialization on certain prefix characters.</li> 
             <li>Fixed a NULL pointer dereference when processing invalid XML-RPC requests (Fixes CVE-2010-0397, bug #51288).</li> 
             <li>Fixed SplObjectStorage unserialization problems (CVE-2010-2225).</li> 
             <li>Fixed possible buffer overflows in mysqlnd_list_fields,  mysqlnd_change_user.</li> 
             <li>Fixed possible buffer overflows when handling error packets in mysqlnd.</li> 
     </ul> 
     
     <p> 
     <b>Key enhancements in PHP 5.3.3 include:</b> 
     </p> 
     <ul> 
             <li>Upgraded bundled sqlite to version 3.6.23.1.</li> 
             <li>Upgraded bundled PCRE to version 8.02.</li> 
             <li>Added FastCGI Process Manager (FPM) SAPI.</li> 
             <li>Added stream filter support to mcrypt extension.</li> 
             <li>Added full_special_chars filter to ext/filter.</li> 
             <li>Fixed a possible crash because of recursive GC invocation.</li> 
             <li>Fixed bug #52238 (Crash when an Exception occured in iterator_to_array).</li> 
             <li>Fixed bug #52041 (Memory leak when writing on uninitialized variable returned from function).</li> 
             <li>Fixed bug #52060 (Memory leak when passing a closure to method_exists()).</li> 
             <li>Fixed bug #52001 (Memory allocation problems after using variable variables).</li> 
             <li>Fixed bug #51723 (Content-length header is limited to 32bit integer with Apache2 on Windows).</li> 
             <li>Fixed bug #48930 (__COMPILER_HALT_OFFSET__ incorrect in PHP &gt;= 5.3).</li> 
     </ul> 
     
     <p> 
     For users upgrading from PHP 5.2 there is a migration guide available on
     <a href="/migration53">http://php.net/migration53</a>, detailing the changes between those
     releases and PHP 5.3.
     </p> 
     <p> 
      For a full list of changes in PHP 5.3.3, see the <a href="/ChangeLog-5.php#5.3.3">ChangeLog</a>.
     </p> 
     
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry"> 
    <div class="newsImage"></div> 
    <h1 class="summary entry-title"><a name="id2010-07-22-1" id="id2010-07-22-1" href="http://www.php.net/archive/2010.php#id2010-07-22-1" rel="bookmark" class="bookmark">PHP 5.2.14 Released!</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2010-07-22T15:42:03+02:00">[22-Jul-2010]</abbr> 
        <div> 
     <p> 
     The PHP development team would like to announce the immediate
     availability of PHP 5.2.14. This release focuses on improving the
     stability of the PHP 5.2.x branch with over 60 bug fixes, some of which
     are security related.</p> 
     
     <p> 
     This release marks the end of the active support for PHP
     5.2. Following this release the PHP 5.2 series will receive no further
     active bug maintenance. Security fixes for PHP 5.2 might be published on a
     case by cases basis. All users of PHP 5.2 are encouraged to upgrade to
     PHP 5.3.</p> 
     
     <p> 
     <b>Security Enhancements and Fixes in PHP 5.2.14:</b> 
     </p> 
     <ul> 
     
             <li>Rewrote var_export() to use smart_str rather than output buffering, prevents data disclosure if a fatal error occurs.</li> 
             <li>Fixed a possible interruption array leak in strrchr().(CVE-2010-2484)</li> 
             <li>Fixed a possible interruption array leak in strchr(), strstr(), substr(), chunk_split(), strtok(), addcslashes(), str_repeat(), trim().</li> 
             <li>Fixed a possible memory corruption in substr_replace().</li> 
             <li>Fixed SplObjectStorage unserialization problems (CVE-2010-2225).</li> 
             <li>Fixed a possible stack exaustion inside fnmatch().</li> 
             <li>Fixed a NULL pointer dereference when processing invalid XML-RPC requests (Fixes CVE-2010-0397, bug #51288).</li> 
             <li>Fixed handling of session variable serialization on certain prefix characters.</li> 
             <li>Fixed a possible arbitrary memory access inside sqlite extension. Reported by Mateusz Kocielski.</li> 
     </ul> 
     
     <p> 
     <b>Key enhancements in PHP 5.2.14 include:</b> 
     </p> 
     <ul> 
     
             <li>Upgraded bundled PCRE to version 8.02.</li> 
             <li>Updated timezone database to version 2010.5.</li> 
             <li>Fixed bug #52238 (Crash when an Exception occured in iterator_to_array).</li> 
             <li>Fixed bug #52237 (Crash when passing the reference of the property of a non-object).</li> 
             <li>Fixed bug #52041 (Memory leak when writing on uninitialized variable returned from function).</li> 
             <li>Fixed bug #51822 (Segfault with strange __destruct() for static class variables).</li> 
             <li>Fixed bug #51552 (debug_backtrace() causes segmentation fault and/or memory issues).</li> 
             <li>Fixed bug #49267 (Linking fails for iconv on MacOS: "Undefined symbols: _libiconv").</li> 
     </ul> 
     
     <p>To prepare for upgrading to PHP 5.3, now that PHP 5.2's support ended, a
     migration guide available on <a href="/migration53">http://php.net/migration53</a>, details the changes between
     PHP 5.2 and PHP 5.3.</p> 
     <p>For a full list of changes in PHP 5.2.14 see the ChangeLog at
     <a href="/ChangeLog-5.php#5.2.14">http://www.php.net/ChangeLog-5.php#5.2.14</a>.</p> 
    </div> 
 
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry"> 
    <div class="newsImage"></div> 
    <h1 class="summary entry-title"><a name="id2010-06-23-1" id="id2010-06-23-1" href="http://www.php.net/archive/2010.php#id2010-06-23-1" rel="bookmark" class="bookmark">TestFest 2010</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2010-06-23T22:51:00-05:00">[23-Jun-2010]</abbr> 
        <div> 
      <p> 
        PHP is proud to announce TestFest 2010. TestFest is PHP's annual campaign
        to increase the overall code coverage of PHP through PHPT tests. During
        TestFest, PHP User Groups and individuals around the world organize local
        events where new tests are written and new contributors are introduced to
        PHP's testing suite.
      </p> 
      <p> 
        Last year was very successful with 887 tests submitted and a code coverage
        increase of 2.5%. This year we hope to do better.
      </p> 
      <p> 
        TestFest's own SVN repository and reporting tools are back online for this
        year's event. New to TestFest this year are automated test environment build
        tools as well as screencasts showing those build tools in action.
      </p> 
      <p> 
        Please visit the <a href="http://wiki.php.net/qa/testfest-2010">TestFest
        2010</a> wiki page for all the details on events being organized in your area,
        or find out how you can organize your own event.
      </p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry vevent"> 
    <div class="newsImage"><?php news_image("http://osidays.com/node/add/proposal", "php_osi_2010.png", "PHP | OSI Days 2010"); ?></div> 
    <h1 class="summary entry-title"><a name="id2010-06-05-1" id="id2010-06-05-1" href="http://www.php.net/archive/2010.php#id2010-06-05-1" rel="bookmark" class="bookmark">PHP | OSI Days 2010: Participate at the confluence of PHP's finest!</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2010-06-05T18:21:05-03:00">[05-Jun-2010]</abbr> 
        <p>PHP | OSI Days 2010 is the premier PHP conference being organised at 
    Asia's largest Open Source Conference - OSI Days 2010. We invite you to 
    come and lead a tutorial / session or participate in Panel Discussions 
    at OSI Days 2010 specifically for the PHP domain. The last date for 
    submitting a proposal for the conference is 15th June 2010. The 
    conference is scheduled for September 19-21, 2010 at Chennai, India.
   </p> 
   <p> 
    Submit a proposal now! &lt;<a href="http://osidays.com/node/add/proposal" class="url">http://osidays.com/node/add/proposal</a>&gt;
   </p> 
   <p><strong>If you are one of the following:</strong></p> 
   <ul> 
    <li>Open Source Enthusiast</li> 
    <li>Developer/ Hacker/ Techie/ Geek</li> 
    <li>IT Manager/ CXO</li> 
    <li>Open Source Entrepreneur</li> 
    <li>Designer/ UI Expert</li> 
    <li>Open Source Trainer/ Educationist</li> 
   </ul> 
   <p><strong>We invite you to submit a proposal on one of the topics below:</strong></p> 
   <p> 
    <ul> 
     <li>Cloud Computing: Tools and Platforms, Cloudnomics, Cloud for
      Dummies &amp; Others</li> 
     <li>PHP: PHP 5 &amp; 6, PHP Security, Frameworks, Architecture / QA &amp; Best
      Practices</li> 
     <li>Drupal: Best Practices, Module Development, Theme Development,
      Scaling/ Management/ Performance &amp; Others</li> 
     <li>Databases: MySQL, NoSQL, CouchDB, PostgreSQL, Ingres, SQLite &amp; Others</li> 
     <li>Java Script</li> 
     <li>Developer / Tools &amp; Techniques</li> 
    </ul> 
   </p> 
   <p><strong>Types of Presentation</strong></p> 
   <ul> 
    <li>45 minute Session</li> 
    <li> minute Panel Discussion</li> 
    <li>Half Day tutorial / workshop</li> 
    <li>Full Day tutorial / workshop</li> 
   </ul> 
   <p><strong>Your proposals Should</strong></p> 
   <p> 
    <ul> 
     <li>be Free of Marketing talks / self promotion / company promotion:
      Please speak about ideas/ technology/ business and not about
      yourself or your company. Talk about Open Source Projects/
      Products and not strictly commercial closed source products.</li> 
     <li>Clearly identify your target audience and what are the
      pre-requisites while submitting the proposal</li> 
     <li>Have a clear title and limit the scope of your proposal to
      something specific rather than trying to cover too much</li> 
    </ul> 
   </p> 
   <p><strong>Speaker Benefits</strong></p> 
   <p>OSI Days offers its speakers tremendous opportunities for exposure and 
    recognition as an industry leader. Your session will attract many 
    technical &amp; Business professionals interested in learning from your 
    example, expertise and experience. In appreciation of your contributions 
    as a Conference Speaker, we provide you many benefits, read them in full 
    detail. &lt;<a href="http://osidays.com/speaker-benefit" class="url">http://osidays.com/speaker-benefit</a>&gt;
   </p> 
   <p><strong>Contact</strong></p> 
   <p>For registration and more details visit: <a href="http://osidays.com" class="url">http://osidays.com</a> or contact 
    Dhiraj Khare at dhiraj@osidays.com or call at +919811206582
    <br/><br> 
    Team,<br> 
    OSI Days 2010
   </p> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry"> 
    <div class="newsImage"></div> 
    <h1 class="summary entry-title"><a name="id2010-03-04-1" id="id2010-03-04-1" href="http://www.php.net/archive/2010.php#id2010-03-04-1" rel="bookmark" class="bookmark">PHP 5.3.2 Released!</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2010-03-04T14:57:33+00:00">[04-Mar-2010]</abbr> 
        <div> 
     <p> 
     The PHP development team is proud to announce the immediate release of PHP
     5.3.2. This is a maintenance release in the 5.3 series, which includes a
     large number of bug fixes.
     </p> 
     
     <p> 
     <b>Security Enhancements and Fixes in PHP 5.3.2:</b> 
     </p> 
     <ul> 
       <li>Improved LCG entropy. (Rasmus, Samy Kamkar)</li> 
       <li>Fixed safe_mode validation inside tempnam() when the directory path does not end with a /). (Martin Jansen)</li> 
       <li>Fixed a possible open_basedir/safe_mode bypass in the session extension identified by Grzegorz Stachowiak. (Ilia)</li> 
     </ul> 
     
     <p> 
     <b>Key Bug Fixes in PHP 5.3.2 include:</b> 
     </p> 
     <ul> 
       <li>Added support for SHA-256 and SHA-512 to php's crypt.</li> 
       <li>Added protection for $_SESSION from interrupt corruption and improved "session.save_path" check.</li> 
       <li>Fixed bug #51059 (crypt crashes when invalid salt are given).</li> 
       <li>Fixed bug #50940 Custom content-length set incorrectly in Apache sapis.</li> 
       <li>Fixed bug #50847 (strip_tags() removes all tags greater then 1023 bytes long).</li> 
       <li>Fixed bug #50723 (Bug in garbage collector causes crash).</li> 
       <li>Fixed bug #50661 (DOMDocument::loadXML does not allow UTF-16).</li> 
       <li>Fixed bug #50632 (filter_input() does not return default value if the variable does not exist).</li> 
       <li>Fixed bug #50540 (Crash while running ldap_next_reference test
     cases).</li> 
       <li>Fixed bug #49851 (http wrapper breaks on 1024 char long headers).</li> 
       <li>Over 60 other bug fixes.</li> 
     </ul> 
     
     <p> 
     For users upgrading from PHP 5.2 there is a migration guide
     available <a href="http://php.net/migration53">here</a>, detailing
     the changes between those releases and PHP 5.3.
     </p> 
 
     <p> 
     <b>Further information and downloads:</b> 
     </p> 
 
     <p> 
     For a full list of changes in PHP 5.3.2, see the
     <a href="/ChangeLog-5.php#5.3.2">ChangeLog</a>. For source downloads
     please visit our <a href="/downloads.php">downloads page</a>, Windows
     binaries can be found on <a href="http://windows.php.net/download/"> 
     windows.php.net/download/</a>.
     </p> 
     
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry"> 
    <div class="newsImage"></div> 
    <h1 class="summary entry-title"><a name="id2010-02-25-1" id="id2010-02-25-1" href="http://www.php.net/archive/2010.php#id2010-02-25-1" rel="bookmark" class="bookmark">PHP 5.2.13 Released!</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2010-02-25T16:41:39-05:00">[25-Feb-2010]</abbr> 
        <div> 
     <p> 
     The PHP development team would like to announce the immediate
     availability of PHP 5.2.13. This release focuses on improving the stability of
     the PHP 5.2.x branch with over 40 bug fixes, some of which are security related.
     All users of PHP 5.2 are encouraged to upgrade to this release.
     </p> 
     
     <p> 
     <b>Security Enhancements and Fixes in PHP 5.2.13:</b> 
     </p> 
     <ul> 
             <li>Fixed safe_mode validation inside tempnam() when the directory path does not end with a /). (Martin Jansen)</li> 
             <li>Fixed a possible open_basedir/safe_mode bypass in session extension identified by Grzegorz Stachowiak. (Ilia)</li> 
             <li>Improved LCG entropy. (Rasmus, Samy Kamkar)</li> 
     </ul> 
     
     <p> 
     Further details about the PHP 5.2.13 release can be found in the <a href="/releases/5_2_13.php">release announcement</a>, and the full list of changes are available in the <a href="/ChangeLog-5.php#5.2.13">ChangeLog</a>.
     </p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry vevent"> 
    <div class="newsImage"><?php news_image("http://phpconference.nl/", "dpc10_banner.jpg", "Dutch PHP Conference 2010"); ?></div> 
    <h1 class="summary entry-title"><a name="id2010-02-19-1" id="id2010-02-19-1" href="http://phpconference.nl/" rel="bookmark" class="bookmark">Dutch PHP Conference</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2010-02-19T14:57:14+01:00">[19-Feb-2010]</abbr> 
        <div> 
     <p> 
     The Dutch PHP Conference is now in its 4th year and yet again promises
     a varied and inspiring few days of
     <a href="http://phpconference.nl/schedule">excellent technical content</a> 
     including Sebastian Bergmann, Kevlin Henney, Chris Shiflett, Ilia Alshanetsky
     and many other fascinating speakers and topics.
   </p> 
   <p> 
     The event is held in Amsterdam from
     <abbr title="2010-06-10" class="dtstart">10th</abbr> to
     <abbr title="2010-06-13" class="dtend">12th June 2010</abbr>,
     for more information see the website at
     <a href="http://phpconference.nl">http://phpconference.nl</a> 
     - we hope you can join us in Amsterdam in June!
     </p> 
    </div> 
  
    </div> 
</div> 
 
<hr> 
<div class="newsItem hentry vevent"> 
    <div class="newsImage"><?php news_image("http://confoo.ca/en", "logo_confoo_300_95.gif", "ConFoo Web Techno Conference"); ?></div> 
    <h1 class="summary entry-title"><a name="id2010-01-16-1" id="id2010-01-16-1" href="http://confoo.ca/en" rel="bookmark" class="bookmark">ConFoo Web Techno Conference</a></h1> 
    <div class="entry-content description"> 
        <abbr class="published newsdate" title="2010-01-16T14:25:31+01:00">[16-Jan-2010]</abbr> 
        <div> 
     <p>PHP Quebec and the ConFoo team is pleased to announce the schedule of
     the <a href="http://confoo.ca/en">ConFoo Web Techno Conference</a>.
     With over 130 presentations in 8 rooms, ConFoo brings you the best of
     Web development.
     </p> 
     <p> 
     The event will take place on March 8th to 12th in Montreal, at the
     prestigious Hilton Bonaventure Hotel.
     </p> 
     <p> 
     Over 100 specialists will be present at the conference to share their
     knowledge during talks and training. Among them will be:
     <b>Rasmus Lerdorf, Terry Chay, Chris Shiflett and Morgan Tocker</b> 
     </p> 
     <p>You would not want to miss the following presentations:
     <b>HTML5: Where Are We Now? (Mark Pilgrim), Andrei's Regex Clinic
     (Andrei Zmievski), Security-Centered Design (Chris Shiflett) and Welcome
     to the Wild Wild Web (Carl Mercier)</b> 
     </p> 
     <p> 
     <a href="http://confoo.ca/en/register">Register</a> online before
     January 22nd and save 200$!
     <br> 
     Looking forward to see you at the conference.
     </p> 
    </div> 
  
    </div> 
</div>

<?php site_footer(array('elephpants' => true, 'sidebar' => $SIDEBAR_DATA));
