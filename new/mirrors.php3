<?
require("shared.inc");
commonHeader("Mirrors Page");
?>
<FORM ACTION="redirect.php3" METHOD="POST">
<B>Pick a mirror site close to you:</B><BR>
<SELECT NAME="URL"><?
$mirror_sites=$MIRRORS;
reset($mirror_sites);
while ($site = key($mirror_sites)):
	next($mirror_sites);
	$place=$mirror_sites[$site][1];
	echo "<OPTION VALUE=\"$site\">$place\n";
endwhile;
?></SELECT>
<INPUT TYPE="image" SRC="gifs/b-go.gif" ALIGN=absmiddle WIDTH=36 HEIGHT=21 BORDER=0><BR>
</FORM>
<?
commonFooter();
?>
