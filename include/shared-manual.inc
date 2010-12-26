<?php
function manual_setup($setup) {
}

function manual_header() {
    $_SERVER['BASE_PAGE'] = "manual/en/function.strpos.php";
    site_header("Manual page", array("current" => "docs"));
}
function manual_footer() {
    site_footer();
}

require __DIR__ . "/layout.inc";


