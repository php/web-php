<?php
/* $Id$ */

require_once './include/prepend.inc';
require_once './include/posttohost.inc';
require_once './include/email-validation.inc';

commonHeader("Submit an Event");

$errors = array();
$process = FALSE;

if (isset($in)) { $process = TRUE; }

if (!isset($in['type'])) { $in['type'] = ""; }
if (!isset($in['sday'])) { $in['sday'] = ""; }
if (!isset($in['smonth'])) { $in['smonth'] = ""; }
if (!isset($in['syear'])) { $in['syear'] = ""; }
if (!isset($in['eday'])) { $in['eday'] = ""; }
if (!isset($in['emonth'])) { $in['emonth'] = ""; }
if (!isset($in['eyear'])) { $in['eyear'] = ""; }
if (!isset($in['recur'])) { $in['recur'] = ""; }
if (!isset($in['recur_day'])) { $in['recur_day'] = ""; }
if (!isset($in['country'])) { $in['country'] = ""; }
if (!isset($in['category'])) { $in['category'] = ""; }
if (!isset($in['email'])) { $in['email'] = ""; }
if (!isset($in['url'])) { $in['url'] = ""; }
if (!isset($in['ldesc'])) { $in['ldesc'] = ""; }
if (!isset($in['sdesc'])) { $in['sdesc'] = ""; }

if (isset($in) && $process) {
  # clean up magic quotes, if they were inserted
  if (get_magic_quotes_gpc()) {
    foreach ($in as $k => $v) {
      $in[$k] = stripslashes($v);
    }
  }

  # clean and validate data
  
  if(preg_match("/\btest\b/i", $in['sdesc'])) {
    $errors[] = 'We know this works. Please do not test the system.';
  }  	

  if(preg_match("/\btest\b/i", $in['ldesc'])) {
    $errors[] = 'We know this works. Please do not test the system.';
  }

  if (!is_emailable_address($in['email'])) {
    $errors[] = 'You must supply a valid email address.';
  }
  
  $in['sdesc'] = trim($in['sdesc']);
  if (!$in['sdesc']) {
    $errors[] = "You must supply a short description of the event.";
  }

  $in['ldesc'] = trim(strip_tags($in['ldesc'],'<a><i><b><br /><p>'));
  $in['ldesc'] = preg_replace("/(style|on\\w+?)\s*=\s*(\"|').+?\\2/i","",$in['ldesc']);
  if (!$in['ldesc']) {
    $errors[] = "You must supply a long description of the event.";
  }

  $in['url'] = trim($in['url']);
  if (!$in['url']) {
    $errors[] = "You must supply a URL with more information about the event.";
  }
  elseif (!preg_match('/^\w+:/',$in['url'])) {
    $errors[] = "The URL you supplied was incomplete.";
  }

  if (!$in['country']) {
    $errors[] = 'You must specify a country for the event.';
  }

  if (!$in['category']) {
    $errors[] = 'You must specify a category for the event.';
  }

  if (!checkdate($in['smonth'], $in['sday'], $in['syear'])) {
    $errors[] = "You must specify a valid start date.";
  }
  else {
    $sdate = mktime(0,0,1,$in['smonth'], $in['sday'], $in['syear']);
    if ($sdate < time()) {
      $errors[] = "You must specify a start date that is in the future.";
    }
  }

  if ($in['type'] == 'multi' && !checkdate($in['emonth'], $in['eday'], $in['eyear'])) {
    $errors[] = "You must specify a valid end date for a multi-day event.";
  }
  elseif ($in['type'] == 'multi' && checkdate($in['smonth'], $in['sday'], $in['syear'])) {
    $sdate = mktime(0,0,1,$in['smonth'], $in['sday'], $in['syear']);
    $edate = mktime(0,0,1,$in['emonth'], $in['eday'], $in['eyear']);
    if ($edate < time()) {
      $errors[] = "You must specify an end date that is in the future.";
    }
    elseif ($edate < $sdate) {
      $errors[] = "You must specify an end date that is after the start date.";
    }
  }

  if ($in['type'] == 'recur' && !($in['recur'] && $in['recur_day'])) {
    $errors[] = "You must specify a valid day of the month for a recurring event.";
  }

  if (preg_match("/submit/i", $action)) {
    # submit to master.php.net
    $result = posttohost("http://master.php.net/entry/event.php", $in);
    if ($result) {
      $errors[] = "There was an error processing your submission: $result";
    }
    if (!$errors) {?>
<p>Thank you for your submission! You should hear back soon as to whether your
event has been accepted for inclusion in our calendar.</p>
<?php
      commonFooter();
      exit;
    }
  }

  if (!$errors) {?>
<p>The following is a preview of your event submission. Please double-check it
to make sure all of the information is correct.</p>
<?php
  }
}
else {?>
<p>Have an upcoming PHP user group meeting? Holding a PHP training session?
Submit your event here, and after it has been approved, it will be listed on
the PHP.net homepage and appear in our full event listings.</p>
<?php
}

