<br>
<hr width="80%">
<center>
<table width="90%">
	<tr>
		<td align="left">
			<font size="-2">
			All Rights Reserved &copy <a href="credits.php3">PHP 3.0 Development Team</a>
			</font>
		</td>
		<td align="center">
<?
mysql_pconnect($dbhost,$dbuser,$dbpwd) or die("Unable to connect to SQL server");
@mysql_select_db($dbname) or die("Unable to select database");
$sponsquery = @mysql_query("select code from sponsor where server='$SERVER_NAME'");
if(@mysql_num_rows($sponsquery)>0) {
	print mysql_result($sponsquery,0,"code");	
}
?>
		</td>
		<td align="right">
			<table><tr><td align="center">
				<img src="jpgs/powered_by.jpg"><br>
				<font size="-2">Running PHP <? echo phpversion(); ?></font>
			</td></tr></table>
		</td>
	</tr>
</table>
</center>

</body>
</html>
