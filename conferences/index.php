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

    $content .= '<div class="news__item">';
    $content .= '<div class="news__content">';
    $content .= '<div class="news__date">' . $date . '</div>';
    $content .= '<div class="news__title"><a href="' . $MYSITE . $link . '" id="' . $id . '">' . $entry["title"] . '</a></div>';
    $content .= '<div class="news__text">' . $entry["content"] . '</div>';
    $content .= '</div>';
    $content .= '<div class="news__image">';
    $content .= sprintf('<a href="%s"><img src="/images/news/%s"></a>', $entry["newsImage"]["link"], $entry["newsImage"]["content"]);
    $content .= '</div>';
    $content .= '</div>';
}
$content .= "</div>";

echo $content;

site_footer([
    "atom" => "/feed.atom",
    "elephpants" => true,
    "sidebar" => $panels,
]);
