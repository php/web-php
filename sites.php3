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

<blockquote>The sites listed here are either submitted by site owners,
or someone who has spotted PHP in use on a site.  The presence of a
company on this list does not imply endorsement of PHP.  If you
control a listed site that you do not wish listed here please email <a
href="mailto:sites@php.net">sites@php.net</a> and it will be removed
right away.</blockquote>

<CENTER>
<TABLE border=0 cellpadding=0 cellspacing=0>

<?
/* Auto Industry */
	title("Auto");
	siteStart();
	site("Cars Everything","www.carseverything.com");
	site("Hobby Caravaning","www.hobby-caravan.de");
	site("Mitsubishi Motors","www.mitsucars.com");
	siteEnd();

/* City and Community Sites */
	title("City and Community Sites");
	siteStart();
	site("City of Capelle aan den Ijssel","www.capelle-ijssel.nl");
	site("The Tri Cities Online","tri.xtn.net");
	site("Zone - Cultural sites in Rotterdam","www.cultuur.rotterdam.nl");
	siteEnd();

/* Computer Software */
	title("Computer Software");
	siteStart();
	site("C2Net Software Inc.","www.c2.net");
	site("Flexform Software","www.flexform.de");
	site("Knowledge Adventure","www.knowledgeadventure.com");
	site("Mozilla Crypto Group","mozilla-crypto.ssleay.org");
	site("RedHat Software","www.redhat.com");
	siteEnd();

/* Educational */
	title("Educational");
	siteStart();
	site("The Biology Place","www.biology.com");
	site("The Chemistry Place","www.chemplace.com");
	site("DevilNet at Duke University", "devilnet.duke.edu");
	site("Edwards/Penney Calculus Website","www.edwardspenney.com");
	site("GezondheidsNet","www.gezondheidsnet.nl");
	site("The Internet Pilot to Physics","www.tp.umu.se/TIPTOP/");
	site("Let's Find Out","www.letsfindout.com");
	site("NativeWeb","www.nativeweb.org");
	site("The Psychology Place","www.psychplace.com");
	siteEnd();

/* Entertainment */
	title("Entertainment");          
	siteStart();
	site("HitList","www.hitlist.com");
	site("PromoPodium","www.promopodium.nl");
	site("SummerWorks Theatre Festival","www.summerworks.on.ca");
	site("Verzamel.net - for Dutch-speaking collectors","www.verzamel.net");
	siteEnd();


/* Financial Industry */
	title("Financial Industry");
	siteStart();
	site("BörsePlus","www.boerseplus.de");
	site("Cyber Merchants Exchange","www.c-me.com");
	site("The Development Capital Exchange","www.equity-invest.com");
	site("E*Trade","www.etrade.com");
	site("First USA Bank","www.firstusabank.com");
	site("TFC Commodity Charts","tfc-charts2.w2d.com");
	siteEnd();

/* Games */
	title("Games");
	siteStart();
	site("BEETLE<i>MANIA</i>","www.beetlemania.de");
	site("Riot Publishing","riot.com.au");
	site("Worms2","www.worms2.com");
	siteEnd();

/* Government */
	title("Government");
	siteStart();
	site("National Institute of Ecology in Mexico","www.ine.gob.mx");
	siteEnd();

/* Hi-Tech Industry */
	title("Hi-Tech");
	siteStart();
	site("32bit.com","www.32bit.com");
	site("Developer Shed","www.devshed.com");
	site("DataGuard AS - Security Consulting","www.dataguard.no");
	site("Fujitsu Business Communications Systems","www.fbcs.fujitsu.com");	
	site("PalmShop","www.palmshop.de");
	siteEnd();

/* Internet Services */
	title("Internet Services");
	siteStart();
	site("easyDNS","www.easydns.com");
	site("InfoMak","www.infomak.com");
	site("My URL's", "murl.com");
	site("Webex - Russia","www.webex.ru");
	siteEnd();

/* ISP's */
	title("ISP's");
	siteStart();
	site("Aidan Internet Solutions","www.aidan.net");
	site("CocoNet Corporation","www.coconet.com");
	site("Compmore.Net","www.compmore.net");
	site("Italia Online","www.iol.it");
	site("Nederland.Net","www.nederland.net");
	site("Netvision","www.netvision.net.il");
	site("Pair Networks","www.pair.net");
	site("SpaceNet","www.spacenet.de");
	site("Total Information Management AG","www.timso.ch");
	site("XOOM Inc.","xoom.com");
	site("Yebo! Net","www.yebo.co.za");
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
	site("CADALYST Magazine","www.cadonline.com");
	site("Calendar - Syracuse Events Guide","calendar.syracuse.com");
	site("Computer Currents","www.computercurrents.com");
	site("The Dryden Observer","lak.awcoldstream.com/observer/first1.phtml");
	site("FocalPress","www.focalpress.com.hk");
	site("The German Linux Magazine","www.linux-magazin.de/newsflash");
	site("Mercattel","mercattel.interwatts.com");
	site("Der Spiegel","www.spiegel.de");
	site("The Star - Kansas City","www.kcstar.com");
	site("UPI Archives","upi.siteways.com");
	siteEnd();

