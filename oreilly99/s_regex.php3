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

?>');
?>
<?php
$out = "";
$a = explode(":", "This:string:has:delimiters.");
while (list(,$value) = each($a)) {
    if (strcmp($value, "has") == 0) {
        $out .= "had ";
    } else {
        $out .= $value." ";
    }
}
output($out);
?>
<BR>
<H1>Regular Expression Handling</H1>

<?example('<?php
    echo ereg_replace(\'will be ([[:alpha:]]+)\', \'has been \\1\', \'This string will be modified.\');
?>');?>
<?php output(ereg_replace('will be ([[:alpha:]]+)',
             'has been \1', 'This string will be modified.')); ?>

<?php require "footer.inc"?>
