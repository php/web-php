<?
require("shared.inc");

$NUMACROSS=4;
$d = dir("$DOCUMENT_ROOT/manual");
while($entry=$d->read()) {
	if (substr($entry, 0, 1) == ".") {
		continue;
	}
	if (ereg("(function|class)\.(.+)\.php3",$entry,$x)):
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
	echo "<TABLE BORDER=0 CELLPADDING=5 CELLSPACING=0>\n";
	echo "<TR VALIGN=top>\n";
	echo "<TD><FONT FACE=$FONTFACE SIZE=-1>\n";
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
Here is a list of all the PHP3 functions.  Click on any one of them to jump to that page in the manual.
<P>

<?
makeTable($functions);
commonFooter();
?>
