<?php require "header.inc"?>
<H1>SQL Example</H1>

<?example('<?php
mysql_connect("db.server.com", "username", "password");
mysql_select_db("products");
$result = mysql_query("SELECT * FROM details");
if ($result) {?>
    <TABLE>
    <TR><TH>Name</TH><TH>Description</TH></TR>
<?  while ($a = mysql_fetch_array($result)) {
        echo "<TR><TD>$a[name]</TD>",
                 "<TD>$a[desc]</TD></TR>";
    }
    echo "</TABLE>";
} else {
    echo "<P>I don\'t know about any products.";
}
?>');?>

<?php require "footer.inc"?>
