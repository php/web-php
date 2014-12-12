<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'archive/2007.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
news_archive_sidebar();
site_header("News Archive - 2007", array("cache" => true));
?>

<h1>News Archive - 2007</h1>

<p>
 Here are the most important news items we have published in 2007 on PHP.net.
</p>

<hr>

<div class="newsItem">
    <a name="2007-11-08-1" id="2007-11-08-1"><h1>PHP 5.2.5 Released</h1></a>
    <div>
  <span class="newsdate">[09-Nov-2007]</span>
  <p>        The PHP development team would like to announce the immediate        <a href="/downloads.php#v5">availability of PHP 5.2.5</a>.        This release focuses on improving the stability of the PHP 5.2.x        branch with over 60 bug fixes, several of which are security related.        All users of PHP are encouraged to upgrade to this release.</p>

  <p>        Further details about the PHP 5.2.5 release can be found in the        <a href="/releases/5_2_5.php">release announcement for 5.2.5</a>, the full list of        changes is available in the <a href="/ChangeLog-5.php#5.2.5">ChangeLog for PHP 5</a>.</p>
  <p>
    <b>Security Enhancements and Fixes in PHP 5.2.5:</b>
  </p>
  <ul>

    <li>Fixed dl() to only accept filenames. Reported by Laurent Gaffie.</li>
    <li>Fixed dl() to limit argument size to MAXPATHLEN (CVE-2007-4887). Reported by Laurent Gaffie.</li>
    <li>Fixed htmlentities/htmlspecialchars not to accept partial multibyte sequences. Reported by Rasmus Lerdorf</li>
    <li>Fixed possible triggering of buffer overflows inside glibc implementations of the fnmatch(), setlocale() and glob() functions. Reported by Laurent Gaffie.</li>
    <li>Fixed "mail.force_extra_parameters" php.ini directive not to be modifiable in .htaccess due to the security implications. Reported by SecurityReason.</li>
    <li>Fixed bug #42869 (automatic session id insertion adds sessions id to non-local forms).</li>

    <li>Fixed bug #41561 (Values set with php_admin_* in httpd.conf can be overwritten with ini_set()).</li>
  </ul>
  <p>For users upgrading to PHP 5.2 from PHP 5.0 and PHP 5.1, an upgrade guide is available <a href="/migration52">here</a>, detailing the changes between those releases and PHP 5.2.5.</p>
</div>
</div>

<hr>
<?php news_image("http://www.prophp.com.br/phpconference.php", "phpconfbrasil2007.png", "São Paulo 2007"); ?>
<div class="newsItem">
    
    <a name="2007-10-29-1" id="2007-10-29-1"><h1>PHP Conference Brasil 2007</h1></a>

    <div>
  <span class="newsdate">[29-Oct-2007]</span>
  <p>
November 30th - December 1st, Join us at the 2nd Annual PHP Conference Brasil. The event will take place at UNIFIEO in Osasco, São Paulo. This year's conference will have room for 1000 people. Its scheduled for tutorials of 3 hours, aside of speeches, cases, stands and a great catch up time for newbies and veterans.
Visit <a href="http://www.prophp.com.br/phpconference.php">the website</a> for more details. Early registration with discounted price is available until November 9th.
	</p>
</div>
</div>

<hr>
<div class="newsItem">

    
    <a name="2007-10-03-1" id="2007-10-03-1"><h1>The new documentation build system is ready for testing</h1></a>
    <div>
  <span class="newsdate">[03-Oct-2007]</span>
  <p>
The PHP documentation team is pleased to announce the initial release of 
the new build system that generates the PHP Manual. Written in PHP, PhD 
(<em>[PH]P based [D]ocBook renderer</em>) builds are now available for 
viewing at <a href="http://docs.php.net/">docs.php.net</a>. Everyone is 
encouraged to test and use this system so 
that <a href="http://bugs.php.net/">bugs</a> will be found and squashed. 
      </p>

  <p>
Once the new build system is stable, expect additional changes to the PHP 
manual that will include an improved navigation system and styling for OOP 
documentation. 
      </p>
  <p>
