<?php /* vim: set noet ts=4 sw=4: : */
require_once 'prepend.inc';

require 'cvs-auth.inc';

if (isset($save) && isset($pw)) { # non-developers don't have $user set
  setcookie("MAGIC_COOKIE",base64_encode("$user:$pw"),time()+3600*24*12,'/');
}
if (isset($MAGIC_COOKIE) && !isset($user) && !isset($pw)) {
  list($user,$pw) = explode(":", base64_decode($MAGIC_COOKIE));
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

?>
<table bgcolor="#ccccff" border="0" cellspacing="1">
 <form method="POST" action="<?php echo $PHP_SELF?>">
 <input type="hidden" name="cmd" value="display" />
  <tr>
   <td><input type="submit" value="Display" /></td>
   <td><select name="status"><?php show_state_options($status);?></select></td>
   <td align="right">bugs of type: </td>
   <td><select name="bug_type"><?php show_types($bug_type,1);?></select></td>
   <td align="right">reported since:</td>
   <td><select name="bug_age"><?php show_byage_options($bug_age);?></select></td>
  </tr>
  <tr>
   <td colspan=2 align=right>OS (substr search):</td>
   <td colspan="4"><input type="text" name="php_os" value="<?echo htmlspecialchars($php_os);?>">
  </tr>
  <tr>
   <td align="right">with text:</td>
   <td colspan="3"><input type="text" name="search_for" value="<?echo htmlspecialchars($search_for);?>"> in the report or email address</td>
   <td colspan="2">max. <select name="limit"><?php show_limit_options($limit);?></select> entries / page.</td>
  </tr>
 </form>
 <tr>
  <td bgcolor="#000000" colspan="6"><?echo spacer(1,1);?></td>
 </tr>
 <form method="GET" action="<?php echo $PHP_SELF;?>">
  <tr>
   <td align="right"><input type="submit" value="Edit" /></td>
   <td align="right">bug number:</td>
   <td colspan="3"><input type="text" name="id" value="<?echo $id?>"></td>
   <input type="hidden" name="edit" value="<?php echo isset($MAGIC_COOKIE) ? 1 : 2;?>">
   <td align="center"><a href="bugstats.php">Statistics</a></td>
  </tr>
 </form>
</table>

<?php

echo hdelim();

if ($cmd == "send") {
	if (incoming_details_are_valid(1)) {
		$ret = mysql_query("INSERT INTO bugdb (bug_type,email,sdesc,ldesc,php_version,php_os,status,ts1,passwd) VALUES ('$bug_type','$email','$sdesc','$ldesc','$php_version','$php_os','Open',NOW(),'$passwd')");
    
		$cid = mysql_insert_id();

		$report = "";

		$ldesc = stripslashes($ldesc);
		$sdesc = stripslashes($sdesc);

		echo "<pre>\n";

		$report .= "From:             $email\n";
		$report .= "Operating system: $php_os\n";
		$report .= "PHP version:      $php_version\n";
		$report .= "PHP Bug Type:     $bug_type\n";
		$report .= "Bug description:  ";

		echo $report;

        echo htmlspecialchars($sdesc), "\n\n";

        echo wordwrap(htmlspecialchars($ldesc));

		echo "</pre>\n";

		$ascii_report = "$report$sdesc\n\n".wordwrap($ldesc);
		$ascii_report.= "\n-- \nEdit bug report at: http://bugs.php.net/?id=$cid&edit=1\n";

		list($mailto,$mailfrom) = get_bugtype_mail($bug_type);

		if (mail($mailto, "Bug #$cid: $sdesc", $ascii_report, "From: $email\nX-PHP-Bug: $cid\nMessage-ID: <bug-$cid@bugs.php.net>")) {
		    @mail($email, "Bug #$cid: $sdesc", $ascii_report, "From: PHP Bug Database <$mailfrom>\nX-PHP-Bug: $cid\nMessage-ID: <bug-$cid@bugs.php.net>");
			echo "<p><h2>Mail sent to $mailto...</h2></p>\n";
			echo "<p>Thank you for your help!</p>";
			echo "<p><i>The password for this report is</i>: <b>".htmlentities($passwd)."</b><br>";
			echo "If the status of the bug report you submitted\n";
			echo "changes, you will be notified. You may return here and check on the status\n";
			echo "or update your report at any time. The URL for your bug report is: <a href=\"http://bugs.php.net/?id=$cid\">";
			echo "http://bugs.php.net/?id=$cid</a></p>\n";
		} else {
			echo "<p><h2>Mail not sent!</h2>\n";
			echo "Please send this page in a mail to " .
			     "<a href=\"mailto:$mailto\">$mailto</a> manually.</p>\n";
	    }

		commonFooter();
		exit;
	}

}
elseif ($cmd == "display") {
	if (!$bug_type) $bug_type = "Any";

    $query  = "SELECT *,TO_DAYS(NOW())-TO_DAYS(ts2) AS unchanged FROM bugdb ";

	if($bug_type=="Any") {
		$where_clause = "WHERE bug_type != 'Feature/Change Request'";
	} else {
		$where_clause = "WHERE bug_type = '$bug_type'";
	}

	/* Treat assigned, analyzed and critical bugs as open */
	if ($status == "Open") {
		$where_clause .= " AND (status='Open' OR status='Assigned' OR status='Analyzed' OR status='Critical')";
	} elseif ($status == "Old Feedback") {
		$where_clause .= " AND status='Feedback' AND TO_DAYS(NOW())-TO_DAYS(ts2)>60";
	} elseif ($status == "Stale") {
		$where_clause .= " AND status != 'Closed' AND status != 'Duplicate' AND status != 'Bogus' AND TO_DAYS(NOW())-TO_DAYS(ts2) > 30";
	} elseif ($status != "All") {
		$where_clause .= " AND status='$status'";
	}

	if (strlen($search_for)) {
		$where_clause .= " AND (email like '%$search_for%' OR sdesc LIKE '%$search_for%' OR ldesc LIKE '%$search_for%')";
	}

	if ($bug_age) {
		$where_clause .= " AND ts1 >= DATE_SUB(NOW(), INTERVAL $bug_age DAY)";
	}

	if ($php_os) {
		$where_clause .= " AND php_os like '%$php_os%'";
	}

	if (!isset($phpver)) $phpver = "4";
	if ($phpver) $where_clause .= " AND SUBSTRING(php_version,1,1) = '$phpver'";

	/* not in the header, but someone can build a query manually with it. */
	if(strlen($by) and $by!='Any')
		$where_clause .= " AND dev_id = '$by' ";
 
    $query .= "$where_clause ";

	if (!$order_by) $order_by = "id";
	if (!$direction) $direction = "ASC";

	if ($reorder_by) {
		if ($order_by == $reorder_by) {
			$direction = $direction == "ASC" ? "DESC" : "ASC";
		}
		else {
			$direction = "ASC";
		}
		$order_by = $reorder_by;
	}

	$query .= " ORDER BY $order_by $direction";

	if (!$begin) $begin = 0;
	if (!isset($limit)) $limit = 30;

	if($limit!='All') $query .= " LIMIT $begin,$limit";

	$res = @mysql_query($query);
	if (!$res) die(htmlspecialchars($query)."<br>".mysql_error());

	$rows = mysql_numrows($res);
	if (!$rows) {
		echo "<h2 class=\"error\">No bugs with the specified criteria were found.</h2>";
	}
	else {
		$link = "$PHP_SELF?cmd=display&amp;bug_type=$bug_type&amp;status=$status&amp;search_for=".htmlspecialchars(stripslashes($search_for))."&amp;php_os=".htmlspecialchars(stripslashes($php_os))."&amp;bug_age=$bug_age&amp;by=$by&amp;order_by=$order_by&amp;direction=$direction&amp;phpver=$phpver&amp;limit=$limit";
?>
<table align="center" border="0" cellspacing="2" width="95%">
 <?php show_prev_next($begin,$rows,$link,$limit);?>
 <tr bgcolor="#aaaaaa">
  <th><a href="<?php echo $link;?>&amp;reorder_by=id">ID#</a></th>
<?php if ($bug_type == "Any") {?>
  <th><a href="<?php echo $link;?>&amp;reorder_by=bug_type">Type</a></th>
<?php }?>
  <th><a href="<?php echo $link;?>&amp;reorder_by=status">Status</a></th>
  <th><a href="<?php echo $link;?>&amp;reorder_by=php_version">Version</a></th>
  <th><a href="<?php echo $link;?>&amp;reorder_by=php_os">OS</a></th>
  <th><a href="<?php echo $link;?>&amp;reorder_by=sdesc">Description</a></th>
  <th>Mod</th>
  <th><a href="<?php echo $link;?>&amp;reorder_by=assign">Assigned</a></th>
 </tr>
<?php
		while ($row = mysql_fetch_array($res)) {
			echo '<tr bgcolor="', get_row_color($row), '">';
			echo "<td><a href=\"$PHP_SELF?id=$row[id]\">$row[id]</a></td>";
			if ($bug_type == "Any") {
				echo "<td>", htmlspecialchars($row[bug_type]), "</td>";
			}
			echo "<td>", htmlspecialchars($row[status]);
			if ($row[status] == "Feedback" && $row[unchanged] > 0) {
				printf ("<br>%d day%s", $row[unchanged], $row[unchanged] > 1 ? "s" : "");
			}
			echo "</td>";
			echo "<td>", htmlspecialchars($row[php_version]), "</td>";
			echo "<td>", $row[php_os] ? htmlspecialchars($row[php_os]) : "&nbsp;", "</td>";
			echo "<td>", $row[sdesc]  ? htmlspecialchars($row[sdesc]) : "&nbsp;",  "</td>";
			echo "<td align=\"center\"><a href=\"$PHP_SELF?id=$row[id]&amp;edit=1\"><img src=\"gifs/small_submit.gif\" border=\"0\" width=\"11\" height=\"11\" alt=\"edit\" /></a></td>";
			echo "<td>", $row[assign] ? htmlspecialchars($row[assign]) : "&nbsp;", "</td>";
			echo "</tr>\n";
		}

		show_prev_next($begin,$rows,$link,$limit);
?>
</table>
<?php
	}
    echo "<p align=\"center\"><a href=\"$PHP_SELF\">Submit a Bug Report</a></p>";
	commonFooter();
	exit;

} elseif (!isset($cmd) && isset($id)) {

    # fetch the original bug into $original
    $res = mysql_query("SELECT * FROM bugdb WHERE id=$id");
    if ($res) $original = mysql_fetch_array($res);
    if (!$res || !$original) {
      echo "<h1 class=\"error\">No such bug #$id!</h1>";
      commonFooter();
      exit;
    }

    # handle any updates, displaying errors if there were any
    $success = 0;

    if ($modify == "user") {
		if (!$original[passwd] || $original[passwd] != stripslashes($pw)) {
			echo "<h2 class=\"error\">The password you supplied was incorrect.</h2>\n";
		}
		elseif (incoming_details_are_valid()) {
			/* update bug record */
			$success = @mysql_query("UPDATE bugdb SET status='$status', bug_type='$bug_type', php_version='$php_version', php_os='$php_os', ts2=NOW(), email='$email' WHERE id=$id");
			
			/* add comment */
			if ($success && !empty($ncomment)) {
				$success = @mysql_query("INSERT INTO bugdb_comments (bug, email, ts, comment) VALUES ($id,'$email',NOW(),'$ncomment')");
			}
		}
		$from = $email;
    }
    elseif ($modify == "developer") {
		if (!verify_password($user,$pw)) {
			echo "<h2 class=\"error\">The username or password you supplied was incorrect.</h2>\n";
		}
		elseif (incoming_details_are_valid()) {
			$success = @mysql_query("UPDATE bugdb SET sdesc='$sdesc',status='$status', bug_type='$bug_type', assign='$assign', dev_id='$user', php_version='$php_version', php_os='$php_os', ts2=NOW() WHERE id=$id");
			if ($success && !empty($ncomment)) {
				$success = @mysql_query("INSERT INTO bugdb_comments (bug, email, ts, comment) VALUES ($id,'$user@php.net',NOW(),'$ncomment')");
			}
		}
		$from = "$user@php.net";
    }

	if ($modify && $success) {
		# mail out the updated bug
		$text = "ID: $id\n";
		if ($modify == "developer") {
			$text .= "Updated by: $user\n";
		}
		else {
			$text .= "User updated by: $email\n";
		}

		$text.= "Reported By: $original[email]\n";

		if (stripslashes($sdesc) != $original[sdesc])
			$text .= "Old Summary: $original[sdesc]\n";

		if ($status!=$original[status])
			$text .= "Old Status: $original[status]\n";
		$text.= "Status: $status\n";

		if ($bug_type != $original[bug_type])
			$text .= "Old Bug Type: $original[bug_type]\n";
		$text.= "Bug Type: $bug_type\n";

		if ($php_os != $original[php_os])
			$text .= "Old Operating System: $original[php_os]\n";
		$text.= "Operating System: $php_os\n";

		if ($php_version != $original[php_version])
			$text .= "Old PHP Version: $original[php_version]\n";
		$text.= "PHP Version: $php_version\n";

		if ($assign != $original[assign])
			$text .= "Old Assigned To: $original[assign]\n";
		if ($assign || $original[assign])
			$text.= "Assigned To: $assign\n";

		if ($ncomment)
			$text .= "New Comment:\n\n".stripslashes($ncomment);

		$text.= get_old_comments($id);

		$user_text = $text . "\n\nATTENTION! Do NOT reply to this email!\n";
		$user_text.= "To reply, use the web interface found at http://bugs.php.net/?id=$id&edit=2\n";

		$dev_text .= $text . "\n\nEdit this bug report at http://bugs.php.net/?id=$id&edit=1\n";

		list($mailto,$mailfrom) = get_bugtype_mail($bug_type);

		/* send mail if status was changed or there is a comment */
		if ($status != $original[status] || $ncomment != "") {
			@mail($original[email], "Bug #$id Updated: ".stripslashes($sdesc), $user_text, "From: Bug Database <$mailfrom>\nX-PHP-Bug: $id\nIn-Reply-To: <bug-$id@bugs.php.net>");
			@mail($mailto, "Bug #$id Updated: ".stripslashes($sdesc), $dev_text, "From: $from\nX-PHP-Bug: $id\nIn-Reply-To: <bug-$id@bugs.php.net>");
		}

		# display a happy success message
		echo "<h2>Bug #$id updated successfully.</h2>\n";

		unset($ncomment);
    }
	elseif ($modify && !$success) {
		echo "<h2 class=\"error\">Something went wrong updating the database.</h2>";
	}

	/* DISPLAY BUG */
    if ($edit) {
		echo "<form method=\"POST\" action=\"$PHP_SELF?id=$id\">\n";
		echo "<input type=\"hidden\" name=\"edit\" value=\"$edit\">\n";
	}
    if ($edit==1)
		echo '<input type="hidden" name="modify" value="developer">',"\n";
    if ($edit==2)
		echo '<input type="hidden" name="modify" value="user">',"\n";
?>
<br>
<h1>Bug id #<?php echo $id?></h1>
<table border="0">
 <tr>
  <th align="right">Status:</th>
  <?php if ($edit) {?>
   <td><select name="status"><?php show_state_options($status,$edit,$original[status])?></select>
   <?php if ($edit == 1) {?>
    <b>Assign To:</b> <input type="text" name="assign" size="10" maxlength="16" value="<?php echo $assign ? htmlspecialchars(stripslashes($assign)) : htmlspecialchars($original[assign])?>"> <input type="submit" value="Submit Changes"></td>
     <small><a href="<?php echo "$PHP_SELF?id=$id";?>&amp;edit=2"><tt>User Modify</tt></a></small></td>
   <?php } else { ?>
     <small><a href="<?php echo "$PHP_SELF?id=$id";?>&amp;edit=1"><tt>Dev Modify</tt></a></small></td>
   <?php }?>
  <?php } else { ?>
   <td><?php echo $original[status]?></td>
   <td><td><small><a href="<?php echo "$PHP_SELF?id=$id";?>&amp;edit=2"><tt>User Modify</tt></a> &nbsp; <a href="<?php echo "$PHP_SELF?id=$id";?>&amp;edit=1"><tt>Dev Modify</tt></a></small></td>
  <?php }?>
 </tr>
 <tr>
  <th align="right">From:</th>
  <?php if ($edit) {?>
   <td><input type="text" name="email" size="20" maxlength="40" value="<?php echo $email ? htmlspecialchars(stripslashes($email)) : htmlspecialchars($original[email])?>"></td>
  <?php } else { ?>
   <td><?php echo $original[email]?></td>
  <?php }?>
 </tr>
 <tr>
  <th align="right">Reported:</th>
  <td><?php echo $original[ts1]?></td>
 </tr>
 <tr>
  <th align="right">Type:</th>
  <?php if ($edit) {?>
   <td><select name="bug_type"><?php show_types($bug_type,0,$original[bug_type])?></select></td>
  <?php } else { ?>
   <td><?php echo $original[bug_type]?></td>
  <?php }?>
 </tr>
 <tr>
  <th align="right">OS:</th>
  <?php if ($edit) {?>
   <td><input type="text" name="php_os" size="20" maxlength="32" value="<?php echo $php_os ? htmlspecialchars(stripslashes($php_os)) : htmlspecialchars($original[php_os])?>"></td>
  <?php } else { ?>
   <td><?php echo $original[php_os]?></td>
  <?php }?>
 </tr>
 <tr>
  <th align="right">PHP Version:</th>
  <?php if ($edit) {?>
   <td><input type="text" name="php_version" size="20" maxlength="100" value="<?php echo $php_version ? htmlspecialchars(stripslashes($php_version)) : htmlspecialchars($original[php_version])?>"></td>
  <?php } else { ?>
   <td><?php echo $original[php_version]?></td>
  <?php }?>
 </tr>
<?php if ($original[assign] && !$edit) {?>
 <tr>
  <th align="right">Assigned To:</th>
  <td><?php echo $original[assign]?></td>
 </tr>
<?php }?>
 <tr>
  <th align="right">Summary:</th>
  <?php if ($edit) {?>
   <td><input type="text" name="sdesc" size="40" maxlength="80" value="<?php echo $sdesc ? htmlspecialchars(stripslashes($sdesc)) : htmlspecialchars($original[sdesc])?>"></td>
  <?php } else { ?>
   <td><?php echo $original[sdesc]?></td>
  <?php }?>
 </tr>
<?php if ($edit) {?>
 <tr>
  <th align="right">New Comment:</th>
 </tr>
 <tr>
  <td colspan="2">
   <textarea name="ncomment" wrap="physical" cols="60" rows="15"><?php echo htmlspecialchars(stripslashes($ncomment));?></textarea>
  </td>
 </tr>
<?php   if ($edit == 1) { /* developer */?>
 <tr>
  <th align="right">CVS Username:</th>
  <td>
   <input type="text" name="user" size="10" maxlength="20" value="<?php echo htmlspecialchars(stripslashes($user));?>">
  </td>
 </tr>
<?php   }?>
 <tr>
  <th align="right">Password:</th>
  <td>
   <input type="password" name="pw" size="10" maxlength="20" value="<?php echo htmlspecialchars(stripslashes($pw));?>">
   <?php if ($edit == 2) {?>
   [<a href="bug-pwd-finder.php">Lost your password?</a>]
   <?php }?>
  </td>
 </tr>
 <tr>
  <th align="right">Remember me:</th>
  <td>
   <input type="checkbox" name="save">
   (Check here to remember your password for next time.)
  </td>
 </tr>
 <tr>
  <td colspan="2">
   &nbsp; &nbsp; &nbsp;
   <input type="submit" value="Submit Changes">
  </td>
 </tr>
<?php }?>
</table>
<?php
	if ($edit) echo "</form>\n";

	echo hdelim();

	/* ORIGINAL REPORT */
	echo "<b><i>[$original[ts1]] $original[email]</i></b><br>\n";
	echo "<blockquote><blockquote><pre>";
	echo wordwrap(addlinks($original[ldesc]),90);
	echo "</pre></blockquote></blockquote>\n";

	/* COMMENTS */
	$query = "SELECT * FROM bugdb_comments WHERE bug=$id ORDER BY ts";
	if ($comresult = mysql_query($query)) {
		while ($com = mysql_fetch_array($comresult)) {
			echo "<b><i>[$com[ts]] $com[email]</i></b><br>\n";
			echo "<blockquote><blockquote><pre>";
			echo wordwrap(addlinks($com[comment]),90);
			echo "</pre></blockquote></blockquote>\n";
		}
	}

	commonFooter();
	exit;

} elseif (!isset($cmd)) {
?>

<h1>Report a Bug</h1>

<p>
<strong>Please</strong> read the <a href="bugs-dos-and-donts.php">Dos &
Don'ts</a> before submitting a bug report!
</p>

<?php
}

include 'bugform.inc';
?>
</font>
<?php
commonFooter();

# FUNCTIONS

function show_byage_options($current)
{
	$opts = array(
		"0"   => "the beginning",
		"1"   => "yesterday",
		"7"   => "7 days ago",
		"15"  => "15 days ago",
		"30"  => "30 days ago",
		"90"  => "90 days ago",
	);
	while (list($k,$v) = each($opts)) {
		echo "<option value=\"$k\"", ($current==$k ? " selected" : ""),
		     ">$v</option>\n";
	}
}

function show_limit_options($limit=30)
{
	for($i=10;$i<100;) {
		echo "<option value=\"$i\"", ($limit==$i ? " selected" : ""),">$i</option>\n";
		$i=$i+10;
	}
	echo '<option value="All"', $limit=='All' ? " selected": ""),">All</option>\n";
}

