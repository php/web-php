<?php
function addlinks($text) {
    $text = htmlspecialchars($text);
    $new_text = ereg_replace("(http:[^ \n\t]*)","<a href=\"\1-=-\">\1</a>",$text);
    $new_text = ereg_replace("(ftp:[^ \n\t]*)","<a href=\"\1-=-\">\1</a>",$text);
    $new_text = ereg_replace("[.,]-=-\"","\"",$new_text);
    $new_text = ereg_replace("-=-\"","\"",$new_text);
    return $new_text;
}
	mysql_connect("localhost","nobody","") or die("Unable to connect to SQL server\n");
	mysql_select_db("php3");
	if($id) {
		$result = mysql_query("select id,bug_type,email,sdesc,ldesc,php_version,php_os,status,comments,ts1,dev_id,assign from bugdb where id=$id");
		if($num=mysql_num_rows($result)) {
			$row = mysql_fetch_array($result);
			echo "<pre><h1>Bug $id</h1>\n";
			echo "<b>From     : " . htmlspecialchars($row['email']) . "\n";
			echo "Date     : " . $row['ts1'] . "\n";
			echo "Status   : <a href=\"bugs.php?id=$id&edit=1\">" . htmlspecialchars($row['status']) . "</a>\n";
			echo "Type     : " . htmlspecialchars($row['bug_type']) . "\n";
			echo "Version  : " . htmlspecialchars($row['php_version']) . "\n";
			echo "OS       : " . htmlspecialchars($row['php_os']) . "\n";
			echo "Subject  : " . htmlspecialchars($row['sdesc']) . "</b>\n";
			echo "\n" . htmlspecialchars($row['ldesc']) . "\n\n";
			if(strlen($row['comments'])) {
				echo "<b>From: " . $row['dev_id'] . "</b>\n";
				echo '<blockquote>' . htmlspecialchars($row['comments']) . "</blockquote>\n";
			}
	        $query = "SELECT *,UNIX_TIMESTAMP(ts) AS when FROM bugdb_comments WHERE bug=$id ORDER BY ts";
	        if ($comresult = mysql_query($query)) {
	            while ($com = mysql_fetch_array($comresult)) {
					echo "<b><i>[".$com['ts']."] ".$com['email']."</i></b><br>\n";
					$text = addlinks($com['comment']);
					echo "<blockquote>";
					echo $text;
					echo "</blockquote>\n";
				}
				mysql_freeresult($comresult);
			}
			echo "</pre>";
		} else {
			echo "Bug #$id is not in the database";
		}
	} else {
		$result = mysql_query("select id,bug_type,status,sdesc from bugdb where status != 'Closed' and status!='Suspended' and status!='Duplicate' and status!='Bogus' and php_version like '4%' order by bug_type,id");
		if($num=mysql_num_rows($result)) {
			echo "<h1>PHP 4.0 Bug Database summary</h1>";
			echo "<pre> Num Status     Summary ($num total including feature requests)\n";
			$last_group = "";
			while($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
				if($last_group!=$row[bug_type]) {
					$last_group = $row[bug_type];
					echo "===============================================[<b>".$row[bug_type]."]";
					$len = 29-strlen($row[bug_type]);
					$s='';
					for($i=0;$i<$len; $i++) $s.= "=";
					echo "$s</b>\n";
				}
				printf("<a href=\"%s?id=%d\">%4d</a>",$PHP_SELF,$row[id],$row[id]);
				printf(" %-9s ",$row[status]);
				echo " ".htmlspecialchars($row[sdesc])."\n";
			}
			mysql_free_result($result);
			echo "</pre>";
		}	
	}
?>