Feel free to set this developmental mirror as your default by 
using <a href="/my.php">my.php</a>.
      </p>
</div>
</div>

<hr>
<?php news_image("http://www.dcphpconference.com/", "dcphpconference.2007.png", "Washington DC 2007"); ?>
<div class="newsItem">
    
    <a name="2007-09-21-1" id="2007-09-21-1"><h1>DC PHP Conference 2007</h1></a>

    <div>
  <span class="newsdate">[21-Sep-2007]</span>
  <p>
November 7th - 9th, Join us at the 2nd Annual DC PHP Conference. The event will take place at George Washington University's Cafritz Conference Center in the heart of Washington DC. The three day conference begins November 7th and 8th with general sessions, and ends November 9th with tutorials. This year's conference will host some of the PHP Community's top speakers and developers and focus on three primary tracks:
<ul><li>Scalability</li><li>Security</li><li>The Art of PHP</li></ul>
Please see <a href="http://www.dcphpconference.com ">the website</a> for more details and to register. Early registration is available until mid-October.
	</p>

</div>
</div>

<hr>
<?php news_image("http://www.afup.org/pages/forumphp2007/", "afup2007.jpg", "Paris Forum 2007"); ?>
<div class="newsItem">
    
    <a name="2007-09-20-1" id="2007-09-20-1"><h1>Forum PHP Paris 2007</h1></a>
    <div>
  <span class="newsdate">[20-Sep-2007]</span>
  <p>
The <a href="http://www.afup.org/">French AFUP</a> association is proud 
to announce the <a href="http://www.afup.org/pages/forumphp2007/">sixth annual PHP
meeting in Paris</a>, on November 21st and 22nd, 2007. Developers and
managers will gather to meet Rasmus Lerdorf, Andrei Zmievski and other
prominent community experts for two days of sessions, packed with
enterprise solutions and advanced techniques.
	</p>

</div>
</div>

<hr>
<div class="newsItem">
    
    <a name="2007-08-30-1" id="2007-08-30-1"><h1>PHP 5.2.4 Released</h1></a>

    <div>
  <span class="newsdate">[30-Aug-2007]</span>
  <p>
The PHP development team would like to announce the immediate
<a href="/downloads.php#v5">availability of PHP 5.2.4</a>. 
This release focuses on improving the stability of the PHP 5.2.X 
branch with over 120 various bug fixes in addition to resolving 
several low priority security bugs. All users of PHP are encouraged 
to upgrade to this release.
</p>
  <p>
Further details about the PHP 5.2.4 release can be found in the
<a href="/releases/5_2_4.php">release announcement for 5.2.4</a>, the full list of
changes is available in the <a href="/ChangeLog-5.php#5.2.4">ChangeLog for PHP 5</a>.

</p>
  <p>
    <b>Security Enhancements and Fixes in PHP 5.2.4:</b>
  </p>
  <ul>
    <li>Fixed a floating point exception inside wordwrap() (Reported by Mattias Bengtsson)</li>
    <li>Fixed several integer overflows inside the GD extension (Reported by Mattias Bengtsson)</li>
    <li>Fixed size calculation in chunk_split() (Reported by Gerhard Wagner)</li>

    <li>Fixed integer overflow in str[c]spn(). (Reported by Mattias Bengtsson)</li>
    <li>Fixed money_format() not to accept multiple %i or %n tokens. (Reported by Stanislav Malyshev)</li>
    <li>Fixed zend_alter_ini_entry() memory_limit interruption vulnerability. (Reported by Stefan Esser)</li>
    <li>Fixed INFILE LOCAL option handling with MySQL extensions not to be allowed when open_basedir or safe_mode is active. (Reported by Mattias Bengtsson)</li>
    <li>Fixed session.save_path and error_log values to be checked against open_basedir and safe_mode (CVE-2007-3378) (Reported by Maksymilian Arciemowicz)</li>
    <li>Fixed a possible invalid read in glob() win32 implementation (CVE-2007-3806) (Reported by shinnai)</li>

    <li>Fixed a possible buffer overflow in php_openssl_make_REQ (Reported by zatanzlatan at hotbrev dot com)</li>
    <li>Fixed an open_basedir bypass inside glob() function (Reported by dr at peytz dot dk)</li>
    <li>Fixed a possible open_basedir bypass inside session extension when the session file is a symlink (Reported by c dot i dot morris at durham dot ac dot uk)</li>
    <li>Improved fix for MOPB-03-2007.</li>
    <li>Corrected fix for CVE-2007-2872.</li>
  </ul>

  <p>
