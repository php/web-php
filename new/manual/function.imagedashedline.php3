<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.imagecreatefromgif.php3', 'ImageCreateFromGif'),
  'next' => array('function.imagedestroy.php3', 'ImageDestroy'),
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
manualHeader('ImageDashedLine');
?><H1
>ImageDashedLine</H1
><P
>ImageDashedLine -- draw a dashed line</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int imagedashedline(int im, int x1, int y1, int x2, int y2, int col);<P
>    ImageLine draws a dashed line from x1,y1 to
    x2,y2 (top left is
    0,0) in image im of color
    col.
  </P
><P
>    See also <A
HREF="function.imageline.php3"
>imageline</A
>.
   </P
></DIV
><?php manualFooter('ImageDashedLine');?>