<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'news-2004.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("News Archive - 2004");
?>

<h1>News Archive - 2004</h1>

<p>
 Here are the most important news items we have published in 2004 on PHP.net.
 For the latest news, <a href="/index.php">check the homepage</a>.
 See more archives for <?php print_news_links(); ?>.
</p>

<div class="newspage">
<hr />

<?php news_image("/downloads.php#5", "php-version5.gif", "PHP 5"); ?>
<a name="5.0.0RC1"></a>
<h1>PHP 5 Release Candidate 1 Released!</h1>
<p>
 <span class="newsdate">[18-Mar-2004]</span>
 The <a href="/downloads.php#v5">first Release Candidate of PHP 5</a> is finally
 here!  The move from Beta stage to RC stage means that PHP 5 is now feature
 complete, and is quite stable - stable enough for everyone to start playing
 with.  Note that it is still <i>not</i> recommended for mission-critical
 use.
</p>

<p>Some of the key features of PHP 5 include:</p>

<ul>
 <li>
  The <a href="http://www.zend.com/php5/zend-engine2.php">Zend Engine II</a>
  with a new object model and dozens of new features.
 </li>
 <li>
  XML support has been completely redone in PHP 5, all extensions are now
  focused around the excellent libxml2 library
  (<a href="http://www.xmlsoft.org/">http://www.xmlsoft.org/</a>).
 </li>
 <li>
  A new MySQL extension named MySQLi for developers using MySQL 4.1 and later.
  This new extension includes an object-oriented interface in addition to
  a traditional interface; as well as support for many of MySQL's new features,
  such as prepared statements.
 </li>
 <li>
  SQLite has been bundled with PHP. For more information on SQLite,
  please visit <a href="http://www.sqlite.org/">their website</a>.
 </li>
 <li>
  A brand new built-in SOAP extension for interoperability with Web Services.
 </li>
 <li>
  A new SimpleXML extension for easily accessing and manipulating XML as
  PHP objects. It can also interface with the DOM extension and vice-versa.
 </li>
 <li>
  Streams have been greatly improved, including the ability to access
  low-level socket operations on streams.
 </li>
 <li>And lots more...</li>
</ul>

<p>
 For changes since Beta 4, please consult the
 <a href="/ChangeLog-5.php#5.0.0RC1">ChangeLog</a>.
</p>

<hr />

<h1>Spanish PHP Mailing List Now at PHP.net</h1>
<p>
 <span class="newsdate">[29-Feb-2004]</span>
 The Spanish PHP mailing list was relocated to our list server.
 If you would like to subscribe to the list, you can do it via our
 <a href="mailing-lists.php">mailing lists page</a>. To read
 the archives, please see <a href="http://news.php.net/">our
 news server</a>.
</p>

<hr />

<?php news_image("http://www.phpconference.com/", "intcon2004spring.png", "International PHP Conference 2004 - Spring Edition"); ?>

<h1>International PHP Conference 2004 Amsterdam: Timetable and Open Source PHP projects</h1>
<p>
 <span class="newsdate">[27-Feb-2004]</span>
 Having the CfP over now, the organizers of the
 <a href="http://www.phpconference.com/">International PHP Conference
 2004 Spring Edition Amsterdam</a> have published the
 <a href="http://www.phpconference.com/proxy/proxy.php?CatID=0&amp;NewsID=374">session
 and workshop timetable</a>. The Conference features 32 sessions and two
 power workshops. It will happen again at <a
 href="http://www.phpconference.com/content/content2.php?CatID=0&amp;NewsID=356">the
 RAI Conference Centre, Amsterdam</a>.
</p>
<p>
 <strong>Open Source PHP projects</strong> can present themselves, like in
 the last years, for free on the Conference at the exhibition area between
 the commercial exhibitors. Take your chance and contact
 <a href="mailto:fstepan@entwickler.com">Frank Stepan</a> from
 Software &amp; Support.
</p>

<hr />

<?php news_image("http://conf.phpquebec.org/", "conference_php_quebec.gif", "Conference PHP Quebec"); ?>

<h1>Conf&eacute;rence PHP Qu&eacute;bec 2004 - (Montr&eacute;al, March 25&amp;26rst, 2004)</h1>
<p>
 <span class="newsdate">[11-Feb-2004]</span>
 The PHP Qu&eacute;bec Association announces the <a
 href="http://conf.phpquebec.com/">Conference PHP Qu&eacute;bec 2004</a>.
 The conference features 20 sessions over 2 days, in English and French.
 3 tracks : PHP advanced technics, PHP professionnal and Open Source technologies.
 It will take place downtown Montr&eacute;al, Qu&eacute;bec, Canada.
</p>
<p>
 We are currently offering <a 
 href="http://conf.phpquebec.org/main.php/en/conf2004/tarif">early bird prices</a>.
 Students and Small Businesses are eligible for reduced prices.
 Buy your tickets early to get rebates and discount with the DVD!
</p>
<p>
 Learn more about those exciting days at 
 <a href="http://conf.phpquebec.org/">conf.phpquebec.com</a>.
</p>

<hr />

<?php news_image("http://www.pawscon.com/", "paws_small.jpg", "PHP and Web Standards Conference - UK 2004"); ?>

<h1>PaWS Tickets Now On Sale!</h1>
<p>
 <span class="newsdate">[05-Feb-2004]</span>
 The <a href="http://www.pawscon.com/">PaWS Group</a> is proud to announce that
 tickets are now available for the first 
 <a href="http://www.pawscon.com/">PHP and Web Standards Conference</a>. We are
 offering Weekend tickets (Saturday 21st and Sunday 22nd only) as well as Conference
 tickets (Friday 20th - Tuesday 24th) for the entire length of the event. 
 Additionally, we also have Daily tickets available for each day of the conference.
 Tickets will also be available on the door for those that simply want to drop in.
</p>
<p>
 For ticket and accommodation Prices, look over our 
 <a href="http://www.pawscon.com/pricing">pricing guide</a> for more information.
 <a href="http://www.pawscon.com/register">Purchase your tickets</a> today for this
 one of a kind conference!
</p>

</div>

<?php site_footer(); ?>