For users upgrading to PHP 5.2 from PHP 5.0 and PHP 5.1, an upgrade guide is
available <a href="/migration52">here</a>, detailing the changes between
those releases and PHP 5.2.4.
</p>
</div>
</div>

<hr>
<?php news_image("http://www.zendcon.com/", "zendcon07_logo_s.jpg", "Zend/PHP Conference 2007"); ?>
<div class="newsItem">
    
    <a name="2007-07-25-1" id="2007-07-25-1"><h1>Zend/PHP Conference 2007</h1></a>
    <div>
  <span class="newsdate">[25-Jul-2007]</span>

  <p>
Don't miss the third annual Zend/PHP Conference and Expo 2007!  This
year's conference promises to be the best ever.  Join Zend, the PHP
community and leading technology companies from around the world for
three days of education, learning and networking - plus an additional
tutorial day.  The 2007 conference will feature over 40 sessions, an
exhibit hall featuring leading companies such as Adobe, IBM, PayPal and
Zend, an UnConference area to stimulate impromptu discussions, and
networking opportunities galore. 
</p>
  <p>
ZendCon2007 will feature something for everyone – from novice to
advanced, business-oriented to technical-focused.  You will hear from
leaders in the PHP community and business experts who have implemented
PHP based initiatives.  Come hear from Zend as it presents a roadmap for
business-critical PHP.  Meet the Zend development teams.  Learn more
about Zend open source projects.
</p>
  <p>
ZendCon 2007 promises to be the largest gathering dedicated to PHP. 
Plan to attend ZendCon 2007 and join the PHP community to network and
learn from the best PHP minds from around the world.
</p>
  <p>
For more information please see <a href="http://www.zendcon.com/">http://www.zendcon.com/</a>.

</p>
</div>
</div>

<hr>
<?php news_image("http://works.phparch.com/c/p/index", "phpworks2007.png", "php|works 2007"); ?>
<div class="newsItem">
    
    <a name="2007-07-16-01" id="2007-07-16-01"><h1>php|works 2007 in Atlanta</h1></a>
    <div>
  <span class="newsdate">[16-Jul-2007]</span>
  <p>
php|architect is proud to announce <a href="http://works.phparch.com">php|works 2007</a>, which will take place in Atlanta Georgia (USA) on September 12-14, 2007.

</p>
  <p>
This year, the conference once again promises to be an excellent event for PHP developers of all levels, with <a href="http://works.phparch.com/c/schedule">talks from top PHP experts</a> such as Derick Rethans, Chris Shiflett, Andrei Zmievski, Sara Golemon, and many more (and plenty of new faces, as well). 
</p>
</div>
</div>

<hr>
<div class="newsItem">
    
    <a name="2007-07-13-1" id="2007-07-13-1"><h1>PHP 4 end of life announcement</h1></a>
    <div>

  <span class="newsdate">[13-Jul-2007]</span>
  <p>
  Today it is exactly three years ago since PHP 5 has been released. In
  those three years it has seen many improvements over PHP 4. PHP 5 is
  fast, stable &amp; production-ready and as PHP 6 is on the way, PHP 4
  will be discontinued.
</p>
  <p>
  The PHP development team hereby announces that support for PHP 4 will
  continue until the end of this year only. After 2007-12-31 there will be no
  more releases of PHP 4.4. We will continue to make critical security fixes
  available on a case-by-case basis until 2008-08-08.  Please use the rest of
  this year to make your application suitable to run on PHP 5. 
