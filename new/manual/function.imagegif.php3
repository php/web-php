<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.imagefontwidth.php3', 'ImageFontWidth'),
  'next' => array('function.imageinterlace.php3', 'ImageInterlace'),
  'up'   => array('ref.image.php3', 'Image functions'),
  'toc'  => array(
    array('ref.image.php3#I(REF.IMAGE)C(1,TITLE)', ''),
    array('function.getimagesize.php3', 'GetImageSize'),
    array('function.imagearc.php3', 'ImageArc'),
    array('function.imagechar.php3', 'ImageChar'),
    array('function.imagecharup.php3', 'ImageCharUp'),
    array('function.imagecolorallocate.php3', 'ImageColorAllocate'),
    array('function.imagecolortransparent.php3', 'ImageColorTransparent'),
    array('function.imagecopyresized.php3', 'ImageCopyResized'),
    array('function.imagecreate.php3', 'ImageCreate'),
    array('function.imagecreatefromgif.php3', 'ImageCreateFromGif'),
    array('function.imagedashedline.php3', 'ImageDashedLine'),
    array('function.imagedestroy.php3', 'ImageDestroy'),
    array('function.imagefill.php3', 'ImageFill'),
    array('function.imagefilledpolygon.php3', 'ImageFilledPolygon'),
    array('function.imagefilledrectangle.php3', 'ImageFilledRectangle'),
    array('function.imagefilltoborder.php3', 'ImageFillToBorder'),
    array('function.imagefontheight.php3', 'ImageFontHeight'),
    array('function.imagefontwidth.php3', 'ImageFontWidth'),
    array('function.imagegif.php3', 'ImageGif'),
    array('function.imageinterlace.php3', 'ImageInterlace'),
    array('function.imageline.php3', 'ImageLine'),
    array('function.imageloadfont.php3', 'ImageLoadFont'),
    array('function.imagepolygon.php3', 'ImagePolygon'),
    array('function.imagerectangle.php3', 'ImageRectangle'),
    array('function.imagesetpixel.php3', 'ImageSetPixel'),
    array('function.imagestring.php3', 'ImageString'),
    array('function.imagestringup.php3', 'ImageStringUp'),
    array('function.imagesx.php3', 'ImageSX'),
    array('function.imagesy.php3', 'ImageSY'))));
manualHeader('ImageGif');
?><H1
>ImageGif</H1
><P
>ImageGif -- output image to browser or file</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int imagegif(int im, string filename);<P
>    ImageGif creates the GIF file in filename from the image im.  The im argument is the return from the
    <A
HREF="function.imagecreate.php3"
>imagecreate</A
> function.
  </P
><P
>    The image format will be GIF87a unless the image has
    been made transparent with <A
HREF="function.imagecolortransparent.php3"
>imagecolortransparent</A
>, in
    which case the image format will be GIF89a.
  </P
><P
>    The filename argument is optional, and if left off,
    the raw image stream will be output directly.  By sending an
    image/gif content-type using the 

    header

    function, you can create a PHP script that outputs GIF images
    directly.
   </P
></DIV
><?php manualFooter('ImageGif');?>