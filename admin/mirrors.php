<?php
require 'prepend.inc';
require 'cvs-auth.inc';

if (!is_primary_site()) {
  if (!is_backup_primary()) {
    header("Location: http://www.php.net/admin/mirrors.php");
  }
  exit;
}

if (isset($save) && isset($user) && isset($pw)) {
  setcookie("MAGIC_COOKIE",base64_encode("$user:$pw"),time()+3600*24*12,'/');
}
if (isset($MAGIC_COOKIE) && !isset($user) && !isset($pw)) {
  list($user,$pw) = explode(":", base64_decode($MAGIC_COOKIE));
}

commonHeader("mirror administration");

if (!$user || !$pw || !verify_password($user,$pw)) {?>
<form method="POST" action="<?php echo $PHP_SELF?>">
<input type="hidden" name="save" value="1" />
<table>
 <tr>
  <th align="right">Username:</th>
  <td><input type="text" name="user" value="<?php echo htmlspecialchars(stripslashes($user));?>" />
 </tr>
 <tr>
  <th align="right">Password:</th>
  <td><input type="password" name="pw" value="<?php echo htmlspecialchars(stripslashes($pw));?>" />
 </tr>
 <tr>
  <td align="center" colspan="2"><input type="submit" value="Login" /></td>
 </tr>
</table>
</form>
<?php
  commonFooter();
  exit;
}

mysql_connect("localhost","nobody","")
  or die("unable to connect to database");
mysql_select_db("php3");

$active = isset($active) ? 1 : 0;
$has_search = isset($has_search) ? 1 : 0;
$has_stats = isset($has_stats) ? 1 : 0;

if (isset($id) && isset($hostname)) {
  if ($id) {
    $query = "UPDATE mirrors SET hostname='$hostname',active=$active,mirrortype=$mirrortype,cname='$cname',maintainer='$maintainer',providername='$providername',providerurl='$providerurl',cc='$cc',lang='$lang',has_stats=$has_stats,has_search=$has_search WHERE id=$id";
  }
  else {
    $query = "INSERT INTO mirrors (hostname,active,mirrortype,cname,maintainer,providername,providerurl,cc,lang,has_stats,has_search) VALUES ('$hostname',$active,$mirrortype,'$cname','$maintainer','$providername','$providerurl','$cc','$lang',$has_stats,$has_search)";
  }
  if (!mysql_query($query)) {
    echo "<h2 class=\"error\">Query failed: ", mysql_error(), "</h2>";
  }
  else {
    echo "<h2>$hostname ", $id ? "updated" : "added", ".</h2>";
  }
}
elseif (isset($id)) {
  if ($id) {
    $res = mysql_query("SELECT * FROM mirrors WHERE id=$id");
    $row = mysql_fetch_array($res);
  }
?>
<table>
<form method="POST" action="<?php echo $PHP_SELF;?>">
<input type="hidden" name="id" value="<?php echo $row[id];?>" />
<tr>
 <th align="right">Hostname:</th>
 <td><input type="text" name="hostname" value="<?php echo htmlspecialchars($row[hostname]);?>" size="10" maxlength="40" /></td>
</tr>
<tr>
 <th align="right">Active?</th>
 <td><input type="checkbox" name="active"<?php echo $row[active] ? " checked" : "";?> /></td>
</tr>
<tr>
 <th align="right">Type:</th>
 <td><select name="mirrortype"><?php show_mirrortype_options($row[mirrortype]);?></select></td>
</tr>
<tr>
 <th align="right">Cname:</th>
 <td><input type="text" name="cname" value="<?php echo htmlspecialchars($row[cname]);?>" size="10" maxlength="80" /></td>
</tr>
<tr>
 <th align="right">Maintainer:</th>
 <td><input type="text" name="maintainer" value="<?php echo htmlspecialchars($row[maintainer]);?>" size="10" maxlength="255" /></td>
</tr>
<tr>
 <th align="right">Provider:</th>
 <td><input type="text" name="providername" value="<?php echo htmlspecialchars($row[providername]);?>" size="10" maxlength="255" /></td>
</tr>
<tr>
 <th align="right">Provider URL:</th>
 <td><input type="text" name="providerurl" value="<?php echo htmlspecialchars($row[providerurl]);?>" size="10" maxlength="255" /></td>
</tr>
<tr>
 <th align="right">Country:</th>
 <td><select name="cc"><?php show_country_options($row[cc]);?></select></td>
</tr>
<tr>
 <th align="right">Language:</th>
 <td><select name="lang"><?php show_language_options($row[lang]);?></select></td>
<tr>
 <th align="right">Stats?</th>
 <td><input type="checkbox" name="has_stats"<?php echo $row[has_stats] ? " checked" : "";?> /></td>
<tr>
 <th align="right">Search?</th>
 <td><input type="checkbox" name="has_search"<?php echo $row[has_search] ? " checked" : "";?> /></td>
</tr>
<tr>
 <td><input type="submit" value="<?php echo $id ? "Change" : "Add";?>" />
</tr>
</table>
<?
  commonFooter();
  exit;
}

$res = mysql_query("SELECT * FROM mirrors ORDER BY hostname")
  or die("query failed");

?>
<p>blue entries are special (not real mirrors), red entries are not active.</p>
<table border="0" cellspacing="1" width="100%">
<tr bgcolor="#aaaaaa">
 <td></td>
 <th>Hostname</th>
 <th>Maintainer</th>
 <th>Provider</th>
 <th>Stats</th>
</tr>
<?php
$color = '#dddddd';
while ($row = mysql_fetch_array($res)) {?>
<tr bgcolor="<?php echo $row[active] ? ($row[mirrortype] == 1 ? $color : substr($color,0,5)."ff") : "#ff".substr($color,3);?>">
 <td align="center"><a href="<?php echo "$PHP_SELF?id=$row[id]";?>"><?php echo make_image('small_submit.gif', 'edit');?></a></td>
 <td><a href="<?php echo ereg("^(f|ht)tp:",$row[hostname]) ? "" : "http://", htmlspecialchars($row[hostname]);?>"><?php echo htmlspecialchars($row[hostname]);?></a></td>
 <td><?php echo htmlspecialchars($row[maintainer]);?>&nbsp;</td>
 <td><a href="http://<?php echo htmlspecialchars($row[providerurl]);?>/"><?php echo htmlspecialchars($row[providername]);?></a></td>
 <td align="center"><?php echo $row[has_stats] ? "<a href=\"http://$row[hostname]/stats/\">go</a>" : "&nbsp;";?></td>
</tr>
<?php
  $color = $color == '#dddddd' ? '#eeeeee' : '#dddddd';
}
?>
</table>
<p><a href="<?php echo $PHP_SELF;?>?id=0">add a new mirror</a></p>
<?php
commonFooter();

function show_country_options($cc="") {
  global $COUNTRIES;
  reset($COUNTRIES);
  while (list($k,$v) = each($COUNTRIES)) {
    echo "<option value=\"$k\"", $cc == $k ? " selected" : "", ">$v</option>";
  }
}

function show_language_options($lang="") {
  global $LANGUAGES;
  reset($LANGUAGES);
  while (list($k,$v) = each($LANGUAGES)) {
    echo "<option value=\"$k\"", $lang == $k ? " selected" : "", ">$v</option>";
  }
}

function show_mirrortype_options($type="") {
  $types = array(1 => "standard", 2 => "special", 0 => "download" );
  while (list($k,$v) = each($types)) {
    echo "<option value=\"$k\"", $type == $k ? " selected" : "", ">$v</option>";
  }
}
?>