</p>
  <p>

  For documentation on migration for PHP 4 to PHP 5, we would like to point you
  to our <a href="/manual/en/migration5.php">migration guide</a>. There is
  additional information available in the <a href="/manual/en/migration51.php">PHP 5.0 to PHP 5.1</a> and <a href="/manual/en/migration52.php">PHP 5.1 to PHP 5.2</a> migration guides as
  well.
</p>
</div>
</div>

<hr>
<div class="newsItem">
    
    <a name="2007-06-01-1" id="2007-06-01-1"><h1>PHP 5.2.3 Released</h1></a>

    <div>
  <span class="newsdate">[01-Jun-2007]</span>
  <p>
The PHP development team would like to announce the immediate <a href="/downloads.php#v5">availability of PHP 5.2.3</a>. 
This release continues to improve the security and the stability of 
the 5.X branch as well as addressing two regressions introduced
by the previous 5.2 releases. These regressions relate to the timeout
handling over non-blocking SSL connections and the lack of
HTTP_RAW_POST_DATA in certain conditions. All users are encouraged to
upgrade to this release.
</p>
  <p>
Further details about the PHP 5.2.3 release can be found in the
<a href="/releases/5_2_3.php">release announcement for 5.2.3</a>, the full list of
changes is available in the <a href="/ChangeLog-5.php#5.2.3">ChangeLog for PHP 5</a>.

</p>
  <p>
    <b>Security Enhancements and Fixes in PHP 5.2.3:</b>
  </p>
  <ul>
    <li>Fixed an integer overflow inside chunk_split() (by Gerhard Wagner, CVE-2007-2872)</li>
    <li>Fixed possible infinite loop in imagecreatefrompng. (by Xavier Roche, CVE-2007-2756)</li>
    <li>Fixed ext/filter Email Validation Vulnerability (MOPB-45 by Stefan Esser, CVE-2007-1900)</li>

    <li>Fixed bug #41492 (open_basedir/safe_mode bypass inside realpath()) (by bugs dot php dot net at chsc dot dk)</li>
    <li>Improved fix for CVE-2007-1887 to work with non-bundled sqlite2 lib.</li>
    <li>Added mysql_set_charset() to allow runtime altering of connection encoding.</li>
  </ul>
  <p>
For users upgrading to PHP 5.2 from PHP 5.0 and PHP 5.1, an upgrade guide is
available <a href="/migration52">here</a>, detailing the changes between
those releases and PHP 5.2.3.
</p>

</div>
</div>

<hr>
<?php news_image("http://www.wtconferences.com/2007/?q=node/1", "wtlogo_s.png", "WebTech 2007"); ?>
<div class="newsItem">
    
    <a name="2007-05-19-1" id="2007-05-19-1"><h1>WebTech 2007</h1></a>
    <div>

  <span class="newsdate">[19-May-2007]</span>
  <p>
 The 4th <a href="http://www.wtconferences.com/2007/?q=node/1">Internet technologies conference</a>
 will take place from June 29 till 30th in the Bulgarian seaside at city of Varna where
 you can combine sun, sea and technologies.
</p>
  <p>
 The conference as in the previous 3 years will focus on new technologies in web programming,
 open source and everything that stands for IT.
</p>

  <p>
 The conference is free of charge.
</p>
</div>
</div>

<hr>
<div class="newsItem">
    
    <a name="2007-05-03-1" id="2007-05-03-1"><h1>PHP 5.2.2 and PHP 4.4.7 Released</h1></a>
    <div>
  <span class="newsdate">[03-May-2007]</span>

  <p>
 The PHP development team would like to announce the immediate
 <a href="/downloads.php#v5">availability of PHP 5.2.2</a> and
 <a href="/downloads.php#v4">availability of PHP 4.4.7</a>.
 These releases are major stability and security enhancements of the 5.x and
 4.4.x branches, and all users are strongly encouraged to upgrade to it as
 soon as possible.  Further details about the PHP 5.2.2 release can be found
 in the <a href="/releases/5_2_2.php">release announcement for 5.2.2</a>,
 the full list of changes is available in the
 <a href="/ChangeLog-5.php#5.2.2">ChangeLog for PHP 5</a>. Details about
 the PHP 4.4.7 release can be found in the
 <a href="/releases/4_4_7.php">release announcement for 4.4.7</a>, the full
 list of changes is available in the
 <a href="/ChangeLog-4.php#4.4.7">ChangeLog for PHP 4</a>.

