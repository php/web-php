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
 Right click on one of the images and select "Save Image As" to save the image.
</p>

<p class="warn">
 Do not just include the graphic from our servers on your page!
 Copy the image to your site please.
</p>

<p>
 If you're wondering about the font we used, it's called
 <a href="http://www.myfonts.com/fonts/bitstream/handel-gothic/">Handel
 Gothic</a>.
</p>

<h2>Licensing</h2>

<p>
 The author Colin Viebrock released the image as
 <a href="https://creativecommons.org/licenses/by-sa/4.0/">Creative Commons
 Attribution-Share Alike 4.0 International</a>, feel free to reuse, do not
 forget the terms of use:

  <ul>
    <li>
      <b>Attribution</b> — You must give appropriate credit, provide a link
      to the license, and indicate if changes were made. You may do so in any
      reasonable manner, but not in any way that suggests the licensor endorses
      you or your use.
    </li>
    <li>
      <b>ShareAlike</b> — If you remix, transform, or build upon the material,
      you must distribute your contributions under the same license as the original.
    </li>
  </ul>
</p>

<div class="center logo-list">
<table border="0" width="90%" cellspacing="2" cellpadding="10" id="logos">

 <tr>
  <td class="logo">
   <img src="/images/logos/new-php-logo.png" width="200" alt="php logo">
   <br>
   <a href="https://upload.wikimedia.org/wikipedia/commons/2/27/PHP-logo.svg">SVG format</a> |
   <a href="https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/2000px-PHP-logo.svg.png">PNG format</a>
  </td>
 </tr>

</table>
</div>

<?php site_footer();