function show_state_options($state, $user_mode=0, $default="") 
{
	if (!$state && !$default) {
		$state = "Open";
	}
	elseif (!$state) {
		$state = $default;
	}

	$state_types = 	array (
		"Open" => 2, 
		"Closed" => 2,
		"Critical" => 1, 
		"Duplicate" => 2,
		"Assigned" => 1,
		"Analyzed" => 1,
		"Suspended" => 1,
		"Feedback" => 1,
		"Old Feedback" => 0,
		"Stale" => 0,
		"Bogus" => 1,
		"All" => 0
	);
	
	/* regular users can only pick states with type = 1 for unclosed bugs */
	if($state != "All" && $state_types[$state] == 1 && $user_mode == 2) {
		echo "<option>$state</option>\n";
		if($state != "Bogus") echo "<option>Closed</option>\n";
	} else {
		foreach($state_types as $type => $mode) {
			if ($mode >= $user_mode) {
				echo "<option";
				if($type == $state) echo " selected";
				echo ">$type</option>\n";
			}
		}
	}
}

function show_version_options($current,$default="") 
{
	$versions = array("4.0.6","4.0.5","4.0.4pl1","4.0.4","4.0CVS-".date("Y-m-d"));
	while (list(,$v) = each($versions)) {
		echo "<option", ($current == $v ? " selected" : ""), ">$v</option>\n";
		if ($current == $v) $use++;
	}
	if (!$use && $current) echo "<option selected>$current</option>\n";
	echo "<option value=\"earlier\">Earlier? Upgrade first!</option>\n";
}

