<?php require "header.inc"?>
<h1>Branching Control Structures</h1>
<?example('<?if ($i < 0) {
        echo "Negative.";
    } else if ($i == 0) {
        echo "Zero.";
    } else {
        echo "Positive.";
    }?>');?>
<?example('<?switch($var) {
        case 1: echo "The number 1."; break; 
        case "foo": echo "The string \'foo\'."; break;
        default: echo "default"; break;
    }?>');?>
<?php require "footer.inc"?>
