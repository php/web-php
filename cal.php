<?
	require 'cvs-auth.inc';
	if (isset($save) && isset($pw)) { # non-developers don't have $user set
		setcookie("MAGIC_COOKIE",base64_encode("$user:$pw"),time()+3600*24*20,'/');
	}
	if (isset($MAGIC_COOKIE) && !isset($user) && !isset($pw)) {
		list($user,$pw) = explode(":", base64_decode($MAGIC_COOKIE));
	}

	mysql_connect('localhost') or die('unable to connect to database');
	mysql_select_db('php3');

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
			if(strftime('%w',$ts)==$day) {
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
		$result = mysql_query("select * from phpcal where approved=0 order by sdato");
		if(!$result) echo mysql_error();
		else {
			while($row = mysql_fetch_array($result)) {
				switch($row['tipo']) {
					case 1:
						$events[] = array($row['id'],$row['sdato'],$row['sdesc'],$row['ldesc'],$row['url']);
						break;
					case 2:
						$events[] = array($row['id'],$row['sdato'].' to '.$row['edato'],$row['sdesc'],$row['ldesc'],$row['url']);
						break;
					case 3:
						list($which,$day) = explode(':',$row['recur']);
						$events[] = array($row['id'],'Every '.$re[(int)$which].' '.$days[$day+1],$row['sdesc'],$row['ldesc'],$row['url']);
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

	function days() {
		static $days=NULL;
		if(!$days) for($i=1;$i<=7;$i++) {
			$days[$i] = strftime('%A',mktime(12,0,0,4,$i,2001));
		}
		return $days;
	}

	function draw_cal($y,$m) {
		global $a, $err;
		global $ap, $aerr;
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
<table width=100% border=0>
<tr><td align=left><a href="cal.php?a=<?echo $a?>&ap=<?echo $ap?>&cm=<?echo $pm?>&cy=<?echo $py?>"><?echo $months[$pm].', '.$py?></a></td>
<td align=center><b><?echo $month,', '.$y?></b></td>
<td align=right><a href="cal.php?a=<?echo $a?>&ap=<?echo $ap?>&cm=<?echo $nm?>&cy=<?echo $ny?>"><?echo $months[$nm].', '.$ny?></a></td></tr></table></th>
</tr>
<tr bgcolor=#d0d0d0><td>
<table border=1 cellspacing=0 cellpadding=3 width=100%>
<?
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
							$data .= "<a href=\"cal.php?a=$a&ap=$ap&cm=$cm&cy=$cy&ev=".$row['id']."\">".$row['sdesc'].'</a>';
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
<?if($ev) draw_event($ev) ?>
<tr bgcolor=#d0d0d0><th <?if($err) echo 'align=center'; else echo 'align=left';?>><?if(!$err) echo '<a href="cal.php?a='.(($a)?0:1).'&ap='.$ap.'&cm='.$cm.'&cy='.$cy.'"><img src="/gifs/notes-'.(($a)?'reject':'add').'.gif" border=0 alt='.(($a)?'collapse':'expand').'></a> add event'; 
else echo "<font color=#f02020>$err</font>";
echo "</th></tr>\n";
if($a) draw_add();?>
<tr bgcolor=#d0d0d0><th <?if($aerr) echo 'align=center'; else echo 'align=left';?>><?if(!$aerr) echo '<a href="cal.php?ap='.(($ap)?0:1).'&a='.$a.'&cm='.$cm.'&cy='.$cy.'"><img src="/gifs/notes-'.(($ap)?'reject':'add').'.gif" border=0 alt='.(($ap)?'collapse':'expand').'></a> approve events'; 
else echo "<font color=#f02020>$aerr</font>";
if($ap) draw_app();
echo "</table>\n";
}

function draw_event($ev) {
	global $re;

	$result = mysql_query("select * from phpcal where id=$ev");
	if(!$result) echo mysql_error();
	else $event = mysql_fetch_array($result);
	$days=days();
?>
<tr bgcolor=#d0d0d0><td>
<table border=0 cellspacing=0 cellpadding=3 width=100%>
<tr bgcolor=#a0a0a0><th><?echo $event['sdesc']?></th><td bgcolor=#f0f0f0 rowspan=3 width=80%><?echo $event['ldesc']?></td></tr>
<tr bgcolor=#a0a0a0><th>
<? switch($event['tipo']) {
	case 1:
		echo $event['sdato'];
		break;
	case 2:
		echo $event['sdato'].' to '.$event['edato'];
		break;
	case 3:
		list($which,$day) = explode(':',$event['recur']);
		echo 'Every '.$re[(int)$which].' '.$days[$day+1];
		break;
  }
?>
</th></tr>
<tr bgcolor=#a0a0a0><th>App. by: <?echo $event['app_by']?></th></tr>
</table>
</td></tr>
<?
}

function draw_app() {
	global $a,$cm,$cy, $user, $pw;
?>
<tr bgcolor=#d0d0d0><td>
<form action="cal.php?a=<?echo $a?>&cm=<?echo $cm?>&cy=<?echo $cy?>" method="POST">
<table border=0 cellspacing=0 cellpadding=3 width=100%>
<tr bgcolor=#a0a0a0><th>&nbsp;</th><th align=left>When</th><th align=left>Label</th><th align=left>Description</th><th align=left>URL</th></tr>
<?
	
	$events = load_unapproved_events();
	$col = array('#e0e0e0','#f0f0f0'); $i=0;
	if(count($events)) {
		foreach($events as $e) {
			echo '<tr bgcolor='.$col[$i%2]."><td align=left><input type=\"checkbox\" name=\"entries[".$e[0]."]\"></td><td>$e[1]</td><td>$e[2]</td><td>$e[3]</td><td>$e[4]</td></tr>\n";	
			$i++;
		}
		echo "<tr><td align=left colspan=5><input type=image src=\"/gifs/notes-checkmark.gif\" border=0 name=\"Approve Selected\" align=bottom> <input type=image src=\"/gifs/notes-delete.gif\" border=0 name=\"Reject Selected\" align=bottom> &nbsp; <b>CVS Login</b>: <input type=text name=user value=\"$user\"> <b>CVS Passwd</b>: <input type=password name=pw value=\"$pw\"></td></tr>";
	}
	
?>
</table>
</td></tr>
</form>
<?
}

function draw_add() {
	global $smonth, $sday, $syear;
	global $emonth, $eday, $eyear;
	global $recur, $recur_day, $type;
	global $url, $sdesc, $ldesc, $ap, $re, $cm, $cy;
?>
<tr bgcolor=#d0d0d0><td>
<form action="cal.php?ap=<?echo $ap?>&cm=<?echo $cm?>&cy=<?echo $cy?>" method="POST">
<table border=0 cellspacing=0 cellpadding=3 width=100%>
<tr bgcolor=#e0e0e0><th>Start Date</th><td colspan=2><select name="smonth">
<?
	$months = months(); $i=1;
	if($smonth) echo "<option value=\"$smonth\">".$months[$smonth-1]."</option>\n";
	foreach($months as $m) { 
		if($i!=$smonth) echo "<option value=\"$i\">$m</option>\n"; 
		$i++; 
	}
?>
</select>
<input type=text name="sday" size=2 maxlength=2 value=<?echo $sday?>>
<input type=text name="syear" size=4 maxlength=4 value="<?if($syear) echo $syear; else echo date("Y");?>">
<input type="radio" name="type" value="single" CHECKED> Just one day (no end-date required)
</td>
</tr>
<tr bgcolor=#e0e0e0><th>End Date</th><td colspan=2><select name="emonth">
<?
	$i=1;
	if($emonth) echo "<option value=\"$emonth\">".$months[$emonth-1]."</option>\n";
	foreach($months as $m) { 
		if($i!=$emonth) echo "<option value=\"$i\">$m</option>\n"; 
		$i++; 
	}
?>
</select>
<input type=text name="eday" size=2 maxlength=2 value="<?echo $eday?>">
<input type=text name="eyear" size=4 maxlength=4 value="<?if($eyear) echo $eyear; else echo date("Y")?>">
<input type="radio" name="type" value="multi"> Multi-day event
</td>
</tr>
<tr bgcolor=#e0e0e0><th>OR<br>Recurring</th><td colspan=2>
<select name="recur">
<?
if($recur) echo "<option value=\"$recur\">".$re[$recur]."</option>\n";
foreach($re as $k=>$v) {
	if($recur!=$k) echo "<option value=\"$k\">$v</option>\n";
}?>
</select>
<select name="recur_day">
<?
	$days = days(); $i=0;
	if($recur_day) echo "<option value=\"$recur_day\">".$days[$recur_day-1]."</option>\n";
	foreach($days as $d) { 
		if($i!=$recur_day) echo "<option value=\"$i\">$d</option>\n"; 
		$i++; 
	}
?>
</select>
<input type="radio" name="type" value="recur"> Recurring (every month)
</td>
</tr>
<tr bgcolor=#e0e0e0><th>Short<br>Description</th><td><input type=text name="sdesc" value="<?echo get_cfg_var('magic_quotes_gpc')?stripslashes($sdesc):$sdesc?>" size=16 maxlength=16>
</td><td align=center><input type="submit" value=" Submit " name="new"></td></tr>
<tr bgcolor=#e0e0e0><th>URL</th><td colspan=2><input type=text name="url" size=60 maxlength=128 value="<?echo $url?>"></td></tr>
<tr bgcolor=#e0e0e0><th>Long<br>Description</th><td colspan=2><textarea name="ldesc" cols=78 rows=10 maxlength=78 wrap=virtual><?echo get_cfg_var('magic_quotes_gpc')?stripslashes($ldesc):$ldesc?></textarea></td></tr>
</table>
</td></tr>
</form>
<? 
} /* end of draw_add() function */

	if(isset($type)) {

		/* Assuming track_vars is on */
		$rg = get_cfg_var('register_globals');
		$mq = get_cfg_var('magic_quotes_gpc');
		foreach($HTTP_POST_VARS as $k=>$v) {
			if(!$mq) $$k = addslashes($v);
			elseif(!$rg) $$k = $v;
		}
		$ldesc = nl2br($ldesc);
		if(empty($sdesc)) {
			$err = "You must provide a short description for your event - please correct this<br>\n";
			$a=1;
		} else
		switch($type) {
			case 'single':
				if(!is_numeric($syear) || !is_numeric($smonth) || !is_numeric($sday)) {
					$err = "Invalid start date - please correct it<br>\n";
					$a=1;
				} else {
					mysql_query("insert into phpcal values (0,'$syear-$smonth-$sday',NULL,NULL,'$sdesc','$url','$ldesc',1,0,NULL)") or $err=mysql_error();
				}
				break;
			case 'multi':
				$sd = mktime(NULL,NULL,NULL,$smonth,$sday,$syear);
				$ed = mktime(NULL,NULL,59,$emonth,$eday,$eyear);
				if(!is_numeric($syear) || !is_numeric($smonth) || !is_numeric($sday)) {
					$err = "Invalid start date - please correct it<br>\n"; $a=1;
				} elseif(!is_numeric($eyear) || !is_numeric($emonth) || !is_numeric($eday)) {
					$err = "Invalid end date - please correct it<br>\n"; $a=1;
				} elseif($sd>$ed) {
					$err = "Your end date must be after your start date - please correct this<br>\n"; $a=1;
				} elseif($smonth==$emonth && $sday==$eday && $syear==$eyear) {
					$err = "Your start and end dates are identical - please correct this<br>\n"; $a=1;
				} else {
					mysql_query("insert into phpcal values (0,'$syear-$smonth-$sday','$eyear-$emonth-$eday',NULL,'$sdesc','$url','$ldesc',2,0,NULL)") or $err=mysql_error();
				}
				break;
			case 'recur':
				if(!is_numeric($recur) || !is_numeric($recur_day)) {
					$err = "Recurring event sequence is invalid - please correct it<br>\n"; $a=1;
				} else {
					mysql_query("insert into phpcal values (0,NULL,NULL,'$recur:$recur_day','$sdesc','$url','$ldesc',3,0,NULL)") or $err=mysql_error();
				}
				break;
		}
	}

	if(isset($entries)) {
		if (verify_password($user,$pw)) {
			if(isset($HTTP_POST_VARS['Approve_Selected_x']) || isset($HTTP_POST_VARS['Approve_Selected']) || isset($HTTP_POST_VARS['Approve_Selected_y'])) {
				foreach($entries as $entry=>$val) {
					$result = mysql_query("update phpcal set approved=1, app_by='rasmus' where id=$entry");
					if(!$result) echo mysql_error();
				}
			}
		} else {
			echo "<h2 class=\"error\">The username or password you supplied was incorrect.</h2>\n";
			$ap = 1;
		}
	}

  if(!isset($a)) {
  	if(isset($HTTP_GET_VARS['a'])) $a = $HTTP_GET_VARS['a'];
  	else $a=0;
  }
?>
<html><head><title>PHP Event Calendar</title></head>
<body>
<h1>PHP Event Calendar</h1>
<?
if(!isset($cm)) $cm = strftime('%m');
if(!isset($cy)) $cy = strftime('%Y');
draw_cal($cy,$cm)?>
<body></html>
