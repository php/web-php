<?
if (preg_match("/(.*\.php)3$/", $REQUEST_URI, $array)) {
	$url = "http://".$SERVER_NAME.":".$SERVER_PORT.$array[1];
	$urle = urlencode($url);
	
	header("HTTP/1.0 301 Redirect");
	header("Location: $url");

	print "<html><title>Redirect to $urle</title><body>";
	print "<a href=\"".$urle."\">Please click here</a></body></html>";
	exit;
}
?>
<?Header("http/1.0 404 Not Found")?>
<html><title>404 - <?echo $REDIRECT_REDIRECT_ERROR_NOTES?></title>
<body>
<?
	require "../configuration.inc";
	if(!isset($pattern)) {
	$uri=strstr($REDIRECT_REDIRECT_ERROR_NOTES,'phpweb/');
	$uri = strchr($uri,'/');
	$uri = substr($uri,1);
	$pattern = $uri;
	}

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

		$form=$PHP_SELF;
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
			echo "Sorry, that URL does not exist, and a quick search for the <b>$pattern</b> ";
			echo "keyword did not turn anything up.<br><br>";
			exit;
		}
		$matches=$result[2];
		$firstdisplayed=$result[3];
		$lastdisplayed=$result[4];
		$page=$result[5];
		$pages=$result[6];
		$baseurl=$PHP_SELF."?pattern=$words&show=$show&base=$base";

		echo "The page you requested does not exist, however a quick search turned up the ";
		echo "following potential pages related to your request.<br><br>";

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
</body></html>
