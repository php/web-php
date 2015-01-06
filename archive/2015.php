<?php

$_SERVER['BASE_PAGE'] = 'archive/2015.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/pregen-news.inc';
news_archive_sidebar();
site_header("News Archive - 2015");
//site_header("News Archive - 2015", array("cache" => true));
?>

<h1>News Archive - 2015</h1>

<p>
 Here are the most important news items we have published in 2015 on PHP.net.
</p>

<hr>

<?php

print_news($NEWS_ENTRIES, array("conferences", "cfp", "frontpage", "nofrontpage"), 500, 2015);

/* %s/<a href="\(.*\)"><img src="\/images\/news\/\(.*\)" alt="\(.*\)" width.*><\/a>/<?php news_image("\1", "\2", "\3"); ?>/g */
site_footer(array('elephpants' => true, 'sidebar' => $SIDEBAR_DATA));

