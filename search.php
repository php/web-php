<?php
require_once 'prepend.inc';

/*
You need to grab http://www.php.net/Mirrors-htdig.tgz and follow the
directions in there if you want to run the search engine on your
mirror (or emulate it on your own website).
*/

/* we don't want magic slashes in pattern or base */
if (isset($pattern) && get_magic_quotes_gpc())
        $pattern = stripslashes($pattern);
if (isset($base) && get_magic_quotes_gpc())
        $base = stripslashes($base);
if (isset($lang) && get_magic_quotes_gpc())
       $lang = stripslashes($lang);

if ($pattern) {
	if ($show=="quickref") {
		header("Location: manual-lookup.php?pattern=".urlencode($pattern)."&lang=".urlencode($lang));
		exit;
	}
	$location = "http://www.progressive-comp.com/Lists/";
	if ($show=="maillist") {
		$query = "l=php3-general&r=1&w=2&q=b&s=".urlencode($pattern);
		header("Location: ".$location."?".$query);
		exit;
	} else if ($show=="devlist") {
		$query = "l=php-dev&r=1&w=2&q=b&s=".urlencode($pattern);
		header("Location: ".$location."?".$query);
		exit;
	} else if ($show=="phpdoc") {
		$query = "l=phpdoc&r=1&w=2&q=b&s=".urlencode($pattern);
		header("Location: ".$location."?".$query);
		exit;
	} else if ($show=="phplib") {
		$query = "l=phplib&w=2&r=1&q=b&s=".urlencode($pattern);
		header("Location: ".$location."?".$query);
		exit;
	} else if ($show=="phplib-dev") {
		$query = "l=phplib-dev&w=2&r=1&q=b&s=".urlencode($pattern);
		header("Location: ".$location."?".$query);
		exit;
	} else if ($show=="php-kb") {
		$location = "http://www.faqts.com/knowledge-base/search/index.phtml";
		$query = "fid=51&search=".urlencode($pattern);
		header("Location: $location?$query");
		exit;
	} else if ($show=="bugdb") {
		$location = "http://bugs.php.net/search.php";
		$query = "cmd=Display+Bugs&status=All&bug_type=Any&search_for=".urlencode($pattern);
		header("Location: $location?$query");
		exit;
	}

	if (!have_search()) {
		$location="http://www.php.net/search.php";
		$query = "show=".$show."&pattern=".urlencode($pattern)."&sourceurl=".urlencode($MYSITE);
		header("Location: ".$location."?".$query);
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

	$middle="<b>Displaying results $firstdisplayed to $lastdisplayed</b>";


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
        echo '</table><br>' . "\n";
}

if(!isset($pattern)) { 
	commonHeader("Site Search");
	$form = $PHP_SELF;
?>
<h1>Search</h1>
<form action="<?php echo $form;?>" method="post">
<input type="hidden" name="lang" value="<?php echo htmlspecialchars($lang); ?>">
<table cellspacing="0" cellpadding="2" border="0" align="center">
<tr valign="top">
<td align="right">
Search for:<br></td>
<td>
<input type="text" name="pattern" value="" size="30">
<input type="submit" value=" Search "><br>
</td></tr>
<tr valign="top">
<td align="right">
Restrict the search to:<br></td>
<td>
<?if(!isset($show)) $show = 'quickref';?>
<select name="show">
<option value="quickref" <?=($show=='quickref')?'selected':''?>>function list
<option value="nosource" <?=($show=='nosource')?'selected':''?>>whole site
<option value="manual" <?=($show=='manual')?'selected':''?>>online documentation
<option value="bugdb" <?=($show=='bugdb')?'selected':''?>>bug database
<option value="maillist" <?=($show=='maillist')?'selected':''?>>general mailing list
<option value="devlist" <?=($show=='devlist')?'selected':''?>>developer mailing list
<option value="phpdoc" <?=($show=='phpdoc')?'selected':''?>>documentation mailing list
</select><br>
</td></tr></table>
</form>
<?php } else {
		commonHeader("Search Results");
		echo "<h1>Search Results</h1>\n";
		if (have_search() && isset($htsearch_prog)) {
			$form = $PHP_SELF;
		} else {
			$form="http://www.php.net/search.php";
		}
		if (!isset($base)) {
			if (ereg("^(.+//[^/]+)/",$HTTP_REFERER,$reg)) {
				$base=$reg[1];
			}
			if ($base == $MYSITE) {
				$base = "-";
			}
		}

		$sourceurl = htmlentities($base == '-' ? $PHP_SELF : $base.$PHP_SELF);

		if ($pattern == "") {
			echo "<b>Error:</b> No search words specified.<br><br>";
			echo "Click here for a <a href=\"$sourceurl\">New Search</a><br><br>\n";
			CommonFooter();
			exit();
		}
			
		$words = escapeshellcmd (urlencode($pattern));
		$config = "php";
		if ($show == "manual") {
			$restrict = $MYSITE."manual/en";
			$exclude = "/source";
			$where = "PHP documentation";
		} else {
			$exclude = "/source";
			$restrict = $MYSITE;
			$where = "PHP Web site";
		}
		if (isset($page)) { $off = "&page=".escapeshellcmd($page); } else { $off = ""; }
		$query = "words=$words&config=$config&exclude=$exclude&restrict=$restrict$off";
		exec("$htsearch_prog \"$query\"", $result);
		$rc = count($result);
		if ($rc<2) {
			echo "<b>There was an error executing this query.</b><br><br>Please try later.<br><br>";
			commonFooter();
			exit;
		}
		if ($result[2] == "NOMATCH") {
			echo "Sorry, no documents matched your search for <b>&quot;".htmlspecialchars($pattern)."&quot;</b>.<br><br>";
			echo "Continue your search at ";
			echo "<a href=\"http://www.alltheweb.com/search?q=".htmlspecialchars($pattern)."\">AllTheWeb</a> ";
			echo "or <a href=\"http://www.google.com/search?q=".htmlspecialchars($pattern)."\">Google</a><br><br>";
			echo "Click here for a <a href=\"$sourceurl\">New Search</a> on the PHP website<br><br>\n";
			commonFooter();
			exit;
		}
		$matches = $result[2];
		$firstdisplayed = $result[3];
		$lastdisplayed = $result[4];
		$page = $result[5];
		$pages = $result[6];
		$baseurl = htmlentities($PHP_SELF."?pattern=$words&show=$show&base=$base");

		echo "$matches documents match your search for '<b>",htmlspecialchars($pattern),"</b>' in the $where:<br><br>\n";
		echo "Click here for a <a href=\"$sourceurl\">New Search</a><br><br>\n";

		makeBar($page,$pages,$baseurl,$firstdisplayed,$lastdisplayed);

		$i=7; #skip response header
		while ($i < $rc) {
			if ($base == "-") {
				echo $result[$i];
			} else {
				echo eregi_replace("http://[^.]+\.php\.net/",htmlspecialchars("$base/"),$result[$i]);
			}
			echo "\n";
			$i++;

			echo hdelim("#cccccc");

		}
		echo "<BR>\n";

		makeBar($page,$pages,$baseurl,$firstdisplayed,$lastdisplayed);

		echo "<p>Search powered by<br>\n";
		print_link("http://www.htdig.org/", make_image("htdig.gif", "ht://Dig") );
		echo "</p>\n";
}

commonFooter();
?>
