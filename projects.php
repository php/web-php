<?
require("shared.inc");
commonHeader("Projects");
?>
<h3>Projects using PHP</h3>

<p>An increasing number of projects, both commercial and open source,
are using PHP as their main development tool. This is a listing of
some of the open-source PHP applications available, courtesy of
<a href="http://freshmeat.net/">freshmeat</a>. (Last updated:
<?date("M d, Y h:ia", filemtime("backend/projects.html"))?>.)</p>

<table border="0" cellpadding="0" cellspacing="0" width="100%">

<?readfile("backend/projects.html");?>

<tr bgcolor="#d0d0d0" valign="top">
 <td align="left" width="18"><img alt=" " src="/gifs/gcap-lefttop.gif" width="18" height="18" border="0"><br></td>
 <td valign="middle" align="left" rowspan="2">
  If you have a project you feel belongs on this list, submit it to 
  <a href="http://freshmeat.net/">freshmeat</a> and make sure to categorize
  it in the "Programming Language : PHP" category.
  <br>
 </td>
 <td align="right" width="18"><img alt=" " src="/gifs/gcap-righttop.gif" width="18" height="18" border="0"><br></td>
</tr>
<tr valign="bottom" bgcolor="#d0d0d0">
 <td align="left"><img alt=" " src="/gifs/gcap-leftbot.gif" width="18" height="18" border="0"><br></td>
 <td align="right"><img alt=" " src="/gifs/gcap-rightbot.gif" width="18" height="18" border="0"><br></td>
</tr>

</table>

<? commonFooter(); ?>
