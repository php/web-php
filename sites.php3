<?
	require("shared.inc");
	commonHeader("High-Profile sites running PHP");

	function site($name,$domain) {
		echo "<LI><a href=\"http://$domain\">$name</a><br>\n";
	}

	function siteStart() {
		echo "<TR valign=middle>\n";
		echo "<TD>&nbsp;<BR></TD>\n";
		echo "<TD ALIGN=left>";
		spc(50,1);
		echo "<BR></TD>\n";
		echo "<TD align=left bgcolor='#F0F0F0'><FONT SIZE=-1><UL>\n";
	}

	function siteEnd() {
		echo "<BR></UL></TD>\n";
		echo "<TD>&nbsp;<BR></TD>\n";
		echo "</TR>\n";

	}

	function title($text) {
		echo "<TR bgcolor='#D0D0D0' valign=middle>\n";
		echo "<TD ALIGN=left width=18><IMG SRC=\"/gifs/gcap-left.gif\" WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>\n";
		echo "<TD align=left colspan=2 NOWRAP><font size=+1><b>$text</b></font></TD>\n";
		echo "<TD ALIGN=right width=18><IMG SRC=\"/gifs/gcap-right.gif\" WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>\n";
		echo "</TR>\n";
	}
?>

<blockquote>The sites listed here are either submitted by site owners, or someone
who has spotted PHP in use on a site.  The presence of a company on this list does
not imply endorsement of PHP.  If you control a site that you do not wish listed 
here please email <a href="mailto: sites@php.net">sites@php.net</a> and it will 
removed right away.</blockquote>

<CENTER>
<TABLE border=0 cellpadding=0 cellspacing=0>

<?
/* Auto Industry */
	title("Auto");
	siteStart();
	site("Mitsubishi Motors","www.mitsucars.com");
	siteEnd();

/* Computer Software */
	title("Computer Software");
	siteStart();
	site("Knowledge Adventure","www.adventure.com");
	site("C2Net Software Inc.","www.c2.net");
	site("RedHat Software","www.redhat.com");
	siteEnd();

/* Educational */
	title("Educational");
	siteStart();
	site("The Biology Place","www.biology.com");
	site("The Chemistry Place","www.chemplace.com");
	site("The Psychology Place","www.psychplace.com");
	site("NativeWeb","www.nativeweb.org");
	site("The Internet Pilot to Physics","http://www.tp.umu.se/TIPTOP/");
	siteEnd();

/* Financial Industry */
	title("Financial Industry");
	siteStart();
	site("E*Trade","www.etrade.com");
	site("First USA Bank","www.firstusabank.com");
	site("TFC Commodity Charts","tfc-charts2.w2d.com");
	siteEnd();

/* Games */
	title("Games");
	siteStart();
	site("Worms2","www.worms2.com");
	siteEnd();

/* Government */
	title("Government");
	siteStart();
	site("National Institute of Ecology in Mexico","http://www.ine.gob.mx");
	siteEnd();

/* Hi-Tech Industry */
	title("Hi-Tech");
	siteStart();
	site("Fujitsu Business Communications Systems","www.fbcs.fujitsu.com");	
	site("32bit.com","www.32bit.com");
	site("Developer Shed","www.devshed.com");
	siteEnd();

/* Large ISP's */
	title("Large ISP's");
	siteStart();
	site("Netvision","www.netvision.net.il");
	site("Italia Online","www.iol.it");
	site("XOOM Inc.","xoom.com");
	site("Nederland.Net","www.nederland.net");
	site("Pair Networks","www.pair.net");
	siteEnd();

/* Military */
	title("Military");
	siteStart();
	site("US Army Publishing Agency","www-usappc.hoffman.army.mil");
	siteEnd();

/* Newspapers & Magazines */
	title("Newspapers & Magazines");
	siteStart();
	site("Børsen - Danish Business Daily","www.borsen.dk");
	site("Computer Currents","www.computercurrents.com");
	site("UPI Archives","upi.siteways.com");
	site("CADALYST Magazine","www.cadonline.com");
	siteEnd();

/* Not-for-Profit */
	title("Not-for-Profit");
	siteStart();
	site("National Marrow Donor Program","www.marrow.org");
	siteEnd();

/* Religious */
	title("Religious");
	siteStart();
	site("Kenneth Copeland Ministries","kcm.org");
	site("Christian Financial Concepts","cfcministry.org");
	siteEnd();

/* Service Industry */
	title("Service Industry");
	siteStart();
	site("Restoration Hardware","www.restorationhardware.com");
	siteEnd();

/* Telecommunications */
	title("Telecommunications");
	siteStart();
	site("Sprint Canada","www.sprint.ca");
	site("Danish Yellow Pages","www.gulesider.dk");
	site("Southwestern Bell","WWW.SBWireless.COM");
	siteEnd();

/* Travel */
	title("Travel & Tourism");
	siteStart();
	site("Ambassadair - ATA's Travel Club","www.ambassadair.com");
	site("BackPackers.Com","www.backpackers.com");
	site("Texas Highways","WWW.TexasHighways.COM");
	site("Texas Weekender","WWW.TexasWeekender.COM");
	site("Whistler Networks","www.whistler.net");
	site("Whistler Blackcomb Mountains","www.whistler-blackcomb.com");
	siteEnd();

/* Misc. */
	title("Miscellaneous");
	siteStart();
	site("Internet Weather Report","www.internetweather.com");
	site("Metaindex of Law and Government","www.catalaw.com");
	site("TVGrid.com","www.divein.tvgrid.com");
	site("ClearInk Corporation","www.clearink.com");
	site("Cigar.Com","www.cigar.com");
	siteEnd();

/* blank bar at end. */
	title("&nbsp;");

echo "</table></center>\n";

?>
<BR>
<blockquote>If you have a site you feel belongs on this list, send us email at 
<a href="mailto:sites@php.net">sites@php.net</a>.  Please include a suggested 
category.  With well over 60,000 sites on the Internet running PHP, we cannot
list them all and will add suggested sites at our discretion.</blockquote>
<?
commonFooter();
?>
