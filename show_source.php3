<html>
<body>
<?

isset($page_url) or die("No page URL specified.");

/* remove path prefix if exists */
if ($tmp=strrchr($page_url,"/")) {
  $page_name = substr($tmp,1,strlen($tmp));
} else {
  $page_name = $page_url;
}

show_source($page_name);

?>
</body>
</html>