<?php
require_once 'prepend.inc';

# this serves three different forms of the calendar data:
# * a monthly view ($cm, $cy)
# * a daily view ($cm, $cd, $cy)
# * an individual item view ($id)
# if we encounter an error display an event or a day, we display the current
# month (or the month of the requested day)

$begun = 0;
$id = isset($id) ? (int)$id : 0;
$cy = isset($cy) ? (int)$cy : 0;
$cm = isset($cm) ? (int)$cm : 0;
$cd = isset($cd) ? (int)$cd : 0;

if ($id) {
 if ($event = load_event($id)) {
   commonHeader("Event: ".stripslashes(htmlentities($event['sdesc'])));
   display_event($event, 0);
   $begun++;
 }
 else {
   $errors[] = "There is no event for specified id ('".htmlentities($id)."')";
 }
}
elseif ($cy && $cm && $cd) {
 if (checkdate($cm,$cd,$cy)) {
   $date = mktime(0,0,1,$cm,$cd,$cy);
   if ($events = load_events($date)) {
     commonHeader("Events: ".date("F j, Y", $date));
     echo "<h2>", date("F j, Y", $date), "</h2>\n";
     foreach ($events as $event) {
       display_event($event, 0);
     }
     $begun++;
   }
   else {
     $errors[] = "There are no events for the specified date (".date("F j, Y",$date).").";
   }
 }
 else {
   $errors[] = "The specified date (".htmlentities("$cy/$cm/$cd").") was not valid.";
   unset($cm); unset($cd); unset($cy);
 }
}

if ($cm && $cy && !checkdate($cm,1,$cy)) {
 $errors[] = "The specified year and month (".htmlentities("$cy, $cm").") are not valid.";
 unset($cm); unset($cy);
}

if (!$cm) $cm = date("m");
if (!$cy) $cy = date("Y");

$date = mktime(0,0,1,$cm,1,$cy);

if (!$begun) {
  commonHeader("Events: ".date("F Y", $date));
?>
<div class="tip">
<p>If you would like to suggest an upcoming event to be listed on this
calendar, you can use <a href="submit-event.php">our event submission
form</a>.</p>
<p>You can click on each of the events for details, or on the number for a day
to get the details for all of the events taking place that day.</p>
</div>
<?php
}

$events = load_events($date,1);

if (isset($errors) && $errors) {
 display_errors($errors);
 commonFooter();
 exit(0);
}
	
# beginning and end of this month
$bom = mktime(0,0,1,$cm,  1,$cy);
$eom = mktime(0,0,1,$cm+1,0,$cy);

# last month and next month
$lm = mktime(0,0,1,$cm,0,$cy);
$nm = mktime(0,0,1,$cm+1,1,$cy);

echo '<br /><table bgcolor="#d0d0d0" width="100%" border="0" cellspacing="0" cellpadding="3">',
     "\n<tr>", '<td align="left" width="33%"><a href="', $PHP_SELF,
     strftime('?cm=%m&amp;cy=%Y">%B, %Y</a></td>', $lm),
     '<td align="center" width="33%">', strftime('<b>%B, %Y</b></td>', $bom),
     '<td align="right" width="33%"><a href="', $PHP_SELF,
     strftime('?cm=%m&amp;cy=%Y">%B, %Y</a></td>', $nm),
     "</tr>\n</table>\n";

# begin the calendar
echo '<table id="cal" bgcolor="#f0f0f0" width="100%" border="1" cellspacing="0" cellpadding="3">',
     "\n",'<tr bgcolor="#a0a0a0">',"\n";
for ($i = 0; $i < 7; $i++) {
  echo '<th width="14%">', date("l",mktime(0,0,1,4,$i+1,2001)), "</th>\n";
}
echo "</tr>\n<tr>";

# generate the requisite number of blank days to get things started
for ($days = $i = date("w",$bom); $i > 0; $i--) {
  echo '<td bgcolor="#d0d0d0">&nbsp;</td>';
}

for ($i = 1; $i <= date("t",$bom); $i++) {
  echo '<td valign="top"><a class="day" href="',
       $PHP_SELF, "?cm=$cm&amp;cd=$i&amp;cy=$cy",
       '">',$i,'</a>';
  display_events_for_day(date("Y-m-",$bom).sprintf("%02d",$i),$events);
  echo '</td>';
  if (++$days % 7 == 0) echo "</tr>\n<tr>";
}

