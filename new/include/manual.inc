<?
$MANUAL = array(
/*
   "entry name"         =>       "url", "category name"
*/

   "Table of Contents"  => array("index.php3", "Introduction"),
   "Introduction: 1"    => array("intro1.php3", "Introduction"),
   "Introduction: 2"    => array("intro2.php3", "Introduction"),
   "Introduction: 3"    => array("intro3.php3", "Introduction"),
   "Installation"    => array("install.php3", "Installation"),
   "Configuration"    => array("install1.php3", "Installation")
);


reset($MANUAL);
$c=0;
$oldkey="";
$lastcat="";
while ($c<count($MANUAL)):
	$key=key($MANUAL);
	
	$category=$MANUAL[$key][1];
	if ($category!=$lastcat):
		$CAT_URLS[$category]=$MANUAL[$key][0];
	endif;

	$PREV[$key]=$oldkey;
	next($MANUAL);
	$newkey=key($MANUAL);
	$NEXT[$key]=$newkey;
	$oldkey=$key;
	$c++;
endwhile;

?>