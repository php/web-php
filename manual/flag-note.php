<?php

// $Id$

$ip_spam_lookup_url = 'http://www.dnsbl.info/dnsbl-database-check.php?IP=';

$_SERVER['BASE_PAGE'] = 'manual/flag-note.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/posttohost.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/shared-manual.inc';
include      $_SERVER['DOCUMENT_ROOT'] . '/manual/spam_challenge.php';

// These functions are specific to flag-note.php
function check_submit_errors($inputs, $reasons_allowed, $challenge = true) {
  $submit_error = false;
  if (empty($inputs['flagreason']) || $inputs['flagreason'] === "Select a reason...") {
    $submit_error = "Please select a reason for why you'd like to flag this user note.";
  }
  elseif (!in_array($inputs['flagreason'], $reasons_allowed, true)) {
    $submit_error = "Invalid reason selected.";
  }
  elseif ($inputs['flagreason'] == 'Other' && empty($inputs['flagotherreason'])) {
    $submit_error = "If you select 'other' as your reason please tell us what that reason is in the following field.";
  }
  elseif ($inputs['flagreason'] == "This is my note and I want it deleted" && empty($inputs['flagemail'])) {
    $submit_error = "If this is your note please supply the original email address you submitted the note with. If you did not supply one use 'anonymous'.";
  }
  elseif ($inputs['flagreason'] == "This is my note and I want it deleted" && strtolower($inputs['flagemail']) !== "anonymous" && !filter_var($inputs['flagemail'], FILTER_VALIDATE_EMAIL)) {
    $submit_error = "Email address not valid. Please be sure to use the original email address you supplied when submitting the note or use 'anonymous' if you didn't supply one.";
  }
  elseif (!empty($inputs['flagcontactallowed']) && $inputs['flagcontactallowed'] !== 'false' && empty($inputs['flagemail'])) {
    $submit_error = "If you checked the box to be contacted you must supply an email address.";
  }
  elseif (!empty($inputs['flagcontactallowed']) && $inputs['flagcontactallowed'] !== 'false' && !filter_var($inputs['flagemail'], FILTER_VALIDATE_EMAIL)) {
    $submit_error = "If you checked the box to be contacted you must supply a valid email address. Otherwise do not request to be contacted.";
  }
  elseif ($challenge && (empty($inputs['challenge']) || empty($_POST['func']) || empty($_POST['arga']) || empty($_POST['argb']))) {
    $submit_error = "You did not answer the SPAM challenge question.";
  }
  elseif ($challenge && !test_answer($_POST['func'], $_POST['arga'], $_POST['argb'], $_POST['challenge'])) {
    $submit_error = "You did not answer the SPAM challenge question correctly. Please try again.";  
  }
  return $submit_error;
}

// Initialize global variables
$reasons_allowed = array(
  "Spam", 
  "Offensive or abusive language",
  "This should be a bug report",
  "Note on wrong/unrelated page",
  "Invalid or harmful code",
  "Duplicate note",
  "This is my note and I want it deleted",
  "Other",
);
$defaults = array(
    "flagreason" => "Select a reason...",
    "flagotherreason" => null,
    "flagemail" => null,
    "flagcontactallowed" => false,
    "challenge" => null,
  );
// Input array
$inputs = array_intersect_key($_POST, $defaults) + $defaults;
$display_form = false;
$display_thankyou = false;
$submit_error = false;
$display_errorpage = false;
$master_url = "http://master.php.net/entry/user-notes-flag.php";

