<?$mod = GMDate("D, d M Y H:i:s",filemtime("CREDITS"));
  Header("Last-Modified: $mod GMT"); ?>
<html><head><title>PHP3 Credits</title></head><body>
<?$title="PHP3 Credits";
  include "include/header.inc";
  ReadFile("CREDITS");
?>
</body></html>
