<?php
// harcoded xsl and xml names
$xsl_name = "projects.xsl";
$xsl = implode("",file($xsl_name));

$xml_name = "../backend/projects.xml";
$xml = implode("", file($xml_name));

if (!xslt_process($xsl, $xml, &$result)) {
  Header("Status: 500 Server Error");
  echo xslt_error();
  echo "ERROR ".$php_error_msg;
  exit;
} else {
  echo $result;
}
