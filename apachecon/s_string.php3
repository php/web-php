<?php require "header.inc"?>
<H1>String Handling</H1>

<?example('<?php
    $a = explode(":", "This:string:has:delimiters.");
    while (list(,$value) = each($a)) {
        if (strcmp($value, "has") == 0) {
            echo "had ";
        } else {
            echo $value." ";
        }
    }
?>');?>
<H6>Output:</H6><BLOCKQUOTE>
<?php
    $a = explode(":", "This:string:has:delimiters.");
    while (list(,$value) = each($a)) {
        if (strcmp($value, "has") == 0) {
            echo "had ";
        } else {
            echo $value." ";
        }
    }
?>
</BLOCKQUOTE>

<?php require "footer.inc"?>
