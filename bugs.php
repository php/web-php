<?php
require_once 'prepend.inc';

if (isset($save) && isset($user) && isset($pw)) {
  setcookie("MAGIC_COOKIE",base64_encode("$user:$pw"),time()+3600*24*12,'/');
}

/* See the end of the script for the table layout. */

$mail_bugs_to = "php-dev@lists.php.net";

if (is_primary_site() || strstr($MYSITE,"localhost")) {
	$dbhost = "localhost";
	$dbuser = "nobody";
	$dbpwd  = "";
} else {
	header("Location: http://www.php.net/bugs.php" . ($QUERY_STRING ? "?$QUERY_STRING" : ""));
	exit;
}

mysql_connect($dbhost,$dbuser,$dbpwd)
	or die("Unable to connect to SQL server.");
mysql_select_db("php3");

commonHeader("Bug Reporting");
echo "<font size=\"-1\">\n";

require 'format-text.inc';

function list_ids($current) {
	global $dbhost,$dbuser,$dbpwd;
	$result = mysql_query("SELECT DISTINCT dev_id FROM bugdb WHERE dev_id NOT LIKE '%@%' AND dev_id NOT LIKE '%.%' AND php_version LIKE '4%' ORDER BY dev_id");
	if ($current) echo "<option>$current\n";
	echo "<option>Any\n";
	while ($row = mysql_fetch_row($result)) {
		if ($row[0]!=$current) { echo "<option>".$row[0]."\n"; }
	}
}

function show_state_options($state, $show_all, $user_mode=0) {
	
	if (empty($state)) { $state = "Open"; }

	$state_types = 	array (
				"Open"        => 2, 
				"Closed"      => 2,
				"Critical"    => 1, 
				"Duplicate"   => 2,
				"Assigned"    => 1,
				"Analyzed"    => 1,
				"Suspended"   => 1,
				"Feedback"    => 3,
				"OldFeedback" => 3,
				"Bogus"       => 1        
 			);
	
	/* regular users can only pick states with type = 1 for unclosed bugs */
	if($state != "All" && $state_types[$state] == 1 && $user_mode == 2) {
		echo "<option>$state\n";
		if($state != "Bogus") echo "<option>Closed\n";
	} else {
		foreach($state_types as $type => $mode) {
			if($mode == $user_mode || $user_mode < 2) {
				echo "<option";
				if($type == $state) echo " SELECTED";
				echo ">$type\n";
			}
		}
		if($show_all) {
			$sel = ($state == "All") ? "SELECTED" : "";
			echo "<option $sel>All\n";		
		}
	}
}

function show_version_options($current) {
  $versions = array("4.0.6","4.0.5","4.0.4pl1","4.0.4","4.0CVS-".date("Y-m-d"));
  while (list(,$v) = each($versions)) {
    echo "<option", ($current == $v ? " selected" : ""), ">$v</option>\n";
  }
  echo "<option value=\"earlier\">Earlier? Upgrade first!</option>\n";
}

function show_menu($state)
{
	global $PHP_SELF, $bug_type, $by, $MAGIC_COOKIE, $search_for;

	if(!isset($search_for)) { $search_for=""; }
	if(!isset($bug_type)) { $bug_type="Any"; }
	echo "<form method=\"post\" action=\"$PHP_SELF\">\n";
	echo "<input type=\"hidden\" name=\"cmd\" value=\"display\" \>\n";
	echo "<table bgcolor=\"#ccccff\" cellspacing=\"0\"><tr><td><input type=\"submit\" value=\"Display\"></td><td><select name=\"status\">\n";
	show_state_options($state, 1);
	echo "</select></td><td align=\"right\">bugs of type: </td><td>";
	show_types($bug_type,1,"bug_type");

	$fields = array("id" => "Bug ID",
			"bug_type" => "Bug Type",
			"email" => "Email address",
			"sdesc" => "Short Description",
			"ldesc" => "Long Description",
			"php_version" => "PHP Version",
			"php_os" => "Platform",
			"status" => "Status",
			"comments" => "Comments",
			"ts1" => "Opened",
			"assign" => "Assigned To"
		);

	reset($fields);
	echo "</td><td align=\"right\">Last Comment By:</td><td> <select name=\"by\">\n";
	list_ids($by);
	echo "</select></td></tr>\n";
	echo "<tr><td colspan=\"3\" align=\"right\">Search for:</td>\n";
	echo "<td colspan=\"3\"><input type=\"text\" name=\"search_for\" value=\"".$search_for."\"> in the bug database</td></tr></form>\n";
	echo "<tr><td colspan=\"3\" align=\"right\"><form method=\"get\" action=\"$PHP_SELF\">\n";
	echo "<input type=\"submit\" value=\"Edit\"> bug number:</td><td colspan=\"2\"><input type=\"text\" name=\"id\"></td>\n";
	if (isset($MAGIC_COOKIE))
		echo "<input type=\"hidden\" name=\"edit\" value=\"1\" />\n";
	else
		echo "<input type=\"hidden\" name=\"edit\" value=\"2\" />\n";
	echo "</td><td align=\"center\"><a href=\"bugstats.php\">Statistics</a></td></tr></table>";
	echo "<i>Feature/Change requests must be explicitly selected to be shown</i></form>\n";
}

