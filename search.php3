<html><head><title>PHP3 Glimpse Search</title>
<?
	require("shared.inc");
	commonHeader("Glimpse Search");
	include "configuration.inc";
	/* Set this to the directory containing your .glimpse* files */
	if (isset($glimpse_dir)) {
		$gdir = $glimpse_dir;
	} else {
		$gdir = "/u/www/servers/lerdorf/php3";
	}
	/* Set this to the path of your glimpse binary */
	if (isset($glimpse_prog)) {
		$glimpse = $glimpse_prog;
	} else {
		$glimpse = "/usr/local/bin/glimpse";
	}

	if(!isset($pattern)) { ?>
	<h1 align=center>PHP3 Glimpse Search</h1>
	<blockquote>
	You may use a ';' (semi-colon)
	between expressions to represent a logical &quot;AND&quot; while a ',' (comma) represents
	an &quot;OR&quot;.  So, to search for APPLE and ORANGE, use &quot;APPLE;ORANGE&quot;.
	You may also use full regular expressions in the search field.
	<blockquote>
	<form action="<?echo $PHP_SELF ?>" method=POST>
	Search for: <input type="text" name="pattern" size=30>
	<input type="submit" value=" Search "><br>
	<tt>Case Sensitive Search&nbsp;</tt> <input type="checkbox" name="icase"><br>
	<tt>Match Whole words only</tt> <input type="checkbox" name="words"><br>
	<tt>Approximate Search&nbsp;&nbsp;&nbsp;&nbsp;</tt> <input type="checkbox" name="fuzzy"><br>
	<input type="hidden" name="st_num" value="1">
	<input type="hidden" name="psize" value="10">
	</form></blockquote></blockquote>
<? } else { ?>
	<h1 align=center>Glimpse Search Results</h1>
	<p>Search expression: <b><?echo $pattern?></b></p>
	<?if(filesize("$gdir/.glimpse_messages")==0) { ?>
		<p><b>SORRY</b> - Search index is currently being rebuilt, please try again in a few minutes.</p>
		<?exit;
	}
	if(isset($words) && $words) {
		$words="-w";
	} else {
		$words="";
	}
	if(isset($icase) && $icase) {
		$caseopt="";
		$icase="1";
	} else {
		$caseopt="-i";
		$icase="";
	}
	if(isset($fuzzy) && $fuzzy) {
		$fuzzy="-2";
	} else {
		$fuzzy="";
	}
	exec("$glimpse -c $caseopt $words $fuzzy -y -H $gdir '$pattern' | /usr/bin/sort -r -t: -n -k 2,2",&$result);
	$num = count($result);
	if($num==0) {
		echo "<p align=center>No matches found!</p>";
	} else { ?>
		<p><font size=+1><b>Results <?echo $st_num?> - <?if($st_num+$psize-1 < $num) { echo $st_num+$psize-1; } else { echo $num; } ?> out of <?echo $num?></b></font></p>
		<?$i=$st_num-1;
		while($i<$num && $i<($st_num+$psize-1)) {
			ereg("(/[^/]*)(/[^/]*)\$",$result[$i],&$regs);
			$line = $regs[1].$regs[2];
			$file = ereg_replace(":.*\$","",$result[$i]);
			$l = strlen($file);
			if($l<30) {
				$filepat=$file;
			} else {	
				/* Glimpse can't handle file pattern specs longer than 29 chars 
				   so we take the last 29 and hope the path is unique in those 29 */
				$filepat = substr($file,$l-29,29);
			}
			$url = ereg_replace(":.*\$","",$line);
			if (isset($glimpse_url_regexp)) {
				$url = ereg_replace($glimpse_url_regexp, "", $url);
			}
			$cnt = (int)ereg_replace("^.*: ","",$line);
			$size = filesize($file);
			$mtime = date("D M d/y",filemtime($file));
			error_reporting(0);
			$fp = fopen($file,"r");
			error_reporting(1);
			if($fp) {
				$text = fgetss($fp,256);
				$text = ereg_replace("  +"," ",$text);
				$text = ereg_replace(13,"",$text);
				while(strlen($text)<3 && !feof($fp)) {
					$text = fgetss($fp,256);
					$text = ereg_replace("  +"," ",$text);
					$text = ereg_replace(13,"",$text);
					if(!strlen(ereg("[a-zA-Z0-9]",$text))) {
						$text="";
					}
				}
				$j=0;
				$remain = ereg_replace(".+[\\?]","",$text);
				if($text!=$remain) {
					$text = $text - $remain;
				}
				echo "<p><font size=+1><a href=\"$url\">$text</a></font>&nbsp;&nbsp;<i>file size: $size</i>&nbsp;&nbsp;<i>modified: $mtime</i>&nbsp;&nbsp;<i>matches: $cnt</i>\n";
				echo "<blockquote>";
				exec("$glimpse $icase $words $fuzzy -y -L0:0:1 -q -F '$filepat' -H $gdir '$pattern'",&$context);
				$pos = ereg("@",$context);
				unset($context);	
				$pos = substr($pos,1,strlen($pos));
				$pos = intval(ereg_replace("{.*","",$pos));
				if($pos > ftell($fp)) {
					fseek($fp,$pos-1);
				}
				while(!feof($fp) && $j<240) {
					$text = fgetss($fp,256);
					$j+=strlen($text);
					echo HtmlSpecialChars($text);
				}
				fclose($fp);
				echo "</blockquote></p>\n";
			}
			$i++;
		} ?>
		<?$st_num+=$psize;
		if($st_num <= $num) { ?>
			<form action="<?echo $PHP_SELF?>" method=POST>
			<input type="hidden" name="st_num" value="<?echo $st_num?>">
			<input type="hidden" name="psize" value="<?echo $psize?>">
			<input type="hidden" name="icase" value="<?echo $icase?>">
			<input type="hidden" name="fuzzy" value="<?echo $fuzzy?>">
			<input type="hidden" name="pattern" value="<?echo $pattern?>">
			<input type="submit" value="Next Page: <?echo $st_num?> to <?if($st_num+$psize-1 < $num) { echo $st_num + $psize - 1; } else { echo $num; } ?> ">
			</form>
		<?}
	}
} ?>
<?commonFooter();?>
</body></html>
