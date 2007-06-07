<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'archive/2007.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/pregen-news.inc';
news_archive_sidebar();
site_header("News Archive - 2007");
?>

<h1>News Archive - 2007</h1>

<p>
 Here are the most important news items we have published in 2006 on PHP.net.
</p>

<hr />

<?php
function date_sort($a, $b) {
	$aPos = strrpos($a["fragment"], "-");
	$bPos = strrpos($b["fragment"], "-");
	$aDate = substr($a["fragment"], 0, $aPos);
	$bDate = substr($b["fragment"], 0, $bPos);

	if (strtotime($aDate) > strtotime($bDate)) {
		return -1;
	} elseif (strtotime($aDate) < strtotime($bDate)) {
		return 1;
	} else {
		return substr($a["fragment"], $aPos+1) < substr($b["fragment"], $bPos+1);
	}
}
$news = array_merge($NEWS_ENTRIES["frontpage"], $NEWS_ENTRIES["conferences"]);
uasort($news, "date_sort");
print_news($news);

site_footer();

