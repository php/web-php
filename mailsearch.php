<?
require("shared.inc");
commonHeader("Search PHP mailing lists");
?>
<form action="http://www.progressive-comp.com/Lists/" method=GET>
<input type=hidden name="l" value="php3-general">
<input type=hidden name="r" value="1">
<input type=hidden name="w" value="2">
Search for: <input type=text name="s">
<input type=submit value="Search PHP 3.0 List">
</form>

<form action="http://www.progressive-comp.com/Lists/" method=GET>
<input type=hidden name="l" value="php-dev">
<input type=hidden name="r" value="1">
<input type=hidden name="w" value="2">
Search for: <input type=text name="s">
<input type=submit value="Search PHP Developers' List">
</form>
<? commonFooter(); ?>
