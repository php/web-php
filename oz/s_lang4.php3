<?php require "header.inc"?>
<h1>Control Structures</h1>
<?example('<?php
for ($loop = -5; $loop < 5; $loop++) {
    if ($i < 0) {
        echo "-";
    } elseif ($i > 0) {
        echo "+";
    }
    echo "$loop<BR>\n";
}

while (list($name, $value) = each($GLOBALS)) {
    switch (gettype($value)) {
      case "string":
        echo "$name = \"$value\"<BR>\n";
        break;
      default:
        echo "$name = $value<BR>\n";
        break;
    }
}

do {
    echo "$loop<BR>";
} while (++$loop < 10);
?>');?>
<?php require "footer.inc"?>