if ($errors) display_errors($errors);

for ($i = 1; $i <= 7; $i++) {
  $days[$i] = strftime('%A',mktime(12,0,0,4,$i,2001));
}

for ($i = 1; $i <= 12; $i++) {
  $months[$i] = strftime('%B',mktime(12,0,0,$i,1,2001));
}

$re = array(1=>'First',2=>'Second',3=>'Third',4=>'Fourth',-1=>'Last',-2=>'2nd Last',-3=>'3rd Last');

if (isset($in) && $process) {
  echo "<p><b>Preview:</b></p>\n";

  display_event($in);
?>
<p><b>Change:</b></p>
<?php
}
?>
<form action="<?php echo $PHP_SELF?>" method="post">
<table bgcolor="#eeeeee" border="0" cellspacing="0" cellpadding="3" width="100%">
 <tr>
  <th>Start Date</th>
  <td>
   <select name="in[smonth]"><option></option><?php display_options($months,$in['smonth'])?></select>
   <input type="text" name="in[sday]" size="2" maxlength="2" value="<?php echo htmlentities($in['sday'])?>" />
   <input type="text" name="in[syear]" size="4" maxlength="4" value="<?php echo $in['syear'] ? htmlentities($in['syear']) : date("Y")?>" />
   <input type="radio" id="single" name="in[type]" value="single"<?php if ($in['type'] == 'single' || !$in['type']) echo ' checked="checked"';?> />
   <label for="single">One day (no end-date required)</label>
  </td>
 </tr>
 <tr>
  <th>End Date</th>
  <td>
   <select name="in[emonth]"><option></option><?php display_options($months,$in['emonth'])?></select>
   <input type="text" name="in[eday]" size="2" maxlength="2" value="<?php echo htmlentities($in['eday'])?>" />
   <input type="text" name="in[eyear]" size="4" maxlength="4" value="<?php echo $in['eyear'] ? htmlentities($in['eyear']) : date("Y")?>" />
   <input type="radio" id="multi" name="in[type]" value="multi"<?php if ($in['type'] == 'multi') echo ' checked="checked"';?> />
   <label for="multi">Multi-day event</label>
  </td>
 </tr>
 <tr>
  <th>OR<br />Recurring</th>
  <td>
   <select name="in[recur]"><option></option><?php display_options($re,$in['recur'])?></select>
   <select name="in[recur_day]"><option></option><?php display_options($days,$in['recur_day'])?></select>
   <input type="radio" id="recur" name="in[type]" value="recur"<?php if ($in['type'] == 'recur') echo ' checked="checked"';?> />
   <label for="recur">Recurring (every month)</label>
  </td>
 </tr>
 <tr>
  <th>Short<br />Description</th>
  <td><input type="text" name="in[sdesc]" value="<?php echo htmlentities($in['sdesc'])?>" size="32" maxlength="32" /></td>
 </tr>
 <tr>
  <th>URL</th>
  <td><input type="text" name="in[url]" size="40" maxlength="128" value="<?php echo htmlentities($in['url'])?>" /></td>
 </tr>
 <tr>
  <th>Country</th>
  <td>
   <select name="in[country]">
    <option value="">- Select a country -</option>
    <?php display_options($COUNTRIES,$in['country']);?>
   </select>
  </td>
 </tr>
 <tr>
  <th>Event Category</th>
  <td>
   <select name="in[category]">
<?php
	$cat = array("- Select a category -", "User Group Event", "Conference", "Training");
        display_options($cat,$in['category']);
?>
   </select>
  </td>
 </tr>
 <tr>
  <th>Email</th>
  <td><input type="text" name="in[email]" size="40" maxlength="128" value="<?php echo htmlentities($in['email'])?>" /></td>
 </tr>
 <tr>
  <th>&nbsp;</th>
  <td><small>This email address is only used to contact you about the listing, it will not displayed along with the listing.</small></td>
 </tr>
 <tr>
  <th colspan="2" align="left">Long Description</th>
 </tr>
 <tr>
  <td colspan="2"><textarea name="in[ldesc]" cols="60" rows="10" wrap="virtual"><?php echo htmlentities($in['ldesc']);?></textarea></td>
 </tr>
 <tr>
  <td align="center" colspan="2">
    <input type="submit" name="action" value="Preview" />
<?php if (isset($in) && $process && !$errors) {?>
    <input type="submit" name="action" value="Submit" />
<?php }?>
  </td>
 </tr>
</table>
</form>
<?php
commonFooter();

function display_options($options,$current) {
  foreach ($options as $k => $v) {
    echo '<option value="', $k, '"',
         ($k == $current ? ' selected="selected"' : ''),
         '>', htmlentities($v), "</option>\n";
  }
}

/* vim: set noet ts=4 sw=4 ft=php: : */
