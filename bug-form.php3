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

    if (Mail($destination, "PHP3 bug-form report", $report, "From: $email")) {
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

<table>
 <tr>
  <th align=right>Your email address:</th>
  <td>
   <input type=text size=20 name="email" value="<?if(isset($email)) { echo $email; }?>">
  </td>
 </tr><tr>
  <th align=right>PHP version:</th>
  <td>
   <input type=text size=20 name="phpver" value="3.0a3">
  </td>
 </tr><tr>
  <th align=right>Operating system:</th>
  <td>
   <input type=text size=20 name="osver" value="<?echo $operating_system;?>">
  </td>
 </tr>
</table>

<h2>Bug description</h2>

Please remember to include the following:
<ul>
 <li> Your configuration (such as the configure command and your
      php3.ini file)
 <li> How the error can be reproduced
</ul>

<textarea cols=60 rows=15 name="bugdesc"></textarea>

<p>

<input type=hidden name=cmd value="Send bug report">
<input type=submit value="Send bug report">

</form>

<? } ?>

</body>
