<html><head><title>PHP3 Bug Database</title>
<?

$title="PHP3 Bug Database";
require "include/header.inc";

$destination = "php3@php.il.eu.org";
#$destination = "rasmus@lerdorf.on.ca";

function indent($string, $prefix) {
    $string = ereg_replace(13, "", $string); /* get rid of Ctrl-M */
    return $prefix . ereg_replace("\n", "\n$prefix", $string) . "\n";
}

function show_menu($state) {
	global $PHP_SELF, $bug_type;

	if(!isset($bug_type)) { $bug_type="Any"; }
	echo "<form method=POST action=\"$PHP_SELF\">\n";
	echo "<input type=hidden name=cmd value=\"Display Bugs\">\n";
	echo "<input type=submit value=\"Display\"> <select name=\"status\">\n";
	if($state) { echo "<option>$state\n"; }
	if($state!="Open") { echo "<option>Open\n"; }
	if($state!="Closed") { echo "<option>Closed\n"; }
	if($state!="All") { echo "<option>All\n"; }
	echo "</select> bugs of type ";
	show_types($bug_type);
	echo "</form>\n";
}

function show_types($first_item) {
	$items = array("Any",
				   "Feature/Change Request",
				   "Documentation problem",
				   "Installation problem",
				   "Failed to compile",
				   "Parser error",
				   "Performance problem",
				   "MySQL related",
				   "mSQL related",
				   "PostgreSQL related",
				   "ODBC related",
				   "Oracle related",
				   "Sybase related",
				   "Solid related",
				   "Adabas-D related",
				   "dBase related",
				   "dbm related",
				   "Other");

	echo "<select name=\"bug_type\">\n<option>$first_item\n";
	for($i=0;$i<count($items);$i++) {
		if($first_item!=$items[$i]) {
			echo "<option>$items[$i]\n";
		}
	}
    echo "</select>\n";
}

function find_password($user) {
	$fp=fopen("/repository/CVSROOT/passwd","r");
	while(!feof($fp)) {
		$line=fgets($fp,120);
		list($luser,$passwd,$junk) = explode(":",$line);
		if($user==$luser) {
			fclose($fp);
			return($passwd);
		}
	}
	fclose($fp);
	return("");
}

function addlinks($text) {
	$text = htmlspecialchars($text);
	$new_text = ereg_replace("(http:[^ \n\t]*)","<a href=\"\1-=-\">\1</a>",$text);
	$new_text = ereg_replace("(ftp:[^ \n\t]*)","<a href=\"\1-=-\">\1</a>",$text);
	$new_text = ereg_replace("[.,]-=-\"","\"",$new_text);
	$new_text = ereg_replace("-=-\"","\"",$new_text);
	return $new_text;
}

