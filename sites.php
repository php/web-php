<?
require_once 'prepend.inc';
commonHeader("High-Profile sites running PHP");

	function site($name,$domain=false) {
		if ($domain) {
			echo "<LI><a href=\"http://$domain\">$name</a><br>\n";
		} else {
			echo "<LI><b>$name</b><br>\n";
		}
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
/* Automotive Industry */
	title("Automotive Industry");
	siteStart();
	site("The Audi TT web site","www.audi-tt.org");
	site("Audi World","www.audiworld.com");
	site("Auto City","www.autocity.de");
	site("AutoNetworkUSA.com","www.AutoNetworkUSA.com");
	site("Cars Everything","www.carseverything.com");
	site("Euroclassics","www.euroclassics.com");
	site("Hobby Caravaning","www.hobby-caravan.de");
	site("Honda","www.honda.com");
	site("Mazda Canada","www.mazda.ca");
	site("Mitsubishi Motors","www.mitsucars.com");
	site("MotoSite.Com","www.motosite.com");
	site("Nickels Performance Products","www.automaxx.com");
	site("Opel","www.opel.com");
	site("PerformanceList.Com","www.performancelist.com");
	site("Silver Bullet Motorcycles","www.silver-bullet.co.nz");
	site("Subaru","www.subaru.com");
	site("Volvo","www.volvo.com");
	siteEnd();

/* City and Community Sites */
	title("City and Community Sites");
	siteStart();
	site("Asian Avenue.com", "www.asianavenue.com"); # Comm
	site("Black Planet.com", "www.blackplanet.com"); # Comm
	site("City of Capelle aan den Ijssel","www.capelle-ijssel.nl");
	site("Du côté de","www.ducotede.com");
	site("City of Escondido","www.ci.escondido.ca.us");
	site("City of Sibiu - Romania","www.primbsb.ro");
	site("Fayetteville","www.fayetteville.com");
	site("Greene County Online","greene.xtn.net");
	site("Hull and East Yorkshire","www.humber.net/key/");
	site("Kunsthalle Mannheim - Germany","www.kunsthalle-mannheim.de");
	site("Landeshauptstadt Stuttgart - Germany","www.stuttgart.de");
	site("Migente.com", "www.migente.com"); # Comm
	site("MyTown.Com","www.mytown.com");
	site("Niterói à Vista","www.nitvista.com.br");
	site("Tablelands Online","www.tablelandsonline.net.au");
	site("The Tri Cities Online","tri.xtn.net");
	site("Up My Street", "www.upmystreet.com");
	site("White House 200th Anniversary site","www.wh200th.com");
	site("XOOM.com Inc.","xoom.com");
	site("Zone - Cultural sites in Rotterdam","www.cultuur.rotterdam.nl");
	siteEnd();

/* Computer Hardware/Software */
	title("Computer Hardware/Software");
	siteStart();
	site("Apache Web Server","www.apache.org");
	site("Be","www.be.com");
	site("BetaNews.Com","www.betanews.com");
	site("BSB-Software","www.bsb-software.com");
	site("C2Net Software Inc.","www.c2.net");
	site("Cornado Internet Applications","www.cornado.com");
	site("Flexform Software","www.flexform.de");
	site("Freedows OS","freedows.netpedia.net/");
	site("Internet Security Systems","www.iss.net");
	site("LCDproc", "lcdproc.omnipotent.net");
	site("Mozilla Crypto Group","mozilla-crypto.ssleay.org");
	site("RedHat Software","www.redhat.com");
	site("Skinz","www.skinz.org");
	site("Sonic Spot","www.sonicspot.com");
	site("Type Euphoria","fonts.linuxpower.org");
	site("VA Linux Systems","www.valinux.com");
	site("VB World","www.vb-world.net");
	site("Winamp", "www.winamp.com");
	site("Xingtech.com","www.xingtech.com");
	site("YellowDog Linux","www.yellowdoglinux.com");
	siteEnd();

/* Educational/Research */
	title("Educational/Research");
	siteStart();
	site("AAA-CT La Salle","www.salleURL.edu/AnticsAlumnes/index.html");
	site("The Biology Place","www.biology.com");
	site("The Chemistry Place","www.chemplace.com");
	site("ClassWorld","www.classworld.net");
	site("DevilNet at Duke University", "devilnet.duke.edu");
	site("Devry Technical Institute Financial Aid","finance.devry.edu");
	site("Digital Metrics","www.digitalmetrics.com");
	site("Edwards/Penney Calculus Website","www.edwardspenney.com");
	site("EdSeek.com","www.edseek.com");
	site("Évora's University in Portugal","www.uevora.pt");
	site("GezondheidsNet","www.gezondheidsnet.nl");
	site("Get A Clue", "www.getaclue.com"); # Educational
	site("iCivilEngineer","www.icivilengineer.com");
	site("The Internet Pilot to Physics","www.tp.umu.se/TIPTOP/");
	site("The Lawson Institute","lriweb.stjosephs.london.on.ca");
	site("Let's Find Out","www.letsfindout.com");
	site("NativeWeb","www.nativeweb.org");
	site("University of Bergen - Norway","www.uib.no");
	site("Research Institute for electro-magnetic compatibility","www.femu.rwth-aachen.de");
	site("Shekari: Follow Shawn Reed as he builds a kit plane","www.shekari.org");
	site("Traffic School To Go","www.trafficschooltogo.com");
	site("The Psychology Place","www.psychplace.com");
	site("Vestfold College, Norway","www.hive.no");
	site("WISE Project","wise.berkeley.edu");
	siteEnd();

/* Entertainment */
	title("Entertainment");
	siteStart();
	site("98 Degrees","www.98degrees.com");
	site("Big Brother - The TV Show","www.bigbrother.de");
	site("The British Film Institute","www.bfi.org.uk");
	site("BurnerKitty.com","www.burnerkitty.com");
	site("CD93 Radio Station","www.cd93.com/index_hi.htm");
	site("Chump Change (a band)","foxx.richweb.com/chumpchange/");
	site("Click2Music","www.click2music.nl");
	site("Digital Theatre","www.dtheatre.com");
	site("EduTest.Com","www.edutest.com");
	site("film.at - movie listings for Austria","www.film.at");
	site("FilmFrenzy.com","filmfrenzy.com");
	site("FilmNetwork","www.fnw.de");
	site("Granada","www.granada.co.uk");
	site("Hip Hop Archives","www.hiphoparchives.com");
	site("HitList","www.hitlist.com");
	site("Independent Musicians Guild","www.scimg.com");
	site("Kentucky Lottery","www.kylottery.com");
	site("KPIG Radio Station (Freedom, CA)","www.kpig.com");
	site("PowerMetal.de","www.powermetal.de");
	site("Miss USA 1999","www.missusa.com");
	site("My Video Store","www.myvideostore.com");
	site("MysteryGuide.com","www.mysteryguide.com");
	site("O'Brien's Cafe","www.obrienscafe.com");
	site("prince.org","www.prince.org");
	site("PromoPodium","www.promopodium.nl");
	site("Rubik's Online","www.rubiks.com");
	site("Harald Schmidt Show", "www.schmidt.de");
	site("SAT1 - A German television station","www.sat1.de");
	site("Sony Music, Europe","www.sonymusic.de");
	site("Striving For Togetherness Records","www.striving.com");
	site("SummerWorks Theatre Festival","www.summerworks.on.ca");
	site("Transcasts","www.transcasts.com");
	site("TVN Entertainment","www.tvn.com");
	site("United States of Hardcore (Music)","www.ush.net");
	site("Verzamel.net - for Dutch-speaking collectors","www.verzamel.net");
	site("VRT - Vlaamse Radio - en Televisieomroep","www.vrt.be");
	site("WorldClubs.Net","www.worldclubs.net");
	site("WorldRecords","www.worldrecords.com");
	siteEnd();


/* Financial Industry */
	title("Financial Industry");
	siteStart();
	site("BörsePlus","www.boerseplus.de");
	site("ComDirect - German Bank / Online Brokerage","www.comdirect.de");
	site("Cyber Merchants Exchange","www.c-me.com");
	site("The Development Capital Exchange","www.equity-invest.com");
	site("Employee Benefit Placement System","ee-benefits.com/");
	site("HotPortfolios.Com","www.hotportfolios.com");
	site("Insurance Bridge","www.insurancebridge.com");
	site("Quicken.ca","www.quicken.ca");
	site("TFC Commodity Charts","tfc-charts2.w2d.com");
	site("Wallstreet:Online","www.wallstreet-online.de");
	siteEnd();

/* Food and Drink */
	title("Food & Drink");
	siteStart();
	site("Bar-None Drink Recipes","psp.pair.com/barnone/");
	site("Cookbook Wizard","www.cookbookwizard.com");
	site("Drink Specials","www.drinkspecials.com");
	site("Food Geeks","foodgeeks.com");
	site("Foodstop.Com","www.foodstop.com");
	siteEnd();

/* Games */
	title("Games & Gaming");
	siteStart();
	site("Battle - a PBeM Game","battle.pbem.net");
	site("BEETLE<i>MANIA</i>","www.beetlemania.de");
	site("ClanBase","www.clanbase.com");
	site("Gameplayer","www.gameplayer.com");
	site("GamePoint Shop","shop.gamepoint.net");
	site("The Galactic Empire","www.imperialnexus.net");
	site("GibWorld","www.gibworld.com");
	site("Internet Football Club","www.internetfootballclub.com/");
	site("Loki Software","www.lokigames.com");
	site("mplayer.com","www.mplayer.com");
	site("Soldier of Fortune Files","www.soffiles.com");
	site("Riot Publishing","riot.com.au");
	site("Worms2","www.worms2.com");
	site("wotmud.org", "wotmud.org/boards/Board.News.php"); # Games
	siteEnd();

/* Government */
	title("Government");
	siteStart();
	site("Iowa Division of Tourism","www.state.ia.us/tourism/");
	site("Landesregierung Baden-W&uuml;rttemberg","www.baden-wuerttemberg.de");
	site("Ministerium f&uuml;r Schule und Weiterbildung, Wissenschaft und Forschung NRW","www.mswwf.nrw.de");
	site("National Institute of Ecology in Mexico","www.ine.gob.mx");
	site("National Chemical Laboratory - India","www.ncl-india.org");
	site("Nigerian Television Authority","www.micro.com.ng/ntacsa");
	site("The Supreme court of Norway","www.domstol.no");
	site("The Federal Authorities of the Swiss Confederation", "www.admin.ch"); # Government
	site("West Virginia Department of Education","wvde.state.wv.us");
	siteEnd();

/* Hi-Tech Industry */
	title("Hi-Tech");
	siteStart();
	site("32bit.com","www.32bit.com");
	site("Developer Shed","www.devshed.com");
	site("DataGuard AS - Security Consulting","www.dataguard.no");
	site("Fujitsu Business Communications Systems","www.fbcs.fujitsu.com");
	site("Lead People (Recruitment Agency)","www.leadpeople.com");
	site("NASA - Jet Propulsion Laboratory");
	site("NASA - Mars Polar Lander","marslander.jpl.nasa.gov");
	site("Nuance Communication Extranet","www.nuance.com");
	site("ONE TOUCH Systems Inc.","www.onetouch.com");
	site("PalmShop","www.palmshop.de");
	site("Performance Technologies", "www.microlegend.com"); # Hi-Tech
	site("Tab Products","www.tab.com");
	site("Wildtangent","www.wildtangent.com");
	site("ZeroKnowledge.com","jobs.zeroknowledge.com");
	siteEnd();

/* Internet Services */
	title("Internet Services");
	siteStart();
	site("AbsolutChat.Com","www.absolutechat.com");
	site("Active Mind","www.activemind.net");
	site("ActiveWeb Internet Solutions","www.activeweb.co.il");
	site("All 4 One","www.all4one.com");
	site("BaBoo, Browse and Bookmark","www.baboo.com");
	site("CapGemini","www.capgemini.fr");
	site("ClickAgents","www.clickagents.com");
	site("Constructors","www.constructors.com");
	site("CyberWarp","cyberwarp.to");
	site("DIGIRO FreeMail Server","mail.digiro.net");
	site("easyDNS","www.easydns.com");
	site("Easy.to/Remember","easy.to/remember");
	site("Emedia Designs","emediadesigns.com");
	site("Exe-prod","www.exe-prod.com");
	site("Fantaz","www.fantaz.com");
	site("KnowPost","www.humansearch.com");
	site("InfoMak","www.infomak.com");
	site("Infoseek Investor Relations","www.ir-infoseek.com");
	site("IRCmail.Net","www.ircmail.net");
	site("Kattare's Virtual Web Service","www.kattare.com");
	site("lang-e.com", "www.lang-e.com"); # Internet Services
	site("LocateIndia.com","www.locateindia.com");
	site("Lookup!!","www.lookup.it");
	site("Mail Chek","mail.chek.com");
	site("MailFriends.com","www.mailfriends.com");
	site("MegaDownload","megadownload.de");
	site("michp.nexen.net", "michp.nexen.net");
	site("MyDesktop.Com","www.mydesktop.com");
	site("My URLs", "murl.com");
	site("National Search &amp; Discovery","www.nation-search.com");
	site("Oneview Bookmark Management","www.oneview.com");
	site("PBM Online Services","www.ndw.de");
	site("Resourcepage.com","www.resourcepage.com");
	site("SunSITE Denmark","sunsite.auc.dk");
	site("TageBook.Com - Online Diary","tagebook.com");
	site("Terra Firma Design","www.terrafirmadesign.com");
	site("The Noodle","www.thenoodle.com");
	site("Webex - Russia","www.webex.ru");
	site("West Central Ohio Marketplace","www.wcomarketplace.com");
	site("WhereIs Street Atlas (Australia)","www.whereis.com.au");
	site("WhoBuiltIt","www.whobuiltit.com");
	site("Widesoft Internet","www.widesoft.com.br");
	site("The Widgetchuck","www.widgetchuck.com");
	site("zcentral.com","www.zcentral.com");
	site("Zorango.com","www.zorango.com");
	siteEnd();

/* ASPs/ISPs */
	title("ASPs/ISPs");
	siteStart();
	site("Aidan Internet Solutions","www.aidan.net");
	site("Active Studios","www.activestudios.net");
	site("Alabanza","www.alabanza.com");
	site("BestHost","besthost.net");
	site("Cable & Wireless ECRC GmBH","www.ecrc.de");
	site("Claripoint","www.claripoint.com");
	site("CocoNet Corporation","www.coconet.com");
	site("Compmore.Net","www.compmore.net");
	site("Digital Alchemy","www.digalch.com");
	site("DigitalDaze","www.digitaldaze.com");
	site("Deutsches Provider Network","www.dpn.de");
	site("ForeverNET","www.forevernet.de");
	site("Internections Inc.","www.ixi.net");
	site("Italia Online","www.iol.it");
	site("Kieser.Net","www.kieser.net");
	site("Nederland.Net","www.nederland.net");
	site("Netvision","www.netvision.net.il");
	site("Pair Networks","www.pair.net");
	site("Rackspace.com","www.rackspace.com");
	site("Richweb Inc.","www.richweb.com");
	site("SpaceNet","www.spacenet.de");
	site("StormWeb","www.stormweb.net");
	site("Surfrat Internet","www.surfrat.com");
	site("Total Information Management AG","www.timso.ch");
	site("w10.net","w10.net");
	site("Web Wide Media", "www.wwm.net"); # ISP
	site("Webpipe.net","Webpipe.net");
	site("Winther.Net","www.winther.net");
	site("XOOM Inc.","xoom.com");
	site("Yebo! Net","www.yebo.co.za");
	siteEnd();

/* Job & Career Sites */
	title("Job & Career Sites");
	siteStart();
	site("AutoEngineeringJobs.com","AutoEngineeringJobs.com");
	site("Careers 4 Teens","www.careers4teens.com");
	site("Catho Online","www.catho.com.br");
	site("ejobspace.com", "www.ejobspace.com/"); # Job & Career Sites
	site("Jobs & Career - The Times of India","www.timesjobsandcareers.com");
	site("Little6","www.little6.com");
	site("NettJobb","www.nettjobb.no");
	site("UJobs.com","www.UJobs.com");
	siteEnd();

/* Military */
	title("Military");
	siteStart();
	site("US Army Publishing Agency","www.usapa.army.mil");
	siteEnd();

/* Newspapers & Magazines */
	title("Newspapers & Magazines");
	siteStart();
	site("Bild der Wissenschaft","www.wissenschaft.de");
	site("Børsen - Danish Business Daily","www.borsen.dk");
	site("CADALYST Magazine","www.cadonline.com");
	site("Calendar - Syracuse Events Guide","calendar.syracuse.com");
	site("Computer Currents","www.computercurrents.com");
	site("The Dryden Observer","lak.awcoldstream.com/observer/first1.phtml");
	site("El Mundo","www.el-mundo.es");
	site("FocalPress","www.focalpress.com.hk");
	site("The German Linux Magazine","www.linux-magazin.de/newsflash");
	site("Independent Online (South Africa)","www.iol.co.za");
	site("LA Weekly","www.laweekly.com");
	site("Le Scienze","www.lescienze.it");
	site("Maximum PC Magazine","www.maximumpcmag.com");
	site("Mercattel","mercattel.interwatts.com");
	site("Der Spiegel","www.spiegel.de");
	site("Saarbrücker Zeitung","www.sz-newsline.de");
	site("Spektrum der Wissenschaft","www.spektrum.de");
	site("The Star - Kansas City","www.kcstar.com");
	site("SZ Newsline","www.sz-newsline.de");
	site("UPI Archives","upi.siteways.com");
	site("The Village Voice","www.villagevoice.com");
	site("Times Classifieds","www.timesclassifieds.com");
	site("Ti-News Search","www.ti-news.ch/search/");
	site("Topp","www.topp.no");
	siteEnd();

/* Not-for-Profit */
	title("Not-for-Profit");
	siteStart();
	site("Association of Internet Professionals","www.association.org");
	site("Global Rotaract Information Center", "www.rotaract.org/");
	site("Humanities Web","humanitiesweb.org");
	site("KidsCampaigns","www.kidscampaigns.org");
	site("National Marrow Donor Program","www.marrow.org");
	site("PoloniaNet - Polish community of the Internet","www.PoloniaNet.com");
	site("Sahara Verde","www.saharaverde.org");
	site("Scram.de","www.scram.de");
	site("The Long Now Foundation","www.longnow.org");
	site("The Jazz Journalists Association","www.jazzhouse.org");
	site("Undernet Routing Committee","routing-com.undernet.org");
	site("W3C","www.w3.org");
	siteEnd();

/* Online News Sites */
	title("Online News Sites");
	siteStart();
	site("32BitsOnline.Com","www.32bitsonline.com");
	site("3D Linux","3dlinux.org");
	site("The Be Site","www.thebesite.com");
	site("Be Bits","www.bebits.com");
	site("Be News","www.benews.com");
	site("Club Mom","clubmom.com");
	site("Daemon News","daily.daemonnews.org");
	site("Deal-iMac","deal-imac.com");
	site("Deal-Mac","deal-mac.com");
	site("Deal-Pc","deal-pc.com");
	site("DotComma.org","dotcomma.org");
	site("GAMESDomain","www.gamesdomain.com");
	site("FreeBSD Rocks","www.freebsdrocks.com");
	site("FreshMeat","freshmeat.net");
	site("Ice Walkers","www.icewalk.com");
	site("Incluso - online PHP Magazine","io.incluso.com");
	site("Indian Ballot","www.indianballot.com");
	site("Israel Action Alert","www.israel-alert.com");
	site("Legions.Com","legions.com");
	site("Linux 2000","www.linux-2000.org");
	site("LinuxApps","www.linuxapps.com");
	site("Linux BBS","www.linuxbbs.org");
	site("Linux.Com","linux.com");
	site("Linux Dev Net","linuxdev.net");
	site("Linux Iceland","linux.is");
	site("Daily Linux News","www.kieser.net/linux.html");
	site("Weekly Linux News","www.lwn.net");
	site("Linux Power","linuxpower.org");
	site("Linux PR","linuxpr.com");
	site("Linux Start","www.linuxstart.com");
	site("Linux Today","linuxtoday.com");
	site("Media Monitor (Romanian)","media.monitorul.ro");
	site("MP3Bench","mp3bench.com");
	site("MP3.com","www.mp3.com");
	site("Online Gaming Review","www.ogr.com");
	site("PHP Center (German)","www.php-center.de");
	site("PHP.CodeBase.Org","php.codebase.org");
	site("Riffnet Scripts","www.cgiscripts.net");
	site("SegFault","segfault.org");
	site("TuxFiles.Com","www.tuxfiles.com");
	site("The UNIX Network Archives","www.tuna.org");
	site("Versions","www.versions.com");
	siteEnd();

/* Publishing Industry */
	title("Publishing Industry");
	siteStart();
	site("Invisible Man Press","www.invisiblemanpress.com");
	site("Mind's Eye Fiction","tale.com");
	siteEnd();

/* Real Estate */
	title("Real Estate");
	siteStart();
	site("All Brevard Houses for Sale","www.allbrevard.net");
	site("BidRealEstate.com","www.bidrealeaste.com");
	site("BNF Homes","www.bnfhomes.com");
	site("New York Habitat", "www.nyhabitat.com"); # Real Estate
	site("Real Estate Planet","www.realestateplanet.com");
	site("ReallyNyce.Com","www.reallynyce.com");
	site("Slater Realtors","www.slater-realtors.com");
	siteEnd();

/* Religious */
	title("Religious");
	siteStart();
	site("Christian Cafe","www.christiancafe.com");
	site("Christian Financial Concepts","cfcministry.org");
	site("Finans Avisen","www.finansavisen.no");
	site("Gospel Communications Network","www.gospelcom.net");
	site("Journées Mondiales de la Jeunesse", "www.jmj2000.org"); # Reli
	site("Kenneth Copeland Ministries","kcm.org");
	site("The Nettling Nurturer", "www.nettling-nurturer.com"); # Religeous
	site("Nicodemus Project","www.nicodemusproject.com");
	site("University Christian Fellowship Vineyard","www.ucf.org");
	site("ZoeHouse","www.zoehouse.com");
	siteEnd();

/* Retail - Service Industry */
	title("Retail & Service Industry");
	siteStart();
	site("1 Beautiful Basket.com", "www.1beautifulbasket.com"); # Retail
	site("Access Micro","www.accessmicro.com");
	site("Access Wedding Vendors", "www.weddingvendors.com"); # Retail
	site("Almetaal B.V.","www.almetaal.com");
	site("Amazing Mail", "www.amazingmail.com"); # Retail
	site("Amulet Gemstones and Jewelry","ww2.gemstones.com");
	site("Arena Fan","www.arenafan.com");
	site("Ballgirl Athletic","www.ballgirl.com");
	site("BART's Water Sports","www.bartswatersports.com");
	site("Beaufort Composite Technologies","www.composites.com");
	site("Bird Mansions","birdmansions.com");
	site("Bowling-France","bowling-france.net");
	site("Bruna bookstore","www.bruna.com");
	site("BuyMP3.com","www.buymp3.com");
	site("Cheap Bytes", "www.cheapbytes.com");
	site("Clabber Girl Baking Powder","www.hulman.com");
	site("Coconut Beach","coconutbeach.com");
	site("CompareNet","www.compare.net");
	site("COMP-U-BUY","www.comp-u-buy.com");
	site("comunita.bid.it", "comunita.bid.it"); # retail
	site("Cookson's Tools","www.cooksons.com");
	site("Delia*s Inc.","www.delias.com");
	site("Drogheria.Com","www.drogheria.com");
	site("DUI Shopping","shop.dui.be");
	site("Farmauno","www.farmauno.com");
	site("freeBID Online Auctions","www.freebid.de");
	site("FrenchToast.com","www.frenchtoast.com");
	site("Froeschl - Online Auctions","www.froeschl.de");
	site("Glass Dimensions", "www.glassdimensions.com"); # Retail
	site("HomePoint.com","www.homepoint.com");
	site("IMT","www.imt.com");
	site("Indian Metals","www.indianmetals.com");
	site("JC Whitney","www.jcwhitney.com");
	site("Jennifer Furniture","www.jenniferfurniture.com");
	site("Kellymoore Paints","www.kellymoore.com");
	site("Larkbooks - also FiberArts Magazine","www.larkbooks.com");
	site("Levolor Blinds","www.levolor.com");
	site("LinkAlarm","www.linkalarm.com");
	site("Linux-Books","www.linux-books.com");
	site("The Longaberger Company","www.longaberger.com");
	site("Mostly Zodiac","mostlyZodiac.com");
	site("Neckermann","www.neckermann.de");
	site("O'Neil Wetsuits", "www.oneill.com"); # Sports
	site("Oresto.com", "www.oresto.com"); # Retail
	site("Para-Shop","www.para-shop.de");
	site("PC Market - Russia", "www.pcmarket.ru/pcmarket");
	site("Professional Pavement Products, Inc.","www.pppcatalog.com");
	site("Rejuvenation Lamp and Fixture Co.","www.rejuvenation.com");
	site("Restoration Hardware","www.restorationhardware.com");
	site("R U Sure","www.rusure.com");
	site("Sellit-Here Online","www.sellit-here.com");
	site("Schneider-electric","www.schneider-electric.com");
	site("Shipwreck Beads","www.shipwreck-beads.com");
	site("Silly Universe.com", "www.sillyuniverse.com"); # Retail
	site("Stuart Weitzman","www.stuartweitzman.com");
	site("Sunset Systems","www.sunsetsystems.com");
	site("Swiss Online Bookstore","www.editore.ch");
	site("TonerStop","www.tonerstop.com");
	site("Toronto Eaton Centre","www.centreoftheuniverse.com");
	site("United Rentals","www.unitedrentals.com");
	site("Vancouver Rentals","www.vancouverrentals.com");
	site("Vermeer","www.vermeer.com");
	siteEnd();

/* Search Engines */
	title("Search Engines");
	siteStart();
	site("alltheweb.com", "alltheweb.com");
	site("EuroSeek","www.euroseek.com");
	site("FAST MP3 Search", "mp3.lycos.com");
	site("Lycos RichMedia Search", "richmedia.lycos.com");
	site("Wherewithal.com", "www.wherewithal.com"); # Search
	siteEnd();


/* Sports */
	title("Sports");
	siteStart();
	site("Disc Golf Birmingham","discgolf.bham.al.us");
	site("GoASU.com","www.goasu.com");
	site("Indianapolis 500 Web Site","www.indy500.com");
	site("Jason Kidd's Site","www.jasonkidd.net");
	site("Le Bilboquet","www.bilboquet.com");
	site("New York Yankees","www.yankees.com");
	site("Oakland Raiders","www.raiders.com");
	site("Professional Disc Golf Association","www.pdga.com");
	site("San Francisco Giants Baseball Club","www.sfgiants.com");
	site("Soccer Silly - World Soccer E-Zine","www.soccersilly.com");
	site("Southern Nationals Disc Golf","www.sndg.org");
	site("The Internet Squash Federation","www.squash.org");
	site("Victor Bray Drag Racing","victorbray.com");
	siteEnd();

/* Telecommunications */
	title("Telecommunications");
	siteStart();
	site("Danish Yellow Pages","www.gulesider.dk");
	site("Ericsson GmbH","www.ericsson.de");
	site("onebox.com","www.onebox.com");
	site("The Public Payphone Database","wiw.org/wiw.org/payphone/");
	site("Southwestern Bell","WWW.SBWireless.COM");
	site("Sprint Canada","www.sprint.ca");
	siteEnd();

/* Travel */
	title("Travel & Tourism");
	siteStart();
	site("11th Hour Vacations", "www.11thhourvacations.com"); # Travel
	site("Ambassadair - ATA's Travel Club","www.ambassadair.com");
	site("Arlberg Online","www.arlberg.com");
	site("BackPackers.Com","www.backpackers.com");
	site("BrazilInfo.com","www.brazilinfo.com");
	site("Centro Turistico Studentesco","www.cts.it");
	site("Eating Sacramento","www.eatingsacramento.com");
	site("Griechenland.DE","www.griechenland.de");
	site("LondonTown.com","www.londontown.com");
	site("Lufthansa.de","www.lufthansa.de");
	site("Maggia Valley (Switzerland)","www.vallemaggia.ch");
	site("Oaxaca State Tourist Guide","oaxaca-travel.com");
	site("Online Fares Travel, Inc.","www.onlinefares.com");
	site("San Diego Zoo", "www.sandiegozoo.org");
	site("Spirit Journeys","www.spiritjourneys.com");
	site("Texas Highways","WWW.TexasHighways.COM");
	site("Texas Weekender","WWW.TexasWeekender.COM");
	site("TopHotels.com","www.tophotels.com");
	site("Travel-Italy.com","Travel-Italy.com");
	site("TUI - Touristik Union International","www.tui.com");
	site("Whereis Street Atlas","www.whereis.com.au");
	site("Whistler Resort Guide","www.whistler.net");
	site("YachtNow.Com","www.yachtnow.com/home.php3");
	siteEnd();

/* User Groups */
	title("User Groups");
	siteStart();
	site("Albany New York PowerBuilder User Group","www.anypbug.org");
	site("Lugistics - LUG Software","server.hellug.gr/LUGistics/en/pub/");
	site("Maximilian Bayer","mb.users.de");
	site("Melbourne Linux User Group","www.mlinux.org");
	site("RC5.de","www.rc5.de");
	siteEnd();

/* Web Development */
	title("Web Development Companies");
	siteStart();
	site("Avatar Technology","www.avatartech.com");
	site("Cybersource Australia","www.cyber.com.au");
	site("ego Software","www.ego-software.com");
	site("Electronic Spider","www.espider.com");
	site("Eraylis Technologies", "www.bluebrix.com/eraylis/Eraylis.html"); # Web Dev
	site("Espada Ltd.","www.espadanet.com");
	site("FUMOT","www.fumot.com");
	site("GreyZone","www.greyzone.com");
	site("I-D Gruppe","www.idgruppe.com");
	site("NGenius","www.ngenius.com");
	site("Nucleus", "www.nucleus.com");
	site("PBM","www.pbm.de");
	site("Private World Communications","www.privateworld.com");
	site("Six Offene Systeme GmbH","www.six.de");
	site("SpinWeb Net Designs, Inc.", "www.spinweb.net"); # Web Dev
	site("Munk &amp; Phyber Inc.","www.munkandphyber.com");
	site("Insign Studio","insign.org");
	siteEnd();

/* Misc. */
	title("Miscellaneous");
	siteStart();
	site("AirPics.com","www.airpics.com");
	site("Astrology Forum","www.astroforum.ch");
	site("Banana Fish Bones","www.bananafishbones.de");
	site("Bookmarklets","www.bookmarklets.com");
	site("BuggEr.NeT","bugger.net");
	site("Cigar.Com","www.cigar.com");
	site("ClearInk Corporation","www.clearink.com");
	site("Christen Democratisch Appel","www.cda.nl");
	site("Distributed.Net","www.distributed.net");
	site("Internet Weather Report","www.internetweather.com");
	site("Linux Video and DVD Project","livid.on.openprojects.net");
	site("Metaindex of Law and Government","www.catalaw.com");
	site("Optical Buyer","www.opticalbuyer.com");
	site("RacersDirect","www.racersdirect.com");
	site("Scour Net","www.scour.net");
	site("Spell Web","www.spellweb.com");
	site("StudentPilot","www.studentpilot.com");
	site("Swatch AG","www.swatch.com");
	site("Temperature Measurement site","www.jmrtech.com/temp");
	site("TheMatrix","thematrix.com");
	site("Toasty (Collaborative) Story", "opus.pifreak.dyn.tj"); # Misc.
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
category.  With well over 5 million sites on the Internet running PHP, we cannot
list them all and will add suggested sites at our discretion.</blockquote>
<?
commonFooter();
?>
