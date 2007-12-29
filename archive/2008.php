<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'archive/2008.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/pregen-news.inc';
news_archive_sidebar();
site_header("News Archive - 2008");
?>

<h1>News Archive - 2008</h1>

<p>
 Here are the most important news items we have published in 2008 on PHP.net.
</p>

<hr />

<?php
function date_sort($a, $b) {
	return $a["date"] == $b["date"] ? 0 : (strtotime($a["date"]) > strtotime($b["date"]) ? -1 : 1);
}

$news = array_merge($NEWS_ENTRIES["frontpage"], $NEWS_ENTRIES["conferences"]);
uasort($news, "date_sort");
print_news($news, 2008);
/* %s/<a href="\(.*\)"><img src="\/images\/news\/\(.*\)" alt="\(.*\)" width.*><\/a>/<?php news_image("\1", "\2", "\3"); ?>/g */
site_footer();

