<?php
if (!isset($image)) {
  exit;
}

$gif = imagecreatefromgif($image);

if (isset($colors)) {
  while (list($index, $values) = each($colors)) {
    $color = explode(",", $values);
    imagecolorset($gif, $index, $color[0], $color[1], $color[2]);
  }
}

header("Content-type: image/gif");
imagegif($gif);
