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
	title("Auto");
	title("Hi-Tech");


	echo "</tr><tr><td align=top>\n";

	/* Sports Teams */
	site("NFL's Denver Broncos","www.denverbroncos.com");
	site("NFL's Oakland Raiders","www.raiders.com");

	echo "<br></td><td align=top>\n";

	/* Auto Industry */
	site("Mitsubishi Motors","www.mitsucars.com");

	echo "<br></td><td align=top>\n";

	/* Hi-Tech Industry */
	site("Fujitsu","www.fujitsu.com");	

	echo "<br></td>\n";

	echo "</tr><tr>\n";
	title("Telecommunications");
	title("Travel");
	title("Religious");

	echo "</tr><tr><td align=top>\n";

	/* Telecommunications */
	site("Sprint Canada","www.sprint.ca");
	site("Danish Yellow Pages","www.gulesider.dk");

	echo "<br></td><td align=top>\n";
	/* Travel */
	site("Ambassadair - ATA's Travel Club","www.ambassadair.com");

	echo "<br></td><td align=top>\n";
	/* Religious */
	site("Kenneth Copeland Ministries","kcm.org");
	site("Christian Financial Concepts","cfcministry.org");

	echo "</tr><tr>\n";
	title("Newspapers");
	title("Computer Hardware");
	title("Computer Software");

	echo "</tr><tr><td align=top>\n";
	/* Newspapers*/
	site("Børsen - Danish Business Daily","www.borsen.dk");

	echo "<br></td><td align=top>\n";
	/* Computer Hardware */

	echo "<br></td><td align=top>\n";
	/* Computer Software */
	site("C2Net Software Inc.","www.c2.net");

	echo "</tr></table></center>\n";

	require("include/footer.inc");
?>
