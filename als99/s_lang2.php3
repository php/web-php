<?php require "header.inc"?>
<h1>Syntax and switching modes</h1>
<?example('<?php if(strstr($HTTP_USER_AGENT,"MSIE")) { ?>

<b>You are using Internet Explorer</b>

<?php } else { ?>

<b>You are not using Internet Explorer</b>

<?php } ?>');?>
<h1>Output:</h1>
<font size="-1"><?php
if(strstr($HTTP_USER_AGENT,"MSIE")) {
    output('<b>You are using Internet Explorer</b>');
} else {
    output('<b>You are not using Internet Explorer</b>');
}
?>
<?php require "footer.inc"?>
