<html><head><title>Professional Home Pages Version 3.0</title>
<? $title="Welcome";
   include "include/header.inc"; ?>

<center><img src="gifs/php3logo.gif"><br><font size="-1">Professional Home Pages</font></center>

<p>PHP 3.0 is a complete rewrite of the popular web development scripting language, 
<a href="http://php.iquest.net/">PHP/FI 2.0</a>.<br>
It is currently in a public beta testing period.  

<ul>
<li><a href="download.php3">Download PHP 3.0!</a>
<li>Read about whether or not you should <a href="why_beta.php3">upgrade from PHP/FI 2.0</a>.
<li><a href="documentation.php3">Documentation Resources</a>
<li><a href="http://il.php.net/config.php3">Configure PHP 3.0</a> online <font size="-2">(JavaScript required)</font>
<li>Report or check on bugs in the <a href="http://ca.php.net/bugs.php3">PHP3 Bug Database</a>
<li>Subscribe to the <a href="mailto:php3-subscribe@php.il.eu.org">PHP 3.0 mailing list</a>
<li><a href="http://www.tryc.on.ca/php3.html">PHP 3.0 mailing list archive</a>
<li><a href="http://ca.php.net/cvsweb.cgi">Web interface to CVS repository for PHP3 tree</a>
<!--<li><a href="patches.php3">Download patches</a> for official PHP 3.0 releases-->
</ul>
<br>
<center><font size=-1>
<i><b>Note:</b> The February issue of <font size=+1>WEB</font>Techniques has
a full article on PHP3.  Pick up a copy!</i>
</font></center>
<br>

<center>
<table cellpadding="5">
 <tr>
  <td><font size="-1">Mirror Sites:</font></td>
<?

  reset($mirror_sites);
  while ($site = key($mirror_sites)) {
      next($mirror_sites);
      echo('  <td align="center"><a href="' . $site . '"><img src="gifs/' .
           $mirror_sites[$site][0] . '-small.gif" border="0"><br>' .
           '<font size="-2">' .$mirror_sites[$site][1]. "</font></a></td>\n");
  }

?>
 </tr>
</table>
</font>
</center>

<?include "include/footer.inc";?>
