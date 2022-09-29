<?php

use phpweb\UserNotes\UserNoteService;

$_SERVER['BASE_PAGE'] = 'manual/vote-note.php';
include_once __DIR__ . '/../include/prepend.inc';
include_once __DIR__ . '/../include/posttohost.inc';
include_once __DIR__ . '/../include/shared-manual.inc';
include_once __DIR__ . '/spam_challenge.php';

// Initialize global variables
$error = false;
$thankyou = false;
$headerset = false;
$BACKpage = htmlspecialchars($_REQUEST['page'] ?? '');
$BACKid = htmlspecialchars($_REQUEST['id'] ?? '');
$link = "/{$BACKpage}#{$BACKid}";
$master_url = "https://main.php.net/entry/user-notes-vote.php";
$notes = new UserNoteService();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_SERVER['HTTP_X_JSON']) && $_SERVER['HTTP_X_JSON'] == 'On' && !empty($_REQUEST['id']) && !empty($_REQUEST['page']) && ($N = $notes->load($_REQUEST['page'])) && array_key_exists($_REQUEST['id'], $N) && !empty($_REQUEST['vote']) && ($_REQUEST['vote'] === 'up' || $_REQUEST['vote'] === 'down')) {
    $response = [];
    $hash = substr(md5($_REQUEST['page']), 0, 16);
    $notes_file = $_SERVER['DOCUMENT_ROOT'] . "/backend/notes/" . substr($hash, 0, 2) . "/$hash";
    if (!file_exists($notes_file)) {
      $response["success"] = false;
      $response["msg"] = "Invalid request.";
    }
    else {
      $data = [
          "noteid" => $_REQUEST['id'],
          "sect" => $_REQUEST['page'],
          "vote" => $_REQUEST['vote'],
          "ip" => $_SERVER['REMOTE_ADDR'],
      ];
      if (($r = posttohost($master_url, $data)) === null || strpos($r,"failed to open socket to") !== false) {
        $response["success"] = false;
        $response["msg"] = "Could not process your request at this time. Please try again later...";
      }
      else {
        $r = json_decode($r);
        if (isset($r->status, $r->votes) && $r->status) {
          $response["success"] = true;
          $response["update"] = (int)$r->votes;
        } elseif (isset($r->status, $r->message) && !$r->status) {
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
  if (!empty($_REQUEST['id']) && !empty($_REQUEST['page']) && ($N = $notes->load($_REQUEST['page'])) && array_key_exists($_REQUEST['id'], $N) && !empty($_REQUEST['vote']) && ($_REQUEST['vote'] === 'up' || $_REQUEST['vote'] === 'down')) {
    if (!empty($_POST['challenge']) && !empty($_POST['func']) || empty($_POST['arga']) || empty($_POST['argb'])) {
      if (!test_answer($_POST['func'], $_POST['arga'], $_POST['argb'], $_POST['challenge'])) {
        $error = "Incorrect answer! Please try again.";
      }
      else {
        $hash = substr(md5($_REQUEST['page']), 0, 16);
        $notes_file = $_SERVER['DOCUMENT_ROOT'] . "/backend/notes/" . substr($hash, 0, 2) . "/$hash";
        if (file_exists($notes_file)) {
          $data = [
              "noteid" => $_REQUEST['id'],
              "sect" => $_REQUEST['page'],
              "vote" => $_REQUEST['vote'],
              "ip" => $_SERVER['REMOTE_ADDR'],
          ];
          if (($r = posttohost($master_url, $data)) !== null && strpos($r,"failed to open socket to") === false) {
            $r = json_decode($r);
            if (isset($r->status, $r->votes) && $r->status) {
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

  if (!empty($_REQUEST['id']) && !empty($_REQUEST['page']) && ($N = $notes->load($_REQUEST['page'])) && array_key_exists($_REQUEST['id'], $N) && !empty($_REQUEST['vote']) && ($_REQUEST['vote'] === 'up' || $_REQUEST['vote'] === 'down')) {
?>
 <div class="container" id="notes-dialog" style="width: 100%; padding-bottom: 15px; margin: auto;">
  <div style="width: 100%; margin: auto;"><h1>Voting</h1></div>
  <div style="background-color: #f5f5ff; border: 1px solid black; padding: 15px; width: 90%; margin: auto;">
   <form action="" method="post">
    <div>
    <p><label for="form-challenge">Please answer this simple SPAM challenge</label>: <strong><?php $c = gen_challenge(); echo $c[3]; ?></strong>?<br>
    <input id="form-challenge" type="text" name="challenge" maxlength="10" required> (Example: nine)</p>
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
  $notes->displaySingle($N[$_REQUEST['id']], false);
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
    <p><label for="form-challenge">Please answer this simple SPAM challenge</label>: <strong><?php $c = gen_challenge(); echo $c[3]; ?></strong>?<br>
    <input id="form-challenge" type="text" name="challenge" maxlength="10" required> (Example: nine)</p>
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
  $notes->displaySingle($N[$_REQUEST['id']], false);
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
