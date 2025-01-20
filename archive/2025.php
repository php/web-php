<?php

$_SERVER['BASE_PAGE'] = 'archive/2025.php';
include_once __DIR__ . '/../include/prepend.inc';
include_once __DIR__ . '/../include/pregen-news.inc';
news_archive_sidebar();
site_header("News Archive - 2025");
?>

<h1>News Archive - 2025</h1>

<p>
 Here are the most important news items we have published in 2025 on PHP.net.
</p>

<hr>

<?php

print_news($NEWS_ENTRIES, null, 500, 2025);
site_footer(['elephpants' => true, 'sidebar' => $SIDEBAR_DATA]);
