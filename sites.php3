<?
	$title="High-Profile sites running PHP";
	require("include/header.inc");	

	function site($name,$domain) {
		echo "<a href=\"http://$domain\">$name</a><br>\n";
	}

	function title($text) {
		echo "<td bgcolor=#032F5B><center><font size=+1 color=#ffffff><b>$text</b></font></center></td>\n";
	}

	echo "<p><center><table border=1 cellpadding=15><tr>\n";

	title("Sports Teams");
	title("Auto Industry");
	title("Hi-Tech Industry");

	echo "</tr><tr><td align=top>\n";

	/* Sports Teams */
	site("NFL's Denver Broncos","www.denverbroncos.com");
	site("NFL's Oakland Raiders","www.raiders.com");

	echo "<br></td><td align=top>\n";

	/* Auto Industry */
	site("Mitsubishi Motors","www.mitsucars.com");

	echo "<br></td><td align=top>\n";

	/* Hi-Tech Industry */
	

	echo "<br></td>\n";
	echo "</tr></table></center>\n";

	require("include/footer.inc");
?>
