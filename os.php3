<?
require("shared.inc");
commonHeader("PHP 3.0 OS Support Tracking");
?>
<blockquote>
We want to make sure that PHP3 compiles cleanly on as many platforms as possible.  Please help
us out by entering the information for your particular build if it has not already been entered.
If you are unable to build PHP on a certain platform, please report it as a bug in the
<a href="http://bugs.php.net">Bugs Database</a>.
</blockquote>
<center><form action=os.php3 method=POST>
<table border=1>
<tr><th>OS:</th><td><input type=text name=os></td><th>Version:</th><td><input type=text name=os_version></td></tr>
<tr><th>Compiler:</th><td><input type=text name=compiler></td><th>Version:</th><td><input type=text name=compiler_version></td></tr>
<tr><th>Email Address</th><td colspan=3><input type=text size=40 name=email></td></tr>
<tr><th>Comment</th><td colspan=3><textarea rows=3 cols=50 name=os_comment></textarea></td></tr>
</table><br>
<input type=submit value="Submit">
</form></center>

<?
mysql_pconnect("localhost","","");
mysql_select_db("php3");

if($os) {
	mysql_query("insert into ossupport values ('$os','$os_version','$compiler','$compiler_version','$os_comment')");
}
include "table_wrapper.inc";
$tables[] = "ossupport";
$fields[] = "os";
$fields[] = "os_version";
$fields[] = "compiler";
$fields[] = "compiler_version";
$fields[] = "email";
$fields[] = "os_comment";
$conversion_table["os"] = "OS";
$conversion_table["os_version"] = "Version";
$conversion_table["compiler"] = "Compiler";
$conversion_table["compiler_version"] = "Version";
$conversion_table["email"] = "Email Addr";
$conversion_table["os_comment"] = "Comment";
table_wrapper();

commonFooter();
?>