</p>
  <p>
    <b>Security Enhancements and Fixes in PHP 5.2.2 and PHP 4.4.7:</b>
  </p>
  <ul>
    <li>Fixed CVE-2007-1001, GD wbmp used with invalid image size (by Ivan Fratric)</li>
    <li>Fixed asciiz byte truncation inside mail() (MOPB-33 by Stefan Esser)</li>
    <li>Fixed a bug in mb_parse_str() that can be used to activate register_globals (MOPB-26 by Stefan Esser)</li>

    <li>Fixed unallocated memory access/double free in in array_user_key_compare() (MOPB-24 by Stefan Esser)</li>
    <li>Fixed a double free inside session_regenerate_id() (MOPB-22 by Stefan Esser)</li>
    <li>Added missing open_basedir &amp; safe_mode checks to zip:// and bzip:// wrappers. (MOPB-21 by Stefan Esser).</li>
    <li>Fixed CRLF injection inside ftp_putcmd(). (by loveshell[at]Bug.Center.Team)</li>
    <li>Fixed a remotely trigger-able buffer overflow inside bundled libxmlrpc library. (by Stanislav Malyshev)</li>

  </ul>
  <p>
    <b>Security Enhancements and Fixes in PHP 5.2.2 only:</b>
  </p>
  <ul>
    <li>Fixed a header injection via Subject and To parameters to the mail() function (MOPB-34 by Stefan Esser)</li>
    <li>Fixed wrong length calculation in unserialize S type (MOPB-29 by Stefan Esser)</li>

    <li>Fixed substr_compare and substr_count information leak (MOPB-14 by Stefan Esser) (Stas, Ilia)</li>
    <li>Fixed a remotely trigger-able buffer overflow inside make_http_soap_request(). (by Ilia Alshanetsky)</li>
    <li>Fixed a buffer overflow inside user_filter_factory_create(). (by Ilia Alshanetsky)</li>
    <li>Fixed a possible super-global overwrite inside import_request_variables(). (by Stefano Di Paola, Stefan Esser)</li>
    <li>Limit nesting level of input variables with max_input_nesting_level as fix for (MOPB-03 by Stefan Esser)</li>
  </ul>

  <p>
    <b>Security Enhancements and Fixes in PHP 4.4.7 only:</b>
  </p>
  <ul>
    <li>XSS in phpinfo() (MOPB-8 by Stefan Esser)</li>
  </ul>
  <p>
 While majority of the issues outlined above are local, in some
 circumstances given specific code paths they can be triggered externally.
 Therefor, we strongly recommend that if you use code utilizing the
 functions and extensions identified as having had vulnerabilities in them,
 you consider upgrading your PHP.

</p>
  <p>
 For users upgrading to PHP 5.2 from PHP 5.0 and PHP 5.1, an upgrade guide is
 available <a href="/migration52">here</a>, detailing the changes between
 those releases and PHP 5.2.2.
</p>
  <p><strong>Update: May 4th;</strong> The PHP 4.4.7 Windows build was updated due to the faulty Apache2 module shipped with the original</p>
  <p><strong>Update: May 23th;</strong> By accident a couple of fixes where listed as fixed in both PHP 5.2.2 and 4.4.7 but where however only fixed in PHP 5.2.2. The PHP 4 ChangeLog was not affected.</p>

</div>
</div>

<hr>
<div class="newsItem">
    
    <a name="2007-04-14-1" id="2007-04-14-1"><h1>The PHP.net Google Summer of Code</h1></a>
    <div>
  <span class="newsdate">[14-Apr-2007]</span>
  <p>
    The PHP team is once again proud to participate in the 
    <a href="http://code.google.com/soc/">Google Summer of Code</a>.
    Seven students will "flip bits instead of burgers" this summer:

