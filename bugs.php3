<?

/* See the end of the script for the table layout. */

require("shared.inc");
if (strstr($MYSITE,"bugs.php.net")) {
	$dbhost="localhost";
	$dbuser="nobody";
	$dbpwd="";
} else if (strstr($MYSITE,"il.php.net")) {
	$dbhost="bugs.php.net";
	$dbuser="bourbon";
	$dbpwd="";
} else {
	Header("Location: http://bugs.php.net");
	exit;
}

$DISABLE_KICKOUTS=1;
commonHeader("Bug Reporting");
echo "<font size=-1>\n";
$destination = "php-dev@lists.php.net";
#$destination = "rasmus@lerdorf.on.ca";

function indent($string, $prefix) {
    $string = ereg_replace(13, "", $string); /* get rid of Ctrl-M */
    return $prefix . ereg_replace("\n", "\n$prefix", $string) . "\n";
}

function wrap($text,$margin=72) {
	$i=0;
	$last_space=0;
	$printfrom=0;
	$len=strlen($text);
	$line_len=0;
	while($i<$len) {
		if($text[$i]==chr(32) || $text[$i]==chr(7)) {
			$last_space=$i;
			$line_len++;
		} else
		if($text[$i]==chr(10) || $text[$i]==chr(13)) {
			$line_len=0;
		} else {
			$line_len++;
		}
		if($line_len>$margin) {
			if($last_space==0 || $last_space<$printfrom) {
				echo substr($text,$printfrom,$margin);
				echo "\n";
				$printfrom+=$margin+1;	
			} else {
				echo substr($text,$printfrom,$last_space-$printfrom);
				echo "\n";
				$printfrom=$last_space+1;	
			}
			$line_len=0;
		}
		$i++;
	}
	echo substr($text,$printfrom);
}

function show_state_options($state, $show_all, $user_mode=0) {
	if ($state) { echo "<option>$state\n"; }
	if($state!="Open") { echo "<option>Open\n"; }
	if($state!="Closed") { echo "<option>Closed\n"; }
	if($state!="Assigned" && $user_mode!=2) { echo "<option>Assigned\n"; }
	if($state!="Analyzed" && $user_mode!=2) { echo "<option>Analyzed\n"; }
	if($state!="Suspended" && $user_mode!=2) { echo "<option>Suspended\n"; }
	if($state!="Duplicate") { echo "<option>Duplicate\n"; }
	if($state!="All" && $show_all) { echo "<option>All\n"; }
}

