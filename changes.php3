<?$mod = GMDate("D, d M Y H:i:s",filemtime("CHANGES"));
  Header("Last-Modified: $mod GMT"); ?>
<html><head><title>PHP3 Changes</title></head>
<body bgcolor="#ffffff" text="#032F5B" link="#537492" vlink="#000000">
<FONT FACE="Verdana, Arial, Helvetica">
<? 
   echo "<PRE>";
   $fp=fopen("CHANGES","r");
   $line = fgets($fp,120);
   while(!feof($fp)) {
		$line=stripslashes($line);
		$line=ereg_replace("<\\?","&lt;?",$line);
		$line=ereg_replace("PHP","<i>PHP</i>",$line);
		$line=ereg_replace("FI","<i>FI</i>",$line);
		if($line[0]=="[") {
			echo "<font size=+1><b><i>$line</i></b></font>";
		} else {
			echo $line;
		}
		$line = fgets($fp,120);
   }
   fclose($fp);
   echo "</PRE>";
?>
</body></html>