# generate the requisite number of blank days to wrap things up
for (; $days % 7; $days++) {
  echo '<td bgcolor="#d0d0d0">&nbsp;</td>';
}
echo "</tr>\n</table>\n";

commonFooter();

# FUNCTIONS

/* generate the date on which a recurring event falls for a given month */
/* $bom and $eom are the first and last day of the month to look at */
function date_for_recur($recur,$day,$bom,$eom) {
  /* $day == 1 == 'Sunday' == date("w",'some sunday')+1 */

  if ($recur > 0) { /* ${recur}th $day of the month */
    $bomd = date("w",$bom) + 1;
    $days = (($day - $bomd + 7) % 7) + (($recur - 1) * 7);

    return mktime(0,0,1, date("m",$bom), $days + 1, date("Y",$bom));
  }
  else { /* ${recur}th to last $day of the month */
    $eomd = date("w",$eom) + 1;
    $days = (($eomd - $day + 7) % 7) + ((abs($recur) - 1) * 7);

    return mktime(0,0,1, date("m",$bom)+1, -$days, date("Y",$bom));
  }
}

/* display a <div> for each of the events that fall on a given day */
function display_events_for_day($day,$events) {
  global $PHP_SELF,$cm,$cy;
  foreach ($events as $event) {
    if (($event['type'] == 2 && $event['start'] <= $day && $event['end'] >= $day)
     || ($event['start'] == $day)) {
      echo '<div class="event">',
           '<a href="',$PHP_SELF,"?id=$event[id]&amp;cm=$cm&amp;cy=$cy",'">',
           stripslashes(htmlentities($event['sdesc'])),
           '</a></div>';
    }
  }
}

/* load a single event from the event list, by id */
function load_event($id) {
  $fp = @fopen("backend/events.csv",'r');
  if (!$fp) return;
  while (!feof($fp)) {
    $event = read_event($fp);
    if ($event['id'] == $id) {
      fclose($fp);
      return $event;
    }
  }
  fclose($fp);
  return;
}

/* load a list of events, either for a particular day or a whole month */
function load_events($from, $whole_month=0) {
  /* we'll take advantage of the equality behavior of this date format */
  $from_date = date("Y-m-d", $from);
  $bom = mktime(0,0,1,date("m",$from),1,date("Y",$from));
  $eom = mktime(0,0,1,date("m",$from)+1,0,date("Y",$from));
  $to_date = date("Y-m-d", $whole_month ? $eom : $from);

  $events = $seen = array();
  $fp = @fopen("backend/events.csv",'r');
  if (!$fp) return;

  while (!feof($fp)) {
    $event = read_event($fp);

	if(!isset($seen[$event['id']])) $seen[$event['id']] = 1;
	else continue;

    switch ($event['type']) {
    case 3: /* recurring event */
      $date = date_for_recur($event['recur'],$event['recur_day'],$bom,$eom);
      $event['start'] = date("Y-m-d", $date);
      /* falls through: now it is just like a single-day event */
    case 1: /* single-day event */
      if ($event['start'] >= $from_date && $event['start'] <= $to_date) {
        $events[] = $event;
      }
      break;
    case 2: /* multi-day event */
      if (($event['start'] >= $from_date && $event['start'] <= $to_date)
       || ($event['end']   >= $from_date && $event['end']   <= $to_date)
       || ($event['start'] <= $from_date && $event['end']   >= $to_date)) {
        $events[] = $event;
      }
      break;
    }
  }
  fclose($fp);
  return $events;
}

/* read an event from the event listing */
function read_event($fp) {
  list(,,,,$sdesc,$id,$ldesc,$url,$recur,$tipo,$sdato,$edato) = fgetcsv($fp,8192);
  @list($recur,$recur_day) = explode(":",$recur,2);
  return array(
    'id' => $id,
    'type' => $tipo,
    'start' => $sdato,
    'end' => $edato,
    'recur' => $recur,
    'recur_day' => $recur_day,
    'sdesc' => $sdesc,
    'url' => $url,
    'ldesc' => base64_decode($ldesc),
  );
}

?>
