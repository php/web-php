<?
require("shared.inc");
require("table_wrapper.inc");
commonHeader("PHP - Acronym Meaning Vote - Current Status");

mysql_connect() and mysql_select_db("php3") or die("SQL problem");

function external_processing($fieldname,$tablename,$data,$row)
{
	switch($fieldname) {
		case "Email":
			print "<a href='mailto:$data'>$data</a>";
			break;
		case "Choice":
			switch($data) {
				case 1:
					print 'PHP HTML Preprocessor';
					break;
				case 2:
					print 'PHP Hypertext Preprocessor';
					break;
				case 3:
					print 'PHP Hypermedia Preprocessor';
					break;
			}
			break;
		default:
			if (!empty($data)) {
				print $data;
			} else {
				print "&nbsp;";
			}
			break;
	}
}

$tables[] = "name_vote";
$fields[] = "name as Name";
$fields[] = "email as Email";
$fields[] = "choice as Choice";
$fields[] = "comments as Comments";

$external_processing_function="external_processing";

table_wrapper();

$res1 = mysql_result(mysql_query("select count(*) from name_vote where choice=1"),0,0);
$res2 = mysql_result(mysql_query("select count(*) from name_vote where choice=2"),0,0);
$res3 = mysql_Result(mysql_query("select count(*) from name_vote where choice=3"),0,0);

?>

<h3>Summary</h3>
<table border="1">
<tr><th>Name</th><th>Votes</th></tr>
<tr><td>PHP HTML Preprocessor</td><td align="center"><? print $res1; ?></td></tr>
<tr><td>PHP Hypertext Preprocessor</td><td align="center"><? print $res2; ?></td></tr>
<tr><td>PHP Hypermedia Preprocessor</td><td align="center"><? print $res3; ?></td></tr>
<tr><th>Total</th><td align="center"><? print $res1+$res2+$res3; ?></td></tr>
</table>

<?

commonFooter();

?>
