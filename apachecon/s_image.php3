<?php require "header.inc"?>
<H1>Image Manipulation</H1>

<H4>Creating a GIF with a TrueType font</H4>
<?example('<?php
    Header("Content-type: image/gif");
    $im = ImageCreate(150,30);
    $white = ImageColorAllocate($im, 255,255,255);
    $black = ImageColorAllocate($im, 0,0,0);
    ImageTTFText($im, 20, 0, 10, 20, $black,
        "/usr/local/fonts/Soopafre", "ABCabc123");
    ImageGif($im);
?>');?>
<H6>Output:</H6><BLOCKQUOTE>
<IMG src="http://207.164.141.35/showfont.php3?font=Soopafre.ttf&string=ABCabc123" width=150 height=30>
</BLOCKQUOTE>

<?php require "footer.inc"?>
