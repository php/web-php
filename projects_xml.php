<?
require("./include/shared.inc");
commonHeader("Projects");

?>
<h3>Projects using PHP</h3>

<p>An increasing number of projects, both commercial and open source,
are using PHP as their main development tool. This is a listing of
some of the open-source PHP applications available.</p>

<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH=100%>

<?php
// harcoded xsl and xml names
$xsl_name = "projects.xsl";
$xsl = implode("",file($xsl_name));

$xml_name = "projects.xml";
$xml = implode("", file($xml_name));

if ( !xslt_process($xsl, $xml, &$result) ) {
	echo xslt_error();
	echo "ERROR ".$php_error_msg;
	exit;
} else {
	echo $result;
}

?>

<TR bgcolor='#D0D0D0' valign=top>
<TD ALIGN=left WIDTH=18><IMG ALT=" " SRC="gifs/gcap-lefttop.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
<TD VALIGN=middle ALIGN=left rowspan=2>
If you have a project you feel belongs on this list, send us email us at
<A HREF="mailto:projects@php.net">projects@php.net</A> (we consider a project to be
a software package where the code is available for download).
<BR></TD>
<TD ALIGN=right WIDTH=18><IMG ALT=" " SRC="gifs/gcap-righttop.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
</TR>
<TR VALIGN=bottom bgcolor='#D0D0D0'>
<TD ALIGN=left><IMG alt=" " SRC="gifs/gcap-leftbot.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
<TD ALIGN=right><IMG alt=" " SRC="gifs/gcap-rightbot.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
</TR>

</TABLE>

<? commonFooter(); ?>
