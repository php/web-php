<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.imagecolortransparent.php3', 'ImageColorTransparent'),
  'next' => array('function.imagecreate.php3', 'ImageCreate'),
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
manualHeader('ImageCopyResized');
?><H1
>ImageCopyResized</H1
><P
>ImageCopyResized -- copy and resize part of an image</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int imagecopyresized(int dst_im, int src_im, int dstX, int dstY, int srcX, int srcY, int dstW, int dstH, int srcW, int srcH);<P
>     ImageCopyResized copies a rectangular portion of one image to
     another image.  <TT
CLASS="PARAMETER"
><I
>dst_im</I
></TT
> is the destination
     image, <TT
CLASS="PARAMETER"
><I
>src_im</I
></TT
> is the source image
     identifier.  If the source and destination coordinates and width
     and heights differ, appropriate stretching or shrinking of the
     image fragment will be performed.  The coordinates refer to the
     upper left corner.  This function can be used to copy regions
     within the same image (if <TT
CLASS="PARAMETER"
><I
>dst_im</I
></TT
> is the
     same as <TT
CLASS="PARAMETER"
><I
>src_im</I
></TT
>) but if the regions overlap
     the results will be unpredictable.
   </P
></DIV
><?php manualFooter('ImageCopyResized');?>