</p>
  <ul>
    <li>
        Mentored by Michael Wallner, Hannes Magnusson will work on
        <a href="http://wiki.phpdoc.info/LiveDocs">LiveDocs</a>, which is a
        "tool to display DocBook XML files in a web browser on the
        fly, without the need of building all HTML target files first".
        This project will be of great value to the PHP Documentation Team.
  </li>
    <li>
        The PHP Interpreter uses reference counting to keep track of which
        objects are no longer referenced and thus can be destroyed. A major
        weakness in the current implementation is that it cannot detect
        reference cycles, that is objects that reference each other in a
        circular graph structure which is not referenced itself from outside
        the circle. Mentored by Derick Rethans, David Wang will implement a
        new reference counting algorithm that will alleviate this problem.
  </li>
    <li><a href="http://xdebug.org/">Xdebug</a> provides a range of useful
        functionality for PHP developers, including detailed error information,
        code coverage and profiling support, and support for remote debugging
        using the GDB and DBGp protocols. Mentored by Xdebug's creator,
        Derick Rethans, Adam Harvey will develop a cross-platform GUI
        application that implements the DBGp protocol and allows PHP
        applications to be debugged using Xdebug in a development environment
        agnostic fashion.
  </li>

    <li>
	    Mentored by Lukas Smith, Konsta Vesterinen will work on the
        object-relational mapper <a href="http://www.phpdoctrine.net/">Doctrine</a>.
  </li>
    <li>
        Mutation Testing, or Automated Error Seeding, is an approach where
        the testing tool makes some change to the tested code, runs the tests,
        and if the tests pass displays a message saying what it changed. This
        approach is different than code coverage analysis, because it can find
        code that is executed by the running of tests but not actually tested.
        Mentored by Sebastian Bergmann, Mike Lewis will implement Mutation
        Testing for <a href="http://www.phpunit.de/">PHPUnit</a>.
  </li>
    <li>
        Mentored by Helgi Þormar Þorbjörnsson, Igor Feghali will add support
        for foreign keys to
        <a href="http://pear.php.net/package/MDB2_Schema/">MDB2_Schema</a>,
        a package that "enables users to maintain RDBMS independant schema
        files in XML that can be used to create, alter and drop database
        entities and insert data into a database".
  </li>

    <li>
        Mentored by David Coallier, Nicolas Bérard-Nault will refactor the
        internals of <a href="http://www.jaws-project.com/">Jaws</a>, a
        Framework and Content Management System for building dynamic web sites,
        for PHP 6.
  </li>
  </ul>
</div>
</div>

<hr>
<div class="newsItem">
    
    <a name="2007-03-01-1" id="2007-03-01-1"><h1>PHP 4.4.6 Released</h1></a>

    <div>
  <span class="newsdate">[01-Mar-2007]</span>
  <p>
    The PHP development team would like to announce the immediate
    <a href="/downloads.php#v4">availability of PHP 4.4.6</a>.
</p>
  <p>
    The main issue that this release addresses is a crash problem that was
    introduced in PHP 4.4.5.  The problem occurs when session variables are used
    while register_globals is enabled.
</p>

  <p>
    Details about the PHP 4.4.6 release can be found in the
    <a href="/releases/4_4_6.php">release announcement for 4.4.6</a>,
    the full list of changes is available in the
    <a href="/ChangeLog-4.php#4.4.6">ChangeLog for PHP 4</a>.
</p>
</div>
</div>

<hr>
<div class="newsItem">
    
    <a name="2007-02-08-2" id="2007-02-08-2"><h1>PHP 5.2.1 and PHP 4.4.5 Released</h1></a>

    <div>
  <span class="newsdate">[08-Feb-2007]</span>
  <p>
  The PHP development team would like to announce the immediate
  <a href="/downloads.php#v5">availability of PHP 5.2.1</a> and
  <a href="/downloads.php#v4">availability of PHP 4.4.5</a>.
  These releases are major stability and security enhancements of the 5.x and
  4.4.x branches, and all users are strongly encouraged to upgrade to it as
  soon as possible.  Further details about the PHP 5.2.1 release can be found in
  the <a href="/releases/5_2_1.php">release announcement for 5.2.1</a>, the full list of
  changes is available in the <a href="/ChangeLog-5.php#5.2.1">ChangeLog for PHP
   5</a>. Details about the PHP 4.4.5 release can be found in the
  <a href="/releases/4_4_5.php">release announcement for 4.4.5</a>, the full list of
  changes is available in the <a href="/ChangeLog-4.php#4.4.5">ChangeLog for PHP 4</a>.

