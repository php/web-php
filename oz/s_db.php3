<?php require "header.inc"?>
<H1>Database Abstraction</H1>
<?
example('<?
use \'DB\';
$db = DB::connect(\'odbc://rasmus:pw@host/my_db\');
$stmt = $db->prepare(\'select * from my_table\');
$result = $db->execute($stmt);
while($row = $db->fetchrow($result)) {
    while(list($key, $value) = each($row)) {
        echo "$field: $value<br>\n";
    }
}
$db->disconnect();
?>'); ?>
<?php require "footer.inc"?>
