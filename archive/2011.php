<?php
// $Id: 2010.php 293613 2010-01-16 13:38:42Z bjori $
$_SERVER['BASE_PAGE'] = 'archive/2011.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/pregen-news.inc';
news_archive_sidebar();
site_header("News Archive - 2011");
?>

<h1>News Archive - 2011</h1>

<p>
 Here are the most important news items we have published in 2011 on PHP.net.
</p>

<hr />

<?php

print_news($NEWS_ENTRIES, array("conferences", "cfp", "frontpage"), 50, 2011);
/* %s/<a href="\(.*\)"><img src="\/images\/news\/\(.*\)" alt="\(.*\)" width.*><\/a>/<?php news_image("\1", "\2", "\3"); ?>/g */
site_footer();

