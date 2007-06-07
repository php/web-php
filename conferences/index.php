<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'conferences/index.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/pregen-events.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/pregen-news.inc';


$layout_workaround = <<< EOT
<div id="conferencesSidebar">
    <div id="contact">
        <p>
            Are you planning a PHP related conference and want it listed here?
            <a href="/contact">Let us know.</a>
        </p>
    </div>
    $RSIDEBAR_DATA
</div>
EOT;

unset($RSIDEBAR_DATA);

site_header("PHP Conferences around the world", array("layout_workaround" => $layout_workaround, 'headtags' => '<link rel="alternate" type="application/rss+xml" title="PHP: Conference announcements" href="' . $MYSITE . 'conferences/news.rss" />'));

print_news($NEWS_ENTRIES["conferences"]);

site_footer(
    array("rss" => "/conferences/news.rss") // Add a link to the feed
);

