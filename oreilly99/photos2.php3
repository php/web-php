<?php require "header2.inc"?>
<h1>Welcome to my Photo Album</h1>
<form action="<?echo $PHP_SELF?>" enctype="multipart/form-data" method=POST>
<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
<input type=file name=file size=29>
<input type="submit" value=" Send File ">
</form>
<?
  if($file) {
    $dest = "$DOCUMENT_ROOT/".dirname($PHP_SELF).$file_name;
    if(!copy($file,$dest)) {
      echo "Unable to create $dest - check permissions<br>\n";
      exit;
    }
  }
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
