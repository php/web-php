<?
if (isset($country)) {
  header("Location: http://$country.php.net/");
}
commonHeader("Mirrors Page");
?>
<h1>
Mirror Sites
</h1>
<p>
Pick a mirror site close to you:
</p>

<p>
<FORM ACTION="redirect.php" METHOD="POST">
<SELECT NAME="URL"><?
$mirror_sites=$MIRRORS;
reset($mirror_sites);
while ($site = key($mirror_sites)) {
	next($mirror_sites);
	$country=$mirror_sites[$site][0];
	$place=$mirror_sites[$site][1];
	$type=$mirror_sites[$site][4];
	if ($type==1 && substr($site,0,7)=="http://") {
		echo "<OPTION VALUE=\"$site\">$place ($COUNTRIES[$country])\n";
	}
}
?></SELECT>
<INPUT TYPE="submit" VALUE=" Go "><BR>
</FORM>
</p>

<p>
If you are interested in hosting a mirror of this site, 
<? print_link("/README.mirror", "here's how"); ?>.
</p>
<?
commonFooter();
?>
