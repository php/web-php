<? 

  // bars.php3 - Bar chart on gif image
  // Author: Benjamin Stocker <BenjaminS@n-s.ch>
  // Version: 1.0
  // Note: uses the gd library
  // This code will display a bar chart based on random values
  // Different colors are used to display bars and a gif images
  // is used for the background. Use the following link to include
  // the example into your web-site
  // <img src="./bars.php3" border="0">
  //
  // The background image can be found at
  // www.oron.ch/php/gradient.gif


  $im = imagecreatefromgif("gradient.gif"); 
  
  // Allocate colors
  $red=ImageColorAllocate($im,255,0,0); 
  $green=ImageColorAllocate($im,0,255,0); 
  $blue=ImageColorAllocate($im,0,0,255); 
  $yellow=ImageColorAllocate($im,255,255,0); 
  $cyan=ImageColorAllocate($im,0,255,255); 

  // Determine size of image
  $x=imagesx($im); 
  $y=imagesy($im);
  
  // Initialize random number generator
  srand(time());

  // Create some bars
  $v=rand(0, $y);
  ImageFilledRectangle($im,10,200-$v,60,200,$red);
  $v=rand(0, $y);
  ImageFilledRectangle($im,70,200-$v,120,200,$green);
  $v=rand(0, $y);
  ImageFilledRectangle($im,130,200-$v,180,200,$blue);
  $v=rand(0, $y);
  ImageFilledRectangle($im,190,200-$v,240,200,$yellow);
  $v=rand(0, $y);
  ImageFilledRectangle($im,250,200-$v,300,200,$cyan);
  
  Header( "Content-type:  image/gif"); 

  // Display modified image
  ImageGif($im); 
  // Release allocated ressources
  ImageDestroy($im); 
?>