function show_types($current,$show_any,$default="") 
{
	include 'bugtypes.inc';

	if (!$current && !$default && !$show_any) {
		echo "<option value=\"Unknown/Other Function\">--Please Select--</option>\n";
	}
	elseif (!$current && $show_any) {
		$current = "Any";
	}
	elseif (!$current) {
		$current = $default;
	}

	while (list($key,$value) = each($items)) {
		if ($show_any || $key != "Any") {
			echo "<option value=\"$key\"",
				 ($key == $current? " selected" : ""),
				 ">$value</option>\n";
			if ($key == $current) $use++;
		}
	}
	if (!$use && $current) {
		echo "<option selected>$current</option>\n";
	}
}

function get_old_comments ($bug_id) 
{
	$divider = str_repeat("-", 72);
	$max_message_length = 10 * 1024;
    $max_comments = 5;
    $output = ""; $count = 0;

	$res = @mysql_query("SELECT ts, email, comment FROM bugdb_comments WHERE bug=$bug_id ORDER BY ts DESC");

    if (!$res) return "";
    
    # skip the most recent (this is get_old_comments, not get_all_comments!)
    $row = mysql_fetch_row($res);
    if (!$row) return "";

    while (($row = mysql_fetch_row($res)) && strlen($output) < $max_message_length && $count++ < $max_comments) {
		$output .= "[$row[0]] $row[1]\n\n$row[2]\n\n$divider\n\n";
    }

    if (strlen($output) < $max_message_length && $count < $max_comments) {
    	$res=@mysql_query("SELECT ts1,email,ldesc FROM bugdb WHERE id=$bug_id");
    	if (!$res) return $output;
    	$row = mysql_fetch_row($res);
    	if (!$row) return $output;
		return ("\n\nPrevious Comments:\n$divider\n\n" . $output . "[$row[0]] $row[1]\n\n$row[2]\n\n$divider\n\n");
    }
    else {
		return ("\n\nPrevious Comments:\n$divider\n\n" . $output . "The remainder of the comments for this report are too long. To view\nthe rest of the comments, please view the bug report online at\n    http://bugs.php.net/?id=$bug_id\n");
    }

    return "";
}

