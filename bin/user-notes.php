<?php
require_once 'prepend.inc';
require_once 'shared-manual.inc';

if (!is_primary_site()) die("only available on primary site.");

# token required, since this should only get accessed from rsync.php.net
if (!isset($token) || md5($token) != "19a3ec370affe2d899755f005e5cd90e")
  die("token not correct.");

mysql_connect("localhost","nobody","") or die("unable to connect to db");
mysql_select_db("php3") or die("unable to select database");

$query  = "SELECT DISTINCT id,note.sect,user,note,UNIX_TIMESTAMP(ts) AS ts,";
$query .= "IF(votes=0, 10, rating/votes) AS rate";
$query .= " FROM note";
if ($since) {
  $query .= ",updated WHERE note.sect=updated.sect";
}
$query .= " ORDER BY sect";

if ($since) {
  mysql_query("CREATE TEMPORARY TABLE updated TYPE = HEAP SELECT DISTINCT sect FROM note WHERE ts > FROM_UNIXTIME($since)")
    or die("failed to create temporary table");
}

$res = mysql_query($query) or die("query failed");

while ($row = mysql_fetch_array($res)) {
  # get rid of the ordered fields, we just want the named ones.
  for ($i = count($row) / 2; $i >= 0; $i--) unset($row[$i]);
  echo "$row[id]|$row[sect]|$row[rate]|$row[ts]|$row[user]|",
       base64_encode(gzcompress($row[note],3)),"\n";
}
