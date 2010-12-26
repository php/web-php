<?php
function manual_setup($setup) {
    $siblings = array();
    foreach($setup["toc"] as $entry) {
        $siblings[] = array(
            "title" => $entry[1],
            "link"  => $entry[0],
        );
    }
    $menu = array(
        array(
            "title" => $setup["up"][1],
            "link"  => $setup["up"][0],
            "children" => $siblings,
        ),
    );

    $_SERVER['BASE_PAGE'] = "/manual/en/function.strpos.php";
    site_header("Manual page", array("current" => "docs", "leftmenu" => $menu));
    
    echo '<div class="layout-content">';
}

function manual_header() {
    /* No longer used. see manual_setup() */
}
function manual_footer() {
    echo '</div>'; // layout-content
    site_footer();
}

require __DIR__ . "/layout.inc";


