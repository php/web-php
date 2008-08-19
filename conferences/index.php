<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'conferences/index.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include $_SERVER['DOCUMENT_ROOT'] . '/include/pregen-events.inc';
include $_SERVER['DOCUMENT_ROOT'] . '/include/pregen-news.inc';

site_header("PHP Conferences around the world", array(
  'headtags' => '<link rel="alternate" type="application/atom+xml" title="PHP: Conference announcements" href="' . $MYSITE . 'feed.atom" />',
));


column_box(COLUMN_LEFT);
?>
<div id="contact">
  <p>
    Are you planning a PHP related conference and want it listed here?
    <a href="/contact">Let us know.</a>
  </p>
</div>
<?php
echo $EVENTS_DATA;

column_box();
column(COLUMN_MAIN);

print_news($NEWS_ENTRIES, array("conferences", "cfp"), 10);
?>
      <p class="t-center"><a href="/archive/index.php"><strong>News Archive</strong></a></p>
<?php
column();
site_footer(
    array("atom" => "/feed.atom") // Add a link to the feed
);

