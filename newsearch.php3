<?
function makeBar($no,$page,$matches,$pattern,$where) {
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
	$middle="$matches documents match your search for '<B>$pattern</B>' in the $where\n";

	echo "<TABLE BORDER=0 WIDTH=100% BGCOLOR='#D0D0D0' CELLPADDING=0 CELLSPACING=0>\n";
	echo "<TR VALIGN=middle>\n";
	echo "<TD ALIGN=left WIDTH=18><IMG SRC='/gifs/gcap-left.gif' WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>\n";
	echo "<TD ALIGN=left WIDTH=75>$last<BR></TD>\n";
	echo "<TD ALIGN=center WIDTH=100%><FONT FACE='$FONTFACE' SIZE=-1>$middle<BR></TD>\n";
	echo "<TD ALIGN=left WIDTH=75>$next<BR></TD>\n";
	echo "<TD ALIGN=right WIDTH=18><IMG SRC='/gifs/gcap-right.gif' WIDT=18 HEIGHT=36 BORDER=0><BR></TD>\n";
	echo "</TR></TABLE><BR>\n";
};

/* Cookie stuff has to come before the first header */
if ((isset($pattern))&&($pattern||$prevpattern)&&(!isset($page))) { 
	if ($prevpattern) {
		SetCookie("prevsearch[0]",$prevpattern,"",".php.net");
	} else {
		SetCookie("prevsearch[0]",$pattern,0,"",".php.net");
	}
	if (isset($prevsearch)) {
		$i=count($prevsearch);
		if ($i>9) {$i=9;}
		$c=0;
		while($c<$i) { 
			$d=$c+1;
			SetCookie("prevsearch[$d]",$prevsearch[$c],0,"",".php.net");
			$c++;
		}
	}

}
require("shared.inc");
include("configuration.inc");

if ($HAVE_SEARCH) {
	$form=$PHP_SELF;
} else {
	$form="http://uk.php.net/newsearch.php3";
}
if(!isset($pattern)) { 
	commonHeader("Site Search");
	if (!isset($prevsearch)) {
		$prevsearch[0]="";
	}
	?>
	<form action="<?echo $form;?>" METHOD=POST>
	<CENTER>
	<TABLE CELLSPACING=0 CELLPADDING=2>
	<TR VALIGN=top>
		<TD ALIGN=RIGHT>
	 	  <FONT FACE="<? echo $FONTFACE;?>">
		  Search for: 
		  </FONT>
		</TD><TD>
	 	  <FONT FACE="<? echo $FONTFACE;?>">
		  <input type="text" name="pattern" value="<?echo $prevsearch[0];?>" size=30>
		  <INPUT TYPE="image" SRC="/gifs/b-go.gif" ALIGN=absmiddle WIDTH=36 hspace=3 HEIGHT=21 BORDER=0><BR>
		  <? if ($prevsearch[0]) { ?>
		      <SELECT NAME="prevpattern">
		      <OPTION VALUE="">-- Previous Searches --
			<?$i=0;while($i<count($prevsearch)) {
				echo "<OPTION VALUE=\"";
				echo $prevsearch[$i];
				echo "\">";
				echo $prevsearch[$i];
				echo "\n";
				$i++;
			  } ?>
		      </SELECT>
		<?}?>
		  </FONT>
		</TD>
	</TR><TR VALIGN=top>
		<TD ALIGN=RIGHT>
	 	  <FONT FACE="<? echo $FONTFACE;?>">
		  Restrict the search to:
		  </FONT>
		</TD><TD>
	 	  <FONT FACE="<? echo $FONTFACE;?>">
		  <INPUT TYPE="RADIO" NAME="show" VALUE="nosource" CHECKED>Whole site<BR>
		  <INPUT TYPE="RADIO" NAME="show" VALUE="manual">Online documentation<BR>
		  <INPUT TYPE="RADIO" NAME="show" VALUE="source">Site PHP3 source code<BR>
	  	  </FONT>
		</TD>
	</TR>
	</TABLE>
	</CENTER>
	</form>
<? } else {
	commonHeader("Search Results");
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
		echo "<CENTER><A HREF=\"$sourceurl\">New Search</A></CENTER><BR><BR>\n";
		if ((isset($prevpattern))&&($prevpattern)) {
			$pattern=$prevpattern;
		}
		if ($pattern=="") {
			echo "<CENTER>Error: No search words specified</CENTER>";
			CommonFooter();
			exit();
		}
			
		$words=EscapeShellCmd(UrlEncode($pattern));
		$config="php";
		if ($show=="source") {
			$exclude="/manual";
			$restrict=".php.net/source";
			$where="PHP3 site source code";
		} elseif ($show=="manual") {
			$restrict=".php.net/manual";
			$exclude="/source";
			$where="PHP documentation";
		} else {
			$exclude="/source";
			$restrict=".php.net/";
			$where="PHP3 web site";
		}
		if (isset($page)) {$off="&page=$page";} else {$off="";}
		$query="words=$words&config=$config&exclude=$exclude&restrict=$restrict$off";
		exec("$htsearch_prog \"$query\"",&$result);
		$rc=count($result);
		if ($rc<2) {
			echo "<CENTER>There was an error executing this query.<BR>Please try later</CENTER>";
			commonFooter();
			exit;
		}
		if ($result[2]=="NOMATCH") {
			echo "<CENTER>Error: No documents matched your query</CENTER>";
			commonFooter();
			exit;
		}
		$matches=$result[2];
		$firstdisplayed=$result[3];
		$lastdisplayed=$result[4];
		$page=$result[5];
		$pages=$result[6];
		$baseurl=$PHP_SELF."?pattern=$words&show=$show&base=$base";

		makeBar(1,$page,$matches,$pattern,$where);

		$i=7; #skip response header
		echo "<TABLE BORDER=0><TR><TD>\n";
		while($i<$rc) {
			if ($base=="-") {
				echo $result[$i];
			} else {
				echo eregi_replace("http://[^.]+\.php\.net/","$base/",$result[$i]);
			}
			echo "\n";
			$i++;
		}
		echo "</TD></TR></TABLE><BR>\n";

		makeBar(2,$page,$matches,$pattern,$where);

		?>
		<CENTER>
		<BR><I>Search results courtesy of</I><BR>
		<A HREF="http://htdig.sdsu.edu/"><IMG SRC="gifs/htdig.gif" BORDER=0 ALT="ht:dig"></A>
		</CENTER>
		<?
}
commonFooter();
?>