// Determine request method
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SERVER['HTTP_X_JSON']) && $_SERVER['HTTP_X_JSON'] == 'On') {
  // If the request is coming from the Ajax side handle here and respond with JSON
  $obj = new stdclass;
  if ($_POST['mode'] === 'challenge') {
     $obj->success = true;
     $challenge_response = gen_challenge();
     $obj->func = $challenge_response[0];
     $obj->arga = $challenge_response[1];
     $obj->argb = $challenge_response[2];
     $obj->q = $challenge_response[3];
     echo json_encode($obj);
     exit;
  }
  if (!empty($_REQUEST['id']) && !empty($_REQUEST['page']) && ($N = manual_notes_load($_REQUEST['page'])) && array_key_exists($_REQUEST['id'], $N)) {
    if (!($submit_error = check_submit_errors($inputs, $reasons_allowed))) {
      $data = array(
        "noteid" => $_REQUEST['id'],
        "sect" => $_REQUEST['page'],
        "flag" => $_REQUEST['flagreason'],
        "email" => $_REQUEST['flagemail'],
        "info" => $_REQUEST['flagotherreason'],
        "ip" => $_SERVER['REMOTE_ADDR']
      );
      if (($r = posttohost($master_url, $data)) !== null && strpos($r,"failed to open socket to") === false) {
        $obj->success = true;
        $obj->msg = "Thank you! Your request was sent successfully.";
      }
      else {
        $obj->success = false;
        $obj->msg = "Your request could not be completed at this time. Please try again later.";
      }
    }
    else {
      $obj->success = false;
      $obj->msg = $submit_error;
    }
  }
  else {
  	$obj->success = false;
    $obj->msg = "Sorry, there was a problem sending your request. Please try again later.";
  }
  echo json_encode($obj);
  exit;
}
elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_REQUEST['id']) && !empty($_REQUEST['page']) && ($N = manual_notes_load($_REQUEST['page'])) && array_key_exists($_REQUEST['id'], $N))  {
  // If the request is coming through normally then handle here and respond with HTML
  $display_form = true;
  
  if (!($submit_error = check_submit_errors($inputs, $reasons_allowed))) {
    // If everything supplied is there validate the input and attempt sending to the master database
    $data = array(
      "noteid" => $_REQUEST['id'],
      "sect" => $_REQUEST['page'],
      "flag" => $_REQUEST['flagreason'],
      "email" => $_REQUEST['flagemail'],
      "info" => $_REQUEST['flagotherreason'],
      "ip" => $_SERVER['REMOTE_ADDR']
    );
    if (($r = posttohost($master_url, $data)) !== null && strpos($r,"failed to open socket to") === false) {
      // If sent successfully redirect the user back to the previous page
      $linkPAGE = urlencode(trim($_REQUEST['page']));
      $linkID = urlencode(trim($_REQUEST['id']));
      $display_form = false;
      header("Location: {$MYSITE}manual/flag-note.php?id={$linkID}&page={$linkPAGE}&thankyou");
      exit;
    }
    else {
      // Otherwise respond with an error message...
      $submit_error = "Your request could not be completed at this time. Please try again later.";
    }
  }
}
elseif (!empty($_REQUEST['id']) && !empty($_REQUEST['page']) && ($N = manual_notes_load($_REQUEST['page'])) && array_key_exists($_REQUEST['id'], $N) && isset($_REQUEST['thankyou'])) {
  // Display thank you page -- request completed
  $display_thankyou = true;
  $BACKpage = $_REQUEST['page'];
  $BACKid = $_REQUEST['id'];
  $link = "/{$BACKpage}#{$BACKid}";
}
elseif (!empty($_REQUEST['id']) && !empty($_REQUEST['page']) && ($N = manual_notes_load($_REQUEST['page'])) && array_key_exists($_REQUEST['id'], $N)) {
  // Initial request -- display the form
  $display_form = true;
}
else {
  // Otherwise display an error page
  $display_errorpage = true;
}

site_header("Flag Manual Note");

if ($display_thankyou) {
?>
 <div class="container" id="notes-dialog" style="width: 90%; padding: 15px; margin: auto;">
  <h1>Thank You!</h1>
  <p>Thank you for notifying us about this note and for helping improve the user contributed notes.
  Your request was received successfully and someone will review your request and take any necessary action.</p>
  <p>To go back to the user notes page <a href="<?php echo $link; ?>">click here</a>.</p>
</div>
<?php  
}