</p>
  <p>
    <b>Security Enhancements and Fixes in PHP 5.2.1 and PHP 4.4.5:</b>
  </p>
  <ul>
    <li>Fixed possible safe_mode &amp; open_basedir bypasses inside the session extension.</li>
    <li>Fixed unserialize() abuse on 64 bit systems with certain input strings.</li>

    <li>Fixed possible overflows and stack corruptions in the session extension.</li>
    <li>Fixed an underflow inside the internal sapi_header_op() function.</li>
    <li>Fixed non-validated resource destruction inside the shmop extension.</li>
    <li>Fixed a possible overflow in the str_replace() function.</li>
    <li>Fixed possible clobbering of super-globals in several code paths.</li>
    <li>Fixed a possible information disclosure inside the wddx extension.</li>

    <li>Fixed a possible string format vulnerability in *print() functions on 64 bit systems.</li>
    <li>Fixed a possible buffer overflow inside ibase_{delete,add,modify}_user() functions.</li>
    <li>Fixed a string format vulnerability inside the odbc_result_all() function.</li>
  </ul>
  <p>
    <b>Security Enhancements and Fixes in PHP 5.2.1 only:</b>
  </p>

  <ul>
    <li>Prevent search engines from indexing the phpinfo() page.</li>
    <li>Fixed a number of input processing bugs inside the filter extension.</li>
    <li>Fixed allocation bugs caused by attempts to allocate negative values in some code paths.</li>
    <li>Fixed possible stack/buffer overflows inside zip, imap &amp; sqlite extensions.</li>
    <li>Fixed several possible buffer overflows inside the stream filters.</li>

    <li>Memory limit is now enabled by default.</li>
    <li>Added internal heap protection.</li>
    <li>Extended filter extension support for $_SERVER in CGI and apache2 SAPIs.</li>
  </ul>
  <p>
    <b>Security Enhancements and Fixes in PHP 4.4.5 only:</b>
  </p>

  <ul>
    <li>Fixed possible overflows inside zip &amp; imap extensions.</li>
    <li>Fixed a possible buffer overflow inside mail() function on Windows.</li>
    <li>Unbundled the ovrimos extension.</li>
  </ul>
  <p>

The majority of the security vulnerabilities discovered and resolved can in
most cases be only abused by local users and cannot be triggered remotely.
However, some of the above issues can be triggered remotely in certain
situations, or exploited by malicious local users on shared hosting setups
utilizing PHP as an Apache module. Therefore, we strongly advise all users of
PHP, regardless of the version to upgrade to the 5.2.1 or 4.4.5 releases as soon as possible.
</p>
  <p>
For users upgrading to PHP 5.2 from PHP 5.0 and PHP 5.1, an upgrade guide is
available <a href="/migration52">here</a>, detailing the changes between
those releases and PHP 5.2.1.
</p>
  <p><strong>Update: Feb 14th;</strong> Added release information for PHP
4.4.5.</p>
  <p><strong>Update: Feb 12th;</strong> The Windows install package had problems
with upgrading from previous PHP versions. That has now been fixed and new file
posted in the <a href="/downloads.php">download section</a>.</p>

</div>
</div>

<hr>
<div class="newsItem">
    
    <a name="2007-02-08-1" id="2007-02-08-1"><h1>The front page has changed</h1></a>
    <div>
  <span class="newsdate">[08-Feb-2007]</span>
  <p>
    The news on the front page of php.net has changed, the <a href="/conferences/">conference announcements</a> are now located on their own page.
    The idea is to keep php.net specific news clear and also opens the door for additional news entries, like for RC releases. More changes are on the way so keep an eye out.

</p>
</div>
</div>