function addlinks($text) 
{
	$text = htmlspecialchars($text);
    $text = preg_replace("/((mailto|http|ftp|nntp|news):.+?)(&gt;|\\s|\\)|\\.\\s|$)/i","<a href=\"\\1\">\\1</a>\\3",$text);
    # what the heck is this for?
    $text = preg_replace("/[.,]?-=-\"/", '"', $text);
	return $text;
}

/* validate an incoming bug report */
function incoming_details_are_valid($require_ldesc=0) 
{
    global $email,$bug_type,$php_version,$sdesc,$ldesc;

	$valid = 1;
	if(!preg_match("/[.\\w+-]+@[.\\w-]+\\.\\w{2,}/i",$email)) {
		echo "<h2 class=\"error\">Please provide a valid email address.</h2>";
		$valid = 0;
	}

	if ($bug_type=="none") {
		echo "<h2 class=\"error\">Please select an appropriate bug type.</h2>";
		$valid = 0;
	}

	if ($php_version=='earlier') {
		echo "<h2 class=\"error\">Please select a valid PHP version. If your PHP version is too old, please upgrade first and see if the problem has not already been fixed.</h2>";
		$valid = 0;
	}

    if (!$sdesc) {
		echo "<h2 class=\"error\">You must supply a short description of the bug you are reporting.</h2>";
		$valid = 0;
	}

    if ($require_ldesc && !$ldesc) {
		echo "<h2 class=\"error\">You must supply a long description of the bug you are reporting.</h2>";
		$valid = 0;
	}

	return $valid;
}

