<?php

function example($text) {
    echo "<div class=\"example\"><table width=\"95%\" border=0 cellpadding=7 cellspacing=3><tr bgcolor=#d0d0d0><td><font size='-1'>";
    highlight_string($text);
    echo "</font></td></tr></table></div>";
}

function output($text) {
    echo "Output:<br>\n";
    echo "<DIV CLASS=\"output\"><FONT SIZE=\"-1\">$text</FONT></DIV>\n";
    echo "<BR>\n";
}

?>
<HTML>
<HEAD>
<SCRIPT LANGUAGE="JavaScript" SRC="style2.js"></SCRIPT>
<LINK REL=STYLESHEET TYPE="text/css" HREF="style.css">
</HEAD>
<BODY text="white" bgcolor="black" link="teal" vlink="teal" alink="red">
<BR>
