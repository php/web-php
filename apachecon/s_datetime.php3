<?php require "header.inc"?>
<H1>Date and Time Handling</H1>

<?example('<? echo date("M d, Y H:i:s", time());?>');?>
<H6>Output:</H6><BLOCKQUOTE><? echo date("M d, Y H:i:s", time());?></BLOCKQUOTE>
<?/*example('<? echo date("M d, Y H:i:s", gmtime());?>');*/?>
<?#echo date("M d, Y H:i:s", gmtime());?>

<?example('<? echo date("M d, Y H:i:s", time()+7*24*60*60);?>');?>
<H6>Output:</H6><BLOCKQUOTE><? echo date("M d, Y H:i:s", time()+7*24*60*60);?></BLOCKQUOTE>

<H2>Calendar Conversions</H2>
<UL>
<LI>Converts between calendars (Julian, Gregorian, Mayan, etc)
<LI>Supplied as an example extension.
</UL>

<?php require "footer.inc"?>
