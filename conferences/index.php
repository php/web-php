<?php

use phpweb\News\NewsHandler;

$_SERVER['BASE_PAGE'] = 'conferences/index.php';
include_once __DIR__ . '/../include/prepend.inc';

mirror_setcookie("LAST_NEWS", $_SERVER["REQUEST_TIME"], 60 * 60 * 24 * 365);
site_header("PHP Conferences around the world", [
    'headtags' => '<link rel="alternate" type="application/atom+xml" title="PHP: Conference announcements" href="' . $MYSITE . 'feed.atom">',
    'current' => 'community',
    'css' => ['home.css'],
]);

$content = "<div class='home-content'>";
$panels = '<p class="prepend"><a href="https://wiki.php.net/conferences">Want to see your conference appear here?</a></p>';

foreach ((new NewsHandler())->getConferences() as $entry) {
    $link = preg_replace('~^(http://php.net/|https://www.php.net/)~', '', $entry["id"]);
    $id = parse_url($entry["id"], PHP_URL_FRAGMENT);
    $date = date_format(date_create($entry["updated"]), 'Y-m-d');
    $content .= '<div class="newsentry">';
    $content .= '<h3 class="newstitle title"><a href="' . $MYSITE . $link . '" id="' . $id . '">' . $entry["title"] . '</a></h3>';
    $content .= '<div class="newsimage">';

    if (isset($entry["newsImage"])) {
        $content .= sprintf('<a href="%s"><img src="/images/news/%s"></a>', $entry["newsImage"]["link"], $entry["newsImage"]["content"]);
    }

    $content .= '</div>';
    $content .= '<div class="newscontent">';
    $content .= $entry["content"];
    $content .= '</div>';
    $content .= '</div>';

    $panels .= sprintf('<p class="panel"><a href="%s">%s</a></p>', $entry["newsImage"]["link"] ?? $link, $entry["title"]);
}
$content .= "</div>";

echo $content;

site_footer([
    "atom" => "/feed.atom",
    "elephpants" => true,
    "sidebar" => $panels,
]);
