<?php require "header.inc"?>
<h1>A Simple Guestbook Application</h1>
<?example('<h1>Welcome to my Guestbook</h1>
  <h2>Please write me a little note below</h2>
  <form action="<? echo $PHP_SELF?>" method="POST">
  <textarea cols=40 rows=5 name="note" wrap=virtual></textarea>
  <input type="submit" value=" Send it ">
  </form>
  <?
  if(isset($note)) {
     $fp = fopen("notes.txt","a");
     fputs($fp,nl2br($note)."<br>");
     fclose($fp);
  }
  ?>
<h2>The entries so far:</h2>
<? @ReadFile("notes.txt") ?>
');?>

<?php require "footer.inc"?>
