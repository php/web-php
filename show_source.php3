<? isset($page_url) or die("No page URL specified."); ?>
<html>
<head>
<title>Source of <? echo $page_url ?></title>
<?
  $title="Source of $page_url";
  include "header";

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