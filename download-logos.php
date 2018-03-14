<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'download-logos.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
$SIDEBAR_DATA = '
<h3>More PHP artwork</h3>
<p>
 <a href="http://www.elroubio.net/">Vincent Pontier</a> also made some
 really neat PHP artwork, for the French PHP sites, and for the benefit
 of the whole community. You can download some of his works and use
 under a GPL license.
</p>
';
site_header("Download Logos", array("current" => "downloads"));

// Print recommended star cell
function print_star()
{
    echo "<td class=\"star\"><span class=\"star\" title=\"recommended\">*</span></td>\n";
}

// Provide a random bgcolor setting for a cell
function random_bgcolor($min, $max)
{
    echo "style=\"background-color: #" .
         sprintf('%02x%02x%02x', rand($min, $max)*51, rand($min, $max)*51, rand($min, $max)*51) .
         ";\"";
}
?>
<h1>Download</h1>

<p>
 Click on link below image and save the image.
</p>

<ul>
  <li>
    Copy the image to your server.
  </li>
  <li>
    Prefer SVG and convert to size/format you need.
  </li>
  <li>
    The font used is
    <a href="http://www.myfonts.com/fonts/bitstream/handel-gothic/">Handel
    Gothic</a>.
  </li>
</ul>

<h2>Licensing</h2>

<p>
 The author Colin Viebrock released the image as
 <a href="https://creativecommons.org/licenses/by-sa/4.0/">Creative Commons
 Attribution-Share Alike 4.0 International</a>, feel free to reuse, do not
 forget the terms of use:

  <ul>
    <li>
      <strong>Attribution</strong> — You must give appropriate credit, provide a link
      to the license, and indicate if changes were made. You may do so in any
      reasonable manner, but not in any way that suggests the licensor endorses
      you or your use.
    </li>
    <li>
      <strong>ShareAlike</strong> — If you remix, transform, or build upon the material,
      you must distribute your contributions under the same license as the original.
    </li>
  </ul>
</p>

<div class="logo-list row">
  <div class="col center">
   <img src="/images/logos/new-php-logo.png" width="200" alt="php logo">
   <br>
   <a href="http://php.net/images/logos/new-php-logo.svg">SVG</a> |
   <a href="http://php.net/images/logos/new-php-logo.png">PNG</a>
  </div>
</div>

<h2>Alternative logo</h2>

<p>
 Levi Morrison created this alternative version without background to use on PHP Site.
</p>

<div class="logo-list row">
  <div class="col center">
   <img src="/images/logos/php-logo-bigger.png" width="150" alt="alternative php logo without background">
   <br>
   <a href="http://php.net/images/logos/php-logo.svg">SVG</a> |
   <a href="http://php.net/images/logos/php-logo-bigger.png">PNG</a>
  </div>
</div>

<h2>Old formats</h2>

<p>
 Disclaimer: Using these formats is not recommended.
</p>

<div class="logo-list row">

  <div class="col center">
   <img src="/images/logos/php-med-trans-light.gif">
   <br>
   <a href="http://php.net/images/logos/php-logo.eps">EPS</a> |
   <a href="http://php.net/images/logos/php-logo.ai">AI (Adobe Illustrator)</a> |
   <a href="http://php.net/images/logos/php-big.tif">TIF</a> |
   <a href="http://php.net/images/logos/php-med-trans.png">PNG</a> |
   <a href="http://php.net/images/logos/php-med-trans-light.gif">GIF</a>
  </div>

  <div class="col center">
   <div>
    <img src="/images/logos/php-power-white.png">
   </div>
   <br>
   "Powered by PHP"
   <br>
   <a href="http://php.net/images/logos/php-power-white.png">PNG</a>
  </div>

  <div class="col center">
   <div>
    <img src="/images/logos/php-power-micro.png">
    <img src="/images/logos/php-power-micro2.png">
    <img src="/images/logos/php5-power-micro.png">
   </div>
   <br>
   "Powered by PHP"
   <br>
   <a href="http://php.net/images/logos/php-power-micro.png">PNG 1</a> |
   <a href="http://php.net/images/logos/php-power-micro2.png">PNG 2</a> |
   <a href="http://php.net/images/logos/php5-power-micro.png">PNG 3</a>
  </div>

  <div class="col center">
   <div>
    <img src="/images/logos/php-icon.png">
   </div>
   <br>
   32 x 32 pixels
   <br>
   <a href="http://php.net/images/logos/php-icon.png">PNG</a> |
   <a href="http://php.net/images/logos/php-icon-white.gif">GIF</a> |
   <a href="http://php.net/images/logos/php.ico">ICO</a>
  </div>

  <div class="col center">
   <div>
    <img src="/images/logos/php_file_ico.gif">
    <img src="/images/logos/php_script_ico.png">
    <img src="/images/logos/php_xpstyle_ico.gif">
   </div>
   <br>
   Icon resource for Windows
   <br>
   <a href="http://php.net/images/logos/php_file.ico">ICO 1</a>
   <a href="http://php.net/images/logos/php_script.ico">ICO 2</a>
   <a href="http://php.net/images/logos/php_xpstyle.ico">ICO 3</a>
  </div>

</div>

<?php site_footer();
