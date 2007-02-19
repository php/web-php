<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'conferences/index.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/pregen-events.inc';


$layout_workaround = <<< EOT
<div id="conferencesSidebar">
    $RSIDEBAR_DATA
</div>
EOT;

unset($RSIDEBAR_DATA);

site_header("PHP Conferences around the world", array("layout_workaround" => $layout_workaround, 'headtags' => '<link rel="alternate" type="application/rss+xml" title="PHP: Conference announcements" href="' . $MYSITE . 'conferences/news.rss" />'));

// DO NOT REMOVE THIS COMMENT (the RSS parser is dependant on it)
?>

<a name="6"></a>
<!-- SUBJECT: conference -->
<?php news_image("http://conf.phpquebec.com/en/conf2007/", "conference_php_quebec.gif ", "PHP Québec conference"); ?>
<h1>PHP Québec conference 2007</h1>
<p>
 <span class="newsdate">[07-Feb-2007]</span>
PHP Québec is pleased to announce the <a href="http://conf.phpquebec.com/en/conf2007/">fifth edition of the PHP Québec Conference</a>. 
The conference will take place in Montréal, Canada on March 14-15-16th 2007. It features 2 days of 
<a  href="http://conf.phpquebec.com/en/conf2007/horaire">technicals talks</a> and 
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

<hr />

<a name="5"></a>
<!-- SUBJECT: cfp -->
<?php news_image("http://conferences.oreillynet.com/os2007/", "os2007.gif", "OSCON Open Source Convention"); ?>
<h1> O'Reilly OSCON call for papers</h1>
<p>
 <span class="newsdate">[29-Jan-2007]</span>
The O'Reilly Open Source Convention 2007 will once again take place from July 23rd - 27th 2007
in Portland, Oregon, and has a PHP track as usual. The Call for Papers closes Monday February 5 2007.  You can find more information at <a href="http://conferences.oreillynet.com/os2007/" title="O'Reilly Open Source Convention 2007">http://conferences.oreillynet.com/os2007/</a>.
</p>

<hr />

<a name="4"></a>
<!-- SUBJECT: cfp -->
<?php news_image("http://phpconference.com/", "intcon2007spring.png", "International PHP Conference 2007 Spring Edition"); ?>
<h1>International PHP Conference 2007 Spring Edition : Call for Papers</h1>
<p>
 <span class="newsdate">[24-Jan-2007]</span>
The International PHP Conference 2007 Spring Edition will happen from May, 21st to 23rd 2007
in Stuttgart. The Call for Papers has just been opened. You can find more information at 
<a href="http://phpconference.com/" title="International PHP Conference 2007 Spring Edition">http://phpconference.com/</a>.
There's a pre-conference day on 21st of May with full day Power Workshops and 
a Main Conference from 22nd to 23rd of May with 1 hour sessions. 
</p>
<p>
Please submit your session proposals at 
<a href="http://phpconference.com/input" title="International PHP Conference 2007 Spring Edition - Call for Paper">http://phpconference.com/input</a>.
They will be voted by the Chair board consisting of Björn Schotte (Head of Chair), 
Christopher Kunz and Sebastian Meyen. The language for talks is both English and German.
</p>

<hr />

<a name="3"></a>
<!-- SUBJECT: conference -->
<?php news_image("http://www.phpconference.co.uk/", "phplondon2007.png", "PHP London 2007"); ?>
<h1>PHP London 2007</h1>
<p>
 <span class="newsdate">[18-Jan-2007]</span>
After the success of 2006 the <a href="http://www.phplondon.org/">PHP London user group</a> is staging the <a href="http://www.phpconference.co.uk/">UK's second dedicated PHP conference</a> on Friday, 23 February 2007, in London. The conference will be a low-cost event, costing &#163;50 for the day. Speakers include: Rasmus Lerdorf, Cal Evans, Simon Laws and Kevlin Henney.
</p>

<hr />

<a name="2"></a>
<!-- SUBJECT: conference -->
<?php news_image("http://www.phparch.com/tek", "phptek2007.png", "php|tek 2007"); ?>
<h1>php|tek 2007</h1>
<p>
 <span class="newsdate">[12-Jan-2007]</span>
 php|architect is proud to announce <a href="http://www.phparch.com/tek">php|tek 2007</a>, which will take place in Chicago, Illinois (USA) on May 16-18, 2007.
</p>
<p>
 This year, the conference once again promises to be an excellent event for PHP developers of all levels, with talks from top PHP experts such as Rasmus Lerdorf, Chris Shiflett, Andrei Zmievski, Ilia Alshanetsky, Sara Golemon, and many more.
</p>

<hr />

<a name="1"></a>
<!-- SUBJECT: conference -->
<?php news_image("http://vancouver.php.net/", "vancouver_conference_2007.gif", "PHP Vancouver 2007"); ?>
<h1>Vancouver PHP Conference</h1>
<p>
 <span class="newsdate">[21-Dec-2006]</span>
The <a href="http://vancouver.php.net/">Vancouver PHP User Group</a> is pleased 
to announce their second PHP Conference in Vancouver, B.C., Canada on 
February 12-13, 2007. The 
<a href="http://vancouver.php.net/confschedule">schedule</a> is now online.
</p>

<p>
<a href="http://vancouver.php.net/register">Register</a> by Dec. 31, 2006 
and get 1/3rd off the ticket price.  Regular price is $150CDN, early bird price $100CDN.
</p>

<hr />


<?php
// NO MORE NEWS TO PARSE
site_footer(
    array("rss" => "/conferences/news.rss") // Add a link to the feed
);

