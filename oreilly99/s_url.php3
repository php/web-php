<?php require "header.inc"?>
<H1>URL Manipulation</H1>

<?example('<?php

$url = parse_url("http://php.net/bugs.php3?id=3#body");
while (list($key, $value) = each($url)) {
    echo "$key: $value<BR>";
}

?>');?>

<H2>Output:</H2><BLOCKQUOTE>
<?php
    $url = parse_url("http://php.net/bugs.php3?id=3#body");
    while (list($key, $value) = each($url)) {
        echo "$key: $value<BR>";
    }
?>
</BLOCKQUOTE>

<?php require "footer.inc"?>