/* Not-for-Profit */
	title("Not-for-Profit");
	siteStart();
	site("European Rotaract Information Center","www.rotaract.de/eric/");
	site("The Jazz Journalists Association","www.jazzhouse.org");
	site("National Marrow Donor Program","www.marrow.org");
	site("PoloniaNet - Polish community of the Internet","www.PoloniaNet.com");
	site("KidsCampaigns","www.kidscampaigns.org");
	siteEnd();

/* Online News Sites */
	title("Online News Sites");
	siteStart();
	site("3D Linux","3dlinux.org");
	site("Deal-iMac","deal-imac.com");
	site("Deal-Mac","deal-mac.com");
	site("Deal-Pc","deal-pc.com");
	site("FreshMeat","freshmeat.net");
	site("Incluso - online PHP Magazine","io.incluso.com");
	site("MP3Bench","mp3bench.com");
	site("Online Gaming Review","www.ogr.com");
	siteEnd();

/* Publishing Industry */
	title("Publishing Industry");
	siteStart();
	site("Invisible Man Press","www.invisiblemanpress.com");
	siteEnd();

/* Religious */
	title("Religious");
	siteStart();
	site("Christian Financial Concepts","cfcministry.org");
	site("Kenneth Copeland Ministries","kcm.org");
	siteEnd();

/* Retail - Service Industry */
	title("Retail & Service Industry");
	siteStart();
	site("BART'S Water Sports","www.bartswatersports.com");
	site("Clabber Girl Baking Powder","www.hulman.com");
	site("Delia*s Inc.","www.delias.com");
	site("Farmauno","www.farmauno.com");
	site("Froeschl - Online Auctions","www.froeschl.de");
	site("LinkAlarm","www.linkalarm.com");
	site("The Longaberger Company","www.longaberger.com");
	site("Patagonia Clothing","www.patagonia.com");
	site("PC Market - Russia", "www.pcmarket.ru/pcmarket");
	site("Restoration Hardware","www.restorationhardware.com");
	site("Shipwreck Beads","www.shipwreck-beads.com");
	site("USRentals","www.usrentals.com");
	siteEnd();

/* Sports */
	title("Sports");
	siteStart();
	site("Disc Golf Birmingham","discgolf.bham.al.us");
	site("Professional Disc Golf Association","www.pdga.com");
	site("Soccer Silly - World Soccer E-Zine","www.soccersilly.com");
	site("Southern Nationals Disc Golf","www.sndg.org");
	site("The Internet Squash Federation","www.squash.org");
	siteEnd();

/* Telecommunications */
	title("Telecommunications");
	siteStart();
	site("Danish Yellow Pages","www.gulesider.dk");
	site("The Public Payphone Database","wiw.org/wiw.org/payphone/");
	site("Southwestern Bell","WWW.SBWireless.COM");
	site("Sprint Canada","www.sprint.ca");
	siteEnd();

/* Travel */
	title("Travel & Tourism");
	siteStart();
	site("Ambassadair - ATA's Travel Club","www.ambassadair.com");
	site("BackPackers.Com","www.backpackers.com");
	site("Eating Sacramento","www.eatingsacramento.com");
	site("Griechenland.DE","www.griechenland.de");
	site("Oaxaca State Tourist Guide","oaxaca-travel.gob.mx");
	site("Online Fares Travel, Inc.","www.onlinefares.com");
	site("San Diego Zoo", "www.sandiegozoo.org");
	site("Texas Highways","WWW.TexasHighways.COM");
	site("Texas Weekender","WWW.TexasWeekender.COM");
	site("TopHotels.com","www.tophotels.com");
	site("Whistler Networks","www.whistler.net");
	site("Whistler Blackcomb Mountains","www.whistler-blackcomb.com");
	siteEnd();

/* User Groups */
	title("User Groups");
	siteStart();
	site("Albany New York PowerBuilder User Group","www.anypbug.org");
	siteEnd();

/* Web Development */
	title("Web Development Companies");
	siteStart();
	site("Avatar Technology","www.avatartech.com");
	site("I-D Gruppe","www.idgruppe.com");
	site("Private World Communications","www.privateworld.com");
	siteEnd();

/* Misc. */
	title("Miscellaneous");
	siteStart();
	site("Astrology Forum","www.astroforum.ch");
	site("Cigar.Com","www.cigar.com");
	site("ClearInk Corporation","www.clearink.com");
	site("Internet Weather Report","www.internetweather.com");
	site("Mail Chek","mail.chek.com");
	site("Metaindex of Law and Government","www.catalaw.com");
	site("RacersDirect","www.racersdirect.com");
	site("Scour Net","www.scour.net");
	site("Spell Web","www.spellweb.com");
	site("TVGrid.com","www.divein.tvgrid.com");
	site("WebMasters Index","www.webmastersindex.com");
	siteEnd();

/* blank bar at end. */
	title("&nbsp;");

echo "</table></center>\n";

?>
<BR>
<blockquote>If you have a site you feel belongs on this list, send us email at 
<a href="mailto:sites@php.net">sites@php.net</a>.  Please include a suggested 
category.  With well over 70,000 sites on the Internet running PHP, we cannot
list them all and will add suggested sites at our discretion.</blockquote>
<?
commonFooter();
?>
