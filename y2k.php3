<?
require("shared.inc");
commonHeader("Year 2000 Compliance and PHP");
?>
Like Perl, PHP is about as Year 2000 compliant as your pencil.  It is the applications
you write with PHP you need to worry about, not PHP itself.

There is an issue with the dates in cookies.  We have found that not all browsers understand
4-digit years in the cookie expiry time.  But they all accept 2-digit years.  If you do not
care about these non-compliant browsers, then feel free to change the <b>y2k_compliance</b>
configuration setting in the php3.ini file.

<?
commonFooter();
?>