if (isset($cmd) && $cmd == "Send bug report") {
	if(!ereg("@",$email)) {
		echo "Please provide a valid email address<P>\n";
		include("include/footer.inc");
		exit;
	}

	if($bug_type=="--Please Select--") {
		echo "Please select an appropriate bug type<P>\n";
		include("include/footer.inc");
		exit;
	}

	show_menu($status);
	echo "<hr>\n";
	
    mysql_pconnect("localhost","bourbon","");
    mysql_select_db("php3");
	$ts=date("Y-m-d H:i:s");
    mysql_query("INSERT into bugdb values (0,'$bug_type','$email','$sdesc','$ldesc','$php_version','$php_os','Open','','$ts','$ts','')");
	$cid = mysql_insert_id();

    $report = "";
    echo("<pre>\n");

    $ldesc = stripslashes($ldesc);
    $sdesc = stripslashes($sdesc);
    $report .= "From:             $email\n";
    $report .= "Operating system: $php_os\n";
    $report .= "PHP version:      $php_version\n";
    $report .= "PHP Bug Type:     $bug_type\n";
    $report .= "Bug description:\n";
    $report .= indent($ldesc, "    ");

    $html_report = ereg_replace("<", "&lt;", $report);
    $html_report = ereg_replace(">", "&gt;", $html_report);

    echo $html_report;

    echo("</pre>\n");

    if (Mail($destination, "Bug #$cid:  $sdesc", $report, "From: $email")) {
        echo("<p><h2>Mail sent to $destination...</h2>\n");
	echo("Thank you for your help!\n");
    } else {
        echo("<p><h2>Mail not sent!</h2>\n");
        echo("Please send this page in a mail to " .
	     "<a href=\"mailto:$email\">$email</a> manually.\n");
    }

} elseif(isset($cmd) && $cmd=="Display Bugs") { 
	show_menu($status);
	echo "<hr>\n";

	include("table_wrapper.inc");
	
	function external_processing($fieldname,$tablename,$data,$row)
	{
		switch($fieldname) {
			case "id":
				print "<a href=\"bugs.php3?id=$data\">$data</a>\n";	
				break;
			case "Originator":
				print "<a href=\"mailto:$data\">$data</a>\n";
				break;
			default:
				print $data;
				break;
		}
	}
	function row_coloring($row) {
		switch($row["Status"]) {
			case "Open":
				return "#ffbbaa";
				break;
			case "Closed":
				return "#aaffbb";
				break;
			default:
				return "#aaaaaa";
				break;
		}
	}
	$external_processing_function="external_processing";
	$row_coloring_function="row_coloring";
	
    mysql_pconnect("localhost","bourbon","");
    mysql_select_db("php3");

	$tables[] = "bugdb";
	$fields[] = "id";
	$fields[] = "bug_type";
	$fields[] = "status as Status";
	$fields[] = "php_version as Version";
	$fields[] = "php_os as OS";
	$fields[] = "email as Originator";
	$fields[] = "sdesc as Description";
	$conversion_table["id"] = "ID#";
	$conversion_table["bug_type"] = "Bug Type";
	$pass_on = ereg_replace(" ","+","&cmd=Display+Bugs&status=$status&bug_type=$bug_type");
	$default_header_color="aaaaaa";
	$centering["id"] = "center";
	
	if (!isset($order_by)) {
		$order_by = "id";
	}
	if($status=="All" && $bug_type=="Any") {
		/* nothing */
	} elseif($status=="All" && $bug_type!="Any") {
		$where_clause = "bug_type='$bug_type'";
	} elseif($status!="All" && $bug_type=="Any") {
		$where_clause = "status='$status'";
	} else {
		$where_clause = "status='$status' and bug_type='$bug_type'";
	}
	table_wrapper("php3");
	echo "<br><center><a href=\"$PHP_SELF\">Submit a Bug Report</a></center>\n";
} else if(!isset($cmd) && isset($id)) {
	show_menu($status);
	echo "<hr>\n";

    mysql_pconnect("localhost","bourbon","");
    mysql_select_db("php3");
	if(isset($modify) && $modify=="Edit Bug") {
		$ok=0;
		if($user!="cvsread") {
			$psw=find_password($user);
			if(strlen($psw)>0) {
				if(crypt($pw,substr($psw,0,2))==$psw) {
					$ts=date("Y-m-d H:i:s");
					if($status=="Delete!") {
						mysql_query("DELETE from bugdb where id=$id");
					} else {
						mysql_query("UPDATE bugdb set status='$estatus', comments='$comments', ts2='$ts', dev_id='$user' where id=$id");
					}
					$ok=1;
				}
			}
		}
		if(!$ok) {
			echo "<b>Sorry, incorrect user id/password pair.</b><br>\n";
    		Mail("rasmus@lerdorf.on.ca", "bugdb auth failure for $user/$pw", "", "From: bugdb");
		} else {
			echo "<b>Database updated!</b><br>\n";
		}
	}
    $result = mysql_query("SELECT * from bugdb where id=$id");
	if(mysql_numrows($result)>0) {
		$row = mysql_fetch_row($result);	
		echo "<br><h1>Bug id #$id</h1>\n";
		echo "<table>\n";
		if(!isset($edit)) {
			echo "<tr><th align=right>Status:</th><td>".$row[7]."</td>";
			echo "<td><a href=\"$PHP_SELF?id=$id&edit=1\"><font size=-1><tt>Modify</tt></font></a></td>";
		} else {
			echo "<form method=POST action=\"$PHP_SELF?id=$id\">\n";
			echo "<input type=hidden name=modify value=\"Edit Bug\">\n";
			echo "<tr><th align=right>Status:</th><td><select name=\"estatus\">\n";
			if($row[7]=="Open") {
				echo "<option>Open\n<option>Closed<option>Delete!\n";
			} else {
				echo "<option>Closed\n<option>Open<option>Delete!\n";
			}
			echo "</select>\n";
		}
		echo "</tr>\n";
		echo "<tr><th align=right>From:</th><td><a href=\"mailto:".$row[2]."\">".$row[2]."</a></td></tr>\n";
		echo "<tr><th align=right>Date:</th><td>".$row[9]."</td></tr>\n";
		echo "<tr><th align=right>Type:</th><td>".$row[1]."</td></tr>\n";
		echo "<tr><th align=right>OS:</th><td>".$row[6]."</td></tr>\n";
		echo "<tr><th align=right>PHP Version:</th><td></b>".$row[5]."</td></tr>\n";
		echo "<tr><th align=right>Short Desc.:</th><td></b>".$row[3]."</td></tr>\n";
		echo "</table>\n";
		$text = addlinks($row[4]);
		echo "<blockquote><blockquote><pre>".$text."</pre></blockquote></blockquote>\n";
		if(!isset($edit)) {
			if(strlen($row[8])) {
				echo "<b><i>[".$row[10]."] Updated by ".$row[11]."</i></b><br>\n";
				$text=addlinks($row[8]);
				echo "<b><pre>".$text."</pre></b>\n";
			}
		} else {
			echo "<b><tt>Developer Comments:</tt></b><br>\n";
			echo "<textarea cols=60 rows=15 name=\"comments\">".$row[8]."</textarea><br>\n";
			echo "CVS user id: <input type=text size=10 name=user>\n";
			echo "CVS password: <input type=password size=10 name=pw>\n";
			echo "<input type=submit value=\"Commit Changes\">\n";
			echo "</form>\n";
		}
	} else {
		if(isset($modify) && $status=="Delete!") {
			echo "<br><h1>Bug id #$id has been deleted</h1>\n";
		} else {
			echo "<br><h1>Sorry bug id #$id does not exist</h1>\n";
		}
	}
	mysql_freeresult($result);
} else {
	show_menu($status);
?>
Or use the form below to submit a new bug report.
<hr>
<form method=POST action="<? echo $PHP_SELF;?>">
<input type=hidden name=cmd value="Send bug report">

<P><STRONG>Please make sure you have read our list of <A
href="FAQ.php3">Frequently Asked Questions</A> to see whether your
problem may already be a known issue, and also check the bug database
for any outstanding bug reports that match your bug.</STRONG>

<table>
 <tr>
  <th align=right>Your email address:</th>
  <td>
   <input type=text size=20 name="email" value="<?if(isset($email)) { echo $email; }?>">
  </td>
 </tr><tr>
  <th align=right>PHP version:</th>
  <td>
   <select name="php_version">
	<option name="3.0b4">3.0b4
    <option name="3.0CVS">3.0 Latest CVS
	<option name="3.0b3">3.0b3
	<option name="3.0b2a">3.0b2a
	<option name="3.0b2">3.0b2
    <option name="3.0b1">3.0b1
    <option name="3.0a4">3.0a4
    <option name="3.0a3">3.0a3
    <option name="3.0a2">3.0a2
    <option name="3.0a1">3.0a1
    <option name="other">other
   </select>
  </td>
 </tr><tr>
  <th align=right>Type of bug:</th>
  <td>
	<?show_types("--Please Select--")?>
   </td>
  </tr><tr>
  <th align=right>Operating system:</th>
  <td>
   <input type=text size=20 name="php_os" value="<?echo isset($operating_system)?$operating_system:"";?>">
  </td>
 </tr><tr>
  <th align=right>Bug description:</th>
  <td>
   <input type=text size=40 maxlength=79 name="sdesc">
  </td>
</table>

<table>
<tr>
<td valign="top">
Please supply any information that may be helpful in fixing the bug:
<ul>
	<li>A short script that reproduces the problem
	<li>The list of modules you compiled PHP with (your configure line)
	<li>A copy of your php3.ini file (if it might be relevant)
	<li>Any other information unique or specific to your setup
</ul>
<center>
<input type=submit value="Send bug report">
</center>
</td>
<td>
<textarea cols=60 rows=15 name="ldesc"></textarea>
</td>
</tr>
</table>

<p>

</form>

<? } ?>

<? require("include/footer.inc"); ?>