function get_bugtype_mail($bug_type) 
{
	global $mail_bugs_to;

	if (eregi("documentation", $bug_type)) {
		return array("$mail_bugs_to,phpdoc@lists.php.net",$mail_bugs_to);
	}
	elseif (eregi("website", $bug_type)) {
		return array("php-mirrors@lists.php.net","php-mirrors@lists.php.net");
	}
	else {
		return array($mail_bugs_to,$mail_bugs_to);
	}
}

function get_row_color($row) 
{
	if ($row["bug_type"]=="Feature/Change Request") {
		return "#aaaaaa";
	}
	switch($row["status"]) {
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

function show_prev_next($begin,$rows,$link,$limit)
{
	if($limit=='All') return;
	if ($begin == 0 && $rows < $limit) return;
	echo "<tr bgcolor=\"#cccccc\"><td align=\"center\" colspan=\"9\">";
    echo '<table border="0" cellspacing="0" cellpadding="0" width="100%"><tr>';
	if ($begin > 0) {
		echo "<td align=\"left\"><a href=\"$link&amp;begin=",max(0,$begin-$limit),"\">&laquo; Show Previous $limit Entries</a></td>";
	}
	if ($rows >= $limit) {
		echo "<td align=\"right\"><a href=\"$link&amp;begin=",$begin+$limit,"\">Show Next $limit Entries &raquo;</a></td>";
	}
	echo "</tr></table></td></tr>";
}

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
  ts1 datetime, # bug created date
  ts2 datetime, # bug last updated date
  dev_id varchar(16),# developer who last commented
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
