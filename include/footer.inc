<br>
<hr width="80%">
<center>
<table width="90%">
 <tr>
  <td align="left" width="33%">
   <font size="-1">
    &copy <a href="<?echo $root_url;?>credits.php3">PHP 3.0
     Development Team</a><br>
    All Rights Reserved
   </font>
  </td>
  <td align="center" width="33%"><?

  mysql_pconnect($dbhost,$dbuser,$dbpwd) or
      die("Unable to connect to SQL server");
  @mysql_select_db($dbname) or
      die("Unable to select database");
  $sponsquery = @mysql_query("SELECT code FROM sponsor " .
                             "WHERE server='$SERVER_NAME'");
  if (@mysql_num_rows($sponsquery) > 0) {
      print StripSlashes(mysql_result($sponsquery, 0, "code"));	
  }

?></td>
  <td align="right" width="33%">
   <table><tr><td align="center">
     <img src="<? echo jpgurl("powered_by.jpg"); ?>"><br>
     <font size="-2">Running PHP <? echo phpversion(); ?></font>
   </td></tr></table>
  </td>
 </tr>
</table>
</center>

</body>
</html>
