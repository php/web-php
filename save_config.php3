<?
include "auth.inc";

mysql_pconnect($dbhost,$dbuser,$dbpwd);
mysql_select_db("php3");

$result=mysql_query("select id,name from boolean_option_names");
mysql_query("delete from boolean_options where email='$email'");
while ($row=mysql_fetch_row($result)) {
	$varname = $row[1];
	if (isset($$varname)) {
		mysql_query("insert into boolean_options (email,id,val) values ('$email',$row[0],1)");
	}
}

$result = mysql_query("select id,name from string_option_names");
mysql_query("delete from string_options where email='$email'");
while ($row=mysql_fetch_row($result)) {
	$varname = $row[1];
	if (isset($$varname)) {
		mysql_query("delete from string_options where email='$email' and id=$row[0]");
		$query = sprintf("insert into string_options (email,id,val) values ('$email',$row[0],'%s')",$$varname);
		mysql_query($query);
	}
}
?>

<html>
<head><meta http-equiv="refresh" content="3;  url=<? echo $base_url ?>config-form.php3"></head>
<body>Configuration Saved.<hr width="80%"><font size=-2>All Rights Reserved &copy PHP 3.0 Development Team</font>
</body>
</html>
