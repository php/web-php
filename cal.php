<?php
  include_once 'prepend.inc';

  // The calendar is hosted at php2.chek.com only!
  if (!is_primary_site()) {
	/*
    if (is_backup_primary()) {
      commonHeader("Service Unavailable");?>
<p>Sorry, the event calendar is temporarily unavailable.</p>
<?php
      commonFooter();
      exit;
    }
	*/
  	header("Location: http://php2.chek.com/cal.php");
  	exit;
  }
  if (!isset($format)) {
    $format = 'html';
  }

  if ($format == 'html') {
	commonHeader("Event Calendar",1);

	include_once 'cvs-auth.inc';
	if (isset($save) && isset($pw)) { # non-developers don't have $user set
		setcookie("MAGIC_COOKIE",base64_encode("$user:$pw"),time()+3600*24*20,'/');
	}
	if (isset($MAGIC_COOKIE) && !isset($user) && !isset($pw)) {
		list($user,$pw) = explode(":", base64_decode($MAGIC_COOKIE));
	}
  }

  @mysql_connect('localhost') or die('unable to connect to database');
  @mysql_select_db('php3');

  $re = array(1=>'First',2=>'Second',3=>'Third',4=>'Fourth',-1=>'Last',-2=>'2nd Last',-3=>'3rd Last');
/*
CREATE TABLE phpcal (
  id int(8) NOT NULL,
  sdato date,
  edato date,
  recur char(12),
  sdesc char(16) NOT NULL,
  url varchar(128),
  ldesc text,
  tipo int(1) NOT NULL,
  approved int(1) NOT NULL DEFAULT 0,
  app_by char(16),
  PRIMARY KEY(id),
  INDEX (sdato),
  INDEX (edato)
)
*/
	/*
	 * Find the first, second, third, last, second-last etc. weekday of a month
	 *
	 * args: day 1 = Monday
	 *       which 1 = first
	 *             2 = second
	 *             3 = third
   *            -1 = last
	 *            -2 = second-last
	 */
	function weekday($year, $month, $day, $which) {
		$ts = mktime(12,0,0,$month+(($which>0)?0:1),($which>0)?1:0,$year);
		$done = false;
		$match = 0;
		$inc = 3600*24;
		while(!$done) {
			if(strftime('%w',$ts)==$day-1) {
				$match++;
			}
			if($match==abs($which)) $done=true;
			else $ts += (($which>0)?1:-1)*$inc;
		}
		return $ts;
	}

	function load_unapproved_events() {
		global $re;
		$days = days();
		$result = mysql_query("select phpcal.*, country.name as name from phpcal, country where phpcal.country=country.id and approved=0 order by sdato");
		if(!$result) echo mysql_error();
		else {
			while($row = mysql_fetch_array($result)) {
				switch($row['tipo']) {
					case 1:
						$events[] = array($row['id'],$row['sdato'],$row['sdesc'],$row['ldesc'],$row['url'], $row['name'], $row['category']);
						break;
					case 2:
						$events[] = array($row['id'],$row['sdato'].' to '.$row['edato'],$row['sdesc'],$row['ldesc'],$row['url'], $row['name'], $row['category']);
						break;
					case 3:
						list($which,$day) = explode(':',$row['recur']);
						$events[] = array($row['id'],'Every '.$re[(int)$which].' '.$days[$day],$row['sdesc'],$row['ldesc'],$row['url'], $row['name'], $row['category']);
						break;
				}
			}
		}
		return $events;
	}

	function load_month($year, $month) {
		$result = mysql_query("select * from phpcal where (((MONTH(sdato)=$month or MONTH(edato)=$month) and (YEAR(sdato)=$year or YEAR(edato)=$year) and tipo<3) or tipo=3) and approved=1");
		if(!$result) echo mysql_error();
		else {
			while($row = mysql_fetch_array($result)) {
				switch($row['tipo']) {
					case 1:
						list(,,$dd) = explode('-',$row['sdato']);
						$events[(int)$dd][] = $row;
						break;
					case 2:
						list(,$mm,$dd) = explode('-',$row['sdato']);
						list(,$m2,$d2) = explode('-',$row['edato']);
						if((int)$mm==(int)$m2) {
							for($i=(int)$dd; $i<=(int)$d2; $i++) {
								$events[$i][] = $row;
							}
						} elseif((int)$mm==$month) {
							for($i=(int)$dd; $i<32; $i++) {
								$events[$i][] = $row;
							}
						} else {
							for($i=1; $i<=(int)$d2; $i++) {
								$events[$i][] = $row;
							}	
						}
						break;
					case 3:
						list($which,$dd) = explode(':',$row['recur']);
						$ts = weekday($year,$month,$dd,$which);
						$events[(int)strftime('%d',$ts)][] = $row;
						break;
				}
			}			
		}
		return($events);
	}

	function start_month($year, $month) {
		$ts = mktime(12,0,0,$month,1,$year);
		return strftime('%w',$ts);	
	}

	function last_day($year,$month) {
		$ts = mktime(12,0,0,$month+1,0,$year);
		return strftime('%e',$ts);
	}

	function months() {
		static $months=NULL;

		if(!$months) for($i=1;$i<=12;$i++) {
			$months[$i] = strftime('%B',mktime(12,0,0,$i,1));
		}
		return $months;
	}

	/* returns array of Days starting with 1 = Sunday */
	function days() {
		static $days=NULL;
		if(!$days) for($i=1;$i<=7;$i++) {
			$days[$i] = strftime('%A',mktime(12,0,0,4,$i,2001));
		}
		return $days;
	}

	function draw_cal($y,$m) {
		global $ev, $cm, $cy;

		$months = months();
		$m=(int)$m;
		$month=$months[$m];
		$events = load_month($y,$m);
		$pm=$m-1;
		$nm=$m+1;
		$py = $ny = $y;
		if($m==1) {
			$pm = 12;
			$py = $y-1;
		} else {
			$pm = $m-1;
		}
		if($m==12) {
			$nm = 1;
			$ny = $y+1;
		}
		?>
<table border=0 cellspacing=0 cellpadding=3 width=100%><tr bgcolor=#d0d0d0>
<th align=left>
<table width=100% border=0
<tr><td align=left><a href="cal.php?cm=<?php echo $pm?>&cy=<?php echo $py?>"><?php echo $months[$pm].', '.$py?></a></td>
<td align=center><b><?php echo $month,', '.$y?></b></td>
<td align=right><a href="cal.php?cm=<?php echo $nm?>&cy=<?php echo $ny?>"><?php echo $months[$nm].', '.$ny?></a></td></tr></table></th>
</tr>
<tr bgcolor=#d0d0d0><td>
<table border=1 cellspacing=0 cellpadding=3 width=100%>
<?php
	$days = days();
	$start = start_month($y,$m);
	$last = last_day($y,$m);
	if(($start==5 && $last>30) || ($start==6 && $last>29)) $rows=7; else $rows=6;
	for($j=0;$j<$rows; $j++) {
		echo '<tr>';
		for($i=1; $i<=7; $i++) {
			if($j==0) echo '<th width=14.2% bgcolor=#a0a0a0>'.$days[$i]."</th>\n";
			else {
				if($j==1 && ($i-1)==$start) $day = 1;
				if($day && $day<=$last) {
					$label=$day;
					$col = '#f0f0f0';
					$bcol=$col;
					$data = '&nbsp;';
					if(is_array($events[$day])) {
						$data = '';
						foreach($events[$day] as $row) {
							if($data) $data .= "<br>\n";
							$data .= "<a href=\"cal.php?cm=$cm&cy=$cy&ev=".$row['id']."\">".$row['sdesc'].'</a>';
						}
					}
				}
				else { $label=''; $data=''; $col='#d0d0d0'; $bcol=$col; }
				echo "<td bgcolor=$bcol><table border=0 width=100% bgcolor=\"$col\" cellspacing=0><tr><td align=right>$label</td></tr>";
				echo "<tr><td>$data</td></tr></table></td>\n";
			}
			if($day) $day++;
		}
		echo "</tr>\n";
	}
?>
</table>
<?php if($ev) draw_event($ev) ?>
<?php
echo "</table>\n";
}

