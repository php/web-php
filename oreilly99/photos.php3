<?php require "header.inc"?>

<h1>Welcome to my Photo Album</h1>
<?
  $fd = opendir(".");
  while($entry = readdir($fd)) {
    if(eregi("\.(jpg|gif|png)$",$entry)) {
      echo "<a href=\"$entry\">";
      echo "<img src=\"$entry\" align=middle border=0 height=80 width=100>";
      echo "</a> $entry<br>\n";
    }
  }
  closedir($fd);
?>
<?php require "footer.inc"?>
