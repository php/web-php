<?
/*
You need to grab http://www.php.net/Mirrors-htdig.tgz and follow the
directions in there if you want to run the search engine on your
mirror (or emulate it on your own website).
*/

if (isset($pattern) && ($pattern)) {
	SetCookie("prevsearch",$pattern,0,"",".php.net");
}

require("shared.inc");
$HAVE_SEARCH=$MIRRORS[$MYSITE][5];

if (isset($pattern) && ($pattern)) {
	$location = "http://www.progressive-comp.com/Lists/";
	if ($show=="maillist") {
		$query = "l=php3-general&r=1&w=2&q=b&s=".urlencode($pattern);
		Header("Location: ".$location."?".$query);
		exit;
	} else if ($show=="devlist") {
		$query = "l=php-dev&r=1&w=2&q=b&s=".urlencode($pattern);
		Header("Location: ".$location."?".$query);
		exit;
	} else if ($show=="phpdoc") {
		$query = "l=phpdoc&r=1&w=2&q=b&s=".urlencode($pattern);
		Header("Location: ".$location."?".$query);
		exit;
	} else if ($show=="phplib") {
		$query = "l=phplib&w=2&r=1&q=b&s=".urlencode($pattern);
		Header("Location: ".$location."?".$query);
		exit;
	} else if ($show=="phplib-dev") {
		$query = "l=phplib-dev&w=2&r=1&q=b&s=".urlencode($pattern);
		Header("Location: ".$location."?".$query);
		exit;
	} else if ($show=="php-kb") {
		$location = "http://www.faqts.com/knowledge-base/search/index.phtml";
		$query = "fid=51&search=".urlencode($pattern);
		Header("Location: $location?$query");
		exit;
	}
	if (!$HAVE_SEARCH) {
		$location="http://uk.php.net/search.php";
		$query = "show=".$show."&pattern=".urlencode($pattern)."&sourceurl=".urlencode($MYSITE);
		Header("Location: ".$location."?".$query);
		exit;
	}
}		

include("configuration.inc");

function makeBar($no,$page,$pages,$baseurl,$firstdisplayed,$lastdisplayed) {
	global $FONTFACE;
	if ($page>1) {
		$i=$page-1;
		$last="<A HREF=\"$baseurl&page=$i\" onMouseover=\"change('prev$no',1);\" onMouseout=\"hide();\"><IMG SRC='/gifs/b-prev-p.gif' ALT='Previous page' WIDTH=75 HEIGHT=21 VSPACE=7 BORDER=0 NAME='prev$no' align=absmiddle></A>";
	} else {
		$last="&nbsp;";
	}
	if ($page<$pages) {
		$i=$page+1;
		$next="<A HREF=\"$baseurl&page=$i\" onMouseover=\"change('next$no',1);\" onMouseout=\"hide();\"><IMG SRC='/gifs/b-next-p.gif' ALT='Next page' WIDTH=75 HEIGHT=21 VSPACE=7 BORDER=0 NAME='next$no' align=absmiddle></A>";
	} else {
		$next="&nbsp;";
	}

	$middle="<B>Displaying results $firstdisplayed to $lastdisplayed</B>";

	echo "<TABLE BORDER=0 WIDTH=100% BGCOLOR='#D0D0D0' CELLPADDING=0 CELLSPACING=0>\n";
	echo "<TR VALIGN=middle>\n";
	echo "<TD ALIGN=left WIDTH=18><IMG SRC='/gifs/gcap-left.gif' WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>\n";
	echo "<TD ALIGN=left WIDTH=75>$last<BR></TD>\n";
	echo "<TD ALIGN=center WIDTH=100%><FONT FACE='$FONTFACE' SIZE=-1>$middle<BR></TD>\n";
	echo "<TD ALIGN=right WIDTH=75>$next<BR></TD>\n";
	echo "<TD ALIGN=right WIDTH=18><IMG SRC='/gifs/gcap-right.gif' WIDT=18 HEIGHT=36 BORDER=0><BR></TD>\n";
	echo "</TR></TABLE><BR>\n";
}

