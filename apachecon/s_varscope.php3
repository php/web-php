<?php require "header.inc"?>
<H1>Variable Scope</H1>

<UL>
<LI>Global scope
<LI>Local scope (in functions)
<?example('<?php
function setmsie() {
    global $HTTP_USER_AGENT, $msie;
    $msie = strstr($HTTP_USER_AGENT, "MSIE");
}
?>');?>
<LI>GLOBALS array
<?example('<?php
function setmsie() {
    $GLOBALS["msie"] = strstr($GLOBALS["HTTP_USER_AGENT"], "MSIE");
}
?>');?>
</UL>


<?php require "footer.inc"?>