function show_menu($state)
{
	global $PHP_SELF, $bug_type;

	if(!isset($bug_type)) { $bug_type="Any"; }
	echo "<form method=POST action=\"$PHP_SELF\">\n";
	echo "<input type=hidden name=cmd value=\"Display Bugs\">\n";
	echo "<table bgcolor=#aabbcc cellspacing=0><tr><td><input type=submit value=\"Display\"></td><td><select name=\"status\">\n";
	show_state_options($state, 1);
	echo "</select></td><td align=right>bugs of type: </td><td>";
	show_types($bug_type,1,"bug_type");

	$fields = array( "id" => "Bug ID",
					"bug_type" => "Bug Type",
					"email" => "Email address",
					"sdesc" => "Short Description",
					"ldesc" => "Long Description",
					"php_version" => "PHP Version",
					"php_os" => "Platform",
					"status" => "Status",
					"comments" => "Comments",
					"ts1" => "Opened",
					"assign" => "Assigned To");

	reset($fields);
	echo "</td><td align=right>Order by:</td><td> <select name='order_by_clause'>\n";
	while(list($field,$name) = each($fields)) {
		echo "<option value='$field'>$name\n";
	}
	echo "</select></td><td> <a href=\"/bugstats.php3\">Statistics</a></td></tr>\n";
	echo "<tr><td colspan=3 align=right>Where the bug description contains:</td>\n";
	echo "<td colspan=4><input type=text name=\"search_for\"></td></tr>\n";
	echo "</table>\n";
	echo "<i>Feature/Change requests must be explicitly selected to be shown</i>\n";
	echo "</form>\n";
	echo "<form method=GET action=\"$PHP_SELF\">\n";
	echo "<input type='submit' value='Edit'> bug number <input type='text' name='id'>\n";
	echo "<input type='hidden' name='edit' value='1'>\n";
	echo "</form><br>\n";
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
				   "Dynamic loading related",
				   "MySQL related",
				   "mSQL related",
				   "MSSQL related",
				   "PostgreSQL related",
				   "ODBC related",
				   "Oracle related",
				   "Sybase-ct (ctlib) related",
				   "Sybase (dblib) related",
				   "Solid related",
				   "Adabas-D related",
				   "dBase related",
				   "DBM/DBA related",
				   "mcrypt related",
				   "mhash related",
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
	$fp=@fopen("/repository/CVSROOT/passwd","r");
	if (!$fp) {
		return ("");
	}
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
		echo "ERROR!  Please provide a valid email address<P>\n";
		commonFooter();
		exit;
	}

	if($ebug_type=="--Please Select--") {
		echo "ERROR!  Please select an appropriate bug type<P>\n";
		commonFooter();
		exit;
	}

	show_menu($status);
	echo "<hr>\n";
	
    mysql_pconnect($dbhost,$dbuser,$dbpwd) or die("Unable to connect to SQL server.");
    mysql_select_db("php3");
	$ts=date("Y-m-d H:i:s");
    $ret = mysql_query("INSERT into bugdb values (0,'$ebug_type','$email','$sdesc','$ldesc','$php_version','$php_os','Open','','$ts','$ts','','','$passwd')");
	$cid = mysql_insert_id();

    $report = "";
    echo("<pre>\n");

    $ldesc = stripslashes($ldesc);
    $sdesc = stripslashes($sdesc);
    $report .= "From:             $email\n";
    $report .= "Operating system: $php_os\n";
    $report .= "PHP version:      $php_version\n";
    $report .= "PHP Bug Type:     $ebug_type\n";
    $report .= "Bug description:  ";
    $html_sdesc = ereg_replace("<", "&lt;", $sdesc);
    $html_sdesc = ereg_replace(">", "&gt;", $html_sdesc);
    $report .= $html_sdesc."\n\n";
	$ascii_report = indent($report.$ldesc,"");
    $html_desc = ereg_replace("<", "&lt;", $ldesc);
    $html_desc = ereg_replace(">", "&gt;", $html_desc);
    $report .= $html_desc."\n";

    $html_report = ereg_replace("<", "&lt;", $report);
    $html_report = ereg_replace(">", "&gt;", $html_report);

    echo wrap($html_report);
    echo("</pre>\n");

    if (Mail($destination, "Bug #$cid: $sdesc", $ascii_report, "From: $email")) {
        echo "<p><h2>Mail sent to $destination...</h2>\n";
		echo "Thank you for your help!<P>";
		echo "<i>The password for this report is</i>: <b>".htmlentities($passwd)."</b><br>";
		echo "If the status of the bug report you submitted\n";
		echo "changes, you will be notified.  You may return here and check on the status\n";
		echo "or update your report at any time.  The URL for your bug report is: <a href=\"http://bugs.php.net/?id=$cid\">";
		echo "http://bugs.php.net/?id=$cid</a>\n";
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
			case "Mod":
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
	
    mysql_pconnect($dbhost,$dbuser,$dbpwd) or die("Unable to connect to SQL server");
    mysql_select_db("php3");

	$tables[] = "bugdb";
	$fields[] = "id";
	$fields[] = "bug_type";
	$fields[] = "status as Status";
	$fields[] = "assign as Assigned";
	$fields[] = "php_version as Version";
#	$fields[] = "php_os as OS";
	$fields[] = "php_os as Platform";
	$fields[] = "sdesc as Description";
	$fields[] = "id as Mod";
	$conversion_table["id"] = "ID#";
	$conversion_table["bug_type"] = "Bug Type";
	$pass_on = ereg_replace(" ","+","&cmd=Display+Bugs&status=$status&bug_type=$bug_type");
	$default_header_color="aaaaaa";
	$centering["id"] = $centering["Mod"] = "center";
	$dont_link["Mod"]=1;
	
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
	if(strlen($search_for)) {
		$where_clause .= " and (sdesc like '%$search_for%' or ldesc like '%$search_for%' or comments like '%$search_for%')";
	}
	table_wrapper();
	echo "<br><center><a href=\"$PHP_SELF\">Submit a Bug Report</a></center>\n";
} else if(!isset($cmd) && isset($id)) {
	show_menu($status);
	echo "<hr>\n";

	mysql_pconnect($dbhost,$dbuser,$dbpwd)
		or die("Unable to connect to SQL server.");
	mysql_select_db("php3");

	/* HANDLE NORMAL DEVELOPER UPDATES */
	if(isset($modify) && $modify=="Edit Bug") {
		$ok=0;
		if($user!="cvsread") {
			$psw=find_password($user);
			if(strlen($psw)>0) {
				if(crypt($pw,substr($psw,0,2))==$psw) {
					$ts=date("Y-m-d H:i:s");
					mysql_query("UPDATE bugdb set status='$estatus', bug_type='$ebug_type', assign='$eassign', comments='$comments', ts2='$ts', dev_id='$user' where id=$id");
					if (!empty($ncomment)) {
						mysql_query("INSERT INTO bugdb_comments (bug, email, ts, comment) VALUES ($id,'".$user."@cvs.php.net','$ts','$ncomment')");
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
			$text = "ID: $id\nUpdated by: $user\nReported By: $eemail\nStatus: $estatus\nBug Type: $ebug_type\nAssigned To: $eassign\nComments:\n\n$ncomment\n";
			$text .= "\nFull Bug description available at: http://bugs.php.net/?id=$id\n";
			$text = stripslashes($text);
			$esdesc = stripslashes($esdesc);

			/* mail bug originator */
			if ($ephp_version[0] == '4') {
				$prefix = 'PHP 4.0';
			}
    			Mail("$eemail, $destination", "$prefix Bug #$id Updated: $esdesc", $text, "From: Bug Database <$destination>");
		}
	}

	/* HANDLE USER UDPATES */
	if(isset($modify) && $modify=="User Edit Bug") {
		$ts=date("Y-m-d H:i:s");
		$result = mysql_query("select status, bug_type, ldesc, php_version, php_os from bugdb where id=$id and passwd='$pw'");
		$ok=mysql_numrows($result);
		if(!$ok) {
			echo "<b>Sorry, incorrect password.  The entry has not been changed.</b><br>\n";
    			Mail("rasmus@lerdorf.on.ca", "bugdb auth failure for bug #$id - ($pw)", "", "From: bugdb");
		} else {
			$row=mysql_fetch_row($result);

			/* update bug record */
			if($estatus=="Closed" and $row[0]!="Closed")
				mysql_query("UPDATE bugdb set status='$estatus', bug_type='$ebug_type', php_version='$ephp_version', php_os='$ephp_os', ts2='$ts', dev_id='$eemail' where id=$id");
			else
				mysql_query("UPDATE bugdb set status='$estatus', bug_type='$ebug_type', php_version='$ephp_version', php_os='$ephp_os', ts2='$ts' where id=$id");

			/* add comment */
			if (!empty($ncomment)) {
				mysql_query("INSERT INTO bugdb_comments (bug, email, ts, comment) VALUES ($id,'$eemail','$ts','$ncomment')");
			}

			echo "<b>Database updated!</b><br>\n";

			$text = "ID: $id\nUser Update by: $eemail\n";
			if($estatus!=$row[0]) $text .= "Old-Status: ".$row[0]."\n";
			$text .= "Status: $estatus\n";
			if($ebug_type != $row[1]) $text .= "Old-Bug Type: ".$row[1]."\n";
			$text .= "Bug Type: $ebug_type\n";
			$text .= "Description: $esdesc\n\n$ncomment\n";
			$text .= "\nFull Bug description available at: http://bugs.php.net/?id=$id\n";
			$text = stripslashes($text);
			$esdesc = stripslashes($esdesc);
			/* mail bug originator */
			if ($ephp_version[0] == '4') {
				$prefix = 'PHP 4.0';
			}
    			Mail("$eemail, $destination", "$prefix Bug #$id Updated: $esdesc", $text, "From: Bug Database <$destination>");
			mysql_freeresult($result);
		}	
	}

	/* DISPLAY BUG */
	$result = mysql_query("SELECT * from bugdb where id=$id");
	if(mysql_numrows($result)>0) {
		$row = mysql_fetch_row($result);	
		echo "<br><h1>Bug id #$id</h1>\n";
		echo "<table>\n";
		if(!isset($edit)) {
			echo "<tr><th align=right>Status:</th><td>".$row[7]."</td>";
			echo "<td><a href=\"$PHP_SELF?id=$id&edit=2\"><font size=-1><tt>Modify</tt></font></a></td>";
		} else {
			echo "<form method=POST action=\"http://bugs.php.net$PHP_SELF?id=$id\">\n";
			if($edit==1)
				echo "<input type=hidden name=modify value=\"Edit Bug\">\n";
			else
				echo "<input type=hidden name=modify value=\"User Edit Bug\">\n";
			echo "<tr><th align=right>Status:</th><td><select name=\"estatus\">\n";
			show_state_options($row[7], 0, ($edit==2)?2:0);
			echo "</select>\n";
			if($edit==1)
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
		if($edit==2) {
			echo "<tr><th align=right>OS:</th><td><input type=text size=20 name=ephp_os value=\"".$row[6]."\"></td></tr>\n";
		} else {
			echo "<tr><th align=right>OS:</th><td>".$row[6]."</td></tr>\n";
		}
		if($edit==2) {
			echo "<tr><th align=right>PHP Version:</th><td><input type=text size=20 name=ephp_version value=\"".$row[5]."\"></td></tr>\n";
		} else {
			echo "<input type=hidden name=ephp_version value=\"".$row[5]."\">\n";
			echo "<tr><th align=right>PHP Version:</th><td>".$row[5]."</td></tr>\n";
		}
		echo "<tr><th align=right>Assigned To:</th><td>".$row[12]."</td></tr>\n";
		$sd = ereg_replace("<","&lt;",$row[3]);
		$sd = ereg_replace(">","&gt;",$sd);
		echo "<tr><th align=right>Short Desc.:</th><td></b>$sd<input type=hidden name=esdesc value=\"", htmlspecialchars($row[3]), "\"></td></tr>\n";
		echo "</table>\n";

		/* INSERT NEW COMMENT HERE */
		if (isset($edit)) {
			echo "<b>New Comment:</b><br>\n";
			echo "<textarea cols=60 rows=15 name=\"ncomment\"></textarea><br>\n";
			if ($edit == 1) {
				echo "CVS user id: <input type=text size=10 name=user>\n";
			}
			echo "Password: <input type=password size=10 name=pw>\n";
			echo "<input type=submit value=\"Commit Changes\">\n";
			echo "</form>\n";
		}

		echo "<hr>\n";

		/* ORIGINAL REPORT */
		echo "<b><i>[".$row[9]."] ".$row[2]."</i></b><br>\n";
		$text = addlinks($row[4]);
		echo "<blockquote><blockquote><pre>";
		echo wrap($text,90);
		echo "</pre></blockquote></blockquote>\n";

		/* OLD-STYLE DEVELOPER COMMENT */
		if(strlen($row[8])) {
			echo "<b><i>[".$row[10]."] ".$row[11]."</i></b><br>\n";
			$text=addlinks($row[8]);
			echo "<blockquote><blockquote><pre>";
			wrap($text,90);
			echo "</pre></blockquote></blockquote>\n";
		}

		/* NEW-STYLE COMMENTS */
		$query = "SELECT *,UNIX_TIMESTAMP(ts) AS when FROM bugdb_comments WHERE bug=$id ORDER BY ts";
		if ($comresult = mysql_query($query)) {
			while ($com = mysql_fetch_array($comresult)) {
				echo "<b><i>[".$com['ts']."] ".$com['email']."</i></b><br>\n";
				$text = addlinks($com['comment']);
				echo "<blockquote><blockquote><pre>";
				wrap($text,90);
				echo "</pre></blockquote></blockquote>\n";
			}
			mysql_freeresult($comresult);
		}

	} else {
		echo "<br><h1>Sorry bug id #$id does not exist</h1>\n";
	}
	mysql_freeresult($result);
} else {
	show_menu($status);
?>
Or use the form below to submit a new bug report.
<hr>
<form method=POST action="<? echo $PHP_SELF;?>">
<input type=hidden name=cmd value="Send bug report">

<p><strong>Please read the <a href="bugs-dos-and-donts.php3">Dos & Don'ts</a> before submitting a bug report!</strong</p>

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
    <option name="3.0.12" selected>3.0.12
    <option name="3.0CVS-<? print date("d/m/Y"); ?>">3.0 Latest CVS (<? print date("d/m/Y"); ?>)
    <option name="3.0.11">3.0.11
    <option name="3.0.10">3.0.10
    <option name="3.0.9">3.0.9
    <option name="earlier">Earlier?  Upgrade first!
   </select>
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
  </td></tr>
 </tr><tr>
  <th align=right>Password:</th>
  <td>
   <input type=text size=20 maxlength=20 name="passwd"></td>
    <td><font size="-2">
You may enter any password here.  This password allows you to come back and modify your
submitted bug report at a later date.
	</font>	
  </td></tr>
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
<textarea cols=60 rows=15 name="ldesc" wrap=virtual></textarea>
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
  comments text,# developer comment (deprecated)
  ts1 datetime, # bug created date
  ts2 datetime, # developer comment date (deprecated)
  dev_id varchar(16),# developer who commented (deprecated)
  assign varchar(16),
  passwd varchar(20),# user password
  PRIMARY KEY (id)
);

CREATE TABLE bugdb_comments (
  id int(8) NOT NULL AUTO_INCREMENT,
  bug int(8) NOT NULL,
  email varchar(40) NOT NULL,
  ts datetime NOT NULL,
  comment text,
  PRIMARY KEY (id)
);
*/
?>
