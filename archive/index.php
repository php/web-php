<?php
include_once __DIR__ . '/../include/prepend.inc';
$i = 0;
do {
    $y = date("Y") - $i;
    if (file_exists("./$y.php")) {
        mirror_redirect("/archive/$y.php");
        break;
    }
} while (++$i < 3);

include_once __DIR__ . '/../include/errors.inc';
error_noservice();
