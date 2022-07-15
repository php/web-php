<?php

$_SERVER['BASE_PAGE'] = 'archive/2018.php';
include_once __DIR__ . '/../include/prepend.inc';
include_once __DIR__ . '/../include/pregen-news.inc';
news_archive_sidebar();
site_header("News Archive - 2018");
//site_header("News Archive - 2018", array("cache" => true));
?>

<h1>News Archive - 2018</h1>

<p>
 Here are the most important news items we have published in 2018 on PHP.net.
</p>

<hr>

<?php

print_news($NEWS_ENTRIES, null, 500, 2018);

/* %s/<a href="\(.*\)"><img src="\/images\/news\/\(.*\)" alt="\(.*\)" width.*><\/a>/<?php news_image("\1", "\2", "\3"); ?>/g */
site_footer(['elephpants' => true, 'sidebar' => $SIDEBAR_DATA]);
