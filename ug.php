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
    global $COUNTRIES;
    ?>
    <div class="country" id="<?php echo $country ?>">
    <h2 class="title countrytitle">User Groups in <?php echo $COUNTRIES[$country] ?>
        <img height="25" width="45" src="/images/flags/beta/<?php echo strtolower($country) ?>.png">
    </h2>
    <ul class="ugs">
    <?php
}
function print_ug_matches($matches) {
    $content = "";
    foreach($matches as $group) {
        echo '<li class="ug"><a href="'. $group["url"].'">' . $group["name"] . " (" . $group["shortname"] . ")</a></li>";
    }
    if (!$matches) {
        echo "<li>There are no known User Groups in {$COUNTRIES[$country]} at this time :(</li>";
    }
    echo "</ul>";
}

$country = isset($_GET["cc"]) ? $_GET["cc"] : $COUNTRY;

if (isset($COUNTRIES[$country])) {
    $matches = get_usergroups_in($country);
    print_cc_header($country);
    print_ug_matches($matches);
} else {
    echo "<h1>Unknown country</h1>";
}



$SIDEBAR_DATA = <<< EOF
    <p class="panel"><a href="http://php.ug/ug/promote">Register new UG</a></p>
EOF;

// Print the common footer.
site_footer(
    array(
        "atom" => "/feed.atom", // Add a link to the feed at the bottom
        "sidebar" => $SIDEBAR_DATA,
    )
);

