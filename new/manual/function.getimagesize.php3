<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('ref.image.php3', 'Image functions'),
  'next' => array('function.imagearc.php3', 'ImageArc'),
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
manualHeader('GetImageSize');
?><H1
>GetImageSize</H1
><P
>GetImageSize -- get the size of a GIF, JPG or PNG image</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>array getimagesize(string filename);<P
>     The GetImageSize function will determine the size of any GIF, JPG
     or PNG image file and return the dimensions along with the file
     type and a height/width text string to be used inside a normal
     HTML IMG tag.

    </P
><P
>     Returns an array with 4 elements.  Index 0 contains the width of
     the image in pixels.  Index 1 contains the height.  Index 2 a flag
     indicating the type of the image.  1 = GIF, 2 = JPG, 3 = PNG.
     Index 3 is a text string with the correct  "height=xxx width=xxx"
     string that can be used directly in an IMG tag.
     <DIV
CLASS="EXAMPLE"
><P
><B
>Example 1. GetImageSize</B
></P
><PRE
CLASS="PROGRAMLISTING"
>&#60;?php $size = GetImageSize("img/flag.jpg"); ?&#62;
&#60;IMG SRC="img/flag.jpg" &#60;?php echo $size[3]; ?&#62;&#62;</PRE
></DIV
>

     <BLOCKQUOTE
CLASS="NOTE"
><P
><B
>NOTE: </B
>       This function does not require the GD image library.
      </P
></BLOCKQUOTE
>

   </P
></DIV
><?php manualFooter('GetImageSize');?>