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


	echo "</tr><tr><td valign=top>\n";

	/* Sports Teams */
	site("NFL's Denver Broncos","www.denverbroncos.com");
	site("NFL's Oakland Raiders","www.raiders.com");

	echo "<br></td><td valign=top>\n";

	/* Auto Industry */
	site("Mitsubishi Motors","www.mitsucars.com");

	echo "<br></td><td valign=top>\n";

	/* Hi-Tech Industry */
	site("Fujitsu Business Communications Systems","www.fbcs.fujitsu.com");	
	site("32bit.com","www.32bit.com");
	site("Developer Shed","www.devshed.com");

	echo "<br></td>\n";

	echo "</tr><tr>\n";
	title("Telecommunications");
	title("Travel & Tourism");
	title("Religious");

	echo "</tr><tr><td valign=top>\n";

	/* Telecommunications */
	site("Sprint Canada","www.sprint.ca");
	site("Danish Yellow Pages","www.gulesider.dk");
	site("Southwestern Bell","WWW.SBWireless.COM");

	echo "<br></td><td valign=top>\n";
	/* Travel */
	site("Ambassadair - ATA's Travel Club","www.ambassadair.com");
	site("BackPackers.Com","www.backpackers.com");
	site("Texas Highways","WWW.TexasHighways.COM");
	site("Texas Weekender","WWW.TexasWeekender.COM");
	site("Whistler Networks","www.whistler.net");
	site("Whistler Blackcomb Mountains","www.whistler-blackcomb.com");

	echo "<br></td><td valign=top>\n";
	/* Religious */
	site("Kenneth Copeland Ministries","kcm.org");
	site("Christian Financial Concepts","cfcministry.org");

	echo "</tr><tr>\n";
	title("Newspapers & Magazines");
	title("Large ISP's");
	title("Computer Software");

	echo "</tr><tr><td valign=top>\n";
	/* Newspapers & Magazines */
	site("Børsen - Danish Business Daily","www.borsen.dk");
	site("Computer Currents","www.computercurrents.com");
	site("UPI Archives","upi.siteways.com");

	echo "<br></td><td valign=top>\n";
	/* Large ISP's */
	site("Netvision","www.netvision.net.il");
	site("Italia Online","www.iol.it");

	echo "<br></td><td valign=top>\n";
	/* Computer Software */
	site("Knowledge Adventure","www.adventure.com");
	site("C2Net Software Inc.","www.c2.net");
	site("RedHat Software","www.redhat.com");

	echo "</tr><tr>\n";
	title("Military");
	title("Government");
	title("Educational");

	echo "</tr><tr><td valign=top>\n";
	/* Military */
	site("US Army Publishing Agency","www-usappc.hoffman.army.mil");

	echo "<br></td><td valign=top>\n";
	/* Government */

	echo "<br></td><td valign=top>\n";
	/* Educational */
	site("The Biology Place","www.biology.com");
	site("The Chemistry Place","www.chemplace.com");
	site("The Psychology Place","www.psychplace.com");
	site("NativeWeb","www.nativeweb.org");

	echo "</tr><tr>\n";
	title("Service Industry");
	title("Not-for-Profit");
	title("Miscellaneous");

	echo "</tr><tr><td valign=top>\n";
	/* Service Industry */
	site("SuperCuts","www.supercuts.com");

	echo "<br></td><td valign=top>\n";
	/* Not-for-Profit */
	site("National Marrow Donor Program","www.marrow.org");

	echo "<br></td><td valign=top>\n";
	/* Misc. */
	site("Internet Weather Report","www.internetweather.com");

	echo "</td></tr></table></center>\n";
?>
<blockquote><blockquote>
<font size=+1><i><tt>If you have a site you feel belongs on this list, please
send us email at <a href="mailto:sites@php.net">sites@php.net</a>.  With well
over 30,000 sites on the Internet running PHP, we cannot list them all.  This
list is to help developers justify their decision to use PHP.  It should thus
contain high-profile sites that someone not necessarily well-versed in the ways
of the Internet might have heard of.
</tt></i></font>
</blockquote></blockquote>
<?
	require("include/footer.inc");
?>