if(!isset($pattern)) { 
	$DISABLE_KICKOUTS = true;
	commonHeader("Site Search");
	$form=$PHP_SELF;
?>
<FORM ACTION="<?echo $form;?>" METHOD="POST">
<CENTER>
<TABLE CELLSPACING=0 CELLPADDING=2>
<TR VALIGN=top>
<TD ALIGN=RIGHT><FONT FACE="<? echo $FONTFACE;?>">
Search for: <BR>
</FONT></TD>
<TD>
<INPUT TYPE="text" NAME="pattern" VALUE="<?echo $prevsearch;?>" SIZE=30>
<INPUT TYPE="image" SRC="/gifs/b-go.gif" ALIGN=absmiddle WIDTH=36 hspace=3 HEIGHT=21 BORDER=0><BR>
</FONT></TD>
</TR>
<TR VALIGN=top>
<TD ALIGN=RIGHT><FONT FACE="<? echo $FONTFACE;?>">
Restrict the search to: <BR>
</FONT></TD>
<TD>
<SELECT NAME="show">
<OPTION VALUE="nosource" SELECTED>Whole site
<OPTION VALUE="manual">Online documentation
<OPTION VALUE="maillist">PHP 3.0 Mailing List
<OPTION VALUE="devlist">PHP Developers' List
<OPTION VALUE="phpdoc">PHP Documentation List
<OPTION VALUE="phplib">PHPLIB Mailing List
<OPTION VALUE="phplib-dev">PHPLIB Developers' List
<OPTION VALUE="source">Site PHP 3.0 source code
</SELECT><BR>
</FONT></TD>
</TR>
</TABLE>
</CENTER>
</FORM>
<? } else {
		commonHeader("Search Results");
		if ($HAVE_SEARCH) {
			$form=$PHP_SELF;
		} else {
			$form="http://uk.php.net/search.php";
		}
		if (!isset($base)) {
			if (ereg("^(.+//[^/]+)/",$HTTP_REFERER,&$reg)) {
				$base=$reg[1];
			}
			if ($base==$MYSITE) {
				$base="-";
			}
		}

		if ($base=="-") {
			$sourceurl=$PHP_SELF;
		} else {
			$sourceurl=$base.$PHP_SELF;
		}

		if ($pattern=="") {
			echo "<b>Error:</B> No search words specified.<BR><BR>";
			echo "Click here for a <A HREF=\"$sourceurl\">New Search</A><BR><BR>\n";
			CommonFooter();
			exit();
		}
			
		$words=EscapeShellCmd(UrlEncode($pattern));
		$config="php";
		if ($show=="source") {
			$exclude="/manual";
			$restrict=$MYSITE."source";
			$where="PHP 3.0 site source code";
		} elseif ($show=="manual") {
			$restrict=$MYSITE."manual";
			$exclude="/source";
			$where="PHP documentation";
		} else {
			$exclude="/source";
			$restrict=$MYSITE;
			$where="PHP 3.0 web site";
		}
		if (isset($page)) {$off="&page=$page";} else {$off="";}
		$query="words=$words&config=$config&exclude=$exclude&restrict=$restrict$off";
		exec("$htsearch_prog \"$query\"",&$result);
		$rc=count($result);
		if ($rc<2) {
			echo "<B>There was an error executing this query.</B><BR><BR>Please try later<BR><BR>";
			commonFooter();
			exit;
		}
		if ($result[2]=="NOMATCH") {
			echo "Sorry, no documents matched your search for<B>&quot;".$pattern."&quot;</B>.<BR><BR>";
			echo "Click here for a <A HREF=\"$sourceurl\">New Search</A><BR><BR>\n";
			commonFooter();
			exit;
		}
		$matches=$result[2];
		$firstdisplayed=$result[3];
		$lastdisplayed=$result[4];
		$page=$result[5];
		$pages=$result[6];
		$baseurl=$PHP_SELF."?pattern=$words&show=$show&base=$base";

		echo "$matches documents match your search for '<B>$pattern</B>' in the $where:<BR><BR>\n";
		echo "Click here for a <A HREF=\"$sourceurl\">New Search</A><BR><BR>\n";

		makeBar("",$page,$pages,$baseurl,$firstdisplayed,$lastdisplayed);

		$i=7; #skip response header
		while($i<$rc) {
			if ($base=="-") {
				echo $result[$i];
			} else {
				echo eregi_replace("http://[^.]+\.php\.net/","$base/",$result[$i]);
			}
			echo "\n";
			$i++;
		}
		echo "<BR>\n";

		makeBar("2",$page,$pages,$baseurl,$firstdisplayed,$lastdisplayed);

		?>
		<CENTER>
		<BR><I>Search results courtesy of</I><BR>
		<A HREF="http://htdig.sdsu.edu/"><IMG SRC="/gifs/htdig.gif" BORDER=0 ALT="ht:dig"></A>
		</CENTER>
		<?
}
commonFooter();
?>
