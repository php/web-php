<?php
require_once 'prepend.inc';
require_once 'posttohost.inc';

commonHeader("Submit an Event");

if (isset($in)) {
  # clean up magic quotes, if they were inserted
  if (get_magic_quotes_gpc()) {
    foreach ($in as $k => $v) {
      $in[$k] = stripslashes($v);
    }
  }

  # TODO: validate data

  if (0 && preg_match("/submit/i", $action)) {
    # submit to master.php.net
    $result = posttohost("http://master.php.net/entry/event.php", $in);
    if ($result) {
      $errors[] = "There was an error processing your submission: $result";
    }
    if (!$errors) {?>
TODO: this is where the message thanking the user and telling them what will
happen next goes.
<?php
      commonFooter();
      exit;
    }
  }

  if (!$errors) {?>
TODO: this is where the message about this being a preview goes.
<?
  }
}
else {?>
TODO: this is where text to explain event submission goes.
<?php
}

if ($errors) display_errors($errors);

for ($i = 0; $i < 7; $i++) {
  $days[$i+1] = strftime('%A',mktime(12,0,0,4,$i,2001));
}

for ($i = 0; $i < 12; $i++) {
  $months[$i] = strftime('%B',mktime(12,0,0,$i+1,1,2001));
}

$re = array(1=>'First',2=>'Second',3=>'Third',4=>'Fourth',-1=>'Last',-2=>'2nd Last',-3=>'3rd Last');

if (isset($in)) {
  # TODO: preview submission
}
?>
<form action="<?php echo $PHP_SELF?>" method="post">
<table bgcolor="#e0e0e0" border="0" cellspacing="0" cellpadding="3" width="100%">
 <tr>
  <th>Start Date</th>
  <td>
   <select name="in[smonth]"><?php display_options($months,$in['smonth'])?></select>
   <input type="text" name="in[sday]" size="2" maxlength="2" value="<?php echo htmlentities($in['sday'])?>" />
   <input type="text" name="in[syear]" size="4" maxlength="4" value="<?php echo $in['syear'] ? htmlentities($in['syear']) : date("Y")?>" />
   <input type="radio" id="single" name="in[type]" value="single"<?php if ($in['type'] == 'single' || !$in['type']) echo ' checked="checked"';?> />
   <label for="single">Just one day (no end-date required)</label>
  </td>
 </tr>
 <tr>
  <th>End Date</th>
  <td>
   <select name="in[emonth]"><?php display_options($months,$in['emonth'])?></select>
   <input type="text" name="in[eday]" size="2" maxlength="2" value="<?php echo htmlentities($in['eday'])?>" />
   <input type="text" name="in[eyear]" size="4" maxlength="4" value="<?php echo $in['eyear'] ? htmlentities($in['eyear']) : date("Y")?>" />
   <input type="radio" id="multi" name="in[type]" value="multi"<?php if ($in['type'] == 'multi') echo ' checked="checked"';?> />
   <label for="multi">Multi-day event</label>
  </td>
 </tr>
 <tr>
  <th>OR<br>Recurring</th>
  <td>
   <select name="in[recur]"><?php display_options($re,$in['recur'])?></select>
   <select name="in[recur_day]"><?php display_options($days,$in['recur_day'])?></select>
   <input type="radio" id="recur" name="in[type]" value="recur"<?php if ($in['type'] == 'recur') echo ' checked="checked"';?> />
   <label for="recur">Recurring (every month)</label>
  </td>
 </tr>
 <tr>
  <th>Short<br>Description</th>
  <td><input type="text" name="in[sdesc]" value="<?php echo htmlentities($in['sdesc'])?>" size="16" maxlength="16" /></td>
 </tr>
 <tr>
  <th>Country</th>
  <td>
   <select name="in[country]" width="30">
    <option value="">- Select a country -</option>
    <?php display_options($COUNTRIES,$in['country']);?>
   </select>
  </td>
 </tr>
 <tr>
  <th>Event Category</th>
  <td>
   <select name="in[category]" width="20">
<?php
	$cat = array("- Select a category -", "regional", "national", "international");
        foreach ($cat as $name) {
                echo '<option',
                     ($name == $in['category'] ? ' selected="selected"' : ''),
                     '>', htmlentities($name), "</option>\n";
	}
?>
   </select>
  </td>
 </tr>
 <tr>
  <th>URL</th>
  <td><input type="text" name="in[url]" size="60" maxlength="128" value="<?php echo htmlentities($in['url'])?>" /></td>
 </tr>
 <tr>
  <th>Long<br>Description</th>
  <td><textarea name="in[ldesc]" cols="78" rows="10" maxlength="78" wrap="virtual"><?php echo htmlentities($in['ldesc']);?></textarea></td>
 </tr>
 <tr>
  <td align="center" colspan="2">
    <input type="submit" name="action" value="Preview" />
<?php if (isset($in)) {?>
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
