<?php require "header.inc"?>
<H1>URL Manipulation</H1>

<?example('<?php
    $url = parse_url("http://php.net/bugs.php3?id=3#body");
    while (list($key, $value) = each($url)) {
        echo "$key: $value<BR>";
    }
?>');?>
<H6>Output:</H6><BLOCKQUOTE>
<h6>
<?php
    $url = parse_url("http://php.net/bugs.php3?id=3#body");
    while (list($key, $value) = each($url)) {
        echo "$key: $value<BR>";
    }
?>
</h6>
</BLOCKQUOTE>

<?php require "footer.inc"?>
