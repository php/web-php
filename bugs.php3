<?

/* See the end of the script for the table layout. */

require("shared.inc");
if(!strstr($MYSITE,"ca.php.net")) {
	Header("Location: http://ca.php.net/bugs.php3");
}
$DISABLE_KICKOUTS=1;
commonHeader("Bug Reporting");
echo "<font size=-1>\n";
$destination = "php-dev@php.iquest.net";
#$destination = "rasmus@lerdorf.on.ca";

function indent($string, $prefix) {
    $string = ereg_replace(13, "", $string); /* get rid of Ctrl-M */
    return $prefix . ereg_replace("\n", "\n$prefix", $string) . "\n";
}

function show_state_options($state, $show_all) {
	if ($state) { echo "<option>$state\n"; }
	if($state!="Open") { echo "<option>Open\n"; }
	if($state!="Closed") { echo "<option>Closed\n"; }
	if($state!="Assigned") { echo "<option>Assigned\n"; }
	if($state!="Analyzed") { echo "<option>Analyzed\n"; }
	if($state!="Suspended") { echo "<option>Suspended\n"; }
	if($state!="Duplicate") { echo "<option>Duplicate\n"; }
	if($state!="All" && $show_all) { echo "<option>All\n"; }
}

function show_menu($state) {
	global $PHP_SELF, $bug_type;

	if(!isset($bug_type)) { $bug_type="Any"; }
	echo "<form method=POST action=\"$PHP_SELF\">\n";
	echo "<input type=hidden name=cmd value=\"Display Bugs\">\n";
	echo "<input type=submit value=\"Display\"> <select name=\"status\">\n";
	show_state_options($state, 1);
	echo "</select> bugs of type ";
	show_types($bug_type,1,"bug_type");

	$fields = array( "id" => "Bug ID",
					"bug_type" => "Bug Type",
					"email" => "Submitter's Email address",
					"sdesc" => "Short Description",
					"ldesc" => "Long Description",
					"php_version" => "PHP Version",
					"php_os" => "Platform",
					"status" => "Status",
					"comments" => "Comments",
					"ts1" => "TimeStamp 1",
					"ts2" => "Timestamp 2",
					"assign" => "Assigned");

	reset($fields);
	echo "Order by:  <select name='order_by_clause'>\n";
	while(list($field,$name) = each($fields)) {
		echo "<option value='$field'>$name\n";
	}
	echo "</select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"/bugstats.php3\">Statistics</a><br>\n";
	echo "<i>Feature/Change requests must be explicitly selected to be shown</i>\n";
	echo "</form>\n";
}


