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

    $nixtimestamp = date_create($entry["updated"]);
    if(isset($entry["finalTeaserDate"])) {
        $nixtimestamp = date_create($entry["finalTeaserDate"]);
    }

    $date = date_format($nixtimestamp, 'd M Y');
    $date_w3c = date_format($nixtimestamp, DATE_W3C);

    $content .= '<article class="news__item" itemscope itemtype="https://schema.org/Event">';
    $content .= '<div class="news__heading">';
    $content .= '<div class="news__title">';
    $content .= '<a href="' . $link . '" id="' . $id . '" itemprop="name">' . $entry["title"] . '</a>';
    $content .= '</div>';
    $content .= '<div class="news__date" itemprop="startDate" content="' . $date_w3c . '"><time datetime="' . $date_w3c . '">' . $date . '</time></div>';
    $content .= '</div>';

    $content .= '<div class="news__content">';
    $content .= '<div class="news__text" itemprop="description">' . $entry["content"] . '</div>';
    $content .= '<div class="news__image">';
    $content .= sprintf('<a href="%s"><img src="/images/news/%s" itemprop="image" alt="%s"></a>', $entry["newsImage"]["link"], $entry["newsImage"]["content"], $entry["title"]);
    $content .= '</div>';
    $content .= '</div>';
    $content .= '</article>';
}
$content .= "</div>";

echo $content;

site_footer([
    "atom" => "/feed.atom",
    "elephpants" => true,
    "sidebar" => $panels,
]);
