<?php require "header.inc"?>
<h1>Pulling It Together</h1>

<?example('<?php
  $picture = "monkey_plain.gif";
  $picker = "colorpicker.gif";

  /* If the user clicked on the picker, figure out the new paint color. */
  if (isset($picker_x) && isset($picker_y)) {
    $gif = imagecreatefromgif($picker);
    $paint = imagecolorat($gif, $picker_x, $picker_y);
    $paint = imagecolorsforindex($gif, $paint);
    $paint = array($paint[red], $paint[green], $paint[blue]);
  }
  if (!is_array($paint)) {
    $paint = explode(",", $paint);
  }
  $paintstr = implode(",", $paint);
  $painthex  = sprintf("%02x%02x%02x", $paint[0], $paint[1], $paint[2]);

  if (isset($picture_x) && isset($picture_y)) {
    $gif = imagecreatefromgif($picture);
    $index = imagecolorat($gif, $picture_x, $picture_y);
    $colors[$index] = $paintstr;
  }

?>
<body bgcolor="#<?echo $painthex?>">
<form method="post">
<input type=hidden name=paint value="<?echo $paintstr?>">
<?
  /* output the hidden fields for the already-set colors, and
     build the color part of the query string to recolor.php3 */
  $colorstr="";
  if (isset($colors)) {
    while (list($index,$value) = each($colors)) {
      echo "<input type=hidden name=\"colors[$index]\" value=\"$value\">\n";
      $colorstr .= "&colors[$index]=$value";
    }
  }
?>
<input type=image name=picker src="<?echo $picker?>">
<input type=image name=picture src="recolor.php3?image=<?echo $picture; echo $colorstr;?>">
</form>
</body>');?>

<?php require "footer.inc"?>
