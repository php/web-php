<?
require("shared.inc");
commonHeader("Year 2000 Compliance and PHP");
?>
Like Perl, PHP is about as Year 2000 compliant as your pencil.  It is the applications
you write with PHP you need to worry about, not PHP itself.<P>

There is an issue with the dates in cookies.  Netscape originally specified that the expiry
date on a cookie should be in a 2-digit year format.  Due to all the y2k hype, they decided to
change this behaviour in Netscape 4 and up.  This doesn't mean that the 2-digit year is not
y2k compliant.  A 2-digit year of &quot;13&quot;, for example will be understood as the year
2013 in Netscape.  All browsers understand this 2-digit format, and thus this is the 
default in PHP.  Some y2k fanatics still insist on never using a 2-digit year no matter
what, and for those people PHP has a <b>y2k_compliance</b> configuration setting available in
the <i>php3.ini</i> file.

<?
commonFooter();
?>
