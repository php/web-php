<?php

use phpweb\News\ConferenceSchedule;
use phpweb\News\NewsHandler;

$_SERVER['BASE_PAGE'] = 'conferences/index.php';
require_once __DIR__ . '/../../include/prepend.inc';

// Disable LAST_NEWS cookie as its busting the CDN cache — disabling temporarily (or not) — Derick
// mirror_setcookie("LAST_NEWS", $_SERVER["REQUEST_TIME"], 60 * 60 * 24 * 365);

site_header("PHP Conferences around the world", [
    'headtags' => '<link rel="alternate" type="application/atom+xml" title="PHP: Conference announcements" href="' . $MYSITE . 'feed.atom">',
    'current' => 'community',
    'css' => ['home.css'],
]);

$today = gmdate('Y-m-d');
$schedule = new ConferenceSchedule((new NewsHandler())->getConferences(), $today);

// The page has two views, switched via ?view=: the default view, which lists
// conferences only (targeted at attendees/sponsors), and the call-for-papers
// view, which lists CFPs only, split into open and closed (targeting speakers).
$view = ($_GET['view'] ?? null) === 'cfps' ? 'cfps' : 'conferences';

// Build nav for switching between views
$viewLinks = [
    'conferences' => ['label' => 'Conferences', 'href' => '/conferences/'],
    'cfps' => ['label' => 'Calls for papers', 'href' => '/conferences/?view=cfps'],
];

$viewSwitcher = '<nav class="conference-views" aria-label="Conference views">';
foreach ($viewLinks as $key => $viewLink) {
    $isActive = $key === $view;
    $viewSwitcher .= sprintf(
        '<a class="conference-view%s" href="%s"%s>%s</a>',
        $isActive ? ' is-active' : '',
        $viewLink['href'],
        $isActive ? ' aria-current="page"' : '',
        $viewLink['label'],
    );
}
$viewSwitcher .= '</nav>';

$renderEntry = static function (array $entry) use ($MYSITE, $today): string {
    $link = preg_replace('~^(http://php.net/|https://www.php.net/)~', '', $entry["id"]);
    $id = parse_url($entry["id"], PHP_URL_FRAGMENT);

    $html = '<div class="newsentry">';
    $html .= '<h3 class="newstitle title"><a href="' . $MYSITE . $link . '" id="' . $id . '">' . $entry["title"] . '</a></h3>';

    if (isset($entry["finalTeaserDate"])) {
        $isPast = $entry["finalTeaserDate"] < $today;
        if (ConferenceSchedule::termFor($entry) === 'cfp') {
            $label = $isPast ? 'CFP closed' : 'CFP closes';
        } else {
            $label = $isPast ? 'Started' : 'Starts';
        }
        $html .= '<p class="newsdate">' . $label . ' <time datetime="' . $entry["finalTeaserDate"] . '">' . date_format(date_create($entry["finalTeaserDate"]), 'd M Y') . '</time></p>';
    }

    $html .= '<div class="newsimage">';

    if (isset($entry["newsImage"])) {
        $html .= sprintf('<a href="%s"><img src="/images/news/%s"></a>', $entry["newsImage"]["link"], $entry["newsImage"]["content"]);
    }

    $html .= '</div>';
    $html .= '<div class="newscontent">';
    $html .= $entry["content"];
    $html .= '</div>';
    $html .= '</div>';

    return $html;
};

$content = "<div class='home-content'>";
$content .= $viewSwitcher;

if ($view === 'cfps') {
    $content .= '<h2>Open calls for papers</h2>';

    if ($schedule->openCallsForPapers === []) {
        $content .= '<p>No open calls for papers right now.</p>';
    } else {
        foreach ($schedule->openCallsForPapers as $entry) {
            $content .= $renderEntry($entry);
        }
    }

    if ($schedule->closedCallsForPapers !== []) {
        $content .= '<h2 class="conferences-divider">Closed calls for papers</h2>';

        foreach ($schedule->closedCallsForPapers as $entry) {
            $content .= $renderEntry($entry);
        }
    }
} else {
    $content .= '<h2>Upcoming conferences</h2>';

    if ($schedule->upcomingConferences === []) {
        $content .= '<p>No upcoming conferences right now.</p>';
    } else {
        foreach ($schedule->upcomingConferences as $entry) {
            $content .= $renderEntry($entry);
        }
    }

    if ($schedule->pastConferences !== []) {
        $content .= '<h2 class="conferences-divider">Past conferences</h2>';

        foreach ($schedule->pastConferences as $entry) {
            $content .= $renderEntry($entry);
        }
    }
}

$content .= "</div>";

echo $content;

// Build sidebar mirroring the active view: conferences grouped into upcoming/past, or CFPs into open/closed.
$panels = '<p class="prepend"><a href="https://wiki.php.net/conferences">Want to see your conference appear here?</a></p>';

$renderPanels = static function (array $entries): string {
    $html = '';
    foreach ($entries as $entry) {
        $link = preg_replace('~^(http://php.net/|https://www.php.net/)~', '', $entry["id"]);
        $html .= sprintf('<p class="panel"><a href="%s">%s</a></p>', $entry["newsImage"]["link"] ?? $link, $entry["title"]);
    }

    return $html;
};

if ($view === 'cfps') {
    if ($schedule->openCallsForPapers !== []) {
        $panels .= '<h3>Open</h3>' . $renderPanels($schedule->openCallsForPapers);
    }

    if ($schedule->closedCallsForPapers !== []) {
        $panels .= '<h3>Closed</h3>' . $renderPanels($schedule->closedCallsForPapers);
    }
} else {
    if ($schedule->upcomingConferences !== []) {
        $panels .= '<h3>Upcoming</h3>' . $renderPanels($schedule->upcomingConferences);
    }

    if ($schedule->pastConferences !== []) {
        $panels .= '<h3>Past</h3>' . $renderPanels($schedule->pastConferences);
    }
}

site_footer([
    "atom" => "/feed.atom",
    "elephpants" => true,
    "sidebar" => $panels,
]);
