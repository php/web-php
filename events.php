<?php
	include_once 'prepend.inc';
	commonHeader('Upcoming Events');
?>
<h1>Upcoming Events</h1>

<p>
If you would like to see the list of events in a calendar format,
visit the <a href="http://www.php.net/cal.php">complete event calendar</a>.
You can also add events yourself with our "<a href="http://www.php.net/cal.php?a=1">Add
an Event</a>" form.
</p>

<?php

	$re = array(1=>'First',2=>'Second',3=>'Third',4=>'Fourth',-1=>'Last',-2=>'2nd Last',-3=>'3rd Last');

	function load_events() {
		global $re;
		$days = days();
		$fp = @fopen("backend/events.csv",'r');
		while(!feof($fp)) {
			list($d,$m,$y,,$sdesc,$id,$ldesc,$url,$recur,$tipo,$sdato,$edato) = fgetcsv($fp,4096);
			if(!$seen[$m][$id]) {
				switch($tipo) {
				case 1:
					$events[] = array($id,$sdato,$sdesc,$ldesc,$url,$d,$m,$y);
					break;
				case 2:
					$events[] = array($id,$sdato.' to '.$edato,$sdesc,$ldesc,$url,$d,$m,$y);
					break;
				case 3:
					list($which,$day) = explode(':',$recur);
					$events[] = array($id,'Every '.$re[(int)$which].' '.$days[$day].' of the month',$sdesc,$ldesc,$url,$d,$m,$y);
					break;
				}	
				$seen[$m][$id] = true;
			}
		}
		return $events;
	}

	/* returns array of Days starting with 1 = Sunday */
	function days() {
		static $days=NULL;
		if(!$days) for($i=1;$i<=7;$i++) {
			$days[$i] = strftime('%A',mktime(12,0,0,4,$i,2001));
		}
		return $days;
	}
?>

<?php
$events = load_events();
?>
<table cellpadding="5" cellspacing="1" border="0" width="70%">
<?php
$cm = 0;
foreach($events as $event) {
	$m = $event[6];
	if($cm!=$m) {
		$cm = $m;
		$month = strftime('%B',mktime(12,0,0,$event[6],$event[5],$event[7]));
		echo "</table><h2>&nbsp;&nbsp;$month</h2><table cellpadding=\"5\" cellspacing=\"1\" border=\"0\">\n";
	}	
	echo '<tr bgcolor=#cccccc><td align=left><b><a name="'.$event[5].'_'.$event[6].'">'.$month.'</a> '.$event[5].'</b> <a href="'.$event[4].'">'.$event[2].'</a> ('.$event[1].")</td></tr>\n";
	echo '<tr><td bgcolor=#e0e0e0>&nbsp;'.base64_decode($event[3])."</td></tr>\n";
}
?>
</table>

<?php
commonFooter();
?>