if ($display_form) {
  $action_link = "?id=" . htmlspecialchars(urlencode($_REQUEST['id'])) . "&page=" . htmlspecialchars(urlencode($_REQUEST['page']));
  if ($submit_error) {
    $error_div = <<<EOL
      <div style="width: 90%; padding: 15px; margin: auto; border: 1px dotted red; background-color: #9999cc; color: white;">
        <p>
          <strong>There was an error with your request!</strong>
        </p>
        </p>
          $submit_error
        </p>
      </div>
EOL;
  }
  else {
    $error_div = null;
  }
?>
 <div class="container" id="notes-dialog" style="width: 100%; padding-bottom: 15px; margin: auto;">
  <h1>Flag User Note</h1>
  <p>
    Please help us improve our user contributed notes by letting us know when something is wrong.
    If you believe this note should be brought to our attention for some reason please fill out
    and submit the following information. If you'd like us to contact you about your concern regarding this note
    check the appropriate box to be contacted and provide a valid email address
    (<em>your email will not be shared publically</em>).
  </p>
  <div style="width: 90%; margin: auto;"><h1>Reason For Flagging The Note</h1></div>
  <div style="background-color: #f5f5ff; border: 1px solid black; padding: 15px; width: 90%; margin: auto;">
   <form action="<?php echo $action_link; ?>" method="post">
    <div id="flag-fields1">
    <p>Flag user note for: 
    <select name="flagreason" id="flagreason">
    <?php
     foreach (array_merge(array("Select a reason..."), $reasons_allowed) as $i => $option) {
       $option_select = ($option == $inputs['flagreason'] || empty($inputs['flagreason'])) ? ' selected="selected"' : null;
       // Default option
       if (!$i) {
         echo "<option value=\"Select a reason...\"{$option_select}>Select a reason...</option>\n";
       }
       else {
         echo "<option value=\"$option\"{$option_select}>$option</option>\n";
       }
     }
    ?>
    </select>
    </p>
    </div>
    <div id="flag-fields2">
    <p>If other please tell us the reason: <input type="text" name="flagotherreason" id="flagotherreason"<?php
    echo ' value="' . (!empty($inputs['flagotherreason']) ? htmlspecialchars($inputs['flagotherreason']) : null) . '"';?> / ></p>
    </div>
    <div id="flag-fields3">
    <p>Your Email: <input type="text" name="flagemail" id="flagemail"<?php 
    echo ' value="' . (!empty($inputs['flagemail']) ? htmlspecialchars($inputs['flagemail']) : null) . '"';?> /></p>
    </div>
    <div id="flag-fields4">
    <p><input type="checkbox" name="flagcontactallowed" id="flagcontactallowed"<?php echo
    (!empty($inputs['flagcontactallowed']) ? ' checked' : null); ?> /> I would like to be contacted concerning this note.</p>
    </div>
    <div id="flag-fields5">
    <p>Please answer this simple SPAM challenge: <strong><?php $c = gen_challenge(); echo $c[3]; ?></strong>?<br/>
    <input type="text" name="challenge" maxlength="10" /> (Example: nine)</p>
    <p><input type="submit" value="Flag" name="flagnote" id="notes-submit" /></p>
    </div>
    <input type="hidden" name="func" value="<?php echo $c[0]; ?>" />
    <input type="hidden" name="arga" value="<?php echo $c[1]; ?>" />
    <input type="hidden" name="argb" value="<?php echo $c[2]; ?>" />
   </form>
  <?php echo $error_div; ?>
  </div>
 </div>
 <div style="width: 90%; margin: auto;"><h1>The Note You're Flagging</h1></div>
 <div style="width: 90%; margin: auto; padding: 15px; background-color: lightgray; border: 1px dashed gray;">
<?php
  $backID = urlencode(htmlspecialchars($_REQUEST['id']));
  $backPAGE = urlencode(htmlspecialchars($_REQUEST['page']));
  manual_note_display(
      $N[$_REQUEST['id']]['xwhen'], $N[$_REQUEST['id']]['user'], $N[$_REQUEST['id']]['note'], $N[$_REQUEST['id']]['id'],
      $N[$_REQUEST['id']]['votes'], false
  );
?>
 </div>
 <div style="width: 90%; margin: auto;"><p><a href="<?php echo "/{$backPAGE}#{$backID}"; ?>">&lt;&lt; Back to user notes page</a></p></div>
<?php
}

// Error page -- something went wrong
if ($display_errorpage) {
?>
<h1>Flag User Note - Request Error</h1>
<p>There was a problem with your request. We were unable to find the note you request or the link is broken. Please try again later.</p>
<?php
}

// Print out common footer
site_footer();
