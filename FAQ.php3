<?$mod = GMDate("D, d M Y H:i:s",filemtime("FAQ.html"));
  Header("Last-Modified: $mod GMT");
  require("shared.inc");
  commonHeader("Frequently Asked Questions"); 

  $fd = fopen("FAQ.html", "r");

  /* drop everything until it tells us to stop chopping */
  while (!feof($fd)) {
    if (ereg("stop chopping", fgets($fd, 1024))) {
      break;
    }
  }
  /* now print everything until it tells us to start chopping again */
  while (!feof($fd)) {
    if (!ereg("start chopping", $line = fgets($fd, 1024))) {
      echo $line;
    } else {
      break;
    }
  }
  /* just close the file, throwing away the rest */
  fclose($fd);
  commonFooter();
?>
