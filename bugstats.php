<?php
require_once 'prepend.inc';

if(!is_primary_site()) {
	header("Location: http://www.php.net/bugstats.php");
	exit;
}

if ($phpver != 4 and $phpver != 3) {
	$phpver = 0;
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

commonHeader("Bug Stats");

if ($phpver > 0) {
	$other = ($phpver == 4 ? 3 : 4);
	echo '<p>Currently displaying PHP'. $phpver . ' bugs only. Display <a href="bugstats.php">all bugs</a> or <a href="bugstats.php?phpver=' . $other . '">only PHP' . $other . ' bugs</a>.</p>' . "\n";
}
else {
	echo '<p>Currently displaying all bugs. Display <a href="bugstats.php?phpver=3">only PHP3 bugs</a> or <a href="bugstats.php?phpver=4">only PHP4 bugs</a>.</p>' . "\n";

}

mysql_connect("localhost","nobody","");
mysql_select_db("php3");

$query = "SELECT *,UNIX_TIMESTAMP(ts2)-UNIX_TIMESTAMP(ts1) AS timetoclose FROM bugdb";

if ($phpver > 0) {
	$query .= " WHERE php_version LIKE '" . $phpver . "%'";
}

$query .= " ORDER BY bug_type";

$result = mysql_unbuffered_query($query);

while($row=mysql_fetch_array($result)) {
	$bug_type['all'][$row[bug_type]]++;
	switch (strtolower($row[status])) {
	case "closed":
		if ($row[timetoclose] > 0) {
			$time_to_close[] = $row[timetoclose];
		}
                /* falls through */
	case "bogus":
		$closed_by[$row[dev_id]]++;
		break;
	}
	$bug_type[strtolower($row[status])][$row[bug_type]]++;
	$bug_type[strtolower($row[status])]['all']++;
	$email[$row[email]]++;
	$php_version[$row[php_version]]++;
	$php_os[$row[php_os]]++;
	$status[$row[status]]++;
	$total++;
}

function bugstats($status, $type) {
	global $bug_type, $phpver;
	if ($bug_type[$status][$type] > 0) {
		return '<a href="bugs.php?cmd=display&amp;status=' . ucfirst($status) . "&amp;phpver=" . $phpver . '&amp;bug_type=' . ($type == 'all' ? 'Any' : urlencode($type)) . '&amp;by=Any">' . $bug_type[$status][$type] . "</a>\n";
	}
}

mysql_freeresult($result);
echo "<table>\n";

/* prepare for sorting by bug report count */
foreach($bug_type['all'] as $type => $value) {
	if(!isset($bug_type['closed'][$type]))    $bug_type['closed'][$type] = 0;
	if(!isset($bug_type['bogus'][$type]))     $bug_type['bogus'][$type] = 0;
	if(!isset($bug_type['open'][$type]))      $bug_type['open'][$type] = 0;
	if(!isset($bug_type['critical'][$type]))  $bug_type['critical'][$type] = 0;
	if(!isset($bug_type['analyzed'][$type]))  $bug_type['analyzed'][$type] = 0;
	if(!isset($bug_type['suspended'][$type])) $bug_type['suspended'][$type] = 0;
	if(!isset($bug_type['duplicate'][$type])) $bug_type['duplicate'][$type] = 0;
	if(!isset($bug_type['assigned'][$type]))  $bug_type['assigned'][$type] = 0;
	if(!isset($bug_type['feedback'][$type]))  $bug_type['feedback'][$type] = 0;
}

if(!isset($sort_by)) $sort_by = 'open';	
if(!isset($rev)) $rev = 1;

if($rev == 1) {
	arsort($bug_type[$sort_by]);
} else {
	asort($bug_type[$sort_by]);
}
reset($bug_type);

function sort_url($type) {
	global $sort_by,$rev,$phpver;
	if($type == $sort_by) { 
		$reve = ($rev == 1) ? 0 : 1;		
	} else {
		$reve = 1;
	}	
	$ver = ($phpver != 0) ? "phpver=$phpver&amp;" : '';
	return '<A href="./bugstats.php?'.$ver.'sort_by='.$type.'&amp;rev='.$reve.'">'.ucfirst($type).'</a>';
}

echo "<tr bgcolor=#aabbcc><th align=right>Total bug entries in system:</th><td>$total</td>";
echo "<th>".sort_url('closed')."</th>";
echo "<th>".sort_url('open')."</th>";
echo "<th>".sort_url('critical')."</th>";
echo "<th>".sort_url('analyzed')."</th>";
echo "<th>".sort_url('suspended')."</th>";
echo "<th>".sort_url('duplicate')."</th>";
echo "<th>".sort_url('assigned')."</th>";
echo "<th>".sort_url('feedback')."</th>";
echo "<th>".sort_url('bogus')."</th>";
echo "</tr>\n";

echo "<tr><th align=right bgcolor=#aabbcc>All:</th>",
     "<td align=center bgcolor=#ccddee>$total</td>",
     "<td align=center bgcolor=#ddeeff>".bugstats('closed','all')."&nbsp;</td>",
     "<td align=center bgcolor=#ccddee>".bugstats('open', 'all')."&nbsp;</td>",
     "<td align=center bgcolor=#ddeeff>".bugstats('critical', 'all')."&nbsp;</td>",
     "<td align=center bgcolor=#ccddee>".bugstats('analyzed', 'all')."&nbsp;</td>",
     "<td align=center bgcolor=#ddeeff>".bugstats('suspended','all')."&nbsp;</td>",
     "<td align=center bgcolor=#ccddee>".bugstats('duplicate', 'all')."&nbsp;</td>",
     "<td align=center bgcolor=#ddeeff>".bugstats('assigned','all')."&nbsp;</td>",
     "<td align=center bgcolor=#ccddee>".bugstats('feedback','all')."&nbsp;</td>",
     "<td align=center bgcolor=#ddeeff>".bugstats('bogus', 'all')."&nbsp;</td>",
     "</tr>\n";

foreach ($bug_type[$sort_by] as $type => $value) {
	if(($bug_type['open'][$type] > 0 || 
		$bug_type['critical'][$type] > 0 ||
		$bug_type['analyzed'][$type] > 0 ||
		$bug_type['suspended'][$type] > 0 ||
		$bug_type['duplicate'][$type] > 0 ||
		$bug_type['assigned'][$type] > 0 ||
		$bug_type['feedback'][$type] > 0 ) && $type != 'all') 
	{ 
		echo "<tr><th align=right bgcolor=#aabbcc>$type:</th>",
		     "<td align=center bgcolor=#ccddee>".$bug_type['all'][$type]."</td>",
		     "<td align=center bgcolor=#ddeeff>".bugstats('closed', $type)."&nbsp;</td>",
		     "<td align=center bgcolor=#ccddee>".bugstats('open', $type)."&nbsp;</td>",
		     "<td align=center bgcolor=#ddeeff>".bugstats('critical',$type)."&nbsp;</td>",
		     "<td align=center bgcolor=#ccddee>".bugstats('analyzed', $type)."&nbsp;</td>",
		     "<td align=center bgcolor=#ddeeff>".bugstats('suspended',$type)."&nbsp;</td>",
		     "<td align=center bgcolor=#ccddee>".bugstats('duplicate', $type)."&nbsp;</td>",
		     "<td align=center bgcolor=#ddeeff>".bugstats('assigned',$type)."&nbsp;</td>",
		     "<td align=center bgcolor=#ccddee>".bugstats('feedback',$type)."&nbsp;</td>",
		     "<td align=center bgcolor=#ddeeff>".bugstats('bogus', $type)."&nbsp;</td>",
		     "</tr>\n";
	}
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

echo "<p><b>Who is closing the bug reports?</b>\n";
echo "<table>\n";
arsort($closed_by);
$i=0;
while($i < 20) {
	list($who,$value)=each($closed_by);
	echo "<tr bgcolor=#aabbcc><th>$who</th><td bgcolor=#ccddee>$value</td></tr>\n";
	$i++;			
}
echo "</table>\n";

commonFooter();
?>
