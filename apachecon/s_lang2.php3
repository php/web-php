<?php require "header.inc"?>
<h6>Syntax and switching modes</h6>
<?example('<?php
if(strstr($HTTP_USER_AGENT,"MSIE")):
?>
<b>You are using Internet Explorer</b>
<?php
else:
?>
<b>You are not using Internet Explorer</b>
<?php
endif;
?>');?>
<h6>Output:</h6>
<h6><?php
if(strstr($HTTP_USER_AGENT,"MSIE")):
?>
<b>You are using Internet Explorer</b>
<?php
else:
?>
<b>You are not using Internet Explorer</b>
<?php
endif;
?></h6>
<?php require "footer.inc"?>
