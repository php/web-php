<?
require_once 'prepend.inc';

$NUMACROSS=2;
$d = dir("$DOCUMENT_ROOT/manual/en");
while($entry=$d->read()) {
	if (substr($entry, 0, 1) == ".") {
		continue;
	}
	if (ereg('(function|class)\.(.+)\.php',$entry,$x)):
		$functions[$entry]=ereg_replace("-","_",$x[2]);
	endif;
}
$d->close();
asort($functions);

function makeTable($array) {
	global $NUMACROSS,$FONTFACE;
	$i=0;
	$c=count($array);
	$limit=intval($c/$NUMACROSS)+1;
	echo "<TABLE BORDER=\"0\" CELLPADDING=\"5\" CELLSPACING=\"0\">\n";
	echo "<TR VALIGN=\"top\">\n";
	echo "<TD>\n";
	while (list($file,$name)=each($array)):
		if ($i%$limit==0):
			echo "</TD><TD>\n";
		endif;
		echo "<A HREF=\"/manual/".$file."\">".$name."</A><BR>\n";
		$i++;
	endwhile;
	echo "</TD>\n";
	echo "</TR>\n";
	echo "</TABLE>\n";
};

commonHeader("PHP Manual Quick Reference");
?>

<h1>PHP Function List</h1>

<? if ($notfound) { ?>

<P>
Sorry, but the function <B><? echo $notfound; ?></B> is not in the online manual.
Perhaps you misspelled it, or it is a relatively new function that hasn't made it 
into the online documentation yet.
</P>

<? } ?>

<P>
Here is a list of all the PHP functions.  Click on any one of them to jump to that page in the manual.
</P>

<?
makeTable($functions);
commonFooter();
?>
