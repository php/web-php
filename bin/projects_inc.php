<?php
// harcoded xsl and xml names
// this XSL generates an array of values
$xsl_name = "projects_inc.xsl";
$xsl = implode("",file($xsl_name));

$xml_name = "../backend/projects.xml";
// we need to do a replacement so the entities in the xml will
// not be interpreted by sablotron
$xml = str_replace("&","&amp;",implode("", file($xml_name)));

if (!xslt_process($xsl, $xml, &$result)) {
  Header("Status: 500 Server Error");
  echo xslt_error();
  echo "ERROR ".$php_error_msg;
  exit;
} else {
  if ($fp = fopen("../include/projects.inc", "w")) {
	  fwrite($fp, $result);
	  flush();
	  fclose($fp);
	  if (file_exists("../include/projects.inc"))
		  echo "Success! created ../include/projects.inc";
  } else {
	  echo "Error while saving ../include/projects.inc";
  }
}

?>
