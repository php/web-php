<?php
// $Id$
/*
 This page is displayed if there is no alias to
 override the stats directory distributed by rsync,
 which means there is no local search is set up
*/
$_SERVER['BASE_PAGE'] = 'stats/index.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("No Stats");
?>

<h1>No Stats</h1>
<p>
 No visitor statistics information is available on this mirror site.
</p>

<?php site_footer(); ?>
