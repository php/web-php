<?php require "header.inc"?>
<H1>Fast Language Introduction</H1>

<?example('<HTML><HEAD><TITLE>Simple Example</TITLE></HEAD>
<BODY>
<P>Welcome to the PHP Intro
<?php if (strstr($HTTP_USER_AGENT,"MSIE")):?>
<P>You are using Internet Explorer.
<?php else: ?>
<P>You are not using Internet Explorer.
<?php endif;?>
<?php for ($i = 1; $i <= 5; $i++) {
        echo "<P>This is the $i";
        switch ($i) {
        case 1: echo "st"; break;
        case 2: echo "nd"; break;
        case 3: echo "rd"; break;
        default: echo "th"; break;
        }
        echo " time through this loop.";
    }?>
</BODY></HTML>');?>

<?php require "footer.inc"?>
