<?
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
include "configuration.inc";
commonHeader("Site Search");

if ($HAVE_SEARCH) {
	$form=$PHP_SELF;
} else {
	$form="http://uk.php.net/newsearch.php3";
}
if(!isset($pattern)) { 
	if (!isset($prevsearch)) {
		$prevsearch[0]="";
	}
	?>
	<h1 align=center>PHP3 Site Search</h1>
	<form action="<?echo $form;?>" METHOD=POST>
	<CENTER>
	<TABLE CELLSPACING=0 CELLPADDING=2>
	<TR BGCOLOR=#CCCCCC>
		<TD VALIGN=TOP ALIGN=RIGHT>
	 	  <FONT FACE="TAHOMA, ARIAL, GENEVA, HELVETICA, sans-serif">
		  Search for: 
		  </FONT>
		</TD><TD>
	 	  <FONT FACE="TAHOMA, ARIAL, GENEVA, HELVETICA, sans-serif">
		  <input type="text" name="pattern" value="<?echo $prevsearch[0];?>" size=30>
		  <input type="submit" value=" Search "><BR>
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
	</TR><TR BGCOLOR=#AAAAAA>
		<TD VALIGN=TOP ALIGN=RIGHT>
	 	  <FONT FACE="TAHOMA, ARIAL, GENEVA, HELVETICA, sans-serif">
		  Restrict the search to:
		  </FONT>
		</TD><TD>
	 	  <FONT FACE="TAHOMA, ARIAL, GENEVA, HELVETICA, sans-serif">
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
		echo "<CENTER><FONT SIZE=+2><B>Search Results</B></FONT></CENTER>\n";
		if (!isset($base)) {
			if (ereg("^(.+//[^/]+)/",$HTTP_REFERER,&$reg)) {
				$base=$reg[1];
				$sourceurl=$base.$PHP_SELF;
			}
			if ($base==$MYSITE) {
				$base="-";
				$sourceurl=$PHP_SELF;
			}
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
		if ($page>1) {
			$i=$page-1;
			$last="<A HREF=\"$baseurl&page=$i\">Last Page</A>";
		} else {
			$last="<STRIKE>Last Page</STRIKE>";
		}
		if ($page<$pages) {
			$i=$page+1;
			$next="<A HREF=\"$baseurl&page=$i\">Next Page</A>";
		} else {
			$next="<STRIKE>Next Page</STRIKE>";
		}
		echo "<CENTER>$matches documents match your search for '<B>$pattern</B>' in the $where</CENTER><BR><BR>\n";

		$bar= "<TABLE BORDER=0 BGCOLOR=#EEEEEE WIDTH=95% CELLPADDING=0 CELLSPACING=0><TR><TD>$last</TD><TD>";
		$bar.= "<CENTER><B>Displaying results $firstdisplayed to $lastdisplayed</B></CENTER>";
		$bar.= "</TD><TD ALIGN=RIGHT>$next</TD></TR></TABLE><BR>\n";

		echo $bar;
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
		echo $bar;
		?>
		<CENTER>
		<BR><I>Search results courtesy of</I><BR>
		<A HREF="http://htdig.sdsu.edu/"><IMG SRC="gifs/htdig.gif" BORDER=0 ALT="ht:dig"></A>
		</CENTER>
		<?
}
commonFooter();
?>

