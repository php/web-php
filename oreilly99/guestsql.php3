<?php require "header2.inc"?>
<h1>Welcome to my Guestbook</h1>
  <h2>Please write me a little note below</h2>
  <form action="<? echo $PHP_SELF?>" method="POST">
  <textarea cols=40 rows=5 name="note" wrap=virtual></textarea>
  <input type="submit" value=" Send it ">
  </form>
  <?
  mysql_connect("localhost");
  if(isset($note)) {
     $ts = date("Y-m-d H:i:s");
     mysql_db_query("mydb","insert into comments values (0,'$note','$ts')");
  }
  ?>
<h2>The entries so far:</h2>
<? $result = mysql_db_query("mydb","select * from comments");
    while($row=mysql_fetch_row($result)) {
      echo $row[0] ." " . $row[1] . " " . $row[2] . "<br>\n";
    }  ?>
<?php require "footer.inc"?>
