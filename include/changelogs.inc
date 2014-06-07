<?php
/* $Id$ */

function bugfix($number) { 
    echo "Fixed bug "; bugl($number); 
}

function bugl($number) { 
    echo "<a href=\"http://bugs.php.net/$number\">#$number</a>"; 
}

function peclbugfix($number) { 
    echo "Fixed PECL bug "; bugl($number); 
}

function peclbugl($number) { 
    echo "<a href=\"http://pecl.php.net/bugs/bug.php?id=$number\">#$number</a>"; 
}

function release_date($in) {
    $time = strtotime($in);
    $human_readable = date('d M Y', $time);
    $for_tools = date('Y-m-d', $time);
    echo "<time class='releasedate' datetime='{$for_tools}'>{$human_readable}</time>";
}

?>