<?php
mysql_connect("localhost","nobody","");
mysql_select_db("php3");
$res = mysql_query("SELECT * FROM mirrors ORDER BY cc");
if (!$res) die("error");
echo "<?php\n\$MIRRORS = array(\n";
while ($row = mysql_fetch_array($res)) {
  if (!strstr("http:",$row[hostname])) $row[hostname]="http://$row[hostname]/";
  # set inactive mirrors to type 2 so they won't show up in the drop-down.
  if (!$row[active]) $row[mirrortype] = 2;
  echo "  \"$row[hostname]\" => array(\"$row[cc]\",\"$row[providername]\",$row[has_stats],\"$row[providerurl]\",$row[mirrortype],$row[has_search],\"$row[lang]\"),\n";
}
echo '  0 => array("xx", "Unknown", 0, "/", 2, 0, "en")', "\n";
echo ");\n";
echo "?>\n";