function draw_event($ev) {
	global $re;
	$stmt = "select phpcal.*,country.name as cname from phpcal,country where phpcal.country = country.id and phpcal.id=$ev";
	$result = mysql_query($stmt); 	
	if(!$result) echo mysql_error();
	else $event = mysql_fetch_array($result);
	$days=days();
	$cat = $event['category'];
	switch($cat) {
		case 1:	 
			$category = "regional";
			break;
		case 2:
			$category = "national";
			break;
		case 3:
			$category = "international";
			break;
		default:
			$category = "unknown";
	}
?>
<tr bgcolor=#d0d0d0><td>
<table border=0 cellspacing=0 cellpadding=3 width=100%>
<tr bgcolor=#a0a0a0><th><?php echo $event['sdesc']?></th>
<td bgcolor=#f0f0f0 rowspan=3 width=80%>
<?php 

echo ini_get('magic_quotes_gpc') ? stripslashes($event['ldesc']) : $event['ldesc'] ; 

echo ((!$event['country']) || ($event['country'] != 'XXX')) ? "<br><b>Country</b>: ". $event['cname'] : "" ; 

echo ((!isset($category)) || ($category != "unknown")) ? "<br><b>Event Type</b>: ". $category : "" ;   

if(strlen($event['url'])) {
	echo "<br><b>URL</b>: <a href=\"".$event['url']."\">".$event['url']."</a>\n";
}
?>
</td></tr>
<tr bgcolor=#a0a0a0><th>
<?php switch($event['tipo']) {
	case 1:
		echo $event['sdato'];
		break;
	case 2:
		echo $event['sdato'].' to '.$event['edato'];
		break;
	case 3:
		list($which,$day) = explode(':',$event['recur']);
		echo 'Every '.$re[(int)$which].' '.$days[$day];
		break;
  }
?>
</th></tr>
<tr bgcolor=#a0a0a0><th>Approved by: <?php echo $event['app_by']?></th></tr>
</table>
</td></tr>
<?php
}
  if (!isset($cm)) $cm = (int)strftime('%m');
  if (!isset($cy)) $cy = (int)strftime('%Y');
  if (!isset($cd)) $cd = (int)strftime('%d');
  if (!isset($nm)) $nm = 1;

  switch($format) {
	case 'html':
		echo "<h1>Event Calendar</h1>";
		draw_cal($cy,$cm);
		echo "<br>";
		commonFooter();
		break;

	case 'csv':
		while($nm) {
			$entries = load_month($cy,$cm);
			$last = last_day($cy,$cm);
			for($i=$cd; $i<=$last; $i++) {
				if(is_array($entries[$i])) foreach($entries[$i] as $row) {
					if($data) $data.="\n";
					$data .= "$i,$cm,$cy,\"http://php.net/cal.php?cm=$cm&cy=$cy&ev=".$row['id']."\",\"".addslashes($row['sdesc']).'"';
				}
			}
			$nm--;
			$cd = 1;
			if($nm) {
				$cm++;
				if($cm==13) { $cy++; $cm=1; }
			}
		}
		echo $data;
		break;
  }
?>
