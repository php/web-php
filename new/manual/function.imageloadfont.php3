<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.imageline.php3', 'ImageLine'),
  'next' => array('function.imagepolygon.php3', 'ImagePolygon'),
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
manualHeader('ImageLoadFont');
?><H1
>ImageLoadFont</H1
><P
>ImageLoadFont -- load a new font</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int imageloadfont(string file);<P
>     ImageLoadFont loads a user-defined bitmap font and returns an
     identifier for the font (that is always greater than 5, so it will
     not conflict with the built-in fonts).

    </P
><P
>     The font file format is currently binary and architecture
     dependent.  This means you should generate the font files on the
     same type of CPU as the machine you are running PHP on.

    </P
><P
>     <DIV
CLASS="TABLE"
><P
><B
>Table 1. Font file format</B
></P
><TABLE
BORDER="1"
><TR
><TH
ALIGN="LEFT"
VALIGN="TOP"
>byte position</TH
><TH
ALIGN="LEFT"
VALIGN="TOP"
>C data type</TH
><TH
ALIGN="LEFT"
VALIGN="TOP"
>description</TH
></TR
><TR
><TD
ALIGN="LEFT"
VALIGN="TOP"
>byte 0-3</TD
><TD
ALIGN="LEFT"
VALIGN="TOP"
>int</TD
><TD
ALIGN="LEFT"
VALIGN="TOP"
>number of characters in the font</TD
></TR
><TR
><TD
ALIGN="LEFT"
VALIGN="TOP"
>byte 4-7</TD
><TD
ALIGN="LEFT"
VALIGN="TOP"
>int</TD
><TD
ALIGN="LEFT"
VALIGN="TOP"
>	   value of first character in the font (often 32 for space)
	  </TD
></TR
><TR
><TD
ALIGN="LEFT"
VALIGN="TOP"
>byte 8-11</TD
><TD
ALIGN="LEFT"
VALIGN="TOP"
>int</TD
><TD
ALIGN="LEFT"
VALIGN="TOP"
>pixel width of each character</TD
></TR
><TR
><TD
ALIGN="LEFT"
VALIGN="TOP"
>byte 12-15</TD
><TD
ALIGN="LEFT"
VALIGN="TOP"
>int</TD
><TD
ALIGN="LEFT"
VALIGN="TOP"
>pixel height of each character</TD
></TR
><TR
><TD
ALIGN="LEFT"
VALIGN="TOP"
>byte 16-</TD
><TD
ALIGN="LEFT"
VALIGN="TOP"
>char</TD
><TD
ALIGN="LEFT"
VALIGN="TOP"
>	   array with character data, one byte per pixel in each
	   character, for a total of (nchars*width*height) bytes.
	  </TD
></TR
></TABLE
></DIV
>

    </P
><P
>     See also <A
HREF="function.imagefontwidth.php3"
>ImageFontWidth</A
> and
     <A
HREF="function.imagefontheight.php3"
>ImageFontHeight</A
>.

   </P
></DIV
><?php manualFooter('ImageLoadFont');?>