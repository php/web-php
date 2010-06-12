<?php
// $Id$
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

$page = isset($_GET['page']) ? htmlspecialchars($_GET['page'], ENT_QUOTES, 'UTF-8') : '';

// Redirect to new manual page
mirror_redirect("/manual/" . $page);
?>