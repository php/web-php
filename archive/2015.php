<?php

use phpweb\News\NewsHandler;

$_SERVER['BASE_PAGE'] = 'archive/2015.php';
include_once __DIR__ . '/../include/prepend.inc';
news_archive_sidebar();
site_header("News Archive - 2015");
?>

<h1>News Archive - 2015</h1>

<p>
 Here are the most important news items we have published in 2015 on PHP.net.
</p>

<hr>

<?php

print_news((new NewsHandler())->getNewsByYear(2015), ["conferences", "cfp", "frontpage", "nofrontpage"], 500);

/* %s/<a href="\(.*\)"><img src="\/images\/news\/\(.*\)" alt="\(.*\)" width.*><\/a>/<?php news_image("\1", "\2", "\3"); ?>/g */
site_footer(['elephpants' => true, 'sidebar' => $SIDEBAR_DATA]);
