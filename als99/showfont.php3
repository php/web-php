<?php

    Header("Content-type: image/gif");
    $im = ImageCreate(150,30);
    $white = ImageColorAllocate($im, 255,255,255);
    $black = ImageColorAllocate($im, 0,0,0);
    ImageTTFText($im, 20, 0, 10, 20, $black, $font, "ABCabc123");
    ImageGif($im);

?>
