<?php

use phpweb\News\NewsHandler;

$_SERVER['BASE_PAGE'] = 'archive/2022.php';
include_once __DIR__ . '/../include/prepend.inc';
news_archive_sidebar();
site_header("News Archive - 2022");
?>

<h1>News Archive - 2022</h1>

<p>
 Here are the most important news items we have published in 2022 on PHP.net.
</p>

<hr>

<?php

print_news((new NewsHandler())->getPregeneratedNews(), null, 500, 2022);
site_footer(['elephpants' => true, 'sidebar' => $SIDEBAR_DATA]);
