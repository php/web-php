<?php
if (!isset($image)) {
  print "<form>image to decolor:<input type=text name=image></form>";
  exit;
}
/* This sets all non-black colors in a GIF to white. */
$gif = imagecreatefromgif("$image");
for ($i = 0; $i < imagecolorstotal($gif); $i++) {
  $colors = imagecolorsforindex($gif, $i);
  if ($colors[red] || $colors[green] || $colors[blue]) {
    imagecolorset($gif, $i, 255, 255, 255);
  }
}
header("Content-type: image/gif");
imagegif($gif);
