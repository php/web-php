<?php

function posttohost($url, $data) {
  $url = parse_url($url);
  if (!$url) return "couldn't parse url";

  $encoded = "";

  while (list($k,$v) = each($data)) {
    $encoded .= ($encoded ? "&" : "");
    $encoded .= rawurlencode($k)."=".rawurlencode($v);
  }

  $fp = fsockopen($url['host'],$url['port']?$url['port']:80);
  if (!$fp) return "failed to open socket to $url[host]";

  fputs($fp, sprintf("POST %s%s%s HTTP/1.0\n", $url['path'], $url['query'] ? "?" : "", $url['query']));
  fputs($fp, "Host: $url[host]\n");
  fputs($fp, "Content-type: application/x-www-form-urlencoded\n");
  fputs($fp, "Content-length: " . strlen($encoded) . "\n");
  fputs($fp, "Connection: close\n\n");

  fputs($fp, "$encoded\n");

  $line = fgets($fp,1024);
  if (!eregi("^HTTP/1\\.. 200", $line)) return;

  $results = ""; $inheader = 1;
  while(!feof($fp)) {
    $line = fgets($fp,1024);
    if ($inheader && ($line == "\n" || $line == "\r\n")) {
      $inheader = 0;
    }
    elseif (!$inheader) {
      $results .= $line;
    }
  }
  fclose($fp);

  return $results;
}
