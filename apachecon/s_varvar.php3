<?php require "header.inc"?>
<H1>Variable Variables</H1>

<?example('<?php
$a="hello";
$hello = " world";
echo $a.$$a;
?>
');?>

<h1>Variable Functions</h1>
<?example('<?php
function db_connect($user,$password) {
	global $db;
	$func = $db."_connect";
	return $func($user,$password);
}
?>');?>

<?php require "footer.inc"?>