function show_types($first_item,$show_any,$var_name) {
	$items = array("Any",
				   "Documentation problem",
				   "Installation problem",
				   "Compile Failure",
				   "Compile Warning",
				   "Parser error",
				   "Reproduceable crash",
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
				   "DBM related",
				   "Misbehaving function",
				   "FrontPage related",
				   "Feature/Change Request",
				   "Other");

	echo "<select name=\"$var_name\">\n<option>$first_item\n";
	for($i=0;$i<count($items);$i++) {
		if($first_item!=$items[$i]) {
			if($show_any || $items[$i]!="Any") {
				echo "<option>$items[$i]\n";
			}
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

	if($ebug_type=="--Please Select--") {
		echo "Please select an appropriate bug type<P>\n";
		include("include/footer.inc");
		exit;
	}

	show_menu($status);
	echo "<hr>\n";
	
    mysql_pconnect("localhost","","");
    mysql_select_db("php3");
	$ts=date("Y-m-d H:i:s");
    $ret = mysql_query("INSERT into bugdb values (0,'$ebug_type','$email','$sdesc','$ldesc','$php_version','$php_os','Open','','$ts','$ts','','')");
	$cid = mysql_insert_id();

    $report = "";
    echo("<pre>\n");

    $ldesc = stripslashes($ldesc);
    $sdesc = stripslashes($sdesc);
    $report .= "From:             $email\n";
    $report .= "Operating system: $php_os\n";
    $report .= "PHP version:      $php_version\n";
    $report .= "PHP Bug Type:     $ebug_type\n";
    $report .= "Bug description:\n";
	$ascii_report = indent($report.$ldesc,"");
    $html_desc = ereg_replace("<", "&lt;", $ldesc);
    $html_desc = ereg_replace(">", "&gt;", $html_desc);
    $report .= indent($html_desc, "    ");

    $html_report = ereg_replace("<", "&lt;", $report);
    $html_report = ereg_replace(">", "&gt;", $html_report);

    echo $html_report;

    echo("</pre>\n");

    if (Mail($destination, "Bug #$cid: $sdesc", $ascii_report, "From: $email")) {
        echo "<p><h2>Mail sent to $destination...</h2>\n";
		echo "Thank you for your help!<P>If the status of the bug report you submitted\n";
		echo "changes, you will be notified.  You may return here and check on the status\n";
		echo "at any time.  The URL for your bug report is: <a href=\"http://ca.php.net/bugs.php3?id=$cid\">";
		echo "http://ca.php.net/bugs.php3?id=$cid</a>\n";
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
			case "Modify":
				print "<a href=\"bugs.php3?id=${row[id]}&edit=1\"><img src=\"gifs/circular_arrow.gif\" border=\"0\"></a>\n";
				break;
			default:
				$data = ereg_replace("<","&lt;",$data);
				$data = ereg_replace(">","&gt;",$data);
				print $data;
				break;
		}
	}
	function row_coloring($row) {
		if ($row["bug_type"]=="Feature/Change Request") {
			return "#aaaaaa";
		}
		switch($row["Status"]) {
			case "Open":
				return "#ffbbaa";
				break;
			case "Closed":
				return "#aaffbb";
				break;
			case "Suspended":
				return "#ffccbb";
				break;
			case "Assigned":
				return "#bbaaff";
				break;
			case "Analyzed":
				return "#99bbaa";
				break;
			case "Duplicate":
				return "#bbbbbb";
				break;
			default:
				return "#aaaaaa";
				break;
		}
	}
	$external_processing_function="external_processing";
	$row_coloring_function="row_coloring";
	
    mysql_pconnect("localhost","","");
    mysql_select_db("php3");

	$tables[] = "bugdb";
	$fields[] = "id";
	$fields[] = "bug_type";
	$fields[] = "status as Status";
	$fields[] = "assign as Assigned";
	$fields[] = "php_version as Version";
#	$fields[] = "php_os as OS";
	$fields[] = "email as Originator";
	$fields[] = "sdesc as Description";
	$fields[] = "id as Modify";
	$conversion_table["id"] = "ID#";
	$conversion_table["bug_type"] = "Bug Type";
	$pass_on = ereg_replace(" ","+","&cmd=Display+Bugs&status=$status&bug_type=$bug_type");
	$default_header_color="aaaaaa";
	$centering["id"] = $centering["Modify"] = "center";
	$dont_link["Modify"]=1;
	
	if (!isset($order_by_clause)) {
		$order_by_clause = "id";
	}
	if($status=="All" && $bug_type=="Any") {
		$where_clause = "bug_type!='Feature/Change Request'";
		/* nothing */
	} elseif($status=="All" && $bug_type!="Any") {
		$where_clause = "bug_type='$bug_type'";
	} elseif($status!="All" && $bug_type=="Any") {
		/* Treat assigned and analyzed bugs as open */
		if($status=="Open") {
			$where_clause = "bug_type!='Feature/Change Request' and (status='Open' or status='Assigned' or status='Analyzed')";
		} else {
			$where_clause = "status='$status' and bug_type!='Feature/Change Request'";
		}
	} else {
		/* Treat assigned and analyzed bugs as open */
		if($status=="Open") {
			$where_clause = "(status='Open' or status='Assigned' or status='Analyzed') and bug_type='$bug_type'";
		} else {
			$where_clause = "status='$status' and bug_type='$bug_type'";
		}
	}
	table_wrapper();
	echo "<br><center><a href=\"$PHP_SELF\">Submit a Bug Report</a></center>\n";
} else if(!isset($cmd) && isset($id)) {
	show_menu($status);
	echo "<hr>\n";

    mysql_pconnect("localhost","","");
    mysql_select_db("php3");
	if(isset($modify) && $modify=="Edit Bug") {
		$ok=0;
		if($user!="cvsread") {
			$psw=find_password($user);
			if(strlen($psw)>0) {
				if(crypt($pw,substr($psw,0,2))==$psw) {
					$ts=date("Y-m-d H:i:s");
					if($estatus=="Delete!") {
						mysql_query("DELETE from bugdb where id=$id");
					} else {
						mysql_query("UPDATE bugdb set status='$estatus', bug_type='$ebug_type', assign='$eassign', comments='$comments', ts2='$ts', dev_id='$user' where id=$id");
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
			if($estatus=="Delete!") {
				$comments = stripslashes($comments);
				$text = "Bug #$id has been deleted from the database by $user\nComments:\n\n$comments\n";
			} else {
				$text = "ID: $id\nUpdated by: $user\nReported By: $eemail\nStatus: $estatus\nBug Type: $ebug_type\nAssigned To: $eassign\nComments:\n\n$comments\n";
				$text .= "\nFull Bug description available at: http://ca.php.net/bugs.php3?id=$id\n";
				$text = stripslashes($text);
			}
			$esdesc = stripslashes($esdesc);
    		Mail($eemail, "Bug #$id Updated: $esdesc", $text, "From: Bug Database <php-dev@php.iquest.net>");
    		Mail("php-dev@php.iquest.net", "Bug #$id Updated: $esdesc", $text, "From: Bug Database <php-dev@php.iquest.net>");
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
			show_state_options($row[7], 0);
			echo "</select>\n";
			echo "Assign to: <input type=text name=eassign value=\"$row[12]\">\n";
		}
		echo "</tr>\n";
		echo "<tr><th align=right>From:</th><td><a href=\"mailto:".$row[2]."\">".$row[2]."</a>";
		echo "<input type=hidden name=eemail value=\"$row[2]\"></td></tr>\n";
		echo "<tr><th align=right>Date:</th><td>".$row[9]."</td></tr>\n";
		if(!isset($edit)) {
			echo "<tr><th align=right>Type:</th><td>".$row[1]."</td></tr>\n";
		} else {
			echo "<tr><th align=right>Type:</th><td>\n";
			show_types($row[1],0,"ebug_type");
			echo "</td></tr>\n";
		}
		echo "<tr><th align=right>OS:</th><td>".$row[6]."</td></tr>\n";
		echo "<tr><th align=right>PHP Version:</th><td></b>".$row[5]."</td></tr>\n";
		echo "<tr><th align=right>Assigned To:</th><td></b>".$row[12]."</td></tr>\n";
		$sd = ereg_replace("<","&lt;",$row[3]);
		$sd = ereg_replace(">","&gt;",$sd);
		echo "<tr><th align=right>Short Desc.:</th><td></b>$sd<input type=hidden name=esdesc value=\"$row[3]\"></td></tr>\n";
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
		if(isset($modify) && $estatus=="Delete!") {
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

<P>If you are reporting more than one bug, or requesting more than
one feature, or both, please open seperate reports for each instead
of grouping them all in one report.

<table>
 <tr>
  <th align=right>Your email address:</th>
  <td colspan="2">
   <input type=text size=20 name="email" value="<?if(isset($email)) { echo $email; }?>">
  </td>
 </tr><tr>
  <th align=right>PHP version:</th>
  <td>
   <select name="php_version">
    <option name="3.0">3.0 Final Release
    <option name="3.0CVS">3.0 Latest CVS
    <option name="3.0RC5">3.0 Release Candidate 5
    <option name="other">other
   </select>
  </td>
  <td>
   <font size="-2">
   Please don't report bugs in versions earlier than the Release Candidate, but instead,
   upgrade first, and check if the bug still exists.
   </font>
  </td>
 </tr><tr>
  <th align=right>Type of bug:</th>
  <td colspan="2">
	<?show_types("--Please Select--",0,"ebug_type")?>
   </td>
  </tr><tr>
  <th align=right>Operating system:</th>
  <td colspan="2">
   <input type=text size=20 name="php_os" value="<?echo isset($operating_system)?$operating_system:"";?>">
  </td>
 </tr><tr>
  <th align=right>Bug description:</th>
  <td colspan="2">
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
</font>
<?
commonFooter();
?>
<?
/*
# MySQL dump 4.0
#
# Host: localhost    Database: php3
#--------------------------------------------------------
DROP table bugdb;

CREATE TABLE bugdb (
  id int(8) NOT NULL AUTO_INCREMENT,
  bug_type char(32),
  email varchar(40) NOT NULL,
  sdesc varchar(80), 
  ldesc text,
  php_version char(16),
  php_os varchar(32),
  status varchar(16),
  comments text,
  ts1 datetime,
  ts2 datetime,
  dev_id varchar(16),
  assign varchar(16),
  PRIMARY KEY (id)
);
*/
?>
