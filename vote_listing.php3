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


commonFooter();

?>