function show_types($first_item,$show_any,$var_name) {
	include 'bugtypes.inc';

	echo "<select name=\"$var_name\">\n";
	
	if($first_item == '--Please Select--') {
		echo "<option value\"$first_item\">$first_item</option>\n"; 
	}
	
	foreach ($items as $key => $value) {
		if ($show_any || $value != 'Any') {
			$sel = ($key == $first_item) ? ' selected' : '';
			echo "<option value=\"$key\"$sel>$value</option>\n";
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
	$new_text = ereg_replace("(http:[^ \n\t]*)","<a href=\"\\1\">\\1</a>",$text);
	$new_text = ereg_replace("(ftp:[^ \n\t]*)","<a href=\"\\1\">\\1</a>",$text);
	$new_text = ereg_replace("[.,]-=-\"","\"",$new_text);
	$new_text = ereg_replace("-=-\"","\"",$new_text);
	return $new_text;
}

if ($cmd == "show") {
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

	if ($php_version=='earlier') {
		echo "ERROR!  Please select a valid PHP version. If your PHP version is too old, please upgrade first and see if the problem has not already been fixed.";
		commonFooter();
		exit;
	}

	show_menu($status);
	echo "<hr>\n";

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
	$ascii_report.= "\n\n-- \nEdit Bug report at: http://bugs.php.net/?id=$cid&edit=1\n\n";
	$html_desc = ereg_replace("<", "&lt;", $ldesc);
	$html_desc = ereg_replace(">", "&gt;", $html_desc);
	$report .= $html_desc."\n";

	$html_report = ereg_replace("<", "&lt;", $report);
	$html_report = ereg_replace(">", "&gt;", $html_report);

	echo wrap($html_report);
	echo("</pre>\n");

	// Send doc bugs also to the doc list (jeroen)
	if ($ebug_type == "Documentation problem") {
		@mail('phpdoc@lists.php.net', "Bug #$cid: $sdesc", $ascii_report, "From: $email\nX-PHP-Bug: $cid"); 
	}

	if (mail($mail_bugs_to, "Bug #$cid: $sdesc", $ascii_report, "From: $email\nX-PHP-Bug: $cid")) {
		echo "<p><h2>Mail sent to $mail_bugs_to...</h2></p>\n";
		echo "<p>Thank you for your help!</p>";
		echo "<p><i>The password for this report is</i>: <b>".htmlentities($passwd)."</b><br>";
		echo "If the status of the bug report you submitted\n";
		echo "changes, you will be notified. You may return here and check on the status\n";
		echo "or update your report at any time. The URL for your bug report is: <a href=\"http://bugs.php.net/?id=$cid\">";
		echo "http://bugs.php.net/?id=$cid</a></p>\n";
	} else {
		echo "<p><h2>Mail not sent!</h2>\n";
		echo "Please send this page in a mail to " .
		     "<a href=\"mailto:$mail_bugs_to\">$mail_bugs_to</a> manually.</p>\n";
    }

} elseif ($cmd == "display") {
	show_menu($status);
	echo "<hr>\n";

	include("table_wrapper.inc");

	function external_processing($fieldname,$tablename,$data,$row) {

 		switch($fieldname) {
			case "id":
				print "<a href=\"bugs.php?id=$data\">$data</a>\n";
				break;
			case "Originator":
				print "<a href=\"mailto:$data\">$data</a>\n";
				break;
			case "Mod":
				print "<a href=\"bugs.php?id=${row['id']}&edit=1\"><img src=\"gifs/small_submit.gif\" border=\"0\" width=\"11\" height=\"11\"></a>\n";
				break;

			case "Status":
				if ($data == "Feedback") {
					echo "Feedback<br>(".$row[unchanged_days]." days)";
					break;
				}
				/* otherwise fall through */

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
			case "Critical":
				return "#ff0000";
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
			case "Feedback":
				return "#bbeeff";
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

	$tables[] = "bugdb";
	$fields[] = "id";
	$fields[] = "bug_type";
	$fields[] = "status as Status";
	$fields[] = "assign as Assigned";
	$fields[] = "php_version as Version";
	$fields[] = "php_os as Platform";
	$fields[] = "sdesc as Description";
	$fields[] = "id as Mod";
	$fields[] = "TO_DAYS(NOW())-TO_DAYS(ts2) as unchanged_days";
	$conversion_table["id"] = "ID#";
	$conversion_table["bug_type"] = "Bug Type";
	$pass_on = ereg_replace(" ","+","&amp;cmd=display&amp;status=$status&amp;bug_type=$bug_type");
	$default_header_color="cccccc";
	$centering["id"] = $centering["Mod"] = "center";
	$dont_link["Mod"]=1;
	$dont_display["unchanged_days"] = 1;

	if (!isset($order_by_clause)) {
		$order_by_clause = "id";
	}
	if($status=="All" && $bug_type=="Any") {
		$where_clause = "bug_type!='Feature/Change Request'";
		/* nothing */
	} elseif($status=="All" && $bug_type!="Any") {
		$where_clause = "bug_type='$bug_type'";
	} else {
		if($bug_type=="Any") {
			$where_clause = "bug_type!='Feature/Change Request'";
		} else {
			$where_clause = "bug_type='$bug_type'";
		}

		/* Treat assigned, analyzed and critical bugs as open */

 		if($status=="Open") {
			$where_clause .= " and (status='Open' or status='Assigned' or status='Analyzed' or status='Critical')";
		} elseif($status=="OldFeedback") {
			$where_clause .= " and status='Feedback' and TO_DAYS(NOW())-TO_DAYS(ts2)>60";
		} else {
			$where_clause .= " and status='$status'";
		}
	}
	if(strlen($search_for)) {
		$where_clause .= " and (email like '%$search_for%' or sdesc like '%$search_for%' or ldesc like '%$search_for%' or comments like '%$search_for%')";
	}
	// not supported by the HTML form yet : use the URL :)
	if(isset($bug_age) && ($bug_age!="All")) {
		$where_clause .= " and ts1 >= date_sub(now(), interval $bug_age day)";
	}
	if (strlen($where_clause)) {
		$where_clause .= " and";
	}
	$where_clause .= " php_version like '4%'";
	if(strlen($by) and $by!='Any') $where_clause .= " and dev_id = '$by' ";
	table_wrapper();
	echo "<br><center><a href=\"$PHP_SELF\">Submit a Bug Report</a></center>\n";

} elseif (!isset($cmd) && isset($id)) {

	function get_old_comments ($bug_id) {
	  	$divider = '---------------------------------------------------------------------------';
		$max_message_length = 10 * 1024;

		#fetch comments
		$result = mysql_query ("SELECT ts, email, comment from bugdb_comments where bug = $bug_id order by ts desc");
		while ($temp = mysql_fetch_row ($result))	# $result should always be valid, suppress error just in case.
			$comments[] = $temp;

		if ($comments[0])
			unset ($comments[0]);	# Ditch the most recent comment

	  	#fetch original bug description
		$query = "SELECT ts1, email, ldesc FROM bugdb WHERE id=$bug_id LIMIT 5";
		$result = mysql_query ($query);
		$comments[] = mysql_fetch_row ($result);

		$counter = 0;
		foreach ($comments as $value) {
			$output .= "[$value[0]] $value[1]\n\n$value[2]\n\n$divider\n\n";
			if (strlen ($output) > $max_message_length || ++$counter > 4 ) {
				$output .= "The remainder of the comments for this report are too long.\nTo view the rest of the comments, please\nview the bug report online.\n";
				break;
			}
		}

		if ($output) {
			return "\n\nPrevious Comments:\n$divider\n\n" . $output;
		}
	}

	show_menu($status);
	echo "<hr>\n";

	/* HANDLE NORMAL DEVELOPER UPDATES */
	if(isset($modify) && $modify=="Edit Bug") {
		$ok=0;
		if($user!="cvsread") {
			$psw=find_password($user);
			if(strlen($psw)>0) {
				if(crypt($pw,substr($psw,0,2))==$psw) {
					$ts=date("Y-m-d H:i:s");
					$result = mysql_query("select status, bug_type, ldesc, php_version, php_os from bugdb where id=$id");
					mysql_query("UPDATE bugdb set sdesc='$esdesc',status='$estatus', bug_type='$ebug_type', assign='$eassign', comments='$comments', ts2='$ts', dev_id='$user', php_version='$ephp_version' where id=$id");
					if (!empty($ncomment)) {
						mysql_query("INSERT INTO bugdb_comments (bug, email, ts, comment) VALUES ($id,'".$user."@php.net','$ts','$ncomment')");
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
			$row=mysql_fetch_row($result);
			$text = "ID: $id\nUpdated by: $user\n";
			$text.= "Reported By: $eemail\n";
			if($estatus!=$row[0]) $text .= "Old-Status: ".$row[0]."\n";
			$text.= "Status: $estatus\n";
			if($ebug_type != $row[1]) $text .= "Old-Bug Type: ".$row[1]."\n";
			$text.= "Bug Type: $ebug_type\n";
			$text.= "Operating system: $ephp_os\n";
			$text.= "PHP Version: $ephp_version\n";
			$text.= "Assigned To: $eassign\n";
			$text.= "Comments:\n\n$ncomment" . get_old_comments ($id);
			$text.= "\n\nATTENTION! Do NOT reply to this email!\n";
			$text.= "To reply, use the web interface found at http://bugs.php.net/?id=$id&edit=2\n";
			$text = stripslashes($text);
			$esdesc = stripslashes($esdesc);

      // mail phpdoc if old or new type is documentation (jeroen)
      if ($ebug_type == "Documentation problem" || $row[1] == "Documentation problem") {
        @mail('phpdoc@lists.php.net',"Bug #$id Updated: $esdesc", $text, "From: $user@php.net\nX-PHP-Bug: $id");
      }

			/* mail bug originator if status was changed or comment is not empty. */
			if($estatus != $row[0] || $ncomment != "") {
				@mail($eemail, "Bug #$id Updated: $esdesc", $text, "From: Bug Database <$mail_bugs_to>");
				@mail($mail_bugs_to, "Bug #$id Updated: $esdesc", $text, "From: $user@php.net\nX-PHP-Bug: $id");
			}
		}
		mysql_freeresult($result);
	}

	/* HANDLE USER UPDATES */
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
			if($estatus=="Closed" and $row[0]!="Closed") {
				mysql_query("UPDATE bugdb set status='$estatus', bug_type='$ebug_type', php_version='$ephp_version', php_os='$ephp_os', ts2='$ts', dev_id='$eemail' where id=$id");
			} else {
 				mysql_query("UPDATE bugdb set status='$estatus', bug_type='$ebug_type', php_version='$ephp_version', php_os='$ephp_os', ts2='$ts' where id=$id");
			}
			
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
			$text .= "Operating system: $ephp_os\n";
			$text .= "PHP Version: $ephp_version\n";
			$text .= "Description: $esdesc\n\n$ncomment";
			$text .= get_old_comments ($id);
			$text .= "\nFull Bug description available at: http://bugs.php.net/?id=$id\n";
			$text = stripslashes($text);
			$esdesc = stripslashes($esdesc);

			// mail phpdoc if old or new type is documentation
			if ($ebug_type == "Documentation problem" || $row[1] == "Documentation problem") {
      				@mail('phpdoc@lists.php.net',"Bug #$id Updated: $esdesc", $text, "From: $eemail\nX-PHP-Bug: $id");
			}

			@mail($eemail, "Bug #$id Updated: $esdesc", $text, "From: Bug Database <$mail_bugs_to>");
			@mail($mail_bugs_to, "Bug #$id Updated: $esdesc", $text, "From: $eemail\nX-PHP-Bug: $id");
			mysql_freeresult($result);
		}
	}

	/* DISPLAY BUG */
	$result = mysql_query("SELECT * from bugdb where id=$id");
	if($result and mysql_numrows($result)>0) {
		$row = mysql_fetch_row($result);
		echo "<br><h1>Bug id #$id</h1>\n";
		echo "<table>\n";
		if(!isset($edit)) {
			echo "<tr><th align=\"right\">Status:</th><td>".$row[7]."</td>";
			echo "<td><a href=\"$PHP_SELF?id=$id&edit=2\"><font size=\"-1\"><tt>User Modify</tt></font></a> &nbsp; ";
			echo "<a href=\"$PHP_SELF?id=$id&edit=1\"><font size=\"-1\"><tt>Dev Modify</tt></font></a></td>";
		} else {
			echo "<form method=\"post\" action=\"$PHP_SELF?id=$id\">\n";
			if($edit==1) {
				echo "<input type=\"hidden\" name=\"modify\" value=\"Edit Bug\">\n";
			} else {
 				echo "<tr><td align=\"right\" colspan=\"2\"><a href=\"$PHP_SELF?id=$id&edit=1\"><font size=\"-1\"><tt>Dev Modify</tt></font></a></td></tr>";
				echo "<input type=\"hidden\" name=\"modify\" value=\"User Edit Bug\">\n";
			}
			echo "<tr><th align=\"right\">Status:</th><td><select name=\"estatus\">\n";
			show_state_options($row[7], 0, ($edit==2)?2:0);
			echo "</select>\n";
			if($edit==1) {
				echo "Assign to: <input type=\"text\" name=\"eassign\" value=\"$row[12]\">\n";
				echo "<input type=\"submit\" value=\"Commit Changes\">\n";
			}
		}
		echo "</tr>\n";
		echo "<tr><th align=\"right\">From:</th><td><a href=\"mailto:".$row[2]."\">".$row[2]."</a>";
		echo "<input type=\"hidden\" name=\"eemail\" value=\"$row[2]\"></td></tr>\n";
		echo "<tr><th align=\"right\">Date:</th><td>".$row[9]."</td></tr>\n";

		if(!isset($edit)) {
			echo "<tr><th align=\"right\">Type:</th><td>".$row[1]."</td></tr>\n";
		} else {
			echo "<tr><th align=\"right\">Type:</th><td>\n";
			show_types($row[1],0,"ebug_type");
			echo "</td></tr>\n";
		}

		if(isset($edit) && $edit==2) {
			echo "<tr><th align=\"right\">OS:</th><td><input type=\"text\" size=\"20\" name=\"ephp_os\" value=\"".$row[6]."\"></td></tr>\n";
		} else {
			echo "<tr><th align=\"right\">OS:</th><td>".$row[6]."</td></tr>\n";
		}
		if(isset($edit) && ($edit==2 || $edit == 1)) {
			echo "<tr><th align=\"right\">PHP Version:</th><td><input type=\"text\" size=\"20\" name=\"ephp_version\" value=\"".$row[5]."\"></td></tr>\n";
		} else {
			echo "<tr><th align=\"right\">PHP Version:</th><td>".$row[5]."</td></tr>\n";
		}
		echo "<tr><th align=\"right\">Assigned To:</th><td>".$row[12]."</td></tr>\n";
		$sd = ereg_replace("<","&lt;",$row[3]);
		$sd = ereg_replace(">","&gt;",$sd);
		if(isset($edit) && $edit==1) {
			echo "<tr><th align=\"right\">Short Desc.:</th><td><input type=\"text\" size=\"40\" name=\"esdesc\" value=\"", htmlspecialchars($row[3]), "\"></td></tr>\n";
		} else {
			echo "<tr><th align=\"right\">Short Desc.:</th><td></b>$sd<input type=\"hidden\" name=\"esdesc\" value=\"", htmlspecialchars($row[3]), "\"></td></tr>\n";
		}
		echo "</table>\n";

		/* INSERT NEW COMMENT HERE */
		if (isset($edit)) {
			echo "<b>New Comment:</b><br>\n";
			echo "<textarea cols=\"60\" rows=\"15\" name=\"ncomment\" wrap=\"physical\"></textarea><br>\n";
			if(isset($MAGIC_COOKIE)) list($user, $pw) = explode(":", base64_decode($MAGIC_COOKIE));
			if ($edit == 1) {
				echo "CVS user id: <input type=\"text\" size=\"10\" name=\"user\" value=\"$user\">\n";
			}
			echo "Password: <input type=\"password\" size=\"10\" name=\"pw\" value=\"$pw\">\n";
			echo "<input type=\"submit\" value=\"Commit Changes\">";
			echo ($edit == 2) ? " [<a href=\"/bug-pwd-finder.php\">Lost your password?</a>]<br>\n" : "<br>\n";
			if(!$user || !$pw) {
				echo "Remember my login/password: <input type=\"checkbox\" name=\"save\">\n";
			}
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
		$query = "SELECT *,UNIX_TIMESTAMP(ts) AS my_when FROM bugdb_comments WHERE bug=$id ORDER BY ts";
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
	if ($result) {
		mysql_freeresult($result);
	}
} else {
	show_menu($status);
?>
Or use the form below to submit a new bug report.
<hr>
<?php include 'bugform.inc'; ?>
<?php } ?>
</font>
<?php
commonFooter();

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
