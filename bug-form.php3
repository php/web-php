<html><head><title>PHP3 Bug Report Form</title>
<?

include "configuration.inc";
$title="PHP3 Bug Report Form";
include "include/header.inc";

if($email) {
	mysql_pconnect($dbhost,$dbuser,$dbpwd);
	mysql_select_db($dbname);

	$query = mysql_query("SELECT os FROM users where email='$email'"); 
	if (mysql_num_rows($query)>=1) {
		$operating_system = mysql_result($query,0,"os");
	}
	mysql_free_result($query);
}
	
#$destination = "ssb@guardian.no";
$destination = "php3@php.il.eu.org";

cfunction indent($string, $prefix) {
    $string = ereg_replace(13, "", $string); /* get rid of Ctrl-M */
    return $prefix . ereg_replace("\n", "\n$prefix", $string) . "\n";
}

if (isset($cmd) && $cmd == "Send bug report") {

    $report = "";
    echo("<pre>\n");

    $bugdesc = stripslashes($bugdesc);
    $report .= "From:             $email\n\n";
    $report .= "Operating system: $osver\n\n";
    $report .= "PHP version:      $phpver\n\n";
    $report .= "Bug description:\n";
    $report .= indent($bugdesc, "    ");

    $html_report = ereg_replace("<", "&lt;", $report);
    $html_report = ereg_replace(">", "&gt;", $html_report);

    echo $html_report;

    echo("</pre>\n");

    if (Mail($destination, "Bug report:  $bug_short_desc", $report, "From: $email")) {
        echo("<p><h2>Mail sent to $destination...</h2>\n");
	echo("Thank you for your help!\n");
    } else {
        echo("<p><h2>Mail not sent!</h2>\n");
        echo("Please send this page in a mail to " .
	     "<a href=\"mailto:$email\">$email</a> manually.\n");
    }

} else {

?>

<form method=POST action="<? echo $PHP_SELF;?>">

<P><STRONG>Please make sure you have read our list of <A
href="FAQ.php3">Frequently Asked Questions</A> to see whether your
problem may already be a known issue.</STRONG>

<table>
 <tr>
  <th align=right>Your email address:</th>
  <td>
   <input type=text size=20 name="email" value="<?if(isset($email)) { echo $email; }?>">
  </td>
 </tr><tr>
  <th align=right>PHP version:</th>
  <td>
   <select name="phpver">
	<option name="3.0b2a">3.0b2a
	<option name="3.0b2">3.0b2
    <option name="3.0b1">3.0b1
    <option name="3.0CVS">3.0 Latest CVS
    <option name="3.0a4">3.0a4
    <option name="3.0a3">3.0a3
    <option name="3.0a2">3.0a2
    <option name="3.0a1">3.0a1
    <option name="other">other
   </select>
  </td>
 </tr><tr>
  <th align=right>Operating system:</th>
  <td>
   <input type=text size=20 name="osver" value="<?echo $operating_system;?>">
  </td>
 </tr><tr>
  <th align=right>Bug description:</th>
  <td>
   <input type=text size=40 name="bug_short_desc">
  </td>
</table>

<table>
<tr>
<td valign="top">
Please supply any information that may be helpful in fixing the bug:
<ul>
	<li>A short script that reproduces the problem
	<li>The list of modules you compiled PHP with (your configure line)
	<li>A copy of your php3.ini file
	<li>Any other information unique or specific to your setup
</ul>
</td>
<td>
<textarea cols=60 rows=15 name="bugdesc"></textarea>
</td>
</tr>
</table>

<p>

<input type=hidden name=cmd value="Send bug report">
<center>
<input type=submit value="Send bug report">
</center>

</form>

<? } ?>

<? include("include/footer.inc"); ?>
