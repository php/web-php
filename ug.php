<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'ug.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

site_header("Hypertext Preprocessor",
    array(
        'current' => 'community',
        //'intro' => $intro
    )
);


$json = file_get_contents("./include/events.json");
$all = json_decode($json, true);

$groupped = array_fill_keys(array_keys($COUNTRIES), array("ug" => array(), "conf" => array()));
foreach($all as $type => $event) {
        $category = $event["category"] == 1 ? "ug" : "conf";
        $groupped[$event["country"]][$category][] = $event;
}
function format_event_date($starts, $ends, $usually) {
    if ($ends) {
        $starts = date_format(date_create($starts), 'F jS, Y');
        $ends = date_format(date_create($ends), 'F jS, Y');
        return "$starts to $ends";
    }
    if ($starts && !$usually) {
        $starts = date_format(date_create($starts), 'Y-m-d');
        return $starts;
    }
    $days = array(1 => "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
    $recur = array(
        -3 => "third last",
        -2 => "second last",
        -1 => "last",
        1  => "first",
        2  => "second",
        3  => "third",
        4  => "fourth",
    );

    list($rec, $day) = explode(":", $usually);
    $time = strtotime($recur[$rec]. " " . $days[$day] . " of this month");
    if ($time > strtotime("tomorrow")) {
        $time = strtotime($recur[$rec]. " " . $days[$day] . " of next month");
    }
    return date_format(date_create("@$time"), "l, F jS, Y");
}

$SIDEBAR = "";
$content = "";
$first = false;
foreach($groupped as $country => $events) {
    if (!$events["ug"] && !$events["conf"]) continue;

    $countrycode = $COUNTRIES[$country];
    $SIDEBAR .= '<p class="panel"><a href="#' . $country . '">' . $countrycode . '</p>';
    $entry = "";

    $entry .= '<div class="country" id="' . $country. '">';
    $entry .= '<h2 class="title countrytitle">' . $countrycode;
    $entry .= '<img alt="' . $countrycode . '" height="25" width="45" src="' . $_SERVER['STATIC_ROOT'] . '/images/flags/beta/' . strtolower($country) . '.png">';
    $entry .= '</h2>';
    if ($events["ug"]) {
        $entry .= "<h2 class='title'>User Groups in $countrycode</h2>";
    }

    foreach($events["ug"] as $event) {
        $link = $event["url"];
        $date = format_event_date($event["sdato"], $event["edato"], $event["recur"]);
        $entry .= '<div class="newsentry">';
        $entry .= "<div class='newstime'>$date</div>";
        $entry .= '<h3 class="newstitle"><a href="'. $link .'">' . $event["sdesc"];
        $entry .= '</a>'.'</h3>';
        $entry .= '<div class="newscontent">';
        $entry .= nl2br($event["ldesc"]);
        $entry .= '</div>';
        $entry .= '</div>';
    }
    if ($events["conf"]) {
        $entry .= "<h2 class='title'>Conferences in $countrycode</h2>";
    }
    foreach($events["conf"] as $event) {
        $link = $event["url"];
        $date = format_event_date($event["sdato"], $event["edato"], $event["recur"]);
        $entry .= '<div class="newsentry">';
        $entry .= '<h3 class="newstitle"><a href="'. $link .'">' . $event["sdesc"];
        $entry .= "<div class='newstime'>$date</div>";
        $entry .= '</a>'.'</h3>';
        $entry .= '<div class="newscontent">';
        $entry .= $event["ldesc"];
        $entry .= '</div>';
        $entry .= '</div>';
    }
    $entry .= "</div>";

    if ($COUNTRY == $country) {
        $first = $entry;
    }
    $content .= $entry;
}

echo "<div class='home-content'>";
if ($first) {
    echo $first;
}
echo $content;
echo "</div>";


// Print the common footer.
site_footer(
    array(
        "atom" => "/feed.atom", // Add a link to the feed at the bottom
        //'elephpants' => true,
        'sidebar' => $SIDEBAR
    )
);

