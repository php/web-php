<?
require_once 'prepend.inc';

$NUMACROSS=2;
$SHOW_CLOSE=10;

if (!isset($lang)) $lang = $MIRRORS[$MYSITE][6];

function makeTable($lang,$array) {
	global $NUMACROSS;

	echo '<TABLE BORDER="0" CELLPADDING="5" CELLSPACING="0" WIDTH="580">';
	echo '<TR VALIGN="top"><TD WIDTH="50%">';
	$i=0;
	$limit = ceil(count($array)/$NUMACROSS);
	asort($array);
	while (list($file,$name)=each($array)) {
		if ($i>0 && $i%$limit==0) {
			echo "</TD><TD WIDTH=\"50%\">\n";
		}
		echo "<A HREF=\"/manual/".$lang."/".$file."\">".$name."</A><BR>\n";
		$i++;
	}
	echo '</TD></TR></TABLE>';
}



$d = dir("$DOCUMENT_ROOT/manual/en");
$functions = $maybe = $temp = array();
$p = 0;

while($entry=$d->read()) {
	if (substr($entry, 0, 1) == ".") {
		continue;
	}
	if (ereg('(function|class)\.(.+)\.php',$entry,$x)) {
		$funcname = str_replace('-', '_', $x[2]);
		$functions[$entry] = $funcname;

		if (function_exists('similar_text') && $notfound) {
			similar_text($funcname, $notfound, &$p); 
			$temp[$entry] = $p;
		}

	}
}
$d->close();
arsort($temp);

$i = 0;
while (list($file,$p)=each($temp)) {
	$funcname = $functions[$file];
	$maybe[$file] = $funcname;
	if ($p>=70 || stristr($funcname,$notfound)) {
		$maybe[$file] = '<b>' . $functions[$file] . '</b>';
	}
	if ($i++ > $SHOW_CLOSE) {
		break;
	}
}


commonHeader("PHP Manual Quick Reference");
?>

<h1>PHP Function List</h1>

<? if ($notfound) { ?>

<P>
Sorry, but the function <B><? echo $notfound; ?></B> is not in the online manual.
Perhaps you misspelled it, or it is a relatively new function that hasn't made it 
into the online documentation yet.  The following are the <? echo $SHOW_CLOSE;?> 
functions which seem to be closest in spelling to <B><? echo $notfound;?></B> (really
good matches are in bold).  Perhaps you were looking for one of these:
</P>

<? makeTable($lang,$maybe); ?>

<P>
If you want to search the entire PHP website for the string &quot;<B><? echo $notfound; ?></B>&quot;, 
then <? print_link('search.php?show=nosource&pattern='.urlencode($notfound), 'click here'); ?>.
</P>
<? } ?>

<P>
Here is a list of all the PHP functions.  Click on any one of them to jump to that page in the manual.
</P>

<? makeTable($lang,$functions); ?>

</TD></TR>
</TABLE>

<?
commonFooter(); 
?>
