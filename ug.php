<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'ug.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

mirror_setcookie("LAST_UG", $_SERVER["REQUEST_TIME"]+60*60*24, 60*60*24);
site_header("Hypertext Preprocessor",
    array(
        'current' => 'community',
    )
);


function print_cc_header($country) {
    global $COUNTRIES_ALPHA2;
    ?>
    <div class="country" id="<?php echo $country ?>">
    <h2 class="title countrytitle">User Groups in <?php echo $COUNTRIES_ALPHA2[$country] ?>
        <img height="25" width="45" src="/images/flags/beta/<?php echo strtolower($country) ?>.png">
    </h2>
    <ul class="ugs">
    <?php
}
function ug_get_more_info($group) {
    if (! trim($group["icalendar_url"])) {
        return null;
    }
    $url = $group["icalendar_url"];

    $filename = "backend/events/" . md5($url);

    /* Broken icalendar link */
    if (!file_exists($filename)) {
        return null;
    }
    $data = file($filename, FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);
    $retval = ug_get_next_even_from_ical_array($data);

    return $retval;
}
function ug_get_next_even_from_ical_array($ical) {
    $ok = false;
    $data = array();
    foreach($ical as $line) {
        if ($line == "BEGIN:VEVENT") {
            do {
                if ($line[0] == " ") {
                    // data continued from previous key
                    $data[$lastkey] .= ltrim($line);
                } else {
                    list($lastkey, $value) = explode(":", $line, 2);
                    $data[$lastkey] = $value;
                }
            } while((list($n, $line) = each($ical)) && $line != "END:VEVENT");
            break;
        }
    }
    if (!isset($data["DTSTAMP"])) {
        /* There is no scheduled next meeting */
        return array();
    }
    /* Meetup.com seems to have fetish for injecting the TZ into the keyname */
    if (isset($data["TZID"])) {
        $data["STARTSAT"] = $data["DTSTART;TZID={$data["TZID"]}"];
    } else {
        $data["STARTSAT"] = $data["DTSTART"];
    }

    // Yes.. Replace literal '\n' with new line
    $data["DESCRIPTION"] = str_replace('\n', "\n", $data["DESCRIPTION"]);
    return array("event" => $data);
}
function print_ug_matches($matches) {
    global $COUNTRIES_ALPHA2, $country;
    $content = "";
    echo '<dl>';
    foreach($matches as $group) {
        $data = ug_get_more_info($group);
        $details = "";
        if ($data && $data["event"]) {
            $d = date(DATE_RSS, strtotime($data["event"]["STARTSAT"], $_SERVER["REQUEST_TIME"]));
            $url         = isset($data["event"]["URL"]) ? addslashes($data["event"]["URL"]) : "";
            $summary     = htmlspecialchars($data["event"]["SUMMARY"]);
            /* The icalendar has all sorts of weird trailing slashes and totally weirdo 
             * newlines making this look like geocities */
            //$description = nl2br(htmlspecialchars($data["event"]["DESCRIPTION"]), false);
            if ($url) { /* Google Calendar doesn't have this */
                $details = "{$d} - <a href='$url'>{$summary}</a>"; //<br>" . $description;
            } else {
                $details = "{$d} - $summary";// . $description;
            }
        }
        echo '<dt class="ug"><a href="'. $group["url"].'">' . $group["name"] . "</a></dt><dd>$details</dd>";
    }
    if (!$matches) {
        echo "<dt>Sorry</dt><dd>There are no known User Groups in {$COUNTRIES_ALPHA2[$country]} at this time :(</dd>";
    }
    echo "</dl>";
}

$country = isset($_GET["cc"]) ? $_GET["cc"] : $COUNTRY;
$allcountries = array();
if (isset($COUNTRIES_ALPHA2[$country])) {
    $matches = get_usergroups_in($country, $allcountries);
    print_cc_header($country);
    print_ug_matches($matches);
} else {
    echo "<h1>Unknown country</h1>";
}

uksort($allcountries, function($first, $second){
    global $COUNTRIES_ALPHA2;
    return strnatcasecmp($COUNTRIES_ALPHA2[$first], $COUNTRIES_ALPHA2[$second]);
});

$SIDEBAR_DATA = <<< EOF
    <p class="panel"><a href="http://php.ug/ug/promote">Register new UG</a></p>
EOF;
foreach($allcountries as $country => $nada) {
    $SIDEBAR_DATA .= '<p class="panel"><a href="/ug.php?cc=' . $country . '">' . $COUNTRIES_ALPHA2[$country] . '</a></p>';
}

// Print the common footer.
site_footer(
    array(
        "atom" => "/feed.atom", // Add a link to the feed at the bottom
        "sidebar" => $SIDEBAR_DATA,
    )
);

