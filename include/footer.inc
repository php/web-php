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

  $sponsor["www.php.net"] = "<a href=\"http://BestHost.net/\"><img src=\"http://BestHost.net/images/php_sponsor.gif\" border=0 alt=\"BestHost - proud sponsor of PHP.net\"></a>";
  $sponsor["ca.php.net"] = "<a href=\"http://www.lerdorf.on.ca/\">Site hosted by Lerdorf Consultants Inc.</a>";
  $sponsor["il.php.net"] = "<a href=\"http://www.netvision.net.il/\">Site hosted by Netvision LTD</a>";
  $sponsor["php.netvision.net.il"] = $sponsor["il.php.net"];
  $sponsor["php.technion.ac.il"] = "<a href=\"http://www.technion.ac.il/\">Site hosted by the Technion, Israel Institute of Technology</a>";
  $sponsor["machba.il.php.net"] = $sponsor["php.technion.ac.il"];
  $sponsor["php.omnipotent.net"] = "<a href=\"http://www.netcom.co.uk/\">Site hosted by<BR>Net Communications Ltd.</a>";
  $sponsor["no.php.net"] = '<a href="http://www.guardian.no/"><img align=right alt="Site sponsored by<br>Guardian Networks AS" src="http://www.guardian.no/pics/gnphp.gif" border=0></a>';
  $sponsor["php.guardian.no"] = $sponsor["no.php.net"];

  echo $sponsor[$SERVER_NAME];

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
