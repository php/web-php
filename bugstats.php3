<?
	function mydate($str) {
		$year = substr($str,0,4);
		$month = substr($str,5,2);
		$day = substr($str,8,2);
		$hour = substr($str,11,2);
		$min = substr($str,14,2);
		$sec = substr($str,17,2);
		return mktime($hour,$min,$sec,$month,$day,$year);
	}

	function ShowTime($sec) {
		if($sec<60) {
			return "$sec seconds";
		} else if($sec<120) {
			return (int)($sec/60)." minute ".($sec%60)." seconds";
		} else if($sec<3600) {
			return (int)($sec/60)." minutes ".($sec%60)." seconds";
		} else if($sec<7200) {
			return (int)($sec/3600)." hour ".(int)(($sec%3600)/60)." minutes ".(($sec%3600)%60)." seconds";
		} else if($sec<86400) {
			return (int)($sec/3600)." hours ".(int)(($sec%3600)/60)." minutes ".(($sec%3600)%60)." seconds";
		} else if($sec<172800) {
			return (int)($sec/86400)." day ".(int)(($sec%86400)/3600)." hours ".(int)((($sec%86400)%3600)/60)." minutes ".((($sec%86400)%3600)%60)." seconds";
		} else {
			return (int)($sec/86400)." days ".(int)(($sec%86400)/3600)." hours ".(int)((($sec%86400)%3600)/60)." minutes ".((($sec%86400)%3600)%60)." seconds";
		}
	}

	require "shared.inc";
	commonHeader("Bug Stats");
	
	mysql_pconnect("localhost","","");
	mysql_select_db("php3");

	$result=mysql_query("SELECT * from bugdb");
	while($row=mysql_fetch_row($result)) {
		$bug_type_all[$row[1]]++;
		if($row[7]=="Open") {
			$bug_type_open[$row[1]]++;
		}
		if($row[7]=="Analyzed") {
			$bug_type_analyzed[$row[1]]++;
		}
		if($row[7]=="Suspended") {
			$bug_type_suspended[$row[1]]++;
		}
		if($row[7]=="Duplicate") {
			$bug_type_duplicate[$row[1]]++;
		}
		if($row[7]=="Assigned") {
			$bug_type_assigned[$row[1]]++;
		}
		$email[$row[2]]++;
		$php_version[$row[5]]++;
		$php_os[$row[6]]++;
		$status[$row[7]]++;
		if($row[7]=="Closed") {
			$bug_type_closed[$row[1]]++;
			$time_to_close[] = mydate($row[10]) - mydate($row[9]);
			$closed_by[$row[11]]++;
		}	
		$total++;	
	}
	mysql_freeresult($result);
	echo "<table>\n";
	echo "<tr bgcolor=#aabbcc><th align=right>Total bug entries in system:</th><td>$total</td><th>Closed</th><th>Open</th><th>Analyzed</th><th>Suspended</th><th>Duplicate</th><th>Assigned</th></tr>\n";
	while(list($type,$value)=each($bug_type_all)) {
		echo "<tr><th align=right bgcolor=#aabbcc>$type:</th><td align=center bgcolor=#ccddee>$value</td><td align=center bgcolor=#ddeeff>".$bug_type_closed[$type]."&nbsp;</td><td align=center bgcolor=#ccddee>".$bug_type_open[$type]."&nbsp;</td><td align=center bgcolor=#ddeeff>".$bug_type_analyzed[$type]."&nbsp;</td><td align=center bgcolor=#ccddee>".$bug_type_suspended[$type]."&nbsp;</td><td align=center bgcolor=#ddeeff>".$bug_type_duplicate[$type]."&nbsp;</td><td align=center bgcolor=#ccddee>".$bug_type_assigned[$type]."&nbsp;</td></tr>\n";
	}
	echo "</table>\n";
	
	sort($time_to_close);
	$c=count($time_to_close);
	$sum=0;
	for($i=0;$i<$c;$i++) {
		$sum+=$time_to_close[$i];
	}
	$median = $time_to_close[(int)($c/2)];

	echo "<p><b>Bug Report Time to Close Stats</b>\n";
	echo "<table>\n";
	echo "<tr bgcolor=#aabbcc><th align=right>Average life of a report:</th><td bgcolor=#ccddee>".ShowTime((int)($sum/$c))."</td></tr>\n";
	echo "<tr bgcolor=#aabbcc><th align=right>Median life of a report:</th><td bgcolor=#ccddee>".ShowTime($median)."</td></tr>\n";
	echo "<tr bgcolor=#aabbcc><th align=right>Slowest report closure:</th><td bgcolor=#ccddee>".ShowTime($time_to_close[$c-1])."</td></tr>\n";
	echo "<tr bgcolor=#aabbcc><th align=right>Quickest report closure:</th><td bgcolor=#ccddee>".ShowTime($time_to_close[0])."</td></tr>\n";
	echo "</table>\n";
	arsort($closed_by);
	echo "<p><b>Who is closing the bug reports?</b>\n";
	echo "<table>\n";
	while(list($who,$value)=each($closed_by)) {
		echo "<tr bgcolor=#aabbcc><th>$who</th><td bgcolor=#ccddee>$value</td></tr>\n";
	}
	echo "</table>\n";

	arsort($email);
	echo "<p><b>Who is submitting bug reports?</b>\n";
	echo "<table>\n";
	while(list($who,$value)=each($email)) {
		echo "<tr bgcolor=#aabbcc><th>$who</th><td bgcolor=#ccddee>$value</td></tr>\n";
	}
	echo "</table>\n";

	commonFooter();
?>