<hr>
<?php news_image("http://conf.phpquebec.com/en/conf2007/", "conference_php_quebec.gif", "PHP Québec conference"); ?>
<div class="newsItem">
    
    <a name="2007-02-07-1" id="2007-02-07-1"><h1>PHP Québec conference 2007</h1></a>
    <div>
  <span class="newsdate">[07-Feb-2007]</span>
  <p>
PHP Québec is pleased to announce the <a href="http://conf.phpquebec.com/en/conf2007/">fifth edition of the PHP Québec Conference</a>. 
The conference will take place in Montréal, Canada on March 14-15-16th 2007. It features 2 days of 

<a href="http://conf.phpquebec.com/en/conf2007/horaire">technicals talks</a> and 
an additional day of <a href="http://conf.phpquebec.com/en/conf2007/ateliers">workshop</a>. 
Among the  speakers, the well know PHP experts such has:  Rasmus Lerdorf, Andrei 
Zmievski, Derick Rethans, Ilia Alshanetsky, John Coggeshall, Damien Séguy, and many more.
</p>
  <p>
The conference has three distinct tracks : Advanced Techniques, Data 
Availability, PHP: Beyound Theory. With over 35 sessions and workshops, the 
PHP Québec Conference is great opportunity to learn about the latest 
development and professional techniques to help you build high quality PHP 
software and meet with PHP.
</p>
  <p>
Special prices are available for all Open Source community members and major 
contributors.
</p>
</div>
</div>

<hr>
<div class="newsItem">
    
    <a name="2007-02-03-1" id="2007-02-03-1"><h1>PHP Manual Updates</h1></a>
    <div>
  <span class="newsdate">[03-Feb-2007]</span>
  <p>The PHP documentation team is proud to present to the PHP community a few fixes and tweaks to the <a href="/manual/en/">PHP Manual</a>, including:</p>
  <ul>

    <li>an improved, XSL-based build system that will deliver compiled manuals to mirrors in a more timely manner (goodbye dsssl)</li>
    <li>manual pages can now contain images (see <code><a href="/en/function.imagearc">imagearc()</a></code> for an example)</li>
    <li>updated function version information and capture system (fewer "no version information, might be only in CVS" messages)</li>
    <li>... and more to come!</li>
  </ul>

  <p>Please <a href="/about.howtohelp">help us improve the documentation</a> by <a href="http://bugs.php.net/">submitting bug reports</a>, and adding notes to undocumented functions.</p>
</div>
</div>

<hr>
<?php news_image("http://www.phpconference.co.uk/", "phplondon2007.png", "PHP London 2007"); ?>
<div class="newsItem">
    
    <a name="2007-01-18-1" id="2007-01-18-1"><h1>PHP London 2007</h1></a>
    <div>
  <span class="newsdate">[18-Jan-2007]</span>
  <p>
After the success of 2006 the <a href="http://www.phplondon.org/">PHP London user group</a> is staging the <a href="http://www.phpconference.co.uk/">UK's second dedicated PHP conference</a> on Friday, 23 February 2007, in London. The conference will be a low-cost event, costing £50 for the day. Speakers include: Rasmus Lerdorf, Cal Evans, Simon Laws and Kevlin Henney.

</p>
</div>
</div>

<hr>
<?php news_image("http://www.phparch.com/tek", "phptek2007.png", "php|tek 2007"); ?>
<div class="newsItem">
    
    <a name="2007-01-12-1" id="2007-01-12-1"><h1>Chicago php|tek 2007</h1></a>
    <div>
  <span class="newsdate">[12-Jan-2007]</span>
  <p>
php|architect is proud to announce <a href="http://www.phparch.com/tek">php|tek 2007</a>, which will take place in Chicago, Illinois (USA) on May 16-18, 2007.

</p>
  <p>
This year, the conference once again promises to be an excellent event for PHP developers of all levels, with talks from top PHP experts such as Rasmus Lerdorf, Chris Shiflett, Andrei Zmievski, Ilia Alshanetsky, Sara Golemon, and many more.
</p>
</div>
</div>

<?php site_footer(array('elephpants' => true, 'sidebar' => $SIDEBAR_DATA));
