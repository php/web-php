<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.imagesetpixel.php3', 'ImageSetPixel'),
  'next' => array('function.imagestringup.php3', 'ImageStringUp'),
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
manualHeader('ImageString');
?><H1
>ImageString</H1
><P
>ImageString -- draw a string horizontally</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int imagestring(int im, int font, int x, int y, string s, int col);<P
>    ImageString draws the string s in the image identified by im at coordinates x,y (top
    left is 0,0) in color col.  If
    font is 1, 2, 3, 4 or 5, a built-in font is used.
  </P
><P
>    See also <A
HREF="function.imageloadfont.php3"
>imageloadfont</A
>.
   </P
></DIV
><?php manualFooter('ImageString');?>