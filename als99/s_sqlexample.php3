<?php require "header.inc"?>
<H1>SQL Example</H1>

<?example('<?php

mysql_pconnect("db.server.com", "username", "password");
mysql_select_db("products");
$result = mysql_query("SELECT * FROM details");
if ($result) {
    echo "<TABLE>\n";
    echo " <TR><TH>Name</TH><TH>Description</TH></TR>\n";
    while ($a = mysql_fetch_array($result)) {
        echo "<TR><TD>$a[name]</TD>",
                 "<TD>$a[descr]</TD></TR>";
    }
    echo "</TABLE>";
} else {
    echo "<P>Nothing to see here.";
}

?>');?>

<?php require "footer.inc"?>
