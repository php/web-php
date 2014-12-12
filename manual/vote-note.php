<?php
// $Id$

$_SERVER['BASE_PAGE'] = 'manual/vote-note.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/posttohost.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/shared-manual.inc';
include      $_SERVER['DOCUMENT_ROOT'] . '/manual/spam_challenge.php';

// Initialize global variables
$error = false;
$thankyou = false;
$headerset = false;
$BACKpage = htmlspecialchars(isset($_REQUEST['page']) ? $_REQUEST['page'] : '');
$BACKid = htmlspecialchars(isset($_REQUEST['id']) ? $_REQUEST['id'] : '');
$link = "/{$BACKpage}#{$BACKid}";
$master_url = "http://master.php.net/entry/user-notes-vote.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_SERVER['HTTP_X_JSON']) && $_SERVER['HTTP_X_JSON'] == 'On' && !empty($_REQUEST['id']) && !empty($_REQUEST['page']) && ($N = manual_notes_load($_REQUEST['page'])) && array_key_exists($_REQUEST['id'], $N) && !empty($_REQUEST['vote']) && ($_REQUEST['vote'] === 'up' || $_REQUEST['vote'] === 'down')) {
    $response = array();
    $update = $N[$_REQUEST['id']]['votes']['up'] - $N[$_REQUEST['id']]['votes']['down'];
    $hash = substr(md5($_REQUEST['page']), 0, 16);
    $notes_file = $_SERVER['DOCUMENT_ROOT'] . "/backend/notes/" .
        substr($hash, 0, 2) . "/$hash";
    if (!file_exists($notes_file)) {
      $response["success"] = false;
      $response["msg"] = "Invalid request.";
    }
    else {
      $data = array(
          "noteid" => $_REQUEST['id'],
          "sect" => $_REQUEST['page'],
          "vote" => $_REQUEST['vote'],
          "ip" => $_SERVER['REMOTE_ADDR']
      );
      if (($r = posttohost($master_url, $data)) === null || strpos($r,"failed to open socket to") !== false) {
        $response["success"] = false;
        $response["msg"] = "Could not process your request at this time. Please try again later...";
      }
      else {
        $r = json_decode($r);
        if (json_last_error() == JSON_ERROR_NONE && isset($r->status) && $r->status && isset($r->votes)) {
          $response["success"] = true;
          $response["update"] = (int)$r->votes;
        } elseif (json_last_error() == JSON_ERROR_NONE && isset($r->status) && isset($r->message) && $r->status == false) {
          $response["success"] = false;
          $response["msg"] = $r->message;
        } else {
          $response["success"] = false;
          $response["msg"] = "The server did not respond properly. Please try again later...";
        }
      }
    }
    echo json_encode($response);
    exit;
  }
  elseif (!empty($_REQUEST['id']) && !empty($_REQUEST['page']) && ($N = manual_notes_load($_REQUEST['page'])) && array_key_exists($_REQUEST['id'], $N) && !empty($_REQUEST['vote']) && ($_REQUEST['vote'] === 'up' || $_REQUEST['vote'] === 'down')) {
    if (!empty($_POST['challenge']) && !empty($_POST['func']) || empty($_POST['arga']) || empty($_POST['argb'])) {
      if (!test_answer($_POST['func'], $_POST['arga'], $_POST['argb'], $_POST['challenge'])) {
        $error = "Incorrect answer! Please try again.";
      }
      else {
        if ($_REQUEST['vote'] == 'up') {
          $N[$_REQUEST['id']]['votes']['up']++;
        }
        elseif ($_REQUEST['vote'] == 'down') {
          $N[$_REQUEST['id']]['votes']['down']++;
        }
        $update = $N[$_REQUEST['id']]['votes']['up'] - $N[$_REQUEST['id']]['votes']['down'];
        $hash = substr(md5($_REQUEST['page']), 0, 16);
        $notes_file = $_SERVER['DOCUMENT_ROOT'] . "/backend/notes/" .
            substr($hash, 0, 2) . "/$hash";
        if (file_exists($notes_file)) {
          $data = array(
              "noteid" => $_REQUEST['id'],
              "sect" => $_REQUEST['page'],
              "vote" => $_REQUEST['vote'],
              "ip" => $_SERVER['REMOTE_ADDR'],
          );
          if (($r = posttohost($master_url, $data)) !== null && strpos($r,"failed to open socket to") === false) {
            $r = json_decode($r);
            if (json_last_error() == JSON_ERROR_NONE && isset($r->status) && $r->status && isset($r->votes)) {
              $thankyou = true;
            } else {
              $error = "Invalid request.";
            }
          }
          else {
            $error = "Invalid request.";
          }
        }
        else {
          $error = "Invalid request.";
        }
      }
    }
    else {
      $error = "You did not answer the spam challenge question.";
    }
  }
  else {
    $error = "Invalid request.";
  }
}
else {
  // Site header
  site_header("Vote On User Notes");
  $headerset = true;

  if (!empty($_REQUEST['id']) && !empty($_REQUEST['page']) && ($N = manual_notes_load($_REQUEST['page'])) && array_key_exists($_REQUEST['id'], $N) && !empty($_REQUEST['vote']) && ($_REQUEST['vote'] === 'up' || $_REQUEST['vote'] === 'down')) {
?>
 <div class="container" id="notes-dialog" style="width: 100%; padding-bottom: 15px; margin: auto;">
  <div style="width: 100%; margin: auto;"><h1>Voting</h1></div>
  <div style="background-color: #f5f5ff; border: 1px solid black; padding: 15px; width: 90%; margin: auto;">
   <form action="" method="post">
    <div>
    <p>Please answer this simple SPAM challenge: <strong><?php $c = gen_challenge(); echo $c[3]; ?></strong>?<br>
    <input type="text" name="challenge" maxlength="10"> (Example: nine)</p>
    <p><input type="submit" value="Vote" name="votenote"></p>
    </div>
    <input type="hidden" name="func" value="<?php echo $c[0]; ?>">
    <input type="hidden" name="arga" value="<?php echo $c[1]; ?>">
    <input type="hidden" name="argb" value="<?php echo $c[2]; ?>">
   </form>
  </div>
 </div>
 <div style="width: 100%; margin: auto;"><h1>The Note You're Voting On</h1></div>
 <div style="width: 90%; margin: auto; padding: 15px; background-color: lightgray; border: 1px dashed gray;">
<?php
  $backID = htmlspecialchars($_REQUEST['id']);
  $backPAGE = htmlspecialchars($_REQUEST['page']);
  manual_note_display(
      $N[$_REQUEST['id']]['xwhen'], $N[$_REQUEST['id']]['user'], $N[$_REQUEST['id']]['note'], $N[$_REQUEST['id']]['id'],
      $N[$_REQUEST['id']]['votes'], false
  );
?>
 </div>
 <div style="width: 90%; margin: auto;"><p><a href="<?php echo "/{$backPAGE}#{$backID}"; ?>">&lt;&lt; Back to user notes page</a></p></div>
<?php
  }
  else {
    $error = "Invalid request.";
  }
}
if ($error) {
    $error_div = <<<EOL
      <div style="width: 90%; padding: 15px; margin: auto; border: 1px dotted red; background-color: #9999cc; color: white;">
        <div style="float: left; padding: 15px;">
          <img src="/images/docs-warning.png">
        </div>
        <p>
          <strong>There was an error with your request!</strong>
        </p>
        </p>
          $error
        </p>
      </div>
EOL;
if (!$headerset) {
  site_header("Error - Voting");
  $headerset = true;
}
?>
 <div class="container" id="notes-dialog" style="width: 100%; padding-bottom: 15px; margin: auto;">
  <div style="width: 100%; margin: auto;"><h1>Voting</h1></div>
  <div style="background-color: #f5f5ff; border: 1px solid black; padding: 15px; width: 90%; margin: auto;">
   <form action="" method="post">
    <div>
    <p>Please answer this simple SPAM challenge: <strong><?php $c = gen_challenge(); echo $c[3]; ?></strong>?<br>
    <input type="text" name="challenge" maxlength="10"> (Example: nine)</p>
    <p><input type="submit" value="Vote" name="votenote"></p>
    </div>
    <input type="hidden" name="func" value="<?php echo $c[0]; ?>">
    <input type="hidden" name="arga" value="<?php echo $c[1]; ?>">
    <input type="hidden" name="argb" value="<?php echo $c[2]; ?>">
   </form>
  <?php echo $error_div; ?>
  </div>
 </div>
<?php
  if ($error != "Invalid request.") {
?>
 <div style="width: 100%; margin: auto;"><h1>The Note You're Voting On</h1></div>
 <div style="width: 90%; margin: auto; padding: 15px; background-color: lightgray; border: 1px dashed gray;">
<?php
  $backID = htmlspecialchars($_REQUEST['id']);
  $backPAGE = htmlspecialchars($_REQUEST['page']);
  manual_note_display(
      $N[$_REQUEST['id']]['xwhen'], $N[$_REQUEST['id']]['user'], $N[$_REQUEST['id']]['note'], $N[$_REQUEST['id']]['id'],
      $N[$_REQUEST['id']]['votes'], false
  );
?>
 </div>
 <div style="width: 90%; margin: auto;"><p><a href="<?php echo "/{$backPAGE}#{$backID}"; ?>">&lt;&lt; Back to user notes page</a></p></div>
<?php
  }
}
if ($thankyou) {
  site_header("Thank you for voting!");
  $headerset = true;
?>
 <div class="container" id="notes-dialog" style="width: 100%; padding: 15px; margin: auto;">
  <h1>Thanks for voting!</h1>
  <p>To go back to the user notes page <a href="<?php echo $link; ?>">click here</a>.</p>
 </div>
<?php
}

// Print out common footer
site_footer();
