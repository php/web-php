<?php
require_once 'prepend.inc';

$NUMACROSS = 2;
$SHOW_CLOSE = 10;

if (!isset($lang)) $lang = default_language();
if (!file_exists("$DOCUMENT_ROOT/manual/$lang")) $lang = "en";

function makeTable($lang,$array) {
	global $NUMACROSS;

	echo '<table border="0" cellpadding="5" cellspacing="0" width="580">';
	echo '<tr valign="top"><td width="50%">';
	$i = 0;
	$limit = ceil(count($array)/$NUMACROSS);
	asort($array);
	while (list($file,$name)=each($array)) {
		if ($i>0 && $i%$limit==0) {
			echo "</td><td width=\"50%\">\n";
		}
		echo "<a href=\"/manual/".$lang."/".$file."\">".$name."</a><br>\n";
		$i++;
	}
	echo '</td></tr></table>';
}

$d = dir("$DOCUMENT_ROOT/manual/en");
$functions = $maybe = $temp = array();
$p = 0;

while ( $entry=$d->read() ) {
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

<?php if ($notfound) { ?>

<p>
Sorry, but the function <b><?php echo htmlspecialchars($notfound); ?></b> is not in the online manual.
Perhaps you misspelled it, or it is a relatively new function that hasn't
made it into the online documentation yet. The following are the
<?php echo $SHOW_CLOSE; ?> functions which seem to be closest in spelling
to <b><?php echo htmlspecialchars($notfound); ?></b> (really good matches are in bold). Perhaps
you were looking for one of these:
</p>

<?php makeTable($lang,$maybe); ?>

<p>
If you want to search the entire PHP website for the string
&quot;<b><?php echo htmlspecialchars($notfound); ?></b>&quot;, then
<?php print_link('search.php?show=nosource&amp;pattern='.urlencode(htmlspecialchars($notfound)), 'click here'); ?>.
</p>

<p>
For a quick overview over all PHP functions, 
<?php print_link('quickref.php', 'click here') ?>.
</p>

<?php
  commonFooter();
  exit;
} 
?>

<p>
Here is a list of all the PHP functions. Click on any one of them to
jump to that page in the manual.
</p>

<?php makeTable($lang,$functions); ?>

</td></tr>
</table>

<?php commonFooter(); ?>
