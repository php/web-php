<?php
require_once 'prepend.inc';

/*
You need to grab http://www.php.net/Mirrors-htdig.tgz and follow the
directions in there if you want to run the search engine on your
mirror (or emulate it on your own website).
*/

if (isset($pattern) && ($pattern)) {
	SetCookie("prevsearch",$pattern,0,"",".php.net");
}

if (isset($pattern) && ($pattern)) {
	if ($show=="quickref") {
		header("Location: manual-lookup.php?pattern=".urlencode($pattern));
		exit;
	}
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
	} else if ($show=="bugdb") {
		$location = "http://www.php.net/bugs.php";
		$query = "cmd=Display+Bugs&status=All&bug_type=Any&search_for=".urlencode($pattern);
		Header("Location: $location?$query");
		exit;
	}

	if (!have_search()) {
		$location="http://www.php.net/search.php";
		$query = "show=".$show."&pattern=".urlencode($pattern)."&sourceurl=".urlencode($MYSITE);
		Header("Location: ".$location."?".$query);
		exit;
	}
}		

if (file_exists("configuration.inc")) {
  include_once 'configuration.inc';
}

function makeBar($page,$pages,$baseurl,$firstdisplayed,$lastdisplayed) {
	$last = $next = '&nbsp;';
	if ($page>1) {
		$i=$page-1;
		$last=make_link($baseurl.'&page='.$i, make_image('caret-l.gif', 'previous').'previous');
	}
	if ($page<$pages) {
		$i=$page+1;
		$next=make_link($baseurl.'&page='.$i, 'next page'.make_image('caret-r.gif', 'next') );
	}

	$middle="<B>Displaying results $firstdisplayed to $lastdisplayed</B>";


        echo '<table border="0" width="620" bgcolor="#e0e0e0" cellpadding="0" cellspacing="4">';
	echo '<tr>';
        echo '<td align="middle" colspan="2">' . $middle . '<br></td>';
	echo '</tr>';

        echo '<tr bgcolor="#cccccc"><td colspan="2">';
        spacer(1,1);
        echo '<br></td></tr>';

        echo '<tr>';
        echo '<td align="left">' . $last . '<br></td>';
        echo '<td align="right">' . $next . '<br></td>';
        echo '</tr>';
	echo '</table><BR>' . "\n";
}

if(!isset($pattern)) { 
	$DISABLE_KICKOUTS = true;
	commonHeader("Site Search");
	$form=$PHP_SELF;
?>
<h1>Search</h1>
<FORM ACTION="<?php echo $form;?>" METHOD="POST">
<CENTER>
<TABLE CELLSPACING="0" CELLPADDING="2">
<TR VALIGN="top">
<TD ALIGN="right">
Search for: <BR>
</TD>
<TD>
<INPUT TYPE="text" NAME="pattern" VALUE="<?php echo $prevsearch;?>" SIZE="30">
<INPUT TYPE="submit" VALUE=" Search "><BR>
</FONT></TD>
</TR>
<TR VALIGN="top">
<TD ALIGN="right">
Restrict the search to: <BR>
</TD>
<TD>
<SELECT NAME="show">
<OPTION VALUE="quickref">PHP Function List
<OPTION VALUE="nosource" SELECTED>Whole site
<OPTION VALUE="bugdb">Bug database
<OPTION VALUE="manual">Online documentation (English only)
<OPTION VALUE="maillist">PHP General Mailing List
<OPTION VALUE="devlist">PHP Developers' List
<OPTION VALUE="phpdoc">PHP Documentation List
<OPTION VALUE="phplib">PHPLIB Mailing List
<OPTION VALUE="phplib-dev">PHPLIB Developers' List
<OPTION VALUE="source">Site source code
</SELECT><BR>
</FONT></TD>
</TR>
</TABLE>
</CENTER>
</FORM>
<?php } else {
		commonHeader("Search Results");
		echo "<h1>Search Results</h1>\n";
		if (have_search() && isset($htsearch_prog)) {
			$form=$PHP_SELF;
		} else {
			$form="http://www.php.net/search.php";
		}
		if (!isset($base)) {
			if (ereg("^(.+//[^/]+)/",$HTTP_REFERER,$reg)) {
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
			$where="Site source code";
		} elseif ($show=="manual") {
			$restrict=$MYSITE."manual/en";
			$exclude="/source";
			$where="PHP documentation";
		} else {
			$exclude="/source";
			$restrict=$MYSITE;
			$where="PHP Web site";
		}
		if (isset($page)) {$off="&page=$page";} else {$off="";}
		$query="words=$words&config=$config&exclude=$exclude&restrict=$restrict$off";
		exec("$htsearch_prog \"$query\"",$result);
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

		makeBar($page,$pages,$baseurl,$firstdisplayed,$lastdisplayed);

		$i=7; #skip response header
		while($i<$rc) {
			if ($base=="-") {
				echo $result[$i];
			} else {
				echo eregi_replace("http://[^.]+\.php\.net/","$base/",$result[$i]);
			}
			echo "\n";
			$i++;

			echo hdelim("#cccccc");

		}
		echo "<BR>\n";


		makeBar($page,$pages,$baseurl,$firstdisplayed,$lastdisplayed);

		echo "<p>Search powered by<BR>\n";
		print_link("http://htdig.sdsu.edu/", make_image("htdig.gif", "ht:dig") );
		echo "</p>\n";
}
commonFooter();
?>
